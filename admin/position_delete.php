<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");
        $id = $_POST['id'];
        $sql = "DELETE FROM position WHERE id =?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("i",$id);
            if($query->execute()){
                $_SESSION['success'] = "Position deleted successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: positions.php");
    }
?>