<?php
include "./includes/user_session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Blotter</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
    <div class="wrapper">
        <?php include 'includes/user_navbar.php'; ?>
        <?php include 'includes/user_sidemenu.php'; ?>
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
                                        $complainant = run_query("SELECT * FROM residents WHERE id = " . $bRow['complainant'])->fetch_assoc();
                                        $suspect = run_query("SELECT * FROM residents WHERE id = " . $bRow['suspect'])->fetch_assoc();

                                    ?>
                                        <tr>
                                            <td><?php echo $complainant['firstname'] . ' ' . $complainant['lastname'] ?></td>
                                            <td><?php echo $suspect['firstname'] . ' ' . $suspect['lastname'] ?></td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="View complainant's complaints">
                                                    <button data-target="#reasonModal" data-toggle="modal" data-id="<?php echo $bRow['id'] ?>" class="edit btn btn-dark btn-sm"><span class="fa fa-eye"></span> View</button>
                                                </a>
                                            </td>
                                            <td><?php echo convertDate($bRow['date']) ?></td>
                                            <td><?php echo convertTime($bRow['time']) ?></td>
                                            <td><?php echo $bRow['action'] ?></td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <button data-toggle="tooltip" data-placement="top" title="Only admin can change the status." type="button" class="disabled btn btn-sm btn-<?php echo $bRow['status'] == 0 ? 'danger' : 'success' ?>"><?php echo $bRow['status'] == 0 ? 'Not solved' : 'Solved' ?>
                                                        <span class="dropdown-toggle text-white"></span>
                                                    </button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="dropleft show">
                                                    <a class="btn btn-secondary2 btn-lg dropdown-togglea" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="fa fa-ellipsis-v"></span>
                                                    </a>

                                                    <div class="dropdown-menu bg-light shadow" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item view-info" data-title="Suspect Information" href="#infoModal" data-toggle="modal" data-id="<?php echo $suspect['id'] ?>">
                                                            <i class="fa fa-info-circle"></i> Suspect Info
                                                        </a>
                                                        <a class="dropdown-item view-info" data-title="Complainant Information" href="#infoModal" data-toggle="modal" data-id="<?php echo $complainant['id'] ?>">
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