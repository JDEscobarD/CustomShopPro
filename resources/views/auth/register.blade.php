@extends('layouts.auth')

@section('content_login')

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="fw-bold text-black-50 my-5">Formulario de Registro de Usuario</h2>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo.svg') }}" alt="CustomShop PRO" class="my-5">
            </div>
        </div>
        <form action="{{ route('register') }}" method="POST" class="pb-5">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nombreUs" class="form-label">Nombre</label>
                                <input type="text" class="form-control @error('nombreUs') is-invalid @enderror" id="nombreUs" name="nombreUs" value="{{ old('nombreUs') }}">
                                @error('nombreUs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="apellidosUs" class="form-label">Apellidos</label>
                                <input type="text" class="form-control @error('apellidosUs') is-invalid @enderror" id="apellidosUs" name="apellidosUs" value="{{ old('apellidosUs') }}">
                                @error('apellidosUs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tipoDoc" class="form-label">Tipo de Documento</label>
                                <select class="form-select @error('tipoDoc') is-invalid @enderror" id="tipoDoc" name="tipoDoc">
                                    <option value="1" selected disabled>Seleccione</option>
                                    <option value="2"></option>
                                    <!-- Agregar más tipos de documentos si es necesario -->
                                </select>
                                @error('tipoDoc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="numDocu" class="form-label">Número de Documento</label>
                                <input type="number" class="form-control @error('numDocu') is-invalid @enderror" id="numDocu" name="numDocu" value="{{ old('numDocu') }}">
                                @error('numDocu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="departamentos" class="form-label">Departamento</label>
                                <select class="form-select @error('departamentos') is-invalid @enderror" id="departamentos" name="departamentos">
                                    @error('departamentos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <option value="1" selected disabled>Seleccione</option>
                                    <option value="2"></option>
                                    <!-- Puedes agregar más opciones según los roles disponibles -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="ciudades" class="form-label">Ciudad</label>
                                <select class="form-select @error('ciudades') is-invalid @enderror" id="ciudades" name="ciudades">
                                    <option value="1" selected disabled>Seleccione</option>
                                    <option value="2"></option>
                                    <!-- Puedes agregar más opciones según los roles disponibles -->
                                </select>
                                @error('ciudades')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}">
                                @error('direccion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select @error('rol') is-invalid @enderror" id="rol" name="rol" value="{{ old('rol') }}">
                                    <option value="1" selected disabled>Seleccione</option>
                                    <option value="2"></option>
                                    <!-- Puedes agregar más opciones según los roles disponibles -->
                                </select>
                                @error('rol')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                                @error('telefono')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="my-4">
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="d-flex flex-column">
                        <button type="submit" class="btn btn-primary px-5 mt-4">Registrar</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-link px-5 mt-4">Cancelar registro</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>


@endsection