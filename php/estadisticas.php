<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style_bajas.css">
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />
    <title>Estadísticas | CandyCraze</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="d-flex flex-nowrap">
        <?php include "../html/panel.html"; ?>
        <script>
            document.getElementById("estadisticas-op").style.backgroundColor= "#D8006C";
        </script>
        <div class="d-flex flex-column contenido">
            <div>
                <?php
            
                $servidor='localhost:3307';
                $cuenta='root';
                $password='';
                $bd='store';

                $datosVendidos1 = array();
                $infoProd = array();

                //conexion a la base de datos
                $conexion = new mysqli($servidor,$cuenta,$password,$bd);
                if ($conexion->connect_errno){
                    die('Error en la conexion');
                }else{
                    $sql = 'select * from productovendidos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
                    $resultado = $conexion -> query($sql); //aplicamos sentencia

                    if ($resultado -> num_rows){ //si la consulta genera registros
                                while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                                    $idpedido = $fila['idPedido'];
                                    $datosVendidos1[$fila['idProducto']] = $fila['cantidad'];
                                    $cantidad = $fila['cantidad'];
                                }
                    }else{
                        echo "<div class='alert alert-primary' id='tituloP' role='alert'>";
                            echo "No hay productos vendidos";
                        echo "</div>";
                    }

                    //continaumos con la consulta de datos a la tabla productos y sacamos sus datos como nombre y categoría
                    $sql3 = 'select * from productos';//hacemos cadena con la sentencia mysql que consulta todo el contenido de la tabla
                    $resultado3 = $conexion -> query($sql3); //aplicamos sentencia

                    if ($resultado3 -> num_rows){ //si la consulta genera registros
                        while( $fila3 = $resultado3 -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                            if (isset($datosVendidos1) && !empty($datosVendidos1)) {
                                $auxId = $fila3['idProducto'];
                                foreach ($datosVendidos1 as $id => $valor) {
                                    if($auxId == $id){
                                        //Array que contiene la info de todos los productos vendidos (id, nombre, categoría, cantidad)
                                        $infoProd[$fila3['idProducto']] = array('nombre' => $fila3['nombre'],'categoria' => $fila3['categoria'], 'cantidad' => $valor);
                                    }
                                }
                            } else {
                                // El array asociativo está vacío
                            }
                        } 
                    }else{
                        echo "<div class='alert alert-primary' id='tituloP' role='alert'>";
                            echo "No hay productos vendidos";
                        echo "</div>";
                    }

                    if (isset($infoProd) && !empty($infoProd)) {
                        //hacer la gráfica de productos vendidos
                        echo '<h1 id="tituloP">Productos vendidos</h1>';
                        echo '<p id="tituloP">Gráfica que muestra el nombre y la cantidad de productos que han sido vendidos</p>';
                        graficaVendidos($infoProd);
                        //Hacer gráfica de categorías
                        echo '<br><br><h1 id="tituloP">Ventas por categoría</h1>';
                        echo '<p id="tituloP">Gráfica que muestra el total de productos vendidos por cada categoría existente</p>';
                        graficaCategorias($infoProd);
                    }

                }//fin
                // Recorrer y mostrar cada elemento del array asociativo
                // foreach ($infoProd as $idProducto => $productoInfo) {
                //     echo "ID del Producto: $idProducto<br>";
                //     echo "Nombre: " . $productoInfo['nombre'] . "<br>";
                //     echo "Categoría: " . $productoInfo['categoria'] . "<br>";
                //     echo "Cantidad: " . $productoInfo['cantidad'] . "<br>";
                //     echo "<hr>";
                // }
                ?>
            
            </div>
            <div style="max-width: 60%;">
            <div>
                <?php
                    function graficaVendidos($info){
                        echo '<div style="max-width: 80%;">';
                        ?>
                        <canvas id="miGrafico"></canvas>
                        <script>
                        //Función para generar colores aleatorios
                        function color_random(){
                            return 'rgba(' + Math.floor(Math.random() * 256) + ',' + 
                            Math.floor(Math.random() * 256) + ',' + 
                            Math.floor(Math.random() * 256) + ', 0.2)';
                        }
                        // Datos para el gráfico
                        const datos = {
                            labels: [
                                <?php
                                foreach ($info as $idProducto => $productoInfo) {
                                    echo "'" . $productoInfo['nombre'] . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                label: 'Vendidos',
                                data: [<?php
                                    foreach ($info as $idProducto => $productoInfo) {
                                        echo $productoInfo['cantidad'].",";
                                    }
                                ?>],
                                backgroundColor: [
                                    <?php
                                    foreach ($info as $idProducto => $productoInfo) {
                                        echo "color_random(),";
                                    }
                                    ?>
                                ],
                                borderColor: [
                                    <?php
                                    foreach ($info as $idProducto => $productoInfo) {
                                        echo "color_random(),";
                                    }
                                    ?>
                                ],
                                borderWidth: 1
                            }]
                        };
                        // Configuración del gráfico
                        var opciones = {
                            responsive: true,
                            indexAxis: 'y',
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true
                                },
                                y: {
                                    position: 'right',
                                    reverse: true
                                }
                            }
                        };
                        // Crear gráfico
                            var ctx = document.getElementById("miGrafico").getContext("2d");
                            new Chart(ctx, {
                                type: "bar",
                                data: datos,
                                options: opciones
                            });
                        </script>
                    <?php
                    echo '</div>';
                    }

                    //grafica categorías
                    function graficaCategorias($info){
                        echo '<div style="max-width: 60%;">';
                        $pMex = 0; 
                        $pJap = 0;
                        $pCor = 0; 
                        $otro = 0;
                        foreach ($info as $idProducto => $productoInfo) {
                            switch ($productoInfo['categoria']) {
                                case 'México':
                                    $pMex+=$productoInfo['cantidad'];
                                    break;
                                case 'Japón':
                                    $pJap+=$productoInfo['cantidad'];
                                    break;
                                case 'Corea':
                                    $pCor+=$productoInfo['cantidad'];
                                    break;
                                default:
                                    $otro += $productoInfo['cantidad'];
                            }
                        }
                        ?>
                        <canvas id="miGrafico2"></canvas>
                        <script>
                        //Función para generar colores aleatorios
                        function color_random() {
                            return 'rgba(' + Math.floor(Math.random() * 256) + ',' + 
                            Math.floor(Math.random() * 256) + ',' + 
                            Math.floor(Math.random() * 256) + ', 0.2)';
                        }
                        // Datos para el gráfico
                        const datos2 = {
                            labels: [
                                'México','Japón', 'Corea','Otro'
                            ],
                            datasets: [{
                                label: 'Vendidos',
                                data: [<?php
                                    echo $pMex.",";
                                    echo $pJap.",";
                                    echo $pCor.",";
                                    echo $otro;
                                ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)','rgb(255, 159, 64)','rgb(255, 205, 86)','rgb(75, 192, 192)'
                                ],
                                borderWidth: 1
                            }]
                        };
                        // Configuración del gráfico
                        var opciones2 = {
                            responsive: true,
                            indexAxis: 'y',
                            plugins: {
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        };
                        // Crear gráfico
                            var ctx2 = document.getElementById("miGrafico2").getContext("2d");
                            new Chart(ctx2, {
                                type: "pie",
                                data: datos2,
                                options: opciones2
                            });
                        </script>
                    <?php
                    echo '</div>';
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>