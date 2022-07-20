<?php
    if(isset($_POST['id'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];

        $sql= "SELECT *, CONCAT(voters.firstname,' ', voters.lastname) AS votersName, CONCAT(candidate.firstname,' ',candidate.lastname) AS candidateName , votes.id AS voteID, baranggay.description AS baranggay, candidate.id AS candidateID, position.description AS position 
                FROM votes INNER JOIN candidate ON votes.candidate = candidate.id INNER JOIN voters ON votes.voter = voters.id INNER JOIN baranggay ON candidate.baranggayID = baranggay.id INNER JOIN position ON candidate.positionID = position.id WHERE id = ?";
        
        $query = prep_stmt($sql);
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        echo json_encode($result);
    }
?>