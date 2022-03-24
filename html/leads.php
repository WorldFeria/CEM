<?php
    include "../config/config.php";
    $countries_dials = mysqli_query($con, "SELECT Country_Name, Dial FROM countries ORDER BY id_country ASC");
    $programs = mysqli_query($con, "SELECT id_program, name_program FROM programs ORDER BY id_program ASC");
    $sources = mysqli_query($con, "SELECT id_source, opcion_source FROM sources ORDER BY id_source ASC");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="../css/notyf/notyf.min.css"></link>
<link rel="stylesheet" href="../css/lead_styles.css">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="../js/notyf/notyf.min.js"></script>
<script src="../js/leads.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<div class="main_container">

    <div><h2>LEADS</h2></div>

    <div class="d-flex justify-content-center">

        <button id="btn_modal_leads" class="btn btn-primary" style="margin: 2px;">
            New Lead <i class='fa fa-plus-circle align-middle'></i>
        </button>

        <button id="btn_reload_leads" class="btn btn-success" style="margin: 2px;">
            <i class='fa fa-refresh align-middle'></i>
        </button>

    </div>

    <br>

    <div class="card" style="padding: 18px;">
        <div class=" col-12 table-responsive">
            <table class="table table-striped table-borderless " id="leads_table" style="width:100%">
                <thead>
                    <tr class="t-header">
                        <th scope="col">Status</th>
                        <th scope="col">ID</th>
                        <th scope="col">Score</th>
                        <th scope="col">Name</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dial</th>
                        <th scope="col">Cellphone</th>
                        <!--<th scope="col">Country</th>-->
                        <th scope="col">Creation Date/Time</th>
                        <th scope="col">Tools</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>


</div>


<!----------------------------- MODALS---------------------->
<div id="modal_leads" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="heading">New Lead</h2>
                <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div oncontextmenu='return false' class='snippet-body background' id="fieldsetContent">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 text-center p-0 mt-3 mb-2 card-lead">

                                <!-- <span> <i class='bx bx-sun'></i> </span> -->

                                <p>Fill all form fields to go to next step</p>
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">

                                        <li class="active-form" id="personal"><strong>Account Information</strong></li>
                                        <li id="program"><strong>Program of Interest</strong></li>
                                        <li id="source"><strong>Source</strong></li>
                                        <li id="confirm"><strong>Finish</strong></li>
                                    </ul>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><br>

                                    <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">

                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">Account Information:</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 1/4</h2>
                                                </div>
                                            </div>

                                            <label class="fieldlabels">First Name:</label>
                                            <input type="text" name="ufname" id="ufname" placeholder="Example: Name" required/>
                                            <label class="fieldlabels">Last Name:</label>
                                            <input type="text" name="ulname" id="ulname" placeholder="Example. Lastname" required/>
                                            <label class="fieldlabels">Email:</label>
                                            <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Example: email@gmail.com" required>
                                            <h5><span id="stateemail" class="help-block badge bg-light"></span></h5>
                                            <br><label class="fieldlabels">Country Phone Prefix:</label>
                                            <select class="form-control" name="prefix" id="prefix" required >
                                                <option selected="" value="">-- Choose a Prefix --</option>
                                                <?php foreach($countries_dials as $p):?>
                                                <option value="<?php echo $p['Dial'];?>"><?php echo $p['Country_Name']." - (".$p['Dial'].")"; ?></option>
                                                <?php endforeach; ?>
                                            </select><br>
                                            <label class="fieldlabels">Cellphone:</label>
                                            <input type="number" name="cellphone" id="cellphone" min="0" pattern="^[0-9]+" class="form-control mb-2" placeholder="Example: 5512345678" required>
                                            <h5><span id="statecellphone" class="help-block badge bg-light"></span></h5>
                                            <h5><span id="help_message" class="help-block badge bg-light"></span></h5>
                                            
                                        </div>
                                        <input type="button" name="next" id="next_fieldset" class="next action-button" value="Next" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">Program of Interest:</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 2/4</h2>
                                                </div>
                                            </div>

                                            <label class="fieldlabels">Program of Interest:</label>
                                            <select class="form-control" name="program_inte" id="program_inte" required >
                                                <option selected="" value="">-- Choose a Program --</option>
                                                <?php foreach($programs as $p):?>
                                                <option value="<?php echo $p['id_program'];?>"><?php echo $p['name_program']; ?></option>
                                                <?php endforeach; ?>
                                            </select><br>
                                            <div class='answers_programinterest'></div>
                                        </div>

                                        <input type="submit" name="next" id="next_fieldset" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">Source:</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 3/4</h2>
                                                </div>
                                            </div>

                                            <label class="fieldlabels">Source:</label>
                                            <select class="form-control" name="sources" id="sources" required >
                                                <option selected="" value="">-- Choose a Source --</option>
                                                <?php foreach($sources as $p):?>
                                                <option value="<?php echo $p['id_source'];?>"><?php echo $p['opcion_source']; ?></option>
                                                <?php endforeach; ?>
                                            </select><br>
                                            <div class='answers_source'></div>
                                        </div>

                                        <input type="submit" name="next" id="save_msform" class="next action-button" value="Next" />
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-card">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="fs-title">Finish:</h2>
                                                </div>
                                                <div class="col-5">
                                                    <h2 class="steps">Step 4/4</h2>
                                                </div>
                                            </div><br>

                                            <div id="results_msform"></div>
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<?php
    mysqli_free_result($countries_dials);
    mysqli_free_result($programs);
    mysqli_free_result($sources);
    mysqli_close($con);
?>