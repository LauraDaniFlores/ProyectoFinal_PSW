<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
if(isset($_SESSION['repetido'])){
    ?><script>
        swal.fire({
            icon: "error",
            title: "Lo sentimos",
            text: "Usuario en uso.",
        });
    </script><?php
}elseif(isset($_SESSION['insertar'])){
    ?><script>
        Swal.fire({
            icon: "success",
            title: "¡Felicidades!",
            text: "Usuario creado",
            background: "#fff url(../images/trees.png)",
            backdrop: `
            rgba(247,140,162,0.2)
            url("../imagenes/Dulces3.gif")
            left top
            no-repeat
            `    
        });
        </script><?php
}elseif(isset($_SESSION['cont'])){
    ?><script>
        swal.fire({
            icon: "question",
            title: "Lo sentimos",
            text: "Las contraseñas no coinciden.",
        });
    </script><?php
}
unset($_SESSION['cont']);
unset($_SESSION['repetido']);
unset($_SESSION['insertar']);
?>
