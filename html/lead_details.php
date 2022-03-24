<?php
if (isset($_GET["customer"]) AND isset($_GET["idprogram"])) {
    $id_customer = $_GET["customer"];
    $idprogram = $_GET["idprogram"];
    $source = $_GET["source"];
}
include "../config/config.php";
$programs = mysqli_query($con, "SELECT id_program, name_program FROM programs WHERE id_program='$idprogram'");
$countries = mysqli_query($con, "SELECT Country_Name FROM countries ORDER BY id_country ASC");
$leadpriorityanswers2 = mysqli_query($con, "SELECT id_leadpriorityanswers2, aswers_leadpriorityanswers2 FROM leadpriority_answers2  WHERE id_program6='$idprogram' ORDER BY id_leadpriorityanswers2 ASC");
$leadpriorityanswers1 = mysqli_query($con, "SELECT id_leadpriorityanswers1, answers_leadpriorityanswers1 FROM leadpriority_answers1 WHERE id_leadpriorityanswers1 IN(SELECT id_leadpriorityanswers1 FROM programs_leadpriorityanswers1_mm WHERE id_program5='$idprogram' ORDER BY id_programsleadpriorityanswers1mm ASC) ORDER BY id_leadpriorityanswers1 ASC");
$leadpriorityanswers3 = mysqli_query($con, "SELECT id_leadpriorityanswers3, answers_leadpriorityanswers3 FROM leadpriority_answers3 WHERE id_program7='$idprogram' ORDER BY id_leadpriorityanswers3 ASC");
$leadpriorityanswers4 = mysqli_query($con, "SELECT id_leadpriorityanswers4, answers_leadpriorityanswers4 FROM leadpriority_answers4 WHERE id_program8='$idprogram' ORDER BY id_leadpriorityanswers4 ASC");

$kindprogram = mysqli_query($con, "SELECT id_kind_program, name_kind_program FROM kind_program WHERE id_program1='$idprogram'");
$interestareas = mysqli_query($con, "SELECT id_interest_areas, name_interes_areas FROM interest_areas WHERE id_programs2='$idprogram'");
$languages = mysqli_query($con, "SELECT id_language, name_language FROM languages WHERE id_language IN(SELECT id_language2 FROM programs_languages_mm WHERE id_program3='$idprogram' ORDER BY id_program_language ASC) ORDER BY id_language ASC");
$programlanguage = mysqli_query($con, "SELECT id_learn_language, name_learn_language FROM learn_language WHERE id_program3='$idprogram'");
$lenghtprogram = mysqli_query($con, "SELECT id_lenght_program, name_lenght_program FROM lenght_program WHERE id_program4='$idprogram'");

$sources = mysqli_query($con, "SELECT id_source, opcion_source FROM sources WHERE id_source='$source'");
$specific_sources = mysqli_query($con, "SELECT id_sourceline, opcion_sourceline FROM specific_source WHERE id_source2='$source' ORDER BY id_sourceline ASC");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/lead_details.js"></script>
<link rel="stylesheet" href="../css/lead_styles.css">

