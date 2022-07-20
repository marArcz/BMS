<?php
    
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        echo $target_file;
        session_start();
        require("./includes/conn.php");

       $id = $_POST['id'];
        
        if(isset($_POST['city'])){
            $sql="UPDATE baranggay SET cityLogo = ? WHERE id = ?";
        }else{
            $sql="UPDATE baranggay SET baranggayLogo = ? WHERE id = ?";
        }
        
        if($query = prep_stmt($sql)){
            $query->bind_param("si",
                $target_file,$id
            );
            if($query->execute()){
                $action = isset($_POST['city'])? "Changed city logo":"Changed baranggay logo";
                LogAction($_SESSION['admin_id'],$action);
                $_SESSION['success'] = "Logo was changed successfully";
            }
            else{
                die($mysqli->error);
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: baranggay.php");
?>
