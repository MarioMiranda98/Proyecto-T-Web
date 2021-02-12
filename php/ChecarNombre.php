<?php
    session_start();
    include("./ConfigBD.php");
    if(!isset($_SESSION["usuario"])){
        header("Location: ../");
    }

    $nombre=$_POST["checaNombre"];
    $nombre=htmlspecialchars($nombre);
    $nombre=filter_var($nombre, FILTER_SANITIZE_STRING);

    $sqlChechaNombre="SELECT * FROM asistente where nombre='$nombre'";
    $ejecutaChecaNombre=mysqli_query($conexion,$sqlChechaNombre);
    $resChecaNombre=mysqli_num_rows($ejecutaChecaNombre);
    $resAsoChecaNombre=mysqli_fetch_assoc($ejecutaChecaNombre);

    if($resChecaNombre==1){
        echo json_encode($resAsoChecaNombre);
    }
    else{
        echo "-1";
    }
?>