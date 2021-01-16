@extends('layouts.app')
@section('content')

<script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
<h1 class="h3 mb-2 text-gray-800 text-center">Resultados gráficos de {{$asignacion->mes.' de '.$asignacion->anio}}</h1>
<br>

<br>


<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <div class="card-body">
                <canvas id="nacional"></canvas>
            </div>
        </div>
    </div>


    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <div class="card-body">
                <canvas id="controlesRiesgo"></canvas>
            </div>
        </div>
    </div>
</div>

@foreach ($regiones as $i=>$region)
@if (($i%2)==0)
<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">

            <a href="{{route('adm.datos.resultados.region',[$asignacion->id, $region->id])}}">
                <div class="card-body">

                    <canvas id="region{{$region->id}}"></canvas>

                </div>
            </a>
        </div>
    </div>
    @else
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">

            <a href="{{route('adm.datos.resultados.region',[$asignacion->id, $region->id])}}">
                <div class="card-body">

                    <canvas id="region{{$region->id}}"></canvas>

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

    // Pie Chart Example
    var ctx = document.getElementById("nacional");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [{{
                    $nacional[0]["rb"].','.$nacional[0]["rbo"].','.$nacional[0]["ra"]
                }}],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Nacional',
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



    // Pie Chart Example
    var ctx = document.getElementById("controlesRiesgo");
    var riesgo = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: ["Region I","Region II","Region III","Region IV","Region V","Region VI"],
            datasets: [{
                data: [
                    {{
                    $riesgos[0].','.$riesgos[1].','.$riesgos[2].','.$riesgos[3].','.$riesgos[4].','.$riesgos[5]
                    }}
                ],
                backgroundColor: 'red',
                hoverBackgroundColor: ['red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
            //hoverBackgroundColor: "red",
        },
        options: {
            title: {
                display: true,
                text: '% Controles Riesgo Alto',
                fontSize: 20,
            },
                plugins: {
                    datalabels: {
                        align: function(context) {
                            var value = context.dataset.data[context.dataIndex];
                            return value > 0 ? 'end' : 'start';
                        },
                        anchor: function(context) {
                            var value = context.dataset.data[context.dataIndex];
                            return value > 0 ? 'end' : 'start';
                        },

                        backgroundColor: function(context) {
                            return context.dataset.backgroundColor;
                        },
                        borderRadius: 4,
                        color: 'white',
                        display: function (context) {
                        var dataset = context.dataset;
                        var count = dataset.data.length;
                        var value = dataset.data[context.dataIndex];
                        return value >= count * 0.01;
                        },

                        formatter: function(value, context) {
                            return  Math.round(value*100)/100 ;
                        }
                             
                    }
                }
        }
    });

    var regiones= {!!$regiones!!};
    regiones.forEach(function(region){
        var data = new Array();
                data.push(region.rb);
                data.push(region.rbo);
                data.push(region.ra);


        // Pie Chart Example
        var r1 = document.getElementById("region"+region.id);
        var region1 = new Chart(r1, {
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
                    text: region.nombre,
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