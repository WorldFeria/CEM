var customColors = [
    '#0288D1',
    '#ff6384',
    '#ffcd56',
    '#4bc0c0',
    '#36a2eb',
    '#08B530',
    '#AA2EFF',
    '#2E83FF',
    '#ff6384',
    '#ffcd56',
    '#4bc0c0',
    '#36a2eb',
    '#08B530',
    '#AA2EFF',
    '#2E83FF',
    '#ff6384',
    '#ffcd56',
    '#4bc0c0',
    '#36a2eb',
    '#08B530',
    '#AA2EFF',
    '#2E83FF',
    '#ff6384',
    '#ffcd56',
    '#4bc0c0',
    '#36a2eb',
    '#08B530',
    '#AA2EFF',
    '#2E83FF',
    '#ff6384',
    '#ffcd56',
    '#4bc0c0',
    '#36a2eb',
    '#08B530',
    '#AA2EFF',
    '#2E83FF',
    '#ff6384',
    '#ffcd56',
    '#4bc0c0',
    '#36a2eb',
    '#08B530',
    '#AA2EFF',
    '#2E83FF',
]


/*var customColors = [
    '#0288D1',
    '#03A9F4',
    '#2E86C1',
    '#26C6DA',
    '#29B6F6'

]*/

$(document).ready(function () {

    //var uid = 1;

    var refreshInterval = 30000;

    var chatsCreatedChart = document.getElementById("chartjs-dashboard-stand-chats-created");
    var visitsStandChart = document.getElementById("chartjs-dashboard-stand-visits-stands");
    //var visitsEventChart = document.getElementById("chartjs-dashboard-stand-visits-event");
    var browserChats = document.getElementById("chartjs-dashboard-browsers");

    var lbl_total_chats = document.getElementById('lbl-total-chats');

    var card_users = document.getElementById("card-users-txt");
    var card_visitors = document.getElementById("card-visitors-txt");
    var card_stands = document.getElementById("card-stands-txt");
    var card_chats = document.getElementById("card-chats-txt");

    var card_avrg_user_time = document.getElementById("card-avrg-usr-time-txt");
    var card_avrg_usr_sessions = document.getElementById("card-avrg-usr-sessions-txt");

    var hour_opc = 'stands';

    //var ini_date = $('#dp_start').val();
    //var end_date = $('#dp_end').val();

    var dp_start;
    var dp_end;


    var newChatsChart;
    //var newVisitsEventChart;
    var newChartvisits;
    var newChartInteractions;
    var newUsersChart;
    var newVisitsStandChart;


    //alert("hola:" + uid);

    $(function () { //initialize

        getCompletitionList();
        updateOnline();
        getCardsValues();
        getStandsList();
        //getAverageUserSessions();
        //handleClientLoad();
    })

    $('#btn-donwload-visits').click(function () {//download csv

        getCsvData('report_visits');

    })


    $('#btn-donwload-chats').click(function () {//download csv

        getCsvData('report_chats');

    })

    updateOnline = (function () {
        $.ajax({

            type: "POST",
            url: "../php/charts.php",
            data: { "param": "update_online", "uid": uid }

        })

        setInterval(

            (function () {

                $.ajax({

                    type: "POST",
                    url: "../php/charts.php",
                    data: { "param": "update_online", "uid": uid }

                })

            }), 30000 // half a minute
        )

    })

    getCsvData = (async (param) => {

        csv = [
            'Stand name',
            'User name',
            'Email',
            'Phone number',
            'City',
            'Interest',
            'Date time'
        ];
        fileData = [];

        await $.ajax({

            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": param,
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                

            success: function (response) {

                for (row in response.data['cont']) {

                    stand = response.data['cont'][row][0]
                    uname = response.data['cont'][row][1]
                    lastname = response.data['cont'][row][2]
                    email = response.data['cont'][row][3]
                    phone = response.data['cont'][row][4]
                    ai = response.data['cont'][row][5]
                    date = response.data['cont'][row][6]
                    city = response.data['cont'][row][7]

                    fileData.push([
                        stand,
                        (uname + " " + lastname),
                        email,
                        phone,
                        city,
                        ai,
                        date
                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = param + '.csv';
                hiddenElement.click();

            }

        })

    })

    $(function () {
        $('#btn-download-report-pdf').click(function () {
            genPDF()
        })
    })

    genPDF = (function () {
        //console.log('.');

        var opc = {
            filename: 'dashboard-report',
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'cm', format: 'a3', orientation: 'landscape' }
        }

        html2pdf().from(document.getElementById('dasboard-content'))
            .set(opc)
            .save();

    })


    getCardsValues = (async () => {


        await $.ajax({    //create an ajax request to chart.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "cards-info",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                //console.log(response);

                card_visitors.innerHTML = (response.data['visitors'].toString()).padStart(3, '0');
                card_users.innerHTML = (response.data['stand_visitors'].toString()).padStart(3, '0');
                //card_chats.innerHTML = (response.data['tot_chats'].toString()).padStart(3, '0');
                card_stands.innerHTML = (response.data['stands'].toString()).padStart(3, '0');
                $('#lbl-total-stands').text((response.data['stands'].toString()));
            }

        });

        setInterval(
            (async () => {

                await $.ajax({    //create an ajax request to chart.php
                    type: "POST",
                    url: "../php/charts.php",
                    data: {
                        "param": "cards-info",
                        "uid": `${uid}`,
                        "ini_date": `${dp_start}`,
                        "end_date": `${dp_end}`,
                    },
                    dataType: "json",   //expect html to be returned                
                    success: function (response) {


                        card_visitors.innerHTML = (response.data['visitors'].toString()).padStart(3, '0');
                        card_users.innerHTML = (response.data['stand_visitors'].toString()).padStart(3, '0');
                        //card_chats.innerHTML = (response.data['tot_chats'].toString()).padStart(3, '0');
                        card_stands.innerHTML = (response.data['stands'].toString()).padStart(3, '0');

                    }

                });

            }), refreshInterval);

    })




    $(function () {//date picker

        var d = new Date();

        var month = d.getMonth() + 1;
        var day = d.getDate();

        var today = new Date(Date.now() + 0 * 24 * 60 * 60 * 1000);

        var weekAgo = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000)

        dtp_start = new Litepicker({
            element: document.getElementById('dp_start'),
            lang: "es-ES",
            format: 'YYYY-MM-DD',
            singleMode: true,
            tooltipText: {
                one: 'día',
                other: 'días'
            },
            tooltipNumber: (totalDays) => {
                return totalDays - 1;
            },
            setup: (picker) => {

                picker.on('selected', (date1, date2) => {

                });
            },
        })

        dtp_start.setDateRange((weekAgo));


        dtp_end = new Litepicker({
            element: document.getElementById('dp_end'),
            lang: "es-ES",
            format: 'YYYY-MM-DD',
            singleMode: true,
            tooltipText: {
                one: 'día',
                other: 'días'
            },
            tooltipNumber: (totalDays) => {
                return totalDays - 1;
            },
            setup: (picker) => {

                picker.on('selected', (date1, date2) => {

                });
            },
        })

        dtp_end.setDateRange((today));

        dp_start = $('#dp_start').val();
        dp_end = $('#dp_end').val();

        loadPhpCharts();

        //activateRefresh();
        //diplayChartVisitsStands();

    })


    $('#btn-refresh-charts').click(function () {
        /*toastr["info"](
            `Actualizando tablas...
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>
        `);*/
        loadPhpCharts();
        obtenerDatosVisitasHora();    
        obtenerMediosVisitas();
        obtenerInteracciones();
    })

    loadPhpCharts = (function () {

        dp_start = $('#dp_start').val();
        dp_end = $('#dp_end').val();

        console.log(dp_start);
        console.log(dp_end);

        //diplayChartVisitsStands();
        getDelimitedVisits();
        getTourOnline();

        newChatsChart = new Chart(chatsCreatedChart, {
            type: 'horizontalBar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Chats',
                    data: [],
                    backgroundColor: customColors,
                    borderWidth: 0
                }]
            },
            options: {

                animation: {
                    animateScale: true
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true
                        },

                        stacked: false,

                        ticks: {
                            stepSize: 10,
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        stacked: false,

                        gridLines: {
                            display: true
                        },

                        ticks: {
                            beginAtZero: true
                        },

                    }]
                },
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
            }
        });

        getChatsChartValues(newChatsChart);

    });


    getDelimitedVisits = (async () => {

        await $.ajax({    //create an ajax request to display.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "visits_delimited",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                document.getElementById('lbl-delimited-visits')
                    .innerHTML = '&zwnj; ' + response.data['visitors'];

            }

        });


    })


    getTourOnline = (async () => {

        await $.ajax({    //create an ajax request to display.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "online_tour",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                document.getElementById('lbl-tour-online')
                    .innerHTML = '&zwnj; ' + response.data['users_online'];

            }

        });


    })


    getChatsChartValues = (async (chart) => {

        var names = [];
        var values = [];
        var total = 0;

        await $.ajax({    //create an ajax request to display.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "chats_created",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                //alert(response);

                for (var i in response.data['names']) {
                    names.push(response.data['names'][i]);
                    values.push(response.data['values'][i]);
                    total += response.data['values'][i];
                }

            }

        });

        //card_chats.innerHTML = total;
        lbl_total_chats.innerHTML = total;

        chart.data.labels = names;
        chart.data.datasets[0].data = values;
        chart.update();

    })


     $(function () { //visitas

    obtenerDatosVisitasHora = (function () { 
        hour_opc = 'stands';
        //$('#div-visits-event').css("display", "none");
        //$('#div-visits-stands').css("display", "block");

        newVisitsStandChart = new Chart(visitsStandChart, {
            type: 'line',
            data: {
                labels: [
                    '12am',
                    '1am',
                    '2am',
                    '3am',
                    '4am',
                    '5am',
                    '6am',
                    '7am',
                    '8am',
                    '9am',
                    '10am',
                    '11am',
                    '12pm',
                    '1pm',
                    '2pm',
                    '3pm',
                    '4pm',
                    '5pm',
                    '6pm',
                    '7pm',
                    '8pm',
                    '9pm',
                    '10pm',
                    '11pm',

                ],
                datasets: []
            },
            options: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },

                maintainAspectRatio: true,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        getVisitStandChartValues(newVisitsStandChart);
        //getVisitGeneralChartValues(newVisitsStandChart);

    });
    obtenerDatosVisitasHora();

    });


    getVisitGeneralChartValues = (async (chart) => {

        var values = [];
        var total = 0;

        await $.ajax({    //create an ajax request to chart.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "visitsevent",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                for (i in response.data['h_values']) { // parse to int values 
                    values.push(response.data['h_values'][i]);
                    total += response.data['h_values'][i];
                }

            }

        });

        var newDataset = {
            label: 'Evento',
            data: values,
            backgroundColor: "#CACFD2" + '33',
            borderColor: "#CACFD2",
            borderWidth: 2,
        }

        chart.data.datasets.push(newDataset);
        chart.update();
        //document.getElementById('tlt_tot_visitas').innerHTML = 'Visitas a evento';
        document.getElementById('lbl_tot_visitas').innerHTML = total;


    });


    getVisitStandChartValues = (async (chart) => {

        var names = [];
        var values = [];
        var total = 0;

        var valuesGen = [];
        var totalGen = 0;

        await $.ajax({    //create an ajax request to chart.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "visitsperstand",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
                "standsSeleccionados": `${numerosStands}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                //console.log(response);

                for (i in response.data['h_values']) {
                    var valholder = [];
                    names.push(response.data['names'][i]);

                    for (j in response.data['h_values'][i]) { // parse to int values 
                        valholder.push(response.data['h_values'][i][j]);
                        total += response.data['h_values'][i][j];
                    }

                    values.push(valholder);
                }

            }

        });


        await $.ajax({    //create an ajax request to chart.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "visitsevent",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                for (i in response.data['h_values']) { // parse to int values 
                    valuesGen.push(response.data['h_values'][i]);
                    totalGen += response.data['h_values'][i];
                }

            }

        });

        for (i in names) {

            bgcolor = customColors[i] + '33'; // 33 = 20% transparencia en Hex
            linecolor = customColors[i];

            if (i > customColors.length - 1) {

                var nc = i % (customColors.length - 1);
                //console.log(nc);
                bgcolor = customColors[nc] + '33'; // 33 = 20% transparencia en Hex
                linecolor = customColors[nc];
            }

            var newDataset = {
                label: names[i],
                data: values[i],
                backgroundColor: bgcolor,
                borderColor: linecolor,
                borderWidth: 2,
            }
            chart.data.datasets.push(newDataset);

        }

        newDatasetGen = {
            label: 'Evento',
            data: valuesGen,
            backgroundColor: "#CACFD2" + '33',
            borderColor: "#CACFD2",
            borderWidth: 2,
        }


        chart.data.datasets.push(newDatasetGen);

        chart.update();
        document.getElementById('tlt_tot_visitas').innerHTML = 'Visitas a stands';
        document.getElementById('lbl_tot_visitas').innerHTML = total;
        document.getElementById('lbl-stands-delimited-visits').innerHTML = total;
        document.getElementById('value-visits').data = total;

        setKnobValues(parseInt(total));

    });




    $(function () {//visitas por x medio

    obtenerMediosVisitas = (function () { 



        //-------------------------------sdasdf
        newChartvisits = new Chart(document.getElementById("chartjs-dashboard-pie-stand-visits"), {
            type: 'horizontalBar',
            data: {

                labels: [],
                datasets: [{
                    label: "Por ícono",
                    backgroundColor: '#ff6384',
                    /*borderColor: '#ff6384',
                    hoverBackgroundColor: '#ff6384',
                    hoverBorderColor: '#ff6384',*/
                    data: [],
                    barPercentage: .95,
                    categoryPercentage: .8
                },

                {
                    label: "Por mapa",
                    backgroundColor: '#2E83FF',
                    /* borderColor: '#2E83FF',
                     hoverBackgroundColor: '#2E83FF',
                     hoverBorderColor: '#2E83FF',*/
                    data: [],
                    barPercentage: .80,
                    categoryPercentage: .8
                },
                ]
            },
            options: {

                animation: {
                    animateScale: true
                },

                maintainAspectRatio: false,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },

                scales: {

                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },

                        gridLines: {
                            display: true
                        },
                        stacked: true,

                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        },

                        stacked: true,

                        gridLines: {
                            display: false

                        }
                    }]
                }
            }
        });

        getVisitStandChannelChartValues(newChartvisits);
    });

    obtenerMediosVisitas();
    });


    getVisitStandChannelChartValues = (async (chart) => {

        var names = [];
        var values_map = [];
        var values_hs = [];

        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "visitsperchannel",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
                "standsSeleccionados": `${numerosStands}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {

                //console.log(response);

                for (i in response.data['names']) {

                    names.push(response.data['names'][i]);
                    values_map.push(response.data['values_map'][i]);
                    values_hs.push(response.data['values_hp'][i]);
                }

            }

        });

        chart.data.labels = names;
        chart.data.datasets[0].data = values_hs;
        chart.data.datasets[1].data = values_map;
        chart.update();


    })







    $(function () {//Interacciones
    obtenerInteracciones = (function () { 


        newChartInteractions = new Chart(document.getElementById("chartjs-dashboard-interactions"), {
            type: 'bar',
            data: {

                labels: [],
                datasets: []
            },
            options: {

                plugins: {
                    labels: {
                        fontSize: 12,
                        render: 'percentage',
                        fontColor: '#000',
                    }
                },

                animation: {
                    animateScale: true
                },

                maintainAspectRatio: true,
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true
                        },
                        stacked: true,
                        ticks: {
                            stepSize: 2
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            display: true

                        }
                    }]
                }
            }
        });

        getVisitStandInteractions(newChartInteractions);
    });

    obtenerInteracciones();
    });


    getVisitStandInteractions = (async (chart) => {

        var names = [];
        var v_doc = [];
        var v_gal = [];
        var v_ban = [];
        var v_vid = [];
        var totales = 0;

        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "interactionsperstand",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
                "standsSeleccionados": `${numerosStands}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {

                //console.log(response);

                for (i in response.data['names']) {

                    names.push(response.data['names'][i]);
                    v_doc.push(response.data['doc'][i]);
                    v_vid.push(response.data['vid'][i]);
                    v_gal.push(response.data['gal'][i]);
                    v_ban.push(response.data['ban'][i]);

                    totales += (response.data['doc'][i]);
                    totales += (response.data['vid'][i]);
                    totales += (response.data['gal'][i]);
                    totales += (response.data['ban'][i]);

                }

            }

        });

        chart.data.labels = names;

        /*console.log(names);
        console.log(v_doc);
        console.log(v_vid);
        console.log(v_ban);
        console.log(v_gal);*/

        var newDataset = {
            label: 'Videos',
            data: v_vid,
            backgroundColor: customColors[1],
            borderColor: customColors[1],
            borderWidth: 0,
        }
        chart.data.datasets.push(newDataset);

        var newDataset = {
            label: 'Documentos',
            data: v_doc,
            backgroundColor: customColors[0],
            borderColor: customColors[0],
            borderWidth: 0,
        }
        chart.data.datasets.push(newDataset);

        var newDataset = {
            label: 'Banners',
            data: v_ban,
            backgroundColor: customColors[2],
            borderColor: customColors[2],
            borderWidth: 0,
        }
        chart.data.datasets.push(newDataset);

        var newDataset = {
            label: 'Galerías',
            data: v_ban,
            backgroundColor: customColors[3],
            borderColor: customColors[3],
            borderWidth: 0,
        }
        chart.data.datasets.push(newDataset);



        document.getElementById('lbl-tot-interactions').innerHTML = totales;
        chart.data.labels = names;
        chart.update();



    })


    $(function () { //Tipo de Usuarios
        newUsersChart = new Chart(document.getElementById("chartjs-dashboard-pie-users"), {
            type: 'pie',
            data: {
                labels: ["Organizadores", "Expositores", "Asesores", "Visitantes", "Admins"],
                datasets: [{
                    //data: [1, 2, 3, 4, 8],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        '#239928',
                        '#AA2EFF',
                        '#2E83FF', ,
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: '#ffff',
                        //position: 'outside',
                        arc: true,

                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70,

            }
        });

        getUsers(newUsersChart);
    });

    getUsers = (async (chart) => {

        var values = [];
        var tot = 0;

        console.log("sda");


        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "userlist",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {

                //console.log(response);

                values.push(response.data['org']);
                values.push(response.data['exp']);
                values.push(response.data['adv']);
                values.push(response.data['vst']);
                values.push(response.data['adm']);

                $('#lbl-dash-admin-organizers').text(response.data['org']);
                $('#lbl-dash-admin-exhibitors').text(response.data['exp']);
                $('#lbl-dash-admin-advisers').text(response.data['adv']);
                $('#lbl-dash-admin-visitors').text(response.data['vst']);

            }, error: function (response) {
                console.log(response);
            }

        });

        for (i in values) {
            tot += values[i];
        }

        document.getElementById('lbl-tot-usrs').innerHTML = tot;
        chart.data.datasets[0].data = values;
        chart.update();

    })




    $(function () {
        // donut chart
        charStands = new Chart(document.getElementById("chartjs-dashboard-pie-type-stands"), {
            type: 'doughnut',
            data: {
                labels: ["Full Access", "Corner", "Central"],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        '#239928',
                        '#AA2EFF',
                        '#2E83FF', ,
                    ],
                    borderWidth: 0
                }]
            },


            options: {

                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: 'white',
                        arc: true
                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70
            }
        });

        getStandTypes(charStands);
    });

    getStandTypes = (async (chart) => {

        var values = [];

        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "standtypes",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {

                //console.log(response);

                values.push(response.data['isl']);
                values.push(response.data['lat']);
                values.push(response.data['cen']);

            }, error: function (response) {
                console.log(response);
            }

        });

        chart.data.datasets[0].data = values;
        chart.update();


    })





    setKnobValues = (function (value) {

        $(".progress").each(function () {

            //var value = 50;
            //var value = parseInt( $('#lbl-stands-delimited-visits').val );
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }

    });



    getStandsList = (async () => {

        var id_stand = [];
        var name_stand = [];


        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "get_stands_list",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
                "id_pabellon": `${id_pabellon}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {

                $('#cb-stands-container').empty();

                var cont = 0;
                for (i in response.data) {
                if (cont == 0) {
                        if (setSelectTodoStand.has(`${response.data[i]["codigo_stand"].substring(0, 2)}Btn`)) {
                            $('#cb-stands-container').append(`<div class="col-md-2 col-sm-6 d-flex justify-content-center" style="margin-bottom:16px"> <input checked value = '1' onchange="seleccionarTodos('${response.data[i]["codigo_stand"].substring(0, 2)}')" type='checkbox' id='${response.data[i]["codigo_stand"].substring(0, 2)}Btn'> <label for='${response.data[i]["codigo_stand"].substring(0, 2)}Btn'>Seleccionar todos</label> </div><br><br>`);

                        }else{
                            $('#cb-stands-container').append(`<div class="col-md-2 col-sm-6 d-flex justify-content-center" style="margin-bottom:16px"> <input value = '0' onchange="seleccionarTodos('${response.data[i]["codigo_stand"].substring(0, 2)}')" type='checkbox' id='${response.data[i]["codigo_stand"].substring(0, 2)}Btn'> <label for='${response.data[i]["codigo_stand"].substring(0, 2)}Btn'>Seleccionar todos</label> </div><br><br>`);

                        }
                        cont +=1 ;

                    }

                    if ( setStands.has(`box-stand-${response.data[i]["id_stand"]}`.substring(10))){
                        $('#cb-stands-container').append(`<div class="col-md-2 col-sm-6 d-flex justify-content-center" style="margin-bottom:16px"> <input checked value = '1' onchange="cambiarValorCheck('box-stand-${response.data[i]["id_stand"]}')" type='checkbox' class="${response.data[i]["codigo_stand"].substring(0, 2)}" id='box-stand-${response.data[i]["id_stand"]}'> <label for='box-stand-${response.data[i]["id_stand"]}'>${response.data[i]["codigo_stand"]} : ${response.data[i]["name_stand"]}</label> </div>`);
                    }else{
                        $('#cb-stands-container').append(`<div class="col-md-2 col-sm-6 d-flex justify-content-center" style="margin-bottom:16px"> <input value = '0' onchange="cambiarValorCheck('box-stand-${response.data[i]["id_stand"]}')" type='checkbox' class="${response.data[i]["codigo_stand"].substring(0, 2)}" id='box-stand-${response.data[i]["id_stand"]}'> <label for='box-stand-${response.data[i]["id_stand"]}'>${response.data[i]["codigo_stand"]} : ${response.data[i]["name_stand"]}</label> </div>`);

                    }


                }
                //console.log(id_stand)
                //console.log(name_stand)


            }, error: function (response) {
                console.log(response);
            }

        });

        for (i in values) {
            tot += values[i];
        }

        document.getElementById('lbl-tot-usrs').innerHTML = tot;
        chart.data.datasets[0].data = values;
        chart.update();

    })



    $(function () {
        chartCompletedStands = new Chart(document.getElementById("chartjs-dashboard-completed-stands"), {
            type: 'doughnut',
            data: {
                labels: ["Por completar", "Completada"],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        '#1BE7AA',
                    ],
                    borderWidth: 0
                }]
            },


            options: {

                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: 'white',
                        arc: true
                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70
            }

        })

        getCompletitionList(chartCompletedStands);
    });


    getCompletitionList = (async (chart) => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "get_stands_components",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                chart.data.datasets[0].data = [response.data['notCompleted'], response.data['completed']];
                chart.update();

            }, error: function (response) {
                console.log(response);
            }
        })

    })
