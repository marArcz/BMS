<?php
    if(isset($_POST['id'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];

        $sql="SELECT *, baranggay.description AS baranggay, position.description AS position FROM candidate INNER JOIN position ON candidate.positionID = position.id INNER JOIN baranggay ON candidate.baranggayID = baranggay.id WHERE candidate.id = ?";
        
        $query = prep_stmt($sql);
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        echo json_encode($result);
    }
?>