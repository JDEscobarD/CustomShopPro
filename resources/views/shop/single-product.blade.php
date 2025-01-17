@extends('layouts.store')

@section('content_web')
<div class="container product">
    <h2 class="product-title">Rute Bike - Orbea</h2>
    <div class="row product-info">
        <div class="col-lg-4">
            <p class="description">Lorem ipsum dolor sit amet consectetur. Velit nisi magna feugiat ut risus egestas viverra. Id leo turpis aliquam tristique in eget est.</p>
            <p class="title-selectors">¡Personaliza tu bici!</p>
            <form action="" method="get">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Rin - Mavic Aksium 29”</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Rines</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Sillín de Ruta Contact SLR Forward</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Sillín</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Marco de Carbono SANTA CRUZ HIGH</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Marco</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>TENSOR RD-TY300 TOURNEY /7VELCITY</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Transmisión</label>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <div id="carouselProduct" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('media/images/images_web/img-product-05.png') }}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('media/images/images_web/img-product-04.png') }}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('media/images/images_web/img-product-03.png') }}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('media/images/images_web/img-product-02.png') }}" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('media/images/images_web/img-product-01.png') }}" class="d-block w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="thumbnail-carousel mt-3">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('media/images/images_web/img-product-05.png') }}" class="w-100 thumbnail" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ asset('media/images/images_web/img-product-04.png') }}" class="w-100 thumbnail" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ asset('media/images/images_web/img-product-03.png') }}" class="w-100 thumbnail" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ asset('media/images/images_web/img-product-02.png') }}" class="w-100 thumbnail" alt="">
                    </div>
                    <div class="col">
                        <img src="{{ asset('media/images/images_web/img-product-01.png') }}" class="w-100 thumbnail" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <ul class="atributes">
                <li>
                    <p>Material:</p>
                    <p>FibraCarbón</p>
                </li>
                <li>
                    <p>Peso:</p>
                    <p>6 Kg</p>
                </li>
                <li>
                    <p>Tamaño:</p>
                    <p>170 Cm</p>
                </li>
            </ul>
            <div class="quantity-control mt-5">
                <button class="btn-decrease">-</button>
                <input type="number" class="quantity-input" value="1" min="1">
                <button class="btn-increase">+</button>
            </div>
        </div>
    </div>
</div>

<div class="price-card-productView">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p class="total-price"><span id="total-price">12.517.100</span></p>
                <div class="helper">
                    <span class="ic-helper"></span>
                    <p>El valor no incluye el envío y está sujeto variaciones
                        dependiendo de la ciudad de destino.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <div class="buttons-box">
                    <button type="button" class="btn btn-primary w-100">Comprar</button>
                    <button type="button" class="btn btn-outline-secondary w-100">Añadir al carrito</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/carousel-product.js') }}" defer></script>
<script src="{{ asset('js/quantity-control.js') }}" defer></script>
@endsection