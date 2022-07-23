<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");
        $id = $_POST['id'];
        $name = $_POST['name'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $sql="UPDATE baranggay SET name = ?,city=?,province=? WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssi",
                $name,$city,$province,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Updated baranggay information");
                $_SESSION['success'] = "Baranggay updated successfully";
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
