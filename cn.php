<?php

    $conexion = mysqli_connect("localhost", "root", "130198", "guardar");
    if(!$conexion){
        echo 'Error en conexion a la base de datos';
    
    }
    else{
        echo'Conexion exitosa a la base de datos';
    }
?>