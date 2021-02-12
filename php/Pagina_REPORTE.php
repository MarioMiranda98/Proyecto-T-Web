<?php
    session_start();
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    $sqlObtenerDatos="SELECT COUNT(*) total FROM asistencia";
    $ejecutarObtenerDatos=mysqli_query($conexion,$sqlObtenerDatos);
    $infoObtenerDatos=mysqli_fetch_assoc($ejecutarObtenerDatos);
    $datos=json_encode($infoObtenerDatos["total"]);

    $sqlObtenPremios="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=1";
    $ejecutarObtenerPremios=mysqli_query($conexion,$sqlObtenPremios);
    $infoObtenerPremios=mysqli_fetch_assoc($ejecutarObtenerPremios);
    $Esfuerzo=json_encode($infoObtenerPremios['total']);

    $sqlObtenPremios2="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=2";
    $ejecutarObtenerPremios2=mysqli_query($conexion,$sqlObtenPremios2);
    $infoObtenerPremios2=mysqli_fetch_assoc($ejecutarObtenerPremios2);
    $Merito=json_encode($infoObtenerPremios2['total']);

    $sqlObtenPremios3="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=3";
    $ejecutarObtenerPremios3=mysqli_query($conexion,$sqlObtenPremios3);
    $infoObtenerPremios3=mysqli_fetch_assoc($ejecutarObtenerPremios3);
    $Cultura=json_encode($infoObtenerPremios3['total']);

    $sqlObtenPremios4="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=4";
    $ejecutarObtenerPremios4=mysqli_query($conexion,$sqlObtenPremios4);
    $infoObtenerPremios4=mysqli_fetch_assoc($ejecutarObtenerPremios4);
    $Deporte=json_encode($infoObtenerPremios4['total']);

    $sqlObtenPremios5="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=5";
    $ejecutarObtenerPremios5=mysqli_query($conexion,$sqlObtenPremios5);
    $infoObtenerPremios5=mysqli_fetch_assoc($ejecutarObtenerPremios5);
    $Batiz=json_encode($infoObtenerPremios5['total']);

    $sqlObtenPremios6="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=6";
    $ejecutarObtenerPremios6=mysqli_query($conexion,$sqlObtenPremios6);
    $infoObtenerPremios6=mysqli_fetch_assoc($ejecutarObtenerPremios6);
    $Vallejo=json_encode($infoObtenerPremios6['total']);

    $sqlObtenPremios7="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=7";
    $ejecutarObtenerPremios7=mysqli_query($conexion,$sqlObtenPremios7);
    $infoObtenerPremios7=mysqli_fetch_assoc($ejecutarObtenerPremios7);
    $Decano=json_encode($infoObtenerPremios7['total']);

    $sqlObtenPremios8="SELECT COUNT(*) total FROM asistencia, asistente, escuela WHERE asistencia.id_asistente=asistente.id_asistente AND escuela.id_escuela=asistente.id_escuela AND asistente.id_premio=8";
    $ejecutarObtenerPremios8=mysqli_query($conexion,$sqlObtenPremios8);
    $infoObtenerPremios8=mysqli_fetch_assoc($ejecutarObtenerPremios8);
    $Investigacion=json_encode($infoObtenerPremios8['total']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Graficas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,
    minimum-scale=1,maximum-scale=1,
    user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href=".././materialize_v1/css/materialize.min.css" rel="stylesheet">
    <link href=".././css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href=".././css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href=".././fontAwesome/css/font-awesome.min.css" rel="stylesheet">
    <link href=".././css/general.css" rel="stylesheet">
    <script src="../jscript/jquery-3.3.1.min.js"></script>
    <script src="../jscript/validetta/validetta.min.js"></script>
    <script src="../jscript/validetta/validettaLang-es-ES.js"></script>
    <script src="../jscript/confirm330/js/jquery-confirm.js"></script>
    <script src="../jscript/plotly-latest.min.js"></script>
    <script src=".././materialize_v1/js/materialize.min.js"></script>
    <script src=".././js/materialize.js"></script>
    <script src="../js/Pagina_REPORTE.js"></script>
</head>
<body>
<header class="background-color grey">
    <img class="responsive-img" src="../imgs/header.gif">
<!--Nav responsivo-->
    <nav class="#b71c1c red darken-4 lighten-1" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="./Pagina_Principal.php " class="brand-logo"><i class="fa fa-home"></i> INICIO</a>
    
          <ul class="right hide-on-med-and-down">
            <li><a href="./Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
            <li><a href="./Pagina_Principal_GALARDONADOS.php"><i class="fa fa-users"></i>  Galardonados</a></li>
          </ul>
    <!--EN LUGAR DE LOS "#" VA LA PARAGINA A QUE SE DIRIJIRÁ-->
          <ul id="nav-mobile" class="sidenav">
                <li><a href="./Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
                <li><a href="./Pagina_Principal_GALARDONADOS.php"><i class="fa fa-user"></i>  Galardonados</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <br><br>
</header>
<main class="valign-wrapper background-color grey">
    <div class="container">
        <div class="row">
             <div class="row backgorund-color #eceff1 blue-grey lighten-4">
        
                <div class="aligin center color red">
                    <b>GR&Aacute;FICAS</b>
                </div>
                <div class="col s12 m6 offset-m3" id="Graficas">
                    <div id="asistencia"></div>
                    <script>
                        function crearCadena(json){
                            var convertido=JSON.parse(json);
                            return convertido;
                        }
                    </script>
                    <script>

                        datosY=crearCadena('<?php echo $datos?>');

                        var datos=[
                            {
                                x:['Presente','Falta'],
                                y:[datosY,(544-datosY)],
                                type: 'bar',
                            }
                        ];

                        Plotly.newPlot('asistencia',datos);
                    </script>
                </div>

                <div class="col s12 m6 offset-m3" id="Graficas">
                    <div id="premios"></div>
                    <script>
                        function crearCadena(json){
                            var convertido=JSON.parse(json);
                            return convertido;
                        }
                    </script>
                    <script>

                        Esfuerzo=crearCadena('<?php echo $Esfuerzo?>');
                        Merito=crearCadena('<?php echo $Merito?>');
                        Cultura=crearCadena('<?php echo $Cultura?>');
                        Deporte=crearCadena('<?php echo $Deporte?>');
                        Batiz=crearCadena('<?php echo $Batiz?>');
                        Vallejo=crearCadena('<?php echo $Vallejo?>');
                        Decano=crearCadena('<?php echo $Decano?>');
                        Investigacion=crearCadena('<?php echo $Investigacion?>');

                        var datos=[
                            {
                                x:['EE','MP','CL','DP','BT','VL','DC','IV'],
                                y:[Esfuerzo,Merito,Cultura,Deporte,Batiz,Vallejo,Decano,Investigacion],
                                type: 'bar',
                            }
                        ];

                        Plotly.newPlot('premios',datos);
                    </script>
                </div>

             </div>
            <div class="col s12 m6 offset-m3 input-field">
                <button type="submit" id="reporte" class="btn blue black-text" style="width:100%">
                    <i class='fa fa-file-pdf-o'></i>  Generar Reporte
                </button>
            </div>
        </div>
    </div>

</main>
<footer class="page-footer #b71c1c red darken-4">
        <div class="footer-copyright">
          <div class="container">
          © 2014 Copyright / ESCOM
          <a class="grey-text text-lighten-4 right" href="https://www.ipn.mx/" target="_blank">IPN</a>
          </div>
        </div>
</footer>
</body>
</html>