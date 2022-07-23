<?php
    if(isset($_POST['save'])){
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
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $id = $_POST['id'];
        $sql="UPDATE users SET fullname=?,gender=?,address=?,username=?,password=?,photo=? WHERE id= ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssssssi",
                $fname,$gender,$address,$uname,$pass,$target_file,$id
            );
            if($query->execute()){
                LogAction($_SESSION['account_id'], "Updated account information");
                $_SESSION['success'] = "Account was updated successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: ". $_GET['return']);
    }
