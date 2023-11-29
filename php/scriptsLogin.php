<!-- Captcha in not the same -->
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php 
    // El captcha es incorrecto
    session_start();
    if(isset($_SESSION['Equal'])){
        ?>
        <script>
            Swal.fire({
            icon: "error",
            title: "¡Oh no!",
            text: "¡El captcha es incorrecto!",
            })          
        </script>
        <?php
        unset($_SESSION['Equal']);
        unset($_SESSION['captcha']);
    }

    // Ha ingresado el usuario a su cuenta
    if(isset($_SESSION['in'])){
        ?>
        <script>
            Swal.fire({
            icon: "success",
            title: "¡Felicidades!",
            text: "¡Haz ingresado a tu cuenta!",
            }).then((result) => {
            if (result.isConfirmed) {
                location. assign('../index.php')
            }});
        </script>
        <?php 
        unset($_SESSION['in']);
        unset($_SESSION['captcha']);
        unset($_SESSION['intentos']);

    }
    // unset($_SESSION['intentos']);
    // unset($SESSION['usuario']);
    // unset($SESSION['admin']);

    if(isset($_SESSION['intentos'])){
        ?>
        <script>
            document.getElementById("preg").style.display = "block";
            document.getElementById("user").style.display = "none";
        </script>
        <?php
    }

    if(isset($_SESSION['error'])){
        ?>
        <script>
            Swal.fire({
            icon: "error",
            title: "¡Oh no!",
            text: "¡Tu cuenta ha sido eliminada!",
            })          
        </script>
        <?php
        unset($_SESSION['error']);
        unset($_SESSION['captcha']);
        unset($_SESSION['intentos']);
    }

    if(isset($_SESSION['mal'])){
        ?>
        <script>
            Swal.fire({
            icon: "error",
            title: "Los datos no son correctos",
            text: "Vuelve a introducirlos.",
            })          
        </script>
        <?php
        unset($_SESSION['mal']);
    }
?>

