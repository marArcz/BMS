<?php
    if(isset($_POST['add'])){
        session_start();
        require("./includes/conn.php");

        $complainant = $_POST['complainant'];
        $suspect = $_POST['suspect'];
        $reason = $_POST['reason'];
        $date =$_POST['date'];
        $time = $_POST['time'];
        $action = $_POST['action'];
        $status=0;
        $sql="INSERT INTO blotter VALUES(null,?,?,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "ssssssi",
                $complainant,$suspect,$reason,$action,$date,$time,$status
            );
            if($query->execute()){
                $cquery = run_query("SELECT * FROM residents WHERE id='$complainant'");
                $c = $cquery->fetch_assoc();
                $c = $c['firstname'].' '.$c['lastname'];
                $squery = run_query("SELECT * FROM residents WHERE id='$suspect'");
                if($squery->num_rows > 0){
                    $s = $squery->fetch_assoc();
                    $age = $s['age'];
                    $s = $s['firstname'].' '.$s['lastname'];
                    
                    $q = prep_stmt("INSERT INTO blotter_history VALUES(NULL,?,?,?,?,?,?)");
                    $q->bind_param('ssssss',$c,$s,$age,$reason,$date,$time);
                    $q->execute();
                }
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
