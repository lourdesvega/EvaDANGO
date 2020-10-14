@extends('layouts.tabla')
@section('ttabla', 'Historial de autoevaluaciones')

@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('adm.asignaciones.crear')}}" class="btn btn-primary">Crear asignacion</a>
    </div>
</div>
@endsection

@section('thead')

<th>Periodo</th>
<th>Fecha entrega</th>
<th>Nota</th>
<th>% Completado</th>
<th>Estatus</th>
<th>Activo</th>

<th></th>
@endsection

@section('tfood')

<th>Periodo</th>
<th>Fecha entrega</th>
<th>Nota</th>
<th>% Completado</th>
<th>Estatus</th>
<th>Activo</th>
<th></th>
@endsection

@section('tbody')
@foreach ($asignaciones as $asignacion)

<tr onclick="location.href='{{route('adm.autoevaluaciones.listar')}}'">
    <td>{{$asignacion->mes}} {{$asignacion->anio}}</td>
    <td>{{$asignacion->fechaEntrega->isoFormat('d [de] MMMM [de] Y')}}</td>
    <td>{{$asignacion->nota}}</td>
    <td><progress value="{{$asignacion->completado}}" max="{{$asignacion->total}}"></progress></td>
    @switch($asignacion->estatus)
    @case(0)
    <td>Creado</td>
    @break
    @case(1)
    <td>En edición</td>
    @break
    @case(2)
    <td>Completado</td>
    @break
    @endswitch

    <td>{{$asignacion->activo == 1 ? 'Sí': 'No'}}</td>
    <td style="width: 9%">
        <form method="post" action="{{route('adm.asignaciones.eliminar', $asignacion->id)}}">
            @csrf
            @method('DELETE')

            <a href="{{route('adm.asignaciones.editar', $asignacion->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button type="submit" class="btn btn-link">
                <span style="color: red">
                    <i class="fas fa-trash-alt"></i>
                </span>
            </button>
        </form>
    </td>
</tr>
@endforeach
@endsection