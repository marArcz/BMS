<?php
    if(isset($_POST['id'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];

        $sql="SELECT * FROM officials INNER JOIN positions ON officials.position = positions.id WHERE officials.id = ?";
        
        $query = prep_stmt($sql);
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        echo json_encode($result);
    }
?>