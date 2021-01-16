@extends('layouts.app')
@section('content')


<h1 class="h3 mb-2 text-gray-800 text-center">Consultar resultados por mes</h1>
<br>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Mes</label>
    <div class="col-sm-4">
        <input class="form-control" type="text" id="busqueda" placeholder="Buscar...">
    </div>
</div>

<div id="data" class="row">
    <!-- Border Left Utilities -->
    <div class="col-lg-8">

        @foreach ($autoevaluaciones as $autoevaluacion)
        <div data-custom-type="{{$autoevaluacion->mes}}" class="filtro card mb-4 py-3 border-left-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">Mes: {{' '.$autoevaluacion->mes}}</div>

                    <div class="col"><a style="color: grey" href="{{route('adm.datos.resultados', $autoevaluacion->id)}}">Resultados gráficos
                            <span style="color: red"> <i class="fas fa-chart-line"></i></span></a>
                    </div>

                </div>

            </div>

        </div>
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