<?php
    function insertarDatos($idPremio,$idEscuela,$nombre,$rfc){
        global $conexion;
        $sqlInsertaDatos="INSERT INTO asistente VALUES (NULL,'$idPremio','$idEscuela','$nombre','$rfc')";
        $ejecutarInsertaDatos=mysqli_query($conexion,$sqlInsertaDatos);
        return $ejecutarInsertaDatos;
    }
?>