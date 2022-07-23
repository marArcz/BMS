<?php
    include "./includes/conn.php";

    $query = run_query("SELECT * FROM memos WHERE id = 1");
    $memo = $query->fetch_assoc();

    echo json_encode(array("data"=>$memo));
?>