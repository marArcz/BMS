<?php
include "./includes/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Blotter</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini theme-light-blue">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Blotter History
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Blotter History</li>
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
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = run_query("SELECT * FROM blotter_history ORDER BY id desc");
                                    while ($bRow = $query->fetch_assoc()) {

                                    ?>
                                        <tr>
                                            <td><?php echo $bRow['complainant'] ?></td>
                                            <td><?php echo $bRow['suspect'] ?></td>
                                            <td>
                                                <button data-target="#reasonModal" data-toggle="modal" data-content="<?php echo $bRow['reason'] ?>" class="view btn btn-dark btn-sm"><span class="fa fa-eye"></span> View</button>
                                            </td>
                                            <td><?php echo convertDate($bRow['date']) ?></td>
                                            <td><?php echo convertTime($bRow['time']) ?></td>
                                            <!-- <td>
                                                <button class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $bRow['id'] ?>">
                                                    <span class="fa fa-trash"></span> Delete
                                                </button>
                                            </td> -->
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
          const getRow = (id) => {
            $.ajax({
                type: 'POST',
                url: "blotter_history_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    $(".modal .id").val(id);
                }
            })
        }
        const getNumericMonth = (mon) => {
            let arr = "january, february,march,april,may,june,july,august,september,october,november,december".split(",");
            for (let x = 0; x < arr.length; x++) {
                if (mon.toLowerCase() == arr) {
                    return x < 10 ? `0${x}` : x;
                }
            }
        }

        $(document).on("click", ".view", function() {
            const reason = $(this).attr("data-content");
            $("#view_reason").html(reason);
        })
        $(document).on("click", ".delete", function() {
            const id = $(this).attr("data-id");
            $(".modal .id").val(id);
        })
    
    </script>
</body>


</html>