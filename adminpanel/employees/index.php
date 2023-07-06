<?php include('../../includes/db.php')?>
<?php require('../addons/tip.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../addon_header.php')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('../addon_top_nav.php')?>
  
  <?php include('../addon_side_nav.php')?>
  <div class="content-wrapper">
    <?php include('../addon_content_head.php')?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="empBtn" class="btn btn-primary mb-4" data-toggle="modal" data-target="#employeeModal">
                        Add Employee
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Employee</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Names</th>
                                            <th>Phone </th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Job title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fetchEMployees">
                                        <?php
                                            $user_role = 'employee';
                                            echo fetchEmployees($connect, $user_role);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>
</body>
</html>
