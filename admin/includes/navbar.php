<header class="main-header ">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span style="font-size:14px" class="logo-mini"><b>B</b>MS</span>
        <!-- logo for regular state and mobile devices -->
        <span style="font-size:12px" class="logo-lg">Baranggay Information System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top py-0 border" >
    <!-- style="background:#4099ff" -->
        <!-- Sidebar toggle button-->
        <a href="#" class="px-3 text-white border-0" data-toggle="push-menu" role="button">
            <i class="fa fa-navicon"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $admin['photo'] ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $admin['fullname'] ?></span>
                    </a>
                    <ul class="dropdown-menu border">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $admin['photo'] ?>" class="user-image" alt="User Image">

                            <p>
                                <?php echo $admin['fullname'] ?>
                                <br>
                                <span><small>System Admin</small></span>
                            </p>
                        </li>
                        <li class="user-footer bg-primary">
                            <div class="pull-left">
                                <a href="#profileModal" data-toggle="modal" class="btn btn-light" data-id="<?php echo $admin['id'] ?>" id="update_account">Update</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-light">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php include "includes/accountModal.php" ?>