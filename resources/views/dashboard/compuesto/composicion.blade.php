<!-- Sección de Composición -->
<div id="composed" class="tabcontent d-none">
    <div class="card-component">
        <div class="row mb-2">
            <div class="col-12">
                <label class="form-label">Nombre del campo:</label>
                <input type="text" class="form-control w-100 mb-2" placeholder="Nombre del label">
            </div>
            <div class="col-md-4">
                <label class="form-label">Categoría</label>
                <select class="form-select">
                    <option>Seleccione...</option>
                    @foreach ($listCategories as $category )
                    <option value="{{$category->id}}">{{$category->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Artículo</label>
                <select class="form-select">
                    <option>Seleccione...</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Precio adicional</label>
                <div class="input-group">
                    <input type="text" class="form-control price-input w-50" placeholder="$ 0">
                </div>
            </div>
            <div class="col-12">
                <a href="#" id="add-option" class="btn btn-link d-block text-start" style="text-decoration: none;">+ Agregar otra opción</a>
            </div>
        </div>
    </div>
    <div class="text-start">
        <a href="#" id="add-selector" class="btn btn-link d-block text-start" style="text-decoration: none;">+ Agregar otro selector</a>
    </div>
</div>