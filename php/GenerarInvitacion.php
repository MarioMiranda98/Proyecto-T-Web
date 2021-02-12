<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }
    $id=$_POST["id"];
    
    $sqlGenerarPDF="SELECT * FROM asistente WHERE id_asistente=$id";
    $ejecutarGenerarPDF=mysqli_query($conexion,$sqlGenerarPDF);
    $infoGenerarPDF=mysqli_fetch_array($ejecutarGenerarPDF);

    $idAsistente=$infoGenerarPDF[0];
    $nombreAsistente=$infoGenerarPDF[3];

    $html="
    <style>
        #Texto{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }

        #Qr{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }
    </style>
    <body>
    <br><br><br><br><br><br>
    <div id='Texto'><h1>Hola $nombreAsistente, le mando un saludo cordial y de la manera mas atenta aprovecho para invitarle a la ceremonia de entrega de galardones, que se llevara a cabo en el auditorio
    Jaime Torres Bodet, sin mas le adjunto su codigo Qr para su facil acceso.</h1></div>
    <br><br><br><br><br>
    <div id='Qr'><barcode code='$idAsistente' size='5' type='QR'/></div>
    </body>
    ";
    require("../mpdf60/mpdf.php");

    $mpdf=new mPDF();

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetDefaultBodyCSS('background',"url('../imgs/CARTEL.jpg')");
    $mpdf->SetDefaultBodyCSS('background-image-resize',6);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;
?>