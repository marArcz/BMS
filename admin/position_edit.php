<?php
    if(isset($_POST['save'])){
        session_start();
        require("./includes/conn.php");

        $desc = $_POST['description'];
        $maxVote = $_POST['maxVote'];
        $id = $_POST['id'];
        $sql="UPDATE position SET description=?, maxVote=? WHERE id =?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sii",
                $desc,$maxVote,$id
            );
            if($query->execute()){
                $_SESSION['success'] = "Position updated successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: positions.php");
    }
?>