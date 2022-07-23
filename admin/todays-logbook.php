<?php
include "./includes/conn.php";

$f1 = "00:00:00";
$from = date('Y-m-d') . " " . $f1;
$t1 = "23:59:59";
$to = date('Y-m-d') . " " . $t1;
$query = run_query("SELECT *, DATE_FORMAT(dateTime, '%h:%m %p') AS time,DATE_FORMAT(dateTime, '%M. %d, %Y') AS date FROM logbook WHERE dateTime BETWEEN '$from' AND '$to'");

while ($row = $query->fetch_assoc()) {
    echo $time = date("h:i A",strtotime($row['dateTime']));
?>
    <tr>
        <td><img src="<?php echo $row['photo'] ?>" class="img-thumbnail" style="width:50px" alt=""></td>
        <td><?php echo $row['residentName'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $time ?></td>
        
    </tr>
<?php
}

if ($query->num_rows == 0) {
?>
    <tr>
        <td class="text-center" colspan="4">No data available in table.</td>
    </tr>
<?php
}
?>