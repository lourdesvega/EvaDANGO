@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0 text-center">Autoevaluación Julio de 2020</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Déposito</th>
                            <th scope="col">Región</th>
                            <th scope="col">Encargado</th>
                            <th scope="col">Fecha de entrega</th>
                            <th scope="col">Estatus</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        <tr>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">Culiacan</span>
                                    </div>
                                </div>
                            </th>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Region I</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">-----</span>
                                </div>
                            </th>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">01-Agosto-2020</span>
                                </div>
                            </th>

                            <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">Entregado</span>
                                  </span>
                            </td>


                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Ver</a>
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">Oregon</span>
                                    </div>
                                </div>
                            </th>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Region I</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">-----</span>
                                </div>
                            </th>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">01-Agosto-2020</span>
                                </div>
                            </th>

                            <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">Entregado</span>
                                  </span>
                            </td>


                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Ver</a>
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">Mexicali</span>
                                    </div>
                                </div>
                            </th>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Region I</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">-----</span>
                                </div>
                            </th>

                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">01-Agosto-2020</span>
                                </div>
                            </th>

                            <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">Entregado</span>
                                  </span>
                            </td>


                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Ver</a>
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                        <br>
                        <br>

                    </table>
                </div>

                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection
