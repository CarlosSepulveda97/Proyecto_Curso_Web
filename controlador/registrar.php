<?php
session_start();
$conectar=mysqli_connect('localhost','root','','usuarios');

if (!$conectar){
    echo"No se pudo conectar con el servidor";

}else{
    $base=mysqli_select_db($conectar,'usuarios');
    if (!$base){
        echo"No se encontro la base de datos";
    }
    
}

$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$pass=$_POST['pass'];
$_SESSION['correo']=$correo;

$_SESSION['nombre']=$nombre;//se agrega el nombre a el array de sesion

$sql="INSERT INTO cuentas(nombre,correo,pass) VALUES('$nombre',
                                 '$correo',
                                 '$pass')";

$ejecutar=mysqli_query($conectar,$sql);

$sql2="SELECT id FROM cuentas WHERE correo='$correo'";
$solicitud=mysqli_fetch_assoc(mysqli_query($conectar,$sql2));
$_SESSION['id']=$solicitud['id'];


if(!$ejecutar){
    echo "error";
}else{
    header("Status: 301 Moved Permanently");
    header("Location: ../vista/perfil.php");
    exit;
}


?>