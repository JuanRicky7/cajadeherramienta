<?php

use function PHPSTORM_META\elementType;

include 'cn.php';

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$mensaje = trim($_POST['mensaje']);

$insetar = "INSERT INTO contacto (nombre, correo, mensaje)  
VALUES ('$nombre', '$correo', '$mensaje')";

if(isset($_POST['boton'])){
    if(empty($nombre)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
    }
    else if(empty($correo)){
        echo '<script language="javascript">
        window.location="index.html;
        </script>';
        exit();
    }
    
     else if(empty($mensaje)){
        echo '<script language="javascript">
        window.location="index.html";
        </script>';
        exit();
    }
}//cierra isset

$verificar_nombre = mysqli_query($conexion, "SELECT * FROM contacto WHERE nombre='$nombre'");
if(mysqli_num_rows($verificar_nombre)>0){
  unset($_POST['nombre']);
    unset($_POST['correo']);
    echo '<script language="javascript">alert("Error: El usuario ya existe"); window.location="index.html";</script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM contacto WHERE correo='$correo'");
if(mysqli_num_rows($verificar_correo)>0){
    echo '<script language="javascript">alert("Error: El correo ya existe"); window.location="index.html";</script>';
    exit;
}

if(strlen($nombre)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
}  
if(strlen($correo)>100){
    echo '<script language="javascript">window.history.go(-1);</script>';
    exit;
}  




//ejecutar consulta
$resultado = mysqli_query($conexion,$insetar);
if(!$resultado){
    echo 'Error al registrar al usuario';
} else {
 
    echo '<script language="javascript">alert("Usuario registrado exitosamente"); window.location="index.html";</script>';
}

mysqli_close($conexion);
