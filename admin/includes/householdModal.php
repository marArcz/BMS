<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Household</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="household_add.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="number">Household No: </label>
                            </div>
                            <div class="col">
                                <input type="number" id="number" name="number" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="zone">Zone: </label>
                            </div>
                            <div class="col">
                                <input type="text" name="zone" id="zone" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="family">Total No. Of Family: </label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="family" id="family">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="head">Family Head: </label>
                            </div>
                            <div class="col">
                                <select class="form-control" name="head" id="head" required>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"> Close</button>
                        <button type="submit" name="add" class="btn btn-sm btn-primary rounded-0">  Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Household</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="household_edit.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id" class="id">
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_number">Household No: </label>
                            </div>
                            <div class="col">
                                <input type="number" id="edit_number" name="number" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="edit_zone">Zone: </label>
                            </div>
                            <div class="col">
                                <input type="text" name="zone" id="edit_zone" required class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="edit_family">Total No. Of Family: </label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="family" id="edit_family">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="head">Family Head: </label>
                            </div>
                            <div class="col">
                                <select class="form-control" name="head" id="head" required>
                                    <option value="" id="edit_head"></option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"> Close</button>
                        <button type="submit" name="save" class="btn btn-sm btn-primary rounded-0">  Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Household</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="household_delete.php" method="POST">

                    <div class="form-group mb-3">
                        <input type="hidden" name="id" class="id">
                        <h5>Household #:</h5>
                        <h5 class="text-black text-center number"></h5>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"> Cancel</button>
                        <button type="submit" name="delete" class="btn btn-sm btn-danger rounded-0"> <i class="fa fa-trash"></i> Delete</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- image modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User's Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="users_photo_upload.php" enctype="multipart/form-data" method="POST">

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
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"> Cancel</button>
                        <button type="submit" name="save" class="btn btn-sm btn-primary rounded-0"> Save</button>
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