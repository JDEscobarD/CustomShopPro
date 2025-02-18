@extends('layouts.auth')

@section('content_login')
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto mt-5">
            <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo.svg') }}" alt="CustomShop Pro">
            <h3 class="my-5"><strong>Restablecer Contraseña</strong></h3>
            <form action="{{ route('password.reset') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id=" password_confirmation" required>
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Restablecer Contraseña</button>
                <a href="{{ route('login') }}" class="btn btn-link px-5 mt-4 w-100">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection