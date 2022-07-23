<?php
    if(isset($_POST['save'])){
    
        session_start();
        require("./includes/conn.php");
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $votersID = $_POST['votersID'];
        $pass = $_POST['pass'];
        $id = $_POST['id'];
        $baranggay = $_POST['baranggay'];
        $sql="UPDATE voters SET firstname=?,middlename=?,lastname=?,gender=?,votersID=?,password=?,baranggayID=? WHERE id =?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssssisii",
                $fname,$mname,$lname,$gender,$votersID,$pass,$baranggay,$id 
            );
            if($query->execute()){
                $_SESSION['success'] = "Voter updated successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: voters.php");
    }
?>
