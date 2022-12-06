<?php
if (isset($_POST['add'])) {
    session_start();
    require("./includes/conn.php");

    $complainant = $_POST['complainant'];
    $complainant_age = $_POST['complainant_age'];
    $complainant_address = $_POST['complainant_address'];
    $complainant_phone = $_POST['complainant_phone'];
    $suspect = $_POST['suspect'];
    $suspect_age = $_POST['suspect_age'];
    $suspect_address = $_POST['suspect_address'];
    $suspect_phone = $_POST['suspect_phone'];
    $reason = $_POST['reason'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $action = $_POST['action'];
    $status = 0;
    $sql = "INSERT INTO blotter(complainant,complainant_age,complainant_address,complainant_phone,reason,`action`,date,time,status) VALUES(?,?,?,?,?,?,?,?,?)";

    if ($query = prep_stmt($sql)) {
        $query->bind_param(
            "ssssssssi",
            $complainant,
            $complainant_age,
            $complainant_address,
            $complainant_phone,
            $reason,
            $action,
            $date,
            $time,
            $status
        );

        if ($query->execute()) {
            // if blotter record is added
            $blotter_id = mysqli_insert_id($mysqli);
            $create_suspect_group = run_query("INSERT INTO suspect_group(blotter_id) VALUES($blotter_id)");
            $group_id = mysqli_insert_id($mysqli);
            $add_suspect = prep_stmt("INSERT INTO suspect(name,phone,address,age,suspect_group) VALUES(?,?,?,?,?)");
            for ($x = 0; $x < count($suspect); $x++) {
                $add_suspect->bind_param(
                    "ssssi",
                    $suspect[$x],
                    $suspect_phone[$x],
                    $suspect_address[$x],
                    $suspect_age[$x],
                    $group_id
                );

                $add_suspect->execute() or die("Cannot add suspect!");
            }

            $add_to_history = prep_stmt("INSERT INTO blotter_history(complainant,complainant_age,complainant_address,complainant_phone, suspect,suspect_age,suspect_address,suspect_phone,reason,date,time) VALUES(?,?,?,?,?,?,?,?,?,?,?)");


            for ($i = 0; $i < count($suspect); $i++) {
                $add_to_history->bind_param(
                    "ssssssssssi",
                    $complainant,
                    $complainant_age,
                    $complainant_address,
                    $complainant_phone,
                    $suspect[$i],
                    $suspect_age[$i],
                    $suspect_address[$i],
                    $suspect_phone[$i],
                    $reason,
                    $date,
                    $time,
                );
                $add_to_history->execute();
            }

            LogAction($_SESSION['admin_id'], "Added a new blotter record");
            $_SESSION['success'] = "Blotter record was added successfully";
        } else {
            $_SESSION['error'] = $mysqli->error;
        }
    } else {
        $_SESSION['error'] = $mysqli->error;
    }
    header("Location: blotter.php");
}
