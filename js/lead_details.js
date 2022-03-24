$(document).ready(function () {

    var recordOpc = {
        kind: "",
        id: ""
    }

    $('#inputAccordionBirthday').focus(function(e){
        //console.log('.')
        e.preventDefault();
        $.dateSelect.show({
            element: 'input[name="inputAccordionBirthday"]'
        });
    });


    $('#inputSiblingBirthday').focus(function(e){
        
        e.preventDefault();
        $.dateSelect.show({
            element: 'input[name="inputSiblingBirthday"]'
        });
    });


    $('#inputContactBirthday').focus(function(e){
        
        e.preventDefault();
        $.dateSelect.show({
            element: 'input[name="inputContactBirthday"]'
        });
    });


    $('#inputRecommendationBirthday').focus(function(e){
        
        e.preventDefault();
        $.dateSelect.show({
            element: 'input[name="inputRecommendationBirthday"]'
        });
    });

    /*var dp_complementary = new Litepicker({
        element: document.getElementById('inputAccordionBirthday'),
        
    });

    var dp_sibling = new Litepicker({
        element: document.getElementById('inputSiblingBirthday'),
        singleMode: true,
        tooltipText: {
            one: 'day',
            other: 'days'
        },
        tooltipNumber: (totalDays) => {
            return totalDays - 1;
        }
    });

    var dp_contact = new Litepicker({
        element: document.getElementById('inputContactBirthday'),
        singleMode: true,
        tooltipText: {
            one: 'day',
            other: 'days'
        },
        tooltipNumber: (totalDays) => {
            return totalDays - 1;
        }
    });

    var dp_recomendation = new Litepicker({
        element: document.getElementById('inputRecommendationBirthday'),
        singleMode: true,
        tooltipText: {
            one: 'day',
            other: 'days'
        },
        tooltipNumber: (totalDays) => {
            return totalDays - 1;
        }
    });*/

    $('#btn_back_to_leads').click(function () {
        $('#page_content').load('leads.php');
    })

    $('#btn_reload_details').click(function () {
        console.log('reloading...')
        $('#page_content').load(`lead_details.php?`);
    })

    getLeadCardValues = (async () => {

        console.log(id_customer);

        await $.ajax({    //create an ajax request to chart.php

            type: "POST",
            url: "../php/lead_details_c.php",
            data: {
                "param": "card_data",
                "id_customer": id_customer,
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {

                //----CARD
                $('#ld_title_firstname').html(response.data['firstname'])
                $('#ld_title_lastname').html(response.data['lastname'])

                $('#ld_card_firstname').html(response.data['firstname'])
                $('#ld_card_lastname').html(response.data['lastname'])
                $('#ld_card_email').html(response.data['email'])
                $('#ld_card_country').html(response.data['usrCountry'])
                $('#ld_card_cellphone').html(`(${response.data['dial']})  ${response.data['cellphone']}`)
                $('#ld_card_status').html(response.data['lead_status'])
                $('#ld_card_score').html(response.data['score'].padStart(2, '0'))

                $('#ld_card_status').addClass(`${response.data['lead_status']}`);

                $('#lbl_superior_card_leadstatus').html(response.data['lead_status']);
                $('#card_superior_leadstatus').addClass(`l-bg-${response.data['lead_status']}`);

                $('#lbl_superior_card_score').html(response.data['score'].padStart(2, '0'));
                
                //---END OF CARD

                //ACCORDION
                $('#inputAccordionFirstname').val(response.data['firstname'])
                $('#inputAccordionLastname').val(response.data['lastname'])

                $('#inputAccordionEmail').val(response.data['email'])
                $('#inputAccordionDial').val(response.data['dial'])
                $('#inputAccordionCellphone').val(response.data['cellphone'])

                $('#inputAccordionBirthday').val(response.data['birthday'])
                $('#inputAccordionGender').val(response.data['gender'])

                //---ADRESS
                if (response.data['foreinger'] == 1) {
                    //console.log('checked')
                    document.getElementById('gridCheckForeigner').checked = true;
                    //$('#gridCheckForeigner').checked(true);
                }

                $('#inputAccordionUsrCountryComplementary').val(response.data['usrCountry'])
                $('#inputAccordionZip').val(response.data['zip_code'])
                $('#inputAccordionCity').val(response.data['city'])
                $('#inputAccordionState').val(response.data['state'])
                $('#inputAccordionSettlement').val(response.data['settlement'])
                $('#inputAccordionColony').val(response.data['colony'])
                $('#inputAccordionStreet').val(response.data['name_street'])
                $('#inputAccordionExt').val(response.data['num_ext'])
                $('#inputAccordionInt').val(response.data['num_int'])

                if (response.data['usrCountry'] == 'MEXICO') {
                    $('#inputAccordionCity').prop("readonly", true)
                    $('#inputAccordionState').prop("readonly", true)
                    $('#inputAccordionSettlement').prop("readonly", true)
                    $('#inputAccordionColony').prop("readonly", true)
                } else {
                    $('#inputAccordionCity').prop("readonly", false)
                    $('#inputAccordionState').prop("readonly", false)
                    $('#inputAccordionSettlement').prop("readonly", false)
                    $('#inputAccordionColony').prop("readonly", false)
                }

                //----PROGRAM
                $('#inputAccordionProgram').val(response.data['program_interest'])
                $('#inputAccordionCountryInterest').val(response.data['country_interest'])
                $('#inputAccordionStart').val(response.data['tentative_date'])
                $('#inputAccordionPaid').val(response.data['paid_mode'])
                $('#inputAccordionBudget').val(response.data['budget'])
                $('#inputAccordionLanLevel').val(response.data['lang_level'])

                //----PROGRAM (MORE DETAILS)
                $('#inputAccordionProgramKind').val(response.data['program_kind'])
                $('#inputAccordionAreaInterest').val(response.data['interest_area'])
                $('#inputAccordionMotherLanguage').val(response.data['mother_lang'])
                $('#inputAccordionProgramLanguage').val(response.data['interest_lang'])
                $('#inputAccordionProgramLenght').val(response.data['program_lenght'])

                //----SOURCE
                $('#inputAccordionSource').val(response.data['source'])
                $('#inputAccordionSpecificSource').val(response.data['specific_source'])

                //END OF ACCORDION
            }
        });

    })


    $("#form_mandatory").on("submit", function (event) {

        event.preventDefault();
        //console.log( $( this ).serialize() + ("&id_customer=" + id_customer) + ("&param=save_mandatory") );
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=save_mandatory"),

            success: function (data) {
                //console.log(data);
                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong :c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        })

    });


    $("#form_complementary").on("submit", function (event) {

        //console.log( $( this ).serialize() + ("&id_customer=" + id_customer) + ("&param=save_mandatory") );

        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=save_complementary"),

            success: function (data) {
                //console.log(data);

                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong :c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            }
        })

    });

    $("#form_adress").on("submit", function (event) {

        event.preventDefault();
        //console.log( $(this).serialize() )
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=save_adress"),

            success: function (data) {
                console.log(data);

                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong :c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            }
        })

    });


    $("#form_sibling").on("submit", function (event) {

        event.preventDefault();
        //console.log( $(this).serialize() )
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=add_sibling"),

            success: function (data) {
                console.log(data);

                Swal.fire({
                    title: 'Success!',
                    text: 'Record created successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

                listSiblings();
                listContacts();
                listRecommendations();

            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong :c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            }
        })

    });

    $("#form_contact").on("submit", function (event) {

        event.preventDefault();
        //console.log( $(this).serialize() )
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=add_contact"),

            success: function (data) {
                console.log(data);

                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

                listSiblings();
                listContacts();
                listRecommendations();

            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong :c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            }
        })

    });

    $("#form_recommendations").on("submit", function (event) {

        event.preventDefault();
        //console.log( $(this).serialize() )
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=add_recommendation"),

            success: function (data) {
                console.log(data);

                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

                listSiblings();
                listContacts();
                listRecommendations();

            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong :c',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

            }
        })

    });

    getCountries = (async () => {

        await $.ajax({    //create an ajax request to chart.php

            type: "POST",
            url: "../php/lead_details_c.php",
            data: {
                "param": "get_country_list"
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {
                var len = response.data.length;
                //$('inputAccordionCountry').empty();

                for (var i = 0; i < len; i++) {
                    //console.log(response.data[i]['ISO4217_Currency_Country_Name']);
                    $('#inputAccordionUsrCountryComplementary').append(`<option>${response.data[i]['ISO4217_Currency_Country_Name']}</option>`)
                    $('#inputAccordionUsrCountryContact').append(`<option>${response.data[i]['ISO4217_Currency_Country_Name']}</option>`)
                }

            }
        });

        getLeadCardValues(id_customer);

    })

    getZipData = (async (code) => {
        await $.ajax({    //create an ajax request to chart.php

            type: "POST",
            url: "../php/lead_details_c.php",
            data: {
                "param": "get_zip_data",
                "zip_code": code
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {
                //console.log(response)

                $('#inputAccordionState').val(response.data['estado'])
                $('#inputAccordionCity').val(response.data['ciudad'])
                $('#inputAccordionSettlement').val(response.data['municipio'])
                $('#inputAccordionColony').val(response.data['asentamiento'])
            },
            error: function () {
                $('#inputAccordionState').val("Not found")
                $('#inputAccordionCity').val("Not found")
                $('#inputAccordionSettlement').val("Not found")
                $('#inputAccordionColony').val("Not found")
            }
        });

    })

    getZipDataContact = (async (code) => {
        await $.ajax({    //create an ajax request to chart.php

            type: "POST",
            url: "../php/lead_details_c.php",
            data: {
                "param": "get_zip_data",
                "zip_code": code
            },
            dataType: "json",   //expect html to be returned                
            success: function (response) {
                //console.log(response)

                $('#inputAccordionStateContact').val(response.data['estado'])
                $('#inputAccordionCityContact').val(response.data['ciudad'])
                $('#inputAccordionSettlementContact').val(response.data['municipio'])
                $('#inputAccordionColonyContact').val(response.data['asentamiento'])
            },
            error: function () {
                $('#inputAccordionStateContact').val("Not found")
                $('#inputAccordionCityContact').val("Not found")
                $('#inputAccordionSettlementContact').val("Not found")
                $('#inputAccordionColonyContact').val("Not found")
            }
        });

    })


    $('#inputAccordionUsrCountryComplementary').on('change', function () {
        //alert( this.value );
        if (this.value == 'MEXICO') {
            //alert(this.value);
            $('#inputAccordionCity').prop("readonly", true)
            $('#inputAccordionState').prop("readonly", true)
            $('#inputAccordionSettlement').prop("readonly", true)
            $('#inputAccordionColony').prop("readonly", true)

        } else {
            $('#inputAccordionCity').prop("readonly", false)
            $('#inputAccordionState').prop("readonly", false)
            $('#inputAccordionSettlement').prop("readonly", false)
            $('#inputAccordionColony').prop("readonly", false)
        }

    });

    $('#inputAccordionUsrCountryContact').on('change', function () {
        //alert( this.value );
        if (this.value == 'MEXICO') {
            //alert(this.value);
            $('#inputAccordionCityContact').prop("readonly", true)
            $('#inputAccordionStateContact').prop("readonly", true)
            $('#inputAccordionSettlementContact').prop("readonly", true)
            $('#inputAccordionColonyContact').prop("readonly", true)
        } else {
            $('#inputAccordionCityContact').prop("readonly", false)
            $('#inputAccordionStateContact').prop("readonly", false)
            $('#inputAccordionSettlementContact').prop("readonly", false)
            $('#inputAccordionColonyContact').prop("readonly", false)

        }
    });

    $('#inputAccordionZip').on('change', function () {
        //alert( this.value );
        if ($('#inputAccordionUsrCountryComplementary').val() == 'MEXICO' && $('#inputAccordionZip').val().length == 5) {
            getZipData($('#inputAccordionZip').val())

        } else {
            console.log($('#inputAccordionZip').val().length)
            console.log($('#inputAccordionUsrCountryComplementary').val())

        }
    });


    $('#inputAccordionZipContact').on('change', function () {
        //alert( this.value );
        if ($('#inputAccordionUsrCountryContact').val() == 'MEXICO' && $('#inputAccordionZipContact').val().length == 5) {
            getZipDataContact($('#inputAccordionZipContact').val())

        } else {
            console.log($('#inputAccordionZipContact').val().length)
            console.log($('#inputAccordionUsrCountryContact').val())

        }
    });


    $('#inputAccordionZipContact').on('change', function () {
        //alert( this.value );
        if ($('#inputAccordionUsrCountryContact').val() == 'MEXICO' && $('#inputAccordionZipContact').val().length == 5) {
            getZipData($('#inputAccordionZipContact').val())

        } else {
            console.log($('#inputAccordionZipContact/').val().length)
            console.log($('#inputAccordionUsrCountryContact').val())
        }
    });

    $('#btn_modal_siblings').click(function () {
        $('#modal_siblings').modal('show');
    })

    $('#btn_modal_contact').click(function () {
        $('#modal_contact').modal('show');
    })

    $('#btn_modal_recommendation').click(function () {
        $('#modal_recommendations').modal('show');
    })


    var listSiblings = function () {
        var table = $('#siblings_table').DataTable({
            paging: false,
            info: false,
            dom: 'lrtip',
            "destroy": true,
            "ajax": {
                "method": "POST",
                "url": "../php/leads_list.php",
                "data": {
                    "param": "siblings",
                    "id_customer": id_customer,
                }
            },
            "columns": [
                { "data": "sibling_firstname" },
                { "data": "sibling_lastname" },
                { "data": "sibling_birthday" },
                { "data": "sibling_gender" },
                { "defaultContent": "<div class='d-flex justify-content-center' > <button class='btn btn-primary edit-lean' style='margin:2px'><i class='fa fa-eye nav_logo-icon'></i></button>  <button class='btn btn-danger delete-lean' style='margin:2px'><i class='bx bx-trash-alt nav_logo-icon'></i></button> </div>" }
            ]
        });
        obtain_lead_data_sibling("#siblings_table tbody", table);
        delete_lead_data_sibling("#siblings_table tbody", table);
    }

    var listContacts = function () {
        var table = $('#contacts_table').DataTable({
            paging: false,
            info: false,
            dom: 'lrtip',
            "destroy": true,
            "ajax": {
                "method": "POST",
                "url": "../php/leads_list.php",
                "data": {
                    "param": "contacts",
                    "id_customer": id_customer,
                }
            },
            "columns": [
                { "data": "contact_firstname" },
                { "data": "contact_lastname" },
                { "data": "contact_email" },
                { "data": "contact_cellphone" },
                { "defaultContent": "<div class='d-flex justify-content-center' > <button class='btn btn-primary edit-lean' style='margin:2px'><i class='fa fa-eye nav_logo-icon'></i></button>  <button class='btn btn-danger delete-lean' style='margin:2px'><i class='bx bx-trash-alt nav_logo-icon'></i></button> </div>" }
            ]

        });
        obtain_lead_data_contact("#contacts_table tbody", table);
        delete_lead_data_contact("#contacts_table tbody", table);
    }

    var listRecommendations = function () {
        var table = $('#recommendations_table').DataTable({
            paging: false,
            info: false,
            dom: 'lrtip',
            "destroy": true,
            "ajax": {
                "method": "POST",
                "url": "../php/leads_list.php",
                "data": {
                    "param": "recommendations",
                    "id_customer": id_customer,
                }
            },
            "columns": [
                { "data": "recommendation_firstname" },
                { "data": "recommendation_lastname" },
                { "data": "recommendation_email" },
                { "data": "recommendation_cellphone" },
                { "data": "recommendation_birthday" },
                { "defaultContent": "<div class='d-flex justify-content-center' > <button class='btn btn-primary edit-lean' style='margin:2px'><i class='fa fa-eye nav_logo-icon'></i></button>  <button class='btn btn-danger delete-lean' style='margin:2px'><i class='bx bx-trash-alt nav_logo-icon'></i></button> </div>" }
            ]

        });

        obtain_lead_data_recommendation("#recommendations_table tbody", table);
        delete_lead_data_recommendation("#recommendations_table tbody", table);
    }

    var obtain_lead_data_sibling = function (tbody, table) {

        $(tbody).on("click", "button.edit-lean", function () {
            var data = table.row($(this).parents("tr")).data();
            //console.log(data);

        })
    };

    var obtain_lead_data_contact = function (tbody, table) {

        $(tbody).on("click", "button.edit-lean", function () {
            var data = table.row($(this).parents("tr")).data();

            //$('#page_content').load(`lead_details.php?customer=${id_customer}`);
        })
    };

    var obtain_lead_data_recommendation = function (tbody, table) {

        $(tbody).on("click", "button.edit-lean", function () {
            var data = table.row($(this).parents("tr")).data();

            //$('#page_content').load(`lead_details.php?customer=${id_customer}`);
        })
    };





    var delete_lead_data_sibling = function (tbody, table) {
        $(tbody).on("click", "button.delete-lean", function () {
            var data = table.row($(this).parents("tr")).data();
            recordOpc = {
                kind: "siblings",
                id: data["id_sibling"]
            }
            showDeleteModal();
        })
    };

    var delete_lead_data_contact = function (tbody, table) {
        $(tbody).on("click", "button.delete-lean", function () {
            var data = table.row($(this).parents("tr")).data();
            recordOpc = {
                kind: "contacts",
                id: data["id_contacts"]
            }
            showDeleteModal();
        })
    };

    var delete_lead_data_recommendation = function (tbody, table) {
        $(tbody).on("click", "button.delete-lean", function () {
            var data = table.row($(this).parents("tr")).data();
            recordOpc = {
                kind: "recommendations",
                id: data["id_recommendation"]
            }
            showDeleteModal();
        })
    };




    var showDeleteModal = (function () {
        $('#modal_details_delete').modal('show');
        //console.log(id_sibling);
    })

    $('#btn_accept_delete').click(function () {
        /*console.log(recordOpc.kind)
        console.log(recordOpc.id)*/
        deleteRecord_details();
    })

    var deleteRecord_details = (async () => {

        await $.ajax({    //create an ajax request to chart.php

            type: "POST",
            url: "../php/lead_details_c.php",
            data: {
                "param": "delete_record",
                "kind": recordOpc.kind,
                "id": recordOpc.id,
            },


            success: function (response) {
                //console.log(response);
                Swal.fire({
                    title: 'Success!',
                    text: response,
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })

                listSiblings();
                listContacts();
                listRecommendations();
            },
            error: function (response) {
                Swal.fire({
                    title: 'Error!',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })

                listSiblings();
                listContacts();
                listRecommendations();
            }
        });

    });

    getCountries();
    listSiblings();
    listContacts();
    listRecommendations();

    $("#program_interest").on("submit", function (event) {

        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=upd_proint"),

            success: function (data) {
                console.log(data);
                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            },
            error: function () {
                //alert("Error!!!");
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        })
    });

    $("#program_interestmoredetails").on("submit", function (event) {

        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=upd_proint_more"),

            success: function (data) {
                console.log(data);
                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            },
            error: function () {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        })
    });

    $("#source_specific").on("submit", function (event) {

        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: "../php/lead_details_c.php",
            data: $(this).serialize() + ("&id_customer=" + id_customer) + ("&param=upd_source"),

            success: function (data) {
                console.log(data);
                Swal.fire({
                    title: 'Success!',
                    text: 'Record updated successfully',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                })
            },
            error: function () {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                })
            }
        })
    });

})