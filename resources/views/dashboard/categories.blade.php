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
            <div class="col-lg-10">
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label for="categories" class="form-label">Acción por lotes</label>
                        <select class="form-select" name="categories" aria-label="Default select example">
                            <option selected disabled>Seleccione</option>
                            <option value="2">Borrar</option>
                        </select>
                    </div>
                    <div class="col-lg-2 mb-3">
                        <button type="submit" class="btn btn-outline-primary px-5 w-100">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="#" method="GET">
        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="selectAll">
                            </div>
                        </th>
                        <th scope="col">Nombre</th>
                        <th scope="col">ID</th>
                        <th scope="col">Inventario</th>
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
                        <td>Rines</td>
                        <td>9857</td>
                        <td>Hay existencias</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td>Llantas</td>
                        <td>9585</td>
                        <td>Un elemento restante</td>
                        <td>11/08/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td>Marcos</td>
                        <td>9255</td>
                        <td>Hay exixtencias</td>
                        <td>11/06/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td>Accesorios</td>
                        <td>9825</td>
                        <td>Hay exixtencias</td>
                        <td>10/07/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td>Transmisiones</td>
                        <td>8535</td>
                        <td>Hay exixtencias</td>
                        <td>10/06/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td>Ropa</td>
                        <td>9258</td>
                        <td>Un elemento restante</td>
                        <td>12/08/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
                            <button type="button" class="btn btn-outline-danger">Eliminar</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="form-check">
                                <input class="form-check-input row-checkbox" type="checkbox" value="" id="flexCheckIndeterminate">
                            </div>
                        </th>
                        <td>Armadas</td>
                        <td>8535</td>
                        <td>Hay exixtencias</td>
                        <td>10/06/2024</td>
                        <td>
                            <button type="submit" class="btn btn-primary me-2">Editar</button>
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