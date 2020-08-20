@extends('layout.admin')
@section('content')
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0 text-center">Historial de autoevaluaciones</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Periodo</th>
                                <th scope="col">Fecha entrega</th>
                                <th scope="col">Fecha máx. entrega</th>
                                <th scope="col" class="sort" data-sort="completion">% completado</th>
                                <th scope="col">Estatus</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <tr>

                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">Julio de 2020</span>
                                        </div>
                                    </div>
                                </th>

                                <th scope="row">
                                    <div class="media align-items-center">

                                            <span class="name mb-0 text-sm">01-Agosto-2020 a 05-Agosto-2020</span>

                                    </div>
                                </th>

                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">06-Agosto-2020</span>
                                        </div>
                                    </div>
                                </th>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="completion mr-2">60%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i>
                                    <span class="status">Pendiente</span>
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
                                            <span class="name mb-0 text-sm">Junio de 2020</span>
                                        </div>
                                    </div>
                                </th>

                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">01-Julio-2020 a 05-Julio-2020</span>
                                        </div>
                                    </div>
                                </th>

                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">06-Julio-2020</span>
                                        </div>
                                    </div>
                                </th>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="completion mr-2">100%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-green" role="progressbar"
                                                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">Completado</span>
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
