@extends('layouts.tabla')

@section('ttitle')
Autoevaluación de {{$autoevaluacion->asignacion->mes. ' de '. $autoevaluacion->asignacion->anio}}
@endsection

@section('thead')
<th>Control</th>
<th>Calificación</th>
<th>Hallazgos</th>
<th>Plan de acción</th>
<th>Fecha compromiso</th>
<th>Responsable</th>
<th>Evidencia</th>
<th></th>
@endsection


@section('tfoot')
<th>Control</th>
<th>Calificación</th>
<th>Hallazgos</th>
<th>Plan de acción</th>
<th>Fecha compromiso</th>
<th>Responsable</th>
<th>Evidencia</th>
<th></th>
@endsection

@section('tbody')
@foreach ($controles as $control)
<tr>
    <td>{{$control->referencial}}</td>
    @php
    $detalle= $autoevaluacion->detalleAutoevaluaciones->where('control_id',$control->id)->first();
    @endphp
    @isset($detalle)
    <td>{{$detalle->calificacion == null ? '':$detalle->calificacion == null }}</td>
    <td>{{$detalle->hallazgo == null ? '' : $detalle->hallazgo}}</td>
    <td>{{$detalle->plan ==  null ? '': $detalle->plan}}</td>
    <td>{{ $detalle->fechaCompromiso == null ? '' : $detalle->fechaCompromiso->isoFormat('DD [de] MMMM [de] Y')}}</td>
    <td>{{$detalle->responsable == null ? '': $detalle->responsable->nombre . ' ' . $detalle->responsable->apellidos}}
    </td>
    <td>{{'Evidencia'}}</td>
    <td>
        <a href="{{route('usr.detalle.editar', $detalle->id)}}">
            <span style="color: blue">
                <i class="fas fa-pen"></i>
            </span>
        </a>


    </td>
    @endisset

    @empty($detalle)
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
        <form method="POST" action="{{route('usr.detalle.guardar', [$autoevaluacion->id, $control->id])}}">
            @csrf
            <button type="submit" class="btn btn-link">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </button>
        </form>
    </td>
    @endempty

</tr>
@endforeach



@endsection

@section('script')
<script>

</script>
@endsection