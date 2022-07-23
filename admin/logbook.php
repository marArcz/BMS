<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Residents Log book
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home </a> </li>
                    <li class="active"> Log Book</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                  <div class="card-header bg-white">
                        <form id="logbook-form">
                            <div class="row justify-content-end">
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center">
                                    <label for="date" class="form- mr-3">Date: </label>
                                    <input type="date" class="form-control" name="date" id="date-box">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body bg-white">
                        <div class="text-center my-1">
                            <p class="my-1 text-capitalize" id="date-label" style="font-weight:bold">Today's Log Book [<?php echo date("M. d, Y") ?>]</p>
                        </div>
                        <table class="table table-bordered table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Full name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="logbook">
                                <?php
                                 $f1 = "00:00:00";
                                 $from = date('Y-m-d') . " " . $f1;
                                 $t1 = "23:59:59";
                                 $to = date('Y-m-d') . " " . $t1;
                                    $query = run_query("SELECT *, DATE_FORMAT(dateTime, '%h:%m %p') AS time,DATE_FORMAT(dateTime, '%M. %d, %Y') AS date FROM logbook WHERE dateTime BETWEEN '$from' AND '$to'");
                                    while($row = $query->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><img src="<?php echo $row['photo'] ?>" class="img-thumbnail" style="width:50px" alt=""></td>
                                            <td><?php echo $row['residentName'] ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['time'] ?></td>

                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
              </div>  
            </section>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <script>
        $("#date-box").on('change',function(){
            const dateVal = new Date($(this).val());
            const today = new Date();
            const months = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
            if(dateVal.getMonth() == today.getMonth() && dateVal.getDate() == today.getDate() && dateVal.getFullYear() == today.getFullYear()){
                $("#date-label").html(`Today's Log Book Record [${months[today.getMonth()]}. ${today.getDate()}, ${today.getFullYear()}]`);
            }else{
                $("#date-label").html(`Log Book Record [${months[dateVal.getMonth()]}. ${dateVal.getDate()}, ${dateVal.getFullYear()}]`)
            }
            $.ajax({
                url:"get-logbook.php",
                method:"POST",
                data: {
                    date:$("#date-box").val(),
                },
                success:function(res){
                    $("#logbook").html(res)
                }
            })
        })
    </script>
</body>


</html>