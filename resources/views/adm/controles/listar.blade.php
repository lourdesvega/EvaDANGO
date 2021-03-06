@extends('layouts.tabla')

@section('ttitle', 'Controles de la autoevaluación')

@section('buttons')
@include('adm.controles.ver')
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
<th>Guía sobre la actividad...</th>
<th>Activo</th>
<th>Área</th>
<th></th>
@endsection

@section('tfoot')
<th>Referencial</th>
<th>Riesgos de dominio</th>
<th>Riesgos clave relacionados</th>
<th>Objetivos de controles</th>
<th>Guía sobre la actividad...</th>
<th>Activo</th>
<th>Área</th>
<th></th>
@endsection

@section('tbody')

@foreach ($controles as $control)
<tr>
    <td>{{$control->referencial}}</td>
    <td>
        {{$control->riesgosDominio}}
    </td>
    <td>
        {{$control->riesgosClave}}
    </td>
    <td>
        <div class="truncate-text-control">{{$control->objetivo}}</div>
    </td>
    <td>
        <div class="truncate-text-control">{{$control->guia}}</div>
    </td>
    <td>{{$control->activo == 1 ? 'Sí': 'No'}}</td>
    <td>{{$control->area->nombre}}</td>
    <td style="width: 15%">
        <form method="POST" id="form{{$control->id}}" action="{{route('adm.controles.eliminar', $control->id)}}">
            @method('DELETE')
            @csrf
            <a class="ver" data-id="{{$control->id}}">
                <span style="color: yellow">
                    <i class="fas fa-eye"></i>
                </span>
            </a>


            <a href="{{route('adm.controles.editar', $control->id)}}">
                <span style="color: blue">
                    <i class="fas fa-pen"></i>
                </span>
            </a>
            <button id="{{$control->id}}" class="btn btn-link delete-confirm" type="submit">
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
                title: 'Control',
                text: "¿Desea eliminar el control?",
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

 $('.ver').click(function() {
    $('#modalControl').modal('show');
    var id = $(this).data('id');
            $.ajax({
            type: "GET",
            url: "/adm/controles/"+id,
            success: function (control) {
                $("#referencial").val(control.referencial);
                $("#riesgosDominio").val(control.riesgosDominio);
                $("#riesgosClave").val(control.riesgosClave);
                $("#objetivo").val(control.objetivo);
                $("#guia").val(control.guia);
                $("#area_id").val(control.area_id);
                $("#activo").val(control.activo);
            },      
        });
        
 });
</script>

@endsection