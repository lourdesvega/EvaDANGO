@extends('layouts.tabla')
@section('ttitle','Autoevaluación por depósito Julio de 2020')

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
<th>Déposito</th>
<th>Región</th>
<th>Encargado</th>
<th>Fecha entrega</th>
<th>Estatus</th>
<th></th>
@endsection

@section('tfoot')
<th>Déposito</th>
<th>Región</th>
<th>Encargado</th>
<th>Fecha entrega</th>
<th>Estatus</th>
<th></th>
@endsection

@section('tbody')
<tr onclick="location.href='{{route('adm.autoevaluaciones.ver')}}'">
    <td>Culiacán</td>
    <td>Region I</td>
    <td>---</td>
    <td>1-Agosto-2020</td>
    <td>Entregado</td>
    <td></td>
</tr>
<tr onclick="location.href='{{route('adm.autoevaluaciones.ver')}}'">
    <td>Oregon</td>
    <td>Region I</td>
    <td>---</td>
    <td>1-Agosto-2020</td>
    <td>Entregado</td>
    <td></td>
</tr>

@endsection