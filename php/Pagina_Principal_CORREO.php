<?php
    session_start();
    include("../PHPMailer5226/PHPMailerAutoload.php");
    include("./passGmail.php");
    include("./ConfigBD.php");

    if(!isset($_SESSION["usuario"])){
        header("Location:../");
    }

    if(isset($_POST["submit"])){
        $correo=$_POST["correo"];

        $pdf=$_FILES["archivo"]["name"];
        $pdfCopiado=$_FILES["archivo"]["tmp_name"];
        $pdfGuardado="copia_".$pdfCopiado;

        //copy($pdfCopiado,$pdfGuardado);

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = "marioufc1990@gmail.com";                 // SMTP username
            $mail->Password = "monterreycampeon";                           // SMTP password
            $mail->SMTPSecure = 'tls';                        // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('marioufc1990@gmail.com', 'Merito Politecnico');
            $mail->addAddress($correo);     // Add a recipient              // Name is optional
        
            //Attachments
            $mail->AddStringAttachment($pdf, $pdf);
           // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Ceremonia de entrega de premios';
    
            $mail->Body    = "Hola, le mando un saludo cordial y de la manera mas atenta aprovecho para invitarle a la ceremonia de entrega de galardones, que se llevara a cabo en el auditorio
                Jaime Torres Bodet, sin mas le adjunto sus datos.
                <br><br><br><br>

            ";
        
            $mail->send();
            echo 'El mensaje ha sido enviado';
            }catch (Exception $e) {
            echo 'No se pudo enviar';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mandar_Invitacion</title>
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
    <script src="../materialize_v1/js/materialize.min.js"></script>
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

    <!-- Diseño -->

<div class="container">

    <div class="row backgorund-color #eceff1 blue-grey lighten-4">
        
        <div class="aligin center color green">
            <b>MANDAR INVITACI&Oacute;N
        </div>
    <form id="invitacionAX" method="post" action="./GenerarInvitacion.php">
        <div class="col s12 m6 offset-m3 input-field">
            <i class="fa fa-id-card-o prefix"></i>
            <label>ID</label>
            <br>
            <input type="text" id="id" name="id" data-validetta="number, maxLength[3]" autocomplete="off">
        </div>
        <div class="col s12 m6 offset-m3 input-field">        
            <a href="./GenerarInvitacion.php" target="_blank"><button type="submit" id="invitacion" class="btn blue black-text" style="width:100%">
                <i class="fa fa-envelope"></i>  GENERAR INVITACION
            </button></a>
        </div>
        </form>
        <form method="post" enctype="multipart/form-data" action="Pagina_Principal_CORREO.php">
        <div class="col s12 m6 offset-m3 input-field">
            <i class="fa fa-envelope-o prefix"></i>
            <label>Correo</label>
            <br>
            <input type="text" id="correo" name="correo" data-validetta="email" autocomplete="off">
            <input type="file" name="archivo" class="form-control">
                    <br>
        </div>

        <div class="col s12 m6 offset-m3 input-field">        
            <button type="submit" name="submit" class="btn blue black-text" style="width:100%">
                <i class="fa fa-envelope"></i>  ENVIAR
            </button>
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