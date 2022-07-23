<?php
include "./includes/user_session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Scanner</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
    <div class="wrapper">
        <?php include 'includes/user_navbar.php'; ?>
        <?php include 'includes/user_sidemenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Residents Log Book
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
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
                    <div class="card-header">
                        <div class="text-start">
                            <button class="btn btn-primary d-flex align-items-center scan-id" data-toggle="modal" data-target="#scanner-modal">Scan ID</button>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="table-responsive">
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
                                    while ($row = $query->fetch_assoc()) {
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
                </div>

            </section>
        </div>

    </div>
    <!-- modal for scanner -->
    <div class="modal fade show" id="scanner-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div id="reader" width="600px"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button class="btn btn-default" id="confirm-scan"><span class="text-primary">Confirm</span></button> -->
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>

        </div>
    </div>
    <!-- modal for scanner result -->
    <div class="modal fade show" id="result-modal" role="dialog">
        <div class="modal-dialog" style="position:absolute;bottom:0;margin:0;width:100%;">

            <!-- Modal content-->
            <div class="modal-content">
                <div id="content">
                </div>
            </div>

        </div>
    </div>
    <!-- toast for confirm log bool -->
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast" style="position: absolute; bottom: 0; right: 0;" id="toast">
            <div class="toast-header">
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Successfully recorded to log book.
            </div>
        </div>
    </div>

    <?php include "./includes/scripts.php" ?>
    <script src="../assets//html5-qrcode//html5-qrcode.min.js"></script>
    <!-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script> -->

    <!-- qr code scanner -->
    <script>
        // for qr code scanning 
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            // console.log(`Code matched = ${decodedText}`, decodedResult);
            const id = decodedText;
            $.ajax({
                url: "get-resident.php",
                method: "POST",
                data: {
                    id
                },
                success: function(res) {
                    $("#result-modal #content").html(res);
                    $("#result-modal").modal("show");
                }
            })


        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);

        }

        $(".scan-id").click(function() {
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250
                    }
                },
                /* verbose= */
                false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        })
    </script>

    <script>
        // get loog book 
        var logBookData = "";

        function getlogBook() {
            $.ajax({
                url: "todays-logbook.php",
                method: "POST",
                success: function(res) {
                    if (String(logBookData) != String(res)) {
                        $("#logbook").html(res);
                        logBookData = res;
                    }
                }
            })
        }
        // get log book for every second 
        const logBookInterval = setInterval(getlogBook, 1000);

        const getNumericMonth = (mon) => {
            let arr = "january, february,march,april,may,june,july,august,september,october,november,december".split(",");
            for (let x = 0; x < arr.length; x++) {
                if (mon.toLowerCase() == arr) {
                    return x < 10 ? `0${x}` : x;
                }
            }
        }
        const getResident = (id) => {
            $.ajax({
                async: false,
                type: 'POST',
                url: "residents_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    var resident = {
                        name: `${res.firstname} ${res.lastname}`,
                        id: res.id
                    }
                    return resident;
                }
            })
        }
        const getRow = (id) => {
            $.ajax({
                type: 'POST',
                url: "blotter_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("blotter response: ", res);
                    var suspect = res.suspect;
                    var complainant = res.complainant;
                    $(".modal .id").val(id);
                    $("#edit_complainant").val(complainant.id).html(`${complainant.firstname} ${complainant.lastname}`);
                    $("#edit_suspect").val(suspect.id).html(`${suspect.firstname} ${suspect.lastname}`);
                    $("#edit_reason").val(res.reason);
                    $("#edit_date").val(res.date);
                    $("#edit_time").val(res.time);
                    $("#del_complainant").html(complainant.firstname + ' ' + complainant.lastname);
                    $("#del_suspect").html(suspect.firstname + ' ' + suspect.lastname);
                    $("#view_reason").html(res.reason);
                    $("#edit_action").val(res.action)
                }
            })
        }

        $(document).on("click", ".edit", function() {
            const id = $(this).attr("data-id");
            getRow(id);
        })
        $(document).on("click", ".delete", function() {
            const id = $(this).attr("data-id");
            getRow(id);
        })
        $(document).on("click", ".status", function() {
            const id = $(this).attr("data-id");
            const status = $(this).attr("data-content");
            $.ajax({
                type: 'POST',
                url: "blotter_change_status.php",
                data: {
                    id,
                    status
                },
                // dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    location.reload();
                }
            })
        })
        $(document).on("click", ".view-info", function() {
            const id = $(this).attr("data-id");
            var title = $(this).attr("data-title");
            $.ajax({
                type: 'POST',
                url: "residents_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    var fullname = `${res.firstname} ${res.middlename} ${res.lastname}`

                    // view Information
                    var fields = ["fname", "mname", "lname", "gender", "bdate", "bplace", "age", "education", "religion", "nationality", "civil_status", "occupation", "income", "household", "condition", "blood", "relationship"];
                    var household = `#${res.number} Zone ${res.zone}`;
                    // var age = res.age > 1 ? `${res.age} yr. old` : `${res.age} yrs. old`
                    var values = [res.firstname, res.middlename, res.lastname, res.gender, res.birthDate, res.birthPlace, res.age, res.education, res.religion, res.nationality, res.civilStatus, res.occupation, res.income, household, res.healthCondition, res.bloodType, res.relationshipToHead];
                    $("#view_img").attr("src", res.photo);
                    for (let x = 0; x < fields.length; x++) {
                        $(`#view_${fields[x]}`).html(values[x]);
                    }
                    $(".infoModal-title").html(title);
                }
            })

        })
    </script>
</body>


</html>