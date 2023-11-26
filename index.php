<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="imagenes/Icon2.png"/>

    <title>Inicio | Candy Craze</title>
    <link rel="stylesheet" href="css/estilospagp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Playball&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f3a304d792.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
        include "menu.php";
    ?>

    <main>
        <section class="caracteristicas">
            <h3>Características Destacadas</h3>
            <h2>Lo Que Nos Distingue</h2>
            <div class="linea"></div>
            <br>
            <div class="contenedor">
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>
                    <div class="contenido">
                        <h2>Envío Gratuito</h2>
                        <p>Apartir de $350 por pedido</p>
                    </div>
                </div>
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-regular fa-credit-card"></i>
                    </div>
                    <div class="contenido">
                        <h2>Pago con Tarjeta</h2>
                        <p>Variedad de Opciones</p>
                    </div>
                </div>
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>
                    <div class="contenido">
                        <h2>Devoluciones Fáciles</h2>
                        <p>Compra con Confianza</p>
                    </div>
                </div>
                <div class="cuadro">
                    <div class="icono">
                        <i class="fa-regular fa-circle-check"></i>
                    </div>
                    <div class="contenido">
                        <h2>Garantía de Calidad</h2>
                        <p>Compromiso con la Calidad</p>
                    </div>
                </div>
            </div>
        </section>
        <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
        <section class="acercaCC">
            <div class="contenedor2">
                <div class="imgCont">
                    <img src="imagenes/img1.jpg" alt="">
                    <img src="imagenes/img2.png" alt="">
                    <img src="imagenes/img3.jpg" alt="">
                    <img src="imagenes/img4.jpg" alt="">
                </div>
                <div class="txtCont">
                    <h3>Acerca de Candy Craze</h3>
                    <h2>Bienvenido a la Mejor Dulcería Internacional.</h2>
                    <div class="linea"></div>
                    <br>
                    <h4>Tu ventana a una experiencia global de sabores dulces.</h4>
                    <br>
                    <p>Nuestra tienda ofrece una ecléctica selección de golosinas internacionales.
                        Cada producto cuenta una historia cultural única, y nos enorgullece brindar
                        autenticidad y calidad al colaborar con proveedores locales. En Candy Craze,
                        no solo encontrarás golosinas, sino una experiencia que te invita a explorar el mundo a través
                        de sus sabores.</p>
                    <a href="contacto.php">
                        <button type="button" class="btn btn-primary">CONTÁCTANOS</button>
                    </a>

                </div>
            </div>
        </section>
        <section class="producCC">
            <div class="wave2" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150"
                    preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
                        style="stroke: none; fill: #fff;"></path>
                </svg></div>
            <div class="contenedor3">
                <h3>Saborea la Felicidad en cada Dulce</h3>
                <br>
                <h2>Descubre la magia de nuestros productos que harán de cada momento un festín para tus sentidos.
                    ¡Ven y déjate llevar por el placer de los sabores inolvidables en nuestra dulcería!</h2>
                <br>
                <div style="text-align: center;">
                    <a href="productos.php">
                        <button type="button" class="btn btn-primary">EXPLORA NUESTROS PRODUCTOS</button>
                    </a>
                </div>
            </div>
            <div class="wave2" style="height: 150px; overflow: hidden;">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                        style="stroke: none; fill: #f9dec9"></path>
                </svg>
            </div>
        </section>
        <section>
            <div class="commentsCC">
                <h3>¿Cuál es la opinión de los clientes?</h3>
                <h2>Testimonios</h2>
                <div class="linea"></div>
                <div class="container my-5">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="card text-center p-4">
                                    <i class="fa-solid fa-quote-left icono"></i>
                                    <div class="card-body">
                                        <p class="card-text">"¡Excelente servicio! Me encantó la atención al cliente y
                                            la calidad de los productos."</p>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <img src="imagenes/mujer.jpg" alt="Cliente 1"
                                            class="testimonial-img mx-auto d-block">
                                        <h5 class="card-title">Ximena Gonzáles</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="card text-center p-4">
                                    <i class="fa-solid fa-quote-left icono"></i>
                                    <div class="card-body">
                                        <p class="card-text">"Increíble experiencia de compra. Recibí mi pedido a tiempo
                                            y en perfecto estado."</p>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <img src="imagenes/hombre1.jpg" alt="Cliente 1"
                                            class="testimonial-img mx-auto d-block">
                                        <h5 class="card-title">Eduardo Preciado</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="card text-center p-4">
                                    <i class="fa-solid fa-quote-left icono"></i>
                                    <div class="card-body">
                                        <p class="card-text">"Los productos son de alta calidad y el proceso de compra
                                            fue fácil y rápido."</p>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <img src="imagenes/hombre2.jpg" alt="Cliente 1"
                                            class="testimonial-img mx-auto d-block">
                                        <h5 class="card-title">Carlos Jiménez</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
            <div style="height: 150px; overflow: hidden;">
                <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                        style="stroke: none; fill: #fff"></path>
                </svg>
            </div>
        </section>
        <section class="suscripcionCC">
            <h3>No te pierdas nuestras irresistibles ofertas</h3>
            <h2>Suscríbete</h2>
            <div class="linea"></div>
            <div class="container mt-5">
                <form action="email.php" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3 mx-auto">
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" placeholder="Correo electrónico"
                                    name="correosub" required>
                                <button class="btn btn-primary" name="submit" type="submit" id="peticion-submit"
                                    data-submit="...Sending">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <?php
        if (isset($_SESSION['enviado'])) { 
    ?>
    <script>
        Swal.fire({
        icon: "success",
        title: "¡Registro exitoso!",
        text: "Bienvenido a la mejor dulcecomunidad",
        width: 600,
        padding: "3em",
        color: "black",
        background: "#fff url(/images/trees.png)",
        backdrop: `
            rgba(247,140,162,0.2)
            url("imagenes/Dulces3.gif")
            left top
            no-repeat
            `
        });
    </script>

    <?php
        unset($_SESSION['enviado']);
        }
    ?>

    <?php
        include("footer.php");
    ?>
</body>

</html>