<?php

  if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: contacto.php" );
  }

  require '../librerias/phpmailer/src/Exception.php';
  require '../librerias/phpmailer/src/PHPMailer.php';
  require '../librerias/phpmailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

    $nombre = $_POST['nom'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    $asunto = $_POST['asunto'];

    $body = <<<HTML
      <h2>Mensaje de Contacto</h2>
      <p>De: $nombre / $email</p>
      <h3>Mensaje:</h3>
      $mensaje
    HTML;

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail -> Username = 'candycraze511@gmail.com';
    $mail -> Password = 'jyyb icpr joso jrwu';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail -> setFrom($email, $nombre);
    $mail -> addAddress('candycraze511@gmail.com', 'Mensaje de Contacto');
    $mail -> Subject = "Mensaje de contacto: $asunto";
    $mail -> msgHTML($body);
    $mail -> AltBody = strip_tags($body);
    $mail -> send();

    session_start();
    $_SESSION['enviado2'] = true;
    header('Location: contacto.php');
    exit();
?>