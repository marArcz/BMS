<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | System users</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper " style="overflow-y: auto; max-height: 100%;">
            <!-- Content Header (Page header) -->
            <section class="content-header mb-0" >
                <h1 style="font-family: poppins;">
                    System Users
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Positions</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content mt-0">
                <p class="text-black-50 text-center">
                    <small><i class="fa fa-info-circle text-primary"></i> Below are the accounts of authorized personels you want to have access to this system. </small>
                </p>
                <div class="card">
                    <div class="card-header">
                        <button data-target="#addModal" data-toggle="modal" class="btn btn-primary btn-sm"><span class="bx bx-plus"></span> Add new</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Username</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = run_query("SELECT *, users.id AS uID FROM users INNER JOIN usertypes ON users.type = usertypes.id WHERE usertypes.description != 'Admin' ORDER BY users.type asc");
                                while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['description'] ?></td>
                                        <td><?php echo $row['fullname'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['username'] ?></td>
                                        <td class="text-center">
                                            <img class="rounded-circle" src="<?php echo $row['photo'] ?>" alt="<?php echo $row['fullname'] . ' photo' ?>" width="30px" height="30px">
                                            <a data-target="#imageModal" data-toggle="modal" class="btn text-primary btn-sm edit" data-id="<?php echo $row['uID'] ?>"><span class="fa fa-edit"></span></a>
                                        </td>
                                        <td>
                                            <button data-target="#editModal" data-toggle="modal" class="btn btn-primary btn-sm rounded-0 edit" data-id="<?php echo $row['uID'] ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button data-target="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm rounded-0 delete" data-id="<?php echo $row['uID'] ?>">
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
    <?php include "./includes/usersModal.php" ?>

    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "users_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    $("#edit_fname").val(res.fullname);
                    $("#edit_address").val(res.address);
                    $("#edit_uname").val(res.username);
                    $("#edit_pass").val(res.password);
                    $("#edit_gender").val(res.gender).html(res.gender);
                    $("#edit_type").val(res.type).html(res.description);
                    $(".modal .id").val(res.uID);
                    $(".modal .name").html(res.fullname);
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