//Categorias - Elegir entre las 4 opciones
//Con AJAX

var radios = document.querySelectorAll('input[name=categoria]');

for (const radio of radios) {
    radio.addEventListener('click', function(){
    
        misdatos="cat="+check();
        
        var envio = new XMLHttpRequest();        
        envio.open("GET","producto_mostrar.php?"+misdatos, true);  
        envio.onreadystatechange=function(){
            if (envio.readyState == 4 && envio.status == 200){
                console.log(envio.responseText);
                document.getElementById('Productos_div').innerHTML=envio.responseText;
                reactivarClicks();
            }
        }
        envio.send( );
    });
}

function check() {
    var categ =  document.querySelector('input[name=categoria]:checked').value;
    return categ;
}

reactivarClicks();

function reactivarClicks () {

    var logueado = document.getElementById('logeado');
    // console.log(logueado.innerHTML);

    if(logueado.innerHTML == "true"){
        //Cantidad de un producto para agregar al carrito
        var Resta = document.querySelectorAll('button[name="Resta"]');
        var Suma = document.querySelectorAll('button[name="Suma"]');
        var Agregar = document.querySelectorAll('button[name="agregar"]'); 
        
        // console.log(Resta.length);
        for (let j=0; j<Resta.length; j++) {
            Resta[j].addEventListener('click', function(){
                console.log("Hola");
                let numero = Number(document.getElementById('ProductoCarro'+j).innerHTML);
                if( numero > 0){
                    numero = numero - 1;
                    document.getElementById('ProductoCarro'+j).innerHTML = numero;
                    document.getElementById('cantidad'+j).value = numero;
                }
            });
        }
        

        for (let j=0; j<Suma.length; j++) {
            Suma[j].addEventListener('click', function(){

                let numero = Number(document.getElementById('ProductoCarro'+j).innerHTML);
                // console.log(Number(document.getElementById('exis'+j).innerHTML));
                if( Number(document.getElementById('exis'+j).innerHTML) > numero){
                    numero = numero + 1;
                    document.getElementById('ProductoCarro'+j).innerHTML = numero;
                    document.getElementById('cantidad'+j).value = numero;
                }
            });
        }
    }
}  
