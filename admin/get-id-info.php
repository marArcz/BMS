<?php
if (isset($_POST['resId'])) {
    include "./includes/conn.php";
    session_start();

    // get resident info 
    $query = run_query("SELECT *, CONCAT(lastname, ', ',firstname,' ', middlename) AS fullname FROM residents WHERE id = " . $_POST['resId']);
    // if no resident found with the id 
    if ($query->num_rows == 0) {
        // redirect back to residents page 
        header("Location: residents.php");
    }

    $resident = $query->fetch_assoc();

    $getBaranggay = run_query("SELECT * FROM baranggay");
    $baranggay = $getBaranggay->fetch_assoc();

}
?>

<div class="row justify-content-center mb-4">
    <div class="col-4">
        <img src="<?php echo $resident['photo'] ?>" alt="" class="img-fluid img-thumbnail">
    </div>
</div>
<div class="row">
    <div class="col">
        <h5><?php echo $resident['fullname'] ?></h5>
        <p>Age: <?php echo $resident['age'] ?></p>
        <h6 class="mt-4">Local Resident</h6>
        <div class="mb-4">
            <p class="my-1">Date issued: <?php echo date("M d, Y") ?></p>
        </div>
        <div>
            <p class="my-1">Current Address: <span><?php echo $baranggay['name'] . " " . $baranggay['city'] . ", " . $baranggay['province'] ?></span></p>
        </div>
    </div>
    <div class="col-4">
        <div id="qr-code" ></div>
    </div>
</div>