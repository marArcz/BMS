<?php
    if(isset($_POST['add'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        if(!empty(basename($_FILES["file"]["name"]))){
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        }else{
            $target_file = $target_dir."profile.jpg";
        }
        session_start();
        require("./includes/conn.php");
        
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender =$_POST['gender'];
        $posID = $_POST['position'];
        $baranggay = $_POST['baranggay'];
        $sql="INSERT INTO candidate VALUES(null, ?,?,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssssisi",
                $fname,$mname,$lname,$gender,$posID,$target_file,$baranggay
            );
            if($query->execute()){
                $_SESSION['success'] = "Candidate added successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: candidates.php");
    }
?>
