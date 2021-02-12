<?php
    session_start();
    include("./ConfigBD.php");

    $usuario=$_POST["usuario"];
    $usuario=htmlspecialchars($usuario);
    $usuario=filter_var($usuario,FILTER_SANITIZE_STRING);
    $contrasena=$_POST["contrasena"];
    $contrasena=htmlspecialchars($contrasena);
    $contrasena=filter_var($contrasena,FILTER_SANITIZE_STRING);
    $contrasena=md5($contrasena);

    $sqlChecarUsuario="SELECT * FROM personal WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $ejecutarSql=mysqli_query($conexion,$sqlChecarUsuario);
    $informacionSql=mysqli_num_rows($ejecutarSql);


    if($informacionSql==1){
        $_SESSION["usuario"]=$usuario;
    }

    echo $informacionSql;
?>