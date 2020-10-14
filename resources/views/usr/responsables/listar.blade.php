@extends('layouts.tabla')
@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('usr.responsables.crear')}}" class="btn btn-primary">Crear responsable</a>
    </div>
</div>
@endsection

@section('ttitle', 'Responsables')


@section('thead')
<th>Nombre</th>
<th>Apellidos</th>
<th>Activo</th>
<th></th>

@endsection

@section('tfoot')
<th>Nombre</th>
<th>Apellidos</th>
<th>Activo</th>
<th></th>
@endsection

@section('tbody')
@foreach ($responsables as $responsable)
<tr>
    <td>{{$responsable->nombre}}</td>
    <td>{{$responsable->apellidos}}</td>
    <td>{{$responsable->activo == 1 ? 'Sí' : 'No'}}</td>
    <td style="width: 9%">
        <form method="POST" action="{{route('usr.responsables.eliminar', $responsable->id)}}">
            @method('DELETE')
            @csrf
            <a href="{{route('usr.responsables.editar', $responsable->id)}}">
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