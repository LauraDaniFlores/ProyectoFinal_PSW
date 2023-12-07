
var Part1 = document.getElementById("form1"); 
var Part2 = document.getElementById("form2");
var Part3 = document.getElementById("form3"); 

var Next1 = document.getElementById("Next1");
var Next2 = document.getElementById("Next2");
var Back1 = document.getElementById("Back1");
var Back2 = document.getElementById("Back2");

var Validar = document.getElementById("ValidarCupon"); 

var form_2_progressbar = document.querySelector(".form_2_progressbar")
var form_3_progressbar = document.querySelector(".form_3_progressbar")

const cupones = ["BIENVENIDA15"];

Next1.onclick = function(){
    var name = document.getElementById("Nombre_Completo");
    var correo = document.getElementById("Correo");
    var direccion = document.getElementById("Direccion");
    var codigo = document.getElementById("CodigoPostal");
    var ciudad = document.getElementById("Ciudad");
    var numero = document.getElementById("NumeroTelefonico");
    var pais = document.getElementById("Pais").value;

    var Impuestos = document.getElementById("Impuestos");
    var GastosE = document.getElementById("GastosE");

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    // var EstaCorrecto = false; 
    var EstaCorrecto = true; 
    var GastosDeEnvio = 0; 
    var boolGastosDeEnvio = true; 

    if (name.value.length !== 0) {
        if(numero.value.length !== 0 ){
            if(direccion.value.length !== 0 ){
                if(codigo.value.length !== 0 ){
                    if(ciudad.value.length !== 0 ){
                        if (correo.value.match(validRegex)) {
                            EstaCorrecto = true; 
                        }
                    }
                }
            } 
        }
    }
    if(EstaCorrecto){
        Part1.style.left = "-1100px"; 
        Part2.style.left = "10%"; 
        form_2_progressbar.classList.add("active"); 

        name.disabled = true; 
        correo.disabled = true; 
        direccion.disabled = true; 
        codigo.disabled = true; 
        ciudad.disabled = true; 
        numero.disabled = true;
        document.getElementById("Pais").disabled = true; 
        
        var paises = document.getElementsByClassName("paises");
        for(const paiss of paises){
            paiss.innerHTML = pais; 
        }


        let preciototal = 400; 
        if(preciototal > 350){
            GastosE.value = 0
            document.getElementById("GastoEnvioPorque").innerHTML = "¡Tu envío es gratis! Has comprado más de $350 pesos en productos.";
            boolGastosDeEnvio = false; 
        }
        if(pais === "México"){
            Impuestos.value = preciototal*0.16; 
            GastosDeEnvio = 90; 

        }else if(pais === "Estados Unidos"){
            Impuestos.value = preciototal*0.19; 
            GastosDeEnvio = 200; 
        }else{
            Impuestos.value = preciototal*0.24; 
            GastosDeEnvio = 350; 
        }
        if(boolGastosDeEnvio){
            GastosE.value = GastosDeEnvio;
        }

    }
}

Back1.onclick = function(){
    Part1.style.left = "10%"; 
    Part2.style.left = "1100px"; 
    form_2_progressbar.classList.remove("active")
}

Next2.onclick = function(){
    Part2.style.left = "-1100px"; 
    Part3.style.left = "10%"; 
    form_3_progressbar.classList.add("active")
}

Back2.onclick = function(){
    Part2.style.left = "10%"; 
    Part3.style.left = "1100px"; 
    form_3_progressbar.classList.remove("active")
}

Validar.onclick = function(){
    var cupon = document.getElementById("Cupon");
    for(const Cupones of cupones){
        if(Cupones === cupon.value){
            cupon.disabled = true; 
            document.getElementById("cuponDescuento").innerHTML = "Tu descuento es del 15%"
            break; 
        }
        console.log(document.getElementById("cuponDescuento"))
        if(document.getElementById("cuponDescuento").innerHTML.length == 0){
            cupon.value = "";
            Swal.fire({
            icon: "question",
            title: "¡No es correcto!",
            text: "Por el momento este cupón no está disponible",
            background: "#fff",
            })          
        }

    } 

}