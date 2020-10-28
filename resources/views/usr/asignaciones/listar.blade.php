@extends('layouts.tabla')
@section('ttitle', 'Historial de autoevaluaciones')
@section('buttons')
@isset($asignacion)
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Autoevaluación por completar</h5>
        <p class="card-text">Periodo de la autoevaluación: {{$asignacion->mes .' de '.$asignacion->anio}}</p>
        <p class="card-text">Fecha de entrega: {{$asignacion->fechaEntrega->isoFormat('DD [de] MMMM [de] Y')}}</p>
        <p class="card-text">Nota: {{$asignacion->nota}}</p>
        @php
        $autoev= $asignacion->autoevaluaciones->where('deposito_id', auth()->user()->deposito->id)->first();
        @endphp
        <p class="card-text">Estatus:
            @isset($autoev)
            @switch($autoev->estatus)
            @case(0)
            En edición
        </p>
        <a href="{{route('usr.autoevaluaciones.listar', $autoev->id)}}" class="btn btn-primary">Editar</a>

        @break
        @case(1)
        Finalizada
        </p>
        @break
        @endswitch
        @endisset

    </div>
</div>
@endisset
@endsection
@section('thead')

<th>Periodo</th>
<th>Fecha entrega</th>
<th>Estatus</th>
@endsection

@section('tfood')
<th>Periodo</th>
<th>Fecha entrega</th>
<th>Estatus</th>

@endsection

@section('tbody')
@foreach ($asignaciones as $asignacion)
<tr>
    <td>khfdkh </td>

    <td>01-Agosto-2020</td>
    <td>Pendiente</td>
</tr>
@endforeach


@endsection