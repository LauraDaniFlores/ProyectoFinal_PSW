<?php 

    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='Store';
     
    //conexion a la base de datos
    $conexion = new mysqli($servidor, $cuenta, $password, $bd);

    if($conexion->connect_errno) {
        die('Error en la conexion');
    }

    $sql = $_GET['sql'];
    $result = $conexion->query($sql);
    
?>