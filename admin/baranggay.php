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

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Baranggay 
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home </a> </li>
                    <li class="active"> Residents</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <!-- <th class="hidden"></th> -->
                                        <th>Name of baranggay</th>
                                        <th>City</th>
                                        <th>Province</th>
                                        <th>Baranggay Logo</th>
                                        <th>City Logo</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = run_query("SELECT * FROM baranggay");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['city'] ?></td>
                                            <td><?php echo $row['province'] ?></td>
                                            <td class="text-center">
                                                <img class="rounded-circle" src="<?php echo $row['baranggayLogo'] ?>" width="50px" height="50px">
                                                <a data-target="#b_imageModal" data-toggle="modal" class="btn text-primary btn-sm" id="change_b_logo" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit"></span></a>
                                            </td>
                                            <td class="text-center">
                                                <img class="rounded-circle" src="<?php echo $row['cityLogo'] ?>" width="50px" height="50px">
                                                <a data-target="#c_imageModal" data-toggle="modal" class="btn text-primary btn-sm" id="change_c_logo" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit"></span></a>
                                            </td>
                                            <td>
                                                <button data-target="#editModal" data-toggle="modal" class="btn btn-primary btn-sm rounded-0 edit" data-id="<?php echo $row['id'] ?>">
                                                    <i class="fa fa-edit"></i> Edit
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
    <?php include "./includes/baranggayModal.php" ?>
    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "baranggay_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (res) => {
                    console.log("response: ", res);
                    const {
                        name
                    } = res;
                    $("#edit_description").val(name);
                    $(".modal .id").val(id);
                    $("#edit_province").val(res.province);
                    $("#edit_city").val(res.city);
                    $("#edit_province").val(res.province);
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
        $(document).on("click", "#change_b_logo", function() {
            const id = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: "baranggay_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    console.log("response: ", response);
                    const {
                        baranggayLogo,
                        cityLogo
                    } = response;
                    $("#b_img_preview").attr("src", baranggayLogo);
                    $(".modal .id").val(id);
                }
            })
        })
        $(document).on("click", "#change_c_logo", function() {
            const id = $(this).attr("data-id");
            $.ajax({
                type: 'POST',
                url: "baranggay_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    console.log("response: ", response);
                    const {
                        baranggayLogo,
                        cityLogo
                    } = response;
                    $("#c_img_preview").attr("src", cityLogo);
                    $(".modal .id").val(id);
                }
            })
        })
    </script>
</body>


</html>