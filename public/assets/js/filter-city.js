document.addEventListener('DOMContentLoaded', function () {
    console.log("El DOM está listo");

    const departamentosSelect = document.getElementById('departamentos');
    const ciudadesSelect = document.getElementById('ciudades');
    const todasLasCiudades = Array.from(ciudadesSelect.querySelectorAll('option'));

    // Deshabilitar el select de ciudades inicialmente
    ciudadesSelect.disabled = true;

    departamentosSelect.addEventListener('change', function () {
        const departamentoId = this.value;
        console.log("Departamento seleccionado:", departamentoId);

        // Limpiar el select de ciudades
        ciudadesSelect.innerHTML = '<option value="" selected disabled>Seleccione...</option>';

        if (departamentoId) {
            // Filtrar las ciudades que pertenecen al departamento seleccionado
            const ciudadesFiltradas = todasLasCiudades.filter(ciudad => {
                return ciudad.getAttribute('data-departamento-id') === departamentoId;
            });

            // Agregar las ciudades filtradas al select
            ciudadesFiltradas.forEach(ciudad => {
                const option = document.createElement('option');
                option.value = ciudad.value;
                option.textContent = ciudad.textContent;
                ciudadesSelect.appendChild(option);
            });

            // Habilitar el select de ciudades
            ciudadesSelect.disabled = false;
        } else {
            // Si no se selecciona un departamento, deshabilitar el select de ciudades
            ciudadesSelect.disabled = true;
        }
    });
});