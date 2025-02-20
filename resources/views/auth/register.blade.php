@extends('layouts.auth')

@section('content_login')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo.svg') }}" alt="CustomShop PRO" class="mb-3">
            <h2 class="fw-bold text-black-50 my-5">Formulario de Registro de Usuario</h2>
            <form action="{{ route('register.store') }}" method="POST" class="pb-5">
                @csrf
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
                            <select class="form-select @error('tipo_documento_id') is-invalid @enderror" id="tipoDoc" name="tipo_documento_id">
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($tipos_documentos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipoDocu }}</option>
                                @endforeach
                            </select>
                            @error('tipo_documento_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="numDocu" class="form-label">Número de Documento</label>
                            <input type="text"
                                class="form-control @error('numDocu') is-invalid @enderror"
                                id="numDocu"
                                name="numDocu"
                                value="{{ old('numDocu') }}"
                                minlength="6" pattern="\d{6,}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
                            <select class="form-select @error('departamento_id') is-invalid @enderror" id="departamentos" name="departamento_id">
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                                    {{ $departamento->nombre }}
                                </option>
                                @endforeach
                            </select>
                            @error('departamento_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- Selector de Ciudades -->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="ciudades" class="form-label">Ciudad</label>
                            <select class="form-select @error('ciudad_id') is-invalid @enderror" id="ciudades" name="ciudad_id">
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}" data-departamento-id="{{ $ciudad->departamento_id }}" {{ old('ciudad_id') == $ciudad->id ? 'selected' : '' }}>
                                    {{ $ciudad->nombre }}
                                </option>
                                @endforeach
                            </select>
                            @error('ciudad_id')
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
                            <select class="form-select @error('rol_id') is-invalid @enderror" id="rol" name="rol_id">
                                <option value="" selected disabled>Seleccione...</option>
                                @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                                @endforeach
                            </select>
                            @error('rol_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text"
                                class="form-control @error('telefono') is-invalid @enderror"
                                id="telefono"
                                name="telefono"
                                value="{{ old('telefono') }}"
                                minlength="10"
                                maxlength="10"
                                pattern="3\d{9}"
                                minlength="10"
                                maxlength="10"
                                pattern="3\d{9}"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
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
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex flex-column">
                            <button type="submit" class="btn btn-primary px-5 mt-4">Registrar</button>
                            <a href="{{ route('users') }}" class="btn btn-link px-5 mt-4">Cancelar registro</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-5 offset-lg-1 text-center">
            <img src="{{ asset('assets/media/images/img-register.jpg') }}" alt="CustomShop PRO" class="my-5 register-img">
        </div>
    </div>

</div>

<!-- Script para filtrar ciudades-->
<script src="{{ asset('assets/js/filter-city.js') }}" defer></script>

@endsection