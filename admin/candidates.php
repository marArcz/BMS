<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
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
                            <h4 class="text-black-50 m-0">Candidates</h4>
                        </div>
                        <div class="col-sm-auto">
                            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="justify-content-end text-right m-0">
                                <ol class="breadcrumb bg-light my-0 mx-0">
                                    <li class="breadcrumb-item"><a href="success.php">Home</a></li>
                                    <li class="breadcrumb-item active d-flex align-items-center" aria-current="page"><i class="fa fa-black-tie mx-1"></i> Candidates</li>
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
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Position</th>
                                            <th>Photo</th>
                                            <th>Baranggay</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = run_query(
                                            "SELECT *, baranggay.description AS baranggay, candidate.id AS candidateID, position.description AS position 
                                            FROM candidate INNER JOIN position ON candidate.positionID = position.id INNER JOIN baranggay ON candidate.baranggayID = baranggay.id
                                            "
                                        );
                                        while ($row = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['firstname'] ." ". $row['middlename']. " ". $row['lastname'] ?></td>
                                                <td><?php echo $row['gender'] ?></td>
                                                <td><?php echo $row['position'] ?></td>
                                                <td class="text-center">
                                                    <img class="rounded-circle" src="<?php echo $row['image'] ?>" alt="<?php echo $row['lastname'].' photo' ?>" width="30px" height="30px">
                                                    <a data-target="#imageModal" data-toggle="modal" data-id="<?php echo $row['candidateID'] ?>" class="btn btn-sm edit"><span class="fa fa-edit"></span></a>
                                                </td>
                                                <td><?php echo $row['baranggay'] ?></td>
                                                <td>
                                                    <button data-target="#editModal" data-toggle="modal" class="btn btn-success btn-sm rounded-0 edit" data-id="<?php echo $row['candidateID'] ?>">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </button>
                                                    <button data-target="#deleteModal" data-toggle="modal" class="btn btn-danger btn-sm rounded-0 delete" data-id="<?php echo $row['candidateID'] ?>">
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
    <?php include "./includes/candidate_modal.php" ?>
    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "candidate_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    console.log("response: ", response);
                    const {firstname, middlename, lastname, positionID, position,image,baranggay,gender, baranggayID} = response;
                    $("#edit_baranggay").val(baranggayID).html(baranggay)
                    $("#edit_fname").val(firstname);
                    $("#edit_mname").val(middlename);
                    $("#edit_lname").val(lastname);
                    $("#edit_gender").val(gender).html(gender);
                    $(".modal .id").val(id);
                    $("#edit_position").val(positionID).html(position);
                    $(".candidate-name").html(`${firstname} ${middlename} ${lastname}`);
                    $("#delete_img-preview").attr("src",image);
                    $("#edit_img_preview").attr("src",image);
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