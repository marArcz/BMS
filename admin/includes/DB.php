<?php
    class DB{
        private $user = "root";
        private $host = "localhost";
        private $pass = "";
        private $db = "bis";
        private $mysqli;
        private $error;

        function __construct()
        {
            if(!$mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db)){
                echo "cannot make connection";
            }
            $this->mysqli=$mysqli;
        }

        function run_query($sql){
            return $this->mysqli->query($sql);
        }
        function prep_stmt($sql){
            return $this->mysqli->prepare($sql);
        }
        function getError(){
            return $this->mysqli->error;
        }
        function LogAction($user, $action){
            date_default_timezone_set("Singapore");
            $date = date("Y-m-d") ." ".date("h:i:a");
            $query = $this->mysqli->prepare("INSERT INTO log VALUES(null, ?, ?,?)");
            $query->bind_param("iss", 
                $user,$action,$date  
            );
            $query->execute() or die("Cannot add to logs: ".$this->mysqli->error);
    
        }
    }
?>