<?php
    if(isset($_POST['login'])){
        require("./includes/conn.php");
        
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM users WHERE username = ? AND password = ? AND type = 3";
        $query = prep_stmt($sql);
        $query->bind_param("ss",$uname,$pass);
        $query->execute() or die("Cannot log in: ". $mysqli->error);
        $user = $query->get_result()->fetch_assoc();
        session_start();
        $_SESSION['admin_id'] = $user['id'];
        // header("Location: .php");
        header("location: household.php");
    }
?>