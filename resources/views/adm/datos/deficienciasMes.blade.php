@extends('layouts.app')
@section('content')
<script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
<h1 class="h3 mb-2 text-gray-800 text-center">Deficiencia por área {{$mes}} de la {{$region->nombre}}</h1>
<h1 id="titulo" class="h3 mb-2 text-gray-800 text-center"></h1>
<br>
@foreach ($region->depositos as $i => $deposito)
@if (($i%2)==0)
<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div id="card{{$deposito->nombre}}" class="card">
            <a id="{{$deposito->id}}" onclick="seleccionar(this)">
                <canvas id="{{$deposito->nombre}}"></canvas>
            </a>
        </div>
    </div>
    @else
    <div class="col-md-6 py-md-3 py-sm-3">
        <div id="card{{$deposito->nombre}}" class="card">
            <a id="{{$deposito->id}}" onclick="seleccionar(this)">
                <canvas id="{{$deposito->nombre}}"></canvas>
            </a>
        </div>
    </div>
</div>
@endif

@endforeach


@endsection

@section('scripts')

<script type="text/javascript" >
    function seleccionar(deposito) {
        var anio = {{$anio}};
        var region = {{$region->id}};
        
        var url='/adm/datos/deficiencias/depot/'+anio+'/'+"{!!$mes!!}"+'/'+deposito.id;
        location.href=url;
     }
    var depositos = {!!$region->depositos!!};
        var deficiencias = {!!$deficiencias!!};
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

    depositos.forEach(function(deposito){
        var labels = new Array();
        var data = new Array();
            deficiencias.forEach(function(deficiencia){
            if(deficiencia.deposito== deposito.nombre){
                labels.push(deficiencia.nombre);
                data.push(deficiencia.total);
            }
        });

        // Pie Chart Example
        //document.getElementById("titulo").appendChild($zona);
        var ctx = document.getElementById(deposito.nombre);
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
                text: deposito.nombre,
                fontSize: 13,
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
                    offset: 15,
                    display: function (context) {
                        var dataset = context.dataset;
                        var count = dataset.data.length;
                        var value = dataset.data[context.dataIndex];
                        return value >= 0.0001;
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