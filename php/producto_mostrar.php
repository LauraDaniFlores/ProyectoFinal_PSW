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
            $sql = "SELECT *FROM productos WHERE Categoria= '$categorias[$num]';";
        }
        $resultado = $conexion -> query($sql); 
        while( $fila = $resultado -> fetch_assoc() ){ 
            $i = 0; ?>
            <div class="Producto_in">
                <img src="<?php echo $fila['imagen'] ?>" alt="Producto">
                <h3><?php echo $fila['nombre'] ?></h3>
                <p><?php echo $fila['descripcion'] ?></p>
                <hr>
                <?php if($fila['existencias'] == 0){?>
                    <h5 class="Agotado">Producto agotado</h5>
                <?php }else { ?>
                    <h5>Existencias: <?php echo $fila['existencias'] ?></h5>
                <?php } ?>
                <?php if($fila['descuento'] != 0){
                    $PrecioD=$fila['precio'] * ((100-$fila['descuento'])/100); ?>
                    <p>$<?php echo $PrecioD." \t "?><del class="Precio_tachado">$<?php echo $fila['precio'] ?></del></p>
                <?php } else { ?>
                    <p>$<?php echo $fila['precio'] ?></p>
                <?php }
                ?>
                <div class="seleccion_productos">
                    <button class="seleccion_boton" type="submit" value="<?php echo $i ?>" name="Resta">-</button>
                    <p id="ProductoCarro<?php echo $i ?>">0</p>
                    <button class="seleccion_boton" type="submit" value="<?php echo $i ?>" name="Suma">+</button>       
                </div>
                <div>
                    <button class="seleccion_agregar" type="submit" value="<?php echo $i ?>" name="agregar">Agregar</button>       
                </div>
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