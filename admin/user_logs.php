<?php include "./includes/user_session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | System users</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
    <div class="wrapper">
        <?php include 'includes/user_navbar.php'; ?>
        <?php include 'includes/user_sidemenu.php'; ?>
        <div class="content-wrapper ">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="font-family: poppins;">
                    Activity Log
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Activity Log</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content ">
                <div class="row">
                    <div class="col">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table " id="table">
                                        <thead>
                                            <tr>
                                                <th>User Type</th>
                                                <th>Name</th>
                                                <th>Activity</th>
                                                <th>Log Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = run_query("SELECT *, users.id AS uID FROM log INNER JOIN users ON log.user = users.id INNER JOIN usertypes ON users.type = usertypes.id ORDER BY log.id desc");
                                            while ($row = $query->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['description'] ?></td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td><?php echo $row['activity'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
                    $("#edit_gender").val(res.gender).html(res.gender);
                    $("#edit_type").val(res.type).html(res.description);
                    $(".modal .id").val(res.uID);
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