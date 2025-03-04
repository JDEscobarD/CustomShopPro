document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('tokenForm');
    const modal = new bootstrap.Modal(document.getElementById('modalToken'));
    const modalEmailInput = document.getElementById('modalEmail');
    const validateTokenForm = document.getElementById('validateTokenForm');
    const validateTokenButton = document.getElementById('validateTokenButton');

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
                    modalEmailInput.value = form.querySelector('input[name="email"]').value;
                    modal.show();
                } else {
                    alert('Error al enviar el correo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    validateTokenButton.addEventListener('click', function (e) {
        e.preventDefault();

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
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Error al validar el token.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    validateTokenForm.addEventListener('submit', function (e) {
        e.preventDefault();

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