<?php include "./includes/user_session.php" ?>
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
        <?php include 'includes/user_navbar.php'; ?>
        <?php include 'includes/user_sidemenu.php'; ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="font-family: poppins;">
                    Dashboard
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="bx bxs-dashboard"></i> Dashboard</a></li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
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
                                    <h5 class="text-center text-capitalize text-teal">Summary of Population</h5>
                                    <div class="row justify-content-center gx-2 gy-2">
                                        <div class="col-sm">
                                            <!-- population -->
                                            <div class="card ">
                                                <div class="card-body bg-teal">
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
                                                <div class="card-body bg-success">
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
                                    <h5 class="text-center text-capitalize text-teal mt-4">Blotter Record Summary</h5>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <div class="card text-light bg-teal">
                                                <div class="card-body ">
                                                    <p class="text-center mb-4">Recorded</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-light fa-3x fa fa-book"></span>
                                                        </div>
                                                        <div class="col-sm-3 text-center text-light">
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
                                            <div class="card bg-success text-light">
                                                <div class="card-body ">
                                                    <p class="text-center mb-4">Solved</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-light fa-3x fa fa-check-circle-o"></span>
                                                        </div>
                                                        <div class="col text-center text-light">
                                                            <h2><?php echo $solved ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <!-- female -->
                                            <div class="card bg-dark text-light">
                                                <div class="card-body">
                                                    <p class="text-center mb-4">Unsolved</p>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-3 text-center">
                                                            <span class="text-light fa-3x fa fa-close"></span>
                                                        </div>
                                                        <div class="col text-center text-light">
                                                            <h2><?php echo $unsolved ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- residents records summary -->
                            <?php
                            // get the number of under age residents
                            $under_age = run_query("SELECT COUNT(*) FROM residents WHERE age < 18")->fetch_array()[0];
                            // get the number of legal age residents
                            $legal_age = run_query("SELECT COUNT(*) FROM residents WHERE age >= 18 AND age <= 59")->fetch_array()[0];
                            // get the number of middle aged residents
                            $middle_age = run_query("SELECT COUNT(*) FROM residents WHERE age >= 40 && age <= 60")->fetch_array()[0];
                            // get the number of senior citizens
                            $senior = run_query("SELECT COUNT(*) FROM residents WHERE age >= 60")->fetch_array()[0];
                            ?>
                            <div class="mt-5">

                            </div>
                            <!-- residents -->
                            <div class="my-2">
                                <p class="mb-2 fw-bold">
                                    <strong>Residents Summary</strong>
                                </p>
                                <div class="row mt-3 gy-2">
                                    <!-- under age -->
                                    <div class="col-md-6 my-2">
                                        <div class="card bg-teal">
                                            <div class="card-body">
                                                <?php
                                                if ($under_age > 0) {
                                                ?>
                                                    <a class=" text-light" href="resident-summary.php?filter=under_aged">
                                                        <strong>Under age Residents</strong>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <p class="text-light">
                                                        <strong>Under age Residents</strong>
                                                    </p>
                                                <?php
                                                }
                                                ?>
                                                <h5 class="fs-5 mt-3 text-light">
                                                    <?php echo $under_age ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- legal age -->
                                    <div class="col-md-6 my-2">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <?php
                                                if ($legal_age > 0) {
                                                ?>
                                                    <a class="text-light" href="resident-summary.php?filter=legal_aged">
                                                        <strong>Legal age Residents</strong>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <p class="text-light">
                                                        <strong>Legal age Residents</strong>
                                                    </p>
                                                <?php
                                                }
                                                ?>
                                                <h5 class="mt-3 fs-5 text-light">
                                                    <?php echo $legal_age ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- middle age -->
                                    <!-- <div class="col-md-5 my-2">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <?php
                                                            if ($middle_age > 0) {
                                                            ?>
                                                                <a class=" text-dark" href="resident-summary.php?filter=middle_aged">
                                                                    <strong>Middle aged</strong>
                                                                </a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <p>
                                                                    <strong>Middle aged</strong>
                                                                </p>
                                                            <?php
                                                            }
                                                            ?>
                                                            <h5 class="fs-5 mt-3 text-primary">
                                                                <?php echo $middle_age ?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div> -->
                                    <!-- senior citizen -->
                                    <div class="col-md-6 my-2">
                                        <div class="card bg-gray">
                                            <div class="card-body">
                                                <?php
                                                if ($senior > 0) {
                                                ?>
                                                    <a class="text-dark" href="resident-summary.php?filter=senior_citizen">
                                                        <strong>Senior Citizen</strong>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <p class="">
                                                        <strong>Senior Citizen</strong>
                                                    </p>
                                                <?php
                                                }
                                                ?>
                                                <h5 class="mt-3 fs-5 text-dark">
                                                    <?php echo $senior ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- zones -->
                            <p class="mt-4"><strong>Population Records</strong></p>
                            <div class="row">
                                <?php
                                // get households
                                $query = run_query("SELECT * FROM household GROUP BY zone");
                                while ($row = $query->fetch_assoc()) {
                                    $id = $row['id'];
                                    $resident_count = run_query("SELECT COUNT(*) FROM residents WHERE household = $id")->fetch_array()[0];

                                ?>
                                    <div class="col-md-6">
                                        <div class="card bg-dark text-light">
                                            <div class="card-body">
                                                <?php
                                                if ($resident_count > 0) {
                                                ?>
                                                    <a class="text-light" href="resident-summary.php?filter=zone&zone=<?php echo $row['zone'] ?>">
                                                        <strong>Zone <?php echo $row['zone'] ?></strong>
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <p><strong>Zone <?php echo $row['zone'] ?></strong></p>
                                                <?php
                                                }
                                                ?>
                                                <p class="mt-3"><strong>
                                                        <?php echo $resident_count ?>
                                                    </strong></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div> <!-- end of card-body -->

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