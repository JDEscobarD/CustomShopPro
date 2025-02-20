@extends('layouts.auth')

@section('content_login')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo.svg') }}" alt="CustomShop Pro">

            <h5 class="my-5"><strong>¿Olvidó su contraseña o quiere reestablecerla?</strong></h5>
            <p class="mb-5">No hay problema. <br> Simplemente déjenos saber su dirección de correo electrónico y le enviaremos un token para restablecer la contraseña que le permitirá elegir una nueva.</p>

            <!-- Mostrar mensajes de éxito o error -->
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form action="{{ route('password.pin') }}" method="POST" id="tokenForm">
                @csrf

                <div class="mb-3">
                    <label for="emailRestore" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emailRestore" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}" required>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    @if(session('email_not_found'))
                    <div class="text-danger mt-2">
                        {{ session('email_not_found') }}
                    </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary px-5 w-100">Enviar código</button>
                <a href="{{ route('login') }}" class="btn btn-link px-5 mt-4 w-100">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<!-- Modal para validar el token -->
<x-modal title="Código de verificación" id="modalToken">
    <form action="{{ route('password.validate') }}" method="POST" id="validateTokenForm">
        @csrf
        <input type="hidden" name="email" id="modalEmail" value="{{ old('email') }}">
        <p class="mb-4">Ingrese el código que llegó a su correo electrónico.</p>
        <div class="mb-3">
            <label for="tokenValidate" class="form-label">Token de verificación</label>
            <input type="text" name="token" class="form-control @error('token') is-invalid @enderror" id="tokenValidate" placeholder="Token de verificación" required maxlength="6" pattern="\d{6}" title="Ingrese un token de 6 dígitos">
            @error('token')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        @slot('footer')
        <button type="button" class="btn btn-link text-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary px-5" id="validateTokenButton">Validar</button>
        @endslot
    </form>
</x-modal>

<!-- Script para manejar el modal -->
<script src="{{ asset('assets/js/token-pass.js') }}" defer></script>

@endsection