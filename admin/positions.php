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
    <?php include "./includes/topbar.php" ?>
    <div class="">
        <div class="row gx-1">
            <?php include "./includes/sideMenu.php" ?>

            <main class="col pt-3 px-1 pr-2 mx-0">
                <div class="container-fluid">
                    <section class="row my-0 py-0">
                        <div class="col-sm my-0">
                            <h4 class="text-black-50 m-0">Positions</h4>
                        </div>
                        <div class="col-sm-auto">
                            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="justify-content-end text-right m-0">
                                <ol class="breadcrumb bg-light my-0 mx-0">
                                    <li class="breadcrumb-item"><a href="success.php">Home</a></li>
                                    <li class="breadcrumb-item active d-flex align-items-center" aria-current="page"><i class="fa fa-tasks mx-1"></i> Positions</li>
                                </ol>
                            </nav>
                        </div>
                    </section>
                    <hr>
                    <?php
                    include "./includes/alert.php";
                    ?>
                    <section>
                        <div class="card m-0">
                            <div class="card-header bg-white">
                                <button type="button" class="btn btn-info btn-sm rounded-0" data-toggle="modal" data-target="#addModal">
                                    <span class="fa fa-plus"></span> New
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <!-- <th class="hidden"></th> -->
                                            <th>Description</th>
                                            <th>Max Vote</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = run_query("SELECT * FROM position");
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['description'] ?></td>
                                                <td><?php echo $row['maxVote'] ?></td>
                                                <td>
                                                    <button data-target="#editModal" data-toggle="modal" class="btn btn-success btn-sm rounded-0 edit" data-id="<?php echo $row['id'] ?>">
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
            </main>
        </div>
    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/positionModal.php" ?>
    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "position_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    console.log("response: ", response);
                    const { description, maxVote, id, priority } = response;
                    
                    $("#edit_description").val(description);
                    $("#edit_maxVote").val(maxVote);
                    $("#edit_priority").val(priority);
                    $(".modal .id").val(id);
                    $("#position_name").html(description);
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