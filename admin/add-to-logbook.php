<?php
    include("./includes/conn.php");
    $id = $_POST['id'];

    $query = run_query("SELECT *, CONCAT(lastname,', ',firstname,' ',middlename) AS fullname FROM residents WHERE id = $id");
    $resident = $query->fetch_assoc();
    
    $resPhoto = $resident['photo'];
    $resName = $resident['fullname'];
    $query = run_query("INSERT INTO logbook(photo,residentName) VALUES('$resPhoto', '$resName')");
    if($query){
        echo "Success";
    }else{
        echo $mysqli->error;
    }
?>