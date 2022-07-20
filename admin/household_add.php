<?php
    if(isset($_POST['add'])){
        session_start();
        require("./includes/conn.php");

        $num = $_POST['number'];
        $zone = $_POST['zone'];
        $family = $_POST['family'];
        $head = $_POST['head'];

        $sql="INSERT INTO household VALUES(null,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssss",
                $num,$zone,$family,$head
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'], "Added a new household");
                $_SESSION['success'] = "Household added successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: household.php");
    }
?>
