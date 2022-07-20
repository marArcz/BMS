<?php
    if(isset($_POST['save'])){
        require("./includes/conn.php");
        session_start();
        $pass = $_POST['newPass'];
        $id = $_POST['id'];
        
        if($query = prep_stmt("UPDATE admin SET password = ? WHERE id = ?")){
            $query->bind_param('si',
                $pass,$id
            );
            if($query->execute()){
                $_SESSION['success'] = "Password was changed successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: admin.php");
    }
?>
