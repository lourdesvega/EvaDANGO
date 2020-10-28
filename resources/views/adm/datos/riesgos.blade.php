@extends('layouts.app')
@section('content')
    <script src="{{asset('vendor/chart.js/Chart.js')}}" charset="utf-8"></script>
    <script src="{{asset('vendor/chart.js/chartjs-plugin-datalabels.min.js')}}" charset="utf-8"></script>
    <h1 class="h3 mb-2 text-gray-800 text-center">Evolución riesgo alto por región</h1>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="card mb-auto">
                    <a href="{{route('adm.datos.deficiencias')}}">
                    <canvas id="nacional"></canvas>
                    </a>
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
        var riesgo = new Chart(ctx, {
            type: 'line',

            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [1.01, 0.00, 0.00, 2.56, 1.67],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
                }],
                //hoverBackgroundColor: "red",
            },
            options: {
                title: {
                    display: true,
                    text: 'Total',
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


        // Pie Chart Example
        var r1 = document.getElementById("region1");
        var region1 = new Chart(r1, {
            type: 'line',
            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [1.01, 0.00, 0.00, 2.56, 1.67],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
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


        // Pie Chart Example
        var r2 = document.getElementById("region2");
        var region2 = new Chart(r2, {
            type: 'line',
            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [1.01, 0.00, 0.00, 2.14, 1.43],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
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

        // Pie Chart Example
        var r3 = document.getElementById("region3");
        var region3 = new Chart(r3, {
            type: 'line',
            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [1.01, 0.84, 0.00, 4.17, 1.67],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
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

        // Pie Chart Example
        var r4 = document.getElementById("region4");
        var region4 = new Chart(r4, {
            type: 'line',
            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [0.00, 0.00, 0.00, 0.00, 0.63],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
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

        // Pie Chart Example
        var r5 = document.getElementById("region5");
        var region5 = new Chart(r5, {
            type: 'line',
            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [1.69, 0.00, 1.69, 5.83, 6.43],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
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

        // Pie Chart Example
        var r6 = document.getElementById("region6");
        var region6 = new Chart(r6, {
            type: 'line',
            data: {
                labels: ["Marzo", "Abril", "Mayo", "Junio","Julio"],
                datasets: [{
                    data: [1.01, 2.04, 0.00, 1.25, 0.63],
                    fill: false,
                    backgroundColor: "rgb(192,80,77)",
                    borderColor: "rgb(192,80,77)",
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


    </script>

@endsection

@section('scripts')

@endsection
