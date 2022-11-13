<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span style="font-size:14px" class="logo-mini"><b>B</b>MS</span>
        <!-- logo for regular state and mobile devices -->
        <span style="font-size:12px" class="logo-lg">Baranggay Information System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top py-0 ">
        <!-- Sidebar toggle button-->
        <a href="#" class="px-3 border-0" data-toggle="push-menu" role="button">
            <i class="fa fa-navicon"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $admin['photo'] ?>"class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $admin['fullname'] ?></span>
                    </a>
                    <ul class="dropdown-menu border">
                        <!-- User image -->
                        <li class="user-header border">
                            <img src="<?php echo $admin['photo'] ?>"class="user-image" alt="User Image">    

                            <p class="text-light">
                            <?php echo $admin['fullname'] ?>
                            <br>
                            <span class="text-light"><small>System User</small></span>
                            </p>
                        </li>
                        <li class="user-footer bg-teal ">
                            <div class="pull-right">
                                <a href="user_logout.php" class="btn btn-light">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php include "includes/accountModal.php" ?>