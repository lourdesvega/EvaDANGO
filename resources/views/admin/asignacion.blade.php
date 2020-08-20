@extends('layout.admin')

@section('content')
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Asignación para autoevaluación DANGO</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Datos del periodo de autoevaluación</h6>
                            <div class="pl-lg-4">



                                <div class="row">
                                    <div class=" col">
                                        <div class="form-group row ">
                                            <label  class="col-sm-4 col-form-label">Mes</label>
                                                <div class="col-sm-8">
                                                    <select name="mes" class="form-control">
                                                        <option value="Enero">Enero</option>
                                                        <option value="Febrero">Febrero</option>
                                                        <option value="Marzo">Marzo</option>
                                                        <option value="Abril">Abril</option>
                                                        <option value="Mayo">Mayo</option>
                                                        <option value="Junio">Junio</option>
                                                        <option value="Julio">Julio</option>
                                                        <option value="Agosto">Agosto</option>
                                                        <option value="Septiembre">Septiembre</option>
                                                        <option value="Octubre">Octubre</option>
                                                        <option value="Noviembre">Noviembre</option>
                                                        <option value="Diciembre">Diciembre</option>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>


                                    <div class="col">
                                        <div class="form-group row">
                                            <label  class="col-sm-4 col-form-label">Año</label>
                                            <div class="col-sm-8">
                                                <input type="number"  class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <h6 class="heading-small text-muted mb-4">Datos de asignación</h6>
                                <div class="pl-lg-4">

                                <div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Fecha de inicio</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="fechaInicio" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Fecha fin</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="fechaFin" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Fecha máxima de entrega</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="fechaMax" class="form-control">
                                    </div>
                                </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-4 col-form-label">Nota</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>


                                <div class="row justify-content-end">
                                    <div class="col-4">
                                        <button type="button" class="btn btn-primary">Aceptar</button>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



@endsection
