<?php

session_start();

$nombre_imagen=$_FILES['imagen']['name'];
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/proyecto_web/vista/archivos/';

move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);

$conectar=mysqli_connect('localhost','root','','usuarios');


$nombre=$_SESSION['nombre'];
$ubicacion='./archivos/'.$nombre_imagen;
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$ciudad=$_POST['ciudad'];
$id=$_SESSION['id'];


$sql="UPDATE info SET nombre='$nombre',descripcion='$descripcion',ubicacion='$ubicacion',ciudad='$ciudad'
        WHERE idCuenta='$id'";

$ejecutar=mysqli_query($conectar,$sql);
if($ejecutar){
   header('location:'.'../vista/perfil.php');     
}
else{
   header('location:'.'../vista/error.php'); 
}