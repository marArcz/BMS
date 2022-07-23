<?php
        session_start();
        require("./includes/conn.php");

        $suspect = array();
        $complainant = array();
        $bsql="SELECT * FROM blotter_history";
        $bquery = run_query($bsql);
        $rows = array();
        while($row=$bquery->fetch_assoc()){
            array_push($rows,$row);
            // $cid = $row['complainant'];
            // $sid = $row['suspect'];
            // $sql = "SELECT * FROM residents WHERE id = ?";
            // $query= prep_stmt($sql);
            // // complainant
            // $query->bind_param('i',$cid);
            // $query->execute();
            // $c = $query->get_result()->fetch_assoc();
            // array_push($complainant, $c);
            // // suspect
            // $query->bind_param('i',$sid);
            // $query->execute();
            // $s = $query->get_result()->fetch_assoc();
            // array_push($suspect, $s);
        }

        
        $result = array($rows);
        
        echo json_encode($rows);
?>