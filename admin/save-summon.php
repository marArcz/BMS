<?php
    include "./includes/conn.php";
    session_start();
    $page1 = $_POST['page1'];
    $page2 = $_POST['page2'];
    $page3 = $_POST['page3'];
    // get summon 
    $query = run_query("SELECT * FROM summon");
    $has_summon = $query->num_rows > 1;

    if($has_summon){
        $query = run_query("UPDATE summon SET page1 = '$page1',page2 = '$page2',page3 = '$page3' WHERE id != 1");
        if($query){
            echo "saved";
        }else{
            echo "error saving: " . $mysqli->error;
        }
    }else{
        $query = run_query("INSERT INTO summon(page1,page2,page3) VALUES('$page1','$page2','$page3')");
    }
?>