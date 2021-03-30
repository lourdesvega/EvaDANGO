    function deficiencias(region) {
        
       $idR = region.id;
       var url='/adm/datos/deficiencias/'+$anio+'/'+$idR;
       location.href=url;
    }


    
    var $anio;
    var $idR = 0;




    function riesgosNacional(){

    }

   

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
                                formatter: function(value, context) {
                                    return value + ' %';
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
                                formatter: function(value, context) {
                                    return value + ' %';
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

    

    
