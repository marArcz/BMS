<!-- add modal -->
<div class="modal fade shadow" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Blotter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="blotter_add.php" method="POST">
                    <div class="form-group mb-3">
                        <p class="form-text flex-1 fw-bold">
                            <strong>Complainant Information</strong>
                        </p>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="complainant">Name: </label>
                            </div>
                            <div class="col">
                                <input type="text" name="complainant" class="form-control text-capitalize" list="complainant-list">
                                <datalist id="complainant-list">
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['firstname'] . ' ' . $row['lastname'] ?>"></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Age: </label>
                            </div>
                            <div class="col">
                                <input required type="number" class="form-control" name="complainant_age">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Phone: </label>
                            </div>
                            <div class="col">
                                <input required type="number" class="form-control" name="complainant_phone">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Address: </label>
                            </div>
                            <div class="col">
                                <input required type="text" class="form-control" name="complainant_address">
                            </div>
                        </div>
                        <hr>
                        <!-- suspect -->
                        <p class="form-text">
                            <strong>Suspect Information</strong>
                        </p>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="suspect">Name: </label>
                            </div>
                            <div class="col">
                                <input type="text" name="suspect" class="form-control text-capitalize" list="suspect-list">
                                <datalist id="suspect-list">
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['firstname'] . ' ' . $row['lastname'] ?>"></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Age: </label>
                            </div>
                            <div class="col">
                                <input required type="number" class="form-control" name="suspect_age">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Phone: </label>
                            </div>
                            <div class="col">
                                <input required type="number" class="form-control" name="suspect_phone">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Address: </label>
                            </div>
                            <div class="col">
                                <input required type="text" class="form-control" name="suspect_address">
                            </div>
                        </div>
                        <hr>
                        <!-- date -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="date">Date: </label>
                            </div>
                            <div class="col">
                                <input required type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                        <!-- time -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="time">Time: </label>
                            </div>
                            <div class="col">
                                <input required type="time" class="form-control" id="time" name="time">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="reason">Action taken: </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="action" name="action" required>
                            </div>
                        </div>
                        <!-- reasone -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="reason">Complaint: </label>
                            </div>
                            <div class="col">
                                <textarea required name="reason" id="reason" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>


                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary " data-dismiss="modal">Cancel</button>
                        <button type="submit" name="add" class="btn btn-sm btn-primary ">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade shadow" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Blotter Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="blotter_edit.php" method="POST">
                    <input required type="hidden" name="id" class="id">
                    <div class="form-group mb-3">
                        <p class="form-text">
                            <strong>Complainant Information</strong>
                        </p>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="complainant">Name: </label>
                            </div>
                            <div class="col">
                                <input type="text" name="complainant" id="complainant-box" class="form-control" list="complainant-list">
                                <datalist id="complainant-list">
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['firstname'] . ' ' . $row['lastname'] ?>"></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Age: </label>
                            </div>
                            <div class="col">
                                <input required type="number" id="complainant_age" class="form-control" name="complainant_age">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Phone: </label>
                            </div>
                            <div class="col">
                                <input required type="number" id="complainant_phone" class="form-control" name="complainant_phone">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Address: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="complainant_address" class="form-control" name="complainant_address">
                            </div>
                        </div>
                        <hr>
                        <!-- suspect -->
                        <p class="form-text">
                            <strong>Suspect Information</strong>
                        </p>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="suspect">Name:</label>
                            </div>
                            <div class="col">
                                <input type="text" name="suspect" id="suspect-box" class="form-control" list="complainant-list">
                                <datalist id="complainant-list">
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['firstname'] . ' ' . $row['lastname'] ?>"></option>
                                    <?php
                                    }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Age: </label>
                            </div>
                            <div class="col">
                                <input required type="number" id="suspect_age" class="form-control" name="suspect_age">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Phone: </label>
                            </div>
                            <div class="col">
                                <input required type="number" id="suspect_phone" class="form-control" name="suspect_phone">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="">Address: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="suspect_address" class="form-control" name="suspect_address">
                            </div>
                        </div>
                        <hr>
                        <!-- date -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="date">Date: </label>
                            </div>
                            <div class="col">
                                <input required type="date" class="form-control" id="edit_date" name="date">
                            </div>
                        </div>
                        <!-- time -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="time">Time: </label>
                            </div>
                            <div class="col">
                                <input required type="time" class="form-control" id="edit_time" name="time">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="reason">Action taken: </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="edit_action" name="action" required>
                            </div>
                        </div>
                        <!-- reasone -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="reason">Complaint: </label>
                            </div>
                            <div class="col">
                                <textarea required name="reason" id="edit_reason" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" name="save" class="btn btn-sm btn-primary rounded-0"> <i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Blotter Record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="blotter_delete.php" method="POST">
                    <div class="form-group mb-3 justify-content-center">
                        <p class="text-black-50 text-center"><small>
                                <span class="text-danger"><i class="fa fa-info-circle"></i> Note: </span>
                                This action cannot be undone.
                            </small></p>
                        <input required type="hidden" name="id" class="id">
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="text-black">Complainant: </p>
                            </div>
                            <div class="col">
                                <p class="text-center" id="del_complainant"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <p class="text-black">Suspect: </p>
                            </div>
                            <div class="col">
                                <p class="text-center" id="del_suspect"></p>
                            </div>
                        </div>



                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                        <button type="submit" name="delete" class="btn btn-sm btn-danger rounded-0"> <i class="fa fa-trash"></i> Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- info modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title infoModal-title" id="info-title">Resident Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="info-content">
                    <!-- photo preview -->
                    <div class="form-group mb-3 text-dark">
                        <div class="row mb-2 align-items-baseline">
                            <div class="col-md-2 text-center position-relative">
                                <img src="uploads/profile.jpg" alt="" class="img-fluid img_preview" id="view_img">
                            </div>

                            <div class="col-sm-2 align-self-baseline">
                                <p class="text-black-50">
                                    <small>Lastname</small>
                                </p>
                                <p id="view_lname"></p>
                            </div>
                            <div class="col-sm-2">
                                <p class="text-black-50">
                                    <small>Firstname</small>
                                </p>
                                <p id="view_fname"></p>
                            </div>
                            <div class="col-sm-2">
                                <p class="text-black-50">
                                    <small>Middlename</small>
                                </p>
                                <p id="view_mname"></p>
                            </div>
                            <div class="col-sm-2">
                                <p class="text-black-50">
                                    <small>Gender</small>
                                </p>
                                <p id="view_gender"></p>
                            </div>
                        </div>
                        <!-- primary info -->
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Birth Date</small>
                                </p>
                                <p id="view_bdate"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Birth Place</small>
                                </p>
                                <p id="view_bplace"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Age</small>
                                </p>
                                <p id="view_age"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Education</small>
                                </p>
                                <p id="view_education"></p>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Religion</small>
                                </p>
                                <p id="view_religion"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Nationality</small>
                                </p>
                                <p id="view_nationality"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Civil Status</small>
                                </p>
                                <p id="view_civil_status"></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Occupation</small>
                                </p>
                                <p id="view_occupation"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Monthly Income</small>
                                </p>
                                <p id="view_income"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Household</small>
                                </p>
                                <p id="view_household"></p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Health condition</small>
                                </p>
                                <p id="view_condition"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Blood Type</small>
                                </p>
                                <p id="view_blood"></p>
                            </div>
                            <div class="col-md">
                                <p class="text-black-50">
                                    <small>Relationship to head</small>
                                </p>
                                <p id="view_relationship"></p>
                            </div>
                        </div>

                    </div>

                    <div class="text-right">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary">Add</button> -->
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">DELETE</button> -->
                    </div>

                </div>

                <div id="info-content-none" class="d-none">
                    <div class="mb-4">
                        <div class="container">
                            <p>Name: <span id="res-name" class="fw-bold">John Doe</span></p>
                            <p>Age: <span id="res-age" class="fw-bold">20</span></p>
                            <p>Contact No: <span id="res-phone" class="fw-bold">0969121277</span></p>
                            <p>Address: <span id="res-address" class="fw-bold">Baranggay Simpatuyo </span></p>
                        </div>
                    </div>

                    <div class="alert alert-primary py-2 my-0">
                        This person is not a resident of our baranggay.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- suspects modal -->
