<?php
    session_start();
    include("./ConfigBD.php");
    include("./Funciones.php");
    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    if(isset($_POST["enviar"])){
    $archivo=$_FILES["archivo"]["name"];
    $archivoCopiado=$_FILES["archivo"]["tmp_name"];
    $archivoGuardado="copia_".$archivo;

    if(copy($archivoCopiado,$archivoGuardado)){
    }
    else{
        //echo "Hubo un error <br />";
    }

    if(file_exists($archivoGuardado)){
        $pasador=fopen($archivoGuardado,"r");
        $filas=0;
        while($datos=fgetcsv($pasador, 2200, ",")){
            //echo $datos[0]." ".$datos[1]." ".$datos[2]." ".$datos[3]."<br />";
            $filas++;
            
            if($filas>1){
                $resultado=insertarDatos($datos[0],$datos[1],$datos[2],$datos[3]);

                if($resultado){
                
                }
                else{
                    echo "No se inserto los datos";
                }
            }
        }
    }   
    else{
        //echo "No existe una copia <br />";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href=".././materialize_v1/css/materialize.min.css" rel="stylesheet">
    <link href=".././fontAwesome/css/font-awesome.min.css" rel="stylesheet">
    <link href=".././css/general.css" rel="stylesheet">
    <link href=".././css/estilos.css" rel="stylesheet">
    <link href=".././css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>  
    <link href=".././jscript/confirm330/css/jquery-confirm.css" rel="stylesheet">
    <link href=".././jscript/validetta/validetta.min.css" rel="stylesheet">
    <script src=".././jscript/jquery-3.3.1.min.js"></script>
    <script src=".././jscript/confirm330/js/jquery-confirm.js"></script>
    <script src=".././js/materialize.js"></script>
    <script src=".././jscript/validetta/validetta.min.js"></script>
    <script src=".././jscript/validetta/validettaLang-es-ES.js"></script>
    <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
    <script src=".././js/init.js"></script>
    <script src=".././js/Pagina_Principal_PERSONAL_VISTAS.js"></script>
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
    <br>
</header>

<main class="valign-wrapper background-color grey">

<div class="contenedor background-color #bdbdbd grey lighten-1">
    <br><br><br><br><br><br><br>
        <div id="formEnviarBase" class="container">
            <div class="row">
                <div class="col s12 m6 offset-m3 input-field">
                    <form id="formEnviarBase" method="post" class="formEnviarBase" enctype="multipart/form-data">
                    <input type="file" name="archivo" class="form-control">
                    <br>
                    <input type="submit" value="Subir Base" class="btn blue black-text" style="width:100%" name="enviar">
                    </form>
                </div>
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