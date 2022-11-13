<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini  theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Household
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home </a> </li>
                    <li class="active"> Household</li>
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
                    $query = run_query("SELECT * FROM household");
                    ?>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Household #</th>
                                    <th>Zone</th>
                                    <th>Total no. of family</th>
                                    <th>Family head</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['number'] ?></td>
                                        <td><?php echo $row['zone'] ?></td>
                                        <td><?php echo $row['family'] ?></td>
                                        <td><?php echo $row['head'] ?></td>
                                        <td>
                                            <button data-target="#editModal" data-toggle="modal" class="btn btn-primary btn-sm rounded-0 edit" data-id="<?php echo $row['id'] ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button data-target="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm rounded-0 delete" data-id="<?php echo $row['id'] ?>">
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
    <?php include "./includes/householdModal.php" ?>

    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "household_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    $("#edit_number").val(res.number);
                    $("#edit_zone").val(res.zone);
                    $("#edit_family").val(res.family);
                    $("#edit_head").val(res.head).html(res.head);
                    $(".modal .number").html(res.number);
                    $(".modal .id").val(id);

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