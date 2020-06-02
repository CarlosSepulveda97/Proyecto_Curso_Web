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
    
<a>HOLA</a>

<section id="contenedor">

    <section id="subir">

        

        <form id="formEditar" action="../controlador/datosEditados.php" method="post" enctype="multipart/form-data">
            <p>     Nombre: <input type="text"></p>
            <p>Descripcion: <input type="text"></p>
            <p>  Ubicacion: <input type="text"></p>
            <input id="seleccion" type="file" name="imagen" id="" >
            <input id="boton" type="submit" value="Enviar Imagen">
        </form>

    </section>

</section>

</body>
</html>