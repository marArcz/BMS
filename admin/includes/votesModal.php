<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deleting Candidate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="votes_delete.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="hidden" name="id" class="id">
                        <h5 class="text-black text-center" id="position">
                        <h5 class="text-black text-center" id="candidate"></h5>
                        <h5 class="text-black text-center" id="voter"></h5>
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

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reset Votes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="votes_reset.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="hidden" name="id" class="id">
                        <!-- <p class="text-danger">Reset voting and delete all the votes?</p> -->
                        <!-- <p class="text-center">Choose the baranggay where you want to reset the votes.</p> -->
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="bar">Baranggay: </label>
                            </div>
                            <div class="col">
                                <select name="baranggay" id="bar" class="form-control">
                                    <option value="">All</option>
                                    <?php 
                                        $query = run_query("SELECT * FROM baranggay");
                                        while($row = $query->fetch_assoc()){
                                    ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['description'] ?></option>
                                    <?php  
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <p class="mt-2 text-danger text-center"><small><i class="fa fa-info-circle"></i> Warning This action cannot be undone.</small></p>
                    </div>

                    <div class="d-flex" style="justify-content: space-between;">
                        <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                        <button type="submit" name="delete" class="btn btn-sm btn-danger rounded-0"> <i class="fa fa-trash"></i> Confirm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>