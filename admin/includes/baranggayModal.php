<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Baranggay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="baranggay_add.php" method="POST">
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="desc">Baranggay Name: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="desc" name="name" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="b_logo">Baranggay Logo(optional): </label>
                            </div>
                            <div class="col">
                                <input type="file" id="b_logo" name="baranggayLogo" class="form-control-file mb-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="city">City: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="city" name="city" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="city">City Logo(optional): </label>
                            </div>
                            <div class="col">
                                <input type="file" id="c_logo" name="cityLogo" class="form-control-file mb-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="province">Province: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="province" name="province" class="form-control mb-2" required>
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
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit baranggay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="baranggay_edit.php" method="POST">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_description">Name: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="edit_description" name="name" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_description">Province: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="edit_province" name="province" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_description">City: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="edit_city" name="city" class="form-control mb-2" required>
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
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting baranggay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="baranggay_delete.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center" id="baranggay_name"></h5>
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

<!-- baranggay logo image modal -->

<div class="modal fade" id="b_imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Baranggay Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="baranggay_photo_upload.php" enctype="multipart/form-data" method="POST">

                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="" alt="" class="img-fluid img-preview" id="b_img_preview">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center name"></h5>
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <label for="edit_fileBox">Photo: </label>
                            </div>
                            <div class="col">
                                <input required type="file" name="file" id="b_edit_fileBox" class="form-control-file">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                        <button type="submit" name="baranggay" class="btn btn-sm btn-primary rounded-0"><i class="fa fa-save"></i> Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- city logo image modal -->
<div class="modal fade" id="c_imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change City Logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="baranggay_photo_upload.php" enctype="multipart/form-data" method="POST">

                    <div class="form-group mb-3">
                        <div class="row justify-content-center mb-2">
                            <div class="col-md-4">
                                <img src="" alt="" class="img-fluid img-preview" id="c_img_preview">
                            </div>
                        </div>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center name"></h5>
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <label for="edit_fileBox">Photo: </label>
                            </div>
                            <div class="col">
                                <input required type="file" name="file" id="c_edit_fileBox" class="form-control-file">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                        <button type="submit" name="city" class="btn btn-sm btn-primary rounded-0"><i class="fa fa-save"></i> Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
  
    // document.getElementById("fileBox").onchange = function(e) {
    //     console.log('changed: ', URL.createObjectURL(e.target.files[0]))
    //     $("#img-preview").attr("src", URL.createObjectURL(e.target.files[0]))
    // }
    document.getElementById("b_edit_fileBox").onchange = function(e) {
        // $("#c_img_preview").attr("src", URL.createObjectURL(e.target.files[0]))
        $("#b_img_preview").attr("src", URL.createObjectURL(e.target.files[0]))
    }
    document.getElementById("c_edit_fileBox").onchange = function(e) {
        $("#c_img_preview").attr("src", URL.createObjectURL(e.target.files[0]))
        // $("#b_img_preview").attr("src", URL.createObjectURL(e.target.files[0]))
    }
</script>
