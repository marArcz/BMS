<?php include "./includes/session.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Admin</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
    <?php include "./includes/topbar.php" ?>
    <div class="">
        <div class="row gx-1">
            <?php include "./includes/sideMenu.php" ?>

            <main class="col pt-3 px-1 pr-2 mx-0">
                <div class="container-fluid">
                    <section class="row my-0 py-0">
                        <div class="col-sm my-0">
                            <h4 class="text-black-50 m-0">System Admin</h4>
                        </div>
                        <div class="col-sm-auto">
                            <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '>';" class="justify-content-end text-right m-0">
                                <ol class="breadcrumb bg-light my-0 mx-0">
                                    <li class="breadcrumb-item"><a href="success.php">Home</a></li>
                                    <li class="breadcrumb-item active d-flex align-items-center" aria-current="page"><i class="fa fa-user mx-1"></i> Admin</li>
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
                            <div class="card-body">
                                <p class="text-black-50"><i class="fa fa-gear "></i> Edit Account
                                    <button id="edit-form" data-edit="0" class="btn btn-sm" type="button"><span class="fa fa-pencil text-info"></span></button>
                                </p>
                                <p class="text-black-50"><small><i class="fa fa-info-circle"></i> Click on the pencil icon to edit account information.</small></p>
                                <hr>
                                <form action="admin_edit.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $admin['id'] ?>">
                                    <div class="form-group">
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <div class="row justify-content-center">
                                                    <div class="card">
                                                        <div class="card-body p-2 text-center">
                                                            <img src="<?php echo $admin['image'] ?>" alt="" class="img-fluid rounded" width="200px" height="200px">
                                                            <!-- <hr> -->
                                                            <br>
                                                            <button type="button" data-target="#imageModal" data-toggle="modal" class="btn btn-sm m-0 p-0 rounded-0 edit" id="editPhoto" data-id="<?php echo $admin['id'] ?>">
                                                                <i class="bx-camera bx bx-md"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label for="fname">Name:</label>
                                                <input type="text" id="fname" name="fname" value="<?php echo $admin['fullname'] ?>" class="form-control" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label for="gender">Gender:</label>
                                                <select name="gender" id="gender" class="form-control" disabled>
                                                    <option value="<?php echo $admin['gender'] ?>" id="gender-option"><?php echo $admin['gender'] ?></option>
                                                    <option value="<?php echo $admin['gender'] == 'Male' ? 'Female' : 'Male' ?>" id="gender-option"><?php echo $admin['gender'] == 'Male' ? 'Female' : 'Male'  ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label for="uname">Username:</label>
                                                <input type="text" id="uname" name="uname" value="<?php echo $admin['username'] ?>" class="form-control" required readonly>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-7">
                                                <label for="pass">Password:</label>

                                                <div class="row no-gutters">
                                                    <div class="col">
                                                        <input type="password" id="pass" value="<?php echo $admin['password'] ?>" class="form-control" readonly aria-describedby="edit-pass">
                                                        <p class="text-black-50 text-center"><small><i class="fa fa-info-circle"></i> To edit password, click on the edit button on the right.</small></p>
                                                    </div>
                                                    <div class="col-1">
                                                        <button data-target="#editModal" type="button" data-toggle="modal" class="btn btn-info btn rounded-0 edit" data-id="<?php echo $admin['id'] ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit-btn" class="btn btn-info" name="save" disabled>Save</button>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/adminModal.php" ?>

    <script>
        const getRow = id => {
            $.ajax({
                type: 'POST',
                url: "admin_row.php",
                data: {
                    id
                },
                dataType: "json",
                success: (response) => {
                    const {id, image} = response;
                    $(".modal .id").val(id);
                    $("#edit_img_preview").attr("src",image);
                }
            })
        }
        $(document).on("click", "#edit-form", function(e) {
            var val = Number($(this).attr("data-edit"));
            if (val == 0) {
                $("#image").removeAttr("disabled");
                $("#gender").removeAttr("disabled");
                $("#fname").removeAttr("readonly");
                $("#uname").removeAttr("readonly");
                $(this).attr("data-edit", 1);
                $("#submit-btn").removeAttr("disabled");

            } else {
                $("#fname").attr("readonly", true);
                $("#uname").attr("readonly", true);
                $("#image").attr("disabled", true);
                $("#gender").attr("disabled", true);
                $(this).attr("data-edit", 0);
                $("#submit-btn").attr("disabled", true);
            }
        })

        function validateChangePass(){
            console.log("validating..");
            if($("#current_password").val() == $("#pass").val()){
              return true;
            }
            console.log(false);
            $(".modal #lblTxt").html(`<small><i class="fa fa-info-circle"></i> Current Password entered is incorrect!</small>`)
            return false;
        }
        $(document).on("click", ".edit", function() {
            const id = $(this).attr("data-id");
            getRow(id);
        })
    </script>

</body>


</html>