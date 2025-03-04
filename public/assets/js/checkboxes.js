document.addEventListener("DOMContentLoaded", () => {
    const masterCheckbox = document.getElementById("selectAll");
    const rowCheckboxes = document.querySelectorAll(".row-checkbox");
    const applyActionButton = document.getElementById("applyAction");
    const confirmDeleteButton = document.getElementById("confirmDelete");
    const batchActionForm = document.getElementById("batchActionForm");
    const confirmDeleteModal = new bootstrap.Modal(document.getElementById("confirmDeleteModal"));

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

    masterCheckbox.addEventListener("change", () => {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = masterCheckbox.checked;
        });
        updateMasterCheckbox();
    });

    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener("change", updateMasterCheckbox);
    });

    applyActionButton.addEventListener("click", () => {
        const selectedAction = document.querySelector('select[name="action"]').value;
        const selectedIds = Array.from(document.querySelectorAll('input[name="selected_ids[]"]:checked')).map(checkbox => checkbox.value);

        if (selectedAction === "delete" && selectedIds.length > 0) {
            confirmDeleteModal.show();
        } else {
            alert("Por favor, selecciona al menos una categoría y una acción.");
        }
    });

    // Confirmar la eliminación
    confirmDeleteButton.addEventListener("click", () => {
        batchActionForm.submit();
    });
});