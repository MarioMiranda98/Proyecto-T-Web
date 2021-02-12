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
    <link href="./jscript/validetta/validetta.min.css" rel="stylesheet">
    <link href="./jscript/confirm330/css/jquery-confirm.css" rel="stylesheet">
    <link href=".././css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href=".././css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href=".././fontAwesome/css/font-awesome.min.css" rel="stylesheet">
    <link href=".././css/general.css" rel="stylesheet">
    <script src="../jscript/jquery-3.3.1.min.js"></script>
    <script src="../jscript/confirm330/js/jquery-confirm.js"></script>
    <script src=".././materialize_v1/js/materialize.min.js"></script>
    <script src=".././js/materialize.js"></script>
    <script src="../jscript/validetta/validetta.min.js"></script>
    <script src="../jscript/validetta/validettaLang-es-ES.js"></script>
    <script src=".././js/init.js"></script>
    <script src=".././js/Pagina_Principal.js"></script>
    <script src=".././js/Pagina_Principal_PERSONAL.js"></script>
</head>
<body>
<header class="background-color grey">
    <img class="responsive-img" src=".././imgs/header.gif">
<!--Nav responsivo-->
    <nav class="#b71c1c red darken-4 lighten-1" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="./Pagina_Principal.php " class="brand-logo"><i class="fa fa-home"></i> INICIO</a>
    
          <ul class="right hide-on-med-and-down">
          <?php if($resInfoTemporal["tip_usuario"]=="Principal"):?>
            <li><a href="./Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
           <?php endif;?>
            <li><a href="./Pagina_Principal_GALARDONADOS.php"><i class="fa fa-users"></i>  Galardonados</a></li>
          </ul>
    <!--EN LUGAR DE LOS "#" VA LA PARAGINA A QUE SE DIRIJIRÁ-->
          <ul id="nav-mobile" class="sidenav">
          <?php if($resInfoTemporal["tip_usuario"]=="Principal"):?>
                <li><a href="./Pagina_Principal_PERSONAL.php"><i class="fa fa-user"></i>  Personal</a></li>
          <?php endif;?>   
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
            <div class="col s12 m6 offset-m3 input-field">
                <button id="agregar" class="btn blue black-text" style="width:100%">
                    <i class="fa fa-user-plus"></i>  Agregar Personal
                </button>
            </div>
            <div class="col s12 m6 offset-m3 input-field">
            <a href="./Pagina_Principal_PERSONAL_VISTAS.php">
                <button type="submit" id="ver" class="btn blue black-text" style="width:100%">
                    <i class='fa fa-eye'></i>  Ver Personal
                </button>
            </a>
            </div>
        </div>
    </div>


<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Agregar Personal</h4>
    <form id="formularioAgregaPersonal">
        <div class="input-field">
            <label for="agregaNombre">Nombre</label>
            <input type="text" id="agregaNombre" name="agregaNombre" data-validetta="required" autocomplete="off">
        </div>
        <div class="input-field">
            <label for="agregaPrimerApe">Primer Apellido</label>
            <input type="text" id="agregaPrimerApe" name="agregaPrimerApe" data-validetta="required" autocomplete="off">
        </div>
        <div class="input-field">
            <label for="agregaSegundoApe">Segundo Apellido</label>
            <input type="text" id="agregaSegundoApe" name="agregaSegundoApe" data-validetta="required" autocomplete="off">
        </div>
        <div class="input-field">
            <label for="agregaUsuario">Usuario</label>
            <input type="text" id="agregaUsuario" name="agregaUsuario" data-validetta="required,minLength[5],maxLength[20]" autocomplete="off">
        </div>
        <div class="input-field">
            <label for="agregaContrasena">Contrase&ntilde;a</label>
            <input type="text" id="agregaContrasena" name="agregaContrasena" data-validetta="required" autocomplete="off">
        </div>
        <div class="input-field">
            <label for="agregaTipoUsuario">Tipo de usuario</label>
            <br>
                <select name="agregaTipoUsuario" id="agregaTipoUsuario">
                    <option value="Principal">Principal</option>
                    <option value="Listas">Listas</option>
                    <option value="Bambalinas">Bambalinas</option>
                </select>
        </div>
        <div class="input-field">
            <button type="submit" class="btn" style="width:100%;">Agregar</button>
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