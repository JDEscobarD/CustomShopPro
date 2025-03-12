@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="header-body-content pb-3 mb-4">
        <div class="row align-item-center">
            <div class="col-lg-6 mb-3">
                <h1 class="text-left fw-bold">Categorías</h1>
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
                <label for="categories" class="form-label">Filtrar</label>
                <select class="form-select" name="categories" aria-label="Default select example">
                    <option selected disabled>Categoria</option>
                    @foreach ($listCategories as $category )
                        <option value="{{$category->id}}">{{$category->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected disabled>Estado</option>
                    <option value="1">Procesando</option>
                    <option value="2">Cancelado</option>
                    <option value="3">Completado</option>
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
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row"><strong>9857</strong></th>
                        <td class="name-item">Velocity Edge - Scott</td>
                        <td>11/08/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option selected value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 3.774.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>9854</strong></th>
                        <td class="name-item">Adventure Pro - Kona</td>
                        <td>10/08/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option selected value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 1.474.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>8757</strong></th>
                        <td class="name-item">Peak Striker - Santa Cruz</td>
                        <td>14/08/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option value="1">Procesando</option>
                                <option selected value="2">Cancelado</option>
                                <option value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 6.321.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>8952</strong></th>
                        <td class="name-item">Road Warrior - Orbea</td>
                        <td>12/06/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option selected value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 6.494.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>8597</strong></th>
                        <td class="name-item">All-Terrain Beast - Merida</td>
                        <td>31/04/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option selected value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 9.474.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>4781</strong></th>
                        <td class="name-item">Summit Racer - Canyon</td>
                        <td>10/11/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option selected value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 7.874.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>8552</strong></th>
                        <td class="name-item">Urban Sprint - Polygon</td>
                        <td>01/04/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option value="1">Procesando</option>
                                <option selected value="2">Cancelado</option>
                                <option value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 3.374.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>8952</strong></th>
                        <td class="name-item">Speedster Cycle - Trek</td>
                        <td>12/06/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option selected value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 3.474.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>8597</strong></th>
                        <td class="name-item">Trail Master - Cannondale</td>
                        <td>31/04/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option selected value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 6.574.544</td>
                    </tr>
                    <tr>
                        <th scope="row"><strong>4781</strong></th>
                        <td class="name-item">Endurance Rider - Specialized</td>
                        <td>10/11/2024</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>Estado</option>
                                <option selected value="1">Procesando</option>
                                <option value="2">Cancelado</option>
                                <option value="3">Completado</option>
                            </select>
                        </td>
                        <td>Natalia Rincón, Calle 66 sur # 44 a 05 ciudad Bogotá...</td>
                        <td class="price-item">$ 4.474.544</td>
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