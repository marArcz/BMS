<?php
     // connection config for infinity free
    // $user = "epiz_31311807";
    // $host = "sql306.epizy.com";
    // $pass = "uFfN5IW8KuUk3";
    // $db = "epiz_31311807_bis";

    // connection for local development
    $user = 'root';
    $host = 'localhost';
    $pass = '';
    $db = 'bms';


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
        date_default_timezone_set("Singapore");
        $date = date("F d, Y") ." ".date("h:i:a");
        $query = prep_stmt("INSERT INTO log VALUES(null, ?, ?,?)");
        $query->bind_param("iss", 
            $user,$action,$date  
        );
        $query->execute() or die("Cannot add to logs: ".$mysqli->error);

    }
    function convertDate($date){
        $d= strtotime($date);
        return date("F d, Y",$d);
    }
    function convertTime($time){
        date_default_timezone_set("Singapore");
        $t = strtotime($time);
        return date("h:i:a", $t);
    }
    
   

?>