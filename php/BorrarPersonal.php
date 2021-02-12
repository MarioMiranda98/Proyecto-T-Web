<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    $usuario=$_POST["usuario"];

    $sqlBorrarUsuario="DELETE FROM personal WHERE usuario='$usuario'";
    $resBorrarUsuario=mysqli_query($conexion, $sqlBorrarUsuario);
    $infoBorrarUsuario=mysqli_affected_rows($conexion);

    echo $infoBorrarUsuario;
?>