<?php 
    include '../conn/conn.php';
    session_start();

    $id = $_GET['id'];
    $resident_id = $_GET['resident_id'];

    $query = run_query("DELETE FROM resident_files WHERE id = $id");
    $_SESSION['success'] = "File was deleted successfully";

    header("location: filebox.php?id=$resident_id");
?>