<!-- Sección de Atributo -->
<div id="attribute" class="tabcontent d-none">
    <div id="attributes">
        <div class="card-attribute mb-3">
            <div class="row mb-2">
                <div class="col-md-6">
                    <label class="form-label">Nombre del atributo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('attributes.0.nombre') is-invalid @enderror" name="attributes[0][nombre]" placeholder="Nombre" required>
                    @error('attributes.0.nombre')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Descripción <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('attributes.0.descripcion') is-invalid @enderror" name="attributes[0][descripcion]" placeholder="Descripción" required>
                    @error('attributes.0.descripcion')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="text-start">
        <a href="#" id="add-attribute" class="btn btn-link text-start">+ Agregar atributo</a>
    </div>
</div>

<script src="{{ asset('assets/js/compositions/attributes.js') }}" defer></script>