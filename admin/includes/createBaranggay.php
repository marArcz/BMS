<div class="modal fade show" id="add-baranggay-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Baranggay Information</h5>
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
                                <label for="city">City: </label>
                            </div>
                            <div class="col">
                                <input required type="text" id="city" name="city" class="form-control mb-2" required>
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
                        <hr>
                        <label for="b_logo">Baranggay Logo <small>(optional)</small>: </label>
                        <input type="file" id="b_logo" name="baranggayLogo" class="form-control-sm form-control form-control-file mb-2">
                        <label for="city">City Logo <small>(optional)</small>: </label>
                        <input type="file" id="c_logo" name="cityLogo" class=" form-control-sm form-control form-control-file mb-2">
                    </div>

                    <div class="d-flex" style="justify-content: end;">
                        <!-- <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Close</button> -->
                        <button type="submit" name="add" class="btn btn-sm btn-primary rounded-0"> <i class="fa fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>