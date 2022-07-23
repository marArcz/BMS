<!-- edit modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="account_edit.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="account_id">
                    <div class="form-group mb-3">
                        <p id="lblTxt" class="text-danger text-center"></p>
                        <div class="row justify-content-center mb-0 mt-0">
                            <div class="col-md-4 text-center">
                                <img src="uploads/profile.jpg" alt="" class="img-fluid" id="account_img_preview">
                                <label for="account_fileBox" class="btn p-0 mb-0"><span class="bx-camera bx bx-md"></span></label>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-0 mt-0 d-none">
                            <div class="col-sm-4">
                                <label for="fileBox">Photo: </label>
                            </div>
                            <div class="col">
                                <input type="file" name="file" id="account_fileBox" class="form-control-file">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="edit_fname">Name: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="account_fname" name="fname" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="edit_pass">Gender: </label>
                            </div>
                            <div class="col">
                                <select name="gender" id="" class="form-control">
                                    <option value="" id="account_gender"></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_pass">Address: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="account_address" name="address" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_uname">Username: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="account_uname" name="uname" class="form-control mb-2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="edit_pass">Password: </label>
                            </div>
                            <div class="col">
                                <input type="text" id="account_pass" name="pass" class="form-control mb-2" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Close</button>
                        <button type="submit" name="save" class="btn btn-sm btn-primary rounded-0">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>