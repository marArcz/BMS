<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="position_add.php" method="POST">
          <div class="form-group mb-3">
            <div class="row">
              <div class="col-sm-3">
                <label for="desc">Description: </label>
              </div>
              <div class="col">
                <input type="text" id="desc" name="description" class="form-control mb-2" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="max-vote">Max Vote: </label>
              </div>
              <div class="col">
                <input type="number" id="max-vote" name="maxVote" class="form-control mb-2" required>
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
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="position_edit.php" method="POST">
          <input type="hidden" class="id" name="id">
          <div class="form-group mb-3">
            <div class="row">
              <div class="col-sm-3">
                <label for="edit_description">Description: </label>
              </div>
              <div class="col">
                <input type="text" id="edit_description" name="description" class="form-control mb-2" required>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="edit_maxVote">Max Vote: </label>
              </div>
              <div class="col">
                <input type="number" id="edit_maxVote" name="maxVote" class="form-control mb-2" required>
              </div>
            </div>
          </div>

          <div class="d-flex" style="justify-content: space-between;">
            <button type="button" class="btn btn-sm btn-secondary rounded-0" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Deleting position</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="position_delete.php" method="POST">
          <div class="form-group mb-3">
            <input type="hidden" name="id" class="id">
            <h5 class="text-black text-center" id="position_name"></h5>
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