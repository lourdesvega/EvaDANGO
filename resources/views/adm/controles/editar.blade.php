@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-10 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Controles de la autoevaluación</h1>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Crear</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('adm.controles.actualizar', $control->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Nuevo referencial</label>
                        <div class="col-sm-4">
                            <input type="text" name="referencial"
                                class="form-control @error('referencial') is-invalid @enderror" required
                                autocomplete="referencial" value="{{$control->referencial}}" autofocus>
                            @error('referencial')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Riesgos de dominio</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$control->riesgosDominio}}" name="riesgosDominio"
                                class="form-control @error('riesgosDominio') is-invalid @enderror" required
                                autocomplete="riesgosDominio" autofocus>
                            @error('riesgosDominio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Riesgos clave relacionados</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$control->riesgosClave}}" name="riesgosClave"
                                class="form-control @error('riesgosClave') is-invalid @enderror" required
                                autocomplete="riesgosClave" autofocus>
                            @error('riesgosClave')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Objetivos de controles</label>
                        <div class="col-sm-8">
                            <textarea name="objetivo" class="form-control @error('objetivo') is-invalid @enderror"
                                required autocomplete="objetivo" autofocus>{{$control->objetivo}}</textarea>
                            @error('objetivo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Guía sobre la actividad de control para mitigar el
                            riesgo</label>
                        <div class="col-sm-8">
                            <textarea name="guia" class="form-control @error('guia') is-invalid @enderror" required
                                autocomplete="guia" autofocus>{{$control->guia}}</textarea>
                            @error('guia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Área</label>
                        <div class="col-sm-5">
                            <select name="area_id" class="form-control">
                                @foreach ($areas as $area)
                                <option {{$area->id == $control->area_id ? 'selected=="selected"' : ''}}
                                    value="{{$area->id}}">{{$area->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <label class="col-sm-4 col-form-label">Estatus</label>
                        <div class="col-sm-3">
                            <select name="activo" class="form-control">
                                <option {{$control->activo == 1 ? 'selected=="selected"' : ''}} value="1">Sí</option>
                                <option {{$control->activo == 0 ? 'selected=="selected"' : ''}} value="0">No</option>
                            </select>
                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="col-4">
                            <a href="{{route('adm.controles.listar')}}" class="btn btn-danger">Cancelar</a>
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