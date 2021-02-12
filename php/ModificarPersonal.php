<?php
     session_start();
     include("./ConfigBD.php");

     if(!isset($_SESSION["usuario"])){
          header("Location:../");
     }

     $usuario=$_POST["usuario"];

     $nombre=$_POST["nombre"];
     $nombre=htmlspecialchars($nombre);
     $nombre=filter_var($nombre, FILTER_SANITIZE_STRING);

     $primerApe=$_POST["primerApe"];
     $primerApe=htmlspecialchars($primerApe);
     $primerApe=filter_var($primerApe, FILTER_SANITIZE_STRING);

     $segundoApe=$_POST["segundoApe"];
     $segundoApe=htmlspecialchars($segundoApe);
     $segundoApe=filter_var($segundoApe, FILTER_SANITIZE_STRING);

     $tipoUsuario=$_POST["TipoUsuario"];
    
     $sqlModificaUsuario="UPDATE personal SET nombre='$nombre', primer_ape='$primerApe', segundo_ape='$segundoApe', tip_usuario='$tipoUsuario' WHERE usuario='$usuario'";
     $ejecutaModificaUsuario=mysqli_query($conexion, $sqlModificaUsuario);
     $infoModificaUsuario=mysqli_affected_rows($conexion);

     echo $infoModificaUsuario;
?>