<div class="modal fade" id="suspects-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title infoModal-title" id="info-title">Suspects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md">
                        <p class="my-1">
                            <span>Suspects</span>
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-secondary">
                                
                            </li>
                            <li class="list-group-item text-secondary">
                                
                            </li>
                            <li class="list-group-item text-secondary">
                                
                            </li>
                            <li class="list-group-item text-secondary">
                                
                            </li>
                            <li class="list-group-item text-secondary">
                                
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div id="info-content">
                            <!-- photo preview -->
                            <p class="form-text fw-bold">Suspect Information</p>
                            <div class="form-group mb-3 text-dark">
                                <div class="row mb-2 align-items-baseline">
                                    <div class="col-md-2 text-center position-relative">
                                        <img src="uploads/profile.jpg" alt="" class="img-fluid img_preview" id="view_img">
                                    </div>

                                    <div class="col-sm-2 align-self-baseline">
                                        <p class="text-black-50">
                                            <small>Lastname</small>
                                        </p>
                                        <p id="view_lname"></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-black-50">
                                            <small>Firstname</small>
                                        </p>
                                        <p id="view_fname"></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-black-50">
                                            <small>Middlename</small>
                                        </p>
                                        <p id="view_mname"></p>
                                    </div>
                                    <div class="col-sm-2">
                                        <p class="text-black-50">
                                            <small>Gender</small>
                                        </p>
                                        <p id="view_gender"></p>
                                    </div>
                                </div>
                                <!-- primary info -->
                                <hr>
                                <div class="row mb-2">
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Birth Date</small>
                                        </p>
                                        <p id="view_bdate"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Birth Place</small>
                                        </p>
                                        <p id="view_bplace"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Age</small>
                                        </p>
                                        <p id="view_age"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Education</small>
                                        </p>
                                        <p id="view_education"></p>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Religion</small>
                                        </p>
                                        <p id="view_religion"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Nationality</small>
                                        </p>
                                        <p id="view_nationality"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Civil Status</small>
                                        </p>
                                        <p id="view_civil_status"></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Occupation</small>
                                        </p>
                                        <p id="view_occupation"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Monthly Income</small>
                                        </p>
                                        <p id="view_income"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Household</small>
                                        </p>
                                        <p id="view_household"></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Health condition</small>
                                        </p>
                                        <p id="view_condition"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Blood Type</small>
                                        </p>
                                        <p id="view_blood"></p>
                                    </div>
                                    <div class="col-md">
                                        <p class="text-black-50">
                                            <small>Relationship to head</small>
                                        </p>
                                        <p id="view_relationship"></p>
                                    </div>
                                </div>

                            </div>

                            <div class="text-right">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary">Add</button> -->
                                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">DELETE</button> -->
                            </div>

                        </div>

                        <div id="info-content-none" class="d-none">
                            <div class="mb-4">
                                <div class="container">
                                    <p>Name: <span id="res-name" class="fw-bold">John Doe</span></p>
                                    <p>Age: <span id="res-age" class="fw-bold">20</span></p>
                                    <p>Contact No: <span id="res-phone" class="fw-bold">0969121277</span></p>
                                    <p>Address: <span id="res-address" class="fw-bold">Baranggay Simpatuyo </span></p>
                                </div>
                            </div>

                            <div class="alert alert-primary py-2 my-0">
                                This person is not a resident of our baranggay.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- reason modal -->
<div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for complaint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="view_reason" class="card-text word-break-word"></p>
            </div>
        </div>
    </div>
</div>

<!-- confirm modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting blotter history</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="blotter_history_delete.php" method="POST">
                    <div class="form-group mb-3 justify-content-center">
                        <input required type="hidden" name="id" class="id">
                        <h5 class="text-center">Sure to delete this data?</h5>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="delete" class="btn btn-sm btn-danger rounded-0">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>