@extends('layouts.app')
@section('content')
    <script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
    <script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
    <h1 class="h3 mb-2 text-gray-800 text-center">Resultados graficos Julio de 2020</h1>
    <br>
<div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-auto">
                    <canvas id="nacional"></canvas>
                 </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <canvas id="controlesRiesgo"></canvas>
                </div>
            </div>
        </div>
<br>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-auto">
                <canvas id="region1"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <canvas id="region2"></canvas>
            </div>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-auto">
                <canvas id="region3"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <canvas id="region4"></canvas>
            </div>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-auto">
                <canvas id="region5"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <canvas id="region6"></canvas>
            </div>
        </div>
    </div>

</div>
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
                data: [87, 11, 2],
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
                        return value > count * 0.5;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
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
                data: [1.67, 1.43, 1.67, 0.63, 6.43, 0.63],
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

                        formatter: Math.round
                    }
                }
        }
    });


    // Pie Chart Example
    var r1 = document.getElementById("region1");
    var region1 = new Chart(r1, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [83, 14, 3],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Region I',
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
                        return value > count * 0.5;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
                }
            }

        }
    });


    // Pie Chart Example
    var r2 = document.getElementById("region2");
    var region2 = new Chart(r2, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [91, 7, 2],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Región II',
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
                        return value > count * 0.5;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
                }
            }

        }
    });

    // Pie Chart Example
    var r3 = document.getElementById("region3");
    var region3 = new Chart(r3, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [83, 13, 4],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Región III',
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
                        return value > count * 0.5;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
                }
            }

        }
    });

    // Pie Chart Example
    var r4 = document.getElementById("region4");
    var region4 = new Chart(r4, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [95, 5, 0],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Región IV',
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
                        return value > count * 0.5;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
                }
            }

        }
    });

    // Pie Chart Example
    var r5 = document.getElementById("region5");
    var region5 = new Chart(r5, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [8, 14, 6],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Región V',
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
                        return value > count * 0.5;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
                }
            }

        }
    });

    // Pie Chart Example
    var r6 = document.getElementById("region6");
    var region6 = new Chart(r6, {
        type: 'pie',
        data: {
            labels: ["Bajo riesgo", "Riesgo Bajo con Observación", "Riesgo Alto"],
            datasets: [{
                data: [85, 14, 1],
                backgroundColor: ['green', 'yellow', 'red'],
                hoverBackgroundColor: ['green', 'yellow', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            title: {
                display: true,
                text: 'Región VI',
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
                        return value > count * 0.1;
                    },
                    font: {
                        weight: 'bold'
                    },
                    formatter: Math.round
                }
            }

        }
    });


</script>

@endsection

@section('scripts')

@endsection
