document.addEventListener('DOMContentLoaded', function () {
    const cancelButton = document.querySelector('#clearFields');

    cancelButton.addEventListener('click', function () {
        try {
            // Selecciona el formulario por la etiqueta dentro de su contenedor
            const form = document.querySelector('.container-fluid form');

            if (form) {
                // Restablece los valores del formulario
                form.reset();

                // Limpieza manual adicional (por si algún campo requiere)
                form.querySelectorAll('input, textarea').forEach(element => {
                    element.value = ''; // Limpia valores manualmente
                    if (element.type === 'checkbox' || element.type === 'radio') {
                        element.checked = false; // Reinicia checkboxes/radios
                    }
                });

                // Si tienes funciones adicionales, como resetear imágenes
                resetImage();
            } else {
                console.warn('Formulario no encontrado dentro del contenedor.');
            }
        } catch (error) {
            console.error('Error al limpiar el formulario:', error);
        }

        // Ocultar contenidos adicionales
        document.querySelectorAll('.content').forEach(function (content) {
            content.style.display = 'none';
        });

        // Mostrar el modal de advertencia
        const modal = new bootstrap.Modal(document.querySelector('#clearFieldModal'));
        modal.show();
    });
});
