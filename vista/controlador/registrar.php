<?php

$conectar=mysqli_connect('localhost','root','');

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

$sql="INSERT INTO cuentas VALUES('$nombre',
                                 '$correo',
                                 '$pass')";

$ejecutar=mysqli_query($conectar,$sql);

if(!$ejecutar){
    echo "error";
}else{
    header("Status: 301 Moved Permanently");
    header("Location: ../vista/home.php");
    exit;
}


?>