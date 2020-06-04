<?php
session_start();
$correo=$_SESSION['correo'];
$idSeguir=$_GET['id'];
$boton="";


if(isset($_POST['seguir'])){
    $boton=$_POST['seguir'];
}

if($boton){
    
    $conexion=mysqli_connect('localhost','root','','usuarios');
    $queri="SELECT correo,id FROM cuentas
            WHERE correo='$correo'
            ";
    $ejecutar=mysqli_query($conexion,$queri);
    $list=mysqli_fetch_assoc($ejecutar);
    $idSeguidor=$list['id'];


    $queri2="INSERT INTO seguimiento (idCuentaSeguidor,idCuentaSeguido) 
                VALUES ('$idSeguidor','$idSeguir')
                 ";
    $ejecutar2=mysqli_query($conexion,$queri2);

}