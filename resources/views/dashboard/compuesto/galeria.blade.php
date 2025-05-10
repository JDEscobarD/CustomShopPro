<!-- Sección de Galería -->
<div id="galery" class="tabcontent d-none">
    <div id="dropzone" class="dropzone border p-4 text-center" style="cursor: pointer; border: 2px dashed #aaa;">
        <p>📷 Arrastra y suelta las imágenes aquí o haz clic para seleccionarlas. <span class="text-danger">*</span></p>
        <p class="text-muted">Solo se aceptan formatos JPG, JPEG y PNG. Máximo 3MB.</p>
        <input type="file" id="fileInput" name="gallery[]" multiple accept=".jpg, .jpeg, .png" required>
        @error('gallery')
        <span class="invalid-feedback d-block">{{ $message }}</span>
        @enderror
    </div>
    <div id="preview" class="mt-3 d-flex flex-wrap"></div>
</div>