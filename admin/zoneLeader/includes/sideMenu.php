<aside class="main-sidebar" style="overflow-y: hidden; max-height: 100%;">
    <section class="sidebar ">
        <div class="user-panel pb-3">
            <div class="pull-left image">
                <img src="<?php echo $admin['photo'] ?>" alt="admin photo" width="50px" height="50px" class="img-fluid rounded-circle text-center">
            </div>
            <div class="pull-left info">
                <p class="title text-center text-white m-0 mx-lg-2 mx-md-0 p-lg-2 p-md-0"><?php echo $admin['fullname'] ?></p>
                <p class="text-white-50 text-center">Online <span class="bx bxs-circle text-success"></span></p>
            </div>
        </div>
        <ul class="sidebar-menu " data-widget="tree">
            <li class="header">Reports</li>
            <li class="nav-item ">
                <a href="home.php" class="nav-link text-white-50">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="blotter_reports.php" class="nav-link text-white-50">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span>Blotter Reports</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="payments.php" class="nav-link text-white-50">
                    <i class="fa fa-money"></i>
                    <span>Payments</span>
                </a>
            <li class="header">Manage</li>
            <li class="nav-item">
                <a href="household.php" class="nav-link text-white-50">
                    <i class="fa fa-home"></i>
                    <span>Household</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="residents.php" class="nav-link text-white-50">
                    <i class="fa fa-group"></i>
                    <span>Residents</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="blotter.php" class="nav-link text-white-50">
                    <i class="fa fa-book"></i>
                    <span>Blotter Records</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link text-white-50">
                    <i class="bx bxs-user-account"></i>
                    <span>System Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="officials.php" class="nav-link text-white-50">
                    <i class="fa fa-black-tie"></i>
                    <span>Officials</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="permit.php" class="nav-link text-white-50">
                    <i class="fa fa-file"></i>
                    <span>Permit</span>
                </a>
            </li>
            <li class="header">Settings</li>
            <li class="nav-item">
                <a href="logs.php" class="nav-link text-white-50">
                    <i class="fa fa-history"></i>
                    <span>Activity Logs</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="baranggay.php" class="nav-link text-white-50">
                    <i class="bx bx-sm bxs-city"></i>
                    <span>Baranggay</span>
                </a>
            </li>
        </ul>
    </section>


</aside>