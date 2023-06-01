<?php include('../includes/db.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('addon_header.php')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('addon_top_nav.php')?>
  
  <?php include('addon_side_nav.php')?>
  <div class="content-wrapper">
    <?php include('addon_content_head.php')?>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <a href="academics">
                <div class="card bg-info text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-mortarboard"></i> <br> Academics</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="farms">
                <div class="card bg-success text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-flower1"></i> <br> Farms</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="hospitals">
                <div class="card bg-danger text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-hospital"></i> <br> Hospitals</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="income-expenses">
                <div class="card bg-dark text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-piggy-bank"></i> <br> Income & Expenses</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="media">
                <div class="card bg-warning text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-film"></i> <br> Media</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="orphanage">
                <div class="card bg-light text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-person-hearts"></i> <br> Orphanage</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>
            
            <div class="col-lg-3 col-6">
              <a href="real-estates">
                <div class="card bg-primary text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-houses"></i> <br> Real Estates</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="transport-logistics">
                <div class="card bg-secondary text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-truck-front"></i> <br> Transport & Logistics</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>
          </div>

          <div class="row">

          </div>
        </div>
      </section>
    </div>
    <?php include('addon_footer_content.php')?>
  </div>
  <?php include('addon_footer.php')?>
</body>
</html>
