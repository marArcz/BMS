<?php
    if(isset($_POST['add'])){
        session_start();
        require("./includes/conn.php");
        date_default_timezone_set("Singapore");
        $resident = $_POST['resident'];
        $purpose = $_POST['purpose'];
        $amount = $_POST['amount'];
        $date = date("Y-m-d");
        $time = date("h:i a");
        $sql="INSERT INTO payments values(null,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "sssss",
                $resident,$amount,$purpose,$date,$time
            );
            if($query->execute()){
                LogAction($_SESSION['account_id'],"Added a payment");
                echo "Payment added successfully";
            }
            else{
                echo $mysqli->error;
            }
        }else{
            echo $mysqli->error;
        }
        // header("Location: payments.php");
    }
?>
