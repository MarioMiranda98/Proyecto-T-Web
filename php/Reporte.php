<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    $sqlVerGalardonados="SELECT * FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela";
    $ejecutarVerGalardonados=mysqli_query($conexion,$sqlVerGalardonados);
    $filasVerGalardonados="";
    while($filas=mysqli_fetch_array($ejecutarVerGalardonados,MYSQLI_BOTH)){
        $filasVerGalardonados.="<tr>
            <td>$filas[6]</td>
            <td>$filas[9]</td>
            <td>$filas[2]</td>
            </tr>
        ";
    }

    $html="
    <style>
        #Texto{
            position: relative;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }
        #tabla{
            
        }
    </style>
    <body>
    <div id='Texto'><h1>En este documento se encuntran listados los asistentes que estan presentes con su respectivas observaciones</h1></div>
    <br><br><br><br><br>
    <div>
    <table>
        <thead>
            <tr><th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Escuela&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Observaciones</th></tr>
        </thead>
    </table>

    <table>
        <tbody>
            <?php
                echo $filasVerGalardonados; 
            ?>
        </tbody>
    </table>

</div>
    </body>
    ";

    require("../mpdf60/mpdf.php");

    $mpdf=new mPDF();
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit;
?>