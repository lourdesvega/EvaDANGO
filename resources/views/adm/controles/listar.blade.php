@extends('layouts.tabla')

@section('ttitle', 'Controles de la autoevaluación')

@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('adm.controles.crear')}}" class="btn btn-primary">Crear control</a>
    </div>
</div>
@endsection

@section('thead')
<th>Referencial</th>
<th>Riesgos de dominio</th>
<th>Riesgos clave relacionados</th>
<th>Objetivos de controles</th>
<th>Guía sobre la actividad de control para mitigar el riesgo</th>
<th>Activo</th>
<th>Área</th>
<th></th>
@endsection

@section('tfoot')
<th>Referencial</th>
<th>Riesgos de dominio</th>
<th>Riesgos clave relacionados</th>
<th>Objetivos de controles</th>
<th>Guía sobre la actividad de control para mitigar el riesgo</th>
<th>Activo</th>
<th>Área</th>
<th></th>
@endsection

@section('tbody')

@foreach ($controles as $control)
<tr>
    <td>{{$control->referencial}}</td>
    <td>{{$control->riesgosDominio}}</td>
    <td>{{$control->riesgosClave}}</td>
    <td>{{$control->objetivo}}</td>
    <td>{{$control->guia}}</td>
    <td>{{$control->activo == 1 ? 'Sí': 'No'}}</td>
    <td>{{$control->area->nombre}}</td>
    <td style="width: 15%">
        <form method="POST" action="{{route('adm.controles.eliminar', $control->id)}}">
            @method('DELETE')
            @csrf
            <a href="{{route('adm.controles.ver', $control->id)}}">
                <span style="color: yellow">
                    <i class="fas fa-eye"></i>
                </span>
            </a>
            <a href="{{route('adm.controles.editar', $control->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button class="btn btn-link" type="submit">
                <span style="color: red">
                    <i class="fas fa-trash-alt"></i>
                </span>
            </button>
        </form>
    </td>

</tr>
@endforeach

@endsection