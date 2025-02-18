@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <h3>Restablecer Contraseña</h3>
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
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Restablecer Contraseña</button>
            </form>
        </div>
    </div>
</div>
@endsection