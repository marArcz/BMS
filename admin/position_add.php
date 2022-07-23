<?php
    if(isset($_POST['add'])){
        session_start();
        require("./includes/conn.php");

        $desc = $_POST['description'];
        $maxVote = $_POST['maxVote'];

        $q = run_query("SELECT * FROM position");
        $priority = $q->num_rows + 1;

        $sql="INSERT INTO position VALUES(null, ?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sii",
                $desc,$maxVote,$priority
            );
            if($query->execute()){
                $_SESSION['success'] = "Position added successfully";
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