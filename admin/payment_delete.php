<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");
        $id = $_POST['id'];
        $sql="DELETE FROM payments WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "i",
                $id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Deleted a payment record");
                $_SESSION['success'] = "Payment was deleted successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: payments.php");
    }
?>
