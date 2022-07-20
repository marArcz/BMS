<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo bg-light text-primary">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>IMS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>BIMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top py-0 " style="background:#4099ff">
        <!-- Sidebar toggle button-->
        <a href="#" class="px-3 text-white border-0" data-toggle="push-menu" role="button">
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
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $admin['photo'] ?>"class="user-image" alt="User Image">    

                            <p>
                            <?php echo $admin['fullname'] ?>
                            <br>
                            <span><small>System User</small></span>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="user_logout.php" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<?php include "includes/accountModal.php" ?>