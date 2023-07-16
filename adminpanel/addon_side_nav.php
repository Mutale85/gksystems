<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-images img-responsive" style="opacity: .8; height:40px;width: 40px;border-radius:50%;">
      <span class="brand-text font-weight-light">GKSystems.com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo get_gravatar($_SESSION['email'])?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <?php if($_SESSION['user_role'] == 'superAdmin'):?>
        <!-- Sidebar Menu For Super admin -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon bi bi-mortarboard"></i>
                <p>
                  Academics
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="academics/" class="nav-link">
                    <i class="bi bi-person-add nav-icon"></i>
                    <p>Acadmics Team </p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="reports/" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link bg-success">
                <i class="nav-icon bi bi-flower1"></i>
                <p>
                  Farms
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="farms/" class="nav-link">
                    <i class="bi bi-person-add nav-icon"></i>
                    <p>Farm Employees </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="farms/farm-properties" class="nav-link">
                    <i class="bi bi-basket nav-icon"></i>
                    <p>Farm Property</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reports/" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link bg-danger">
                <i class="nav-icon bi bi-hospital"></i>
                <p>
                  Hospital
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="hospital/" class="nav-link">
                    <i class="bi bi-person-add nav-icon"></i>
                    <p>Hospital Team </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="reports/" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link bg-light">
                <i class="nav-icon bi bi-piggy-bank"></i>
                <p>
                  Income & Expenses
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="accounts/" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Accounts Team </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/income" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Income & Expense </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/rental-income" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Rental Income </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/vehicle-income" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Vehicle Income </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/rental-expense" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Rental expense </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/vehicle-expense" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Vehicle expense </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/petty-cash" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Petty Cash </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/loans" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Loans </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="accounts/graphs" class="nav-link">
                    <i class="bi bi-bar-chart nav-icon"></i>
                    <p>Graphs</p>
                  </a>
                </li>
                
              </ul>
            </li>
            <!-- Media -->
            <li class="nav-item">
              <a href="#" class="nav-link bg-warning">
                <i class="nav-icon bi bi-film"></i>
                <p>
                  Media
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="media/" class="nav-link">
                    <i class="bi bi-person-add nav-icon"></i>
                    <p>Media Team </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reports/" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Orphanage -->
            <li class="nav-item">
              <a href="#" class="nav-link bg-light">
                <i class="nav-icon bi bi-person-hearts"></i>
                <p>
                  Orphanage
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="orphanage/" class="nav-link">
                    <i class="bi bi-person-add nav-icon"></i>
                    <p>Care Takers </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reports/orphans" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <p>Orphans </p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="orphanage/reports" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Real Estates -->
            <li class="nav-item">
              <a href="#" class="nav-link bg-primary">
                <i class="nav-icon bi bi-houses"></i>
                <p>
                  Real Estates
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="real-estates/" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <p>Estate Team </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="real-estates/properties" class="nav-link">
                    <i class="bi bi-house nav-icon"></i>
                    <p>Property Management </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="real-estates/tenants" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <p>Tenants </p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="real-estates/sms-tenants" class="nav-link">
                    <i class="bi bi-reply nav-icon"></i>
                    <p>SMS Tenants</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reports/" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Transport -->
            <li class="nav-item">
              <a href="#" class="nav-link bg-secondary">
                <i class="nav-icon bi bi-truck-front"></i>
                <p>
                  Transport & Logistics
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="transport-logistics" class="nav-link">
                    <i class="bi bi-person-add nav-icon"></i>
                    <p>Transport Team </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="transport-logistics/vehicle-assets" class="nav-link">
                    <i class="bi bi-car-front nav-icon"></i>
                    <p>Vehicle Assets</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="transport-logistics/servicibiity" class="nav-link">
                    <i class="bi bi-car-front nav-icon"></i>
                    <p>Vehicle Servicibilty</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="reports/" class="nav-link">
                    <i class="bi bi-flag nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link bg-success">
                <i class="nav-icon bi bi-people"></i>
                <p>
                  Employees
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="employees/" class="nav-link">
                    <i class="bi bi-people nav-icon"></i>
                    <p>Employees</p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="employees/sms-team-member" class="nav-link">
                    <i class="bi bi-reply nav-icon"></i>
                    <p>SMS Employees</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="reports/" class="nav-link">
                <i class="nav-icon bi bi-flag"></i>
                <p>
                  All Reports
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="../signout" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-right text-danger"></i>
                <p>Sign Out</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      <?php endif;?>
      <!-- side bar for tenants -->
      <?php if($_SESSION['user_role'] == 'estate_tenant'):?>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
            <li class="nav-item">
              <a href="tenants/payments" class="nav-link">
                <i class="bi bi-wallet nav-icon"></i>
                <p>Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tenants/reports" class="nav-link">
                <i class="bi bi-flag nav-icon"></i>
                <p>Report Issue</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="tenants/lease-agreement" class="nav-link">
                  <i class="bi bi-hand-thumbs-up nav-icon"></i>
                  <p>Lease agreement</p>
                </a>
            </li> -->
            <li class="nav-item">
                <a href="tenants/terms" class="nav-link">
                  <i class="bi bi-award nav-icon"></i>
                  <p>Terms & Agreement</p>
                </a>
            </li>
            <li class="nav-item">
              <a href="../signout" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-right text-danger"></i>
                <p>Sign Out</p>
              </a>
            </li>
          </ul>
        </nav>
      <?php endif;?>

      <?php if($_SESSION['user_role'] == 'employee'):?>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
            <li class="nav-item">
              <a href="members/" class="nav-link">
                <i class="bi bi-person nav-icon"></i>
                <p>My Profile </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="members/tasks?empID=<?php echo base64_encode($_SESSION['phonenumber'])?>" class="nav-link">
                <i class="bi bi-flag nav-icon"></i>
                <p>Assigned Tasks </p>
              </a>
            </li>
            <?php if($_SESSION['department'] == "orphanage"):?>
              <li class="nav-item">
                <a href="members/orphans" class="nav-link">
                  <i class="bi bi-people nav-icon"></i>
                  <p>Orphans </p>
                </a>
              </li>
            <?php endif;?>

            <?php if($_SESSION['department'] == "transport-logistics"):?>
              <li class="nav-item">
                  <a href="members/vehicle-income" class="nav-link">
                    <i class="bi bi-wallet nav-icon"></i>
                    <p>Vehicle income </p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="members/incident-report" class="nav-link">
                  <i class="bi bi-gear nav-icon"></i>
                  <p>Report Incident</p>
                </a>
              </li>
            <?php endif;?>
            <li class="nav-item">
              <a href="../signout" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-right text-danger"></i>
                <p>Sign Out</p>
              </a>
            </li>
          </ul>
        </nav>
      <?php endif;?>
    </div>
    <!-- /.sidebar -->
  </aside>