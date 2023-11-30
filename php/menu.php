<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />

    <!-- Link de estilos -->
    <link rel="stylesheet" href="../css/estilotienda.css">
    <link rel="stylesheet" href="../css/estilospagp.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Playball&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f3a304d792.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a href="index.php" style="text-decoration: none;">
                    <img src="../imagenes/LogoCC.png" alt="Candy Craze" style="margin-right:10px; width:70px;">
                </a>
                <a class="navbar-brand" href="index.php">Candy Craze</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex ms-auto">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                         <li class="nav-item">
                            <a class="nav-link" href="../index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="productos.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="acerca.php">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Contáctanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ayuda.php">Ayuda</a>
                        </li>
                    </ul>
                    <a href="login.php" class="navbar-nav">
                        <span class="nav-link">
                            <i class="fa-solid fa-user menuIcons"></i>
                        </span>
                    </a>

                    <a href="carrito.php" class="navbar-nav">
                        <span class="nav-link">
                            <i class="fa-solid fa-cart-shopping menuIcons"></i>
                        </span>
                    </a>
                </div>
                </div>
            </div>
        </nav>

        <section class="textos-header">
            <h2 class="animate__animated animate__fadeInDown">— Bienvenido a Candy Craze —</h2>
            <h1 class="animate__animated animate__fadeInUp">¡Delicias Globales en un Click!</h1>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #f9dec9"></path>
        </svg></div>
    </header>
</body>
</html>
