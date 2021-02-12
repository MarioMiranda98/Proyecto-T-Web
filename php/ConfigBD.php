<?php
    $servidorBD="localhost";
    $usuarioBD="root";
    $passwordBD="";
    $nombreBD="galard_ipn";

    $conexion=mysqli_connect($servidorBD,$usuarioBD,$passwordBD,$nombreBD);

    if(mysqli_connect_errno($conexion)){
        die("Problemas con el servidor Mysql: ".mysqli_connect_error());
    }
    else{
        mysqli_query($conexion,"SET NAME 'utf8'");
        //echo "Conexion exitosa";
    }
?>