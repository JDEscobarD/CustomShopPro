@extends('layouts.store')

@section('content_web')
<div class="container checkoutContent my-5">
    <h2 class="mb-4">Finalizar compra</h2>
    <div class="row">
        <!-- Detalle de facturación -->
        <div class="col-md-7">
            <h4>Detalle de facturación</h4>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre <span>*</span></label>
                    <input type="text" class="form-control" id="nombre" required value="Juan Manuel">
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos <span>*</span></label>
                    <input type="text" class="form-control" id="apellidos" required value="Salazar Pérez">
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Departamento <span>*</span></label>
                    <select class="form-select" id="departamento" required>
                        <option disabled>Seleccione...</option>
                        <option selected value="Bogotá DC">Bogotá D.C.</option>
                        <option value="Valle del cauca">Valle del cauca</option>
                        <option value="Bolívar">Bolívar</option>
                        <option value="Antioquia">Antioquia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="departamento" class="form-label">Ciudad <span>*</span></label>
                    <select class="form-select" id="departamento" required>
                        <option disabled>Seleccione...</option>
                        <option selected value="Bogotá DC">Bogotá</option>
                        <option value="Cali">Cali</option>
                        <option value="Cartagena">Cartagena</option>
                        <option value="Medellín">Medellín</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección <span>*</span></label>
                    <input type="text" class="form-control" id="direccion" required value="CLL 1 # 2 - 3">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono <span>*</span></label>
                    <input type="tel" class="form-control" id="telefono" required value="3115849874">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico <span>*</span></label>
                    <input type="email" class="form-control" id="correo" required value="correo@correo.com">
                </div>

                <h4 class="mt-5">Dirección de envío</h4>

                <div class="form-check">
                    <input class="form-check-input" type="radio" value="sameAddress" id="flexCheckDefault" name="checkDir" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Misma dirección de facturación
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" value="differentAddress" id="differentAddressCheck" name="checkDir">
                    <label class="form-check-label" for="differentAddressCheck">
                        ¿Enviar a una dirección diferente?
                    </label>
                </div>
                <div class="mb-3">
                    <label for="notas" class="form-label">Notas del pedido (opcional)</label>
                    <textarea id="notas" rows="4"></textarea>
                </div>
                <!-- Sección de Dirección Adicional -->
                <div id="extraFields" class="hidden-section">
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento</label>
                        <select class="form-select" id="departamento" required>
                            <option selected disabled>Seleccione...</option>
                            <option value="Bogotá DC">Bogotá DC</option>
                            <option value="Bogotá DC">Valle del cauca</option>
                            <option value="Bogotá DC">Volívar</option>
                            <option value="Bogotá DC">Antioquia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Ciudad</label>
                        <select class="form-select" id="departamento" required>
                            <option selected disabled>Seleccione...</option>
                            <option value="Bogotá DC">Bogotá DC</option>
                            <option value="Bogotá DC">Cali</option>
                            <option value="Bogotá DC">Cartagena</option>
                            <option value="Bogotá DC">Medellín</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="altDireccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="altDireccion" placeholder="Ingrese su dirección">
                    </div>
                    <div class="mb-3">
                        <label for="altDireccion" class="form-label">Complemento de dirección</label>
                        <input type="text" class="form-control" id="altDireccion" placeholder="EJ: piso 2 apto 202">
                    </div>
                </div>
            </form>
        </div>
        <!-- Resumen de pedido -->
        <div class="col-md-4 offset-md-1">
            <div class="resumePayment">
                <h4>Su pedido</h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Rute Bike - Orbea x 1</span>
                        <strong>$9,999,999</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Jersey ciclismo x 1</span>
                        <strong>$9,999,999</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Casco U1 negro x 1</span>
                        <strong>$9,999,999</strong>
                    </li>
                    <li class="list-group-item separate"></li>
                    <li class=" list-group-item d-flex justify-content-between">
                        <span>Envío</span>
                        <strong>$0</strong>
                    </li>
                    <li class="list-group-item divider"></li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal</span>
                        <strong>$9,999,999</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>IVA</span>
                        <strong>$0</strong>
                    </li>
                    <li class="list-group-item separate"></li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="toPay">Total a pagar</span>
                        <strong>$9,999,999</strong>
                    </li>
                    <li class="list-group-item divider"></li>
                </ul>
                <h5>Método de pago</h5>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="pago" id="bancaria" checked>
                    <label class="form-check-label" for="bancaria"><strong>Transferencia Bancaria</strong></label>
                </div>
                <div class="form-check mb-5">
                    <input class="form-check-input" type="radio" name="pago" id="payu">
                    <label class="form-check-label" for="payu"><strong>PayU</strong></label>
                </div>
                <button type="button" class="btn btn-primary w-100">Pagar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{  asset('js/checkout.js') }}" defer></script>
@endsection