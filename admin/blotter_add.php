<?php
    if(isset($_POST['add'])){
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
        $status=0;
        $sql="INSERT INTO blotter(complainant,complainant_age,complainant_address,complainant_phone, suspect,suspect_age,suspect_address,suspect_phone,reason,action,date,time,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
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
                $action,
                $date,
                $time,
                $status
            );
            if($query->execute()){
                $q = prep_stmt("INSERT INTO blotter_history(complainant,complainant_age,complainant_address,complainant_phone, suspect,suspect_age,suspect_address,suspect_phone,reason,action,date,time,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
                $q->bind_param(
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
                    $action,
                    $date,
                    $time,
                    $status
                );
                $q->execute();
                
                LogAction($_SESSION['admin_id'],"Added a new blotter record");
                $_SESSION['success'] = "Blotter record was added successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: blotter.php");
    }
