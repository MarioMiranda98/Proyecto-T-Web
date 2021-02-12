<?php
    session_start();
    include("./configBD.php");

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
            <td><i class='fa fa-user-times fa-2x borrar' data-asistente='$filas[0]'></i></td>
            </tr>
        ";
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
    <script src="../js/Pagina_Principal_GALARDONADO_MODIFICAR.js"></script>
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
        <table class="striped responsive-table centered">
            <thead class="background-color red">
                <tr><th>Nombre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Escuela</th><th>Mod.Situación</th></tr>
            </thead>
        </table>
    
        <table class="striped responsive-table centered">
            <tbody class="background-color #bdbdbd grey lighten-1">
                <?php
                    echo $filasVerGalardonados; 
                ?>
            </tbody>
        </table>
    
</div>


<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
        <h4>Editar Correo</h4>
<!--SI-->    
        <div id="formEditAX">
            <form id="formEdit_AX">
                <label for="correo">Correo:</label>
                <input type="text" id="correo" name="correo" data-validetta="required,email">
                <input type="hidden" id="boleta" name="boleta">
                <button type="submit" class="btn blue">Editar</button>
            </form>
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