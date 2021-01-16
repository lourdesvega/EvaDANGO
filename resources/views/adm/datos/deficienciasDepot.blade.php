@extends('layouts.app')
@section('content')
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Información del control</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="hallazgo" class="col-sm-2 col-form-label">Hallazgo</label>
                    <div class="col-sm-10">
                        <textarea type="text" readonly class="form-control-plaintext" id="hallazgo"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="plan" class="col-sm-2 col-form-label">Plan de acción</label>
                    <div class="col-sm-10">
                        <textarea type="text" readonly class="form-control-plaintext" class="form-control"
                            id="plan"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h1 class="h3 mb-2 text-gray-800 text-center">Controles con riesgo de {{$autoevaluacion->deposito->nombre}} del periodo
    {{$autoevaluacion->asignacion->mes.' '.$autoevaluacion->asignacion->anio}}</h1>
<div class="row">
    <div class="col-lg-10">
        <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
                @php
                $i=0;
                $ant=0;
                @endphp

                @foreach ($deficiencias as $deficiencia)
                @php
                $detalle= App\DetalleAutoevaluacion::find($deficiencia->id);
                @endphp
                @if ($detalle->autoevaluacion_id==$autoevaluacion->id)
                @php
                $i=1;
                $ant = $detalle->control_id;
                @endphp
                @endif

                @if (($i>0 && $i<=5)) @if ($i==1) <br>
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">{{$detalle->control->referencial}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">Periodo</div>
                        <div class="col">Calificación</div>
                        <div class="col">Fecha compromiso</div>
                        <div class="col">Encargado</div>
                        <div class="col">Información</div>
                    </div>
                    @php

                    $ant = $detalle->control_id;
                    @endphp
                    @endif
                    <div class="row">

                        <div class="col">
                            {{$detalle->autoevaluacion->asignacion->mes.' '.$detalle->autoevaluacion->asignacion->anio}}
                        </div>
                        <div class="col">
                            @switch($detalle->calificacion)
                            @case("Riesgo bajo")
                            <span style="color: green">
                                <i class="fas fa-check-circle"></i>
                            </span>
                            @break
                            @case("Riesgo bajo con observación")
                            <span style="color: yellow">
                                <i class="fas fa-minus-circle"></i>
                            </span>
                            @break
                            @case("Riesgo alto")
                            <span style="color: red">
                                <i class="fas fa-times-circle"></i>
                            </span>
                            @break
                            @endswitch
                        </div>
                        <div class="col">
                            {{ $detalle->fechaCompromiso == null ? '' : $detalle->fechaCompromiso->isoFormat('DD [de] MMMM [de] Y')}}
                        </div>
                        <div class="col">
                            {{$detalle->responsable == null ? '' :  $detalle->responsable->nombre.' '.$detalle->responsable->apellidos}}
                        </div>
                        <div class="col">
                            <span style="color: blue">
                                <a id="{{$detalle->id}}" onclick="informacion(this)">
                                    <i class="fas fa-info"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    @php
                    $i++;
                    @endphp
                    @endif
                    @endforeach
            </div>
        </div>
    </div>

</div>


@endsection

@section('scripts')
<script>
    function informacion(detalle){
    $.ajax({
        type:'get',
        url: '/adm/datos/detalleAutoevalucion/'+detalle.id,
        success: function(info){
            console.log(info);
            $('#modalInfo').modal('show');
            $("#hallazgo").val(info.hallazgo);
            $("#plan").val(info.plan);

        }
    });
}

</script>
@endsection