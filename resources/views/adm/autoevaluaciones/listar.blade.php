@extends('layouts.tabla')

@section('ttitle')
Autoevaluación por depósito {{$asignacion->mes .' de '.$asignacion->anio}}

@endsection

@section('buttons')
<br>
<nav style="background: white;" class="nav nav-pills nav-justified">
    <a class="nav-link active" href="{{route('adm.autoevaluaciones.listar', $asignacion->id)}}">Autoevaluaciones</a>
    <a class="nav-link" href="{{route('adm.datos.resultados', $asignacion->id)}}">Resultados gráficos mes</a>

</nav>

<div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva notificación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="destino" class="col-form-label">Para:</label>
                        <input type="text" readonly class="form-control" style="background: white" id="destino">
                    </div>
                    <div class="form-group">
                        <label for="msj" class="col-form-label">Mensaje:</label>
                        <textarea id="msj" class="form-control @error('msj') is-invalid @enderror" required
                            autocomplete="msj" autofocus></textarea>
                        @error('msj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" onclick="notificar()">Enviar notificación</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('thead')
<th>Región</th>
<th>Déposito</th>
<th>Encargado</th>
<th>Fecha entrega</th>
<th>Estatus</th>
<th></th>
<th></th>
@endsection

@section('tfoot')
<th>Región</th>
<th>Déposito</th>
<th>Encargado</th>
<th>Fecha entrega</th>
<th>Estatus</th>
<th></th>
<th></th>
@endsection

@section('tbody')
@foreach ($asignacion->autoevaluaciones as $autoevaluacion)
<tr id="{{$autoevaluacion->id}}">
    <td>{{$autoevaluacion->deposito->zona->nombre}}</td>
    <td>{{$autoevaluacion->deposito->nombre}}</td>
    <td>{{$autoevaluacion->deposito->user->name.' '.$autoevaluacion->deposito->user->apellidos}}</td>
    <td>{{$autoevaluacion->fechaConclusion == null ? '': $autoevaluacion->fechaConclusion->isoFormat('D [de] MMMM [de] Y')}}
    </td>
    @switch($autoevaluacion->estatus)
    @case(0)
    <td id="estatus_{{$autoevaluacion->id}}"><span style="color: blue"><i class="fas fa-edit"></i></span><span
            class="txt_estatus">En edición </span></td>
    <td id="accion_{{$autoevaluacion->id}}"><a data-toggle="modal" data-target="#mensaje"
            data-whatever="{{$autoevaluacion->deposito->user->email}}" value="0" data-id="{{$autoevaluacion->id}}"
            style="color: white" class="btn btn-info btn-sm modificar">Notificar</a> </td>
    @break
    @case(1)
    <td id="estatus_{{$autoevaluacion->id}}"><span style="color: green"><i class="fas fa-check-circle"></i></span><span
            class="txt_estatus">Concluido</span></td>
    <td id="accion_{{$autoevaluacion->id}}"><a data-toggle="modal" data-target="#mensaje"
            data-whatever="{{$autoevaluacion->deposito->user->email}}" value="2" data-id="{{$autoevaluacion->id}}"
            style="color: white" class="btn btn-danger btn-sm modificar">Devolver</a></td>
    @break
    @case(2)
    <td id="estatus_{{$autoevaluacion->id}}"><span style="color: red"><i class="fas fa-undo"></i></span><span
            class="txt_estatus">Devuelto</span>
    </td>
    <td id="accion_{{$autoevaluacion->id}}"><a value="1" data-id="{{$autoevaluacion->id}}" style="color: white"
            class="btn btn-warning btn-sm modificar">Cancelar</a></td>
    @break

    @endswitch
    <td>
        <form method="POST" id="form{{$autoevaluacion->id}}"
            action="{{route('adm.autoevaluaciones.eliminar', $autoevaluacion->id)}}">
            @method('DELETE')
            @csrf
            <a href="{{route('adm.autoevaluaciones.ver', $autoevaluacion->id)}}">
                <span style="color: blue">
                    <i class="fas fa-chevron-circle-right"></i>
                </span>
            </a>

            <button id="{{$autoevaluacion->id}}" class="btn btn-link delete-confirm" type="submit">
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
    var id;
    var val;
    $(function () {
        $('body').on('click', '.delete-confirm', function (event) {
            event.preventDefault();
        const url = $(this).attr('href');

            var idAuto = this.id;
                Swal.fire({
                title: 'Autoevaluación',
                text: "¿Desea eliminar la autoevaluación?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
                }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("form"+idAuto).submit();
            } 
                
         })
        });
 });



    $('.modificar').click(function() {
       // e.preventDefault();
        id = $(this).data('id');
        val = $(this).attr('value');

        if(val==1){
            Swal.fire({
            title: 'Cancelar',
            text: "¿Desea cancelar la devolución?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: "POST",
                        url:"/adm/autoevaluaciones/cancelar",
                        data:{
                            id:id
                        },
                        success: function () {
                        mensajeCorrecto('Se ha cancelado la devolución');
                        concluido();
                        },
                    });
                }      
            })
        }
        $("#destino").attr('value', $(this).attr('data-whatever'));
    });

    function concluido(){
        $("#estatus_"+id+" .txt_estatus").text('Concluido');
        $("#estatus_"+id+" i").removeClass('fa-undo');
        $("#estatus_"+id+" i").addClass('fa-check-circle');
        $("#estatus_"+id+" i").css('color','green');

        $("#accion_"+id+" a").text('Devolver'); 
        $("#accion_"+id+" a").removeClass('btn-warning');
        $("#accion_"+id+" a").addClass('btn-danger');
        $("#accion_"+id+" a").attr('value', '2');
    }

    function cancelar(){
        $("#estatus_"+id+" .txt_estatus").text('Devuelto');
        $("#estatus_"+id+" i").removeClass('fa-check-circle');
        $("#estatus_"+id+" i").addClass('fa-undo');
        $("#estatus_"+id+" i").css('color','red');

        $("#accion_"+id+" a").text('Cancelar'); 
        $("#accion_"+id+" a").removeClass('btn-danger');
        $("#accion_"+id+" a").addClass('btn-warning');
        $("#accion_"+id+" a").attr('value', '1');
    }
    
    function mensajeCorrecto(mensaje){
        Swal.fire({
            icon: 'success',
            title: mensaje,
            showConfirmButton: false,
            timer: 1500
        });
                
    }


    function notificar() {
        var destino = $('#destino').val();
        var msj = $('#msj').val();
        if(msj!=''){
            $('#mensaje').modal('hide');
            $("#msj").val('');
            $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url:"/adm/autoevaluaciones/notificar",
            data: {
                destino:destino,
                msj:msj,
                id:id,
                val: val,
            },
            success: function () {
                mensajeCorrecto('La notificación ha sido enviada')
                if(val==2){
                    cancelar();
                }
            },
            error: function() {
                console.log('error!');
            },        
        });
        }
        
    }

    $( ".cerrar" ).click(function() {
        $("#msj").val('');
    });

    
 
</script>
@endsection