@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Autoevaluaciones</h1>
<br>

@foreach ($autoevaluaciones as $autoevaluacion)
@if ($autoevaluacion->estatus==0 || $autoevaluacion->estatus==2)
<div class="card my-4">
    <div class="card-body">
        <h5 class="card-title">Autoevaluación por completar</h5>
        <p class="card-text">Periodo de la autoevaluación:
            {{$autoevaluacion->asignacion->mes .' de '.$autoevaluacion->asignacion->anio}}</p>
        <p class="card-text">Fecha de entrega:
            {{$autoevaluacion->asignacion->fechaEntrega->isoFormat('DD [de] MMMM [de] Y')}}</p>
        <p class="card-text">Nota: {{$autoevaluacion->asignacion->nota}}</p>
        <p class="card-text">Estatus:
            @if ($autoevaluacion->estatus==0)
            En edición
            <br>
            <a href="{{route('usr.autoevaluaciones.listar', $autoevaluacion->id)}}" class="btn btn-primary">Editar</a>
            @elseif($autoevaluacion->estatus==1)
            Finalizada
            @elseif($autoevaluacion->estatus==2)
            Devuelta
            <br>
            <a href="{{route('usr.autoevaluaciones.listar', $autoevaluacion->id)}}" class="btn btn-primary">Editar</a>
            @endif
        </p>
    </div>
</div>
@endif

@endforeach

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Buscar</label>
    <div class="col-sm-4">
        <input class="form-control" type="text" id="busqueda" placeholder="Buscar...">
    </div>
</div>

<div id="data" class="row">
    <!-- Border Left Utilities -->
    <div class="col-lg-10">

        @foreach ($autoevaluaciones as $autoevaluacion)
        @if ($autoevaluacion->estatus == 1)
        <div data-custom-type="{{$autoevaluacion->id}}" class="filtro card mb-4 py-3 border-left-primary">
            <div class="card-body">
                <div class="row">

                    <div class="col">
                        <div class="row"> Periodo: </div>
                        <div class="row">{{$autoevaluacion->asignacion->mes.' de '. $autoevaluacion->asignacion->anio}}
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">Fecha de entrega:</div>
                        <div class="row">
                            {{$autoevaluacion->asignacion->fechaEntrega->isoFormat('DD [de] MMMM [de] Y')}}
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">Fecha entregado: </div>
                        <div class="row">{{$autoevaluacion->fechaConclusion == null ? '': $autoevaluacion->fechaConclusion->isoFormat('DD [de] MMMM [de] Y')}}</div>
                    </div>
                    <div class="col">
                        <a style="color: grey" href="{{route('usr.autoevaluaciones.mostrar', $autoevaluacion->id)}}">
                            <span style="color: blue">
                                <i class="fas fa-chevron-circle-right"></i>
                            </span>
                            Ver autoevaluacion
                        </a>
                    </div>
                </div>


            </div>

        </div>
        @endif
        @endforeach
    </div>

</div>



@endsection

@section('scripts')
<script>
    $("#busqueda").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#data .filtro").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>
@endsection