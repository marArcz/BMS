<?php
    if(isset($_POST['save'])){
        require("./includes/conn.php");
        session_start();
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $uname = $_POST['uname'];
        $id = $_POST['id'];
        
        if($query = prep_stmt("UPDATE admin SET fullname=?,gender=?,username=? WHERE id = ?")){
            $query->bind_param('sssi',
                $fname,$gender,$uname,$id
            );
            if($query->execute()){
                $_SESSION['success'] = "Admin updated successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: admin.php");
    }
?>
