<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


// $nombre = test_input($_POST["nom"]);
$email = test_input($_POST['correosub']);
$subje = "Bienvenido a Candy Craze";
$imagen = "imagenes/LogoCorreo.png";
$mensaje = "
<div style='text-align:justify;'>

<div style='text-align:center;'>
<img src='cid:imagenLogo' alt='' width='150px' height='auto'>
</div>
<h3>Estimado/a</h3>
<p><b>¡Bienvenido a Candy Craze!</b> Tu destino de dulces favorito 🍬</p>
<p>¡Gracias por unirte a la familia Candy Craze! Nos emociona tenerte como parte de nuestra comunidad de amantes de los dulces. A partir de ahora, estarás al tanto de las últimas novedades, ofertas exclusivas y eventos especiales que solo los miembros de Candy Craze disfrutan.
Si tienes alguna pregunta o inquietud, nuestro equipo de atención al cliente está aquí para ayudarte. Simplemente responde a este correo electrónico y estaremos encantados de asistirte.</p>

<p>Gracias nuevamente por unirte a <b>Candy Craze</b>. Estamos ansiosos por endulzar tu vida y hacer que cada bocado sea una experiencia deliciosa.</p>

<div style='text-align:center;'>
<img src='cid:imagenPromo' alt='' width='auto' height='auto'>
</div>

<p><b>¡Dulces saludos!</b></p>

<p><b>El equipo de Candy Craze</b><p>
</div>
";
// $mensaje = test_input($_POST["mensaje"]);


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

    $mail -> Username = 'candycraze511@gmail.com';

    $mail -> Password = 'jyyb icpr joso jrwu';

    $mail -> SMTPSecure = 'ssl';

    $mail -> Port = 465;

    $mail -> setFrom('candycraze511@gmail.com');

    $mail -> addAddress($email);

    $mail -> isHTML(true);

    $mail -> Subject = $subje;

    $imagen_path = "imagenes/Cupon1.png";

    $imagen_path2 = "imagenes/LogoCorreo2.png";

    $mail->AddEmbeddedImage($imagen_path, 'imagenPromo', 'Cupon1.png');

    $mail->AddEmbeddedImage($imagen_path2, 'imagenLogo', 'LogoCorreo2.png');


    $mail -> Body = $mensaje;



    $mail -> send();

    session_start();
    $_SESSION['enviado']=true;

    header('Location:index.php');

}
?>

<?php
    
    $servidor='localhost:33065';
    $cuenta='root';
    $password='';
    $bd='suscritos';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }

    else{
         //conexion exitosa

         /*revisar si traemos datos a insertar en la bd  dependiendo
         de que el boton de enviar del formulario se le dio clic*/

         if(isset($_POST['submit'])&& !empty($_POST['correosub'])){
                //obtenemos datos del formulario
                $sub = $_POST['correosub'];
                
                //hacemos cadena con la sentencia mysql para insertar datos
                $sql = "INSERT INTO usuariossubs (correousu) VALUES('$sub')";
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
        //         if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
        //             echo '<script> alert("registro insertado") </script>';
        //         }//fin
             
        //       //continaumos con la consulta de datos a la tabla usuarios
        //  //vemos datos en un tabla de html
        //  $sql = 'select * from usuarios';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
        //  $resultado = $conexion -> query($sql); //aplicamos sentencia

        //  if ($resultado -> num_rows){ //si la consulta genera registros
        //       echo '<div style="margin-left: 20px;">';
        //       echo '<table class="table table-hover" style="width:50%;">';
              
        //         echo '<tr>';
        //             echo '<th>id</th>';
        //             echo '<th>nombre</th>';
        //             echo '<th>cuenta</th>';
        //             echo '<th>contrasena</th>';
        //         echo '</tr>';
        //         while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
        //             echo '<tr>';
        //                 echo '<td>'. $fila['id'] . '</td>';
        //                 echo '<td>'. $fila['nombre'] . '</td>';
        //                 echo '<td>'. $fila['cuenta'] . '</td>';
        //                 echo '<td>'. $fila['contrasena'] . '</td>';
        //             echo '</tr>';
        //         }   
        //         echo '</table">';
        //      echo '</div>';
        //  }
        //  else{
        //      echo "no hay datos";
        //  }
        
        //  }//fin 
         }
        

        
         
    }


?>