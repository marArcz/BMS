<?php
if (isset($_POST['login'])) {
    require("./conn/conn.php");

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $type = $_POST['userType'];
    $sql = "SELECT * FROM users WHERE username=? AND password=? AND type=?";
    $query = prep_stmt($sql);
    $query->bind_param("ssi", $uname, $pass, $type);
    $query->execute() or die("Cannot log in: " . $mysqli->error);
    $query = $query->get_result();
    if ($query->num_rows > 0) {
        $user = $query->fetch_assoc();
        session_start();
        $_SESSION['user'] = $user;
        header("Location: admin/user_home.php");
    }else{
        header("Location: index.php?msg=Incorrect Username and Password!");
    }
}
