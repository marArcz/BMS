<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-red">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Generate Clearance
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home </a> </li>
                    <li class="active"> Clearance</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header text">
                        <button data-target="#addModal" data-toggle="modal" class="btn btn-danger btn-sm btn-rounded"><span class="fa fa-plus"></span> New</button>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Household No.</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = run_query("SELECT *, residents.id AS rID FROM residents INNER JOIN household ON residents.household = household.id");
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['firstname'] ?></td>
                                        <td><?php echo $row['middlename'] ?></td>
                                        <td><?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['number'] ?></td>
                                        <td class="text-center">
                                            <img class="rounded-circle" src="<?php echo $row['photo'] ?>" alt="<?php echo $row['lastname'] . ' photo' ?>" width="30px" height="30px">
                                            <a data-target="#imageModal" data-toggle="modal" class="btn text-primary btn-sm edit" data-id="<?php echo $row['rID'] ?>"><span class="fa fa-edit"></span></a>
                                        </td>
                                        <td class="">
                                            <div class="dropdown show">
                                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <!-- <span class="fa-ellipsis-v fa"></span> -->
                                                    <span class="">Action</span>
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item edit" href="#editModal" data-toggle="modal" data-id="<?php echo $row['rID'] ?>">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item edit" href="#deleteModal" data-toggle="modal" data-id="<?php echo $row['rID'] ?>">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                    <a class="dropdown-item edit" href="#viewModal" data-toggle="modal" data-id="<?php echo $row['rID'] ?>">
                                                        <i class="fa fa-info-circle"></i> Information
                                                    </a>
                                                    <a class="dropdown-item edit" href="#deleteModal" data-toggle="modal" data-id="<?php echo $row['rID'] ?>">
                                                        <i class="fa fa-book"></i> Complaint Records
                                                    </a>
                                                    <a class="dropdown-item edit" href="#deleteModal" data-toggle="modal" data-id="<?php echo $row['rID'] ?>">
                                                        <i class="fa fa-sticky-note-o"></i> Generate Clearance
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
    <?php include "./includes/residentsModal.php" ?>

    <script>
        const getRow = id => {
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
                    $("#edit_fname").val(res.firstname);
                    $("#edit_mname").val(res.middlename);
                    $("#edit_lname").val(res.lastname);
                    $("#edit_age").val(res.age);
                    $("#edit_gender").val(res.gender).html(res.gender);
                    $(".modal .id").val(res.rID);
                    $(".modal .name").html(fullname);
                    $("#img_preview").attr("src", res.photo);
                    $("#del_img_preview").attr("src", res.photo);

                    // view Information
                    var fields = ["fname", "mname", "lname", "gender", "bdate", "bplace", "age", "education", "religion", "nationality", "civil_status", "occupation", "income", "household", "condition", "blood", "relationship"];
                    var household = `#${res.number} Zone ${res.zone}`;
                    // var age = res.age > 1 ? `${res.age} yr. old` : `${res.age} yrs. old`
                    var values = [res.firstname, res.middlename, res.lastname, res.gender, res.birthDate, res.birthPlace, res.age, res.education, res.religion, res.nationality, res.civilStatus, res.occupation, res.income, household, res.healthCondition, res.bloodType, res.relationshipToHead];

                    for (let x = 0; x < fields.length; x++) {
                        $(`#view_${fields[x]}`).html(values[x]);

                        if (fields[x] == "education" || fields[x] == "civil_status" || fields[x] == "relationship"|| fields[x]=="blood") {
                            $(`#edit_${fields[x]}`).html(values[x]).val(values[x]);
                        } else if (fields[x] == "condition") {
                            if (res.condition == "PWD") {
                                $("#pwd_condition").attr("checked", true);
                            } else {
                                $("#normal_condition").attr("checked", true);
                            }
                        }else if(fields[x] == "household"){
                            $(`#edit_${fields[x]}`).val(res.household).html(household);
                        }
                        else {
                            $(`#edit_${fields[x]}`).val(values[x]);
                        }

                    }

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
    </script>
</body>


</html>