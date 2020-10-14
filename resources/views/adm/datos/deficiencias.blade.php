@extends('layouts.app')
@section('content')
    <script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
    <script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
    <h1 class="h3 mb-2 text-gray-800 text-center">Total compañia. Deficiencias por Área</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-auto">
                    <canvas id="marzo"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <canvas id="abril"></canvas>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-auto">
                    <canvas id="mayo"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <canvas id="junio"></canvas>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-auto">
                    <canvas id="julio"></canvas>
                </div>
            </div>
        </div>
    </div>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("marzo");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Finanzas", "Supply", "Comercial", "RH", "Abastecimiento"],
            datasets: [{
                data: [1.12, 4.85, 0, 1.12, 0],
                backgroundColor: ['rgb(79, 129, 189)', 'rgb(192, 80, 77)', 'rgb(155, 187 ,89)', 'rgb(128, 100, 162)', 'rgb(75, 172, 198)'],
                //hoverBackgroundColor: ['', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Marzo',
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
                        return value > 0;
                    },
                    font: {
                        weight: 'bold'
                    },
                }
            }
        }
    });


    // Pie Chart Example
    var ctx = document.getElementById("abril");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Finanzas", "Supply", "Comercial", "RH", "Abastecimiento"],
            datasets: [{
                data: [1, 2, 0, 0, 0],
                backgroundColor: ['rgb(79, 129, 189)', 'rgb(192, 80, 77)', 'rgb(155, 187 ,89)', 'rgb(128, 100, 162)', 'rgb(75, 172, 198)'],
                //hoverBackgroundColor: ['', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Abril',
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
                        return value >  0;
                    },
                    font: {
                        weight: 'bold'
                    },
                }
            }
        }
    });


    // Pie Chart Example
    var ctx = document.getElementById("mayo");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Finanzas", "Supply", "Comercial", "RH", "Abastecimiento"],
            datasets: [{
                data: [0, 2.13, 0, 0, 0],
                backgroundColor: ['rgb(79, 129, 189)', 'rgb(192, 80, 77)', 'rgb(155, 187 ,89)', 'rgb(128, 100, 162)', 'rgb(75, 172, 198)'],
                //hoverBackgroundColor: ['', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Mayo',
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
                        return value > 0;
                    },
                    font: {
                        weight: 'bold'
                    },
                }
            }
        }
    });

    // Pie Chart Example
    var ctx = document.getElementById("junio");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Finanzas", "Supply", "Comercial", "RH", "Abastecimiento"],
            datasets: [{
                data: [0, 7.89, 0.82, 0.49, 0],
                backgroundColor: ['rgb(79, 129, 189)', 'rgb(192, 80, 77)', 'rgb(155, 187 ,89)', 'rgb(128, 100, 162)', 'rgb(75, 172, 198)'],
                //hoverBackgroundColor: ['', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Junio',
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
                        return value > 0;
                    },
                    font: {
                        weight: 'bold'
                    },
                }
            }
        }
    });

    // Pie Chart Example
    var ctx = document.getElementById("julio");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Finanzas", "Supply", "Comercial", "RH", "Abastecimiento"],
            datasets: [{
                data: [0.60, 6.78, 0, 0, 0],
                backgroundColor: ['rgb(79, 129, 189)', 'rgb(192, 80, 77)', 'rgb(155, 187 ,89)', 'rgb(128, 100, 162)', 'rgb(75, 172, 198)'],
                //hoverBackgroundColor: ['', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Julio',
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
                        return value > 0;
                    },
                    font: {
                        weight: 'bold'
                    },
                }
            }
        }
    });

</script>
@endsection
