@extends('layouts.auth')

@section('content_login')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo.svg') }}" alt="CustomShop Pro">

            <p class="my-5"><strong>¿Olvidó su contraseña o quiere reestablecerla?</strong> <br> <br> No hay problema. <br> Simplemente déjenos saber su dirección de correo electrónico y le enviaremos un token para restablecer la contraseña que le permitirá elegir una nueva. </p>

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
                </div>

                <button type="submit" class="btn btn-primary px-5 w-100">Enviar código</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal para validar el token -->
<x-modal title="Código de verificación" id="modalToken">
    <form action="{{ route('password.validate') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ old('email') }}">
        <p class="mb-4">Ingrese el código que llegó a su correo electrónico.</p>
        <div class="mb-3">
            <label for="tokenValidate" class="form-label">Token de verificación</label>
            <input type="text" name="token" class="form-control @error('token') is-invalid @enderror" id="tokenValidate" aria-describedby="emailHelp" placeholder="Token de verificación" required>
            @error('token')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        @slot('footer')
        <button type="button" class="btn btn-link text-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary px-5">Validar</button>
        @endslot
    </form>
</x-modal>

<!-- Script para manejar el modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('tokenForm');
        const modal = new bootstrap.Modal(document.getElementById('modalToken'));

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        modal.show(); // Mostrar el modal después de enviar el correo
                    } else {
                        alert('Error al enviar el correo.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
@endsection