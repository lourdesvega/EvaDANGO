@extends('layouts.tabla')
@section('ttitle', 'Asignaciones')

@section('buttons')
<br>
@if (auth()->user()->nivel==1)
<div class="row">
    <div class="col-md-8 offset-md-10">
        <a href="{{route('adm.asignaciones.crear')}}" class="btn btn-primary">Crear asignacion</a>
    </div>
</div>
@endif

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



<tr>

    <td>{{$asignacion->mes}} {{$asignacion->anio}}</td>
    <td>{{$asignacion->fechaEntrega->isoFormat('D [de] MMMM [de] Y')}}</td>
    <td>{{$asignacion->nota}}</td>
    <td><progress value="{{$asignacion->completado}}" max="{{$asignacion->total}}"></progress></td>
    @switch($asignacion->estatus)
    @case(0)
    <td><span style="color: yellow"><i class="fas fa-exclamation-circle"></i></span>{{' '}}Sin completar</td>
    @break
    @case(1)
    <td><span style="color: green"><i class="fas fa-check-circle"></i></span>{{' '}}Concluido</td>
    @break
    @endswitch

    <td>{{$asignacion->activo == 1 ? 'Sí': 'No'}}</td>
    <td style="width: 12%">
        <form id="form{{$asignacion->id}}" method="post"
            action="{{route('adm.asignaciones.eliminar', $asignacion->id)}}">
            @csrf
            @method('DELETE')

            <a href="{{route('adm.autoevaluaciones.listar', $asignacion->id)}}">
                <span style="color: blue">
                    <i class="fas fa-chevron-circle-right"></i>
                </span>
            </a>



            @if (auth()->user()->nivel==1)


            <a href="{{route('adm.asignaciones.editar', $asignacion->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button id="{{$asignacion->id}}" type="submit" class="btn btn-link delete-confirm">
                <span style="color: red">
                    <i class="fas fa-trash-alt"></i>
                </span>
            </button>
            @endif
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



 $('#dataTable').dataTable( {
  "ordering": false
} );


</script>

@endsection