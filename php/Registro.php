<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginstyles.css">
    <link rel="stylesheet" href="../css/estilospagp.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="../imagenes/Icon2.png" />
    <title>Regístrate | Candy Craze</title>
</head>
<body class="body">
    <?php
        include ("menu.php");
    ?>
    <script>
        document.getElementsByClassName("animate__animated animate__fadeInDown")[0].innerHTML = "— Regístrate —";
        document.getElementsByClassName("animate__animated animate__fadeInUp")[0].innerHTML = "Comienza a disfrutar del sabor único de nuestra tienda de dulces";
    </script>

    <main>
        <section class="preguntasTitle">
            <h3> ¿Estás listo para comenzar tu viaje azucarado?</h3>
            <h2>¡Regístrate y endulza tu vida con nosotros!</h2>
            <div class="linea"></div>
            <br>
            <p>Descubre la magia de formar parte de nuestra comunidad. Registrarse es el primer paso para 
                acceder a una experiencia única. Únete ahora y disfruta de la conveniencia de realizar pedidos, 
                seguir tus compras, y recibir actualizaciones exclusivas. </p>
        </section>
        <div style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
        style="stroke: none; fill: #fff;"></path></svg></div>

        <section class="registroCC" style="background-color: #ffffff;">
            <div class="div_Registro">
                <h2>Registro</h2>
                <div class="linea"></div>
                <br>
                <form action="Registro_insertar.php" method="POST" id="formulario" class="row g-3">
                    <div class="col-md-6">
                        <label for="user" class="form-label">Nombre de usuario:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="user" class="form-control" id="user" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="name" class="form-label">Nombre:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="correo" class="form-label">Correo electrónico:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="seg" class="form-label">Cantante / banda favorita <small>¡No lo olvides!</small> :</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-question"></i></span>
                            <input type="text" name="seg" class="form-control" id="seg" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="cons" class="form-label">Contraseña:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="pass" class="form-control" id="pass" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="cons" class="form-label">Repetir contraseña:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="pass1" class="form-control" id="pass1" required>
                        </div>
                        <small id="formulario_error">Ambas contraseñas deben ser iguales</small>
                    </div>

                    <div class="button">
                        <button type="submit" class="btn btn-primary">REGISTRAR</button>
                    </div>
                </form>
            </div>
        </section>

    </main>
    <?php
        include("footer.php");
    ?>
    <script src="../js/script_Registro.js"></script>
</body>
</html>

<?php 
    include ('Regis_script.php');
?>

