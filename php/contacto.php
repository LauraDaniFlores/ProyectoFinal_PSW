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
        include ("menu.php");
    ?>
    <script>
        document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Contáctanos —";
        document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "¡Envíanos un mensaje y estaremos encantados de responderte!";
    </script>

    <main>
        <section class="contactusCC">
            <div class="contenedorContact">
                <div class="cuadroCC">
                    <div class="icono">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="contenidoCC">
                        <h2>Facebook</h2>
                        <p>Candy Craze UAA</p>
                    </div>
                </div>
                <div class="cuadroCC">
                    <div class="icono">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="contenidoCC">
                        <h2>Instagram</h2>
                        <p>Candy Craze</p>
                    </div>
                </div>
                <div class="cuadroCC">
                    <div class="icono">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="contenidoCC">
                        <h2>Correo electrónico</h2>
                        <p>candycraze511@gmail.com</p>
                    </div>
                </div>
                <div class="cuadroCC">
                    <div class="icono">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="contenidoCC">
                        <h2>Llámanos</h2>
                        <p>(541) 754-3010</p>
                    </div>
                </div>
                <div class="cuadroCC">
                    <div class="icono">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <div class="contenidoCC">
                        <h2>Visítanos</h2>
                        <p>Av. Universidad # 940</p>
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

        <section class="correoCC">
            <h3>Estamos a un mensaje de distancia</h3>
            <h2>Envíanos tus comentarios y preguntas</h2>
            <div class="linea"></div>
            <br>
            <div class="correoform">
                <div id="map-containerCC">
                    <iframe
                        width="100%"
                        height="100%"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d14806.509477523223!2d-102.3214427931872!3d21.910420499140123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sAv.%20Universidad%20%23%20940%2C%20Ciudad%20Universitaria%2C%20C.P.%2020100!5e0!3m2!1ses!2smx!4v1701210690743!5m2!1ses!2smx"
                        allowfullscreen>
                    </iframe>
                </div>

                <div id="contact-formCC">
                    <!-- Formulario con Bootstrap -->
                    <form action="contacform.php" method="post">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" id="name" name="nom" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electrónico:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject">Asunto:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></i></span>
                                <input type="text" class="form-control" id="subject" name="asunto" required>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="message">Mensaje:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-message"></i></span>
                                <textarea class="form-control" id="message" name="mensaje" rows="4" required></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </form>
                </div>
            </div>
            
        </section>
    </main>

    <?php
        if (isset($_SESSION['enviado2'])) { 
    ?>
    <script>
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
</body>
</html>