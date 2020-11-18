@extends('layouts.tabla')

@section('ttitle')
{{'Autoevaluación de ' .$autoevaluacion->deposito->nombre.' de ' .$autoevaluacion->asignacion->mes .' de '.$autoevaluacion->asignacion->anio  }}
@endsection

@section('buttons')
<br>
<nav style="background: white;" class="nav nav-pills nav-justified">
    <a class="nav-link active" href="#">Autoevaluaciones</a>
    <a class="nav-link" href="#">Resultados por depot</a>
    <a class="nav-link" href="#">Resultados por mes</a>
    <a class="nav-link" href="{{route('adm.datos.resultados', $autoevalucion->id)}}">Resultados gráficos mes</a>
    <a class="nav-link" href="#">Riesgos gráficos</a>
</nav>
@endsection

@section('thead')
<th>Control</th>
<th>Descripción</th>
<th>Calificación</th>
<th>Hallazgos</th>
<th>Plan de acción</th>
<th>Fecha compromiso</th>
<th>Responsable</th>
<th>Evidencia</th>

@endsection

@section('tfoot')
<th>Control</th>
<th>Descripción</th>
<th>Calificación</th>
<th>Hallazgos</th>
<th>Plan de acción</th>
<th>Fecha compromiso</th>
<th>Responsable</th>
<th>Evidencia</th>
@endsection

@section('tbody')
@foreach ($autoevaluacion->detalleAutoevaluaciones as $detalle)
<tr>
    <td>{{$detalle->control->referencial}}</td>
    <td>{{$detalle->control->descripcion}}</td>
    <td>{{$detalle->calificacion == null ? '':$detalle->calificacion}}</td>
    <td>{{$detalle->hallazgo == null ? '' : $detalle->hallazgo}}</td>
    <td>{{$detalle->plan ==  null ? '': $detalle->plan}}</td>
    <td>{{ $detalle->fechaCompromiso == null ? '' : $detalle->fechaCompromiso->isoFormat('DD [de] MMMM [de] Y')}}</td>
    <td>{{$detalle->responsable == null ? '': $detalle->responsable->nombre . ' ' . $detalle->responsable->apellidos}}
    </td>
    <td>
        @forelse ($detalle->evidencias as $evidencia)
        <div class="truncate-text-table">
            <span style="color: blue">
                <i title="{{$evidencia->nomOriginal}}" class="far fa-file-alt"></i>
            </span>
            {{$evidencia->nomOriginal}}
        </div>
        @empty
        Sin evidencias
        @endforelse

    </td>
</tr>
@endforeach
@endsection