<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $pos = $_POST['position'];
        $id = $_POST['id'];

        $sql="UPDATE officials SET firstname=?,middlename=?,lastname=?,age=?,gender=?,position=? WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssissi",
                $fname,$mname,$lname,$age,$gender,$pos,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Updated a baranggay official's record");
                $_SESSION['success'] = "Official updated successfully";
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
