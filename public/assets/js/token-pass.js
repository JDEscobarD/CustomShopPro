document.addEventListener('DOMContentLoaded', function () {
    const tokenForm = document.getElementById('tokenForm');
    const modalToken = new bootstrap.Modal(document.getElementById('modalToken'));

    tokenForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Evita que el formulario se envíe de forma tradicional

        // Envía el formulario usando Fetch API
        fetch(tokenForm.action, {
            method: 'POST',
            body: new FormData(tokenForm),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Muestra el modal si el token se envió correctamente
                    modalToken.show();
                } else {
                    // Muestra un mensaje de error si algo salió mal
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});