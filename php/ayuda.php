<?php
    include "menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Favicon -->
     <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />

    <title>Ayuda | Candy Craze</title>
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
    <script>
        document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Ayuda —";
        document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "Descubre respuestas para todo, o al menos, casi todo";
    </script>
    <main>
        <section class="preguntasTitle">
            <h3>¡Responde todas tus preguntas!</h3>
            <h2>FAQ</h2>
            <div class="linea"></div>
            <br>
            <p>Aquí encontrarás respuestas a las preguntas más comunes. Antes de ponerte en contacto con nosotros, 
                echa un vistazo para ver si tu pregunta ya ha sido respondida. Queremos hacer tu experiencia lo más 
                sencilla posible. Si necesitas más ayuda, estamos a un mensaje de distancia. 
                ¡Gracias por confiar en nosotros!</p>
        </section>
        <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
        style="stroke: none; fill: #fff;"></path></svg></div>

        <section class="preguntasCC">
            <h3>¿Tienes dudas?</h3>
            <h2>Preguntas Frecuentes</h2>
            <div class="linea"></div>
            <br>
            <div class="accordion accordion-flush" id="accordionFlushExample" >
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <strong>¿Cuál es la política de devolución de la tienda de dulces?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Aceptamos devoluciones dentro de los 15 días posteriores a la compra, siempre y cuando los productos estén en su empaque original y sin abrir.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <strong>¿Cuánto tiempo tarda en llegar mi pedido?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">El tiempo de entrega varía según tu ubicación. Generalmente, los pedidos se procesan en 1-2 días hábiles, y el tiempo de envío puede oscilar entre 3 y 7 días hábiles, dependiendo del destino.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <strong>¿Cuáles son las formas de pago aceptadas?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Aceptamos pagos con tarjeta de crédito (Visa, MasterCard, American Express) y PayPal. Lamentablemente, no aceptamos pagos en efectivo en este momento ya que somos una tienda únicamente en línea.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            <strong>¿Puedo realizar cambios en mi pedido después de haberlo confirmado?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Una vez que se haya confirmado tu pedido, no podemos realizar cambios en los productos ni en la dirección de envío. Te recomendamos revisar cuidadosamente tu pedido antes de confirmarlo.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            <strong>¿Cuál es la política de calidad de los dulces?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Nos esforzamos por ofrecer productos de alta calidad. Si recibes un artículo defectuoso o dañado, contáctanos de inmediato para que podamos resolver el problema y enviarte un reemplazo si es necesario.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                            <strong>¿Ofrecen descuentos o promociones periódicas?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Sí, regularmente ofrecemos descuentos y promociones especiales. Te recomendamos suscribirte a la página o seguirnos en redes sociales para mantenerte informado sobre las últimas ofertas.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSeven">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                            <strong>¿Cómo garantizan la frescura de los dulces durante el envío?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Utilizamos empaques especializados y métodos de envío que aseguran la frescura de nuestros productos durante el transporte. Si encuentras algún problema con la calidad de los dulces al recibirlos, por favor, contáctanos de inmediato.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingEight">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                            <strong>¿Cuál es la duración de la vida útil de sus dulces?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">La vida útil de nuestros dulces varía según el tipo de producto. La fecha de vencimiento se indica en el empaque de cada artículo. Recomendamos consumir los dulces antes de la fecha indicada para garantizar la frescura.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingNine">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                            <strong>¿Los dulces son aptos para niños pequeños?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">La mayoría de nuestros dulces son aptos para niños, pero recomendamos revisar las etiquetas de los productos para asegurarse de que sean apropiados para la edad de los niños.</div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTen">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                            <strong>¿Puedo programar la entrega para una fecha específica?</strong>
                        </button>
                    </h2>
                    <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Actualmente, no ofrecemos la opción de programar entregas para fechas específicas.</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        include("footer.php");
    ?>
</body>

</html>