<?php
    if(isset($_POST['save'])){
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
        $id = $_POST['id'];

        $sql="UPDATE residents SET firstname=?,middlename=?,lastname=?,age=?,gender=?,birthDate=?,birthPlace=?,healthCondition=?,relationshipToHead=?,bloodType=?,
            civilStatus=?,occupation=?,income=?,household=?,religion=?,nationality=?,education=?, voter=? WHERE id =?
        ";
        
        if($query = prep_stmt($sql)){
            $query->bind_param("sssissssssssssssssi",
                $fname,$mname,$lname,$age,$gender,$birthDate, $birthPlace, $condition, $relationship,$blood,$civil, $occupation, $income, $household, $religion,$nationality, $education,$voter,$id
            );
            if($query->execute()){
                LogAction($_SESSION['admin_id'],"Updated a resident record");
                $_SESSION['success'] = "Resident updated successfully";
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
