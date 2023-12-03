
function modifyRow(rowData,etiquetas) {
    // Ejemplo de cómo podrías manejar los datos al hacer clic en Modificar
    document.getElementById('container-etiquetas').innerHTML="";
    if(etiquetas != ''){
        for (var i = 0; i < etiquetas.length; i++) {
            var nuevaEtiqueta = etiquetas[i];
            var nuevoDiv = document.createElement('div');
            nuevoDiv.classList.add('etiqueta');
            nuevoDiv.innerHTML = '<div class="etiqueta-content">' + nuevaEtiqueta + '</div><button class="eliminar"><i class="fa-solid fa-xmark fa-sm" style="color: #ffffff;"></i></button>';
            document.getElementById('container-etiquetas').appendChild(nuevoDiv);

            // Agregar el controlador de eventos al botón recién creado
            var botonesEliminar = document.getElementsByClassName('eliminar');
            for (var j = 0; j < botonesEliminar.length; j++) { // Cambié el nombre de la variable a 'j'
                botonesEliminar[j].addEventListener('click', function() {
                    this.parentNode.remove(); // Elimina el div padre del botón (el div con la clase "etiqueta")
                });
            }
        }
    }
    document.getElementById('idProducto').value=rowData.idProducto;
    document.getElementById('nombre').value=rowData.nombre;
    document.getElementById('descripcion').value=rowData.descripcion;
    document.getElementById('existencias').value=rowData.existencias;
    document.getElementById('precio').value=rowData.precio;
    document.getElementById('descuento').value=rowData.descuento;
    document.getElementById('imagen').src=rowData.imagen;
    document.getElementById('imagen').style.display = 'block';
    
    if(document.getElementById('mexico').value==rowData.categoria){
        document.getElementById('mexico').checked=true;
    }else if(document.getElementById('japon').value==rowData.categoria){
        document.getElementById('japon').checked=true;
    }else{
        document.getElementById('corea').checked=true;
    }

}

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
    $("#formulario-datos").on("submit", function(event) {
        event.preventDefault(); // Evitar la acción predeterminada del formulario

        // Obtener el array de etiquetas
        var etiquetas = obtenerEtiquetas();

        // Obtener los datos del formulario
        var formData = $(this).serializeArray(); // Obtener los datos del formulario

        // Agregar el array 'etiquetas' a los datos del formulario
        formData.push({ name: 'etiquetas', value: JSON.stringify(etiquetas) });

        // Enviar los datos mediante AJAX
        $.ajax({
            url: "modificaciones.php",
            type: "POST",
            data: formData, // Enviar los datos del formulario y el array combinados
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
