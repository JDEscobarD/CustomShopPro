@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header-body-content pb-2 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Medios de pago</h1>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="box-button">
                    <div class="row mx-auto w-100 justify-content-end align-items-center">
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <button type="button" class="btn w-100 btn-link red" id="clearFields">Limpiar campos</button>
                        </div>
                        <div class="col-xl-4 col-lg-6 mb-3">
                            <button type="submit" class="btn w-100 btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <form action="" method="POST">
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onclick="showContent('content2')" checked />
            <label class="form-check-label" for="flexRadioDefault2">
                Métodos tradicionales
                <span class="d-block text-info">
                    *Esto hará que llegue sus datos de cuenta por correo con el comprobante de pedido.
                </span>
            </label>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div id="content2" class="content ps-5">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Banco</label>
                        <select class="form-select" name="bank_id" id="bankList" required>
                            <option value="" selected disabled>Seleccione...</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->nombre_banco }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Tipo de cuenta</label>
                        <select class="form-select" name="tipoCuenta" aria-label="Default select example">
                            <option selected disabled>Seleccione...</option>
                            @foreach($tipoCuentas as $tipoCuenta)
                                <option value="{{ $tipoCuenta->id }}">{{ $tipoCuenta->tipo_cuenta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="numBank" class="form-label">Número de cuenta bancaria</label>
                        <input type="text" class="form-control" id="numBank" placeholder="Ej: 98898988874" />
                    </div>
                    <div class="mb-3">
                        <label for="nomTitular" class="form-label">Nombre titular de la cuenta</label>
                        <input type="text" class="form-control" id="nomTitular" placeholder="Ej: Juan Pérez" />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" onclick="showContent('content3')" />
            <label class="form-check-label" for="flexRadioDefault3">
                Usar una API
            </label>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div id="content3" class="content ps-5" style="display: none;">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nombre API</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ej: Pagos por PayU Latam" />
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">ID del comerciante</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ej: 791265" />
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">ID de la cuenta</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ej: 98898988874" />
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Clave API</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ej: HK5H5J2HH5J2J2" />
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">URL de puerta de enlace</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Ej: https://gateway.payulatam.com/ppp-web-gateway/" />
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Página de respuesta</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ej: https://sitioweb.com/customshop-pro" />
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Página de confirmación</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Ej: https://sitioweb.com/customshop-pro" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--modal limpiar campos-->
<x-modal id="clearFieldModal" title="¡Advertencia!">
    <p>Cambios cancelados. <br> El formulario se ha restablecido.</p>
    @slot('footer')
    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal" aria-label="Close">Aceptar</button>
    @endslot
</x-modal>
@endsection