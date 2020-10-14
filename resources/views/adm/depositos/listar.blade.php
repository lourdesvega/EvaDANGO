@extends('layouts.tabla')

@section('ttitle', 'Depósitos')

@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('adm.depositos.crear')}}" class="btn btn-primary">Crear depósito</a>
    </div>
</div>
@endsection

@section('thead')
<th>Nombre</th>
<th>Región</th>
<th>Estado</th>
<th>Municipio</th>
<th>Encargado</th>
<th>Activo</th>
<th></th>

@endsection

@section('tfoot')
<th>Nombre</th>
<th>Región</th>
<th>Estado</th>
<th>Municipio</th>
<th>Encargado</th>
<th>Activo</th>
<th></th>

@endsection

@section('tbody')
@foreach ($depositos as $deposito)
<tr>
    <td>{{$deposito->nombre}}</td>
    <td>{{$deposito->zona->nombre}}</td>
    <td>{{$deposito->estado}}</td>
    <td>{{$deposito->municipio}}</td>
    <td>{{$deposito->user == null ?  'No asignado' : $deposito->user->name .' '. $deposito->user->apellidos }}</td>
    <td>{{$deposito->activo == 1 ? 'Sí' : 'No'}}</td>
    <td style="width: 9%">
        <form method="POST" action="{{route('adm.depositos.eliminar', $deposito->id)}}">
            @method('DELETE')
            @csrf
            <a href="{{route('adm.depositos.editar', $deposito->id)}}">
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