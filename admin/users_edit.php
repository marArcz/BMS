<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $type = $_POST['type'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $id = $_POST['id'];
        $sql="UPDATE users SET fullname=?,gender=?,address=?,username=?,password=?,type=? WHERE id= ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssssii",
                $fname,$gender,$address,$uname,$pass,$type,$id
            );
            if($query->execute()){
                $_SESSION['success'] = "User updated successfully";
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
