<?php
    if(isset($_POST['add'])){
        session_start();
        require("./includes/conn.php");

        $resident = $_POST['resident'];
        $bname = $_POST['bname'];
        $baddress = $_POST['baddress'];
        $type = $_POST['btype'];
        $number = $_POST['ornumber'];
        $amount = $_POST['amount'];
        $sql="INSERT INTO permit values(null, ?,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "isssss",
                $resident,$bname,$baddress,$type,$number,$amount
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Added a Permit");

                $_SESSION['success'] = "Permit added successfully";

                // add payment
                $sql="INSERT INTO payments VALUES(NULL,?,?,?,?,?)";
                $query = prep_stmt($sql);
                $purpose="Business Permit";
                $date = date("Y-m-d");
                $time = date("h:i a");
                $query->bind_param(
                    "issss",
                    $resident,$amount,$purpose,$date,$time
                );
                $query->execute();
                LogAction($_SESSION['admin_id'],"Added a payment");
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: permit.php");
    }
?>
