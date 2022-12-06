<?php
if (isset($_POST['id'])) {
    session_start();
    require("./includes/conn.php");

    $id = $_POST['id'];

    $sql = "SELECT *, residents.id AS rID FROM residents WHERE residents.id = ?";

    $query = prep_stmt($sql);
    $query->bind_param('i', $id);
    $query->execute();
    $result = $query->get_result()->fetch_assoc();

    if ($result['household'] == NULL) {
        $result['has_household'] = false;
    } else {
        $result['has_household'] = true;
        // get household
        $get_household = run_query("SELECT *, CONCAT('No. ',number,' Zone ', zone) AS household FROM household WHERE id = " . $result['household']);
        $result['household_record'] = $get_household->fetch_assoc();
    }

    echo json_encode($result);
}
