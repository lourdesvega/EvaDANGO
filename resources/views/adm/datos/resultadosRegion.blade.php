@extends('layouts.app')
@section('content')

<script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
<h1 class="h3 mb-2 text-gray-800 text-center">Resultados gráficos de la {{$region->nombre}} del periodo
    {{$asignacion->mes.' '.$asignacion->anio}}</h1>
<br>

<br>


@foreach ($depositos as $i=>$deposito)
@php
$autoevaluacion=App\Autoevaluacion::where('asignacion_id',$asignacion->id)->where('deposito_id',$deposito->id)->first();    
@endphp
@if (($i%2)==0)

<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <a href="{{route('adm.autoevaluaciones.ver',$autoevaluacion->id)}}">
                <div class="card-body">
                    <canvas id="deposito{{$deposito->id}}"></canvas>
                </div>
            </a>
        </div>
    </div>
    @else
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <a href="{{route('adm.autoevaluaciones.ver',$autoevaluacion->id)}}">
                <div class="card-body">
                    <canvas id="deposito{{$deposito->id}}"></canvas>
                </div>
            </a>
        </div>
    </div>
</div>
@endif
@endforeach


<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var depositos = {!!$depositos!!};
    depositos.forEach(function(deposito){
        var data = new Array();
                data.push(deposito.rb);
                data.push(deposito.rbo);
                data.push(deposito.ra);


        // Pie Chart Example
        var r1 = document.getElementById("deposito"+deposito.id);
        var deposito1 = new Chart(r1, {
            type: 'pie',
            data: {
                labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
                datasets: [{
                    data: data,
                    backgroundColor: ['green', 'yellow', 'red'],
                    hoverBackgroundColor: ['green', 'yellow', 'red'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                title: {
                    display: true,
                    text: deposito.nombre,
                    fontSize: 20,
                },
                plugins: {
                    datalabels: {
                        backgroundColor: function (context) {
                            return context.dataset.backgroundColor;
                        },
                        align:'end',
                        borderColor: 'white',
                        borderRadius: 25,
                        borderWidth: 2,
                        color: 'white',
                        offset: 14,
                        display: function (context) {
                            var dataset = context.dataset;
                            var count = dataset.data.length;
                            var value = dataset.data[context.dataIndex];
                            return (value > count * 0.1);
                        },
                        formatter: function(value, context) {
                            return Math.round(value) + '%';
                        },
                        font: {
                            weight: 'bold'
                        },
                    }
                }

            }
        });
    });

</script>

@endsection

@section('scripts')

@endsection