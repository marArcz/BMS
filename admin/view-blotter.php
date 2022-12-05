<?php
include "./includes/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Blotter</title>
    <?php include "./includes/header.php" ?>

    <style>
        #view_reason #text {
            word-wrap: break-word;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Blotter Information
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Blotter Information</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content">
                <a href="blotter.php" class="btn btn-dark btn-sm mb-2">
                    <i class="bx bx-arrow-back"></i>
                </a>
                <div class="card">
                    <div class="card-body bg-white">
                        <?php
                        // get blotter infornation
                        $blotter_id = $_GET['id'];
                        $query = run_query("SELECT * FROM blotter WHERE id = $blotter_id");
                        $blotter = $query->fetch_assoc();
                        ?>

                        <div class="">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-primary mb-3">
                                                <strong>Complainant Information</strong>
                                            </p>
                                            <p>
                                                <strong class="">Name:</strong>
                                                <span class="ml-1"><?php echo $blotter['complainant'] ?></span>
                                            </p>
                                            <p>
                                                <strong class="">Age:</strong>
                                                <span class="ml-1"><?php echo $blotter['complainant_age'] ?></span>
                                            </p>
                                            <p>
                                                <strong class="">Phone:</strong>
                                                <span class="ml-1"><?php echo $blotter['complainant_phone'] ?></span>
                                            </p>
                                            <p>
                                                <strong class="">Address:</strong>
                                                <span class="ml-1"><?php echo $blotter['complainant_address'] ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-danger mb-3">
                                                <strong>Complaint</strong>
                                            </p>
                                            <p>
                                                <strong class="">Date:</strong>
                                                <span class="ml-1"><?php echo $blotter['date'] ?></span>
                                            </p>
                                            <p>
                                                <strong class="">Time:</strong>
                                                <span class="ml-1"><?php echo $blotter['time'] ?></span>
                                            </p>
                                            <p>
                                                <strong class="">Action Taken:</strong>
                                                <span class="ml-1"><?php echo $blotter['action'] ?></span>
                                            </p>
                                            <p>
                                                <strong class="">Complaint:</strong>
                                            </p>
                                            <p>
                                                <?php echo $blotter['reason'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="text-primary">
                            <strong>Suspect(s) Information</strong>
                        </p>
                        <div class="mt-3">
                            <?php
                            // get suspects
                            $query = run_query("SELECT * FROM suspect WHERE suspect_group IN (SELECT id FROM suspect_group WHERE blotter_id = $blotter_id)");
                            $x = 1;
                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="form-text mt-1 mb-3">
                                            <span>Suspect #<?php echo $x++ ?></span>
                                        </p>
                                        <p>
                                            <strong class="">Name:</strong>
                                            <span class="ml-1"><?php echo $row['name'] ?></span>
                                        </p>
                                        <p>
                                            <strong class="">Age:</strong>
                                            <span class="ml-1"><?php echo $row['age'] ?></span>
                                        </p>
                                        <p>
                                            <strong class="">Phone:</strong>
                                            <span class="ml-1"><?php echo $row['phone'] ?></span>
                                        </p>
                                        <p>
                                            <strong class="">Address:</strong>
                                            <span class="ml-1"><?php echo $row['address'] ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/blotterModal.php" ?>

    <script>
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
                    $("#view_reason")[0].innerText = res.reason

                    $("#complainant-box").val(complainant)
                    $("#complainant_age").val(res.complainant_age)
                    $("#complainant_address").val(res.complainant_address)
                    $("#complainant_phone").val(res.complainant_phone)
                    $("#suspect_age").val(res.suspect_age)
                    $("#suspect_address").val(res.suspect_address)
                    $("#suspect_phone").val(res.suspect_phone)
                    $("#suspect-box").val(suspect)
                    $("#edit_reason").val(res.reason);
                    $("#edit_date").val(res.date);
                    $("#edit_time").val(res.time);
                    $("#del_complainant").html(complainant);
                    $("#del_suspect").html(suspect);
                    console.log('reason: ', res.reason)
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
            const type = $(this).attr("data-type");
            const id = $(this).attr("data-id");
            const name = $(this).attr("data-name");
            console.log('name: ', name)
            var title = $(this).attr("data-title");
            $("#info-title").html(title);

            $("#info-content-none").addClass('d-none')
            $("#info-content").removeClass('d-none')
            $.ajax({
                type: 'POST',
                url: "find_resident.php",
                data: {
                    name
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    if (res !== null) {
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
                    } else {
                        $("#info-content-none").removeClass('d-none')

                        $.ajax({
                            url: "blotter_row.php",
                            method: "post",
                            data: {
                                id
                            },
                            dataType: "json",
                            success: function(res) {
                                if (type == "suspect") {
                                    $("#res-name").html(res.suspect);
                                    $("#res-age").html(res.suspect_age);
                                    $("#res-address").html(res.suspect_address);
                                    $("#res-phone").html(res.suspect_phone);
                                } else {
                                    $("#res-name").html(res.complainant);
                                    $("#res-age").html(res.complainant_age);
                                    $("#res-address").html(res.complainant_address);
                                    $("#res-phone").html(res.complainant_phone);
                                }
                            }
                        })
                        $("#info-content").addClass('d-none')
                    }
                },
                error: function(err) {
                    console.log('error: ', err)
                    $("#info-content-none").removeClass('d-none')
                    $("#info-content").addClass('d-none')
                }
            })

        })
    </script>
</body>


</html>