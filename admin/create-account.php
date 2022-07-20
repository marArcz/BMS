<?php
    if(isset($_POST['signup'])){
        require("./includes/conn.php");
        
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $photo = "uploads/profile.jpg";
        $type = 3;
        $query = prep_stmt("INSERT INTO users VALUES(null,?,?,?,?,?,?,?)");
        $query->bind_param("ssssssi",$fname,$gender, $address,$uname,$pass,$photo,$type);
        $query->execute() or die("Cannot create account");

        header("Location: index.php?msg=You can now sign in to your account");
    }

?>
