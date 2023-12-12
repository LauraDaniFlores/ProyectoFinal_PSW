<?php
include("menu.php");
$_SESSION['recibo']=true;
?>

<script>
  var pathElement = document.querySelector('.wave path');

  if (pathElement) {
    pathElement.style.fill = '#ffffff'; 
  }
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/FinalizarCompraStyles.css">
    <link rel="stylesheet" href="../css/estilospagp.css">
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />
    <script src="https://kit.fontawesome.com/24d265bea9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Finalizar Compra | Candy Craze</title>
</head>

<body>
    <header>
        <script>
            document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Finalizar Compra —";
            document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "Una forma fácil de consumir tus dulces favoritos";
        </script>

        <?php
        $usuario = $_SESSION['usuario'];
        $precioTotal = $_POST['total'];
        echo "<script>var precioTotal = '$precioTotal';</script>";
        $_SESSION['Productos'] = $_POST['Productos'];
        $_SESSION['precioTotal'] = $precioTotal;
        $codigo = "";
        function numerorandom()
        {
            $codigo = "";
            $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $max = strlen($caracteres) - 1;
            for ($i = 0; $i < 10; $i++) {
                $codigo .= $caracteres[mt_rand(0, $max)];
            }
            return $codigo;
        }
        $servidor='localhost';
        $cuenta='root';
        $password='';
        $bd='Store';
         
        //conexion a la base de datos
        $conexion = new mysqli($servidor, $cuenta, $password, $bd);

        if ($conexion->connect_errno) {
            die('Error en la conexion');
        } else {
            $Compras = "SELECT COUNT(Usuario) AS veces FROM Ventas WHERE usuario = '$usuario'";
            $resultado = $conexion->query($Compras);
            while ($fila = $resultado->fetch_assoc()) {
                $Compras = $fila["veces"];
            }

            if ($Compras == 0) {
                echo "<script>var ComprasHechas = false;</script>";
            } else {
                echo "<script>var ComprasHechas = true;</script>";
            }
        }

        ?>
    </header>


    <main class="main">
        <section class="preguntasTitle">
            <h2>Finaliza tu compra</h2>
            <div class="linea"></div>
        </section>
        <div class="div_main">
            <form action="Pedidos_PDF.php" method="post" class="formFinalizar">
                <div class="header">
                    <ul>
                        <li class="active form_1_progressbar">
                            <div>
                                <p><i class="fa-solid fa-truck-fast fa-beat" style="color: #ffffff;"></i></p>
                            </div>
                        </li>
                        <li class="form_2_progressbar">
                            <div>
                                <p><i class="fa-solid fa-ticket-simple fa-beat" style="color: #ffffff;"></i></p>
                            </div>
                        </li>
                        <li class="form_3_progressbar">
                            <div>
                                <p><i class="fa-solid fa-money-check fa-beat" style="color: #ffffff;"></i></p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="formulario_envio row g-3" id="form1">
                    <h2>Formulario de Envío</h2>
                    <div class="linea"></div>
                    
                    <div class="col-md-6">
                        <label for="Nombre_Completo" class="form-label">Nombre Completo:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" name="Nombre_Completo" id="Nombre_Completo"
                        required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="Correo" class="form-label">Correo Electrónico:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                            <input type="email" class="form-control" name="Correo" id="Correo" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="Direccion" class="form-label">Dirección:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                <input type="text" class="form-control" name="Direccion" id="Direccion" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                         <label for="CodigoPostal" class="form-label">Código Postal:</label>
                         <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="number" class="form-control" name="CodigoPostal" id="CodigoPostal" placeholder="Ingresa los 5 dígitos"
                        min="0" max="100000" required>
                       </div>
                    </div> 
                    
                    <div class="col-md-6">
                         <label for="Pais" class="form-label">País:</label>
                         <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-earth-americas"></i></span>
                            <select name="Pais" id="Pais" class="form-control" required>
                                <option value="México">México</option>
                                <option value="Estados Unidos">Estados Unidos</option>
                                <option value="Internacional">Internacional</option>
                            </select>
                        </div>
                    </div>
                          
                    <div class="col-md-6">      
                        <label for="Ciudad" class="form-label">Ciudad:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-city"></i></span>
                            <input type="text" class="form-control" name="Ciudad" id="Ciudad" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="NumeroTelefonico" class="form-label">Número Telefónico:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input type="number" class="form-control" name="NumeroTelefonico" id="NumeroTelefonico" placeholder="Ingresa los 10 dígitos" min="0" max="1000000000" required>
                        </div>
                    </div>

                    <button type="button" class="editar" id="editar">EDITAR</button>
                    <div class="bth-box">
                        <button type="button" class="next" id="Next1">SIGUIENTE</button>
                    </div>
                </div>

                <div class="div_TotalDeCompra" id="form2">
                    <h2>Total de la Compra</h2>
                    <div class="linea"></div>
                    <div class="div_cupon">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="Cupon" class="block">Cupón:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                    <input type="text" class="form-control" id="Cupon" name="Cupon">
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end align-items-center">
                                <button type="button" class="ValidarCupon" id="ValidarCupon">VALIDAR</button>
                                <small class="block cuponDescuento" id="cuponDescuento"></small>
                            </div>
                        </div>
                    </div>
                    <div class="div_imYgas">
                        <div class="div_impuestos">
                            <label for="Impuestos">Impuestos: </label>
                            <span class="paises"></span>
                            <input type="text" class="form-control" id="Impuestos" name="Impuestos" value="10" readOnly>
                        </div>
                        <div class="div_gastosEnvio">
                            <label for="GastosE">Gastos de Envío: </label>
                            <span class="paises"></span>
                            <input type="text" class="form-control" id="GastosE" name="GastosE" value="40" readOnly>
                            <small class="block GastoEnvioPorque" id="GastoEnvioPorque" style="margin-top:10px;"></small>
                        </div>
                    </div>
                    <div class="div_Total">
                        <br>
                        <h2>Total</h2>
                        <table>
                            <tr>
                                <td><p>Precio Total de los Productos</p></td>
                                <td class="tdPrecio signoPesos"><p>$</p></td>
                                <td class="tdPrecio"><p id="totalAbsoluto"></p></td>
                            </tr>
                            <tr>
                                <td><p>Descuento del Cupón</p></td>
                                <td class="tdPrecio signoPesos"><p>-$</p></td>
                                <td class="tdPrecio"><p id="cuponNeto">0</p>
                                    <input type="hidden" name="cuponValor" id="cuponValor" value="0">
                                </td>
                            </tr>
                            <tr>
                                <td><p>Impuestos</p></td>
                                <td class="tdPrecio signoPesos"><p>$</p></td>
                                <td class="tdPrecio"><p id="impuestoNeto"></p></td>
                            </tr>
                            <tr>
                                <td><p>Gastos de Envío</p></td>
                                <td class="tdPrecio signoPesos"><p>$</p></td>
                                <td class="tdPrecio"><p id="gastosNeto"></p></td>
                            </tr>
                            <tr>
                                <td><p>Total</p></td>
                                <td class="tdPrecio signoPesos totalNeta"><p>$</p></td>
                                <td class="tdPrecio totalNeta"><p id="totalNeta"></p></td>
                            </tr>
                        </table>
                    </div>
                    <div class="bth-box">
                        <button type="button" class="back" id="Back1">RETROCEDER</button>
                        <button type="button" class="next" id="Next2">SIGUIENTE</button>
                    </div>
                </div>

                <div class="Forma_Pago" id="form3">
                    <h2>Forma de Pago</h2>
                    <div class="linea"></div>
                    <section class="bancos">
                        <label class="labelB putborder" id="BBVA1">
                            <input type="radio" name="TipoDePago" id="BBVA" value="BBVA" checked>
                            <img class="BBVA" src="../imagenes/BBVA.png" alt="BBVA">
                        </label>
                        <label class="labelB" id="Santander1">
                            <input type="radio" name="TipoDePago" id="Santander" value="Santander">
                            <img class="Santander" src="../imagenes/Santander.png" alt="Santander">
                        </label>
                        <label class="labelB" id="OXXO1">
                            <input type="radio" name="TipoDePago" id="OXXO" value="OXXO">
                            <img class="OXXO" src="../imagenes/OXXO.png" alt="OXXO">
                        </label>
                    </section>

                    <section class="formBanco">
                        <label class="block" for="Bname">Nombre del titular de tarjeta<input type="text" class="block"
                                name="Bname" id="Bname" placeholder="Ingresa tu nombre completo" required></label>
                        <label class="block" for="Btarjeta">Número de la tarjeta<input type="number" class="block"
                                name="Btarjeta" id="Btarjeta" placeholder="0000 0000 0000 0000" size="16"
                                required></label>
                        <label class="Bfecha" for="Bfecha">Fecha de vencimiento<input type="text" class="block Bfecha"
                                name="Bfecha" id="Bfecha" size="5" placeholder="01/24" required></label>
                        <label class="Bseguridad" for="Bseguridad">Código de seguridad<input type="number"
                                class="block Bseguridad" name="Bseguridad" id="Bseguridad" size="3" placeholder="CVV"
                                required></label>
                    </section>

                    <section class="optionOxxo">
                        <p>
                            Ahora tienes la oportunidad de pagar tus compras en tu OXXO más cercano. Disfruta de esta
                            gran ventaja que tienes en tus manos.
                            Copia el código siguiente y muestráselo al cajero. Y el pago estará hecho.
                        </p>
                        <?php $codigo = numerorandom(); ?>
                        <p class="codigo">
                            <?php echo $codigo; ?>
                        </p>
                        <input type="text" id="codigo" style="display:none" value=<?php echo $codigo; ?>>
                    </section>
                    <div class="bth-box">
                        <button type="button" class="back" id="Back2">RETROCEDER</button>
                        <button type="submit" class="Enviar" id="Enviar">FINALIZAR</button>
                    </div>
                </div>

            </form>
        </div>
    </main>
    <?php
    include("footer.php");
    ?>
    <script src="../js/FinalizarCompra.js"></script>
</body>

</html>

<?php
?>