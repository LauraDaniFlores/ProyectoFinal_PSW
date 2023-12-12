<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../librerias/phpmailer/src/PHPMailer.php';
    require '../librerias/phpmailer/src/SMTP.php';
    require '../librerias/phpmailer/src/Exception.php';

    $mail = new PHPMailer(true);

    $mail=new PHPMailer(true);
$mail->CharSet = 'UTF-8';

$IdPedido = $_SESSION["IdPedido"];
$TOTAL = 0;
$impuesto = $_SESSION["impuestosRecibo"];
$envio = $_SESSION["envioRecibo"];
$nombre = $_SESSION["nombreRecibo"];
$direccion = $_SESSION["direccionRecibo"];
$banco = $_SESSION["tipoPagoRecibo"];
$cuenta = $_SESSION['tarjetaRecibo'];
if($_SESSION['tipoPagoRecibo'] != "OXXO"){
    $cuentaBancaria = str_repeat('*', strlen($_SESSION['tarjetaRecibo']) - 4) . substr($_SESSION['tarjetaRecibo'], -4);
}

$titularCuenta = $_SESSION["nombrePagoRecibo"];
$cupon = $_SESSION["cupon"];
$telefono = $_SESSION["telRecibo"];
$correo = $_SESSION["correoRecibo"];


$servidor = 'localhost';
$cuenta = 'id21647894_candycraze';
$password = 'DataBase/90';
$bd = 'id21647894_store';
 
