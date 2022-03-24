var customColors = [
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

$(document).ready(function () {

    //var uid = 1;

    var refreshInterval = 3000;

    var chatsCreatedChart = document.getElementById("chartjs-dashboard-stand-chats-created");
    var visitsStandChart = document.getElementById("chartjs-dashboard-stand-visits-stands");
    //var visitsEventChart = document.getElementById("chartjs-dashboard-stand-visits-event");
    var browserChats = document.getElementById("chartjs-dashboard-browsers");

    var lbl_total_chats = document.getElementById('lbl-total-chats');

    var card_users = document.getElementById("card-users-txt");
    var card_visitors = document.getElementById("card-visitors-txt");
    //var card_stands = document.getElementById("card-stands-txt");
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
  
        updateOnline();
        getCardsValues();

        //getAverageUserSessions();
        //handleClientLoad();
    })

    $('#btn-donwload-visits').click(function () {//download csv

        getCsvData('report_visits');

    })


    $('#btn-donwload-chats').click(function () {//download csv

        getCsvData('report_chats');

    })

    updateOnline = (function(){
        $.ajax({

            type: "POST",
            url: "../php/charts.php",
            data: { "param": "update_online", "uid": uid }

        })

        setInterval(

            (function(){

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

                card_visitors.innerHTML = response.data['visitors'];
                card_users.innerHTML = response.data['stand_visitors'];
                card_chats.innerHTML = response.data['tot_chats'];
                //card_stands.innerHTML = response.data['stands'];
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


                        card_visitors.innerHTML = response.data['visitors'];
                        card_users.innerHTML = response.data['stand_visitors'];
                        card_chats.innerHTML = response.data['tot_chats'];
                        //card_stands.innerHTML = response.data['stands'];

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

        activateRefresh();
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
    })

    loadPhpCharts = (function () {

        dp_start = $('#dp_start').val();
        dp_end = $('#dp_end').val();

        console.log(dp_start);
        console.log(dp_end);

        //diplayChartVisitsStands();
        getDelimitedVisits();

        newChatsChart = new Chart(chatsCreatedChart, {
            type: 'horizontalBar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Chats',
                    data: [],
                    backgroundColor: customColors,
                    borderWidth: 1
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
                    .innerHTML = response.data['visitors'];

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
            backgroundColor: "#000" + '33',
            borderColor: "#CACFD2",
            borderWidth: 2,
        }

        chart.data.datasets.push(newDataset);
        chart.update();
        document.getElementById('tlt_tot_visitas').innerHTML = 'Visitas a evento';
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
        document.getElementById('value-visits').data = total ;
        
        setKnobValues( parseInt( total ) );

    });


    $(function () {//visitas por x medio
        newChartvisits = new Chart(document.getElementById("chartjs-dashboard-pie-stand-visits"), {
            type: 'horizontalBar',
            data: {

                labels: [],
                datasets: [{
                    label: "Por ícono",
                    backgroundColor: '#ff6384',
                    borderColor: '#ff6384',
                    hoverBackgroundColor: '#ff6384',
                    hoverBorderColor: '#ff6384',
                    data: [],
                    barPercentage: .95,
                    categoryPercentage: .8
                },

                {
                    label: "Por mapa",
                    backgroundColor: '#2E83FF',
                    borderColor: '#2E83FF',
                    hoverBackgroundColor: '#2E83FF',
                    hoverBorderColor: '#2E83FF',
                    data: [],
                    barPercentage: .95,
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
                        stacked: false,

                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        },

                        stacked: false,

                        gridLines: {
                            display: true

                        }
                    }]
                }
            }
        });

        getVisitStandChannelChartValues(newChartvisits);

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
                labels: ["Organizadores", "Expositores", "Ponentes", "Asesores", "Visitantes", "Admins"],
                datasets: [{
                    //data: [1, 2, 3, 4, 8],
                    backgroundColor: customColors,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    labels: {
                        render: 'percentage',
                        fontColor: '#000',
                        position: 'outside',
                        arc: true,

                    }
                },

                animation: {
                    animateScale: true
                },
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                    },
                },
                cutoutPercentage: 0,

            }
        });

        getUsers(newUsersChart);
    });

    getUsers = (async (chart) => {

        var values = [];
        var tot = 0;

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

                values.push(response.data['org']);
                values.push(response.data['exp']);
                values.push(response.data['spe']);
                values.push(response.data['adv']);
                values.push(response.data['vst']);
                values.push(response.data['adm']);

            }

        });

        for (i in values) {
            tot += values[i];
        }

        document.getElementById('lbl-tot-usrs').innerHTML = tot;
        chart.data.datasets[0].data = values;
        chart.update();

    })





    activateRefresh = (async () => {

        setInterval(

            (async () => {

                console.log("--");

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
                            .innerHTML = response.data['visitors'];

                    }

                });

                //---------------------------------------------

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

                        for (var i in response.data['names']) {
                            names.push(response.data['names'][i]);
                            values.push(response.data['values'][i]);
                            total += response.data['values'][i];
                        }

                    }

                });

                lbl_total_chats.innerHTML = total;
                //card_chats.innerHTML = total;

                //newChatsChart.data.labels = names;
                newChatsChart.data.datasets[0].data = values;
                newChatsChart.update();

                //---------------------------------------------

               

                //---------------------------------------------

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


                for (i in values) { // updates values
                    //console.log(values[i]);
                    newVisitsStandChart.data.datasets[i].data = values[i];
                }

                newVisitsStandChart.data.datasets[newVisitsStandChart.data.datasets.length - 1].data = valuesGen;


                newVisitsStandChart.update();
                document.getElementById('tlt_tot_visitas').innerHTML = 'Visitas a stands';
                document.getElementById('lbl_tot_visitas').innerHTML = total;
                document.getElementById('lbl-stands-delimited-visits').innerHTML = total;
                setKnobValues( parseInt( total ) );


                //---------------------------------------------


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
                    },
                    dataType: "json",   //expect html to be returned

                    success: function (response) {

                        //console.log(response);

                        for (i in response.data['names']) { 

                            values_map.push(response.data['values_map'][i]);
                            values_hs.push(response.data['values_hp'][i]);
                        }

                    }

                });

                newChartvisits.data.datasets[0].data = values_hs;
                newChartvisits.data.datasets[1].data = values_map;
                newChartvisits.update();

                //---------------------------------------------


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

                newChartInteractions.data.labels = names;

                newChartInteractions.data.datasets[0].data = (v_vid);
                newChartInteractions.data.datasets[1].data = (v_doc);
                newChartInteractions.data.datasets[2].data = (v_ban);
                newChartInteractions.data.datasets[3].data = (v_gal);


                document.getElementById('lbl-tot-interactions').innerHTML = totales;
                newChartInteractions.update();



            }), refreshInterval
        )

    })

        setKnobValues = (function(value) {

        $(".progress").each(function() {
      
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
      


});




