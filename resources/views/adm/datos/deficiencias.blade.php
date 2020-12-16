@extends('layouts.app')
@section('content')
<script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
<h1 class="h3 mb-2 text-gray-800 text-center">Total compañia {{$anio}}. Deficiencias por Área </h1>
<h1 id="titulo" class="h3 mb-2 text-gray-800 text-center"></h1>
<br>
<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Deficiencias</label>
    <div class="col-sm-3">
        <select name="zona" id="zona" class="form-control">
            <option value="0" {{$opcion == 0 ? 'selected = "selected"' : ''}}>Nacional</option>
            @foreach ($zonas as $zona)
            <option value="{{$zona->id}}" {{$opcion == $zona->id ? 'selected = "selected"' : ''}}>{{$zona->nombre}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@foreach ($meses as $i => $mes)
@if (($i%2)==0)
<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div id="card{{$mes->mes}}" class="card">
            <canvas id="{{$mes->mes}}"></canvas>
        </div>
    </div>
    @else
    <div class="col-md-6 py-md-3 py-sm-3">
        <div id="card{{$mes->mes}}" class="card">
            <canvas id="{{$mes->mes}}"></canvas>
    </div>
</div>
</div>
@endif

@endforeach


@endsection

@section('scripts')

<script>
    var $zona;
    var $idR = 0;
    var meses ={!!$meses!!};
$(function() {
    var $select = $('#zona');

    $select.on('change', ejecutar);
    $select.trigger('change');
   

    function ejecutar() {
        $zona = $select.find('option:selected').text();
        var $id_zona = $( "#zona" ).val();
        var $urll= "/adm/datos/def/"+{{$anio}}+"/"+$id_zona;
        $.ajax({
        type:'get',
        url: $urll,
        success: function(riesgos){
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';
            var labels = new Array();
            var data = new Array();
            
            meses.forEach(function(mes){
                riesgos.forEach(function(riesgo){
                    if(riesgo.mes== mes.mes){
                    labels.push(riesgo.nombre);
                    data.push(riesgo.total);

                    }
                });

                    // Pie Chart Example
                document.getElementById(mes.mes).remove();
                var canvas = document.createElement("canvas");
                canvas.id = mes.mes; 
                var idcont= "card"+mes.mes;
                document.getElementById(idcont).appendChild(canvas);
                //document.getElementById("titulo").appendChild($zona);
                $("#titulo").text($zona);
                var ctx = document.getElementById(mes.mes);
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: ['rgb(79, 129, 189)', 'rgb(192, 80, 77)', 'rgb(155, 187 ,89)', 'rgb(128, 100, 162)', 'rgb(75, 172, 198)'],
                            //hoverBackgroundColor: ['', 'yellow', 'red'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    },
                    options: {
                        title: {
                            display: true,
                            text: mes.mes,
                            fontSize: 20,
                        },
                        plugins: {
                            datalabels: {
                                backgroundColor: function (context) {
                                    return context.dataset.backgroundColor;
                                },
                                align:'end',
                                borderColor: 'white',
                                borderRadius: 10,
                                borderWidth: 2,
                                color: 'white',
                                offset: 2,
                                display: function (context) {
                                    var dataset = context.dataset;
                                    var count = dataset.data.length;
                                    var value = dataset.data[context.dataIndex];
                                    return value >= 0;
                                },
                                font: {
                                    weight: 'bold'
                                },
                            }
                        }
                    }
                });

                labels = new Array();
                data = new Array();
            });
        }
        });
    }
});
</script>
@endsection