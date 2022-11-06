<?php
      $user = "epiz_31311807";
    $host = "sql306.epizy.com";
    $pass = "uFfN5IW8KuUk3";
    $db = "epiz_31311807_bis";

    if(!$mysqli = new mysqli($host,$user,$pass,$db)){
        echo "cannot make connection";
    }

    function run_query($sql){
        global $mysqli;

        return $mysqli->query($sql);
    }
    function prep_stmt($sql){
        global $mysqli;
        return $mysqli->prepare($sql);
    }
    function remove_space($str){
        return preg_replace('/\s+/', '', $str);
    }
    function LogAction($user, $action){
        global $mysqli;
        $date = date("Y-m-d") ." ".date("h:i:a");
        $query = prep_stmt("INSERT INTO log VALUES(null, ?, ?,?)");
        $query->bind_param("iss", 
            $user,$action,$date  
        );
        $query->execute() or die("Cannot add to logs: ".$mysqli->error);

    }


?>