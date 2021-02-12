<?php 
    session_start();
    include("./ConfigBD.php");
    if(!isset($_SESSION["usuario"])){
        header("Location: ../");
    }

    $nombre=$_POST["agregaNombre"];
    $nombre=htmlspecialchars($nombre);
    $nombre=filter_var($nombre, FILTER_SANITIZE_STRING);

    $primerApellido=$_POST["agregaPrimerApe"];
    $primerApellido=htmlspecialchars($primerApellido);
    $primerApellido=filter_var($primerApellido, FILTER_SANITIZE_STRING);

    $segundoApellido=$_POST["agregaSegundoApe"];
    $segundoApellido=htmlspecialchars($segundoApellido);
    $segundoApellido=filter_var($segundoApellido, FILTER_SANITIZE_STRING);

    $usuario=$_POST["agregaUsuario"];
    $usuario=htmlspecialchars($usuario);
    $usuario=filter_var($usuario, FILTER_SANITIZE_STRING);

    $contrasena=$_POST["agregaContrasena"];
    $contrasena=htmlspecialchars($contrasena);
    $contrasena=filter_var($contrasena, FILTER_SANITIZE_STRING);
    $contrasena=md5($contrasena);

    $tipoUsuario=$_POST["agregaTipoUsuario"];
    $tipoUsuario=htmlspecialchars($tipoUsuario);
    $tipoUsuario=filter_var($tipoUsuario, FILTER_SANITIZE_STRING);

    $sqlInsertaPersonal="INSERT INTO personal VALUES('$nombre','$primerApellido','$segundoApellido','$usuario','$contrasena','$tipoUsuario')";
    $ejecutaInsertaPersonal=mysqli_query($conexion,$sqlInsertaPersonal);
    $infoInsertaPersonal=mysqli_affected_rows($conexion);

    echo $infoInsertaPersonal;
?>