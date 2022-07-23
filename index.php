<?php
include("./conn/conn.php");
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_type']) {
    switch ($_SESSION['user_type']) {
        case "3":
            header("Location:home.php");
            break;
        case "2":
            header("Location:zoneLeader/index.php");
            break;
        default:
            header("Location:staff/index.php");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" integrity="sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/boxicons-master//css/boxicons.css">
    <link rel="stylesheet" href="./assets//sweetalert2//dist//sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: poppins;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container h-75 pt-4">
        <div class="row justify-content-center flex-column h-100 align-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_GET['error'])) {
                ?>
                    <div class="alert alert-light alert-dismissible fade show rounded-0" style="border-left: 5px solid red;">
                        <p class="m-0 text-center text-danger"><?php echo $_GET['error'] ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
                <?php
                if (isset($_GET['msg'])) {
                ?>
                    <div class="alert alert-light alert-dismissible fade show rounded-0" style="border-left: 5px solid red;">
                        <p class="m-0 text-center text-danger"><?php echo $_GET['msg'] ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
                <div class="card bg-white rounded-lg shadow-sm mt-2">
                    <div class="card-body">
                        <h5 class="mb-1 text-dark">Baranggay Management System</h5>
                        <p class="text-black-50">Sign in to manage system</p>
                        <hr>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="utype" class="form-label font-weight-bold">User Type:</label>
                                <div class="input-group mb-3">
                                    <select name="userType" class="form-control" id="utype">
                                      <option value="1"> Staff</option>
                                      <option value="2"> Zone Leader</option>
                                    </select>
                                </div>
                                <label for="uname" class="font-weight-bold">Username:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-user" id="user-icon"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="user-icon" name="uname">
                                </div>
                                <label for="pass" class="font-weight-bold">Password:</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-lock" id="pass-icon"></span>
                                    </div>
                                    <input type="password" id="pass" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="pass-icon" name="pass">
                                </div>
                                <div class="ml-1 mt-3">
                                    <input type="checkbox" name="" id="show_pass" class="form-check-inline"><label class="text-dark" for="show_pass">Show Password</label>
                                </div>

                            </div>
                            <button name="login" type="submit" class="btn-block btn-primary btn mt-3">Sign In</button>
                        </form>
                        <div class="mt-3">
                            <p class="my-1 d-flex text-black-50 justify-content-center align-items-center ">Please enjoy the system <i class="ml-1 bx bx-happy bx-sm"></i></p>
                            <p class="text-center my-1 font-weight-bold text-black-50">- System Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets\jquery-3.6.0.min.js"></script>
    <script src="assets\bootstrap\js\popper.min.js"></script>
    <script src="assets\bootstrap\js\bootstrap.min.js"></script>
    <script src="./assets//sweetalert2//dist//sweetalert2.min.js"></script>
    <script>
        $(document).on("change", "#show_pass", function() {
            if (this.checked) {
                $("#pass").attr("type", "text")
            } else {
                $("#pass").attr("type", "password")
            }
        })
        <?php
                if (isset($_GET['error'])) {
                ?>
                    Swal.fire('Failed',"<?php echo $_GET['error'] ?>", 'error');
                <?php
                }
                ?>
                <?php
                if (isset($_GET['msg'])) {
                ?>
                    Swal.fire('Success',"<?php echo $_GET['msg'] ?>", 'success');
                <?php
                }
                ?>
    </script>
</body>


</html>