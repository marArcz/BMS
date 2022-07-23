<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $complainant = $_POST['complainant'];
        $suspect = $_POST['suspect'];
        $reason = $_POST['reason'];
        $date =$_POST['date'];
        $action = $_POST['action'];
        $time = $_POST['time'];
        $id=$_POST['id'];
        $sql="UPDATE blotter SET complainant=?,suspect=?,reason=?,date=?,time=?,action=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "ssssssi",
                $complainant,$suspect,$reason,$date,$time,$action,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Updated a blotter record");
                $_SESSION['success'] = "Blotter record was updated successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: blotter.php");
    }
?>
