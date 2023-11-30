const mens = document.getElementById("message");
const input = document.querySelector("#passrepetir");

var password = document.getElementById('pass');
var password1 = document.getElementById('passrepetir');

function logKey(e) {
    var pass = ` ${password.value}`;
    var pass1 = ` ${password1.value}`;

    if(pass == pass1){
        document.getElementById('message').style.display ="none";
    }else{
        document.getElementById('message').style.display ="block";
    }
}


if (input) {
    input.addEventListener("keyup", logKey);  
}

