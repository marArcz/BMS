<?php 
    if(isset($_POST['id'])){
        require('./includes/conn.php');
        $id = $_POST['id'];
        $sql = "SELECT * FROM position WHERE id = ?";
        $query = prep_stmt($sql);
        $query->bind_param("i",$id);
        $query->execute();
        $row = $query->get_result()->fetch_assoc();
        $priority = $row['priority'] + 1;

        $sql = "UPDATE position SET priority = priority - 1 WHERE priority = ?";
        $query = prep_stmt($sql);
        $query->bind_param('i',$priority);
        $query->execute();

        $sql = "UPDATE position SET priority = ? WHERE id = ?";
        $query = prep_stmt($sql);
        $query->bind_param('si',$priority,$id);
        $query->execute();

        $res = array();
        $res['message'] = "Success";

        echo json_encode($res);
        
    }

?>