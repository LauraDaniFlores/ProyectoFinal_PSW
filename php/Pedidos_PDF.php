<?php 
    session_start();

    $servidor='localhost:3307';
    $cuenta='root';
    $password='';
    $bd='store';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }else{
        $usuario = $_SESSION['usuario'];
        $precioTotal = $_SESSION['precioTotal'];
        $sql1 = "SELECT MAX(IdPedido) AS max FROM Ventas";
        $resultado = $conexion -> query($sql1); 
        while( $fila = $resultado -> fetch_assoc()){ 
            $maxIdPedido = $fila['max']+1;
        }
        $sql2 = "INSERT INTO Ventas(IdPedido, Usuario, Total) VALUES('$maxIdPedido','$usuario', '$precioTotal')";
        $resultado = $conexion -> query($sql2); 

        $sql = "SELECT *FROM Carrito WHERE usuario='$usuario';";
        $resultado1 = $conexion -> query($sql); 
        while( $fila = $resultado1 -> fetch_assoc()){ 
            if (in_array($fila['IdProducto'], $_SESSION['Productos'])) { 
                $id = $fila['IdProducto'];
                $cant = $fila['cantidad'];
                $sql3 = "INSERT INTO ProductoVendidos(IdPedido, IdProducto, Cantidad) VALUES('$maxIdPedido','$id', '$cant')";
                echo $sql3; 
                $conexion->query($sql3);
                $sqll = "DELETE FROM Carrito WHERE usuario='$usuario' AND IdProducto='$id';";
                $conexion->query($sqll); 
                
                $sql5 = "SELECT *FROM productos WHERE idProducto='$id';";
                $resultado2 = $conexion -> query($sql5); 
                while( $fila2 = $resultado2 -> fetch_assoc()){ 
                    $existencias = $fila2['existencias']- $cant;
                    $sql6 = "UPDATE productos SET existencias='$existencias' WHERE Idproducto = '$id'";
                    $resultado3 = $conexion -> query($sql6); 
                }
            }
        }
    }
    header("Location: ../index.php");


?>