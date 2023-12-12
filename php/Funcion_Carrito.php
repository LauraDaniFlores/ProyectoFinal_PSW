<?php 

    $servidor = 'localhost';
    $cuenta = 'id21647894_candycraze';
    $password = 'DataBase/90';
    $bd = 'id21647894_store';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if($conexion->connect_errno) {
        die('Error en la conexion');
    }

    $sql = $_GET['sql'];
    $result = $conexion->query($sql);
    
?>