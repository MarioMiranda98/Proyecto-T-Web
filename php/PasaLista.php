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
    <title>Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,
    minimum-scale=1,maximum-scale=1,
    user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../materialize_v1/css/materialize.min.css" rel="stylesheet">
    <link href="../fontAwesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="../jscript/jquery-3.3.1.min.js"></script>
    <script src="../jscript/validetta/validetta.min.js"></script>
    <script src="../jscript/validetta/validettaLang-es-ES.js"></script>
    <script src="../jscript/confirm330/js/jquery-confirm.js"></script>
    <script src=".././materialize_v1/js/materialize.min.js"></script>
    <script src="../js/materialize.js"></script>
   <script src="../js/PasarLista.js"></script>
</head>
<body>
<header class="background-color grey">
    <img class="responsive-img" src="../imgs/header.gif">
<!--Nav responsivo-->
    <nav class="#b71c1c red darken-4 lighten-1" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="../php/Pagina_Principal.php " class="brand-logo"><i class="fa fa-home"></i> INICIO</a>
    
          <ul class="right hide-on-med-and-down">
            <li><a href="../php/Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
            <li><a href="../php/Pagina_Principal_GALARDONADOS.php"><i class="fa fa-users"></i>  Galardonados</a></li>
          </ul>
    <!--EN LUGAR DE LOS "#" VA LA PARAGINA A QUE SE DIRIJIRÁ-->
          <ul id="nav-mobile" class="sidenav">
                <li><a href="../php/Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
                <li><a href="../php/Pagina_Principal_GALARDONADOS.php"><i class="fa fa-user"></i>  Galardonados</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <br><br>
</header>
<main class="valign-wrapper background-color grey">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3 input-field">
                <button type="submit" id="id" class="btn blue black-text" style="width:100%">
                    <i class="fa fa-id-card-o"></i>  Checar por ID
                </button>
            </div>
            <div class="col s12 m6 offset-m3 input-field">
                <button type="submit" id="nombre" class="btn blue black-text" style="width:100%">
                    <i class="fa fa-address-book-o"></i>  Checar por Nombre
                </button>
            </div>
        </div>
    </div>

<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Checar por ID</h4>
            <form id="checarPorID">
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="checaID">ID</label>
                    <input type="text" id="checaID" name="checaID" data-validetta="required,number,maxLength[3]" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <button type="submit" id="btnChecarID" class="btn" style="width: 100%">Checar</button>
                </div>
            </form>
    </div>
</div>

<div id="modal3" class="modal">
    <div class="modal-content">
        <h4>Checar por Nombre</h4>
            <form id="checarPorNombre">
                <div class="col s12 m6 offset-m3 input-field">
                    <label for="checaID">Nombre</label>
                    <input type="text" id="checaNombre" name="checaNombre" data-validetta="required" autocomplete="off">
                </div>
                <div class="col s12 m6 offset-m3 input-field">
                    <button type="submit" id="btnChecarNombre" class="btn" style="width: 100%">Checar</button>
                </div>
            </form>
    </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content">
        <h4>Asistente</h4>
            <form id="confirmarPorID">
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