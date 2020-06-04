<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estiloEdit.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>
<body>


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
            <input class="button_mediano" type="submit" value="<?php echo $_SESSION['usuario']?>"></a>
            <div class="lista-categorias">
                        <a href="#">Ayuda</a>
                        <a href="#">Ajustes</a>
                        <a href="index.php">Cerrar sesion</a>
                     </div>
        </section>
</header>


<section id="contenedor">

    <section id="contenedor__edit">

        <form id="formEditar" action="../controlador/datosEditados.php" method="post" enctype="multipart/form-data">
            <label><h1>Nombre:</h1>     <input name="nombre" type="text"></label>
            <label><h1>Descripcion:</h1> <input name="descripcion" type="text"></label>
            <label><h1>     Ciudad:</h1> <input name="ciudad" type="text"></label>
            <input id="seleccion" type="file" name="imagen" id="" >
            <input id="botonEdit" type="submit" value="Enviar Imagen">
        </form>

    </section>

</section>

</body>
</html>