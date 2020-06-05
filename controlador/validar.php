<?php


session_abort();
session_start();


$ejecutar=false;
$sql="";

$conectar=mysqli_connect('localhost','root','');//Coencta al servidor

if (!$conectar){
    echo"No se pudo conectar con el servidor";
}
else{
    $base=mysqli_select_db($conectar,'usuarios');//conecta a la abse de datos
    if (!$base){
        echo"No se encontro la base de datos";
    }
}

$nombre = $_POST['user'];
$_SESSION['correo']=$_POST['user'];
$password = $_POST['pass'];

$_SESSION['nombre']=$nombre;//se agrega el nombre a el array de sesion


$sql ="SELECT * FROM cuentas WHERE correo = '$nombre' AND pass = '$password' LIMIT 1";//queri

$ejecutar=mysqli_query($conectar,$sql);//true si se logro hacer la query, pero no devulve ningun valor

if(!$user=mysqli_fetch_assoc($ejecutar)){ //$user es un array con la informacion obtenida de la consulta $ejecutar se puede imprimir con var_dump($user);
    echo"Error";

} 
else{
    $_SESSION['id']=$user['id'];
    header("Status: 301 Moved Permanently");
    header("Location: ../vista/home.php");
    exit;
}


    //redirigir a home.php si es correcto, si no, mostrar un mensaje de datos incorrectos, un globo de texto
