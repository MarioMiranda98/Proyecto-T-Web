<?php
    session_start();
    include("./configBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Galardonado-QR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../materialize_v1/css/materialize.min.css" rel="stylesheet">
    <link href="../fontAwesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/estilos.css" rel="stylesheet">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../jscript/confirm330/css/jquery-confirm.css" rel="stylesheet">
    <link href="../jscript/validetta/validetta.min.css" rel="stylesheet">
    <script src="../jscript/jquery-3.3.1.min.js"></script>
    <script src="../jscript/confirm330/js/jquery-confirm.js"></script>
    <script src="../jscript/validetta/validetta.min.js"></script>
    <script src="../jscript/validetta/validettaLang-es-ES.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../jscript/instascan.min.js"></script>
    <script src="../js/Pagina_Principal_GALARDONADO_QR.js"></script>
</head>
<body>
<header class="background-color grey">
    <img class="responsive-img" src="../imgs/header.gif">
    <!--Nav responsivo-->
    <nav class="#b71c1c red darken-4 lighten-1" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="./Pagina_Principal.php" class="brand-logo"><i class="fa fa-home"></i> INICIO</a>
    
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

      <div class="col s7 centered">
        <video id="preview"></video>
      </div>

</div>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Asistente</h4>
            <form id="confirmarPorIDQR">
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="confirmarID">ID</label>
                    <br>
                    <input type="text" id="confirmarID" name="confirmarID" data-validetta="required,number,maxLength[3]" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="confirmarNombre">Nombre</label>
                    <br>
                    <input type="text" id="confirmarNombre" name="confirmarNombre" data-validetta="required" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="confirmarRFC">RFC</label>
                    <br>
                    <input type="text" id="confirmarRFC" name="confirmarRFC" data-validetta="required" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="confirmarObservaciones">Observaciones</label>
                    <br>
                    <input type="text" id="confirmarObservaciones" name="confirmarObservaciones" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="confirmarAsiento">Asiento</label>
                    <br>
                    <input type="text" id="confirmarAsiento" name="confirmarAsiento" data-validetta="required,number" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <button type="submit" id="btnID" class="btn" style="width: 100%">Registrar</button>
                </div>
            </form>
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