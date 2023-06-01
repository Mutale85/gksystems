<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./adminpanel/" class="brand-link">
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

      <!-- Sidebar Menu -->
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
                <a href="../academics/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../academics/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../academics/reports" class="nav-link">
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
                <a href="../farms/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../farms/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../farms/reports" class="nav-link">
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
                <a href="../hospital/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../hospital/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../hospital/reports" class="nav-link">
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
                <a href="../incomes/" class="nav-link">
                  <i class="bi bi-wallet nav-icon"></i>
                  <p>Income </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../income/expenses" class="nav-link">
                  <i class="bi bi-wallet2 nav-icon"></i>
                  <p>Expenses</p>
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
                <a href="../media/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../media/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../media/reports" class="nav-link">
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
                <a href="../orphanage/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../orphanage/orphans" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Orphans </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../orphanage/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../orphanage/reports" class="nav-link">
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
                <a href="../real-estates/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../real-estates/tenants" class="nav-link">
                  <i class="bi bi-people nav-icon"></i>
                  <p>Tenants </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../real-estates/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../real-estates/sms-tenants" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Tenants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../real-estates/reports" class="nav-link">
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
                <a href="../transport-logistics/teams" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Team </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transport-logistics/drivers" class="nav-link">
                  <i class="bi bi-person-add nav-icon"></i>
                  <p>Drivers </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transport-logistics/sms-team-member" class="nav-link">
                  <i class="bi bi-reply nav-icon"></i>
                  <p>SMS Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../transport-logistics/reports" class="nav-link">
                  <i class="bi bi-flag nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link bg-success">
              <i class="nav-icon bi bi-wallet"></i>
              <p>
                Payments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="payments/add-payment" class="nav-link">
                  <i class="bi bi-coin nav-icon"></i>
                  <p>Add Payment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="payments/collected-payments" class="nav-link">
                  <i class="bi bi-wallet2 nav-icon"></i>
                  <p>Collected Payments</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link bg-danger">
              <i class="nav-icon bi bi-flag-fill"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="debtors/add-new-debtor" class="nav-link">
                  <i class="bi bi-folder nav-icon"></i>
                  <p>Create Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="debtors/" class="nav-link">
                  <i class="bi bi-flag nav-icon"></i>
                  <p>View Reports</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="members/workers-log" class="nav-link">
              <i class="nav-icon bi bi-door-open"></i>
              <p>
                Worker's Log
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
    </div>
    <!-- /.sidebar -->
  </aside>