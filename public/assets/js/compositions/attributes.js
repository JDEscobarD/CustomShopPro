document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('add-attribute').addEventListener('click', function (e) {
        e.preventDefault();

        const attributesContainer = document.getElementById('attributes');
        const newCard = document.createElement('div');
        newCard.className = 'card-attribute mb-3';
        newCard.innerHTML = `
                <div class="row mb-2">
                    <div class="col-12 text-end">
                        <a href="#" class="btn btn-link text-danger delete-attribute"></a>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nombre del atributo</label>
                        <input type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" placeholder="Descripción">
                    </div>
                </div>`;

        attributesContainer.appendChild(newCard);

        newCard.querySelector('.delete-attribute').addEventListener('click', function (e) {
            e.preventDefault();
            newCard.remove();
        });
    });

    document.querySelectorAll('.delete-attribute').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            this.closest('.card-attribute').remove();
        });
    });
});