//Refresh Captcha
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = "php/captcha.php?rand=<?php echo rand(); ?>";
}
document.getElementById('clickhere').addEventListener('click',function(){
  refreshCaptcha();
});

function pregunta(){
  var elemento = document.getElementById("preg");
  elemento.style.display = "block"; 
}