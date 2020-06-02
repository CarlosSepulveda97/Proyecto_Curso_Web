<?php

    session_start();

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
                <li><a>Estoy perdido</a></li>
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

    <section class="info">
        <?php
            $nombre=$_SESSION['nombre'];
            $conectar=mysqli_connect('localhost','root','','usuarios');
            $sql="SELECT ubicacion FROM info WHERE nombre = '$nombre'";
            $solicitud=mysqli_query($conectar,$sql);
            while($fila=$solicitud->fetch_assoc()){
                $direccion=$fila['ubicacion'];
                
                echo <<< EOT
                    <img src="$direccion" alt="">
                EOT;
            }
    
        ?>
    <section class="detalles">
            <p id="nombre">
            <?php echo $_SESSION['nombre']?>
            </p>
            <p id="estado">
                Es un bonito dia.
            </p>

            <p id="ubicacion">
                Berlin, Germany.
            </p>

            <a id=textoBoton href="./editar.php"><button>Editar</button></a>
            
        </section>
    </section>

    <section class="menu-perfil">
            <ul>
                <li><a href="">Principal</a></li>
                <li><a href="">Mis archivos</a></li>
                <li><a href="">Siguiendo</a></li>
                <li><a href="">Seguidores</a></li>
                <li><a href="">Administrar</a></li>
            </ul>
    </section>

    <section id="subir">

        <form action="../controlador/datosImagen.php" method="post" enctype="multipart/form-data">
            
            <input id="seleccion" type="file" name="imagen" id="" >
            <input id="boton" type="submit" value="Enviar Imagen">
        </form>

    </section>


    <section class="resumen">
        <section class="menu-archivos">

        <!-- Seccion que busca y publica las imagenes-->
            <?php

                $array=[];
                $nombre=$_SESSION['nombre'];

                $conectar=mysqli_connect('localhost','root','','usuarios');
                $sql="SELECT ubicacion FROM publicacion WHERE id_user = '$nombre'";
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