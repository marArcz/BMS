<?php
    require('../includes/conn.php');
    session_start();
    
    if($_SESSION['user']){
        $admin = $_SESSION['user'];
        
    }else{
        header("Location: ../../../index.php?msg=Login First!");
    }


?>
