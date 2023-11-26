<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginstyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&display=swap" rel="stylesheet">
    <script src="js/script_Registro.js"></script> 
    <title>Registro</title>
</head>
<body class="body">
    <div class="div_Registro">
        <form action="Registro_insertar.php" method="POST" id="formulario">
            <div class="titulo"> 
                <h3>Registro</h3>
            </div>
            <div>
                <label for="user">Nombre de usuario</label>
                <input type="text" name="user" id="user" required>
            </div>
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="correo">Correo electrónico</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="seg">¿Quién es tu cantante o banda favorita?</label>
                <small >No debes olvidar tu respuesta</small>
                <input type="text" name="seg" id="seg" required>
            </div>
            <div class="formulario__grupo" id="grupo__password">
                <label for="cons">Contraseña</label>
                <input type="password" name="pass" id="pass" required>
            </div>
            <div class="formulario__grupo" id="grupo__password2">
                <label for="seg">Repetir contraseña</label>
                <small id="formulario_error">Ambas contraseñas deben ser iguales.</small>
                <input type="password" name="pass1" id="pass1" required>
            </div>
            <div class="button">
                <button type="submit" id="submit" name="submit">Registrarte</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php 
    include ('Regis_script.php');
?>
