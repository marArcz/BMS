<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");
        $id = $_POST['id'];
        $resId = $_POST['resident'];
        $bname = $_POST['bname'];
        $baddress = $_POST['baddress'];
        $type = $_POST['btype'];
        $number = $_POST['ornumber'];
        $amount = $_POST['amount'];
        $sql="UPDATE permit SET residentID=?,businessName=?,businessAddress=?,`type`=?,orNumber=?,amount=? WHERE id=?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param(
                "isssssi",
                $resId,$bname,$baddress,$type,$number,$amount,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Updated a Permit");
                $_SESSION['success'] = "Permit was updated successfully";
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
