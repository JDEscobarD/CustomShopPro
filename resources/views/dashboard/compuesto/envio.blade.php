<div id="shipping" class="tabcontent d-none">
    <div class="form-check">
        <input class="form-check-input form-label" type="checkbox" name="envio_gratis" id="envioGratis" value="1">
        <label class="form-check-label" for="envioGratis">Envío gratis</label>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="mt-2 form-label">Costo de envío: <span class="text-danger">*</span></label>
            <div class="input-group w-100">
                <input type="number" step="0.01" class="form-control price-input w-50 @error('costo_envio') is-invalid @enderror" name="costo_envio" id="costoEnvio" placeholder="0" required>
                @error('costo_envio')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/compositions/shipping.js') }}" defer></script>