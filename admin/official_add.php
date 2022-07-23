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
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $pos = $_POST['position'];

        $sql="INSERT INTO officials VALUES(null,?,?,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssisss",
                $fname,$mname,$lname,$age,$gender,$pos,$target_file,
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Added a new baranggay official");
                $_SESSION['success'] = "Official added successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: officials.php");
    }
?>
