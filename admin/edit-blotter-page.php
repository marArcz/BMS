<?php
include "./includes/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Blotter</title>
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
                    Edit blotter
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
                <a href="blotter.php" class="btn btn-dark mb-3">
                    <i class="bx bx-arrow-back"></i>
                </a>
                <div class="card">
                    <div class="card-body bg-white">
                        <!-- complainant form -->
                        <form action="blotter_edit.php" class="complainant-form" method="POST">
                            <?php
                            $group_id = run_query("SELECT id FROM suspect_group WHERE blotter_id = " . $_GET['id'])->fetch_array()[0];
                            ?>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                            <input type="hidden" name="group_id" value="<?php echo $group_id ?>">
                            <div class="form-group mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                        $blotter_id = $_GET['id'];
                                        $query = run_query("SELECT * FROM blotter WHERE id = $blotter_id");
                                        $blotter = $query->fetch_assoc();
                                        ?>

                                        <p class="form-text flex-1 fw-bold">
                                            <strong>Complainant Information</strong>
                                        </p>
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <label for="complainant">Name: </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="complainant" value="<?php echo $blotter['complainant'] ?>" class="form-control text-capitalize" list="complainant-list">
                                                <datalist id="complainant-list">
                                                    <?php
                                                    $query = run_query("SELECT * FROM residents");
                                                    while ($row = $query->fetch_assoc()) {
                                                    ?>
                                                        <option value="<?php echo $row['firstname'] . ' ' . $row['lastname'] ?>"></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <label for="">Age: </label>
                                            </div>
                                            <div class="col">
                                                <input required type="number" value="<?php echo $blotter['complainant_age'] ?>" class="form-control" name="complainant_age">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <label for="">Phone: </label>
                                            </div>
                                            <div class="col">
                                                <input required type="number" class="form-control" value="<?php echo $blotter['complainant_phone'] ?>" name="complainant_phone">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <label for="">Address: </label>
                                            </div>
                                            <div class="col">
                                                <input required type="text" class="form-control" value="<?php echo $blotter['complainant_address'] ?>" name="complainant_address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-end mb-3">
                                    <button class="btn-primary btn btn-sm" type="button" id="add-suspect">Add Suspect</button>
                                </div>
                                <div id="suspect-form-container">

                                    <p class="form-text">
                                        <strong>Suspect Information</strong>
                                    </p> <!-- suspect -->
                                    <?php
                                    $query = run_query("SELECT * FROM suspect WHERE suspect_group IN (SELECT id FROM suspect_group WHERE blotter_id = $blotter_id)");
                                    $x=1;
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="form-text">
                                                    <strong>Suspect #<?php echo $x++ ?></strong>
                                                </p>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4">
                                                        <label for="suspect">Name: </label>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" name="suspect[]" value="<?php echo $row['name'] ?>" required class="form-control text-capitalize" list="suspect-list">
                                                        <datalist id="suspect-list">
                                                            <?php
                                                            $get_residents = run_query("SELECT * FROM residents");
                                                            while ($resident = $get_residents->fetch_assoc()) {
                                                            ?>
                                                                <option value="<?php echo $resident['firstname'] . ' ' . $resident['lastname'] ?>"></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4">
                                                        <label for="">Age: </label>
                                                    </div>
                                                    <div class="col">
                                                        <input required value="<?php echo $row['age'] ?>" type="number" class="form-control" name="suspect_age[]">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4">
                                                        <label for="">Phone: </label>
                                                    </div>
                                                    <div class="col">
                                                        <input required type="number" value="<?php echo $row['phone'] ?>" class="form-control" name="suspect_phone[]">
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-4">
                                                        <label for="">Address: </label>
                                                    </div>
                                                    <div class="col">
                                                        <input required type="text" value="<?php echo $row['address'] ?>" class="form-control" name="suspect_address[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="form-text text-primary">
                                                <strong>Complaint Information</strong>
                                            </p>
                                            <!-- date -->
                                            <div class="row mb-2">
                                                <div class="col-sm-4">
                                                    <label for="date">Date: </label>
                                                </div>
                                                <div class="col">
                                                    <input required type="date" class="form-control" id="date" name="date" value="<?php echo $blotter['date'] ?>">
                                                </div>
                                            </div>
                                            <!-- time -->
                                            <div class="row mb-2">
                                                <div class="col-sm-4">
                                                    <label for="time">Time: </label>
                                                </div>
                                                <div class="col">
                                                    <input required type="time" class="form-control" value="<?php echo $blotter['time'] ?>" id="time" name="time">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4">
                                                    <label for="reason">Action taken: </label>
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" id="action" value="<?php echo $blotter['action'] ?>" name="action" required>
                                                </div>
                                            </div>
                                            <!-- reasone -->
                                            <div class="row mb-2">
                                                <div class="col-sm-4">
                                                    <label for="reason">Complaint: </label>
                                                </div>
                                                <div class="col">
                                                    <textarea required name="reason" id="reason" class="form-control" cols="30" rows="10"><?php echo $blotter['reason'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="justify-content: space-between;">
                                <button type="button" class="btn btn-sm btn-secondary " data-dismiss="modal">Cancel</button>
                                <button type="submit" name="save" class="btn btn-sm btn-primary ">Update</button>
                            </div>
                        </form>
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
        $(".remove-suspect-form").on("click", function(e) {
            $(this).parent().parent().remove();
        })

        $("#add-suspect").on('click', function(e) {
            const form = `
           <div class="card mb-3">
           <div class="card-body">
            <div class="text-right">
                <button class="btn btn-danger btn-sm remove-suspect-form" type="button">Remove</button>
            </div>
            <p class="form-text">
                                    <strong>Suspect Information</strong>
                                </p>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <label for="suspect">Name: </label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="suspect[]" class="form-control text-capitalize" list="suspect-list">
                                        <datalist id="suspect-list">
                                            <?php
                                            $query = run_query("SELECT * FROM residents");
                                            while ($row = $query->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $row['firstname'] . ' ' . $row['lastname'] ?>"></option>
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <label for="">Age: </label>
                                    </div>
                                    <div class="col">
                                        <input required type="number" class="form-control" name="suspect_age[]">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <label for="">Phone: </label>
                                    </div>
                                    <div class="col">
                                        <input required type="number" class="form-control" name="suspect_phone[]">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <label for="">Address: </label>
                                    </div>
                                    <div class="col">
                                        <input required type="text" class="form-control" name="suspect_address[]">
                                    </div>
                                </div>
                               
                                <hr/>
           </div>
           </div>
            `
            $("#suspect-form-container").prepend(form);
            $(".remove-suspect-form").on("click", function(e) {
                $(this).parent().parent().parent().remove();
            })
        })

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