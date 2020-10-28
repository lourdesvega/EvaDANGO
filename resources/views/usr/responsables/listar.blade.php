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
        <form id="form{{$responsable->id}}" method="POST"
            action="{{route('usr.responsables.eliminar', $responsable->id)}}">
            @method('DELETE')
            @csrf
            <a href="{{route('usr.responsables.editar', $responsable->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button type="submit" id="{{$responsable->id}}" class=" btn btn-link delete-confirm">
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
                title: 'Responsable',
                text: "¿Desea eliminar al responsable?",
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