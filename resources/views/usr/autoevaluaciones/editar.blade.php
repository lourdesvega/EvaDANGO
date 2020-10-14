@extends('layouts.app')

@section('content')

<link href="{{asset('vendor/dropzone/dropzone.css')}}" rel="stylesheet">
<script src="{{asset('vendor/dropzone/dropzone.js')}}"></script>

<div class="row">
    <div class="col-xl-10 order-xl-1">
        <h1 class="h3 mb-2 text-gray-800 text-center">Controles de la autoevaluación</h1>
        <br>
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
                            <input type="text" name="referencial" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Riesgos de dominio</label>
                        <div class="col-sm-8">
                            <input type="text" name="riesgosDominio" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Riesgos clave relacionados</label>
                        <div class="col-sm-8">
                            <input type="text" name="riesgosClave" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Objetivos de controles</label>
                        <div class="col-sm-8">
                            <textarea name="objetivo" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Guía sobre la actividad de control para mitigar el
                            riesgo</label>
                        <div class="col-sm-8">
                            <textarea name="guia" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Área</label>
                        <div class="col-sm-5">
                            <input type="text" name="area_id" class="form-control">
                        </div>
                    </div>
                </div>
                <h6 class="heading-small text-muted mb-6">Autoevaluación</h6>
                <div class="pl-lg-4">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Calificación</label>
                        <div class="col-sm-4">
                            <select name="calificacion" class="form-control">
                                <option value="">Riesgo bajo</option>
                                <option value="">Riesgo bajo con observación</option>
                                <option value="">Riesgo alto</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Hallazgos</label>
                        <div class="col-sm-8">
                            <textarea name="hallazgo" class="form-control @error('hallazgo') is-invalid @enderror"
                                required autocomplete="hallazgo" autofocus></textarea>
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
                                autocomplete="plan" autofocus></textarea>
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
                            <input type="date" name="fechaCompromiso" class="form-control @error('fechaCompromiso') is-invalid @enderror" required
                                autocomplete="fechaCompromiso" autofocus>
                            @error('fechaCompromiso')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Responsable</label>
                        <div class="col-sm-5">
                            <select name="responsable_id" class="form-control">
                                <option value="">Responsable</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Evidencia</label>
                        <div class="col-sm-5">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#archivosUp">
                                Subir evidencia
                            </button>

                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="col-4">
                            <button type="button" class="btn btn-danger">Cancelar</button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary">Aceptar</button>
                        </div>

                    </div>
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
                <form action="/file-upload" id="dropzone" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-4">
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    //https://es.stackoverflow.com/questions/166937/error-al-cargar-imagen-con-dropzone-js-en-laravel
//https://appdividend.com/2018/05/31/laravel-dropzone-image-upload-tutorial-with-example/
//

    Dropzone.options.dropzone = {
        uploadMultiple: true,
        addRemoveLinks: true,
        maxFilesize: 100000,
       // acceptedFiles: true,
        dictCancelUpload: "Cancelar",
        dictRemoveFile: "Eliminar",
        dictDefaultMessage: "Arrastra los archivos aquí para subirlos",
        dictFileTooBig: "Archivo demasiado grande",
        dictInvalidFileType: "Tipo de archivo no válido",
        dictResponseError: "Error al cargar",

        init: function() {
    //this.on("addedfile", function(file) { alert("Archivo agregado"); });
  }
};

</script>
@endsection