//-------------------------------------------------------

//
    getOrganizersReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "getOrganizersReport",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,//FALTA ENVIARLE EL ID DEL EVENTO
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');

                console.log(response.data['rows']);

                csv = [
                    'NOMBRE ORGANIZADOR',
                    'APELLIDO ORGANIZADOR',
                    'TELEFONO ORGANIZADOR',
                    'CORREO ORGANIZADOR',
                ];
                fileData = [];

                for (row in response.data['rows']) {

                    name = response.data['rows'][row][0]
                    last_name = response.data['rows'][row][1]
                    cellphone = response.data['rows'][row][2]
                    email = response.data['rows'][row][3]

                    fileData.push([
                        name,
                        last_name,
                        cellphone,
                        email,
                        status,

                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'OrganizersDocsReport' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })

//getEVisitorsReport
    getExhibitorsReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "getExhibitorsReport",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,//FALTA ENVIARLE EL ID DEL EVENTO
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');

                console.log(response.data['rows']);

                csv = [
                    'NOMBRE EXPOSITOR',
                    'APELLIDO EXPOSITOR',
                    'CORREO EXPOSITOR',
                    'TELEFONO EXPOSITOR',
                    'ESTATUS',
                ];
                fileData = [];

                for (row in response.data['rows']) {

                    name = response.data['rows'][row][0]
                    last_name = response.data['rows'][row][1]
                    email = response.data['rows'][row][2]
                    telefono = response.data['rows'][row][3]
                    status = response.data['rows'][row][5]


                    fileData.push([
                        name,
                        last_name,
                        email,
                        telefono,
                        status,

                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'ExhibitorsDocsReport' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })


    getAdvisersReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "getAdvisersReport",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,//FALTA ENVIARLE EL ID DEL EVENTO
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');

                console.log(response.data['rows']);

                csv = [
                    'NOMBRE ASESOR',
                    'APELLIDO ASESOR',
                    'TELEFONO ASESOR',
                    'TELEFONO ASESOR',
                    'EMAIL ASESOR',
                    'ESTATUS DEL ASESOR',
                    'STAND ASIGNADO',
                    'EMAIL EXPOSITOR',
                ];
                fileData = [];

                for (row in response.data['rows']) {

                    name = response.data['rows'][row][0]
                    last_name = response.data['rows'][row][1]
                    cellphone = response.data['rows'][row][2]
                    email = response.data['rows'][row][3]
                    status = response.data['rows'][row][4]
                    stand = response.data['rows'][row][4]
                    email_exp = response.data['rows'][row][4]


                    fileData.push([
                        name,
                        last_name,
                        cellphone,
                        email,
                        status,
                        stand,
                        email_exp,

                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'AdvisersDocsReport' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })


//-------------------------------------------------------
    getCompletitionListReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "personStands",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');

                console.log(response.data['rows']);

                csv = [
                    'NOMBRE STAND',
                    'STATUS STAND',
                    'UBICACION STAND',
                    'TIPO STANDS',
                    'TIPO CONTENIDO',
                    'SUBIDO',
                    'CORREO EXPOSITOR',
                    'NOMBRE EXPOSITOR',
                    'APELLIDO EXPOSITOR',
                ];
                fileData = [];

                for (row in response.data['rows']) {

                    nameStand = response.data['rows'][row][0]
                    status = response.data['rows'][row][1]
                    ubi = response.data['rows'][row][2]
                    type = response.data['rows'][row][3]
                    cont = response.data['rows'][row][4]
                    uploaded = response.data['rows'][row][9]
                    email = response.data['rows'][row][5]
                    firstname = response.data['rows'][row][6]
                    lastname = response.data['rows'][row][7]

                    fileData.push([
                        nameStand,
                        status,
                        ubi,
                        type,
                        cont,
                        uploaded,
                        email,
                        firstname,
                        lastname
                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'standDocsReport' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })


    $(function () {
        chartAsignedStands = new Chart(document.getElementById("chartjs-dashboard-asgined-stands"), {
            type: 'doughnut',
            data: {
                labels: ["Asignados", "En espera", "Reservados", "Libres"],
                datasets: [{
                    data: [],
                    backgroundColor: customColors,
                    borderWidth: 0
                }]
            },


            options: {

                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: 'white',
                        arc: true
                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70
            }

        })

        getAsignatedList(chartAsignedStands);
    });

    getAsignatedList = (async (chart) => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "get_asigned_stands",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                chart.data.datasets[0].data = [
                    response.data['asigned'],
                    response.data['waiting'],
                    response.data['reserved'],
                    response.data['free']
                ];
                chart.update();

            }, error: function (response) {
                console.log(response);
            }
        })

    });
