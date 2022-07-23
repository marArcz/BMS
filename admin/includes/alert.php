<?php
if (isset($_SESSION['success'])) {
?>
    <div class="alert alert-light alert-dismissible fade show py-2 mx-3 custom-alert border-left border-success border-bottom-0 border-right-0 border-top-0" role="alert">
        <h5 class="text-success"><strong class="d-flex align-items-center">
                <i class="bx bx-md bx-check-circle me-2"></i>
                <span>Success</span></strong>
        </h5>
        <p class="mb-0"><?php echo $_SESSION['success'] ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>



<?php
} else if (isset($_SESSION['error'])) {

?>
    <div class="alert alert-light alert-dismissible fade show py-2 mx-3 custom-alert border-left border-danger border-bottom-0 border-right-0 border-top-0" role="alert">
        <h5 class="text-danger"><strong class="d-flex align-items-center">
                <i class="bx bx-md bx-check-circle me-2"></i>
                <span>Failed</span></strong>
        </h5>
        <p class="mb-0"><?php echo $_SESSION['error'] ?></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>

<?php

?>