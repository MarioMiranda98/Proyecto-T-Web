<?php
    session_start();
    $temporal=$_REQUEST["nombreSesion"];
    unset($_SESSION[$temporal]);
    header("Location:../");
?>