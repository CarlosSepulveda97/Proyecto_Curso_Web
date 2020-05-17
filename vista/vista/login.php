<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estiloIndex.css">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>
<body>
    <header><!--Logo y boton de inicio de sesion-->
        <img id="logo" src="./img/logo.png" alt="logo">

        <a href="index.php"><input class="button_mediano" type="submit" value="Registro"></a>
        
    </header>

    <section class="cuerpo">

        <img id="imagendeco2" src="./img/deco.jpg" alt="">

        <section>
        <p>Que Bueno tenerte de vuelta</p>

        <form action="../controlador/validar.php" method="POST">

		    <input type="text" name="user" placeholder="Correo Electronico">
            <input type="text" name="pass" placeholder="Contraseña">
            <section class="loginextra"> 
                <section>
                <img class="logincon" src="./img/fbdark.png" alt="">
                <img class="logincon" src="./img/google.png" alt="">
                </section>

                <input id="submit" type="submit" value="Iniciar">
                
            </section>
            
        </form>
        </section>

    </section>

    <footer>

        <section>
            <p>Tus diseños siempre contigo.</p>
            <p>Boceto © 2020</p>
        </section>

        <section>
            <img class="icon" id="fb" src="./img/fb.png" alt="">
            <img class="icon" id="instagram" src="./img/instagram.png" alt="">
            <img class="icon" id="pinterest" src="./img/pinterest.png" alt="">
        </section>

    </footer>

</body>
</html>