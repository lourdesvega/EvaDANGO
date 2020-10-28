@extends('layouts.tabla')

@section('ttitle','Áreas de la autoevaluación')

@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('adm.areas.crear')}}" class="btn btn-primary">Crear área</a>
    </div>
</div>
@endsection

@section('thead')
<th>Nombre</th>
<th>Abreviación</th>
<th>Macro</th>
<th>Descripción</th>
<th>Activo</th>
<th></th>
@endsection


@section('tfoot')
<th>Nombre</th>
<th>Abreviación</th>
<th>Macro</th>
<th>Descripción</th>
<th>Activo</th>
<th></th>
@endsection

@section('tbody')
@foreach ($areas as $area)
<tr>
    <td>{{$area->nombre}}</td>
    <td>{{$area->abreviacion}}</td>
    <td>{{$area->macro}}</td>
    <td>{{$area->descripcion}}</td>
    <td>{{$area->activo == 1 ? 'Sí': 'No'}}</td>
    <td style="width: 12%">

        <form id="form{{$area->id}}" action="{{ route('adm.areas.eliminar', $area->id)}}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{route('adm.areas.editar', $area->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button id="{{$area->id}}" type="submit" class="btn btn-link">
                <span style="color: red">
                    <i class="fas fa-trash-alt"></i>
                </span>
            </button>
        </form>
    </td>

</tr>
@endforeach

@section('script')
<script>
    $(function () {
        $('body').on('click', '.delete-confirm', function (event) {
            event.preventDefault();
        const url = $(this).attr('href');

            var id = this.id;
                Swal.fire({
                title: 'Areas',
                text: "¿Desea eliminar el área?",
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


@endsection