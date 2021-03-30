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
        <form id="form{{$deposito->id}}" method="POST" action="{{route('adm.depositos.eliminar', $deposito->id)}}">
            @method('DELETE')
            @csrf
            <a href="{{route('adm.depositos.editar', $deposito->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button id="{{$deposito->id}}" type="submit" class="btn btn-link delete-confirm">
                <span style="color: red">
                    <i class="fas fa-trash-alt"></i>
                </span>
            </button>
        </form>
    </td>
</tr>
@endforeach
@endsection


@section('script')
<script>
    $(function () {
        $('body').on('click', '.delete-confirm', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');

            var id = this.id;
                Swal.fire({
                title: 'Depósito',
                text: "¿Desea eliminar el depósito?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
                }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form"+id).submit();
            } 
                
         })
        });
 });

</script>

@endsection