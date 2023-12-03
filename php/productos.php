<?php 

if (isset($_SESSION['usuario'])){?>
    <div id="logeado" style="display:none;">true</div> 
<?php }else{ ?>
    <div id="logeado" style="display:none;">false</div>
    <!-- die("You must be logged in!!"); -->
<?php }

$categorias = array("México", "Japón", "Corea");
    function datos($conexion, $categorias, $num){
        if($num == 3){
            $sql = "SELECT *FROM productos;";
        }else {
            $sql = "SELECT *FROM productos WHERE Categoria= '$categorias[$num]';";
        }
        $resultado = $conexion -> query($sql);
        $i = 0;  
        while( $fila = $resultado -> fetch_assoc() ){
          
            $flag = true; ?>
            <div class="Producto_in">
                <div class="imagen">
                    <img src="<?php echo $fila['imagen'] ?>" alt="Producto">
                </div>
                <h5><?php echo $fila['nombre'] ?></h5>
                <p class="Descripcion"><?php echo $fila['descripcion'] ?></p>
                <?php if($fila['descuento'] != 0){
                    $PrecioD=$fila['precio'] * ((100-$fila['descuento'])/100); ?>
                    <p class="precio">$<?php echo $PrecioD." \t "?><del class="Precio_tachado">$<?php echo $fila['precio'] ?></del></p>
                <?php } else { ?>
                    <p class="precio">$<?php echo $fila['precio'] ?></p>
                <?php } ?>
                <hr>
                <?php if($fila['existencias'] == 0){ $flag= false;?>
                    <h6 class="Agotado">Producto agotado</h6>
                <?php }else { ?>
                    <h6>Existencias: <?php echo $fila['existencias'] ?></h6>
                <?php } 
                ?>
                <h6 style="display:none;" id="exis<?php echo $i ?>" ><?php echo $fila['existencias'] ?></h6>
                <?php if($flag){ ?>
                <div class="seleccion_productos">
                    <button class="seleccion_boton" type="submit" value="<?php echo $i ?>" name="Resta">-</button>
                    <p id="ProductoCarro<?php echo $i ?>">0</p>
                    <button class="seleccion_boton" type="submit" value="<?php echo $i ?>" name="Suma">+</button>
                    
                </div>
                <div>
                    <form method="post" action="productos.php">
                        <!-- <i class="fa-solid fa-cart-shopping fa-bounce fa-2xl" style="color: #ff3e9e;"></i> -->
                        <input style="display:none;" class="id" type="int" name="id" value="<?php echo $fila['idProducto'] ?>">
                        <input style="display:none;" type="int" name="cantidad" id="cantidad<?php echo $i ?>" value="0">


                        <div class="alinear">


                            <button class="button" type="submit" value="<?php echo $i ?>" name="agregar">
                                <span class="button__text">Agregar</span>
                                <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"
                                        stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor"
                                        height="24" fill="none" class="svg">
                                        <line y2="19" y1="5" x2="12" x1="12"></line>
                                        <line y2="12" y1="12" x2="19" x1="5"></line>
                                    </svg></span>
                            </button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <?php $i = $i + 1 ?>
        </div>
    <?php }
}

$servidor = 'localhost';
$cuenta = 'root';
$password = '';
$bd = 'store';

//conexion a la base de datos
$conexion = new mysqli($servidor, $cuenta, $password, $bd);

if ($conexion->connect_errno) {
    die('Error en la conexion');
}

    if(isset($_POST['agregar'])){
        unset($_POST['agregar']);
        $User = $_SESSION['usuario'];
        $idPro = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $flag1 = false;
        if($cantidad != 0){
            $comprobar = "SELECT *FROM Carrito WHERE usuario='$User' AND IdProducto='$idPro';";
            $resultado1 = $conexion -> query($comprobar); 
            while( $fila = $resultado1 -> fetch_assoc() ){
                $acomulada = $fila['cantidad'];
                $flag1 = true;
            }
            if($flag1){
                $acomulada = $acomulada + $cantidad;
                $sql = "UPDATE Carrito set cantidad='$acomulada' WHERE usuario='$User' AND IdProducto='$idPro';";
                $resultado = $conexion -> query($sql);
                echo $sql;
            }else{
                $sql= "INSERT INTO Carrito VALUES('$User', '$idPro', '$cantidad');";
                $resultado = $conexion -> query($sql); 
            }

        }
        header("Location: productos.php");
    }
    header("Location: productos.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />

    <title>Productos | Candy Craze</title>

    <!-- Links css -->
    <link rel="stylesheet" href="../css/estilospagp.css">
    <link rel="stylesheet" href="../css/estilotienda.css">
    <link rel="stylesheet" href="../css/styles_Productos.css">

    <!-- Links para funciones externas -->
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

    <!-- Scripts para funciones externas -->
    <script src="https://kit.fontawesome.com/f3a304d792.js" crossorigin="anonymous"></script>

    <!-- Animaciones link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

</head>

<body>

    <header>
        <?php
        include "menu.php";
        ?>
        <script>
            document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Productos Candy Craze —";
            document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "Disfruta de nuestra gran variedad de dulces";
        </script>

        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-40.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #FFFFFF"></path>
            </svg></div>

    </header>


    <!-- Filtro -->
    <div class="radioacomodo">
        <div class="radio-inputs">
            <label class="radio">
                <input type="radio" name="categoria" value="3" checked="">
                <span class="name">Todos</span>
            </label>
            <label class="radio">
                <input type="radio" name="categoria" value="0">
                <span class=" name">México</span>
            </label>
            <label class="radio">
                <input type="radio" name="categoria" value="1">
                <span class="name">Japón</span>
            </label>

            <label class="radio">
                <input type="radio" name="categoria" value="2">
                <span class="name">Corea</span>
            </label>
        </div>
    </div>

    <div id="Productos_div">
        <div class="Div_Productos">
            <?php datos($conexion, $categorias, 3) ?>
        </div>
    </div>

    <br><br>

    <!-- Asigna productos -->
    <section>
        <!-- Seccion de productos -->
        <!-- <div class="acomodo2"> -->

        <!-- Diseño de la card del producto -->
        <!-- <div class="card">
                <div class="card-img">
                    <div class="img"> -->
        <!-- Aqui va la imagen -->
        <!-- </div>
                </div> -->

        <!-- Aqui va el titulo del producto -->
        <!-- <div class="card-title">Product title</div> -->

        <!-- Aqui va la descripcion -->
        <!-- <div class="card-subtitle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis magni nobis
                    voluptate temporibus, laboriosam, eaque quis laborum labore excepturi ratione, totam repellendus.
                    Quibusdam, id perferendis illo harum doloribus magnam repellat?</div>
                <hr class="card-divider">
                <div class="card-footer"> -->

        <!-- Aqui va el precio -->
        <!-- <div class="card-price"><span>$</span> 123.45</div> -->

        <!-- Todo esto es el apartado del diseño del boton del acrrito, entonces aqui iria la funcion del carrito -->
        <!-- <button class="card-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="m397.78 316h-205.13a15 15 0 0 1 -14.65-11.67l-34.54-150.48a15 15 0 0 1 14.62-18.36h274.27a15 15 0 0 1 14.65 18.36l-34.6 150.48a15 15 0 0 1 -14.62 11.67zm-193.19-30h181.25l27.67-120.48h-236.6z">
                            </path>
                            <path
                                d="m222 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z">
                            </path>
                            <path
                                d="m368.42 450a57.48 57.48 0 1 1 57.48-57.48 57.54 57.54 0 0 1 -57.48 57.48zm0-84.95a27.48 27.48 0 1 0 27.48 27.47 27.5 27.5 0 0 0 -27.48-27.47z">
                            </path>
                            <path
                                d="m158.08 165.49a15 15 0 0 1 -14.23-10.26l-25.71-77.23h-47.44a15 15 0 1 1 0-30h58.3a15 15 0 0 1 14.23 10.26l29.13 87.49a15 15 0 0 1 -14.23 19.74z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

        </div>  -->
        <!-- Div que cierra la sección de productos -->
    </section>

    <br><br><br>

    <?php
    include("footer.php");
    ?>


    <!-- Funcion de animaciones de scroll -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="../js/AJAX_pro.js"></script>
</body>

</html>