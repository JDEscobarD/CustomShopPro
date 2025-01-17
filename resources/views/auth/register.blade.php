@extends('layouts.auth')

@section('content_login')

<body>
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold">Formulario de Registro de Usuario</h2>
        <form action="guardar_usuario.php" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="nombreUs" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombreUs" name="nombreUs" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="apellidosUs" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidosUs" name="apellidosUs" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="tipoDoc" class="form-label">Tipo de Documento</label>
                        <select class="form-select" id="tipoDoc" name="tipoDoc" required>
                            <option value="1">DNI</option>
                            <option value="2">Pasaporte</option>
                            <!-- Agregar más tipos de documentos si es necesario -->
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="numDocu" class="form-label">Número de Documento</label>
                        <input type="text" class="form-control" id="numDocu" name="numDocu" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="departamentos" class="form-label">Departamento</label>
                        <select class="form-select" id="departamentos" name="departamentos" required>
                            <option value="1"></option>
                            <option value="2"></option>
                            <!-- Puedes agregar más opciones según los roles disponibles -->
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="ciudades" class="form-label">Ciudad</label>
                        <select class="form-select" id="ciudades" name="ciudades" required>
                            <option value="1"></option>
                            <option value="2"></option>
                            <!-- Puedes agregar más opciones según los roles disponibles -->
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol" required>
                            <option value="1"></option>
                            <option value="2"></option>
                            <!-- Puedes agregar más opciones según los roles disponibles -->
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="my-4">
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="password_hash" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password_hash" name="password_hash" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="password_hash" class="form-label">Confirmar contraseña</label>
                        <input type="password" class="form-control" id="password_hash" name="password_hash" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-5 mt-4">Registrar</button>
        </form>
    </div>
</body>


@endsection