document.getElementById('togglePassword').addEventListener('click', function () {    
    const passwordField = document.getElementById('passInput');
    const toggleText = document.getElementById('togglePassword');

    //alternar entre el tipo 'password' y 'text' para el input
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleText.textContent = 'Ocultar';  //cambiar el texto a "Ocultar"
    } else {
        passwordField.type = 'password';
        toggleText.textContent = 'Mostrar';  //cambiar el texto a "Mostrar"
    }
});