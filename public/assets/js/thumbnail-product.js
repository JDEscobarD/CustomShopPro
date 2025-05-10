const fileInput = document.getElementById('imagen_portada');
const thumbnailContainer = document.querySelector('.thumbnail-product');
const thumbnailPreview = document.getElementById('thumbnailPreview');
const deleteButton = document.getElementById('deleteImageButton');

fileInput.addEventListener('change', function (event) {
    if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];

        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function (e) {
                thumbnailPreview.src = e.target.result;
                thumbnailContainer.classList.remove('d-none');
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

deleteButton.addEventListener('click', function () {
    resetImage();
});

function resetImage() {
    fileInput.value = '';
    thumbnailPreview.src = '';
    thumbnailContainer.classList.add('d-none');
}