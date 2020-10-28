@extends('layouts.tabla')

@section('ttitle')
Autoevaluación de {{$autoevaluacion->asignacion->mes. ' de '. $autoevaluacion->asignacion->anio}}
@endsection
@section('buttons')
<br>
<div class="row">
    <div class="col-md-8 offset-md-10">
        <form id="form" action="{{route('usr.autoevaluaciones.enviar', $autoevaluacion->id)}}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary enviar-confirm">Enviar autoevaluacion</button>
        </form>

    </div>
</div>
@endsection


@section('thead')
<th>Control</th>
<th>Calificación</th>
<th>Hallazgos</th>
<th>Plan de acción</th>
<th>Fecha compromiso</th>
<th>Responsable</th>
<th>Evidencia</th>
<th></th>
@endsection


@section('tfoot')
<th>Control</th>
<th>Calificación</th>
<th>Hallazgos</th>
<th>Plan de acción</th>
<th>Fecha compromiso</th>
<th>Responsable</th>
<th>Evidencia</th>
<th></th>
@endsection

@section('tbody')
@foreach ($autoevaluacion->detalleAutoevaluaciones as $detalle)
<tr>
    <td>{{$detalle->control->referencial}}</td>
    <td>{{$detalle->calificacion == null ? '':$detalle->calificacion}}</td>
    <td>{{$detalle->hallazgo == null ? '' : $detalle->hallazgo}}</td>
    <td>{{$detalle->plan ==  null ? '': $detalle->plan}}</td>
    <td>{{ $detalle->fechaCompromiso == null ? '' : $detalle->fechaCompromiso->isoFormat('DD [de] MMMM [de] Y')}}</td>
    <td>{{$detalle->responsable == null ? '': $detalle->responsable->nombre . ' ' . $detalle->responsable->apellidos}}
    </td>
    <td>


        @forelse ($detalle->evidencias as $evidencia)
        <div style="width: 100px; 
        white-space: nowrap; 
        overflow: hidden;   
        text-overflow: ellipsis;">
            <span style="color: blue">
                <i title="{{$evidencia->nomOriginal}}" class="far fa-file-alt"></i>
            </span>
            {{$evidencia->nomOriginal}}
        </div>
        @empty
        Sin evidencias
        @endforelse

    </td>
    <td>
        <a href="{{route('usr.detalle.editar', $detalle->id)}}">
            <span style="color: blue">
                <i class="fas fa-pen"></i>
            </span>
        </a>


    </td>


</tr>
@endforeach



@endsection

@section('script')
<script>
    $('.enviar-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
        title: 'Autoevaluacion',
        text: "Una vez enviada la autoevaluación no se podrá editar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí',
        cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'get',
                    url: '{{route('usr.autoevaluaciones.contar',$autoevaluacion->id)}}',
                    success: function(d){
                        if(d>0){
                        
                            Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Completa todos los controles de la autoevaluación',
                            })
                        }
                        else{
                            document.getElementById("form").submit();
                        }
                    }
                });
            }      
                    
            
        })
    });
</script>

@endsection