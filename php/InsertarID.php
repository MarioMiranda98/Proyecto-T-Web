<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    $id=$_POST["confirmarID"];

    $observacion=$_POST["confirmarObservaciones"];
    $observacion=htmlspecialchars($observacion);
    $observacion=filter_var($observacion, FILTER_SANITIZE_STRING);

    $asiento=$_POST["confirmarAsiento"];


    $sqlRegistrarAsistente="INSERT INTO asistencia VALUES ($id,$asiento,'$observacion')";
    $ejecutarRegistrarAsistente=mysqli_query($conexion,$sqlRegistrarAsistente);
    $infoRegistrarAsistente=mysqli_affected_rows($conexion);

    echo $infoRegistrarAsistente;
?>