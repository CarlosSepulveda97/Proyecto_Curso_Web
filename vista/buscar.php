<?php

session_start();
$busqueda=$_POST['busqueda'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilosBuscar.css">
    <title>Document</title>
</head>
<body>
       
<header>

    <!--Logo y boton de inicio de sesion-->
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
                <li><a href="home.php">Home</a></li>
            </ul>
        </section>
        <section class="categorias"> 
            <a href="perfil.php"><input class="button_mediano" type="submit" value="<?php echo $_SESSION['nombre']?>"></a>
            <div class="lista-categorias">
                        <a href="#">Ayuda</a>
                        <a href="#">Ajustes</a>
                        <a href="index.php">Cerrar sesion</a>
                     </div>
        </section>
</header>


<!-- BUSCADOR-->
<section id="buscador">
        <form action="./buscar.php" method="POST">
            <input name="busqueda" type="text" placeholder="Buscar..." >
            <input id="boton_buscar" type="submit" value="Buscar!">
        </form>
    </section>


<!--BUSCAR Y MOSTRAR USUARIOS
    BUSQUEDA AUN NO IMPLEMENTADA, TRABAJARA POR CARACTERES Y MOSTRARA AQUELLO CON LO QUE TIENE COINSIDENCIA EN ORDEN DESENDIENTE EN BASE AL PORCENTAJE
-->

    <section class="container">
    <?php
            $con=mysqli_connect('localhost','root','','usuarios');
            $queri="SELECT * FROM info";
            $consulta=mysqli_query($con,$queri);
            
            while($fila=mysqli_fetch_array($consulta)){
                if ($fila['nombre']!=$_SESSION['nombre']){
                    echo "<a id='casillas' href='./visita.php?nombre=".$fila['nombre']."&id=".$fila['idCuenta']."'>";
                    echo <<< EOT
                    <section class="container__elemento">
                        <img src=$fila[ubicacion] alt="" width="100px" height="100px">
                        <section class="info">
                            <p id="nombre">$fila[nombre]</p>
                            <p id="descripcion">$fila[descripcion]</p>
                        </section>
                    </section>
                    </a>
                EOT;
                }
                
            }
    ?>

    </section> 


</body>
</html>