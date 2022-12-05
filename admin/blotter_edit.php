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
        $group_id = $_POST['group_id'];

        $sql="UPDATE blotter SET complainant=?,complainant_age=?,complainant_address=?,complainant_phone=?,reason=?,date=?,time=?,action=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "ssssssssi",
                $complainant,
                $complainant_age,
                $complainant_address,
                $complainant_phone,
                $reason,
                $date,
                $time,
                $action,
                $id,
            );
            if($query->execute()){
                // delete suspects first
                run_query("DELETE FROM suspect WHERE suspect_group = $group_id");
                $add_suspect = prep_stmt("INSERT INTO suspect(name,phone,address,age,suspect_group) VALUES(?,?,?,?,?)");
                for ($x = 0; $x < count($suspect); $x++) {
                    $add_suspect->bind_param(
                        "ssssi",
                        $suspect[$x],
                        $suspect_phone[$x],
                        $suspect_address[$x],
                        $suspect_age[$x],
                        $group_id
                    );
    
                    $add_suspect->execute() or die("Cannot add suspect!");
                }
    
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
