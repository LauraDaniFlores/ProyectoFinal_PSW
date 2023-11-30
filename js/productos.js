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
            }
        }
        envio.send( );
    });
}

function check() {
    var categ =  document.querySelector('input[name=categoria]:checked').value;
    return categ;
}



 


    