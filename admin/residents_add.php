<?php
    if(isset($_POST['add'])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        if(!empty(basename($_FILES["file"]["name"]))){
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
        }else{
            $target_file = $target_dir."profile.jpg";
        }
        session_start();
        require("./includes/conn.php");

        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $birthDate = $_POST['b_date'];
        $birthPlace = $_POST['b_place'];
        $education = $_POST['education'];
        $religion = $_POST['religion'];
        $nationality = $_POST['nationality'];
        $civil = $_POST['civilStatus'];
        $occupation = $_POST['occupation'];
        $income = $_POST['income'];
        $household = $_POST['household'];
        $condition = $_POST['condition'];
        $voter = 1;
        $blood = $_POST['blood'];
        $relationship = $_POST['relationship'];
        $phone = $_POST['phone'];
        $mother = $_POST['mother'];
        $father = $_POST['father'];
        
        $sql="INSERT INTO residents(firstname,middlename,lastname,age,gender,birthDate,birthPlace,healthCondition,relationshipToHead,bloodType,civilStatus,occupation,household,religion,nationality,education,photo,voter,phone,mother,father) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssssssssssssissssssss",
                $fname,$mname,$lname,$age,$gender,$birthDate, $birthPlace, $condition, $relationship,$blood,$civil, $occupation, $income, $household, $religion,$nationality, $education,$target_file,$voter,$phone,$mother,$father
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Added a new Resident");
                $_SESSION['success'] = "Resident added successfully";
            }
            else{
                $_SESSION['error'] = $mysqli->error;
            }
        }else{
            $_SESSION['error'] = $mysqli->error;
        }
        header("Location: residents.php");
    }
?>
