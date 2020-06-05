<?php

    session_start();
    $correo=$_SESSION['correo'];

    
    $conectar=mysqli_connect('localhost','root','','usuarios');
    $queri="SELECT id FROM cuentas
            WHERE correo='$correo'";
    $ejecutar=mysqli_query($conectar,$queri);
    $fila=$ejecutar->fetch_assoc();
    $idCuenta=$fila['id'];
    

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
                    <a >
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
            <input class="button_mediano" type="submit" value="<?php echo $_SESSION['nombre']?>"></a>
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
            $nombre=$_SESSION['nombre'];
            $conectar=mysqli_connect('localhost','root','','usuarios');
            $sql="SELECT ubicacion FROM info WHERE nombre = '$nombre'";
            $solicitud=mysqli_query($conectar,$sql);
            $fila=$solicitud->fetch_assoc();
            if (is_null($fila)){
                $ubicacion="./archivos/default.png";
                echo <<< EOT
                    <img src="$ubicacion" alt="">
                EOT;
            }else
            {
                $direccion=$fila['ubicacion'];
                echo <<< EOT
                    <img src="$direccion" alt="">
                EOT;
            }
        ?>
        <section class="detalles">
            <?php
                $sql2="SELECT * FROM info WHERE nombre = '$nombre'";
                $solicitud=mysqli_query($conectar,$sql2);
                $fila=$solicitud->fetch_assoc();
                
                if (is_null($fila)){
                    $nombre=$_SESSION['nombre'];
                    $descripcion="Hola!";
                    $ubicacion="./archivos/default.png";
                    $ciudad="Planeta Tierra";
                    
                    $conectar=mysqli_connect('localhost','root','','usuarios');
                    

                    $sql="INSERT INTO info (nombre,descripcion,ubicacion,ciudad) VALUES('$nombre','$descripcion','$ubicacion','$ciudad')";

                    $ejecutar=mysqli_query($conectar,$sql);

                }

                $sql2="SELECT * FROM info WHERE nombre = '$nombre'";
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
                    <a id=textoBoton href="./editar.php"><button>Editar</button></a>
                    </section>
                EOT;
            ?>
    </section>





    <!--MENU LATERAL-->        
    <section class="menu-perfil">
            <ul>
                <li><a href="./home.php">Principal</a></li>
                <li><a href="">Mis archivos</a></li>
                <li><a href="">Siguiendo</a></li>
                <li><a href="">Seguidores</a></li>
                <li><a href="">Administrar</a></li>
            </ul>
    </section>




    <!--Seguimiento-->
    <section class="seguimiento__container">
            <p>Seguidores: <?php 
                $contador=0;
                $conexion=mysqli_connect('localhost','root','','usuarios');
                $queri="SELECT id FROM seguimiento
                        WHERE idCuentaSeguido='$idCuenta' 
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
                        WHERE idCuentaSeguidor='$idCuenta' 
                        ";
                $ejecutar=mysqli_query($conexion,$queri);
                
                while($fila=$ejecutar->fetch_assoc()){
                    
                    $contador+=1;
                }
                echo " $contador";
            ?>
            </p>


    </section>





    <!--SUBIR ARCHIVOS-->
    
    <section id="subir">
        <form action="../controlador/datosImagen.php" method="post" enctype="multipart/form-data">
            <input id="seleccion" type="file" name="imagen" id="" >
            <input id="boton" type="submit" value="Enviar Imagen">
        </form>

    </section>





    <!-- BUSCAR Y PUBLIAR IMAGENES-->
    <section class="resumen">
        <section class="menu-archivos">
            <?php
                
                $array=[];
                $nombre=$_SESSION['nombre'];
                $idCuenta=$_SESSION['id'];
                $conectar=mysqli_connect('localhost','root','','usuarios');
                $sql="SELECT ubicacion FROM publicacion WHERE id_user = '$idCuenta'";
                $solicitud=mysqli_query($conectar,$sql);
            
                if($solicitud->num_rows>0){
                    $contador=1;
                    echo <<< EOT
                        <table>
                    EOT;

                    while($fila=$solicitud->fetch_assoc()){
                        var_dump($fila);
                        var_dump($idCuenta);
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
                }else{
                    echo "<p>No tienes publicaciones aun :c</p>";
                }
                
                

            ?>

            
        </section>
    </section>

    <section class="">

    </section>

</section>
    
</body>
</html>