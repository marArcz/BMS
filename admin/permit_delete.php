<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");
        $id = $_POST['id'];
        $sql="DELETE FROM permit WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "i",
                $id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Deleted a Permit");
                $_SESSION['success'] = "Permit was deleted successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: permit.php");
    }
?>
