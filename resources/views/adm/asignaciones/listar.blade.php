@extends('layouts.tabla')
@section('ttitle', 'Asignaciones')

@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
            <a href="{{route('adm.asignaciones.crear')}}" class="btn btn-primary">Crear asignacion</a>
    </div>
</div>
@endsection

@section('thead')

<th>Periodo</th>
<th>Fecha entrega</th>
<th>Nota</th>
<th>% Completado</th>
<th>Estatus</th>
<th>Activo</th>

<th></th>
@endsection

@section('tfood')

<th>Periodo</th>
<th>Fecha entrega</th>
<th>Nota</th>
<th>% Completado</th>
<th>Estatus</th>
<th>Activo</th>
<th></th>
@endsection

@section('tbody')
@foreach ($asignaciones as $asignacion)

<tr onclick="location.href='{{route('adm.autoevaluaciones.listar', $asignacion->id)}}'">
    <td>{{$asignacion->mes}} {{$asignacion->anio}}</td>
    <td>{{$asignacion->fechaEntrega->isoFormat('d [de] MMMM [de] Y')}}</td>
    <td>{{$asignacion->nota}}</td>
    <td><progress value="{{$asignacion->completado}}" max="{{$asignacion->total}}"></progress></td>
    @switch($asignacion->estatus)
    @case(0)
    <td>Sin completar</td>
    @break
    @case(1)
    <td>Concluido</td>
    @break
    @endswitch

    <td>{{$asignacion->activo == 1 ? 'Sí': 'No'}}</td>
    <td style="width: 9%">
        <form id="form{{$asignacion->id}}" method="post"
            action="{{route('adm.asignaciones.eliminar', $asignacion->id)}}">
            @csrf
            @method('DELETE')

            <a href="{{route('adm.asignaciones.editar', $asignacion->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button id="{{$asignacion->id}}" type="submit" class="btn btn-link">
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
                title: 'Asignación',
                text: "¿Desea eliminar la asignación?",
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