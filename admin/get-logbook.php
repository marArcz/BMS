<?php
    include "./includes/conn.php";
    $date = getdate(strtotime($_POST['date']));

    $year = $date["year"];
    
    $month = $date['mon'];
    $d = $date['mday'];
    

    $query = run_query("SELECT *, DATE_FORMAT(dateTime, '%h:%m %p') AS time,DATE_FORMAT(dateTime, '%M. %d, %Y') AS date FROM logbook WHERE MONTH(dateTime) = '$month' AND DAYOFMONTH(dateTime) = '$d' AND YEAR(dateTime) = '$year'");
    
    while($row = $query->fetch_assoc()){
        ?>
            <tr>
            <td><img src="<?php echo $row['photo'] ?>" class="img-thumbnail" style="width:50px" alt=""></td>
                <td><?php echo $row['residentName'] ?></td>
                <td><?php echo $row['time'] ?></td>
                <td><?php echo $row['date'] ?></td>
            </tr>
        <?php
    }

    if($query->num_rows == 0){
        ?>
            <tr>
                <td class="text-center" colspan="4">No available data.</td>
            </tr>
        <?php
    }
?>