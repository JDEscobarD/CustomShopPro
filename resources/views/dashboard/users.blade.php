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
                        <div class="col-lg-4 mb-3">
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
                        <button type="button" class="btn btn-primary me-2">Editar</button>
                        <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!--Llamado de componentes modales para los respectivos mensajes-->

<!--modal limpiar campos-->
<x-modal id="clearFieldModal" title="¡Advertencia!">
    <p>Cambios cancelados. <br> El formulario se ha restablecido.</p>
</x-modal>

@endsection