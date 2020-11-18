@extends('layouts.tabla')

@section('ttitle')
Evaluacion DanGo {{$anio}}
@endsection

@section('buttons')
<br>

<div class=" row justify-content-md-center">
    <label class="col-3 col-form-label">Región</label>
    <div class="col-sm-2">
        <select id="zonas" name="zonas" class="form-control">
            @foreach ($zonas as $zona )
            <option value="{{$zona->id}}">{{$zona->nombre}}</option>
            @endforeach
        </select>
    </div>

    <label class="col-3 col-form-label">Depósito</label>
    <div class="col-sm-3">
        <select id="depositos" name="depositos" class="form-control">
        </select>
    </div>
</div>
@endsection

@section('thead')
<th>Área</th>
<th>Descripción</th>
<th>Código</th>
<th>Riesgos D.</th>
@foreach ($meses as $mes)
<th>{{$mes->mes}}</th>
@endforeach
@endsection

@section('tfoot')
<th>Área</th>
<th>Descripción</th>
<th>Código</th>
<th>Riesgos D.</th>
@foreach ($meses as $mes)
<th>{{$mes->mes}}</th>
@endforeach
@endsection

@section('tbody')

@foreach ($controles as $control)
<tr>
    <td>{{$control->area->nombre}}</td>
    <td>{{$control->descripcion}}</td>
    <td>{{$control->referencial}}</td>
    <td>{{$control->riesgosDominio}}</td>
    @foreach ($meses as $mes)
    <td id="{{$mes->mes.$control->id}}"></td>
    @endforeach
</tr>
@endforeach

@endsection

@section('script')
<script>
    var meses ={!!$meses!!};
    var $id_zona; 
    var $id_deposito;
$(function() {
    var $selectZona = $('#zonas');
    $selectZona.on('change', ejecutarZona);
    $selectZona.trigger('change');


    var $selectDeposito = $('#depositos');
    $selectDeposito.on('change', ejecutarDeposito);

   

    function ejecutarZona() {
        $id_zona = $( "#zonas" ).val();
        $.get('/adm/datos/depositos/'+$id_zona, function(depositos){ 
            $('#depositos').empty();
            $.each(depositos, function (index, deposito) {
                $('#depositos').append('<option value="' + deposito.id + '">' + deposito.nombre +'</option>');
            });
            $selectDeposito.trigger('change');
        });
    }

    function ejecutarDeposito(){
         $id_deposito = $('#depositos').val();
        $.get('/adm/datos/mes/'+{{$anio}}+"/"+$id_deposito, function(detalles){ 
          $.each(meses, function (i, mes) {
                $.each(detalles, function (j, detalle) {
                    if(mes.mes == detalle.asignacion.mes){
                        $.each(detalle.detalle_autoevaluaciones, function (k, dato) {
                            $("#"+mes.mes+dato.control_id).text(dato.calificacion);
                        });
                    }
                });
           });
        });
    }

});
</script>
@endsection