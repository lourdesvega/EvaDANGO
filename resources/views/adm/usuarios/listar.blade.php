@extends('layouts.tabla')

@section('ttitle', 'Encargados')

@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('adm.usuarios.crear')}}" class="btn btn-primary">Crear encargado</a>
    </div>
</div>
@endsection

@section('thead')
<th>Encargado</th>
<th>Correo</th>
<th>Depósito</th>
<th>Región</th>
<th>Estado</th>
<th>Municipio</th>
<th>Activo</th>
<th></th>

@endsection

@section('tfoot')
<th>Encargado</th>
<th>Correo</th>
<th>Depósito</th>
<th>Región</th>
<th>Estado</th>
<th>Municipio</th>
<th>Activo</th>
<th></th>

@endsection

@section('tbody')
@foreach ($usuarios as $usuario)
<tr>

    <td>{{$usuario->name}} {{$usuario->apellidos}}</td>
    <td>{{$usuario->email}}</td>
    <td>{{$usuario->deposito ==  null ? '' : $usuario->deposito->nombre }}</td>
    <td>{{$usuario->deposito ==  null ? '' : $usuario->deposito->zona->nombre }}</td>
    <td>{{$usuario->deposito ==  null ? '' : $usuario->deposito->estado }}</td>
    <td>{{$usuario->deposito ==  null ? '' : $usuario->deposito->municipio}}</td>
    <td>{{$usuario->activo== 1 ? 'Sí' :'No' }} </td>
    <form id="form{{$deposito->id}}" action="{{route('adm.usuarios.eliminar', $usuario->id)}}" method="POST">
        @csrf
        @method('DELETE')

        <td style="width: 9%">
            <a href="{{route('adm.usuarios.editar', $usuario->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
        <button id="{{$usuario->id}}" class="btn btn-link" type="submit">
                <span style="color: red">
                    <i class="fas fa-trash-alt"></i>
                </span>
            </button>
        </td>

    </form>
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
                title: 'Encargado',
                text: "¿Desea eliminar al encargado?",
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