//conexion a la base de datos
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if($conexion -> connect_errno){
    die("Error en la conexión");
}else{

try{
    $mail->IsSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->Username   = 'candycraze511@gmail.com';
    $mail->Password   = 'jyyb icpr joso jrwu';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {    
        $nombre = $nombre;
        $email = $correo;
        $mail->SetFrom('candycraze511@gmail.com', 'Candy Craze');
        $mail->AddAddress($email, $nombre);

        $mail->isHTML(true);
        $mail->Subject = 'Recibo de compra | Candy Craze';
        $cuerpo = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                .titulosTabla{
                    background-color: #F9DEC9;
                }
                #encabezado{
                    display: flex;
                    justify-content: space-between;
                    padding: 20px 20px 0px 20px;
                }
                
                #cliente{
                    padding-left: 20px;
                    padding-bottom: 20px;
                }
                #direccion{
                    max-width: 400px;
                    
                }
                table{
                    width: 90%;
                }
                .campoProd{
                    width: 45%;
                }
                #productos, #productos td, #productos th{
                    text-align: center;
                    border: 1px solid rgb(114, 114, 114);
                    border-collapse: collapse;
                    
                }
                #productos, #productos td{
                    font-family:"Calibri";
                }
                .linea1{
                    height: 30px;
                    background-color: #F78CA2;
                }
                #venta {
                    display: flex;
                    justify-content: center;
                }
                body{
                    
                    display: flex;
                    justify-content: center;
                }
                #todo{
                    min-width: 500px;
                    max-width: 700px;
                    margin: 20px 40px 0px 40px;
                    box-shadow: 0px 0px 30px;
                }
                #datos{
                    margin-top: 20px;
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 60px;
                    padding: 0px 20px 0px 20px;
                }
                .texto{
                    font-family:"Calibri";
                    font-size: 13px;
                }
                .bold{
                    font-weight: bold;
                    padding-right: 10px;
                }
                #pie{
                    margin-top: 30px;
                    text-align: right;
                    padding: 5px 20px 5px;
                    background-color: #D8006C;
                    color: #F9DEC9;
                }
                .info{
                    font-family:"Calibri";
                    font-size: 12px;
                }
                #empresaInfo{
                    max-width: 250px;
                    text-align: right;
                }
                #empresaLogo{
                    display: flex;
                    align-items: center;
                    padding-left: 7px;
                }
                #empresa{
                    display: flex;
                    justify-content: flex-end;
                }
                .cantidad{
                    text-align: right;
                    padding-left: 15px;
                }
                #vacio{
                    height: 20px;
                }
                .titulo{
                    font-family:"Calibri";
                    font-weight: bold;
                    font-size: 15;
                }
                .rosa, #candy{
                    color: #D8006C;            
                    font-family:"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
                    font-weight: bold;
                }
                #candy{
                    padding: 0px;
                    margin: 0px;
                    margin-top: 10px;
                    line-height: 1em;
                }
                #encabezado{
                    font-size: 20px;
                }

                #folio{
                    width: 50%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    font-size: 20;
                }
                #productos td{
                    padding: 0px 7px 0px 7px;
                }
                #pago{
                    width: max-content;
                }
            </style>
        </head>
        <body>
            <div id="todo">
                <div class="linea1"></div>
                <div id="encabezado">
                    <div id="folio">
                        <span class="rosa">RECIBO <br>#' . $IdPedido. '</span><br>
                    </div>
                    <div id="empresa">
                        <div id="empresaInfo">
                            <p id="candy">CandyCraze</p>
                            <p class="info">Av. Universidad # 940, Ciudad Universitaria, C.P. 20100, Aguascalientes, Ags. México</p>
                        </div>
                        <div id="empresaLogo">
                            <img src="cid:imagenLogo" alt="Logo" width="73" height="70">
                        </div>
                    </div>
                </div>
                <div id="cliente">
                    <h3 class="titulo">Cliente</h3>
                    <span class="texto">' . $nombre . '</span>
                    <div id="direccion">
                        <span class="texto">' . $direccion . '</span><br>
                        <span class="texto">Tel. ' . $telefono . '</span><br>
                        <span class="texto">' . $correo . '</span>
                    </div>
                </div>
                <div id="venta">
                    
                    <table id="productos">
                        <tr>
                            <th class="titulosTabla titulo campoProd">PRODUCTO</th>
                            <th class="titulosTabla titulo">CANTIDAD</th>
                            <th class="titulosTabla titulo">PRECIO</th>
                            <th class="titulosTabla titulo">TOTAL</th>
                        </tr>';
                        
                            
                                $consulta = "SELECT pv.IdProducto, pv.Cantidad, p.nombre, p.precio, p.descuento FROM ProductoVendidos pv JOIN productos p ON pv.IdProducto = p.idProducto WHERE pv.IdPedido = $IdPedido;";
                                $result = $conexion->query($consulta);
                                if ($result->num_rows > 0) {
                                    while ($fila = $result->fetch_assoc()) {
                                        $cuerpo .= "<tr><td class='registro'>" . $fila['nombre'] . "</td>";
                                        $cuerpo .= "<td class='registro'>" . $fila['Cantidad'] . "</td>";
                                        $precio = (100-$fila['descuento']) / 100 * $fila['precio'];
                                        $cuerpo .= "<td class='registro'>$" . number_format($precio, 2) . "</td>";
                                        $cuerpo .= "<td class='registro'>$" . number_format($precio*$fila['Cantidad'], 2) . "</td></tr>";
                                        $TOTAL += $precio*$fila["Cantidad"];
                                    }
                                }
                            
                        
                $cuerpo .= '</table>
                </div>
                <div id="datos">
                    <div id="pago">
                        <span class="titulo">INFORMACIÓN DE PAGO</span>
                        <br>';
        if($banco != "OXXO"){
            $cuerpo .= '<table>
                            <tr>
                                <td class="texto bold">Banco:</td>
                                <td class="texto">' . $banco . '</td>
                            </tr>
                            <tr>
                                <td class="texto bold">Nombre:</td>
                                <td class="texto">' . $titularCuenta . '</td>
                            </tr>
                            <tr>
                                <td class="texto bold">Cuenta:</td>
                                <td class="texto">' . $cuentaBancaria . '</td>
                            </tr>
                        </table>';
        }else{
            $cuerpo .= '<p class="texto">Pago en OXXO</p>';
        }
        $cuerpo .= '</div>
                    <div id="totales">
                        <table>
                            <tr>
                                <td class="texto">Subtotal:</td>
                                <td class="texto cantidad">$' . number_format($TOTAL, 2) . '</td>
                            </tr>
                            <tr>
                                <td class="texto">Cupón:</td>
                                <td class="texto cantidad">-$' . number_format($cupon, 2) . '</td>
                            </tr>
                            <tr>
                                <td class="texto">Impuestos:</td>
                                <td class="texto cantidad">$' . number_format($impuesto, 2) . '</td>
                            </tr>
                            <tr>
                                <td class="texto">Envío:</td>
                                <td class="texto cantidad">$' . number_format($envio, 2) . '</td>
                            </tr>
                            <tr id="vacio"></tr>
                            <tr>
                                <td colspan="2" class="titulo">TOTAL $' . number_format($TOTAL + $impuesto + $envio - $cupon, 2) . '</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id="pie">
                    <p class="info">(541) 754-3010</p>
                    <p class="info">CandyCraze@gmail.com</p>
                </div>
            </div>
            
        </body>
        </html>
        ';
        $mail->Body = $cuerpo;
        $rutaLogo = '../imagenes/LogoPDF.png';
        $mail->AddEmbeddedImage($rutaLogo, 'imagenLogo', 'Logo.png');
        if (!$mail->send()) {
            throw new Exception($mail->ErrorInfo);
        }
    
        
    }

}catch(Exception $e){
    echo 'Error en el envío';
}
}
?>