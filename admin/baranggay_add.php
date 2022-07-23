<?php
    if(isset($_POST['add'])){
        $target_dir = "uploads/";
        $cityLogo = $target_dir . basename($_FILES["cityLogo"]["name"]);
        if(!empty(basename($_FILES["cityLogo"]["name"]))){
            move_uploaded_file($_FILES["cityLogo"]["tmp_name"], $cityLogo);
        }else{
            $cityLogo = $target_dir."city.png";
        }
        $baranggayLogo = $target_dir . basename($_FILES["baranggayLogo"]["name"]);
        if(!empty(basename($_FILES["baranggayLogo"]["name"]))){
            move_uploaded_file($_FILES["baranggayLogo"]["tmp_name"], $cityLogo);
        }else{
            $baranggayLogo = $target_dir."Barangay.png";
        }

        session_start();
        require("./includes/conn.php");

        $name = $_POST['name'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $sql="INSERT INTO baranggay VALUES(null,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssss",
                $name,$province,$city,$baranggayLogo,$cityLogo
            );
            if($query->execute()){
                $_SESSION['success'] = "Successfully Set Baranggay Information";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: baranggay.php");
    }
?>