//---------------------------------
    $(function () {
        chartExpositores = new Chart(document.getElementById("dashboard_expositores_grafica"), {
            type: 'doughnut',
            data: {
                labels: ["Confirmado","Sin confirmar"],
                datasets: [{
                    data: [],
                    backgroundColor: customColors,

                    borderWidth: 0
                }]
            },


            options: {

                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: 'white',
                        arc: true
                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70
            }

        })

        getExpositoresData(chartExpositores);
    });


    getExpositoresData = (async (chart) => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "getExpositorGrafica",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                chart.data.datasets[0].data = [response.data['confirmado'],response.data['sinConfirmar']];
                chart.update();

            }, error: function (response) {
                console.log(response);
            }
        })

    })

    $(function () {
        chartAsesores = new Chart(document.getElementById("dashboard_asesores_grafica"), {
            type: 'doughnut',
            data: {
                labels: ["Confirmado","Sin confirmar"],
                datasets: [{
                    data: [],
                    backgroundColor: customColors,

                    borderWidth: 0
                }]
            },


            options: {

                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: 'white',
                        arc: true
                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70
            }

        })

        getAsesoresData(chartAsesores);
    });


    getAsesoresData = (async (chart) => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "getAsesorGrafica",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                chart.data.datasets[0].data = [response.data['confirmado'],response.data['sinConfirmar']];
                chart.update();

            }, error: function (response) {
                console.log(response);
            }
        })

    })

