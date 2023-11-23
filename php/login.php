<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginstyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Playball&display=swap" rel="stylesheet">
    <script src="js/functionlogin.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="formlogin">
        <form class="form" action="php/cookies.php" method="POST">
            <legend class="title">Login</legend>
            <input id="user" class="info" type="text" placeholder="Usuario" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
            <input class="info" type="password" placeholder="Contraseña" name="password" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["password"]; } ?>">
            <div>
                <div class="containerimage">
                    <img name="image" src="php/captcha.php?rand=<?php echo rand();?>" id='captcha_image'>
                </div>
                <p class="refresh">¿No puedes leer la imagen? <a href="" id="clickhere"> Haz click aquí </a> para actualizar</p>
                <input class="captcha" type="text" size="8" name="captcha" placeholder="akvn873j">
            </div>
            <div class="preguntas" id="preg">
                <p id="id"></p>
                <p class="rescate primera">Aquí tienes la pregunta de recuperación:</p>
                <p class="rescate">¿Quién es tu cantante o banda favorita?</p>
                <input class="pregunta info" type="text" name="pregunta" placeholder="DAY6">
            </div>
            <div class="cookies">
                <input class="check" type="checkbox" name="remember" checked>
                <p class="check1"> Recordar usuario y contraseña </p>
            </div>
            <div class="containerboton">
                <input class="boton" type="submit" value="Login" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    include('php/scriptsLogin.php');
?>
