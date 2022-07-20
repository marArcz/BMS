<?php
    require('conn.php');
    session_start();
    
    if($_SESSION['user']){
        $admin = $_SESSION['user'];
        $_SESSION['account_id'] = $admin['id'];
    }else{
        header("Location: ../index.php?error=Login First!");
    }
?>
