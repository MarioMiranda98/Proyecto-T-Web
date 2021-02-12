<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    $usuario=$_POST["usuario"];

    $sqlEditarPersonal="SELECT * FROM personal WHERE usuario='$usuario'";
    $resEditarPersonal=mysqli_query($conexion, $sqlEditarPersonal);
    $infoEditarPersonal=mysqli_fetch_assoc($resEditarPersonal);

    echo json_encode($infoEditarPersonal);
?>