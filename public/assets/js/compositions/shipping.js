document.getElementById('envioGratis').addEventListener('change', function(e) {
    document.getElementById('costoEnvio').disabled = e.target.checked;
    if(e.target.checked) document.getElementById('costoEnvio').value = '';
});