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
            <input class="button_mediano" type="submit" value="<?php echo $_SESSION['usuario']?>"></a>
            <div class="lista-categorias">
                        <a href="#">Ayuda</a>
                        <a href="#">Ajustes</a>
                        <a href="index.php">Cerrar sesion</a>
                     </div>
        </section>
</header>


<section class="cuerpo">

    <section class="info">
        <img src="./img/persona.jpg" alt="">
        <section class="detalles">
            <p id="nombre">
            <?php echo $_SESSION['usuario']?>
            </p>
            <p id="estado">
                Es un bonito dia.
            </p>

            <p id="ubicacion">
                Berlin, Germany.
            </p>

            <button>Editar</button>
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

    <section class="resumen">
        <section class="menu-archivos">
            <img src="./img/b1.jpg" alt="">
            <img src="./img/b2.jpg" alt="">
        </section>
    </section>

    <section class="">

    </section>

</section>


    
</body>
</html>