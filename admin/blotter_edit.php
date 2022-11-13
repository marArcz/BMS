<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $complainant = $_POST['complainant'];
        $complainant_age = $_POST['complainant_age'];
        $complainant_address = $_POST['complainant_address'];
        $complainant_phone = $_POST['complainant_phone'];
        $suspect = $_POST['suspect'];
        $suspect_age = $_POST['suspect_age'];
        $suspect_address = $_POST['suspect_address'];
        $suspect_phone = $_POST['suspect_phone'];
        $reason = $_POST['reason'];
        $date =$_POST['date'];
        $time = $_POST['time'];
        $action = $_POST['action'];
        $id=$_POST['id'];
        $sql="UPDATE blotter SET complainant=?,complainant_age=?,complainant_address=?,complainant_phone=?,suspect=?,suspect_age=?,suspect_address=?,suspect_phone=?,reason=?,date=?,time=?,action=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "ssssssssssssi",
                $complainant,
                $complainant_age,
                $complainant_address,
                $complainant_phone,
                $suspect,
                $suspect_age,
                $suspect_address,
                $suspect_phone,
                $reason,
                $date,
                $time,
                $action,
                $id,
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
