@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-10 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Controles de la autoevaluación</h1>
        <br>
        <br>
        <div class="row">
            <div class="col-md-7 offset-md-9">
                <form action="{{route('adm.controles.eliminar',$control->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('adm.controles.editar', $control->id)}}" class="btn btn-primary">Editar</a>
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ver</h6>
            </div>
            <div class="card-body">


                <div class="form-group row ">
                    <label class="col-sm-4 col-form-label">Nuevo referencial</label>
                    <div class="col-sm-4">
                        <input type="text" name="referencial" value="{{$control->referencial}}" readonly
                            class="form-control" style="background: white">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Riesgos de dominio</label>
                    <div class="col-sm-8">
                        <input type="text" name="riesgosDominio" value="{{$control->riesgosDominio}}" readonly
                            class="form-control" style="background: white">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Riesgos clave relacionados</label>
                    <div class="col-sm-8">
                        <input type="text" value="{{$control->riesgosClave}}" name="riesgosClave" readonly
                            class="form-control" style="background: white">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Objetivos de control</label>
                    <div class="col-sm-8">
                        <textarea name="objetivo" readonly
                            class="form-control" style="background: white">{{$control->objetivo}} </textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guía sobre la actividad de control para mitigar el
                        riesgo</label>
                    <div class="col-sm-8">
                        <textarea name="guia" readonly class="form-control" style="background: white">{{$control->guia}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Area</label>
                    <div class="col-sm-5">
                        <input type="text" name="area_id" value="{{$control->area->nombre}}" readonly
                            class="form-control" style="background: white">
                    </div>
                </div>

                <div class="form-group row ">
                    <label class="col-sm-4 col-form-label">Activo</label>
                    <div class="col-sm-3">
                        <input style="background: white" readonly class="form-control" value="{{$control->activo == 1 ? 'Sí' : 'No'}}">
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection