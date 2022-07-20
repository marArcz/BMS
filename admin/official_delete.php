<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");
        $id = $_POST['id'];
        $sql="DELETE FROM officials WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "i",
                $id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Deleted a baranggay official record");
                $_SESSION['success'] = "Official was deleted successfully";
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
