<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Officials
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Officials</li>
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
                    <button data-target="#addModal" data-toggle="modal" class="btn btn-primary btn-sm btn-rounded"><span class="bx bx-plus"></span> Add new</button>
                    </div>
                </div>
                <div class="card-body bg-white">
                    <?php
                    $query = run_query("SELECT *, officials.id AS oID FROM officials INNER JOIN positions ON officials.position = positions.id");
                    ?>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Photo</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td>Brgy. <?php echo $row['description'] ?></td>
                                        <td><?php echo $row['firstname'] ?></td>
                                        <td><?php echo $row['middlename'] ?></td>
                                        <td><?php echo $row['lastname'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['age'] ?></td>
                                        <td class="text-center">
                                            <img class="rounded-circle" src="<?php echo $row['photo'] ?>" alt="<?php echo $row['lastname'] . ' photo' ?>" width="30px" height="30px">
                                            <a data-target="#imageModal" data-toggle="modal" class="btn text-primary btn-sm edit" data-id="<?php echo $row['oID'] ?>"><span class="fa fa-edit"></span></a>
                                        </td>
                                        <td>
                                            <button data-target="#editModal" data-toggle="modal" class="btn btn-primary btn-sm edit" data-id="<?php echo $row['oID'] ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button data-target="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm edit" data-id="<?php echo $row['oID'] ?>">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
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
    <?php include "./includes/officialModal.php" ?>

    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "official_row.php",
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
                    $("#edit_pos").val(res.position).html('Brgy. '+res.description);
                    $(".modal .id").val(id);
                    $(".modal .name").html(fullname);
                    $("#img_preview").attr("src", res.photo);
                    $("#del_img_preview").attr("src", res.photo);

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