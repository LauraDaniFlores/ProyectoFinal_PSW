
function mostrarImagen(event) {
    var archivo = event.target.files[0];
    var lector = new FileReader();

    lector.onload = function(e) {
    var imagen = document.getElementById('imagen');
    imagen.src = e.target.result;
    imagen.style.display = 'block';
    }

    lector.readAsDataURL(archivo);
}
// Función para agregar un nuevo div con un botón de cierre
function agregarEtiqueta() {
    var nuevaEtiqueta = document.getElementById("etiquetaInput").value;
    if(nuevaEtiqueta!=""){
        document.getElementById("etiquetaInput").value="";
        var nuevoDiv = document.createElement('div');
        nuevoDiv.classList.add('etiqueta');
        nuevoDiv.innerHTML = '<div class="etiqueta-content">' + nuevaEtiqueta + '</div><button class="eliminar"><i class="fa-solid fa-xmark fa-sm" style="color: #ffffff;"></i></button>';
        document.getElementById('container-etiquetas').appendChild(nuevoDiv);

        // Agregar el controlador de eventos al botón recién creado
        var botonesEliminar = document.getElementsByClassName('eliminar');
        for (var i = 0; i < botonesEliminar.length; i++) {
            botonesEliminar[i].addEventListener('click', function() {
                this.parentNode.remove(); // Elimina el div padre del botón (el div con la clase "etiqueta")
            });
        }
    }
}

function obtenerEtiquetas() {
    const etiquetas = document.getElementsByClassName('etiqueta-content');
    const etiquetasArray = [];
    for (let i = 0; i < etiquetas.length; i++) {
        etiquetasArray.push(etiquetas[i].innerHTML);
    }
    return etiquetasArray;
}

$(document).ready(function() {
    $("#formulario-altas").on("submit", function(event) {
        event.preventDefault(); // Evitar la acción predeterminada del formulario

        // Crear un nuevo objeto FormData
        var formData = new FormData(this);

        // Obtener el array de etiquetas
        var etiquetas = obtenerEtiquetas();

        // Agregar el array 'etiquetas' al FormData
        formData.append('etiquetas', JSON.stringify(etiquetas));

        // Enviar los datos mediante AJAX
        $.ajax({
            url: "altas.php",
            type: "POST",
            data: formData, // Enviar los datos del formulario y el array combinados
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                // Manejar la respuesta del servidor si es necesario
                console.log("Solicitud AJAX exitosa");
                console.log(JSON.stringify(formData)); // Mostrar los datos enviados
                
                location.reload();
                
                
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
});

