<?php
if (isset($_POST['year'])) {
    require("./includes/conn.php");
    $rows = [];

    $query = prep_stmt("SELECT * FROM blotter_history WHERE YEAR(date) = ?");
    $year = $_POST['year'];
    $query->bind_param('s', $year);
    $query->execute();
    $res = $query->get_result();
    while ($row = $res->fetch_assoc()) {
        array_push($rows, $row);
    }

    echo json_encode($rows);
}
