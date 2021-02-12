<?php
    session_start();
    include("./ConfigBD.php");
    if(!isset($_SESSION["usuario"])){
        header("Location: ../");
    }

    $id=$_POST["checaID"];

    $sqlChecaID="SELECT * FROM asistente WHERE id_asistente=$id";
    $ejecutaChecaID=mysqli_query($conexion,$sqlChecaID);
    $resChecaID=mysqli_num_rows($ejecutaChecaID);
    $resAsoChecaID=mysqli_fetch_assoc($ejecutaChecaID);
    
    if($resChecaID==1){
        echo json_encode($resAsoChecaID);
    }
    else{
        echo "-1";
    }
?>