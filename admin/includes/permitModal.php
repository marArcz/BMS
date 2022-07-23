<!-- add modal -->
<div class="modal fade shadow" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Permit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="permit_add.php" method="POST">
                    <div class="form-group mb-3">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="desc">Resident: </label>
                            </div>
                            <div class="col">
                                <select name="resident" id="res" class="form-control">
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
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="bname">Business Name: </label>
                            </div>
                            <div class="col">
                              <input required type="text" class="form-control" name="bname" id="bname">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="btype">Business Type: </label>
                            </div>
                            <div class="col">
                              <input required type="text" class="form-control" name="btype" id="btype">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="baddress">Business Address: </label>
                            </div>
                            <div class="col">
                              <input required type="text" class="form-control" name="baddress" id="baddress">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="ornumber">OR Number: </label>
                            </div>
                            <div class="col">
                              <input required type="number" class="form-control" name="ornumber" id="ornumber">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="amount">Amount: </label>
                            </div>
                            <div class="col">
                              <input required type="number" class="form-control" name="amount" id="amount">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-sm btn-primary rounded-0">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit -->
<div class="modal fade shadow" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Permit Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="permit_edit.php" method="POST">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group mb-3">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="desc">Resident: </label>
                            </div>
                            <div class="col">
                                <select name="resident" id="res" class="form-control">
                                    <option value="" id="edit_resident"></option>
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
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="bname">Business Name: </label>
                            </div>
                            <div class="col">
                              <input required type="text" class="form-control" name="bname" id="edit_bname">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="btype">Business Type: </label>
                            </div>
                            <div class="col">
                              <input required type="text" class="form-control" name="btype" id="edit_btype">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="baddress">Business Address: </label>
                            </div>
                            <div class="col">
                              <input required type="text" class="form-control" name="baddress" id="edit_baddress">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="ornumber">OR Number: </label>
                            </div>
                            <div class="col">
                              <input required type="number" class="form-control" name="ornumber" id="edit_ornumber">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <label for="amount">Amount: </label>
                            </div>
                            <div class="col">
                              <input required type="number" class="form-control" name="amount" id="edit_amount">
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
                <form action="permit_delete.php" method="POST">
                    <div class="form-group mb-3">
                        <p class="text-black-50 text-center"><small>
                            <span class="text-danger"><i class="fa fa-info-circle"></i> Note: </span>
                            This action cannot be undone.
                        </small></p>
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center bname"></h5>
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