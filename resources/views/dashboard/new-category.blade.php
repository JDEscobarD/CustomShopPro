@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header-body-content pb-2 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Nueva categoría</h1>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="box-button">
                    <div class="row mx-auto w-100 justify-content-end align-items-center">
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <button type="button" class="btn w-100 btn-link red" id="clearFields">Limpiar campos</button>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <button type="submit" form="categoryForm" class="btn w-100 btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('categories.store') }}" method="POST" id="categoryForm">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}"
                placeholder="Nombre de la categoría"
                required>
            @error('nombre')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción del producto</label>
            <textarea
                class="form-control @error('descripcion') is-invalid @enderror"
                id="descripcion"
                name="descripcion"
                rows="4"
                placeholder="Escriba una descripción."
                required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </form>
</div>

<!--Llamado de componentes modales para los respectivos mensajes-->

<!--modal limpiar campos-->
<x-modal id="clearFieldModal" title="¡Advertencia!">
    <p>Cambios cancelados. <br> El formulario se ha restablecido.</p>
    @slot('footer')
    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal" aria-label="Close">Aceptar</button>
    @endslot
</x-modal>

@endsection