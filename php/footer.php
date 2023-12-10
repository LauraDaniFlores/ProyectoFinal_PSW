<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/f3a304d792.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Playball&display=swap" rel="stylesheet">

    <style>
        .footer {
            background: #3d0c11;
            color: white;
            font-family: 'Merienda', cursive;
        }

        .footer h2, .footer h3 {
            font-family: 'Playball', cursive;
        }

        .footer p, .footer a, .footer i {
            margin-right: 15px;
        }

        .footer .links ul {
            list-style-type: none;
        }

        .footer .links ul li a {
            text-decoration: none;
            color: rgb(168, 168, 168);
            transition: color 0.2s;
        }

        .footer .links ul li a:hover {
            text-decoration: none;
            color: #f78ca2;
        }

        .footer .about-company i {
            font-size: 25px;
        }

        .footer .about-company i:hover {
            color: #f78ca2;
            transition: color 0.2s ease;
        }

        .footer .about-company a {
            color: white;
            transition: color 0.2s;
        }

        .footer .about-company a:hover {
            color: #f78ca2;
        }

        .footer .location i {
            font-size: 18px;
            margin-right: 15px;
        }

        .footer .copyright p {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            margin-top: -25px;
        }
    </style>

</head>
<body>
    <div style="height: 150px; overflow: hidden; margin-bottom:-110px;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
    style="height: 100%; width: 100%;">
    <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
    style="stroke: none; fill: #3d0c11"></path></svg></div>
    <footer>
        <div class="mt-5 pt-5 pb-5 footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                <img src="../imagenes/LogoCC.png" alt="CandyCraze" style="margin-bottom:10px;width:100px;">
                  <h2>Candy Craze</h2>
                  <p class="pr-5 text-white-50">Embárcate en un viaje de sabores exquisitos en nuestra dulcería internacional, donde cada bocado es una ventana abierta a la deliciosa diversidad de dulces de todo el mundo.</p>
                  <p>
                    <a href="https://www.facebook.com/profile.php?id=61551438060854&mibextid=2JQ9oc" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://instagram.com/candycraze2023?igshid=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </p>
                </div>
                <div class="col-lg-2 col-xs-12 links">
                  <h3 class="mt-lg-0 mt-sm-3">Links</h3>
                    <ul class="m-0 p-0">
                      <li><a href="../index.php">Inicio</a></li>
                      <li><a href="productos.php">Productos</a></li>
                      <li><a href="acerca.php">Acerca de</a></li>
                      <li><a href="contacto.php">Contáctanos</a></li>
                      <li><a href="ayuda.php">Ayuda</a></li>
                    </ul>
                </div>
                <div class="col-lg-5 col-xs-12 location">
                  <h3 class="mt-lg-0 mt-sm-4">Ubicación</h3>
                  <p class="pr-5 text-white-50">Av. Universidad # 940, Ciudad Universitaria, C.P. 20100, Aguascalientes, Ags. México.</p>
                  <p class="mb-0"><i class="fa fa-phone mr-3"></i>(541) 754-3010</p>
                  <p><i class="fa fa-envelope-o mr-3"></i>candycraze511@gmail.com</p>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© Candy Craze 2023. Todos los derechos reservados. <br>Esta página constituye un proyecto académico.</small></p>
                </div>
                <?php 
                    date_default_timezone_set('America/Mexico_City'); // Establecer la zona horaria de México
                    $ultimaActualizacion = filemtime("../"); // Obtener la última actualización 
                    setlocale(LC_TIME, 'es_VE.UTF-8','esp'); // Establecer el locale a español para strftime
                    $fechaFormateada = strftime('%e de %B del %Y', $ultimaActualizacion); // Formatear la fecha
                    $fechaFormateada = mb_convert_case($fechaFormateada, MB_CASE_TITLE, 'UTF-8'); // Convertir la primera letra de cada palabra en mayúscula
                    $horaActual = date('h:i A');
                    // Mostrar la fecha formateada
                    echo '<p class="" style="text-align:center;"><small class="text-white-50">Última actualización: ' . $fechaFormateada . ' a las ' . $horaActual . ' (Hora de México)</small></p>';  
                ?>
              </div>
            </div>
        </div>            
    </footer>
</body>
</html>