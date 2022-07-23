<?php
    if(isset($_POST['delete'])){
        session_start();
        require("./includes/conn.php");
        if(isset($_POST['baranggay'])){
            $id = $_POST['baranggay'];
        }else{
            $id = "1 || != 1";
        }
        $sQuery = prep_stmt("SELECT *,voters.id AS vID FROM votes INNER JOIN voters WHERE voters.baranggayID = ?");
        $sQuery->bind_param('i',$id);
        $sQuery->execute();
        $res = $sQuery->get_result();
        
        while($row = $res->fetch_assoc()){
            echo "found";
            $sql = "DELETE FROM votes WHERE voter = ?";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("i",$row['vID']);
            if($query->execute()){
                $_SESSION['success'] = "Votes deleted successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
            }else{
                $_SESSION['error'] = $mysqli->error;
            }
        }

        
        header("Location: votes.php");
    }else{
        echo "not set";
    }
