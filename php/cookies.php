<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php
    if(isset($_POST["submit"])){
        $cipher = "AES-256-CBC"; 
        $encryption_key = "12345678901234567890123456789012"; 
        $iv = str_repeat("0", openssl_cipher_iv_length($cipher));

        $servidor='localhost';
        $cuenta='root';
        $password='';
        $bd='Store';
         
        //conexion a la base de datos
        $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    
        if ($conexion->connect_errno){
             die('Error en la conexion');
        }
        else{
            session_start();
            if(isset($SESSION['intentos'])){
                $username = $SESSION['intentos'];
            }else{
                $username = $_POST['username'];
            }
            $password = $_POST['password'];
            // $password = openssl_decrypt($password, $cipher, $encryption_key, 0, $iv); 
            $password = openssl_encrypt($password, $cipher, $encryption_key, 0, $iv); 
            $captcha = $_POST['captcha'];
            $entrar = false; 

            if($_SESSION['captcha'] != $captcha){ 
                $_SESSION['Equal'] = false; 
                header("Location: login.php");
            }

            $sql = 'select * from usuarios';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
            $resultado = $conexion -> query($sql); //aplicamos sentencia
            $preguntar = true;
            $usuarioEncontrado = false; 
            if ($resultado -> num_rows){ //si la consulta genera registros
                while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                    if($fila['usuario'] === $username){
                        $usuarioEncontrado = true;
                        if($fila['contra'] === $password){
                            if(isset($_SESSION["intentos"])){
                                if($fila['seguridad'] != $_POST['pregunta']){
                                    $preguntar = false; 
                                    break; 
                                }else{
                                    unset($_SESSION["intentos"]);
                                    unlink("../archivos/strikes.txt");                
                                }
                            }
                            $SESSION['usuario'] = $username;
                            $entrar = true;
                            if($fila['administrador'] === 1){
                                $SESSION['admin'] = true;
                            }
                            $_SESSION['in'] = true; 
                            break;  
                        }else{
                            if(isset($_SESSION["intentos"])){
                                $preguntar = false; 
                                break;
                            }
                            $bool = false; 
                            $num = 1; 
                            if(file_exists("../archivos/strikes.txt")){
                                $file = fopen("../archivos/strikes.txt", "r+");
                            }else{
                                $file = fopen("../archivos/strikes.txt", "x+");
                            }
                            $file1 = fopen("../archivos/temporal.txt", "w");
                            while (!feof($file)) {
                                $linea = fgets($file);
                                if ($linea != "") {
                                    $aux = preg_split("/[:]/", $linea);
                                    echo $aux[0] ." : ". $aux[1]; 
                                    if($aux[0] == $username){
                                        $bool = true; 
                                        $num = $aux[1]; 
                                    }
                                }
                            }
                            if($bool){
                                $num++; 
                                fwrite($file1, $username.":".$num."\r\n"); 
                            }else{
                                unset($_SESSION["intentos"]);
                                fwrite($file1, $username.":1\r\n"); 
                            }
                            fclose($file);
                            fclose($file1);
                            unlink("../archivos/strikes.txt");
                            rename("../archivos/temporal.txt", "../archivos/strikes.txt");
                            chmod("../archivos/strikes.txt", 0777);
                            if($num == 3){
                                $_SESSION["intentos"] = $username;
                            }
                            $_SESSION["mal"] = true;
                            break; 
                        }
                    }
                }   
            }else{
                 echo "no hay datos";
            }
            if(!$preguntar){
                echo $_SESSION['intentos']." estos es";
                $nombre = $_SESSION["intentos"];
                $sql = "DELETE FROM Usuarios WHERE usuario='$nombre';";//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
                $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
                if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
                    unset($_SESSION["intentos"]);
                    unlink("../archivos/strikes.txt");
                    $_SESSION['error'] = true;
                    header("Location: login.php");
                }//fin
            }
            if(!$usuarioEncontrado && isset($_SESSION["intentos"])){
                $_SESSION["mal"] = true;
                unlink("../archivos/strikes.txt");
            }
            if($entrar){
                if(!empty($_POST["remember"])){
                    setcookie("username", $_POST["username"], time()+ 3600);
                    setcookie("password", $_POST["password"], time()+ 3600);
                }else {
                    setcookie("username", "");
                    setcookie("password","");
                }
                header("Location: login.php");

            }
        }
        header("Location: login.php");
    }
?>


<?php 

?>
