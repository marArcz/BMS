<?php
    if(isset($_POST['save'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        session_start();
        require("./includes/conn.php");

       $id = $_POST['id'];
        
        $sql="UPDATE officials SET photo = ? WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("si",
                $target_file,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Changed a baranggay official photo");
                $_SESSION['success'] = "Official updated successfully";
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
