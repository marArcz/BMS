<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Payments</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Payments
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Payments</li>
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
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Resident</th>
                                        <th>Amount</th>
                                        <th>Purpose of payment</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = run_query("SELECT *, residents.id AS resID, payments.id AS payID FROM payments INNER JOIN residents ON payments.residentID = residents.id ORDER BY payments.id desc");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] . ' ' . $row['lastname'] ?></td>
                                            <td><?php echo $row['amount'] ?></td>
                                            <td><?php echo $row['purpose'] ?></td>
                                            <td><?php echo convertDate($row['date']) ?></td>
                                            <td><?php echo convertTime($row['time']) ?></td>
                                            <td>
                                                <button data-target="#editModal" data-toggle="modal" class="btn btn-primary btn-sm edit" data-id="<?php echo $row['payID'] ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button data-target="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm  delete" data-id="<?php echo $row['payID'] ?>">
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
                </div>
            </section>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/paymentModal.php" ?>

    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "payment_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    var fullname = `${res.firstname} ${res.lastname}`
                    $("#edit_resident").val(res.resID).html(fullname);
                    $(".modal .id").val(id);
                    $("#edit_amount").val(res.amount);
                    $("#edit_purpose").val(res.purpose);
                    $("#del_resident").html(fullname);
                    $("#del_purpose").html(res.purpose);
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