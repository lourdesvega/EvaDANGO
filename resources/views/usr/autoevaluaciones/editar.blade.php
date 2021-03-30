@extends('layouts.app')

@section('content')




<h1 class="h3 mb-2 text-gray-800 text-center">Completar control {{$detalle->control->referencial}} de la autoevaluación</h1>
<br>
<div class="row">
    <div class="col-sm-9">
        <form method="POST" action="{{route('usr.detalle.actualizar', $detalle->id)}}">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Crear</h6>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-6">Datos de la evaluación</h6>
                    <div class="pl-lg-4">
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Nuevo referencial</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{$detalle->control->referencial}}" style="background: white;"
                                    readonly name="referencial" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Riesgos de dominio</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{$detalle->control->riesgosDominio}}"
                                    style="background: white" readonly name="riesgosDominio" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Riesgos clave relacionados</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{$detalle->control->riesgosClave}}" style="background: white"
                                    readonly name="riesgosClave" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Objetivos de controles</label>
                            <div class="col-sm-8">
                                <textarea name="objetivo" style="background: white" readonly
                                    class="form-control">{{$detalle->control->objetivo}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Guía sobre la actividad de control para mitigar el
                                riesgo</label>
                            <div class="col-sm-8">
                                <textarea name="guia" style="background: white" readonly
                                    class="form-control">{{$detalle->control->guia}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Área</label>
                            <div class="col-sm-5">
                                <input type="text" value="{{$detalle->control->area->nombre}}" style="background: white"
                                    readonly name="area_id" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h6 class="heading-small text-muted mb-6">Autoevaluación</h6>
                    <div class="pl-lg-4">

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Calificación</label>
                            <div class="col-sm-6">
                                <select name="calificacion" class="form-control">
                                    <option {{$detalle->calificacion == 'Riesgo bajo' ? 'selected="selected"' : ''}}>
                                        Riesgo
                                        bajo</option>
                                    <option
                                        {{$detalle->calificacion == 'Riesgo bajo con observación' ? 'selected="selected"' : ''}}>
                                        Riesgo bajo con observación</option>
                                    <option {{$detalle->calificacion == 'Riesgo alto' ? 'selected="selected"' : ''}}>
                                        Riesgo
                                        alto</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Hallazgos</label>
                            <div class="col-sm-8">
                                <textarea name="hallazgo" class="form-control @error('hallazgo') is-invalid @enderror"
                                    required autocomplete="hallazgo" autofocus>{{$detalle->hallazgo}}</textarea>
                                @error('hallazgo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Plan de acción</label>
                            <div class="col-sm-8">
                                <textarea name="plan" class="form-control @error('plan') is-invalid @enderror" required
                                    autocomplete="plan" autofocus>{{$detalle->plan}}</textarea>
                                @error('plan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Fecha compromiso</label>
                            <div class="col-sm-4">
                                <input type="date" value="{{$detalle->fechaCompromiso}}" name="fechaCompromiso"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Responsable</label>
                            <div class="col-sm-5">
                                <select name="responsable_id" class="form-control">
                                    <option {{$detalle->responsable_id == null ? 'selected= "selected"' :''}}></option>
                                    @foreach ($responsables as $responsable)

                                    <option {{$responsable->id == $detalle->responsable_id ? 'selected="selected"': ''}}
                                        value="{{$responsable->id}}">
                                        {{$responsable->nombre.' '. $responsable->apellidos}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <a href="{{route('usr.autoevaluaciones.listar', $detalle->autoevaluacion->id)}}"
                                    class="btn btn-danger">Cancelar</a>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Evidencias</h6>
            </div>
            <div class="card-body">
                <div id="archivos">
                </div>
                @forelse ($detalle->evidencias as $evidencia)
                <div id="div{{$evidencia->id}}" class="form-group row border rounded">
                    <div class="col-sm-9 text-truncate">{{$evidencia->nomOriginal}}</div>
                    <div class="col-sm-1">
                        <a href="" data-id="{{$evidencia->id}}" class="btn btn-link delete-confirm" type="submit">
                            <span style="color: gray">
                                <i class="fas fa-times"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @empty
                @endforelse

                <div class="col-sm-10">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#archivosUp">
                        Subir
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="archivosUp" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Agregar evidencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('usr.evidencias.guardar', $detalle->id)}}"
                    enctype="multipart/form-data" class="dropzone" id="dropzone">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<link href="{{asset('vendor/dropzone/dropzone.css')}}" rel="stylesheet">
<script src="{{asset('vendor/dropzone/dropzone.js')}}"></script>
<script>
    $(document).on('click', '.delete-confirm', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
                title: 'Evidencia',
                text: "¿Desea eliminar la evidencia?",
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
                    url: "/usr/evidencias/eliminar/"+id,
                    data: {id:id},
                    success: function (data) {
                        document.getElementById("div"+id).style.display = "none";
                    },
                            error: function() {
                                console.log('error!');
                    },        
                });
                    
            }
        });
});

</script>


<script type="text/javascript">
    //https://es.stackoverflow.com/questions/166937/error-al-cargar-imagen-con-dropzone-js-en-laravel
//https://appdividend.com/2018/05/31/laravel-dropzone-image-upload-tutorial-with-example/
//
    Dropzone.options.dropzone = {
        timeout: 5000,
        maxFilesize: 12,
        dictCancelUpload: "Cancelar",
        dictDefaultMessage: "Arrastra los archivos aquí para subirlos",
        dictFileTooBig: "Archivo demasiado grande",
        dictInvalidFileType: "Tipo de archivo no válido",
        dictResponseError: "Error al cargar",  
        success: function(file, evidencia) 
        {

              $('#archivos').append('<div id="div'+evidencia.id +'" class="form-group row border rounded">'+
                   ' <div class="col-sm-9 text-truncate">'+ evidencia.nomOriginal +'</div>'+
                    '<div class="col-sm-1">'+
                        '<a href="" data-id="'+evidencia.id+'" class="btn btn-link delete-confirm">'+
                            '<span style="color: gray">'+
                                    '<i class="fas fa-times"></i>'+
                                '</span>'+
                        '</a>'+
                    '</div>'+
                '</div>'
            );
        },
        init: function () {
            this.on("complete", function(file) {
            this.removeFile(file);


            });
        }
};

</script>
@endsection