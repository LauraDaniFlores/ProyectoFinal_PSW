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
    
    if ($mail->send()) {
      // Envío exitoso, ahora enviamos una respuesta al remitente
      $respuestaSubject = "Gracias por ponerte en contacto";
      $respuestaBody = <<<HTML
        <p style="text-align: center;">
          <img src='cid:imagenLogo' alt='' width='150px' height='auto' style='display: inline-block;'>
        </p>
        <h3>Hola $nombre,</h3>
        <h3>Gracias por ponerte en contacto con Candy Craze. Hemos recibido tu correo y te responderemos pronto. 🍬</h3>
        <h3>¡Saludos, Equipo Candy Craze!</h3>
  HTML;
  
      $respuestaMail = new PHPMailer();
      $respuestaMail->isSMTP();
      $respuestaMail->Host = 'smtp.gmail.com';
      $respuestaMail->SMTPAuth = true;
      $respuestaMail->Username = 'candycraze511@gmail.com';
      $respuestaMail->Password = 'jyyb icpr joso jrwu';
      $respuestaMail->SMTPSecure = 'ssl';
      $respuestaMail->Port = 465;
      $respuestaMail->setFrom('candycraze511@gmail.com', 'Candy Craze');
      $respuestaMail->addAddress($email, $nombre);
      $respuestaMail->Subject = $respuestaSubject;
      $respuestaMail->IsHTML(true);
      $imagen_path = "../imagenes/LogoCorreo2.png";
      $respuestaMail->AddEmbeddedImage($imagen_path, 'imagenLogo', 'LogoCorreo2.png');
      $respuestaMail->Body = $respuestaBody;
      $respuestaMail->send();
  }

    session_start();
    $_SESSION['enviado2'] = true;
    header('Location: contacto.php');
    exit();
?>