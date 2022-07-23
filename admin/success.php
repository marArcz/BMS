<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Voting System</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="bg-light">
    <div class="">
        <div class="row" style="gap: 0.2vw ;">
            <?php include "./includes/sideMenu.php" ?>
            <main class="col px-1 pr-2 mx-0 pt-0 mt-0">
                <div class="container-fluid pt-0 mt-0">
                    <?php include "./includes/topbar.php" ?>
                    <section class="row my-0 py-0">
                        <div class="col-md my-0">
                            <h4 class="text-black-50 m-0">Dashboard</h4>
                        </div>
                        <div class="col-sm-auto">
                            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="justify-content-end text-right m-0">
                                <ol class="breadcrumb bg-light my-0 mx-0">
                                    <li class="breadcrumb-item active d-flex align-items-center" aria-current="page"><i class="bx bxs-dashboard mx-1"></i> Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </section>
                    <hr>
                    <?php
                    include "./includes/alert.php";
                    ?>
                </div>
            </main>
        </div>
    </div>
    <?php include "./includes/scripts.php" ?>

</body>

</html>