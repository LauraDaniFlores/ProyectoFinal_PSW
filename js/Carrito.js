
var Check = document.getElementsByClassName("check");

for( let i=0; i<Check.length; i++){
    Check[i].addEventListener('click', function(){
        var precio = Number(document.getElementById("precio"+i).innerHTML);
        var preciototal = Number(document.getElementsByClassName("total")[0].innerHTML);
        if(Check[i].checked){
            final = preciototal + precio;
        }else{
            final = preciototal - precio;
        }
        document.getElementsByClassName("total")[0].innerHTML = final;
        document.getElementsByClassName("totalinput")[0].value = final;
    })
}


