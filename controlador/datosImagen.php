<?php

session_start();

$id_user=$_SESSION['id'];

$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamano_imagen=$_FILES['imagen']['size'];
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/proyecto_web/vista/archivos/';

move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);

$conectar=mysqli_connect('localhost','root','','usuarios');

$nombre=$_SESSION['nombre'];
$ubicacion='./archivos/'.$nombre_imagen;

$sql="INSERT INTO publicacion (id_user,ubicacion) VALUES('$id_user','$ubicacion')";

$ejecutar=mysqli_query($conectar,$sql);