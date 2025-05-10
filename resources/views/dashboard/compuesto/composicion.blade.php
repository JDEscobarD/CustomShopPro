<!-- Sección de Composición -->
<div id="composed" class="tabcontent d-none">
    <div class="card-component">
        <div class="row mb-2">
            <div class="col-12">
                <label class="form-label">Nombre del campo:</label>
                <input type="text" class="form-control w-100 mb-2" name="compositions[0][nombre_campo]" placeholder="Nombre del label">
            </div>
            <div class="col-md-4">
                <label class="form-label">Categoría</label>
                <select class="form-select" name="compositions[0][category_id]" onchange="this.form.submit()">
                    <option value="">Seleccione...</option>
                    @foreach ($listCategories as $category)
                    <option value="{{$category->id}}" {{ request()->input('compositions.0.category_id') == $category->id ? 'selected' : '' }}>
                        {{$category->nombre}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Artículo</label>
                <select class="form-select" name="compositions[0][articulo_id]">
                    <option value="">Seleccione...</option>
                    @if(request()->has('compositions.0.category_id'))
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Precio adicional</label>
                <div class="input-group">
                    <input type="number" step="0.01" class="form-control price-input" name="compositions[0][precio_adicional]" placeholder="0">
                </div>
            </div>
        </div>
    </div>
</div>