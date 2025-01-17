@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="welcome-message" id="welcome">
        <p>
            <strong>¡Hola! CustomShop Pro</strong>, es una plataforma avanzada de comercio electrónico diseñada para permitir a las tiendas ofrecer productos compuestos que los clientes pueden personalizar según sus preferencias. Este dashboard
            es tu centro de control para gestionar todos los aspectos de tu tienda y asegurar una experiencia de compra excepcional para tus clientes.
        </p>
        <button type="button" id="btnCerrar">Cerrar</button>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="selectInput" class="form-label">Filtrar por</label>
                <select class="form-select" aria-label="Default select example" id="selectInput">
                    <option selected value="1">Últimos 3 meses</option>
                    <option value="2">Últimos 6 meses</option>
                    <option value="3">Último año</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-section">
        <div class="card-info">
            <p>Artículo más vendido - <span>553 Unidades</span></p>
            <h2>Basic Bike - Trek</h2>
        </div>
        <div class="card-info">
            <p>Última venta</p>
            <h2>Rute Bike - Orbea - ID#59984</h2>
        </div>
        <div class="card-info">
            <p>Total de ventas realizadas</p>
            <h2>158K</h2>
        </div>
    </div>
</div>

@endsection