<!-- add modal -->
<div class="modal fade shadow" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
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
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="complainant">Complainant: </label>
                            </div>
                            <div class="col">
                                <select name="complainant" id="complainant" class="form-control">
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- suspect -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="suspect">Person to complain: </label>
                            </div>
                            <div class="col">
                                <select name="suspect" id="suspect" class="form-control">
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
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
    <div class="modal-dialog">
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
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="complainant">Complainant: </label>
                            </div>
                            <div class="col">
                                <select name="complainant" id="complainant" class="form-control">
                                    <option value="" id="edit_complainant"></option>
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- suspect -->
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="suspect">Person to complaint: </label>
                            </div>
                            <div class="col">
                                <select name="suspect" id="suspect" class="form-control">
                                    <option value="" id="edit_suspect"></option>
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Deleting Permit</h5>
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
                                <h5 class="text-black">Complainant: </h5>
                            </div>
                            <div class="col">
                                <p class="text-center" id="del_complainant"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 class="text-black">Suspect: </h5>
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
                <h5 class="modal-title infoModal-title" id="exampleModalLabel" id="infoModal-title">Resident Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
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

                </form>
            </div>
        </div>
    </div>
</div>

<!-- reason modal -->
<div class="modal fade" id="reasonModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reason for complaint</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="view_reason"></p>
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