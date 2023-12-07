<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />

    <title>Carrito de compra | Candy Craze</title>

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilospagp.css">
    <link rel="stylesheet" href="../css/estiloform.css">
    <link rel="stylesheet" href="../css/style_carrito.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Playball&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/f3a304d792.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <?php
        include "menu.php";
        ?>
        <script>
            document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Carrito de Productos —";
            document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "Recuerda que no tienes limite de compra";
        </script>

        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-40.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #FFFFFF"></path>
            </svg></div>

    </header>

    <!-- Acomoda los articulos agregados al carrito -->

    <section class="section_Carrito">

    <?php 
       //$_SESSION['usuario']
        if (isset($_SESSION['usuario']) && !isset($_SESSION['admin'])){
            $usuario = $_SESSION['usuario'];

            $CantPro = "Select count(IdProducto) as t from Carrito where usuario='$usuario';";
            $result = $conexion -> query($CantPro);
            while( $fila3 = $result -> fetch_assoc() ){ 
                $CantPro = $fila3['t'];
            }
            $flag= false;
            if($CantPro != 0){
                $flag= true;
                $productos = "SELECT *FROM Carrito WHERE usuario='$usuario'";
                $resultado = $conexion -> query($productos);
                $i=0;
                while( $fila = $resultado -> fetch_assoc() ){ 
                    $id = $fila['IdProducto'];
                    $info = "SELECT *FROM productos WHERE idProducto=$id";
                    $resultado1 = $conexion -> query($info);
                    while( $fila2 = $resultado1 -> fetch_assoc() ){
                        $precio = ($fila2['precio']*((100-$fila2['descuento'])/100))*$fila['cantidad'];
                        InfoProCarrito($fila2['imagen'], $fila2['nombre'], $fila2['descripcion'], $fila['cantidad'], $precio , $i);
                        $precioTotal += $precio;
                    } 
                    $i += 1;
                }
            }else{?>
                <section class="preguntasTitle">
                <h2>¡Tu carrito esta vacío!</h2>
                <div class="linea"></div>
                <br>
                <p> Para agregar productos a tu carrito regresa a la página <a class="linkcarrito" href="productos.php">productos</a>, en donde encontrarás una gran variedad de dulces.
                    
                </p>
                </section>
                <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
                style="stroke: none; fill: #fff;"></path></svg></div>
            <?php }
        }else{ ?>
            <section class="preguntasTitle">
                <h3>¡Tu carrito esta vacío!</h3>
                <h2>Nuestra tienda brinda productos de la mejor calidad</h2>
                <div class="linea"></div>
                <br>
                <p>Para poder escoger los productos que llamen tu atención es necesario que te registres con tu cuenta y podrás endulzarte con nuestra variedad de productos.
                    Si aún no tienes cuenta, ¡no te preocupes! es muy fácil y sencillo.
                    Entra al siguiente link y <a class="linkcarrito" href="registro.php">registrate</a>. 
                </p>
                </section>
                <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
                style="stroke: none; fill: #fff;"></path></svg></div>

        <?php }
    ?>
    
    </section>


    <!-- Acumulable del precio a pagar y el boton de comprar que redireccionara a la pagina de compra -->
    <footer>
    <?php 
    if (isset($_SESSION['usuario']) && !isset($_SESSION['admin']) && $flag){?>
        <div class="acumulado">
            <div class="acomodoprecio">
                <div class="precio_acumulado">
                    <h3>Precio Acumulado</h3>
                    <!-- Suma de los precios de los articulos seleccionados a comprar -->
                    <p><b><?php echo $precioTotal ?></b></p>
                </div>
            </div>

            <div class="acomodocom">
                <div class="bcompra">
                    <a class="fancy" href="#pagina_de_compra">
                        <span class="top-key"></span>
                        <span class="text">Comprar Ahora</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </footer>

</body>

</html>

<?php 
//Precio total de los elementos
function InfoProCarrito($img, $nombre, $descripcion, $cantidad, $precio, $i){?>

    <!-- Abre el acomodo del diseño para los articulos agregados al carrito -->
    <div class="acomodoart">
            <!-- Checkbox del articulo -->
            <div class="acomodochk">
                <div class="checkbox-wrapper">
                    <input checked="" type="checkbox" class="check" name="Productos" id="elegido<?php echo $i?>">
                    <label for="elegido<?php echo $i?>" class="label">
                        <svg width="45" height="45" viewBox="0 0 95 95">
                            <rect x="30" y="20" width="50" height="50" stroke="black" fill="none"></rect>
                            <g transform="translate(0,-952.36222)">
                                <path
                                    d="m 56,963 c -102,122 6,9 7,9 17,-5 -66,69 -38,52 122,-77 -7,14 18,4 29,-11 45,-43 23,-4"
                                    stroke="black" stroke-width="3" fill="none" class="path1"></path>
                            </g>
                        </svg>
                    </label>
                </div>
            </div>

            <!-- Imagen del articulo -->
            <div class="img_acomodo">
                <img class="acomodoart" src="<?php echo $img ?>" alt="">
            </div>
            
            <!-- Seccion de descripcion articulo -->
            <div class="acomododesc">
                <!-- Titulo del producto -->
                <h3><b><?php echo $nombre ?></b></h3>
                <!-- Descripcion del articulo -->
                <p><?php echo $descripcion ?></p>
            </div>

            <div class="acomodocant">
                <div>
                    <!-- Cantidad del articulo -->
                    <h3><b>Cant.</b></h3>
                    <p><?php echo $cantidad ?></p>
                </div>
            </div>

            <!-- Cantidad del articulo -->
            <div class="acomodoindpre">
                <div>
                    <h3><b><?php echo $precio ?></b></h3>
                </div>
            </div>

        </div>
<?php }

?>