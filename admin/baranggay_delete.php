<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];
        $sql="DELETE FROM baranggay WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("i",
                $id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Deleted baranggay information");
                $_SESSION['success'] = "Baranggay deleted successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: baranggay.php");
    }
?>
