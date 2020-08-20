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
                            <th scope="col" class="sort" data-sort="name">Macroproceso</th>
                            <th scope="col">Área</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Julio</th>
                            <th scope="col">Evidencia</th>
                        </tr>

                        </thead>
                        <tbody class="list">
                        <tr><th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">2 - Manage Sourcing</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Finanzas</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Alta y Selección de Proveedores</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">FIN_22</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">2. EXISTENCIA Y VALUACION DE ACTIVOS FIJOS</span>
                                </div>
                            </th>


                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">Riesgo Bajo</span>
                                </div>
                            </th> <th> </th></tr>
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <span class="name mb-0 text-sm">
                            2 - Manage Sourcing</span>
                </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">Finanzas</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">Matriz de autorizaciones y Cumplimiento de ODC</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">FIN_24</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">5. VERDAD Y EQUIDAD DE P&L</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">Riesgo Bajo con Observacion</span>
                    </div>
                </th> <th> </th></tr>
                <tr><th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">2 - Manage Sourcing</span>
                        </div>
                    </th>


                    <th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">Finanzas</span>
                        </div>
                    </th>


                    <th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">Flujo de ODC </span>
                        </div>
                    </th>


                    <th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">FIN_52</span>
                        </div>
                    </th>


                    <th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">6. PROTECCIÓN DE EFECTIVO Y PAGOS</span>
                        </div>
                    </th>


                    <th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">Riesgo Bajo</span>
                        </div>
                    </th> <th> </th></tr>
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
            </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">Supply Chain</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">Control de Recepcion de Embarques (Stock)</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">FIN_64</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">1. CONTRATACIÓN</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">Riesgo Bajo</span>
                </div>
            </th> <th> </th></tr>
            <tr><th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">Supply Chain</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">Control de PPED´s</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">HR_11</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">2. NÓMINAS Y COMPENSACIONES & BENEFICIOS</span>
                    </div>
                </th>


                <th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">Riesgo Bajo</span>
                    </div>
                </th> <th> </th></tr>
            <tr><th scope="row">
                    <div class="media align-items-center">
                        <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
        </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Control de Inventarios en Consignacion</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">HR_21</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">2. NÓMINAS Y COMPENSACIONES & BENEFICIOS</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
        <tr><th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">Supply Chain</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">Inventario Ciclico y Anual</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">HR_23</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">4. SALIDA DE EMPLEADOS</span>
                </div>
            </th>


            <th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">Riesgo Bajo</span>
                </div>
            </th> <th> </th></tr>
        <tr><th scope="row">
                <div class="media align-items-center">
                    <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
    </div>
    </th>


    <th scope="row">
        <div class="media align-items-center">
            <span class="name mb-0 text-sm">Supply Chain</span>
        </div>
    </th>


    <th scope="row">
        <div class="media align-items-center">
            <span class="name mb-0 text-sm">Reglas de Seguridad de Sitio</span>
        </div>
    </th>


    <th scope="row">
        <div class="media align-items-center">
            <span class="name mb-0 text-sm">HR_41</span>
        </div>
    </th>


    <th scope="row">
        <div class="media align-items-center">
            <span class="name mb-0 text-sm">4. SALIDA DE EMPLEADOS</span>
        </div>
    </th>


    <th scope="row">
        <div class="media align-items-center">
            <span class="name mb-0 text-sm">Riesgo Bajo</span>
        </div>
    </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Politica de Devolución</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">HR_51</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">1. ADMINISTRACIÓN DEL INVENTARIO</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
        </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Contrato y KPI´S Proveedor Logistico </span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">OPE_11</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">1. ADMINISTRACIÓN DEL INVENTARIO</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Seguimiento Fill Rate</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">OPE_12</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">2. PRODUCTOS Y PÉRDIDAS DE MATERIAL</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
        </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm"> Transitos Pendientes y Seguimiento a Diferencias</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">OPE_13</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">2. PRODUCTOS Y PÉRDIDAS DE MATERIAL</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo con Observacion</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Monitoreo de Movimientos Sensibles</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">OPE_14</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">2. CONDICIONES DE PRECIO, FACTURACIÓN & NOTAS DE CRÉDITO</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo con Observacion</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
        </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Conciliacion de Carga VS HH</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">OPE_22</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">2. CONDICIONES DE PRECIO, FACTURACIÓN & NOTAS DE CRÉDITO</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Control de Inventarios Proveedor Logistico </span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">OPE_31</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4. GESTIÓN DE ACUERDOS COMERCIALES FUERA DE FACTURA & NEGOCIACIONES</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">3 - Forecast to Stock</span>
        </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Control de Inventarios de Refacciones (Llantas y Rines)</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">SAL_22</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4. ORDEN DE COMPRA Y  RECEPCIÓN DE MERCANCIAS</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4 - Manage Sales</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Facturacion (Delivery)</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">SAL_23</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4. ORDEN DE COMPRA Y  RECEPCIÓN DE MERCANCIAS</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4 - Manage Sales</span>
        </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Salidas de Inventario Vs Liquidacion</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">SAL_42</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">2. EXISTENCIA Y VALUACION DE ACTIVOS FIJOS</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4 - Manage Sales</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Supply Chain</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Liquidaciones de Ruta (Saldos ASS y Proxy)</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">SOU_41</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">5. VERDAD Y EQUIDAD DE P&L</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>
    <tr><th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">4 - Manage Sales</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Finanzas</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Limites de Credito Clientes</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">SOU_44</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">6. PROTECCIÓN DE EFECTIVO Y PAGOS</span>
            </div>
        </th>


        <th scope="row">
            <div class="media align-items-center">
                <span class="name mb-0 text-sm">Riesgo Bajo</span>
            </div>
        </th> <th> </th></tr>

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
