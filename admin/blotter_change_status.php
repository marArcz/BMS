<?php
    if(isset($_POST['status'])){
        session_start();
        require("./includes/conn.php");

        $status = $_POST['status'];
        $id=$_POST['id'];
        $sql="UPDATE blotter SET status=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "si",
                $status,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Updated a blotter status");
                echo "Blotter's status was updated successfully";
            }
            else{
                echo $mysqli->error;
            }
        }else{
            echo $mysqli->error;
        }
        
    }
?>
