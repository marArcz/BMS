<?php
    if(isset($_POST['add'])){
        session_start();
        require("./includes/conn.php");

        $resident = $_POST['resident'];
        $purpose = $_POST['purpose'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $sql="INSERT INTO payments values(null,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "sssss",
                $resident,$amount,$purpose,$date,$time
            );
            if($query->execute()){
                LogAction($_SESSION['user']['id'],"Added a payment");
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
