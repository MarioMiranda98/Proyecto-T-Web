<?php
    session_start();
    include("./ConfigBD.php");
    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }
    $sqlInfoTemporal="SELECT * FROM personal WHERE usuario='".$_SESSION["usuario"]."'";
    $consInfoTemporal=mysqli_query($conexion,$sqlInfoTemporal);
    $resInfoTemporal=mysqli_fetch_assoc($consInfoTemporal);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galardonados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,
    minimum-scale=1,maximum-scale=1,
    user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../materialize_v1/css/materialize.min.css" rel="stylesheet">
    <link href=".././css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href=".././css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../fontAwesome/css/font-awesome.min.css" rel="stylesheet">
    <link href=".././css/general.css" rel="stylesheet">
    <script src="../jscript/jquery-3.3.1.min.js"></script>
    <script src="../jscript/validetta/validetta.min.js"></script>
    <script src="../jscript/validetta/validettaLang-es-ES.js"></script>
    <script src="../jscript/confirm330/js/jquery-confirm.js"></script>
    <script src=".././materialize_v1/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../.js/materialize.js"></script>
    <script src=".././js/init.js"></script>
    <script src=".././js/Pagina_Principal.js"></script>
    <script src=".././js/Pagina_Principal_PERSONAL.js"></script>
</head>
<body>
<header class="background-color grey">
    <img class="responsive-img" src="./../imgs/header.gif">
<!--Nav responsivo-->
    <nav class="#b71c1c red darken-4 lighten-1" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="./Pagina_Principal.php " class="brand-logo"><i class="fa fa-home"></i>  INICIO</a>
    
          <ul class="right hide-on-med-and-down">
          <?php if($resInfoTemporal["tip_usuario"]=="Principal"):?>
                <li><a href="./Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
            <?php endif;?>
            <li><a href="./Pagina_Principal_GALARDONADOS.php"><i class="fa fa-users"></i>  Galardonados</a></li>
          </ul>
    <!--EN LUGAR DE LOS "#" VA LA PARAGINA A QUE SE DIRIJIRÁ-->
          <ul id="nav-mobile" class="sidenav">
          <?php if($resInfoTemporal["tip_usuario"]=="Principal"):?>
                <li><a href="Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
        <?php endif;?>
                <li><a href="#"><i class="fa fa-user"></i>  Galardonados</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <br><br>
</header>
<main class="valign-wrapper background-color grey">
    <div class="container">
        <div class="row">
            <?php if($resInfoTemporal["tip_usuario"]=="Principal" || $resInfoTemporal["tip_usuario"]=="Listas"):?>
            <div class="col s12 m6 offset-m3 input-field">
            <a href="./PasaLista.php"> <button type="" id="" class="btn blue black-text" style="width:100%">
                   <i class="fa fa-check-square"></i>  Pasar Lista
                </button> </a>
            </div>
            <div class="col s12 m6 offset-m3 input-field">
                <a href="./Pagina_Principal_GALARDONADO_QR.php"><button type="" id="" class="btn blue black-text" style="width:100%">
                    <i class="fa fa-camera"></i>  Pasar Lista - Lector QR
                </button></a>
            </div>
            <div class="col s12 m6 offset-m3 input-field">
               <a href="./Pagina_Principal_GALARDONADO_MODIFICAR.php"><button type="" id="" class="btn blue black-text" style="width:100%">
                    <i class="fa fa-pencil"></i> Modificar Galardonado
                </button></a>
            </div>
            <?php endif;?>
            <div class="col s12 m6 offset-m3 input-field">
               <a href="./Pagina_Principal_GALARDONADO_VISTAS.php"><button type="" id="" class="btn blue black-text" style="width:100%">
                    <i class="fa fa-eye"></i>  Ver Galardonados
                </button></a>
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