<div class="main_container">

    <script>
        var id_customer = <?php echo $id_customer ?>;
    </script>

    <br>

    <div class="row ">

        <div class="col-md-4 ">

            <div class="card ">

                <div class="row">
                    <div class="col-6">
                        <button id="btn_back_to_leads" class="btn btn-danger"> <i class="fas fa-chevron-left"></i>
                           
                        </button>
                    </div>

                    <div class="col-6 d-flex justify-content-end">
                        <button id="btn_reload_details" class="btn btn-success"> <i class="fa fa-refresh"></i></button>
                    </div>

                    <!--<div class="col-6 d-flex justify-content-end">
                        <button id="btn_reload_details" class="btn btn-success" style="margin: 2px;">
                            <i class='fa fa-refresh align-middle'></i>
                        </button>
                    </div>-->

                </div>


                <div class="d-flex justify-content-center">
                    <img src="../assets/img/profiles/admin.png" class="details-avatar" alt="Imagen de Perfil" title="Imagen de Perfil">
                </div>

                <br></br>

                <div class="d-flex justify-content-center" style="font-size: 24px;">
                    <span id="ld_title_firstname" class="font-bold">FIRTSNAME &#8203</span>&nbsp; <span id="ld_title_lastname" class="font-light">LASTNAME</span>
                </div>
                <hr>
                <div>

                    <!-- <div class="data-user-card "><i class="far fa-user"></i> &nbsp;&nbsp;<span class="font-light"> FIRSTNAME:</span> <span id="ld_card_firstname" class="font-bold"> </span> </div>

                    <div class="data-user-card "><i class="far fa-user"></i> &nbsp;&nbsp;<span class="font-light"> LASTNAME:</span> <span id="ld_card_lastname" class="font-bold"> </span> </div> -->

                    <div class="data-user-card "><i class="far fa-envelope"></i> &nbsp;&nbsp;<span class="font-light">
                            EMAIL:</span> <span id="ld_card_email" class="font-bold"> </span></div>

                    <!-- <div class="data-user-card "><i class="far fa-flag"></i> &nbsp;&nbsp;<span class="font-light"> COUNTRY:</span> <span id="ld_card_country" class="font-bold"> </span></div> -->

                    <div class="data-user-card "><i class="fas fa-mobile-alt"></i> &nbsp;&nbsp;<span class="font-light">
                            CELLPHONE:</span> <span id="ld_card_cellphone" class="font-bold"> </span></div>

                    <div class="data-user-card "><i class="fas fa-thermometer-quarter"></i> &nbsp;&nbsp;<span class="font-light"> LEAD STATUS:</span> <span id="ld_card_status" class="font-bold"> </span>
                    </div>

                    <div class="data-user-card "><i class="fas fa-thermometer-quarter"></i> &nbsp;&nbsp;<span class="font-light"> SCORE:</span> <span id="ld_card_score" class="font-bold">
                        </span></div>

                    <div class="data-user-card "><i class="fas fa-thermometer-quarter"></i> &nbsp;&nbsp;<span class="font-light"> AGENCY:</span> <span id="ld_card_agency" class="font-bold"> </span>
                    </div>

                    <div class="data-user-card "><i class="fas fa-thermometer-quarter"></i> &nbsp;&nbsp;<span class="font-light"> CONSULTOR:</span> <span id="ld_card_consultor" class="font-bold">
                        </span></div>


                </div>

            </div>

        </div>

        <div class="col-md-8 ">
            <div class="card ">


                <!-- <div class="accordion" id="accordionPanelsStayOpenExample">
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>


                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading4">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>


                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse5" aria-expanded="false" aria-controls="panelsStayOpen-collapse5">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse5" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading5">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>



                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse6" aria-expanded="false" aria-controls="panelsStayOpen-collapse6">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse6" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading6">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>



                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse6" aria-expanded="false" aria-controls="panelsStayOpen-collapse6">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse6" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading6">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>



                    
                </div> -->

                <div class="col-md-12 ">
                    <div class="row ">
                        <div class="col-xl-4 col-lg-6">
                            <div class="card-superior" id="card_superior_leadstatus">
                                <div class="card-statistic-3">
                                    <div class="card-icon card-icon-large"><i class="fas fa-thermometer-quarter"></i>
                                    </div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">LEAD STATUS</h5>
                                    </div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 id="lbl_superior_card_leadstatus" class="d-flex align-items-center mb-0">
                                                FROZEN
                                            </h2>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card-superior l-bg-blue-dark">
                                <div class="card-statistic-3 ">
                                    <div class="card-icon card-icon-large"><i class="fas fa-list"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">SCORE</h5>
                                    </div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 id="lbl_superior_card_score" class="d-flex align-items-center mb-0">
                                                000
                                            </h2>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="card-superior l-bg-cherry">
                                <div class="card-statistic-3 ">
                                    <div class="card-icon card-icon-large"><i class="far fa-flag"></i></div>
                                    <div class="mb-4">
                                        <h5 class="card-title mb-0">COUNTRY</h5>
                                    </div>
                                    <div class="row align-items-center mb-2 d-flex">
                                        <div class="col-8">
                                            <h2 id="ld_card_country" class="d-flex align-items-center mb-0">
                                                -
                                            </h2>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">

                    <ul class="nav nav-pills mb-3  nav-justified " id="pills-tab" role="tablist">


                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Basic Information</button>
                        </li>


                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Telemarketing</button>
                        </li>

                    </ul>

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                            <div class="accordion" id="accordionExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            MANDATORY INFO
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <form id="form_mandatory">

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputFirstnameAccordion">Firstname</label>
                                                        <input type="text" class="form-control" id="inputAccordionFirstname" name="inputAccordionFirstname" placeholder="Firstname">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputFirstnameAccordion">Lastname</label>
                                                        <input type="text" class="form-control" id="inputAccordionLastname" name="inputAccordionLastname" placeholder="Lastname">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionEmail">Email</label>
                                                        <input type="email" class="form-control" id="inputAccordionEmail" name="inputAccordionEmail" placeholder="email@example.com">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="inputAccordionDial">Country dial</label>
                                                        <input type="text" class="form-control" id="inputAccordionDial" name="inputAccordionDial" placeholder="52">
                                                    </div>

                                                    <div class="form-group col-md-3">
                                                        <label for="inputAccordionCellphone">Cellphone</label>
                                                        <input type="text" class="form-control" id="inputAccordionCellphone" name="inputAccordionCellphone" placeholder="5512345678">
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button name="smt_mandatory" id="btn_submit_mandatory" type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            COMPLEMENTARY INFO
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <form id="form_complementary">

                                                <div class="row">

                                                    <div class="form-group col-md-8 col-sm-12">
                                                        <label for="inputAccordionBirthday">Birthday</label>
                                                        <input type="text" class="form-control" name="inputAccordionBirthday" id="inputAccordionBirthday" placeholder="Birthday">

                                                    </div>

                                                    <div class="form-group col-md-4 col-sm-12">
                                                        <label for="inputAccordionGender">Gender</label>
                                                        <select class="form-control" name="inputAccordionGender" id="inputAccordionGender">
                                                            <option>-- SELECT --</option>
                                                            <option>MALE</option>
                                                            <option>FEMALE</option>
                                                            <option>OTHER</option>

                                                        </select>
                                                    </div>

                                                    <br>
                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            ADRESS
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">

                                            <form id="form_adress">

                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="gridCheckForeigner" type="checkbox" id="gridCheckForeigner">
                                                        <label class="form-check-label" for="gridCheckForeigner">
                                                            Foreigner
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionUsrCountry">Country</label>
                                                        <select class="form-control" name="inputAccordionUsrCountry" id="inputAccordionUsrCountryComplementary">


                                                        </select>
                                                    </div>

                                                    <div class="form-group  col-md-6 col-sm-12">
                                                        <label for="inputAccordionZip">Zip</label>
                                                        <input type="text" name="inputAccordionZip" class="form-control" id="inputAccordionZip" placeholder="0000">
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionState">State</label>
                                                        <input type="text" name="inputAccordionState" class="form-control" id="inputAccordionState" placeholder="State">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionCity">City</label>
                                                        <input type="text" name="inputAccordionCity" class="form-control" id="inputAccordionCity" placeholder="City">
                                                    </div>

                                                </div>

                                                <div class="row">

                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionSettlement">Delegación</label>
                                                        <input type="text" name="inputAccordionSettlement" class="form-control" id="inputAccordionSettlement" placeholder="Settlement">
                                                    </div>


                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionColony">Colonia</label>
                                                        <input type="text" name="inputAccordionColony" class="form-control" id="inputAccordionColony" placeholder="Settlement">
                                                    </div>


                                                </div>


                                                <div class="form-group">
                                                    <label for="inputAccordionStreet">Name Street</label>
                                                    <input type="text" name="inputAccordionStreet" class="form-control" id="inputAccordionStreet" placeholder="Main St">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputAccordionExt"># Ext</label>
                                                    <input type="text" name="inputAccordionExt" class="form-control" id="inputAccordionExt" placeholder="Street num">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputAccordionInt"># Int</label>
                                                    <input type="text" name="inputAccordionInt" class="form-control" id="inputAccordionInt" placeholder="Apartment, studio, or floor">
                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            SIBLINGS
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body" style="padding: 0px; padding-top:1rem">

                                            <div class="d-flex justify-content-center">


                                                <button id="btn_modal_siblings" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_siblings">
                                                    Add <i class="fas fa-plus"></i>
                                                </button>

                                            </div>

                                            <div class=" col-12 table-responsive">
                                                <table class="table table-striped table-borderless " id="siblings_table" style="width:100%">
                                                    <thead>
                                                        <tr class="t-header">
                                                            <th scope="col">Firstname</th>
                                                            <th scope="col">Lastname</th>
                                                            <th scope="col">Birthday</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Tools</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            CONTACT
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body" style="padding: 0px; padding-top:1rem">

                                            <div class="d-flex justify-content-center">
                                                <button id="btn_modal_contact" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_contact">
                                                    Add <i class="fas fa-plus"></i>
                                                </button>
                                            </div>

                                            <div class=" col-12 table-responsive">
                                                <table class="table table-striped table-borderless " id="contacts_table" style="width:100%">
                                                    <thead>
                                                        <tr class="t-header">
                                                            <th scope="col">Firstname</th>
                                                            <th scope="col">Lastname</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Cellphone</th>
                                                            <th scope="col">Tools</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            RECOMENDATIONS
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body" style="padding: 0px; padding-top:1rem">

                                            <div class="d-flex justify-content-center">
                                                <button id="btn_modal_recommendation" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_recommendations">
                                                    Add <i class="fas fa-plus"></i>
                                                </button>
                                            </div>


                                            <div class=" col-12 table-responsive">
                                                <table class="table table-striped table-borderless " id="recommendations_table" style="width:100%">
                                                    <thead>
                                                        <tr class="t-header">
                                                            <th scope="col">Firstname</th>
                                                            <th scope="col">Lastname</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Cellphone</th>
                                                            <th scope="col">Birthday</th>
                                                            <th scope="col">Tools</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            <div class="accordion" id="accordionTelemarketing">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            PROGRAM OF INTEREST
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven" data-bs-parent="#accordionTelemarketing">

                                        <div class="accordion-body">
                                            <form id="program_interest">

                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionProgram">Program of Interest</label>
                                                        <select class="form-control" name="inputAccordionProgram" id="inputAccordionProgram" required>
                                                            <?php foreach($programs as $p):?>
                                                            <option value="<?php echo $p['id_program'];?>"><?php echo $p['name_program']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group  col-md-6 col-sm-12">
                                                        <label for="inputAccordionCountryInterest">Country of Interest</label>
                                                        <select class="form-control" name="inputAccordionCountryInterest" id="inputAccordionCountryInterest" required >
                                                            <?php foreach($countries as $p):?>
                                                            <option value="<?php echo $p['Country_Name'];?>" ><?php echo $p['Country_Name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionStart">When i want to start my studies abroad</label>
                                                        <select class="form-control" name="inputAccordionStart" id="inputAccordionStart" required >
                                                            <?php foreach($leadpriorityanswers2 as $p):?>
                                                            <option value="<?php echo $p['id_leadpriorityanswers2'];?>"><?php echo $p['aswers_leadpriorityanswers2']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionPaid">Paid Mode</label>
                                                        <select class="form-control" name="inputAccordionPaid" id="inputAccordionPaid" required >
                                                            <?php foreach($leadpriorityanswers1 as $p):?>
                                                            <option value="<?php echo $p['id_leadpriorityanswers1'];?>"><?php echo $p['answers_leadpriorityanswers1']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionBudget">Budget Available for my Program</label>
                                                        <select class="form-control" name="inputAccordionBudget" id="inputAccordionBudget" required >
                                                            <?php foreach($leadpriorityanswers3 as $p):?>
                                                            <option value="<?php echo $p['id_leadpriorityanswers3'];?>"><?php echo $p['answers_leadpriorityanswers3']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionLanLevel">Language Level</label>
                                                        <select class="form-control" name="inputAccordionLanLevel" id="inputAccordionLanLevel" required >
                                                            <?php foreach($leadpriorityanswers4 as $p):?>
                                                            <option value="<?php echo $p['id_leadpriorityanswers4'];?>"><?php echo $p['answers_leadpriorityanswers4']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingEight">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            PROGRAM OF INTEREST (MORE DETAILS)
                                        </button>
                                    </h2>
                                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionTelemarketing">
                                        <div class="accordion-body">

                                            <form id="program_interestmoredetails">
                                                <div class="row">

                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionProgKind">Program Kind</label>
                                                        <select class="form-control" name="inputAccordionProgramKind" id="inputAccordionProgramKind" required >
                                                            <option selected="" value="">-- Choose a Program Kind --</option>
                                                            <?php foreach($kindprogram as $p): ?>
                                                            <option value="<?php echo $p['id_kind_program'];?>"><?php echo $p['name_kind_program']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php if(mysqli_num_rows($interestareas)>0){ ?>
                                                    <div class="form-group  col-md-6 col-sm-12">
                                                        <label for="inputAccordionInterest">Area of Interest</label>
                                                        <select class="form-control" name="inputAccordionAreaInterest" id="inputAccordionAreaInterest" required >
                                                            <option selected="" value="">-- Choose an Area of Interest --</option>
                                                            <?php foreach($interestareas as $p): ?>
                                                            <option value="<?php echo $p['id_interest_areas'];?>"><?php echo $p['name_interes_areas']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionMotherLanguage">Mother Language</label>
                                                        <select class="form-control" name="inputAccordionMotherLanguage" id="inputAccordionMotherLanguage" required >
                                                            <option selected="" value="">-- Choose a Mother Language --</option>
                                                            <?php foreach($languages as $p): ?>
                                                            <option value="<?php echo $p['id_language'];?>"><?php echo $p['name_language']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php if(mysqli_num_rows($programlanguage)>0){ ?>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionProgramLanguage">Program Language</label>
                                                        <select class="form-control" name="inputAccordionProgramLanguage" id="inputAccordionProgramLanguage" required >
                                                            <option selected="" value="">-- Choose a Program Language --</option>
                                                            <?php foreach($programlanguage as $p): ?>
                                                            <option value="<?php echo $p['id_learn_language'];?>"><?php echo $p['name_learn_language']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputAccordionProgramLenght">Program Lenght</label>
                                                        <select class="form-control" name="inputAccordionProgramLenght" id="inputAccordionProgramLenght" required >
                                                            <option selected="" value="">-- Choose a Program Lenght --</option>
                                                            <?php foreach($lenghtprogram as $p): ?>
                                                            <option value="<?php echo $p['id_lenght_program'];?>"><?php echo $p['name_lenght_program']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                            SOURCE
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionTelemarketing">

                                        <div class="accordion-body">
                                            <form id="source_specific">

                                                <div class="row">
                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionSource">Source</label>
                                                        <select class="form-control" name="inputAccordionSource" id="inputAccordionSource" required >
                                                            <?php foreach($sources as $p): ?>
                                                            <option value="<?php echo $p['id_source'];?>"><?php echo $p['opcion_source']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php if(mysqli_num_rows($specific_sources)>0){ ?>
                                                    <div class="form-group  col-md-6 col-sm-12">
                                                        <label for="inputAccordionSpecificSource">Specific Source</label>
                                                        <select class="form-control" name="inputAccordionSpecificSource" id="inputAccordionSpecificSource" required >
                                                            <?php foreach($specific_sources as $p): ?>
                                                            <option value="<?php echo $p['id_sourceline'];?>" ><?php echo $p['opcion_sourceline']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php } ?>
                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTen">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseEight">
                                            IN CONCERT
                                        </button>
                                    </h2>
                                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionTelemarketing">
                                        <div class="accordion-body">

                                            <form id="form_concert">

                                                <div class="row">

                                                    <div class="form-group col-md-6 col-sm-12">
                                                        <label for="inputAccordionProgKind">Operator:</label>
                                                        <select class="form-control" id="inputAccordionProgKind">
                                                            <option selected>-- SELECT --</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group  col-md-6 col-sm-12">
                                                        <label for="inputConcertDate">Date:</label>
                                                        <input type="text" name="inputConcertDate" class="form-control" id="inputConcertDate" placeholder="0000-00-00">

                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="form-group  col-md-6 col-sm-12">
                                                        <label for="inputConcertHour">Hour:</label>
                                                        <input type="text" name="inputConcertHour" class="form-control" id="inputConcertHour" placeholder="00:00">

                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputConcertCampaing">Campaing:</label>
                                                        <select id="inputConcertCampaing" name="inputConcertCampaing" class="form-control">
                                                            <option selected>-- SELECT --</option>

                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="form-group col-md-6">
                                                        <label for="inputConcertInteraction">Interaction:</label>
                                                        <select id="inputConcertInteraction" name="inputConcertInteractions" class="form-control">
                                                            <option selected>-- SELECT --</option>

                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputConcertTag">Tag:</label>
                                                        <select id="inputConcertTag" name="inputConcertTag" class="form-control">
                                                            <option selected>-- SELECT --</option>

                                                        </select>
                                                    </div>

                                                </div>


                                                <div class="row">

                                                    <div class="form-group col-md-12">
                                                        <label for="inputConcertComments">Comments:</label>
                                                        <input type="text" name="inputConcertComments" class="form-control" id="inputConcertComments" placeholder="...">
                                                    </div>

                                                </div>

                                                <br>

                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>

                                            </form>


                                        </div>
                                    </div>
                                </div>



                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingNine">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                            SCHEDULE APPOINTMENT
                                        </button>
                                    </h2>
                                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionTelemarketing">
                                        <div class="accordion-body">

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAccordionCallToAction">Call to action:</label>
                                                    <select id="inputAccordionCallToAction" class="form-control">

                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputAccordionAsignAdviser">Asign adviser:</label>
                                                    <select id="inputAccordionAsignAdviser" class="form-control">
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAccordionDate">Date:</label>
                                                    <select id="inputAccordionDate" class="form-control">

                                                        <option selected>Choose...</option>
                                                        <option selected>Choose...</option>
                                                        <option>...</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>


                    </div>
                </div>



            </div>
        </div>

    </div>


</div>


<!----------------------------- MODALS---------------------->

<!-- Modal SIBLINGS -->
<div class="modal fade" id="modal_siblings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Sibling</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="form_sibling">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputSiblingFirstname">Firstname</label>
                            <input type="text" class="form-control" id="inputSiblingFirstname" name="inputSiblingFirstname" placeholder="Firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputSiblingLastname">Lastname</label>
                            <input type="text" class="form-control" id="inputSiblingLastname" name="inputSiblingLastname" placeholder="Lastname">
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="inputSiblingGender">Gender</label>
                            <select class="form-control" name="inputSiblingGender" id="inputSiblingGender">
                                <option>-- SELECT --</option>
                                <option>MALE</option>
                                <option>FEMALE</option>
                                <option>OTHER</option>

                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputSiblingBirthday">Birthday</label>
                            <input type="text" class="form-control" id="inputSiblingBirthday" name="inputSiblingBirthday" placeholder="0000-00-00">
                        </div>

                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button name="smt_sibling" type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<!-- Modal CONTACT -->
<div class="modal fade" id="modal_contact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="form_contact">

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" name="gridCheckForeignerContact" type="checkbox" id="gridCheckForeignerContact">
                            <label class="form-check-label" for="gridCheckForeignerContact">
                                Foreigner
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputContactFirstname">Firstname</label>
                            <input type="text" class="form-control" id="inputContactFirstname" name="inputContactFirstname" placeholder="Firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContactLastname">Lastname</label>
                            <input type="text" class="form-control" id="inputContactLastname" name="inputContactLastname" placeholder="Lastname">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputContactEmail">Email</label>
                            <input type="email" class="form-control" id="inputContactEmail" name="inputContactEmail" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContactRelation">Relation</label>
                            <input type="text" class="form-control" id="inputContactRelation" name="inputContactRelation" placeholder="Relation">
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputContactDial">Dial</label>
                            <select class="form-control" name="inputContactDial" id="inputContactDial">
                                <option>-- SELECT --</option>
                                <option>52</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContactCellphone">Cellphone</label>
                            <input type="text" class="form-control" id="inputContactCellphone" name="inputContactCellphone" placeholder="Cellphone">
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputContactOcupation">Ocupation</label>
                            <input type="text" class="form-control" id="inputContactOcupation" name="inputContactOcupation" placeholder="Ocupation">
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="inputContactGender">Gender</label>
                            <select class="form-control" name="inputContactGender" id="inputContactGender">
                                <option>-- SELECT --</option>
                                <option>MALE</option>
                                <option>FEMALE</option>
                                <option>OTHER</option>

                            </select>
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputContactBirthday">Birthday</label>
                            <input type="text" class="form-control" id="inputContactBirthday" name="inputContactBirthday" placeholder="0000-00-00">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputContactBPlace">Birth Place</label>
                            <input type="text" class="form-control" id="inputContactBPlace" name="inputContactBPlace" placeholder="Birth Place">
                        </div>
                    </div>


                    <div class="row">

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="inputAccordionUsrCountryContact">Country</label>
                            <select class="form-control" name="inputAccordionUsrCountryContact" id="inputAccordionUsrCountryContact">


                            </select>
                        </div>

                        <div class="form-group  col-md-6 col-sm-12">
                            <label for="inputAccordionZip">Zip</label>
                            <input type="text" name="inputAccordionZipContact" class="form-control" id="inputAccordionZipContact" placeholder="0000">
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="inputAccordionStateContact">State</label>
                            <input type="text" name="inputAccordionStateContact" class="form-control" id="inputAccordionStateContact" placeholder="State">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputAccordionCity">City</label>
                            <input type="text" name="inputAccordionCityContact" class="form-control" id="inputAccordionCityContact" placeholder="City">
                        </div>

                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="inputAccordionSettlement">Settlement</label>
                        <input type="text" name="inputAccordionSettlementContact" class="form-control" id="inputAccordionSettlementContact" placeholder="Settlement">
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="inputAccordionColonyContact">Colony</label>
                        <input type="text" name="inputAccordionColonyContact" class="form-control" id="inputAccordionColonyContact" placeholder="Colony">
                    </div>



                    <div class="form-group">
                        <label for="inputAccordionStreet">Name Street</label>
                        <input type="text" name="inputAccordionStreetContact" class="form-control" id="inputAccordionStreetContact" placeholder="Main St">
                    </div>

                    <div class="form-group">
                        <label for="inputAccordionExt"># Ext</label>
                        <input type="text" name="inputAccordionExtContact" class="form-control" id="inputAccordionExtContact" placeholder="Street num">
                    </div>

                    <div class="form-group">
                        <label for="inputAccordionInt"># Int</label>
                        <input type="text" name="inputAccordionIntContact" class="form-control" id="inputAccordionIntContact" placeholder="Apartment, studio, or floor">
                    </div>


                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button name="smt_sibling" type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<!-- Modal RECOMMENDATIONS -->
<div class="modal fade" id="modal_recommendations" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Recommendation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="form_recommendations">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputRecommendationFirstname">Firstname</label>
                            <input type="text" class="form-control" id="inputRecomendationFirstname" name="inputRecomendationFirstname" placeholder="Firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputRecommendationLastname">Lastname</label>
                            <input type="text" class="form-control" id="inputRecommendationLastname" name="inputRecommendationLastname" placeholder="Lastname">
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="inputRecommendationEmail">Email</label>
                            <input type="email" class="form-control" id="inputRecommendationEmail" name="inputRecommendationEmail" placeholder="Email">
                        </div>

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="inputRecommendationBirthday">Birthday</label>
                            <input type="text" class="form-control" id="inputRecommendationBirthday" name="inputRecommendationBirthday" placeholder="0000-00-00">
                        </div>

                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="inputRecommendationCountry">Country</label>
                        <select class="form-control" name="inputRecommendationCountry" id="inputRecommendationCountry">
                            <option>-- SELECT --</option>
                        </select>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6 col-sm-12">
                            <label for="inputRecommendationDial">Dial</label>
                            <select class="form-control" name="inputRecommendationDial" id="inputRecommendationDial">
                                <option>-- SELECT --</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputRecommendationCellphone">Cellphone</label>
                            <input type="text" class="form-control" id="inputRecommendationCellphone" name="inputRecommendationCellphone" placeholder="Cellphone">
                        </div>
                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button name="smt_recommnedations" type="submit" class="btn btn-primary">Add</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<!-- Modal DELETE -->
<div class="modal fade" id="modal_details_delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-exclamation-triangle"></i> DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center">
                    <h2>Are you sure you want to delete this record?</h2>
                </div>

                <br>
                <br>

                <div class="row">

                    <div class="col-6">
                        <button class="btn btn-danger w-100" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>

                    <div class="col-6">
                        <button id="btn_accept_delete" class="btn btn-primary w-100" data-bs-dismiss="modal" aria-label="Close">
                            Accept
                        </button>
                    </div>

                </div>

                <br>
                <br>

            </div>

        </div>
    </div>
</div>
<?php
mysqli_free_result($programs);
mysqli_free_result($countries);
mysqli_free_result($leadpriorityanswers2);
mysqli_free_result($leadpriorityanswers1);
mysqli_free_result($leadpriorityanswers3);
mysqli_free_result($leadpriorityanswers4);
mysqli_free_result($sources);
mysqli_free_result($specific_sources);
mysqli_close($con);
?>