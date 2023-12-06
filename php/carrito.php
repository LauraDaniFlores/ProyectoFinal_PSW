<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />

    <title>Carrito de compra | Candy Craze</title>

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="../css/estilospagp.css">
    <link rel="stylesheet" href="../css/estiloform.css">
    <link rel="stylesheet" href="../css/style_carrito.css">


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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <?php
        include "menu.php";
        ?>
        <script>
            document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Carrito de Productos —";
            document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "Recuerda que no tienes limite de compra";
        </script>

        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-40.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #FFFFFF"></path>
            </svg></div>

    </header>


    <!-- Acomoda los articulos agregados al carrito -->

    <section>

    <!-- Abre el acomodo del diseño para los articulos agregados al carrito -->
        <div class="acomodoart">

        <!-- Checkbox del articulo -->
            <div class="acomodochk">
                <div class="checkbox-wrapper">
                    <input checked="" type="checkbox" class="check" id="check1-61">
                    <label for="check1-61" class="label">
                        <svg width="45" height="45" viewBox="0 0 95 95">
                            <rect x="30" y="20" width="50" height="50" stroke="black" fill="none"></rect>
                            <g transform="translate(0,-952.36222)">
                                <path
                                    d="m 56,963 c -102,122 6,9 7,9 17,-5 -66,69 -38,52 122,-77 -7,14 18,4 29,-11 45,-43 23,-4"
                                    stroke="black" stroke-width="3" fill="none" class="path1"></path>
                            </g>
                        </svg>
                    </label>
                </div>
            </div>



            <!-- Imagen del articulo -->
            <div>
                <img class="acomodoart" src="../imagenes/picafresa.png" alt="">
            </div>

            <!-- Seccion de descripcion articulo -->
            <div>
                <!-- Titulo del producto -->
                <h3>lencfoñwenfcñqokfmcq</h3>
                <!-- Descripcion del articulo -->
                <p>cqeblieqwbuflu3</p>
            </div>


            <div class="acomodocant">
                <div>
                    <h3>Cant.</h3>
                    <p>4</p>
                </div>
            </div>


    
            <div class="acomodoindpre">
                <div>
                    <!-- Precio del articulo -->
                    <h3>$456.00</h3>
                </div>
            </div>


        </div>

        <br>

        <!-- Cierra diseño -->


        <div class="acomodoart">

            <div class="acomodochk">
                <div class="checkbox-wrapper">
                    <input checked="" type="checkbox" class="check" id="check2-61">
                    <label for="check2-61" class="label">
                        <svg width="45" height="45" viewBox="0 0 95 95">
                            <rect x="30" y="20" width="50" height="50" stroke="black" fill="none"></rect>
                            <g transform="translate(0,-952.36222)">
                                <path
                                    d="m 56,963 c -102,122 6,9 7,9 17,-5 -66,69 -38,52 122,-77 -7,14 18,4 29,-11 45,-43 23,-4"
                                    stroke="black" stroke-width="3" fill="none" class="path1"></path>
                            </g>
                        </svg>
                    </label>
                </div>
            </div>



            <div>
                <img class="acomodoart" src="../imagenes/picafresa.png" alt="">
            </div>


            <div>
                <h3>lencfoñwenfcñqokfmcq</h3>
                <p>cqeblieqwbuflu3</p>
            </div>



            <div class="acomodocant">
                <div>
                    <h3>Cant.</h3>
                    <!-- Numero de la cantidad a comprar del producto -->
                    <p>4</p>
                </div>
            </div>


            <div class="acomodoindpre">
                <div>
                    <h3>$456.00</h3>
                </div>
            </div>


        </div>

        <br>

        <div class="acomodoart">

            <div class="acomodochk">
                <div class="checkbox-wrapper">
                    <input checked="" type="checkbox" class="check" id="check3-61">
                    <label for="check3-61" class="label">
                        <svg width="45" height="45" viewBox="0 0 95 95">
                            <rect x="30" y="20" width="50" height="50" stroke="black" fill="none"></rect>
                            <g transform="translate(0,-952.36222)">
                                <path
                                    d="m 56,963 c -102,122 6,9 7,9 17,-5 -66,69 -38,52 122,-77 -7,14 18,4 29,-11 45,-43 23,-4"
                                    stroke="black" stroke-width="3" fill="none" class="path1"></path>
                            </g>
                        </svg>
                    </label>
                </div>
            </div>



            <div>
                <img class="acomodoart" src="../imagenes/picafresa.png" alt="">
            </div>

            <div>
                <h3>lencfoñwenfcñqokfmcq</h3>
                <p>cqeblieqwbuflu3</p>
            </div>


            <div class="acomodocant">
                <div>
                    <h3>Cant.</h3>
                    <p>4</p>
                </div>
            </div>


            <div class="acomodoindpre">
                <div>
                    <h3>$456.00</h3>
                </div>
            </div>



        </div>
    </section>


    <br><br><br><br><br>


    <!-- Acumulable del precio a pagar y el boton de comprar que redireccionara a la pagina de compra -->
    <footer>

        <div class="acumulado">

            <div class="acomodoprecio">
                <div class="precio_acumulado">
                    <h3>Pecio Acumulado</h3>
                    <!-- Suma de los precios de los articulos seleccionados a comprar -->
                    <p><b>$3647.00</b></p>
                </div>

            </div>



            <div class="acomodocom">
                <div class="bcompra">
                    <a class="fancy" href="#pagina_de_compra">
                        <span class="top-key"></span>
                        <span class="text">Comprar Ahora</span>
                        <span class="bottom-key-1"></span>
                        <span class="bottom-key-2"></span>
                    </a>
                </div>
            </div>

        </div>
    </footer>



</body>

</html>