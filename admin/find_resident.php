<?php
    if(isset($_POST['name'])){
        session_start();
        require("./includes/conn.php");

        $name = trim($_POST['name']);
        $sql="SELECT *, residents.id AS rID FROM residents INNER JOIN household ON residents.household = household.id WHERE CONCAT(residents.firstname,' ',residents.lastname) = '$name'";
        
        $query = run_query($sql);
        $result = $query->fetch_assoc();

        // echo "result: " . $result;
      
        echo json_encode($result);
    }
?>