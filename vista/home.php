<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estiloHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>
<body>
    
<header><!--Logo y boton de inicio de sesion-->
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
            <a href="./perfil.php"><input class="button_mediano" type="submit" value="<?php echo $_SESSION['nombre']?>"></a>
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






<!--Generador de imagenes en base a los seguidos  -->    

<section id="dashboard">
    <?php

    $idCuenta=$_SESSION['id'];
    $conexion=mysqli_connect('localhost','root','','usuarios');
    $queri="SELECT idCuentaSeguido FROM seguimiento 
            WHERE idCuentaSeguidor='$idCuenta'";
    
    $ejecutar=mysqli_query($conexion,$queri);
    while($fila=$ejecutar->fetch_assoc()){
        $idCuentaSeguido=$fila['idCuentaSeguido'];
        $sql="SELECT ubicacion FROM publicacion WHERE id_user ='$idCuentaSeguido'";
        $solicitud=mysqli_query($conexion,$sql);
 
        while($lista=$solicitud->fetch_assoc()){
            echo <<< EOT
            <section id="imagenes">
                <img id="publicacion" src='$lista[ubicacion]' alt="">
                <section id="opciones">
                    <img src="./img/like.png" alt="">
                    <img src="./img/fork.png" alt="">
                </section>
            </section>
            EOT;
        }
    }
    



?>
</section>






































<!--
    <section id="dashboard">
        <section id="imagenes">
            <img src="./img/b1.jpg" alt="">
            <section id="opciones">
            <img src="./img/like.png" alt="">
            <img src="./img/fork.png" alt="">
            </section>
        </section>
-->    
        


</body>
</html>