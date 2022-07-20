<?php
    if(isset($_POST['id'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];

        $sql="SELECT *, residents.ID AS resID FROM payments INNER JOIN residents ON payments.residentID =  residents.id WHERE payments.id = ?";
        
        $query = prep_stmt($sql);
        $query->bind_param('i',$id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();

        echo json_encode($result);
    }
?>