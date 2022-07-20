<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $num = $_POST['number'];
        $zone = $_POST['zone'];
        $family = $_POST['family'];
        $head = $_POST['head'];
        $id = $_POST['id'];

        $sql="UPDATE household SET number=?,zone=?,family=?,head=? WHERE id = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("ssssi",
                $num,$zone,$family,$head,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'], "Updated a household");
                $_SESSION['success'] = "Household updated successfully";
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
