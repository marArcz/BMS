<?php
    include "./includes/conn.php";
    session_start();
    $content = $_POST['content'];
    // get memos 
    $query = run_query("SELECT * FROM memos");
    $has_memos = $query->num_rows > 1;

    if($has_memos){
        $query = run_query("UPDATE memos SET content = '$content' WHERE id != 1");
        if($query){
            echo "saved";
        }else{
            echo "error saving: " . $mysqli->error;
        }
    }else{
        $query = run_query("INSERT INTO memos(content) VALUES('$content')");
    }
?>