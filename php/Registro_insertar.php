<?php 
    session_start();
    ob_start(); 
?>
<body>

  <?php
    $cipher = "AES-256-CBC"; 
    $encryption_key = "12345678901234567890123456789012"; 
    $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='Store';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);
    
   if($conexion->connect_error){
       die('Ocurrio un error en la conexion con la BD');
   }else{
        if(isset($_POST['submit'])){
            $usuario = $_POST["user"];
            $nombre =$_POST["name"];
            $email =$_POST["email"];
            $seguridad = $_POST["seg"];
            $password = $_POST["pass"];
            $password1 = $_POST["pass1"];

            if($password != $password1){
              $_SESSION['cont'] = true;
              header("Location: Registro.php");
            }
            $encrypted_data = openssl_encrypt($password, $cipher, $encryption_key, 0, $iv);
            
            $flag = true;
            $sql = 'select * from Usuarios';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
            $resultado = $conexion -> query($sql); //aplicamos sentencia
            if ($resultado -> num_rows){ //si la consulta genera registros
                while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                  $flag = true;
                  if($usuario == $fila['usuario']){
                    $_SESSION['repetido'] = true;
                    header("Location: Registro.php");
                  } 
                }
            }
            if($flag && !isset($_SESSION['cont'])){     
              $sql = "INSERT INTO Usuarios(usuario, nombre, correo, seguridad, contra, administrador) VALUES('$usuario','$nombre','$email','$seguridad', '$encrypted_data', 0)";
              $conexion->query($sql);
              if ($conexion->affected_rows >= 1){ 
                    //   echo "registro insertado" ;
              }
                
                $_SESSION['insertar'] = true;
                //Cambiar a la pagina de inicio
                header('Location: login.php');
            }
        }   
   }
  //mysql_close($conexion);
 ?>
</body>