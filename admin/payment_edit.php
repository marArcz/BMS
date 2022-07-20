<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $resident = $_POST['resident'];
        $purpose = $_POST['purpose'];
        $amount = $_POST['amount'];
        $id = $_POST['id'];
        $sql="UPDATE payments SET residentID=?,amount=?,purpose=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "sssi",
                $resident,$amount,$purpose,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Added a payment");
                $_SESSION['success'] = "Payment was updated successfully";
                
            }
            else{
                echo $mysqli->error;
            }
        }else{
            echo $mysqli->error;
        }
        header("Location: payments.php");
    }
?>
