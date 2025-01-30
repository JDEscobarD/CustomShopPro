@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header-body-content pb-3 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Categorías</h1>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="box-button d-flex align-item-center justify-content-end">
                    <form class="d-flex search-controller" role="search">
                        <input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-section">
        <div class="row align-items-end">
            <div class="col-lg-10">
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label for="categories" class="form-label">Acción por lotes</label>
                        <select class="form-select" name="categories" aria-label="Default select example">
                            <option selected disabled>Seleccione</option>
                            <option value="2">Borrar</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <button type="submit" class="btn btn-outline-primary px-5 w-100">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="form-check">
                            <input class="form-check-input row-checkbox" type="checkbox" value="" id="selectAll">
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
                            <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                        </div>
                    </th>
                    <td scope="row">{{ $categoria->id }}</td>
                    <td class="name-item">{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>{{ $categoria->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $categoria->id) }}" class="btn btn-primary me-2">Editar</a>
                        <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
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
@endsection