// Seleccionar elementos
const fileInput = document.getElementById('formFile');
const thumbnailContainer = document.querySelector('.thumbnail-product');
const thumbnailPreview = document.getElementById('thumbnailPreview');
const deleteButton = document.getElementById('deleteImageButton');

// Manejar el evento de cambio en el input de archivo
fileInput.addEventListener('change', function (event) {
    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];

        // Verificar si el archivo es una imagen
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            // Cargar la imagen en el elemento img
            reader.onload = function (e) {
                thumbnailPreview.src = e.target.result;
                thumbnailContainer.classList.remove('d-none'); // Mostrar el thumbnail
            };

            reader.readAsDataURL(file);
        } else {
            alert('Por favor, seleccione un archivo de imagen válido.');
            resetImage();
        }
    } else {
        resetImage();
    }
});

// Manejar el evento de clic en el botón de eliminar
deleteButton.addEventListener('click', function () {
    resetImage();
});

// Función para reiniciar el estado del input y ocultar el thumbnail
function resetImage() {
    fileInput.value = ''; // Reiniciar el input
    thumbnailPreview.src = ''; // Limpiar la vista previa
    thumbnailContainer.classList.add('d-none'); // Ocultar el contenedor
}