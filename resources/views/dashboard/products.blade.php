@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header-body-content pb-3 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Productos</h1>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="box-button d-flex align-item-center justify-content-end">
                    <form class="d-flex search-controller" role="search">
                        <input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="filter-section">
        <div class="row align-items-end">
            <div class="col-lg-2 mb-3">
                <label for="categories" class="form-label">Acción por lotes</label>
                <select class="form-select" name="categories" aria-label="Default select example">
                    <option selected disabled>Seleccione</option>
                    <option value="2">Borrar</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <label for="categories" class="form-label">Filtrar</label>
                <select class="form-select" name="categories" aria-label="Default select example">
                    <option selected disabled>Categoria</option>
                    <option value="1">Montaña</option>
                    <option value="2">Enduro</option>
                    <option value="3">BMX</option>
                    <option value="4">Accesorios</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Fecha</option>
                    <option value="1">Agregado recientemente</option>
                    <option value="2">Últimos 3 meses</option>
                    <option value="3">últimos 6 meses</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <label for="orderFilter" class="form-label">Ordenar por:</label>
                <select class="form-select" id="orderFilter">
                    <option selected disabled value="1">Seleccione</option>
                    <option value="2">A-Z</option>
                    <option value="3">Z-A</option>
                    <option value="4">Mayor precio a menor</option>
                    <option value="5">Menor precio a mayor</option>
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <button type="submit" id="applyFilter" class="btn btn-outline-primary px-5 w-100">Aplicar</button>
            </div>
            <div class="col-lg-2 mb-3">
                <button type="button" id="resetFilter" class="btn btn-link red">Borrar filtros</button>
            </div>
        </div>
    </div>
    <form action="#" method="GET">
        <div class="table-responsive mt-4">
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="selectAll">
                            </div>
                        </th>
                        <th>ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Inventario</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>8857</strong></td>
                        <td class="name-item">Speedster Cycle - Trek</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 2.554.878</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>1057</strong></td>
                        <td class="name-item">Trail Master - Cannondale</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 6.884.554</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>7857</strong></td>
                        <td class="name-item">Endurance Rider - Specialized</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 3.454.844</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>6846</strong></td>
                        <td class="name-item">Velocity Edge - Scott</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 3.563.454</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>1347</strong></td>
                        <td class="name-item">Adventure Pro - Kona</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 1.554.457</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>9454</strong></td>
                        <td class="name-item">Peak Striker - Santa Cruz</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 4.154.664</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>3254</strong></td>
                        <td class="name-item">Road Warrior - Orbea</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 9.554.333</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>4484</strong></td>
                        <td class="name-item">All-Terrain Beast - Merida</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 4.844.666</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>8451</strong></td>
                        <td class="name-item">Summit Racer - Canyon</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 2.655.444</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td><strong>1154</strong></td>
                        <td class="name-item">Urban Sprint - Polygon</td>
                        <td>5 Unidades</td>
                        <td class="price-item">$ 6.474.544</td>
                        <td>BMX</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="button" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    <div class="pagination">
        <div class="row w-100 aling-items-center">
            <div class="col-lg-6">
                <p id="item-count" class="mt-4 mb-0">Mostrando 10 resultados</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
                <nav class="mt-4">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link disabled" href="#">
                                <span class="start" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link disabled" href="#" aria-label="Previous">
                                <span class="previous" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span class="next" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <span class="end" aria-hidden="true"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection