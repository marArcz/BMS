<?php include "./includes/user_session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-red">
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
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Positions</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
</body>

</html>