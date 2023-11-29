<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginstyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Playball&display=swap" rel="stylesheet">
    <script src="../js/functionlogin.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="background">
    <?php 
    
        if(!isset($_SESSION['usuario'])){
    ?>
    <div class="formlogin">
        <form class="form" action="cookies.php" method="POST">
            <div class="colorback">
                <div class="titleimg">
                    <image class="title" src="../imagenes/UsuarioIMG.png" alt="" width="120px" height="auto">
                </div>
                <legend class="title">Login</legend>
                <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #FFFFFF"></path>
                </svg>
                </div>
            </div>
            <div class="colorback1">
                <input id="user" class="info" type="text" placeholder="Usuario" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
                <input class="info" type="password" placeholder="Contraseña" name="password" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["password"]; } ?>">
                <div>
                    <div class="containerimage">
                        <img name="image" src="captcha.php?rand=<?php echo rand();?>" id='captcha_image'>
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
                    <input class="check" type="checkbox" name="remember">
                    <p class="check1"> Recordar usuario y contraseña </p>
                </div>
                <div class="containerboton">
                    <input class="boton" type="submit" value="Login" name="submit">
                </div>
                <div class="to_registro">
                    <p><a href="Registro.php">¿No tienes cuenta?</a></p>
                </div>
            </div>
        </form>
    </div>
    <?php 
        }elseif(isset($_SESSION['usuario'])){ ?>
    <div class="formlogin logoutform">
        <form class="form" action="cookies.php" method="POST">
            <div class="colorback">
                <div class="titleimg">
                    <image class="title" src="../imagenes/UsuarioIMG.png" alt="" width="120px" height="auto">
                </div>
                <legend class="title">Logout</legend>
                <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #FFFFFF"></path>
                </svg>
                </div>
            </div>
            <div class="colorback1">
                <div class="labelogout">
                    <p class="rescate primera">¿Quieres salir de tu cuenta <b><?php echo $_SESSION['usuario'];?><b>?</p>
                </div>
                <div class="containerboton">
                    <input class="boton botonlogout" type="submit" value="Logout" name="logout">
                </div>
            </div>
        </form>
    </div>
        <?php }
    ?>
    </div>
</body>
</html>
<?php 
    include('scriptsLogin.php');
?>
