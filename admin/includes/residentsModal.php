<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Resident</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="residents_add.php" method="POST" enctype="multipart/form-data">
                    <!-- photo preview -->
                    <div class="form-group mb-3 text-dark">
                        <div class="row mb-2 align-items-baseline">
                            <div class="col-md-2 text-center position-relative">
                                <img src="uploads/profile.jpg" alt="" class="img-fluid" id="img-preview">
                                <label for="fileBox" class="position-absolute" style="left: 0;right: 0; bottom:0;">
                                    <i class="bx bx-camera bx-md"></i>
                                </label>
                                <input type="file" name="file" id="fileBox" class="form-control-file d-none">
                            </div>
                            <div class="col-md">
                                <label for="">Lastname:</label>
                                <input required type="text" class="form-control" name="lname" id="lname">
                            </div>
                            <div class="col-md">
                                <label for="">Firstname:</label>
                                <input required type="text" class="form-control" name="fname" id="fname">
                            </div>
                            <div class="col-md">
                                <label for="">Middlename:</label>
                                <input required type="text" class="form-control" name="mname" id="mname">
                            </div>
                            <div class="col-sm-2">
                                <label for="">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <!-- primary info -->
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="">Birth date:</label>
                                <input required type="date" class="form-control" name="b_date" id="age">
                            </div>
                            <div class="col-md">
                                <label for="">Birth place:</label>
                                <input required type="text" class="form-control" name="b_place" id="age">
                            </div>
                            <div class="col-md">
                                <label for="">Age:</label>
                                <input required type="number" class="form-control" name="age" id="age">
                            </div>
                            <div class="col-md">
                                <label for="Education">Education</label>
                                <select name="education" id="education" name="education" class="form-control">
                                    <option value="None">None</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Highschool Graduate">Highschool Graduate</option>
                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md">
                                <label for="">Religion:</label>
                                <input required type="text" class="form-control" name="religion" id="religion">
                            </div>
                            <div class="col-md">
                                <label for="">Nationality:</label>
                                <input required type="text" class="form-control" name="nationality" id="nationality">
                            </div>
                            <div class="col-md">
                                <label for="">Civil Status:</label>
                                <select name="civilStatus" id="civilStatus" class="form-control">
                                    <?php
                                    $list = array("Married", "Widowed", "Separated", "Divorced", "Single");
                                    foreach ($list as $status) {
                                    ?>
                                        <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="occupation">Occupation:</label>
                                <input required type="text" class="form-control" name="occupation" id="occupation">
                            </div>
                            <div class="col-md">
                                <label for="occupation">Monthly Income:</label>
                                <input required type="number" class="form-control" name="income" id="income">
                            </div>
                            <div class="col-md">
                                <label for="household">Household:</label>
                                <select name="household" id="household" class="form-control">
                                    <?php
                                    $query = run_query("SELECT * FROM household");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php
                                            echo "Household No. " . $row['number']
                                                . " Zone " . $row['zone'];
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="">Health Condition:</label>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Normal</label>
                                        <input required type="radio" class="" value="Normal" name="condition" id="condition">
                                    </div>
                                    <div class="col">
                                        <label for="">PWD</label>
                                        <input required type="radio" class="" value="PWD" name="condition" id="condition">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="blood">Blood Type:</label>
                                <select name="blood" id="blood" class="form-control">
                                    <option value="AB">AB</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="relationship">Relationship to head</label>
                                <select id="relationship" name="relationship" class="form-control">
                                    <option value="None">None</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Father">Father</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- view modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Resident Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="residents_add.php" method="POST" enctype="multipart/form-data">
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

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Resident</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="residents_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="id">
                    <!-- photo preview -->
                    <div class="form-group mb-3 text-dark">
                        <div class="row mb-2 align-items-baseline">
                            <div class="col-md">
                                <label for="">Lastname:</label>
                                <input required type="text" class="form-control" name="lname" id="edit_lname">
                            </div>
                            <div class="col-md">
                                <label for="">Firstname:</label>
                                <input required type="text" class="form-control" name="fname" id="edit_fname">
                            </div>
                            <div class="col-md">
                                <label for="">Middlename:</label>
                                <input required type="text" class="form-control" name="mname" id="edit_mname">
                            </div>
                            <div class="col-sm-2">
                                <label for="">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" id="edit_gender"></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <!-- primary info -->
                        <hr>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="">Birth date:</label>
                                <input required type="date" class="form-control" name="b_date" id="edit_bdate">
                            </div>
                            <div class="col-md">
                                <label for="">Birth place:</label>
                                <input required type="text" class="form-control" name="b_place" id="edit_bplace">
                            </div>
                            <div class="col-md">
                                <label for="">Age:</label>
                                <input required type="number" class="form-control" name="age" id="edit_age">
                            </div>
                            <div class="col-md">
                                <label for="Education">Education</label>
                                <select name="education" id="education" name="education" class="form-control">
                                    <option value="" id="edit_education"></option>
                                    <option value="None">None</option>
                                    <option value="College Graduate">College Graduate</option>
                                    <option value="Highschool Graduate">Highschool Graduate</option>
                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-md">
                                <label for="">Religion:</label>
                                <input required type="text" class="form-control" name="religion" id="edit_religion">
                            </div>
                            <div class="col-md">
                                <label for="">Nationality:</label>
                                <input required type="text" class="form-control" name="nationality" id="edit_nationality">
                            </div>
                            <div class="col-md">
                                <label for="">Civil Status:</label>
                                <select name="civilStatus" id="civilStatus" class="form-control">
                                    <option value="" id="edit_civil_status"></option>
                                    <?php
                                    $list = array("Married", "Widowed", "Separated", "Divorced", "Single");
                                    foreach ($list as $status) {
                                    ?>
                                        <option value="<?php echo $status ?>"><?php echo $status ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="occupation">Occupation:</label>
                                <input required type="text" class="form-control" name="occupation" id="edit_occupation">
                            </div>
                            <div class="col-md">
                                <label for="occupation">Monthly Income:</label>
                                <input required type="number" class="form-control" name="income" id="edit_income">
                            </div>
                            <div class="col-md">
                                <label for="household">Household:</label>
                                <select name="household" id="household" class="form-control">
                                    <option value="" id="edit_household"></option>
                                    <?php
                                    $query = run_query("SELECT * FROM household");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row['id'] ?>">
                                            <?php
                                            echo "Household No. " . $row['number']
                                                . " Zone " . $row['zone'];
                                            ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <label for="">Health Condition:</label>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Normal</label>
                                        <input required type="radio" class="" value="Normal" name="condition" id="normal_condition">
                                    </div>
                                    <div class="col">
                                        <label for="">PWD</label>
                                        <input required type="radio" class="" value="PWD" name="condition" id="pwd_condition">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="blood">Blood Type:</label>
                                <select name="blood" id="blood" class="form-control">
                                    <option value="" id="edit_blood"></option>
                                    <option value="AB">AB</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <label for="relationship">Relationship to head</label>
                                <select id="relationship" name="relationship" class="form-control">
                                    <option value="" id="edit_relationship"></option>
                                    <option value="None">None</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Father">Father</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Deleting Resident</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="residents_delete.php" method="POST">

                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="" alt="" class="img-fluid img-preview" id="del_img_preview">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center name"></h5>
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

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Resident's Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="residents_photo_upload.php" enctype="multipart/form-data" method="POST">

                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="" alt="" class="img-fluid img-preview" id="img_preview">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center name"></h5>
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <label for="edit_fileBox">Photo: </label>
                            </div>
                            <div class="col">
                                <input required type="file" name="file" id="edit_fileBox" class="form-control-file">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-sm btn-primary rounded-0"><i class="fa fa-save"></i> Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- view image modal -->
<div class="modal fade" id="viewImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Resident's Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="residents_photo_upload.php" enctype="multipart/form-data" method="POST">

                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="" alt="" class="img-fluid img-preview" id="view_img_preview">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center name"></h5>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- clearance modal -->
<div class="modal fade" id="clearanceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-75">
                    <div class="col">
                        <h5 class="modal-title" id="exampleModalLabel">Baranggay Clearance</h5>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 position-relative" style="overflow: scroll;">

                <div class="row mb-2">
                    <div class="col-auto">
                        <button onclick="printClearance()" type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
                <!-- get baranggay info -->
                <?php
                $query = run_query("SELECT * FROM baranggay");
                $baranggay = $query->fetch_assoc();
                $query = run_query("SELECT * FROM officials INNER JOIN positions ON officials.position = positions.id WHERE positions.description LIKE '%Captain%'");
                $captain = $query->fetch_assoc();
                ?>
                <p class="text-center text-black-50"><small><i class="fa fa-info-circle"></i> Kindly review the form before printing.</small></p>
                <!-- form -->
                <div class="card shadow mx-auto position-relative b_form" id="clearance_form">
                    <div class="card-body p-5 d-flex flex-column ">
                        <div class="row justify-content-center form-header">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <img src="<?php echo $baranggay['baranggayLogo'] ?>" alt="" class="img-fluid logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <p class="text-capitalize">Republic of the Philippines</p>
                                    <p class="text-capitalize">Province of <?php echo $baranggay['province'] ?></p>
                                    <p class="text-capitalize">Municipality of <?php echo $baranggay['city'] ?></p>
                                    <p class="text-uppercase">
                                        <strong>Baranggay <?php echo $baranggay['name'] ?></strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <img src="<?php echo $baranggay['cityLogo'] ?>" alt="" class="img-fluid logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="bg-dark">
                        <hr class="bg-info"> -->
                        <div class="border-bottom mt-3"></div>
                        <div class="border-bottom border-info mb-4 mt-3"></div>
                        <p class="text-uppercase text-center">
                            office of the sangguniang baranggay
                        </p>
                        <h4 class="text-center"><strong>BARANGGAY CLEARANCE</strong></h4>

                        <!-- city logo in background -->
                        <!-- <div class="row bg_logo position-absolute justify-content-center">
                            <div class="col-8 mt-5 mx-auto">
                                <img src="<?php echo $baranggay['baranggayLogo'] ?>" alt="" class="img-fluid" >
                            </div>
                        </div> -->

                        <p class="mt-5">TO WHOM IT MAY CONCERN</p>
                        <p style="text-indent: 2rem;">
                            This is to certify that <strong><span id="resident_name"></span></strong> of legal age,
                            <span id="civil_status"></span>, <span id="nationality"></span>, is a bonafide
                            resident of <strong><span id="street"></span></strong> Baranggay <?php echo $baranggay['name'] ?>,
                            <?php echo $baranggay['city'] ?>, and that he/she has no derogatory/criminal records filed
                            in this Baranggay.
                        </p>
                        <p class="mt-4">
                            Issued this <?php echo date("d") . 'th' ?> day of <?php echo date("F") ?>.
                        </p>
                        <!-- <div class="row justify-content-end position-absolute" style="bottom:10px;right:10px;"> -->
                        <div class="row justify-content-end mx-2 mt-auto">
                            <div class="col-auto text-center">
                                <p class="mb-0 text-uppercase"><strong><?php echo $captain['firstname'] . ' ' . $captain['middlename'][0] . '. ' . $captain['lastname'] ?></strong></p>
                                <p class="my-0">PUNONG BARANGGAY</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button onclick="printClearance()" type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<!-- indigency modal -->
<div class="modal fade" id="indigencyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-75">
                    <div class="col">
                        <h5 class="modal-title" id="exampleModalLabel">Baranggay Indigency</h5>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5 position-relative" style="overflow: scroll;">

                <div class="row mb-2">
                    <div class="col-auto">
                        <button onclick="printIndigency()" type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
                <p class="text-center text-black-50"><small><i class="fa fa-info-circle"></i> Kindly review the form before printing.</small></p>
                <!-- form -->
                <div class="card shadow mx-auto position-relative b_form" id="indigency_form">
                    <div class="card-body p-5 d-flex flex-column ">
                        <div class="row justify-content-center form-header">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <img src="<?php echo $baranggay['baranggayLogo'] ?>" alt="" class="img-fluid logo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center">
                                    <p class="text-capitalize">Republic of the Philippines</p>
                                    <p class="text-capitalize">Province of <?php echo $baranggay['province'] ?></p>
                                    <p class="text-capitalize">Municipality of <?php echo $baranggay['city'] ?></p>
                                    <p class="text-uppercase">
                                        <strong>Baranggay <?php echo $baranggay['name'] ?></strong>
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <img src="<?php echo $baranggay['cityLogo'] ?>" alt="" class="img-fluid logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="bg-dark">
                        <hr class="bg-info"> -->
                        <div class="border-bottom mt-3"></div>
                        <div class="border-bottom border-info mb-4 mt-3"></div>
                        <p class="text-uppercase text-center">
                            office of the sangguniang baranggay
                        </p>
                        <h4 class="text-center"><strong>CERTIFICATE OF INDIGENCY</strong></h4>

                        <p class="mt-5">TO WHOM IT MAY CONCERN</p>
                        <p class="text-justify" style="text-indent: 2.5rem;">
                            This is to certify that <strong><span id="resident_name"></span></strong> of legal age,
                            <span id="civil_status"></span>, <span id="nationality"></span>, is a
                            resident of <?php echo $baranggay['name'] ?>,
                            <?php echo $baranggay['city'] ?>, <?php echo $baranggay['province'] ?>and belongs to one of the Indigent family in the barangay.
                        </p>
                        <p>
                            This certification is being issued upon request of the above-named person for
                            <strong> <span id="purpose"></span></strong>.
                        </p>
                        <p class="mt-2">
                            Issued this <?php echo date("d") . 'th' ?> day of <?php echo date("F") . ', ' . date("Y") ?> at
                            <?php echo $baranggay['name'] . ' ' . $baranggay['city'] . ', ' . $baranggay['province'] ?>
                        </p>
                        <!-- <div class="row justify-content-end position-absolute" style="bottom:10px;right:10px;"> -->
                        <div class="row justify-content-end mx-2 mt-auto">
                            <div class="col-auto text-center">
                                <p class="mb-0 text-uppercase"><strong><?php echo $captain['firstname'] . ' ' . $captain['middlename'][0] . '. ' . $captain['lastname'] ?></strong></p>
                                <p class="my-0">PUNONG BARANGGAY</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button onclick="printIndigency()" type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<!-- loader modal -->
<div class="modal fade" id="loaderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-75">
                    <div class="col">
                        <h5 class="modal-title" id="exampleModalLabel">Processing</h5>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <p>Please wait...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- purpose modal -->
<div class="modal fade" id="purposeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-75">
                    <div class="col">
                        <h5 class="modal-title" id="exampleModalLabel">Baranggay Indigency</h5>
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="purposeForm">
                    <div class="form-group">
                        <input type="hidden" name="" class="residentBox">
                        <label for="purposeBox">Purpose:</label>
                        <input required type="text" class="form-control" id="purposeBox" placeholder="ex: Educational Assistance">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- payment modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row w-75">
                    <div class="col">
                        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                    </div>
                </div>
                <button type="button" class="close" onclick="closeModals()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="payment_form">
                    <div class="form-group">
                        <input type="hidden" name="" class="residentBox">
                        <label for="amountBox">Amount:</label>
                        <input required type="number" class="form-control" id="amountBox">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- print id modal -->
<div class="modal fade" id="print-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog rounded">
        <div class="modal-content">
            <div class="modal-body rounded ">
                <div id="resident-id">
                    <div class="card border-none" style="border:none">
                        <div class="card-header bg-danger border-none" style="border:none">
                            <div class="">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="<?php echo $baranggay['baranggayLogo'] ?>" class="rounded-circle img-fluid" alt="">
                                    </div>
                                    <div class="col text-white">
                                        <p class="my-1"><small>Republic of the Philippines</small></p>
                                        <p class="my-1"><small>Municipality of <?php echo $baranggay['city'] ?></small></p>
                                        <p class="my-1"><small>Baranggay <?php echo $baranggay['name'] ?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-none" style="height: 500px;border:none">
                            <p class="text-center text-danger fw-bold">e-HEALTH PASS</p>
                            <div id="resident-info-id">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text mt-3">
                    <button type="button" id="print-id" class="btn btn-primary">Print ID <i class="fa fa-print"></i></button>
                </div>
                <div class="mt-3 text-right">
                    <a href="#" class="link-primary " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="fs-6">Close</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- <script src="..\assets\jsPDF-master\dist\jspdf.umd.min.js"></script> -->
<script>
    var url = "";
    var paymentPurpose = "";
    $(document).on("change", "fileBox", function(e) {
        alert('chaged')
        $("#img_preview").attr("src", URL.createObjectURL(e.target.files[0]).blob)
    })
    document.getElementById("fileBox").onchange = function(e) {
        console.log('changed: ', URL.createObjectURL(e.target.files[0]))
        $("#img-preview").attr("src", URL.createObjectURL(e.target.files[0]))
    }
    document.getElementById("edit_fileBox").onchange = function(e) {
        $("#img_preview").attr("src", URL.createObjectURL(e.target.files[0]))
    }

    const printClearance = async () => {
        $("#loaderModal").modal("show");
        var element = document.getElementById('clearance_form');
        var opt = {
            margin: 0,
            padding: 0,
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: "in",
                format: "letter",
                orientation: 'portrait',
            }
        };
        html2pdf().set(opt).from(element).toPdf().get('pdf').then(function(pdfObj) {
            // pdfObj has your jsPDF object in it, use it as you please!
            // For instance (untested):
            pdfObj.autoPrint();
            url = pdfObj.output('bloburl')
            paymentPurpose = "Baranggay Clearance";
            $("#paymentModal").modal("show");
        });
    }
    const printIndigency = async () => {
        $("#loaderModal").modal("show");
        var element = document.getElementById('indigency_form');
        var opt = {
            margin: 0,
            padding: 0,
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: "in",
                format: "letter",
                orientation: 'portrait',
            }
        };
        html2pdf().set(opt).from(element).toPdf().get('pdf').then(function(pdfObj) {
            // pdfObj has your jsPDF object in it, use it as you please!
            // For instance (untested):
            pdfObj.autoPrint();
            url = pdfObj.output('bloburl')
            paymentPurpose = "Baranggay Indigency";
            $("#paymentModal").modal("show");
        });

    }

    const pay = (resident, amount) => {
        var d = new Date();

        var ampm = d.getHours() >= 12 ? 'pm' : 'am';
        var hours = d.getHours() % 12;
        hours = hours ? hours : 12;
        var minutes = d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes();
        $.ajax({
            type: 'POST',
            url: "payment_add.php",
            data: {
                add: "true",
                resident,
                amount,
                purpose: paymentPurpose,
                // date: `${d.getFullYear()}-${d.getMonth() + 1}-${d.getDate()}`,
                // time: `${hours}:${minutes} ${ampm}`
            },
            success: (res) => {
                console.log(res);
            }
        })
    }

    $(document).on('submit', '#purposeForm', function(e) {
        e.preventDefault();
        $("#indigencyModal #purpose").html($("#purposeBox").val());
        var resident = $(".residentBox").val();
        $("#purposeModal").modal("hide");

        setTimeout(() => $("#indigencyModal").modal("show"), 1000);
    })
    $(document).on('submit', '#payment_form', function(e) {
        e.preventDefault();
        var resident = $(".residentBox").val();
        var amount = $("#payment_form #amountBox").val();
        pay(resident, amount);
        $("#paymentModal").modal("hide");
        $("#clearanceModal").modal("hide");
        $("#loaderModal").modal("show");
        setTimeout(() => {
            $("#loaderModal").modal("hide")
            $("#indigencyModal").modal("hide");
            window.open(url, "_blank");
        }, 3000);
    })
    const closeModals = () => {
        $("#clearanceModal").modal("hide");
        $("#indigencyModal").modal("hide");
        $("#loaderModal").modal("hide");
    }
</script>