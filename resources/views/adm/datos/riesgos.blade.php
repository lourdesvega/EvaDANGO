@extends('layouts.app')
@section('content')
<script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
<script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
<h1 class="h3 mb-2 text-gray-800 text-center">Evolución riesgo alto por región </h1>
<br>
<div class="form-group row ">
    <label class="col-sm-2 col-form-label">Años</label>
    <div class="col-sm-3">
        <select name="anio" id="anio" class="form-control">
            @foreach ($anios as $anio)
            <option>{{$anio->anio}}</option>
            @endforeach
        </select>
    </div>
</div>



<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <a id="0" onclick="deficiencias(this)">
                <canvas id="nacional"></canvas>
            </a>
        </div>
    </div>
</div>

@foreach ($zonas as $i => $zona)
@if (($i%2)==0)
<div class="row my-md-n3">
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <a id="{{$zona->id}}" onclick="deficiencias(this)">
                <canvas id="{{$zona->nombre}}"></canvas>
            </a>
        </div>
    </div>
    @else
    <div class="col-md-6 py-md-3 py-sm-3">
        <div class="card">
            <a id="{{$zona->id}}" onclick="deficiencias(this)">
                <canvas id="{{$zona->nombre}}"></canvas>
            </a>
        </div>
    </div>
</div>
@endif

@endforeach



@endsection

@section('scripts')
<script>
    var $anio;
    var $idR = 0;
    var zonas = {!!$zonas!!};
    function deficiencias(region) {
        
       $idR = region.id;
       var url='/adm/datos/deficiencias/'+$anio+'/'+$idR;
       location.href=url;
 // document.getElementById("field2").value = document.getElementById("field1").value;
    }

    $(function() {
    var $select = $('#anio');

    $select.on('change', ejecutar);
    $select.trigger('change');
   

    function ejecutar() {
        $anio = $select.find('option:selected').text();
        $.ajax({
            type:'get',
            url: "/adm/datos/riesgos/obtener/"+$anio,
            success: function(riesgos){
                Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                Chart.defaults.global.defaultFontColor = '#858796';
                var labels = new Array();
                var data = new Array();

                riesgos.riesgosNacional.forEach(function(riesgo){
                        labels.push(riesgo.mes);
                        data.push(riesgo.ra);
                });

                console.log(labels);
                console.log(data);

                var cxt = document.getElementById("nacional");
                var nacional = new Chart(cxt, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: "Nacional",
                            data: data,
                            fill: false,
                            backgroundColor: "rgb(192,80,77)",
                            borderColor: "rgb(192,80,77)",
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


                            }
                        }

                    }
                });




            //Regiones

                labels = new Array();
                data = new Array();


                zonas.forEach(function(zona){
                        riesgos.riesgosRegion.forEach(function(riesgo){
                            if(zona.nombre == riesgo.nombre){
                                labels.push(riesgo.mes);
                                data.push(riesgo.ra); 
                            }
                        });
                   

                
                var cxt = document.getElementById(zona.nombre);
                var nacional = new Chart(cxt, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: zona.nombre,
                            data: data,
                            fill: false,
                            backgroundColor: "rgb(192,80,77)",
                            borderColor: "rgb(192,80,77)",
                        }],
                    },
                    options: {
                        title: {
                            display: true,
                            text: zona.nombre,
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