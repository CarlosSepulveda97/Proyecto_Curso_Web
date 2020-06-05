<?php

    session_start();
    $idSeguir=$_GET['id'];

    //Funcion seguir


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estiloPerfil.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>
<body>


<!-- Logo, boton de cuenta, y menu-->
<header>
        <img id="logo" src="./img/logo.png" alt="logo">

        <section>
            <ul>
                <li class="categorias">
                    <a>
                        Categorias
                    </a>
                    <div class="lista-categorias">
                        <a href="#">Arquitectura</a>
                        <a href="#">Diseño Web</a>
                        <a href="#">CAD</a>
                     </div>
                </li>
                <li><a>Tendencias</a></li>
                <li><a>Equipos</a></li>
                <li><a href="./home.php">Home</a></li>
            </ul>
        </section>
        <section class="categorias"> 
            <a href="./perfil.php"><input class="button_mediano" type="submit" value="<?php echo $_SESSION['nombre']?>"></a>
            <div class="lista-categorias">
                        <a href="#">Ayuda</a>
                        <a href="#">Ajustes</a>
                        <a href="index.php">Cerrar sesion</a>
                     </div>
        </section>
</header>






<section class="cuerpo">

<!-- FOTO DE PERFIL E INFORMACION DE USUARIO(ESTADO,CIUDAD,NOMBRE)-->
    <section class="info">
        <?php
            $nombre=$_GET['nombre'];
            $conectar=mysqli_connect('localhost','root','','usuarios');
            $sql="SELECT ubicacion FROM info WHERE idCuenta = '$idSeguir'";
            $solicitud=mysqli_query($conectar,$sql);
            while($fila=$solicitud->fetch_assoc()){
                $direccion=$fila['ubicacion'];
                
                echo <<< EOT
                    <img src="$direccion" alt="">
                EOT;
            }
        ?>
        <section class="detalles">
        
            <?php
                $sql2="SELECT * FROM info WHERE idCuenta = '$idSeguir'";
                $solicitud=mysqli_query($conectar,$sql2);
                $fila=$solicitud->fetch_assoc();
                
                echo <<< EOT
                    <p id="nombre">
                    $fila[nombre]
                    </p>
                    <p id="estado">
                    $fila[descripcion]
                    </p>
                    <p id="ubicacion">
                    $fila[ciudad]
                    </p>
                    
                    </section>
                EOT;
            ?>
    </section>


    <!-- Seguir, ver seguidores, seguidos -->

    <section>
        
            <!--Seguimiento-->
        <section class="seguimiento__container">
            <p>Seguidores: <?php 
                $contador=0;
                $conexion=mysqli_connect('localhost','root','','usuarios');
                $queri="SELECT id FROM seguimiento
                        WHERE idCuentaSeguido='$idSeguir' 
                        ";
                $ejecutar=mysqli_query($conexion,$queri);
                
                while($fila=$ejecutar->fetch_assoc()){
                    
                    $contador+=1;
                }
                echo " $contador";
            ?></p>
            <p>Seguidos:<?php
                $contador=0;
                $conexion=mysqli_connect('localhost','root','','usuarios');
                $queri="SELECT id FROM seguimiento
                        WHERE idCuentaSeguidor='$idSeguir' 
                        ";
                $ejecutar=mysqli_query($conexion,$queri);
                
                while($fila=$ejecutar->fetch_assoc()){
                    
                    $contador+=1;
                }
                echo " $contador";
            ?>
            </p>
        </section>
                <!--Boton Seguir-->
        <form class="boton__seguir" action="../controlador/seguir.php?id=<?php echo "$idSeguir"?>" method="POST" target="oculto"> 
            <input type="submit" name="seguir" value="Seguir">
        </form>
    </section>

    <iframe id="oculto" style="visibility: hidden;" name="oculto" src="../controlador/seguir.php?id=<?php echo "$idSeguir"?>"></iframe>



    <!-- BUSCAR Y PUBLIAR IMAGENES-->
    <section class="resumen">
        <section class="menu-archivos">
            <?php
                $array=[];
                $conectar=mysqli_connect('localhost','root','','usuarios');
                $sql="SELECT ubicacion FROM publicacion WHERE id_user = '$idSeguir'";
                $solicitud=mysqli_query($conectar,$sql);
            
                if($solicitud->num_rows>0){
                    $contador=1;
                    echo <<< EOT
                        <table>
                    EOT;

                    while($fila=$solicitud->fetch_assoc()){
                        $direccion=$fila['ubicacion'];
                        
                        if ($contador==1){
                            echo <<< EOT
                                <TR>
                                <TD>
                            EOT;
                        }else{
                            echo <<< EOT
                                <TD>
                            EOT;

                        }
                        echo <<< EOT
                            <img src="$direccion" alt="">
                        EOT;

                        if ($contador==1){
                            echo <<< EOT
                                </TD>
                                
                            EOT;
                            $contador=2;
                        }else{
                            echo <<< EOT
                                </TD>
                                </TR>
                            EOT;
                            $contador=1;
                        }
                    
                    }

                    if ($contador==1){
                        echo <<< EOT
                            </TR>
                        EOT;
                    }

                    echo <<< EOT
                        <table>
                    EOT;    
                    }
                

            ?>

            
        </section>
    </section>

    <section class="">

    </section>

</section>
    
</body>
</html>