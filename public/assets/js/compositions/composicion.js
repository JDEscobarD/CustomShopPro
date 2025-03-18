document.addEventListener("DOMContentLoaded", function () {
    // Formatear input de precio en las dos secciones
    document.querySelectorAll(".price-input").forEach(input => {
        input.addEventListener("input", function () {
            this.value = formatCurrency(this.value);
        });
    });

    // Evitar ingreso de caracteres no numéricos en todas las entradas de precio
    document.querySelectorAll(".price-input").forEach(input => {
        input.addEventListener("keypress", function (e) {
            if (!/\d/.test(e.key)) {
                e.preventDefault();
            }
        });
    });

    // Función para formatear el número con signo de pesos y puntos de mil
    function formatCurrency(value) {
        value = value.replace(/[^\d]/g, "");  // Eliminar caracteres no numéricos
        return value ? "$ " + Number(value).toLocaleString("es-CO") : "$ 0";
    }



    // Manejo de opciones en Composición
    document.getElementById("composicion").addEventListener("click", function (e) {
        if (e.target.id === "add-option" || e.target.id === "add-selector") {
            e.preventDefault();
            let container = document.createElement("div");
            container.classList.add("row", "mb-2");
            container.innerHTML = `
                <div class="col-md-4">
                    <label>Categoría:</label>
                    <select class="form-select">
                        <option>Seleccione...</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Artículo:</label>
                    <select class="form-select">
                        <option>Seleccione...</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Precio adicional:</label>
                    <input type="text" class="form-control price-input" placeholder="$ 0">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-danger remove-option">Eliminar</button>
                </div>
            `;

            let composicionContainer = document.getElementById("composicion");

            // Seleccionar los elementos que están por encima de los botones 'Agregar opción' o 'Agregar selector'
            let lastOption = composicionContainer.querySelector(".row.mb-2"); // Esto selecciona el último campo agregado

            if (lastOption) {
                // Insertar antes del último componente
                composicionContainer.insertBefore(container, lastOption);
            } else {
                // Si no hay componentes previos, se inserta al final
                composicionContainer.appendChild(container);
            }

            // Agregar funcionalidad de eliminar
            container.querySelector(".remove-option").addEventListener("click", function () {
                if (confirm("¿Está seguro de eliminar esta opción?")) {
                    container.remove();
                }
            });

            // Formatear input de precio adicional en la sección de composición
            container.querySelector(".price-input").addEventListener("input", function () {
                this.value = formatCurrency(this.value);
            });

            // Evitar ingreso de caracteres no numéricos en el precio adicional
            container.querySelector(".price-input").addEventListener("keypress", function (e) {
                if (!/\d/.test(e.key)) {
                    e.preventDefault();
                }
            });
        }
    });

    // Bloquear costo de envío si es gratis
    document.getElementById("envioGratis").addEventListener("change", function () {
        let costoEnvio = document.getElementById("costoEnvio");
        if (this.checked) {
            // Si "Envio Gratis" está seleccionado, limpiar y deshabilitar el campo de costo de envío
            costoEnvio.value = "";
            costoEnvio.disabled = true;
        } else {
            // Si no está seleccionado, habilitar el campo de costo de envío
            costoEnvio.disabled = false;
        }
    });

    // Manejo de la galería
    let dropzone = document.getElementById("dropzone");
    let fileInput = document.getElementById("fileInput");

    dropzone.addEventListener("click", function () {
        fileInput.click();
    });

    dropzone.addEventListener("dragover", function (e) {
        e.preventDefault();
        dropzone.classList.add("border-primary");
    });

    dropzone.addEventListener("dragleave", function () {
        dropzone.classList.remove("border-primary");
    });

    dropzone.addEventListener("drop", function (e) {
        e.preventDefault();
        dropzone.classList.remove("border-primary");
        handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener("change", function () {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        [...files].forEach(file => {
            if (file.type.startsWith("image/") && file.size <= 3 * 1024 * 1024) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    let imgContainer = document.createElement("div");
                    imgContainer.classList.add("img-container", "m-1");

                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("img-thumbnail");
                    img.style.width = "100%";  // Ocupa el 100% del ancho
                    img.style.height = "100%"; // Ocupa el 100% de la altura
                    img.style.objectFit = "cover"; // Asegura que la imagen cubra toda la caja sin deformarse
                    img.style.margin = "0"; // Elimina márgenes innecesarios

                    // Crear el botón de eliminar
                    let deleteButton = document.createElement("button");
                    deleteButton.classList.add("btn", "btn-danger", "btn-sm", "mt-2");
                    deleteButton.textContent = "Eliminar";
                    deleteButton.addEventListener("click", function () {
                        if (confirm("¿Está seguro de eliminar esta imagen?")) {
                            imgContainer.remove();
                        }
                    });

                    // Agregar la imagen y el botón al contenedor
                    imgContainer.appendChild(img);
                    imgContainer.appendChild(deleteButton);

                    // Agregar la imagen dentro del dropzone
                    dropzone.appendChild(imgContainer);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // jQuery code to handle navigation link clicks
    $(document).ready(function () {
        $(".nav-link").click(function () {
            $(".nav-link").removeClass("active");
            $(this).addClass("active");

            $(".section").removeClass("active");
            $("#" + $(this).data("target")).addClass("active");
        });
    });
});
