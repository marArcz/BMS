<?php include "./includes/user_session.php" ?>
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
        <?php include 'includes/user_navbar.php'; ?>
        <?php include 'includes/user_sidemenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Residents
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="bx bxs-dashboard"></i> Home </a> </li>
                    <li class="active"> Residents</li>
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
                                            <td>
                                                <a data-target="#viewImageModal" data-toggle="modal" class="btn btn-sm edit" data-id="<?php echo $row['rID'] ?>">
                                                    <img class="img-thumbnail" src="<?php echo $row['photo'] ?>" alt="<?php echo $row['lastname'] . ' photo' ?>" width="30px" height="30px">
                                                </a>
                                            </td>
                                            <td class="">
                                                <div class="dropleft show">
                                                <a class="btn btn-lg" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="fa fa-ellipsis-v"></span>
                                                    </a>
                                                    <!-- fetch officials -->
                                                    <?php
                                                    $ofQuery = run_query("SELECT * FROM officials INNER JOIN positions ON officials.position = positions.id WHERE positions.description LIKE '%Captain%'");
                                                    $count = $ofQuery->num_rows;
                                                    ?>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item edit" href="#viewModal" data-toggle="modal" data-id="<?php echo $row['rID'] ?>" title="View Resident's Full Information">
                                                            <button type="button" class="btn p-0" data-toggle="tooltip" data-placement="left" title="View resident's information.">
                                                                <i class="bx bx-fullscreen"></i> Full Information
                                                            </button>
                                                        </a>
                                                        <!-- <a id="" class="dropdown-item" data-toggle="tooltip" data-placement="left" title='Print Resident ID with QR Code'>
                                                            <button type="button" class="btn p-0 print-id" data-toggle="modal" data-target="#print-modal" data-id="<?php echo $row['rID'] ?>" <?php echo $count == 0 ? 'disabled' : '' ?>>
                                                                <i class="fa fa-sticky-note-o"></i> Print ID
                                                            </button>
                                                        </a> -->
                                                        <a id="clearance_btn" class="dropdown-item" data-toggle="tooltip" data-placement="left" title="<?php echo $count == 0 ? 'You need to add a baranggay captain first!' : 'Print baranggay clearance'  ?>">
                                                            <button type="button" class="btn p-0 edit" data-toggle="modal" data-target="#clearanceModal" data-id="<?php echo $row['rID'] ?>" <?php echo $count == 0 ? 'disabled' : '' ?>>
                                                                <i class="bx bx-note"></i> Print Clearance
                                                            </button>
                                                        </a>
                                                        <a id="clearance_btn" class="dropdown-item" data-toggle="tooltip" data-placement="left" title="<?php echo $count == 0 ? 'You need to add a baranggay captain first!' : 'Print baranggay indigency'  ?>">
                                                            <button type="button" class="btn p-0 edit" data-toggle="modal" data-target="#purposeModal" data-id="<?php echo $row['rID'] ?>" <?php echo $count == 0 ? 'disabled' : '' ?>>
                                                                <i class="bx bx-note"></i> Print Indigency
                                                            </button>
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
    <?php include "./includes/residentsModal.php" ?>

    <script>
        $("#print-id").click(function() {
            window.jsPDF = window.jspdf.jsPDF
            var doc = new jsPDF({
                orientation: "portrait",
                unit: "mm",
                format: [470, 615],
                size: "letter"
            });
            var source = $("#resident-id")[0]
            doc.setFontSize(12);
            // doc.autoPrint();
            doc.html(source, {
                callback: function(doc) {
                    let url = doc.output("bloburl");
                    window.open(url, "_blank");

                }

            });
        })
        $(".print-id").click(function() {
            // var qrcode = new QRCode("qr-code");
            // qrcode.clear();
            const resId = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: "get-id-info.php",
                data: {
                    resId
                },
                success: function(res) {
                    $("#resident-info-id").html(res);

                    var qrcode = new QRCode(document.getElementById("qr-code"), {
                        width: 100,
                        height: 100
                    });

                    qrcode.makeCode(resId);

                    // console.log(res)
                }
            })
        })
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
                    $("#view_img_preview").attr("src", res.photo);
                    $("#del_img_preview").attr("src", res.photo);
                    $(".residentBox").val(id);
                    // view Information
                    var fields = ["fname", "mname", "lname", "gender", "bdate", "bplace", "age", "education", "religion", "nationality", "civil_status", "occupation", "income", "household", "condition", "blood", "relationship","voter"];
                    var household = `#${res.number} Zone ${res.zone}`;
                    // var age = res.age > 1 ? `${res.age} yr. old` : `${res.age} yrs. old`
                    var values = [res.firstname, res.middlename, res.lastname, res.gender, res.birthDate, res.birthPlace, res.age, res.education, res.religion, res.nationality, res.civilStatus, res.occupation, res.income, household, res.healthCondition, res.bloodType, res.relationshipToHead,res.voter];
                    $("#view_img").attr("src", res.photo);
                    for (let x = 0; x < fields.length; x++) {

                        if(fields[x] == "voter"){
                            $(`#view_${fields[x]}`).html(values[x] == 1 ? "Yes":"No");
                        }else{
                            $(`#view_${fields[x]}`).html(values[x]);
                        }


                        if (fields[x] == "education" || fields[x] == "civil_status" || fields[x] == "relationship" || fields[x] == "blood") {
                            $(`#edit_${fields[x]}`).html(values[x]).val(values[x]);
                        } else if (fields[x] == "condition") {
                            if (res.condition == "PWD") {
                                $("#pwd_condition").attr("checked", true);
                            } else {
                                $("#normal_condition").attr("checked", true);
                            }
                        } 
                        else if(fields[x] == "voter"){
                            if (res.voter == 1) {
                                $("#voter-option-yes").attr("checked", true);
                            } else {
                                $("#voter-option-no").attr("checked", true);
                            }
                        }
                        else if (fields[x] == "household") {
                            $(`#edit_${fields[x]}`).val(res.household).html(household);
                        } else {
                            $(`#edit_${fields[x]}`).val(values[x]);
                        }

                    }
                    // clearance form info 
                    $(".b_form #resident_name").html(`${res.firstname} ${res.middlename} ${res.lastname}`);
                    $(".b_form #civil_status").html(res.civilStatus);
                    $(".b_form #nationality").html(res.nationality);
                    $(".b_form #street").html(`${res.number} Zone ${res.zone}`);

                    $("#view_phone").html(res.phone)
                    $("#view_mother").html(res.mother)
                    $("#view_father").html(res.father)
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