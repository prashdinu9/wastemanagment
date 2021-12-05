<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <!--<div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>-->

        <img src="../images/logo.png" alt="Waste Management" class="top-logo">

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php if ($roleID == 1 || $roleID == 2) { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="customer.php">
                <i class="fas fa-fw fa-users"></i>
                <span>Customers</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-employee" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-address-card"></i>
                <span>Employee</span>
            </a>
            <div id="menu-employee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employee actions:</h6>
                    <a class="collapse-item" href="employee.php">Manage Employee</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="vehicle.php">
                <i class="fas fa-fw fa-truck"></i>
                <span>Vehicle</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="route.php">
                <i class="fas fa-fw fa-road"></i>
                <span>Route</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-bins" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-trash-alt"></i>
                <span>Bins</span>
            </a>
            <div id="menu-bins" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Bins actions:</h6>
                    <a class="collapse-item" href="binallocation.php">Bin Allocation</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-garbage" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-recycle"></i>
                <span>Garbage</span>
            </a>
            <div id="menu-garbage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Garbage actions:</h6>
                    <a class="collapse-item" href="garbagebin.php">Garbage Bin</a>
                    <a class="collapse-item" href="get_locations2.php">Bin Map</a>
                    <a class="collapse-item" href="garbagepoints.php">Garbage Points</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-schedule" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Schedule</span>
            </a>
            <div id="menu-schedule" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Schedule actions:</h6>
                    <a class="collapse-item" href="schedule.php">Manage Schedules</a>
                    <a class="collapse-item" href="calendar.php">Calendar</a>
                    <!--                <a class="collapse-item" href="scheduleplan.php">Schedule Plan</a>-->
                    <a class="collapse-item" href="get_locations2.php">Bin Map</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-ecommerce" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cart-arrow-down"></i>
                <span>e-Commerce</span>
            </a>
            <div id="menu-ecommerce" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">E-commerce items:</h6>
                    <a class="collapse-item" href="product.php">Products</a>
                    <a class="collapse-item" href="stock.php">Stock</a>
                    <a class="collapse-item" href="payment.php">Payment</a>
                    <a class="collapse-item" href="eshop.php">e-shop</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="complaint.php">
                <i class="fas fa-fw fa-exclamation-circle"></i>
                <span>Complaint</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-reports" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Reports</span>
            </a>
            <div id="menu-reports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Available reports:</h6>
                    <a class="collapse-item" href="reportgarbage.php">Garbage Reports</a>
                    <!--                <a class="collapse-item" href="reportdriver.php">Driver Reports</a>-->
                    <a class="collapse-item" href="reportcustomer.php">Customer Reports</a>
                    <!--                <a class="collapse-item" href="#">Bin Reports</a>-->
                    <a class="collapse-item" href="reportchartgarbagepoints.php">Garbage Point Reports</a>
                </div>
            </div>
        </li>

    <?php } ?>

    <!-- customer -->
    <?php if ($roleID == 4) { ?>
        <li class="nav-item">
            <a class="nav-link" href="dashboardcus.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-bins" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-trash-alt"></i>
                <span>Bins</span>
            </a>
            <div id="menu-bins" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Bins actions:</h6>
                    <a class="collapse-item" href="binallocationcus.php">Bin Allocation</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-garbage" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-recycle"></i>
                <span>Garbage</span>
            </a>
            <div id="menu-garbage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Garbage actions:</h6>
                    <a class="collapse-item" href="mygarbagebin.php">My Garbage Bins</a>
                    <a class="collapse-item" href="garbagepoints.php">Garbage Points</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-ecommerce" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cart-arrow-down"></i>
                <span>e-Commerce</span>
            </a>
            <div id="menu-ecommerce" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">E-commerce items:</h6>
                    <a class="collapse-item" href="eshop.php">e-shop</a>
                    <a class="collapse-item" href="payment.php">My Payments</a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="complaintcus.php">
                <i class="fas fa-fw fa-exclamation-circle"></i>
                <span>Complaint</span>
            </a>
        </li>
    <?php } ?>


    <!-- driver -->
    <?php if ($roleID == 3) { ?>
        <li class="nav-item">
            <a class="nav-link" href="dashboarddriver.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-driver" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-truck"></i>
                <span>Driver</span>
            </a>
            <div id="menu-driver" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Driver's actions:</h6>
                    <a class="collapse-item" href="myschedule.php">My Schedule</a>
                    <a class="collapse-item" href="driverbincollection.php">Bins Collection</a>
                    <a class="collapse-item" href="get_locations2.php">Bin Map</a>
                    <a class="collapse-item" href="driverschedulehistory.php">Schedule History</a>
                    <a class="collapse-item" href="drivergarbagepoints.php">Driver Garbage Points</a>
                </div>
            </div>
        </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>