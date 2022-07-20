<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];
        
        $sql="DELETE FROM blotter_history WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("i",
                $id
            );
            if($query->execute()){
                $_SESSION['success'] = "Blotter history was deleted successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: blotter_history.php");
    }
?>
