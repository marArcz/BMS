<?php include "./includes/user_session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Permit</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini  theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/user_navbar.php'; ?>
        <?php include 'includes/user_sidemenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Permit
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
                    $query = run_query("SELECT *, CONCAT(residents.firstname, ' ', residents.middlename, ' ', residents.lastname ) AS resName, permit.id AS pID FROM permit INNER JOIN residents ON permit.residentID = residents.id");
                    ?>
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Resident Name</th>
                                    <th>Business Name</th>
                                    <th>Business Address</th>
                                    <th>Business Type</th>
                                    <th>OR Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $query->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['resName'] ?></td>
                                        <td><?php echo $row['businessName'] ?></td>
                                        <td><?php echo $row['businessAddress'] ?></td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['orNumber'] ?></td>
                                        <td>
                                            <button data-target="#editModal" data-toggle="modal" class="btn btn-primary btn-sm edit" data-id="<?php echo $row['pID'] ?>">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button data-target="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm  delete" data-id="<?php echo $row['pID'] ?>">
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
    <?php include "./includes/permitModal.php" ?>

    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "permit_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    var fullname = `${res.firstname} ${res.middlename} ${res.lastname}`
                    $("#edit_resident").val(res.resID).html(fullname);
                    $("#edit_bname").val(res.businessName);
                    $("#edit_btype").val(res.type);
                    $("#edit_baddress").val(res.businessAddress);
                    $("#edit_ornumber").val(res.orNumber);
                    $("#edit_amount").val(res.amount);
                    $(".modal .id").val(id);
                    $(".modal .bname").html(res.businessName);
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