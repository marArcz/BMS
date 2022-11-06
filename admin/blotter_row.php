<?php
    if(isset($_POST['id'])){
        session_start();
        require("./includes/conn.php");

        $id = $_POST['id'];
        // $bSql="SELECT * FROM blotter WHERE id = ?";
        
        // $query = prep_stmt($bSql);
        // $query->bind_param('i',$id);
        // $query->execute();
        // $result = $query->get_result()->fetch_assoc();

        // $rSql = "SELECT * FROM residents WHERE id = ?";
        // $cID = $result['complainant'];
        // $sID = $result['suspect'];
        // $cquery = prep_stmt($rSql);
        // $cquery->bind_param("i",$cID);
        // $cquery->execute();
        // $complainant = $cquery->get_result()->fetch_assoc();
        // $cquery->bind_param('i',$sID);
        // $cquery->execute();
        // $suspect = $cquery->get_result()->fetch_assoc();

        // $result['suspect'] = $suspect;
        // $result['complainant'] = $complainant;

        $query = run_query("SELECT * FROM blotter WHERE id = $id");
        $result = $query->fetch_assoc();

        
        echo json_encode($result);
    }
?>
