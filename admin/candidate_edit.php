<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $posID = $_POST['position'];
        $id = $_POST['id'];
        $sql="Update candidate SET firstname=?,middlename=?,lastname=?,gender=?,positionID=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssssii",
                $fname,$mname,$lname,$gender,$posID,$id
            );
            if($query->execute()){
                $_SESSION['success'] = "Candidate updated successfully";
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
