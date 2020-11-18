@extends('layouts.tabla')
@section('ttitle', 'Historial de autoevaluaciones')
@section('buttons')
@foreach ($autoevaluaciones as $autoevaluacion)
@if ($autoevaluacion->asignacion->estatus==0 || $autoevaluacion->estatus==0)
<div class="card">
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
            @else
            Finalizada
            @endif
        </p>
    </div>
</div>
@endif

@endforeach

@endsection
@section('thead')

<th>Periodo</th>
<th>Fecha entrega</th>
@endsection

@section('tfood')
<th>Periodo</th>
<th>Fecha entrega</th>

@endsection

@section('tbody')
@foreach ($autoevaluaciones as $autoevaluacion)
@if ($autoevaluacion->estatus == 1 && $autoevaluacion->asignacion->estatus==1)
<tr>
    <td>{{$autoevaluacion->asignacion->mes.' de '. $autoevaluacion->asignacion->anio}}</td>
    <td>{{$autoevaluacion->asignacion->fechaEntrega}}</td>
</tr>
@endif
@endforeach


@endsection