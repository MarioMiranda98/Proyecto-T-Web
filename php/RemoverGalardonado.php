<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    $id=$_POST["id_asistente"];
    
    $sqlEliminaGalardonado="DELETE FROM asistencia WHERE id_asistente=$id";
    $ejecutarEliminaGalardonado=mysqli_query($conexion,$sqlEliminaGalardonado);
    $infoEliminaGalardonado=mysqli_affected_rows($conexion);

    echo $infoEliminaGalardonado;
?>