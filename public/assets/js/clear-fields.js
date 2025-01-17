document.addEventListener('DOMContentLoaded', function () {
    const cancelButton = document.querySelector('#clearFields');

    cancelButton.addEventListener('click', function () {

        try {
            document.querySelector('form').reset();
            resetImage();
        } catch (error) {
            
        }

        document.querySelectorAll('.content').forEach(function (content) {
            content.style.display = 'none';
        });

        const modal = new bootstrap.Modal(document.querySelector('#clearFieldModal'));
        modal.show();
    });
});