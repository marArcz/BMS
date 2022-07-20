<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Create Acount</title>
    <?php include "./includes/header.php" ?>
    <style>
        body {
            background: url("./includes/img/bg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container pt-4">
        <div class="row justify-content-center flex-column align-content-center">
            <div class="col-md-6">
                <h4 class="text-center mb-4 text-white-50">Baranggay Information System</h4>
                <?php
                if (isset($_GET['error'])) {
                ?>
                    <div class="alert alert-danger">
                        <p class="m-0"><?php echo $_GET['error'] ?></p>
                    </div>
                <?php
                }
                ?>
                <div class="card shadow">
                    <div class="card-body">
                        <p class="text-center text-black-50">Create account to manage system</p>
                        <form action="create-account.php" method="POST">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm">
                                        <label for="uname">Full name:</label>
                                        <input type="text" class="form-control mb-3" placeholder="Full name" name="fname" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="gender">Gender:</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <label for="address">Address:</label>
                                <input type="text" id="address" class="form-control mb-2" placeholder="Address" name="address" required>

                                <label for="uname">Username:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-user" id="user-icon"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="user-icon" name="uname" required>
                                </div>
                                <label for="pass">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-lock" id="pass-icon"></span>
                                    </div>
                                    <input type="password" id="pass" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="pass-icon" name="pass" required>
                                </div>
                            </div>
                            <button name="signup" type="submit" class="btn-block btn-primary btn mt-3">Create account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>