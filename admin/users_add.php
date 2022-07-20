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
        $gender = $_POST['gender'];

        $address = $_POST['address'];
        $type = $_POST['type'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $sql="INSERT INTO users VALUES(null, ?,?,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssssssi",
                $fname,$gender,$address,$uname,$pass,$target_file,$type
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'], "Added a system user");
                $_SESSION['success'] = "System User added successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: users.php");
    }
?>
