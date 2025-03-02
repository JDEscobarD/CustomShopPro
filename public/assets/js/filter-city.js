document.addEventListener('DOMContentLoaded', function () {
    console.log("El DOM está listo");

    const departamentosSelect = document.getElementById('departamentos');
    const ciudadesSelect = document.getElementById('ciudades');
    const todasLasCiudades = Array.from(ciudadesSelect.querySelectorAll('option'));

    ciudadesSelect.disabled = true;

    departamentosSelect.addEventListener('change', function () {
        const departamentoId = this.value;
        console.log("Departamento seleccionado:", departamentoId);

        ciudadesSelect.innerHTML = '<option value="" selected disabled>Seleccione...</option>';

        if (departamentoId) {
            const ciudadesFiltradas = todasLasCiudades.filter(ciudad => {
                return ciudad.getAttribute('data-departamento-id') === departamentoId;
            });

            ciudadesFiltradas.forEach(ciudad => {
                const option = document.createElement('option');
                option.value = ciudad.value;
                option.textContent = ciudad.textContent;
                ciudadesSelect.appendChild(option);
            });

            ciudadesSelect.disabled = false;
        } else {
            ciudadesSelect.disabled = true;
        }
    });
});