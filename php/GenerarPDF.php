<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }
    $id=$_GET["id_asistente"];
    
    $sqlGenerarPDF="SELECT * FROM asistencia, asistente, escuela, premios WHERE asistencia.id_asistente=$id AND asistente.id_asistente=$id AND asistente.id_escuela=escuela.id_escuela AND asistente.id_premio=premios.id_premio";
    $ejecutarGenerarPDF=mysqli_query($conexion,$sqlGenerarPDF);
    $infoGenerarPDF=mysqli_fetch_array($ejecutarGenerarPDF);

    $nombre=$infoGenerarPDF[6];
    $premio=$infoGenerarPDF[11];
    $unidad=$infoGenerarPDF[9];
    $html="
    <style>
        #Texto{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }

        #Texto2{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }

        #Texto3{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }

        #Texto4{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }
    </style>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <div id='Texto'><h1>Al Docente $nombre</h1></div>
    <br>
    <div id='Texto2'><h1>Por su obtención del premio: '$premio' perteneciente a la unidad academica $unidad</h1></div>
    <br><br>
    <div id='Texto3'><h1>Firma Director General: </h1></div>
    <div id='Texto4'><h1>Mario Alberto Rodr&iacute;guez Casas</h1></div>
    ";
    require("../mpdf60/mpdf.php");

    $mpdf=new mPDF("c","A4-L");

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetDefaultBodyCSS('background',"url('../imgs/reconocimiento_2b.jpg')");
    $mpdf->SetDefaultBodyCSS('background-image-resize',6);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;
?>