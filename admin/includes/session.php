<?php
    require('conn.php');
    session_start();
    
    if($_SESSION['admin_id']){
        $query = prep_stmt("SELECT * FROM users WHERE id = ?");
        $query->bind_param('i',$_SESSION['admin_id']);
        $query->execute();
        $admin = $query->get_result()->fetch_assoc();
        $_SESSION['account_id'] = $_SESSION['admin_id'];
    }
    else{
        header("Location: index.php?error=Login First!");
    }


$query = run_query("SELECT * FROM baranggay");
if($query->num_rows == 0){
    include "createBaranggay.php";
}
?>
