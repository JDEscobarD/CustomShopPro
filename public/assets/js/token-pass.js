document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('tokenForm');
    const modal = new bootstrap.Modal(document.getElementById('modalToken'));
    const modalEmailInput = document.getElementById('modalEmail');
    const validateTokenForm = document.getElementById('validateTokenForm');
    const validateTokenButton = document.getElementById('validateTokenButton');

    // Enviar el formulario inicial
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualiza el valor del campo email en el modal
                    modalEmailInput.value = form.querySelector('input[name="email"]').value;
                    modal.show(); // Mostrar el modal después de enviar el correo
                } else {
                    alert('Error al enviar el correo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    // Enviar el formulario de validación del token al hacer clic en el botón
    validateTokenButton.addEventListener('click', function (e) {
        e.preventDefault(); // Evita el comportamiento predeterminado del botón

        fetch(validateTokenForm.action, {
            method: 'POST',
            body: new FormData(validateTokenForm),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirigir a la URL proporcionada por el controlador
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Error al validar el token.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    // Enviar el formulario de validación del token al presionar Enter
    validateTokenForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Evita el envío tradicional del formulario

        fetch(validateTokenForm.action, {
            method: 'POST',
            body: new FormData(validateTokenForm),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirigir a la URL proporcionada por el controlador
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Error al validar el token.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});