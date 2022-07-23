<?php
include("./includes/conn.php");
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location:home.php");
}
$q = run_query("SELECT * FROM users INNER JOIN usertypes ON users.type = usertypes.id WHERE usertypes.description = 'Admin'");
if ($q->num_rows == 0) {
    header("Location: signup.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | LOGIN</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="bg-primary">
    <div class="container h-100">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">

                <?php
                if (isset($_GET['error'])) {
                ?>
                    <div class="alert alert-light" opacity>
                        <p class="m-0 text-danger"><?php echo $_GET['error'] ?></p>
                    </div>
                <?php
                }
                ?>
                <?php
                if (isset($_GET['msg'])) {
                ?>
                    <div class="alert alert-light alert-dismissible fade show" style="border-left: 5px solid green;">
                        <p class="m-0 text-center text-success"><?php echo $_GET['msg'] ?></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
                <div class="card shadow">
                    <div class="card-body py-5">
                        <div class="row">
                            <div class="col-md mb-4">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <div>
                                        <img src="./undraw_city_life_gnpr.svg" alt="" class="img-fluid">
                                        <p class="fs-3 mt-5 mb-1 text-dark text-center">Baranggay Management System</p>
                                    </div>


                                </div>

                            </div>
                            <div class="col-md">
                                <h4>Welcome admin!</h4>
                                <p class="text-black-50">Sign in to manage system</p>
                                <hr>
                                <form action="login.php" method="POST">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="uname">Username:</label>
                                            <input type="text" class="form-control rounded-pill" placeholder="Username" aria-label="Username" aria-describedby="user-icon" name="uname">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pass">Password:</label>
                                            <input type="password" id="pass" class="form-control rounded-pill" placeholder="Password" aria-label="Password" aria-describedby="pass-icon" name="pass">
                                        </div>

                                    </div>
                                    <button name="login" type="submit" class="btn-block btn-primary btn mt-2 rounded-pill">Sign In</button>
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
        </div>
    </div>
    <?php include "./includes/scripts.php" ?>
    <script>
        <?php
        if (isset($_GET['error'])) {
        ?>
            Swal.fire('Failed', "<?php echo $_GET['error'] ?>", 'error');
        <?php
        }
        ?>
        <?php
        if (isset($_GET['msg'])) {
        ?>
            Swal.fire('Success', "<?php echo $_GET['msg'] ?>", 'success');
        <?php
        }
        ?>
    </script>
</body>

</html>