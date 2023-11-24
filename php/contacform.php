<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../librerias/phpmailer/src/Exception.php';
require '../librerias/phpmailer/src/PHPMailer.php';
require '../librerias/phpmailer/src/SMTP.php';


if(isset($_POST['submit'])){
$nombre = test_input($_POST["nom"]);
$email = test_input($_POST["email"]);
$mensaje = test_input($_POST["mensaje"]);

}

function test_input($data) {
  $data = trim($data);  //quita espacios en los extremos de la cadena
  $data = stripslashes($data); //elimina barras invertidas
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['submit'])){
    $mail = new PHPMailer(true);
    $mail -> isSMTP();

    $mail -> Host = 'smtp.gmail.com';

    $mail -> SMTPAuth = true;

    $mail -> Username = 'adrianbala76@gmail.com';

    $mail -> Password = 'qick amwd lcev mxiq';

    $mail -> SMTPSecure = 'ssl';

    $mail -> Port = 465;

    $mail -> setFrom('adrianbala76@gmail.com');

    $mail -> addAddress($email);

    $mail -> isHTML(true);

    $mail -> Subject = $nombre;

    $mail -> Body = $mensaje;

    $mail -> send();

    session_start();
    $_SESSION['enviado2']=true;

    header('Location:contacto.php');

}


?>