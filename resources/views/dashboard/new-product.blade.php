@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                            <button type="submit" class="btn w-100 btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="#" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción del producto</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Escriba una descripción."></textarea>
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
                        <label for="descripcion" class="form-label">Compuesto</label>
                        <select class="form-select" aria-label="Default select example">
                            @foreach ( $listOptions as $listOption )
                            <option value="{{$listOption->id}}">{{$listOption->opcion}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Tipo</label>
                        <select class="form-select" aria-label="Default select example">
                            @foreach ( $formats as $format )
                            <option value="{{$format->id}}">{{$format->formato}}</option>                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Categoría</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected disabled>Seleccione</option>
                            @foreach ($listCategories as $category )
                            <option value="{{$category->id}}">{{$category->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Unidades disponibles</label>
                        <input type="number" class="form-control" pattern="[0-9]+" id="nombre" name="nombre" placeholder="0">
                    </div>
                    <div class="mb-3">
                        <div class="upload-file">
                            <div class="front-page">
                                <label for="formFile" class="form-label">Suba su imagen de portada</label>
                                <input class="form-control" type="file" id="formFile" accept="image/*">
                                <div class="thumbnail-product d-none">
                                    <button type="button" id="deleteImageButton">Eliminar</button>
                                    <img id="thumbnailPreview" alt="Vista previa" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label d-flex justify-content-between"><span>URL</span> <span>Vista previa</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="https://">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!--Llamado de componentes modales para los respectivos mensajes-->
<x-modal id="clearFieldModal" title="¡Advertencia!">
    <p>Cambios cancelados. <br> El formulario se ha restablecido.</p>
    @slot('footer')
    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal" aria-label="Close">Aceptar</button>
    @endslot
</x-modal>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
<script src="{{ asset('assets/js/tabs-product.js') }}" defer></script>
<script src="{{ asset('assets/js/thumbnail-product.js') }}" defer></script>
<script src="{{asset('assets/js/compositions/composicion.js')}}" defer></script>

@endsection