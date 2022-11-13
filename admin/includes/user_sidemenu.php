<aside class="main-sidebar" style="overflow-y: hidden; max-height: 100%;">
    <section class="sidebar ">
        <div class="user-panel align-content-center">
            <div class="pull-left image ">
                <img src="<?php echo $_SESSION['user']['photo'] ?>" alt="account photo" width="30px" height="30px" class="rounded-circle border-light border-left border-top border-bottom border-right">
            </div>
            <div class="pull-left info">
                <p id="admin-name" class="title text-center fs-5 mt-auto my-1"><?php echo $admin['fullname'] ?></p>
                <p><small>User</small></p>
            </div>
        </div>
        <ul class="sidebar-menu " data-widget="tree">
            <li class="header">Reports</li>
            <li class="nav-item ">
                <a href="user_home.php" class="nav-link text-dark">
                    <i class="bx bxs-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">Records</li>
            <li class="nav-item" title="Here you can view resident's information, print out clearance an indigency." data-toggle="tooltip" data-placement="right">
                <a href="user_residents.php" class="nav-link text-dark">
                    <i class="bx bxs-group"></i>
                    <span>Residents</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can view Blotter Records" data-toggle="tooltip" data-placement="right">
                <a href="user_blotter.php" class="nav-link text-dark">
                    <i class="bx bxs-book"></i>
                    <span>Blotter Records</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage permit records." data-toggle="tooltip" data-placement="right">
                <a href="user_permit.php" class="nav-link text-dark">
                    <i class="bx bxs-file"></i>
                    <span>Permit</span>
                </a>
            </li>
           <!-- <li class="nav-item" title="Here you can manage permit records." data-toggle="tooltip" data-placement="right">
                <a href="id-scanner.php" class="nav-link text-dark">
                    <i class="bx bxs-book"></i>
                    <span>Residents log book</span>
                </a>
            </li> -->
        </ul>
    </section>


</aside>