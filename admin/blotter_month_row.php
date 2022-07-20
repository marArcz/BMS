<?php
        if(isset($_POST['year'])){
        session_start();
        require("./includes/conn.php");
        $rows=array();

        $query = prep_stmt("SELECT * FROM blotter_history WHERE date LIKE ?");
        $year = "%".$_POST['year']."%";
        $query->bind_param('s',$year);
        $query->execute();
        $res = $query->get_result();
        while($row = $res->fetch_assoc()){
            array_push($rows, $row);
        }
        
        echo json_encode($rows);
        }
