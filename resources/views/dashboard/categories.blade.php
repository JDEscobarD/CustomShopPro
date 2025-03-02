@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="header-body-content pb-3 mb-4">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-3">
                <h1 class="text-left fw-bold">Categorías</h1>
            </div>
            <div class="col-xl-2 col-lg-3 offset-xl-1 offset-lg-3 mb-3">
                <a href="{{ route('categories') }}" class="btn w-100 btn-link red">Limpiar búsqueda</a>
            </div>
            <div class="col-xl-3 col-lg-6 mb-3">
                <div class="box-button d-flex align-items-center justify-content-end">
                    <form class="d-flex search-controller w-100" role="search" action="{{ route('categories.search') }}" method="GET">
                        <input class="form-control" type="search" name="query" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" aria-label="Buscar"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form id="batchActionForm" action="{{ route('categories.batch.action') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="filter-section">
            <div class="row align-items-end">
                <div class="col-lg-10">
                    <div class="row align-items-end">
                        <div class="col-xl-3 col-lg-6 mb-3">
                            <label for="categories" class="form-label">Acción por lotes</label>
                            <select class="form-select" name="action" aria-label="Default select example">
                                <option selected disabled>Seleccione</option>
                                <option value="delete">Borrar</option>
                            </select>
                        </div>
                        <div class="col-xl-2 col-lg-6 mb-3">
                            <button type="button" id="applyAction" class="btn btn-outline-primary px-5 w-100">Aplicar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(request()->has('query'))
        <p class="mt-4 mb-3">Mostrando resultados para: <strong>"{{ request()->input('query') }}"</strong></p>
        @endif
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAll">
                            </div>
                        </th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha de creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($categorias as $categoria)
                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" name="selected_ids[]" value="{{ $categoria->id }}">
                            </div>
                        </th>
                        <td scope="row" class="fw-bold">{{ $categoria->id }}</td>
                        <td class="name-item">{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>{{ $categoria->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $categoria->id) }}" class="btn btn-primary me-2">Editar</a>
                            <form action="{{ route('categories.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $categoria->id }}">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
    <div class="pagination">
        <div class="row w-100 aling-items-center">
            <div class="col-lg-6">
                <p id="item-count" class="mt-4 mb-0">Mostrando {{ $categorias->lastItem() }} de {{ $categorias->total() }} resultados</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <nav class="mt-4">
                    {{ $categorias->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

<!--Llamado de componentes modales para los respectivos mensajes-->

@foreach($categorias as $categoria)
<!-- Modal para eliminar categoría -->
<x-modal id="deleteModal{{ $categoria->id }}" title="¡Atención!">
    <p>¿Estás seguro de eliminar la categoría <strong>{{ $categoria->nombre }}</strong>?</p>

    <form action="{{ route('categories.destroy', $categoria->id) }}" method="POST" id="deleteForm{{ $categoria->id }}">
        @csrf
        @method('DELETE')
    </form>

    @slot('footer')
    <button type="button" class="btn btn-link text-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-danger px-5" onclick="document.getElementById('deleteForm{{ $categoria->id }}').submit()">Eliminar</button>
    @endslot
</x-modal>
@endforeach

<!-- Modal para eliminar categorías agrupadas -->
<x-modal id="confirmDeleteModal" title="¡Atención!">
    <p>¿Estás seguro de que deseas eliminar las categorías seleccionadas?</p>

    @slot('footer')
    <button type="button" class="btn btn-link text-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" id="confirmDelete" class="btn btn-danger px-5">Eliminar</button>
    @endslot
</x-modal>

@endsection