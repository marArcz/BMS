<?php
include "./includes/conn.php";
$id = $_POST['id'];

$query = run_query("SELECT *,CONCAT(lastname, ', ',firstname,' ', middlename) AS fullname FROM residents WHERE id = $id");

?>

<?php
if ($query->num_rows > 0) {
    $resident = $query->fetch_assoc();
?>
    <div class="modal-body">
        <h5 class="">Scanner Result</h5>
        <hr>
        <div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <img src="<?php echo $resident['photo'] ?>" alt="" class="img-fluid img-thumbnail">
                </div>
                <div class="col">
                    <p class="fs-5 fw-bold"><?php echo $resident['fullname'] ?></p>
                    <p>Age: <?php echo $resident['age'] ?></p>
                    <h6 class="mt-4">Local Resident</h6>
                </div>

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-default mr-3" ><span class="text-primary " data-dismiss="modal">Rescan</span></button>
        <button class="btn btn-success" id="confirm-scan" data-id="<?php echo $id ?>">Confirm</button>
    </div>
<?php
} else {
?>
    <div class="modal-body">
        <h5 class="">Scanner Result</h5>
        <hr>
        <p class="text-center text-danger">No resident found</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-default mr-3"><span class="text-primary " data-dismiss="modal">Rescan</span></button>
    </div>
<?php
}
?>

<script>
    $("#confirm-scan").click(function() {
        const id = $(this).attr('data-id')
        $.ajax({
            url: "add-to-logbook.php",
            method: "POST",
            data: {
                id
            },
            success: function(res) {
                // alert(res)
                $("#result-modal").modal("hide");
                new Toast({message: 'Successfully recorded!'});
            }
        })
    })
</script>