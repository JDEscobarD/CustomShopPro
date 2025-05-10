@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Bloque para mostrar mensajes de sesión --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="header-body-content pb-2 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Nuevo producto</h1>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="box-button">
                    <div class="row mx-auto w-100 justify-content-end align-items-center">
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <button type="button" class="btn w-100 btn-link red" id="clearFields">Limpiar campos</button>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <button type="submit" form="productForm" class="btn w-100 btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('products.store') }}" method="POST" id="productForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" placeholder="Nombre del producto" required>
                    @error('nombre')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción del producto <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="4" placeholder="Escriba una descripción." required></textarea>
                    @error('descripcion')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <p class="fw-bold my-4">Datos del producto</p>
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-tab="price" href="#">Precio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-tab="attribute" href="#">Atributos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-tab="composed" href="#">Composición</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-tab="shipping" href="#">Envío</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-tab="galery" href="#">Galería</a>
                    </li>
                </ul>
                <div class="composed-section py-4">
                    @include('dashboard.compuesto.precio')
                    @include('dashboard.compuesto.atributos')
                    @include('dashboard.compuesto.composicion')
                    @include('dashboard.compuesto.envio')
                    @include('dashboard.compuesto.galeria')
                </div>
            </div>
            <div class="col-lg-3">
                <div class="aditional-settings-prod">
                    <div class="mb-3">
                        <label for="composition_option_id" class="form-label">Compuesto <span class="text-danger">*</span></label>
                        <select class="form-select @error('composition_option_id') is-invalid @enderror" name="composition_option_id" id="composition_option_id" aria-label="Default select example" required>
                            @foreach ( $listOptions as $listOption ) {{-- Changed back to $listOptions --}}
                            <option value="{{$listOption->id}}">{{$listOption->opcion}}</option>
                            @endforeach
                        </select>
                        @error('composition_option_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="format_id" class="form-label">Tipo <span class="text-danger">*</span></label>
                        <select class="form-select @error('format_id') is-invalid @enderror" name="format_id" id="format_id" aria-label="Default select example" required>
                            @foreach ( $formats as $format )
                            <option value="{{$format->id}}">{{$format->formato}}</option>                                
                            @endforeach
                        </select>
                        @error('format_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoría <span class="text-danger">*</span></label>
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id" aria-label="Default select example" required>
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($listCategories as $category )
                            <option value="{{$category->id}}">{{$category->nombre}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unidades_disponibles" class="form-label">Unidades disponibles <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('unidades_disponibles') is-invalid @enderror" pattern="[0-9]+" id="unidades_disponibles" name="unidades_disponibles" placeholder="0" required>
                        @error('unidades_disponibles')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="upload-file">
                            <div class="front-page">
                                <label for="imagen_portada" class="form-label">Suba su imagen de portada <span class="text-danger">*</span></label>
                                <input class="form-control @error('imagen_portada') is-invalid @enderror" type="file" id="imagen_portada" name="imagen_portada" accept="image/*" required>
                                @error('imagen_portada')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <div class="thumbnail-product d-none">
                                    <button type="button" id="deleteImageButton">Eliminar</button>
                                    <img id="thumbnailPreview" alt="Vista previa" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label d-flex justify-content-between"><span>URL <span class="text-danger">*</span></span> <span>Vista previa</span></label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="https://" required>
                        @error('url')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!--Llamado de componentes modales para los respectivos mensajes-->
@if (session('success'))
    <x-modal id="successModal" title="¡Éxito!">
        <p>{{ session('success') }}</p>
        <x-slot name="footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
        </x-slot>
    </x-modal>
@endif

<x-modal id="clearFieldModal" title="¡Advertencia!">
    <p>Cambios cancelados. <br> El formulario se ha restablecido.</p>
    @slot('footer')
    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal" aria-label="Close">Aceptar</button>
    @endslot
</x-modal>


<script src="{{ asset('assets/js/tabs-product.js') }}" defer></script>
<script src="{{ asset('assets/js/thumbnail-product.js') }}" defer></script>
<script src="{{ asset('assets/js/composition-tab-control.js') }}" defer></script>

@endsection