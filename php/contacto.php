<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />

    <title>Contacto | Candy Craze</title>
    <link rel="stylesheet" href="../css/estilospagp.css">
    <link rel="stylesheet" href="../css/estiloform.css">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <!-- Animaciones link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a href="index.php" style="text-decoration: none;">
                    <img src="../imagenes/LogoCC.png" alt="Candy Craze" style="margin-right:10px; width:70px;">
                </a>
                <a class="navbar-brand" href="index.php">Candy Craze</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex ms-auto">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productomenu.php">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="acerca.php">Acerca de</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacto.php">Contáctanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ayuda.php">Ayuda</a>
                            </li>
                        </ul>
                        <a href="inicioSesion.php" class="navbar-nav">
                            <span class="nav-link">
                                <i class="fa-solid fa-user"></i>
                            </span>
                        </a>

                        <a href="carrito.php" class="navbar-nav">
                            <span class="nav-link">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="textos-header">
            <h2 class="animate__animated animate__fadeInDown">— Contáctanos —</h2>
            <h1 class="animate__animated animate__fadeInUp">Contáctate directamente con nosotros</h1>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-40.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #f9dec9"></path>
            </svg></div>
    </header>

    <main>
        <section class="caracteristicas">
            <h3>Redes Sociales</h3>
            <h2>Oficiales</h2>
            <div class="linea"></div>
            <br>
            <div class="contenedor">
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="contenido">
                        <h2>Facebook</h2>
                        <p>Apartir de $350 por pedido</p>
                    </div>
                </div>
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="contenido">
                        <h2>Instagram</h2>
                        <p>Variedad de Opciones</p>
                    </div>
                </div>
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="contenido">
                        <h2>Gmail</h2>
                        <p>candycraze511@gmail.com</p>
                    </div>
                </div>

            </div>
            </div>
        </section>
        <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>

        <section class="suscripcionCC">
            <h3>No te quedes con la duda</h3>
            <h2>Envíanos un correo directo</h2>
            <div class="linea"></div>
            <br>

            <!-- Formulario Contacto -->
            <div class="content">
            <form id="contactus boton" action="contacform.php" method="post">

            <div style="text-align: center;">
                <img src="../imagenes/LogoCorreo2.png" alt="Imagen no disponible" width="140px" height="auto">
            </div>

            <br><br>
                <!-- <legend style="font-size: 35px;">Contactanos</legend> -->
                <h3>Contáctanos</h3>
                
                <fieldset>
                <input style="width: 60%;height: 40px; margin: 10px 0px;" placeholder="Nombre" type="text" tabindex="1" name="nom" required autofocus>
                </fieldset>
                
                <fieldset>
                <input style="width: 60%;height: 40px; margin: 10px 0px;" placeholder="Email" type="text" tabindex="2" name="email" required>
                </fieldset>
                
                <fieldset>
                <input style="width: 60%;height: 120px; margin: 10px 0px;" placeholder="Mensaje" type="text" tabindex="4" name="mensaje" required>
                </fieldset>
            
                <fieldset>
                <button class="boton" style="width: 60%;height: 60px; margin: 10px 0px;" name="submit" type="submit" id="peticion-submit" data-submit="...Sending"><b>Enviar</b></button>
              </fieldset>
            
            
        </form>
        </div>
        </section>



    </main>

    <?php

    if (isset($_SESSION['enviado2'])) { ?>
        <script>
            // swal("REGISTRADO!", "AHora ya eres parte de la mejor dulcecomunidad!", "success");
            // document.location.href = 'index.php';

            Swal.fire({
                icon: "success",
                title: "¡Correo enviado exitosamente!",
                text: "En poco tiempo le haremos llegar una respuesta",
                width: 600,
                padding: "3em",
                color: "black",
                background: "#fff url(/images/trees.png)",
                backdrop: `
                rgba(247,140,162,0.2)
                url("../imagenes/Dulces3.gif")
                left top
                no-repeat
            `
            });

        </script>


        <?php

        unset($_SESSION['enviado2']);
    }



    ?>


    <?php
    include("footer.php");
    ?>


    <!-- Funcion de animaciones de scroll -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>