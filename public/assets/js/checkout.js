document.addEventListener('DOMContentLoaded', function () {
    const differentAddressCheck = document.getElementById('differentAddressCheck');
    const sameAddressRadio = document.getElementById('flexCheckDefault');
    const extraFields = document.getElementById('extraFields');
    const pagarButton = document.querySelector('.btn-primary');
    const bancariaRadio = document.getElementById('bancaria');
    const payuRadio = document.getElementById('payu');

    
    extraFields.style.display = 'none';    

    differentAddressCheck.addEventListener('change', function () {
        extraFields.style.display = this.checked ? 'block' : 'none';
    });

    sameAddressRadio.addEventListener('change', function () {
        if (this.checked) {
            extraFields.style.display = 'none';
        }
    });

    differentAddressCheck.addEventListener('change', function () {
        if (this.checked) {
            extraFields.style.display = 'block';
        }
    });

    //funcionalidad al botón pagar
    pagarButton.addEventListener('click', function () {
        if (bancariaRadio.checked) {
            window.location.href = 'https://www.enlace-transferencia-bancaria.com'; //reemplaza con tu enlace real para transferencia bancaria
        } else if (payuRadio.checked) {
            window.location.href = 'https://www.enlace-payu.com'; //reemplaza con tu enlace real para PayU
        } else {
            alert('Por favor selecciona un método de pago.');
        }
    });
});
