@extends('layout.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0 text-center">Evaluación DANgo Julio 2020</h3>
                </div>

                <div class="row justify-content-md-center">
                    <label  class="col-3 col-form-label">Región</label>
                    <div class="col-sm-2">
                        <select name="mes" class="form-control">
                            <option value="">Región I</option>
                            <option value="">Región II</option>
                            <option value="">Región III</option>
                            <option value="">Región IV</option>
                            <option value="">Región V</option>
                            <option value="">Región VI</option>
                        </select>
                    </div>

                    <label  class="col-3 col-form-label">Depósito</label>
                    <div class="col-sm-3">
                        <select name="mes" class="form-control">
                            <option value="">Tijuana</option>
                            <option value="">Hermosillo 1</option>
                            <option value="">Hermosillo 2</option>
                            <option value="">Culiacán</option>
                            <option value="">Obregón</option>
                            <option value="">Mexicali</option>
                        </select>
                    </div>
                </div>

                <!-- Light table -->

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="name">Control</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Evaluación</th>
                            <th scope="col">Compromiso</th>
                            <th scope="col">Responsable</th>
                        </tr>

                        </thead>
                        <tbody class="list">
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">FIN_22</span>
                                </div>
                            </th>


                            <td>

                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">EXISTENCIA Y VALUACION DE ACTIVOS FIJOS</span>
                                </div>

                            </td>


                            <td style="width: 10px; !important;">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">jhdfkjb dfhfdjbkjdf dkhlfdjhdfkj dafh dfhjgkjfdf df kjfdjhjhfdh fd kjfkjdhfkj dfkj</span>
                                </div>

                            </td>


                            <td>
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Mantener</span>
                                </div>
                            </td>


                            <td>
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">0</span>
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
