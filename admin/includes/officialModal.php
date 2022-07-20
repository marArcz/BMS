<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="official_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="uploads/profile.jpg" alt="" class="img-fluid" id="img-preview">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="fileBox">Photo: </label>
                            </div>
                            <div class="col">
                                <input type="file" name="file" id="fileBox" class="form-control-file">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="pos">Position: </label>
                            </div>
                            <div class="col-sm">
                                <select name="position" id="pos" class="form-control">
                                    <?php
                                    $query = run_query("SELECT * FROM positions WHERE description != 'Kagawad'");
                                    while ($row = $query->fetch_assoc()) {
                                        $id = $row['id'];
                                        $official = prep_stmt("SELECT * FROM officials WHERE position = ?");
                                        $official->bind_param("i", $id);
                                        $official->execute();
                                        $res = $official->get_result();
                                        if ($res->num_rows == 0) {
                                    ?>
                                            <option value="<?php echo $row['id'] ?>">Brgy. <?php echo $row['description'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    $query = run_query("SELECT * FROM positions WHERE description = 'Kagawad'");
                                    $pos = $query->fetch_assoc();

                                    echo "<option value=" . $pos['id'] . ">Brgy. " . $pos['description'] . "</option>";
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="fname">First name: </label>
                            </div>
                            <div class="col-sm">
                                <input type="text" id="fname" name="fname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="mname">Middle name: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="mname" name="mname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="lname">Last name: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="lname" name="lname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="age">Age: </label>
                            </div>
                            <div class="col">
                                <input type="number" id="age" name="age" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="gender">Gender: </label>
                            </div>
                            <div class="col">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" name="add" class="btn btn-sm btn-primary rounded-0"> <i class="fa fa-save"></i> Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="official_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group mb-3">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="pos">Position: </label>
                            </div>
                            <div class="col-sm">
                                <select name="position" id="pos" class="form-control">
                                    <option value="" id="edit_pos"></option>
                                    <?php
                                    $query = run_query("SELECT * FROM positions WHERE description != 'Kagawad'");
                                    while ($row = $query->fetch_assoc()) {
                                        $id = $row['id'];
                                        $official = prep_stmt("SELECT * FROM officials WHERE position = ?");
                                        $official->bind_param("i", $id);
                                        $official->execute();
                                        $res = $official->get_result();
                                        if ($res->num_rows == 0) {
                                    ?>
                                            <option value="<?php echo $row['id'] ?>">Brgy. <?php echo $row['description'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    $query = run_query("SELECT * FROM positions WHERE description = 'Kagawad'");
                                    $pos = $query->fetch_assoc();

                                    echo "<option value=" . $pos['id'] . ">Brgy. " . $pos['description'] . "</option>";
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_fname">First name: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="edit_fname" name="fname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_mname">Middle name: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="edit_mname" name="mname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_lname">Last name: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="edit_lname" name="lname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_age">Age: </label>
                            </div>
                            <div class="col">
                                <input type="number" id="edit_age" name="age" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="gender">Gender: </label>
                            </div>
                            <div class="col">
                                <select name="gender" id="" class="form-control">
                                    <option value="" id="edit_gender"></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
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
                <h5 class="modal-title" id="exampleModalLabel">Deleting Official</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="official_delete.php" method="POST">

                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="" alt="" class="img-fluid img-preview" id="del_img_preview">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center official_name"></h5>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Official's Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="official_photo_upload.php" enctype="multipart/form-data" method="POST">

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
                                <input type="file" name="file" id="edit_fileBox" class="form-control-file">
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

<script>
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
</script>