<script src="../js/AJAX_pro.js"></script>

<?php 
    $categorias = array("México", "Japón", "Corea");
    $cat = $_GET['cat'];

    function totalDatos($conexion, $categorias, $num){
        if($num == 3){
            $sql = "SELECT COUNT(IdProducto) AS Total FROM productos;";
        }else {
            $sql = "SELECT COUNT(IdProducto) AS Total FROM productos WHERE Categoria= '$categorias[$num]';";
        }    
        $resultado = $conexion -> query($sql); 
        while( $fila = $resultado -> fetch_assoc() ){ 
            $salida = $fila['Total'];
        }
        return $salida;
    }
    function datos($conexion, $categorias, $num){
        if($num == 3){
            $sql = "SELECT *FROM productos;";
        }else {
            //categoria
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
                    <input style="display:none;" class="id" type="int" name="id" value="<?php echo $fila['IdProducto'] ?>">
                    <input style="display:none;" type="int" name="cantidad" id="cantidad<?php echo $i ?>" value="0">
                    <button class="seleccion_agregar" type="submit" value="<?php echo $i ?>" name="agregar">Agregar</button>       
                </form>                
                </div>
                <?php } ?>
                <?php $i = $i+1 ?>
            </div>
        <?php } 
    }

    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='Store';
    
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
?>


<div class="encontrados">
    <p>Productos encontrados: <?php echo totalDatos($conexion, $categorias, $cat) ?></p>
</div>
<div class="Div_Productos">
    <?php 
    datos($conexion, $categorias, $cat) ?>
</div>