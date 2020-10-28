@extends('layouts.tabla')

@section('ttitle')
Autoevaluación por depósito {{$asignacion->mes .' de '.$asignacion->anio}}

@endsection

@section('buttons')
<br>
<nav style="background: white;" class="nav nav-pills nav-justified">
    <a class="nav-link active" href="#">Autoevaluaciones</a>
    <a class="nav-link" href="#">Resultados por depot</a>
    <a class="nav-link" href="#">Resultados por mes</a>
    <a class="nav-link" href="#">Resultados gráficos</a>
    <a class="nav-link" href="#">Riesgos gráficos</a>

</nav>
@endsection


@section('thead')
<th>Región</th>
<th>Déposito</th>
<th>Encargado</th>
<th>Fecha entrega</th>
<th>Estatus</th>
<th></th>
@endsection

@section('tfoot')
<th>Región</th>
<th>Déposito</th>
<th>Encargado</th>
<th>Fecha entrega</th>
<th>Estatus</th>
<th></th>
@endsection

@section('tbody')
@foreach ($asignacion->autoevaluaciones as $autoevaluacion)
<tr onclick="location.href='{{route('adm.autoevaluaciones.ver', $autoevaluacion->id)}}'">
    <td>{{$autoevaluacion->deposito->zona->nombre}}</td>
    <td>{{$autoevaluacion->deposito->nombre}}</td>
    <td>{{$autoevaluacion->deposito->user->name.' '.$autoevaluacion->deposito->user->apellidos}}</td>
    <td>{{$autoevaluacion->fecgaEntrega}}</td>
    <td>{{$autoevaluacion->estatus==1 ? 'Completado' : 'En edición'}}</td>
    <td></td>
</tr>
@endforeach
@endsection