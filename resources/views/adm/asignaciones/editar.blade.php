@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-10 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Asignación para autoevaluación DANGO</h1>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('adm.asignaciones.actualizar', $asignacion->id)}}">
                    @method('PUT')
                    @csrf
                    <h6 class="heading-small text-muted mb-6">Datos del periodo de autoevaluación</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class=" col">
                                <div class="form-group row ">
                                    <label class="col-sm-4 col-form-label">Mes</label>
                                    <div class="col-sm-8">
                                        <select name="mes" class="form-control">
                                            <option {{$asignacion-> mes== 'Enero' ? 'selected = "selected"' : ''}}
                                                >Enero</option>
                                            <option {{$asignacion-> mes== 'Febrero' ? 'selected = "selected"' : ''}}
                                                >Febrero</option>
                                            <option {{$asignacion-> mes== 'Marzo' ? 'selected = "selected"' : ''}}
                                                >Marzo</option>
                                            <option {{$asignacion-> mes== 'Abril' ? 'selected = "selected"' : ''}}
                                                >Abril</option>
                                            <option {{$asignacion-> mes== 'Mayo' ? 'selected = "selected"' : ''}}
                                                >Mayo</option>
                                            <option {{$asignacion-> mes== 'Junio' ? 'selected = "selected"' : ''}}
                                                >Junio</option>
                                            <option {{$asignacion-> mes== 'Julio' ? 'selected = "selected"' : ''}}
                                                >Julio</option>
                                            <option {{$asignacion-> mes== 'Agosto' ? 'selected = "selected"' : ''}}
                                                >Agosto</option>
                                            <option {{$asignacion-> mes== 'Septiembre' ? 'selected = "selected"' : ''}}
                                                >Septiembre</option>
                                            <option {{$asignacion-> mes== 'Octubre' ? 'selected = "selected"' : ''}}
                                                >Octubre</option>
                                            <option {{$asignacion-> mes== 'Noviembre' ? 'selected = "selected"' : ''}}
                                                >Noviembre</option>
                                            <option {{$asignacion-> mes== 'Diciembre' ? 'selected = "selected"' : ''}}
                                               >Diciembre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Año</label>
                                    <div class="col-sm-8">
                                        <input value="{{$asignacion->anio}}" type="number" name="anio"
                                            class="form-control @error('anio') is-invalid @enderror" required
                                            autocomplete="anio" autofocus>
                                        @error('anio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted mb-4">Datos de asignación</h6>
                    <div class="pl-lg-4">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Fecha de entrega</label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$asignacion->fechaEntrega->toDateString()}}" name="fechaEntrega"
                                    class="form-control @error('fechaEntrega') is-invalid @enderror" required
                                    autocomplete="fechaEntrega" autofocus>
                                @error('fechaEntrega')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nota</label>
                            <div class="col-sm-6">
                                <textarea name="nota" class="form-control @error('nota') is-invalid @enderror" required
                                    autocomplete="nota" autofocus> {{$asignacion->nota}}</textarea>
                                @error('nota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label class="col-sm-2 col-form-label">Activo</label>
                            <div class="col-sm-4">
                                <select name="activo" class="form-control">
                                    <option {{ $asignacion-> activo==1? 'selected="selected"' : '' }} value="1">Sí
                                    </option>
                                    <option {{ $asignacion-> activo==0? 'selected="selected"' : '' }} value="0">No
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-4">
                            <a href="{{route('adm.asignaciones.listar')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection