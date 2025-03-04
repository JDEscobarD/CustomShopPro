document.addEventListener('DOMContentLoaded', function () {
    const cancelButton = document.querySelector('#clearFields');

    cancelButton.addEventListener('click', function () {
        try {
            const form = document.querySelector('.container-fluid form');

            if (form) {
                form.reset();

                form.querySelectorAll('input, textarea').forEach(element => {
                    element.value = '';
                    if (element.type === 'checkbox' || element.type === 'radio') {
                        element.checked = false;
                    }
                });

                resetImage();
            } else {
                console.warn('Formulario no encontrado dentro del contenedor.');
            }
        } catch (error) {
            console.error('Error al limpiar el formulario:', error);
        }

        document.querySelectorAll('.content').forEach(function (content) {
            content.style.display = 'none';
        });

        const modal = new bootstrap.Modal(document.querySelector('#clearFieldModal'));
        modal.show();
    });
});
