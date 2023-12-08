<?php 
    session_start();

    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='Store';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
         die('Error en la conexion');
    }else{
        $usuario = $_SESSION['usuario'];
        $precioTotal = $_SESSION['precioTotal'];
        $sql1 = "SELECT MAX(IdPedido) AS max FROM Ventas";
        $resultado = $conexion -> query($sql1); 
        if ($resultado -> num_rows){ 
            while( $fila = $resultado -> fetch_assoc()){ 
                $maxIdPedido = $fila['max']+1;
            }
        }
        $sql2 = "INSERT INTO Ventas(IdPedido, Usuario, Total) VALUES('$maxIdPedido','$usuario', '$precioTotal')";
        $resultado = $conexion -> query($sql2); 

        $sql = "SELECT *FROM Carrito WHERE usuario='$usuario';";
        $resultado = $conexion -> query($sql); 
        if ($resultado -> num_rows){ 
            while( $fila = $resultado -> fetch_assoc()){ 
                if (in_array($fila['IdProducto'], $_SESSION['Productos'])) { 
                    $id = $fila['IdProducto'];
                    $cant = $fila['cantidad'];
                    $sql3 = "INSERT INTO ProductoVendidos(IdPedido, IdProducto, Cantidad) VALUES('$maxIdPedido','$id', '$cant')";
                    $conexion->query($sql3);

                    $sqll = "DELETE FROM Carrito WHERE usuario='$usuario' AND IdProducto='$id';";
                    $conexion->query($sqll); 
                }
            }
        }
    }
    header("Location: ../index.php");


?>