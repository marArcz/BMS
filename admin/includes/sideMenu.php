<aside class="main-sidebar shadow">
    <section class="sidebar">
        <div class="user-panel align-content-center border-bottom ">
            <div class="pull-left image ">
                <img src="<?php echo $admin['photo'] ?>" alt="account photo" width="30px" height="30px" class="rounded-circle border-light border-left border-top border-bottom border-right">
            </div>
            <div class="pull-left info">
                <p id="admin-name" class="title text-center fs-5 mt-auto my-1"><?php echo $admin['fullname'] ?></p>
                <div class="badge bg-primary shadow-sm text-white text-center"><span>Admin</span></div>
            </div>
        </div>
        <ul class="sidebar-menu " data-widget="tree">
            <li class="header">Reports</li>
            <li class="nav-item ">
                <a href="home.php" class="nav-link text-dark">
                    <i class="bx bxs-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            <!--</li>
            <li class="nav-item ">
                <a href="logbook.php" class="nav-link text-dark">
                    <i class="bx bxs-book"></i>
                    <span>Residents Logbook</span>
                </a>
            </li> -->
            <li class="nav-item" title="Here you can view blotter reports" data-toggle="tooltip" data-placement="right">
                <a href="blotter_reports.php" class="nav-link text-dark ">
                    <i class="fa fa-exclamation-triangle"></i>
                    <span>Blotter Reports</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can view recorded blotters in the baranggay." data-toggle="tooltip" data-placement="right">
                <a href="blotter_history.php" class="nav-link text-dark">
                    <i class="fa fa-history"></i>
                    <span>Blotter History</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage payment records." data-toggle="tooltip" data-placement="right">
                <a href="payments.php" class="nav-link text-dark">
                    <i class="bx bx-money"></i>
                    <span>Payments</span>
                </a>
            </li>
            <li class="header">Manage</li>
            <li class="nav-item" title="Here you can manage household records." data-toggle="tooltip" data-placement="right">
                <a href="household.php" class="nav-link text-dark">
                    <i class="bx bxs-home"></i>
                    <span>Household</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage residents records, print out clearance and indigency." data-toggle="tooltip" data-placement="right">
                <a href="residents.php" class="nav-link text-dark">
                    <i class="bx bxs-group"></i>
                    <span>Residents</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage active blotter records." data-toggle="tooltip" data-placement="right">
                <a href="blotter.php" class="nav-link text-dark">
                    <i class="bx bxs-book"></i>
                    <span>Blotter Records</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage staffs and zone leaders account" data-toggle="tooltip" data-placement="right">
                <a href="users.php" class="nav-link text-dark">
                    <i class="bx bxs-user-account"></i>
                    <span>System Users</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage baranggay officials' records." data-toggle="tooltip" data-placement="right">
                <a href="officials.php" class="nav-link text-dark">
                    <i class="bx bxs-user-circle"></i>
                    <span>Officials</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage permit records." data-toggle="tooltip" data-placement="right">
                <a href="permit.php" class="nav-link text-dark">
                    <i class="bx bxs-file"></i>
                    <span>Permit</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can create baranggay summon." data-toggle="tooltip" data-placement="right">
                <a href="summon.php" class="nav-link text-dark">
                    <i class="bx bxs-note"></i>
                    <span>Summon</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can manage baranggay memos." data-toggle="tooltip" data-placement="right">
                <a href="memos.php" class="nav-link text-dark">
                    <i class="bx bxs-note"></i>
                    <span>Memorandum</span>
                </a>
            </li> 
             <li class="header">Settings</li>
            <li class="nav-item" title="Here you can manage baranggay information." data-toggle="tooltip" data-placement="right">
                <a href="baranggay.php" class="nav-link text-dark">
                    <i class="bx bxs-city"></i>
                    <span>Baranggay</span>
                </a>
            </li>
            <li class="nav-item" title="Here you can view activities made by a user in the system" data-toggle="tooltip" data-placement="right">
                <a href="logs.php" class="nav-link text-dark">
                    <i class="bx bxs-note"></i>
                    <span>Activity Logs</span>
                </a>
            </li>
        </ul>
    </section>


</aside>