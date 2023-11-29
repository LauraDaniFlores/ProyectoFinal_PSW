<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginstyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&display=swap" rel="stylesheet">
    <script src="../js/script_Registro.js"></script> 
    <title>Registro</title>
</head>
<body class="body">
    <div class="background">
        <div class="div_Registro">
            <form action="Registro_insertar.php" method="POST" id="formulario">
                <div class="colorback_reg_1">
                    <div class="titleimg">
                        <image class="title" src="../imagenes/UsuarioIMG.png" alt="" width="120px" height="auto">
                    </div>
                    <div class="titulo"> 
                        <h3>Registro</h3>
                    </div>
                    <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                        style="height: 100%; width: 100%;">
                        <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                            style="stroke: none; fill: #FFFFFF"></path>
                        </svg>
                    </div>
                </div>
                <div class="colorback_reg_2">
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
                </div>   
            </form>
        </div>
    </div>
</html>

<?php 
    include ('Regis_script.php');
?>
