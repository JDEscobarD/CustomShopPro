@extends('layouts.auth')

@section('content_login')
<div class="container">
    <div class="row align-items-center mt-5">
        <div class="col-lg-4 offset-lg-1">
            <section class="login">
                <img src="{{ asset('assets/media/images/CUSTOMSHOP-PRO-logo.svg') }}" alt="CustomShop PRO">
                <!--Controles de logueo-->
                <form action="{{ route('login.authenticated') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="userInput" class="form-label">Usuario</label>
                        <div class="position-relative">
                            <input type="email" name="email" class="form-control userInput @error('email') is-invalid @enderror" id="userInput" placeholder="Correo electrónico" value="{{ old('email') }}">
                            <span class="ic-login user"></span>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="passInput" class="form-label">Contraseña</label>
                        <div class="position-relative">
                            <input type="password" name="password" class="form-control passInput @error('password') is-invalid @enderror" id="passInput" placeholder="Contraseña">
                            <span class="toggle-text" id="togglePassword">Mostrar</span>
                            <span class="ic-login pass"></span>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="btn-section">
                        <button type="submit" class="btn btn-primary d-block w-100">Iniciar sesión</button>
                        <a href="{{ route('password.request') }}" class="btn btn-link d-block w-100">Cambiar o reestablecer contraseña</a>
                    </div>
                </form>
            </section>
        </div>
        <div class="col-lg-6 offset-lg-1 d-none d-lg-block">
            <section class="carousel-side">
                <!--Carousel informativo-->
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{ asset('assets/media/images/img-carousel-01.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Una tienda de productos compuestos permite a los clientes personalizar sus compras según sus preferencias, combinando diferentes elementos para crear un producto único.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <img src="{{ asset('assets/media/images/img-carousel-02.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p><strong>CustomShop PRO</strong>, permite la selección de componentes personalizados, brindando descripciones detalladas y opciones fáciles de entender.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="10000">
                            <img src="{{ asset('assets/media/images/img-carousel-03.png') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Herramientas visuales como vistas previas y configuradores en tiempo real te ayudará a visualizar cómo se verá su producto final.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection