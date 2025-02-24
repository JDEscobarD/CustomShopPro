@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header-body-content pb-2 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Usuarios</h1>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="box-button">
                    <div class="row mx-auto w-100 justify-content-end align-items-center">
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <a href="{{ route('register.create') }}" class="btn w-100 btn-primary">Nuevo usuario</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-striped" id="productTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($usuarios as $usuario)
                <tr>
                    <th scope="row"><strong>{{ $usuario->id }}</strong></th>
                    <td class="name-item">{{ $usuario->nombreUs }} {{ $usuario->apellidosUs }}</td>
                    <td>{{ $usuario->direccion }}</td>
                    <td>{{ $usuario->rol->rol }}</td>
                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-primary me-2">Editar</a>
                        <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $usuario->id }}">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <div class="row w-100 aling-items-center">
            <div class="col-lg-6">
                <p id="item-count" class="mt-4 mb-0">Mostrando {{ $usuarios->lastItem() }} de {{ $usuarios->total() }} resultados</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <nav class="mt-4">
                    {{ $usuarios->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>

<!--Llamado de componentes modales para los respectivos mensajes-->

@foreach($usuarios as $usuario)
<!-- Modal para eliminar usuario -->
<x-modal id="deleteModal{{ $usuario->id }}" title="¡Atención!">
    <p>¿Estás seguro de eliminar a <strong>{{ $usuario->nombreUs }} {{ $usuario->apellidosUs }}</strong>?</p>

    <!-- Formulario para eliminar el usuario -->
    <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" id="deleteForm{{ $usuario->id }}">
        @csrf
        @method('DELETE')
    </form>

    <!-- Personalizar el footer del modal -->
    @slot('footer')
    <button type="button" class="btn btn-link text-secondary" data-bs-dismiss="modal">Cancelar</button>
    <button type="button" class="btn btn-danger px-5" onclick="document.getElementById('deleteForm{{ $usuario->id }}').submit()">Eliminar</button>
    @endslot
</x-modal>
@endforeach

@endsection