//---------------------------

    $(function () {
        chartLobbyDocs = new Chart(document.getElementById("chartjs-dashboard-lobby-docs"), {
            type: 'doughnut',
            data: {
                labels: ["Por Subir", "Subido"],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        '#1BE7AA',
                    ],
                    borderWidth: 0
                }]
            },


            options: {

                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: 'white',
                        arc: true
                    }
                },

                animation: {
                    animateScale: true
                },

                responsive: true,
                maintainAspectRatio: true,

                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 70
            }

        })

        getLobbyDocList(chartLobbyDocs);
    });


    getLobbyDocList = (async (chart) => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "get_lobby_documentation",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                chart.data.datasets[0].data = [response.data['pendant'], response.data['uploaded']];
                chart.update();

            }, error: function (response) {
                console.log(response);
            }
        })

    })


    $(function () {
        chartDocsPabellones = new Chart(document.getElementById("chartjs-dashboard-pabs-docs"), {
            type: 'bar',
            data: {

                labels: [],
                datasets: []
            },
            options: {

                plugins: {
                    labels: {
                        fontSize: 12,
                        render: 'value',
                        //fontColor: '#000',
                    }
                },

                animation: {
                    animateScale: true
                },

                maintainAspectRatio: true,
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true
                        },
                        //stacked: true,
                        ticks: {
                            //stepSize: 2
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        //stacked: true,
                        gridLines: {
                            display: true

                        }
                    }]
                }
            }
        });

        getPabsDocs(chartDocsPabellones);

    });


    getPabsDocs = (async (chart) => {

        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "get_pabs_documentation",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                let varxxx = [ "P. Internacional", "P. Nacional" ];
                chart.data.labels = varxxx;

                var necesarios = {
                    label: 'Necesarios',
                    //data: response.data['PI'],
                    data: ["27", "35", "35"],
                    backgroundColor: customColors[1],
                    borderColor: customColors[1],
                    borderWidth: 0,
                }
                chart.data.datasets.push(necesarios);
        
                var subidos = {
                    label: 'Subidos',
                    data: [ response.data['PI'], response.data['PN'], response.data['PA'] ] ,
                    //data: ["17", "15", "15"],
                    backgroundColor: customColors[0],
                    borderColor: customColors[0],
                    borderWidth: 0,
                }
                chart.data.datasets.push(subidos);
        
    
                chart.update();
            }

        });

    });


    $(function () {
        chartDocsAuditorios = new Chart(document.getElementById("chartjs-dashboard-aud-docs"), {
            type: 'bar',
            data: {

                labels: [],
                datasets: []
            },
            options: {

                plugins: {
                    labels: {
                        fontSize: 12,
                        render: 'value',
                        //fontColor: '#000',
                    }
                },

                animation: {
                    animateScale: true
                },

                maintainAspectRatio: true,
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true
                        },
                        //stacked: true,
                        ticks: {
                            //stepSize: 2
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        //stacked: true,
                        gridLines: {
                            display: true

                        }
                    }]
                }
            }
        });

        getAudDocs(chartDocsAuditorios);

    });


    getAudDocs = (async (chart) => {

        await $.ajax({    //create an ajax request to ../php/charts.php
            type: "POST",
            url: "../php/charts.php",
            data: {
                "param": "get_auds_documentation",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log(response);
                chart.data.labels = [ "Auditorio A", "Auditorio B"  ];

                var necesarios = {
                    label: 'Necesarios',
                    //data: response.data['PI'],
                    data: ["78", "78"],
                    backgroundColor: customColors[1],
                    borderColor: customColors[1],
                    borderWidth: 0,
                }
                chart.data.datasets.push(necesarios);
        
                var subidos = {
                    label: 'Subidos',
                    data: [ response.data['AA'], response.data['AB'] ],
                    //data: ["10", "15"],
                    backgroundColor: customColors[0],
                    borderColor: customColors[0],
                    borderWidth: 0,
                }
                chart.data.datasets.push(subidos);
        
    
                chart.update();
            }

        });

    });


    getAsignedStandsReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "get_stands_components_report",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');

                console.log(response.data['rows']);

                csv = [
                    'TIPO',
                    'STATUS',
                    'NOMBRE COMERCIAL',
                    'UBICACION',
                    'CONTENIDOS',
                    'NOMBRE EXPOSITOR',
                    'APELLIDO EXPOSITOR',
                    'CORREO EXPOSITOR',
                ];
                fileData = [];

                for (row in response.data['rows']) {

                    type = response.data['rows'][row][0]
                    status = response.data['rows'][row][1]
                    nameStand = response.data['rows'][row][2]
                    code = response.data['rows'][row][3]
                    nContenidos = response.data['rows'][row][9]
                    firstname = response.data['rows'][row][4]
                    lastname = response.data['rows'][row][5]
                    email = response.data['rows'][row][6]
               

                    fileData.push([
                        type,
                        status,
                        nameStand,
                        code,
                        nContenidos,    
                        firstname,
                        lastname,
                        email
                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'AsignedStandsReport' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })

    getLobbyCompletitionReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "get_lobby_docs_report",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');

                console.log(response.data['rows']);

                csv = [
                    'TIPO',
                    'ETIQUETA',
                    'DIMENSIONES MAX',
                    'FORMATO',
                    'SUBIDO',
                ];
                fileData = [];

                for (row in response.data['rows']) {

                    type = response.data['rows'][row][0]
                    label = response.data['rows'][row][1]
                    dimensions = response.data['rows'][row][2]
                    format = response.data['rows'][row][3]
                    upploaded = response.data['rows'][row][4]
         
                    fileData.push([
                        type,
                        label,
                        dimensions,
                        format,
                        upploaded   
                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'LobbyDocsReport' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })

    getPabsDocsReport = (async () => {

        await $.ajax({
            type: 'POST',
            url: "../php/charts.php",
            data: {
                "param": "get_pabs_docs_report",
                "uid": `${uid}`,
                "ini_date": `${dp_start}`,
                "end_date": `${dp_end}`,
            },
            dataType: "json",   //expect html to be returned

            success: function (response) {
                //console.log('report');
                var pab = "";


                csv = [
                    'PABELLON',
                    'NOMBRE PUBLICIDAD',
                    'TIPO',
                    'DIMENSIONES MAX',
                    'FORMATO',
                    'SUBIDO',
                ];
                fileData = [];

                for (row in response.data['rows']) {
                    
                    if( response.data['rows'][row][0].toString().substring(0, 2)  == "PI"  ){
                        pab = "PABELLON INTERNACIONAL";
                    }else if( response.data['rows'][row][0].toString().substring(0, 2)  == "PA" ){
                        pab = "PABELLON ALTERNATIVO";
                    }else if( response.data['rows'][row][0].toString().substring(0, 2)  == "PN" ){
                        pab = "PABELLON NACIONAL";
                    }

                    nameP = response.data['rows'][row][0]
                    type = response.data['rows'][row][1]
                    dimensions = response.data['rows'][row][2]
                    format = response.data['rows'][row][3]
                    upploaded = response.data['rows'][row][4]
         
                    fileData.push([
                        pab,
                        nameP,
                        type,
                        dimensions,
                        format,
                        upploaded   
                    ])
                }

                fileData.forEach(row => {

                    csv += "\n" + row.join(',');

                });


                let csvData = new Blob([csv], { type: 'text/csv' });
                let csvUrl = URL.createObjectURL(csvData);

                let hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded
                hiddenElement.download = 'Documentos Pabellones' + '.csv';
                hiddenElement.click();

            }, error: function (response) {
                console.log(response);
            }
        })

    })
//--------------------------------------------------------

$('#downloadOrganizersInfoID').click(function () {

    getOrganizersReport();

})
$('#downloadExhibitorsInfoID').click(function () {

    getExhibitorsReport();

})
$('#downloadAdvisersInfoID').click(function () {

    getAdvisersReport();

})
$('#downloadVisitorsInfoID').click(function () {

    getEVisitorsReport();

})


//--------------------------------------------------------
    $('#btn_complete_stands_report').click(function () {
        getCompletitionListReport();
    });


    $('#btn_complete_lobby_report').click(function () {
        getLobbyCompletitionReport();
    });


    $('#btn_asigned_stands_report').click(function () {
        getAsignedStandsReport();
    });
    

    $('#btn_complete_pabs_report').click(function () {
        getPabsDocsReport();
    });


    $('#btn-dashboard-filters-calendar').click(function () {
        $('#dash-filters-container-calendar').collapse('toggle')

    });


    $('#btn-dashboard-filters-stands').click(function () {
        $('#dash-filters-container-stands').collapse('toggle')

    });


    $('#btn-dash-graphs-admin').click(function () {
        swapDashboard(this);
    })

    $('#btn-dash-graphs-event').click(function () {
        swapDashboard(this);
    })

    $('#btn-dash-graphs-passport').click(function () {
        swapDashboard(this);

    })



    $('#container_dashboard_event').collapse('show')

    swapDashboard = (function (btnDash) {
        $('#btn-dash-graphs-admin').removeClass('btn-dashboard-selected')
        $('#btn-dash-graphs-event').removeClass('btn-dashboard-selected')
        $('#btn-dash-graphs-passport').removeClass('btn-dashboard-selected')

        $(btnDash).addClass('btn-dashboard-selected');
    })


    $('#btn-dash-graphs-admin').click(function () {
        $('#container_dashboard_event').collapse('hide')
        $('#container_dashboard_admin').collapse('show')
    });

    $('#btn-dash-graphs-event').click(function () {
        $('#container_dashboard_admin').collapse('hide')
        $('#container_dashboard_event').collapse('show')

    });

    $('#btn-dash-graphs-passport').click(function () {
        $('#container_dashboard_event').collapse('hide')
        $('#container_dashboard_admin').collapse('hide')
        alert("sss");
        $('#container_dashboard_passport').collapse('show')


    });

});




