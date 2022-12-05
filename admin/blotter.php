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
                    Blotter Record
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Blotter Record</li>
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
                        <a href="add-blotter-page.php" class="btn btn-primary btn-sm btn-rounded"><span class="bx bx-plus"></span> Add new</a>
                    </div>
                </div>
                <div class="card-body bg-white">

                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Complainant</th>
                                    <th>Suspect</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action Taken</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = run_query("SELECT * FROM blotter ORDER BY status asc, id desc");
                                while ($bRow = $query->fetch_assoc()) {
                                    // get suspects
                                    $blotter_id = $bRow['id'];
                                    $get_suspects = run_query("SELECT * FROM suspect WHERE suspect_group IN (SELECT id FROM suspect_group WHERE blotter_id = $blotter_id)");
                                    $group_id = run_query("SELECT id FROM suspect_group WHERE blotter_id=" . $bRow['id'])->fetch_array()[0];
                                ?>
                                    <tr>
                                        <td><?php echo $bRow['complainant'] ?></td>
                                        <td>
                                            <?php
                                            if ($get_suspects->num_rows > 1) {
                                                // $suspect = $get_suspects->fetch_assoc();
                                            ?>
                                                <?php echo $get_suspects->num_rows ?> suspects
                                            <?php
                                            } else {
                                                $suspect = $get_suspects->fetch_assoc();

                                                echo $suspect['name'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <button data-target="#reasonModal" data-toggle="modal" data-id="<?php echo $bRow['id'] ?>" class="edit btn btn-dark btn-sm"><span class="fa fa-eye"></span> View</button>
                                        </td>
                                        <td><?php echo convertDate($bRow['date']) ?></td>
                                        <td><?php echo convertTime($bRow['time']) ?></td>
                                        <td><?php echo $bRow['action'] ?></td>
                                        <td>
                                            <div class="btn-group dropdown">
                                                <button type="button" class="btn btn-sm btn-<?php echo $bRow['status'] == 0 ? 'danger' : 'success' ?>"><?php echo $bRow['status'] == 0 ? 'Not solved' : 'Solved' ?></button>
                                                <button type="button" class="btn btn-sm btn-<?php echo $bRow['status'] == 0 ? 'danger' : 'success' ?> dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item status" data-id="<?php echo $bRow['id'] ?>" data-content="0" href="#">Not Solved</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item status" data-id="<?php echo $bRow['id'] ?>" data-content="1" href="#">Solved</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropleft show">
                                                <a class="btn btn-secondary2 btn-lg dropdown-togglea" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fa fa-ellipsis-v"></span>
                                                </a>

                                                <div class="dropdown-menu bg-light shadow" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="edit-blotter-page.php?id=<?php echo $bRow['id'] ?>">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item edit" href="#deleteModal" data-toggle="modal" data-id="<?php echo $bRow['id'] ?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                    <!-- <?php
                                                    if ($get_suspects->num_rows == 1) {
                                                    ?>
                                                        <a class="dropdown-item view-info" data-type="suspect" data-id="<?php echo $suspect['id'] ?>" data-title="Suspect' Information" href="#infoModal" data-toggle="modal">
                                                            <i class="fa fa-info-circle"></i> Suspect Info
                                                        </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a class="dropdown-item view-suspects" data-id="<?php echo $group_id ?>" data-title="Suspect' Information" href="#suspects-modal" data-toggle="modal">
                                                            <i class="fa fa-info-circle"></i> View Suspects
                                                        </a>
                                                    <?php
                                                    }
                                                    ?> -->
                                                    <a href="view-blotter.php?id=<?php echo $bRow['id'] ?>" class=" dropdown-item" data-id="<?php echo $group_id ?>">
                                                    <i class='bx bx-fullscreen'></i> View
                                                    </a>
                                                    <a class="dropdown-item view-info" data-type="complainant" data-id="<?php echo $bRow['id'] ?>" data-title="Complainant Information" href="#infoModal" data-toggle="modal" data-name="<?php echo $bRow['complainant'] ?>">
                                                        <i class="fa fa-info-circle"></i> Complainant Info
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
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