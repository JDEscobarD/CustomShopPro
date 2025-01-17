document.addEventListener("DOMContentLoaded", () => {
    const masterCheckbox = document.getElementById("selectAll");
    const rowCheckboxes = document.querySelectorAll(".row-checkbox");

    //actualizar el estado principal
    const updateMasterCheckbox = () => {
        const total = rowCheckboxes.length;
        const checked = Array.from(rowCheckboxes).filter(checkbox => checkbox.checked).length;

        if (checked === total) {
            masterCheckbox.checked = true;
            masterCheckbox.indeterminate = false;
        } else if (checked > 0) {
            masterCheckbox.checked = false;
            masterCheckbox.indeterminate = true;
        } else {
            masterCheckbox.checked = false;
            masterCheckbox.indeterminate = false;
        }
    };

    //cambiar todos los subordinados
    masterCheckbox.addEventListener("change", () => {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = masterCheckbox.checked;
        });
    });

    //cambiar el estado del maestro cuando cambian los subordinados
    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", updateMasterCheckbox);
    });
});
