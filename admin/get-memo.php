<?php
    include './includes/conn.php';

    $query = run_query("SELECT * FROM memos");
    $has_memos = $query->num_rows > 1;

    if($has_memos){
        $query = run_query("SELECT * FROM memos WHERE id != 1");
        $memo = $query->fetch_assoc();
        echo $memo['content'];
    }else{
        $memo = $query->fetch_assoc();
        echo $memo['content'];
    }
?>