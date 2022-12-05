<?php 
    include '../conn/conn.php';
    
    $resident_id = $_POST['id'];

    $target_dir = "assets/documents/";

    if (is_uploaded_file($_FILES['file']['tmp_name'][0])) {
        $attachments = $_FILES['file'];
        if (count($attachments) > 0) {
            for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {
                $target_file = $target_dir . basename($_FILES["file"]["name"][$i]);

                move_uploaded_file($_FILES["file"]["tmp_name"][$i], "../" . $target_file) or die("Error uploading image!");

                run_query("INSERT INTO resident_files(resident_id,file) VALUES($resident_id,'$target_file')");
            }
        }
    }

    header("location: filebox.php?id=$resident_id");
?>