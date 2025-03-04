document.getElementById('togglePassword').addEventListener('click', function () {    
    const passwordField = document.getElementById('passInput');
    const toggleText = document.getElementById('togglePassword');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleText.textContent = 'Ocultar';
    } else {
        passwordField.type = 'password';
        toggleText.textContent = 'Mostrar';
    }
});