@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800 text-center">Consultar resultados por año</h1>
<br>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Año</label>
    <div class="col-sm-4">
        <input class="form-control" type="text" id="busqueda" placeholder="Buscar...">
    </div>
</div>

<div id="data" class="row">
    <!-- Border Left Utilities -->
    <div class="col-lg-8">

        @foreach ($anios as $anio)
        <div data-custom-type="{{$anio->anio}}" class="filtro card mb-4 py-3 border-left-primary">
            <div class="card-body">
                <div class="row">
                    <div class="col">Año: {{$anio->anio}}</div>
                    <div class="col"><a>Riesgo alto: <span style="color: red"> <i class="fas fa-chart-line"></i></span></a>
                    </div>
                    <div class="col">Resultados por mes: <span style="color: blue"> <i class="fas fa-table"></i></span>
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