<?php include "./includes/session.php" ?>
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
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="font-family: poppins;">
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Positions</li>
                </ol>
            </section>
            <hr class="mb-0">
            <!-- Main content -->
            <?php
            $query = run_query("SELECT * FROM baranggay");
            if ($query->num_rows > 0) {
                $baranggay = $query->fetch_assoc();
            ?>
                <section class="content">
                    <div class="card">
                        <div class="card-body bg-white">
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <div class="col-sm-4">
                                            <img src="<?php echo $baranggay['baranggayLogo'] ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="col align-self-center">
                                            <h5>Baranggay <?php echo $baranggay['name'] ?></h5>
                                            <p><small>Baranggay <?php echo $baranggay['name'] ?></small></p>
                                        </div>
                                    </div>
                                    <h5>Current Baranggay Officials</h5>
                                    <div class="table-responsive-sm">
                                        <table class="table">
                                            <thead class="bg-dark text-white ">
                                                <tr>
                                                    <th>Full name</th>
                                                    <th>Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = run_query("SELECT * FROM officials INNER JOIN positions ON officials.position = positions.id");
                                                while ($row = $query->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']  ?></td>
                                                        <td>Brgy. <?php echo $row['description'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <!-- fetch info -->
                                    <?php
                                    $query = run_query("SELECT * FROM residents");
                                    $population = $query->num_rows;
                                    $male = 0;
                                    $female = 0;
                                    while ($row = $query->fetch_assoc()) {
                                        if ($row['gender'] == "Male") {
                                            $male += 1;
                                        } else {
                                            $female += 1;
                                        }
                                    }
                                    // fetch blotter info 
                                    $query = run_query("SELECT * FROM blotter");
                                    $recorded = $query->num_rows;
                                    $solved = 0;
                                    $unsolved = 0;
                                    while ($row = $query->fetch_assoc()) {
                                        if ($row['status'] == 1) {
                                            $solved += 1;
                                        } else {
                                            $unsolved += 1;
                                        }
                                    }
                                    ?>
                                    <h5 class="text-center text-capitalize text-primary">Resident Record Summary</h5>
                                    <div class="row justify-content-center gx-2 gy-2">
                                        <div class="col-sm">
                                            <!-- population -->
                                            <div class="card">
                                                <div class="card-body bg-dark">
                                                    <p class="text-white text-center mb-4">Total Population</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-white-50 fa-3x fa fa-group"></span>
                                                        </div>
                                                        <div class="col-3 text-center text-white">
                                                            <h2><?php echo $population ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-sm ">
                                            <!-- male -->
                                            <div class="card">
                                                <div class="card-body bg-dark">
                                                    <p class="text-white text-center mb-4">Male</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-white-50 fa-3x fa fa-male"></span>
                                                        </div>
                                                        <div class="col text-center text-white">
                                                            <h2><?php echo $male ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm ">
                                            <!-- female -->
                                            <div class="card">
                                                <div class="card-body bg-dark">
                                                    <p class="text-white text-center mb-4">Female</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-white-50 fa-3x fa fa-female"></span>
                                                        </div>
                                                        <div class="col text-center text-white">
                                                            <h2><?php echo $female ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="text-center text-capitalize text-primary mt-4">Blotter Record Summary</h5>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="card border-primary">
                                                <div class="card-body ">
                                                    <p class="text-center mb-4">Recorded</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-black-50 fa-3x fa fa-book"></span>
                                                        </div>
                                                        <div class="col-sm-3 text-center text-black">
                                                            <h2><?php echo $recorded ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-sm mr-1">
                                            <!-- male -->
                                            <div class="card border-primary">
                                                <div class="card-body ">
                                                    <p class="text-center mb-4">Solved</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-black-50 fa-3x fa fa-check-circle-o"></span>
                                                        </div>
                                                        <div class="col text-center text-black">
                                                            <h2><?php echo $solved ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <!-- female -->
                                            <div class="card border-primary">
                                                <div class="card-body">
                                                    <p class="text-center mb-4">Unsolved</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-black-50 fa-3x fa fa-close"></span>
                                                        </div>
                                                        <div class="col text-center text-black">
                                                            <h2><?php echo $unsolved ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
            }
            ?>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
</body>

</html>