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
        <!-- <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="empBtn" class="btn btn-primary mb-4" data-toggle="modal" data-target="#employeeModal">
                        Add Employee
                    </button>
                </div>
            </div>
        </div> -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tenants</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="tenantTable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAllTenants"></th>
                                            <th>Tenant ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Employee data will be dynamically added here -->
                                    </tbody>
                                </table>
                            </div>
                                
                            <div id="messageForm" class="mt-3">
                                <div class="mb-3">
                                    <label for="messageType" class="form-label">Message Type:</label>
                                    <select id="messageType" class="form-control">
                                        <option value="sms">SMS</option>
                                        <option value="email">Email</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="messageContent" class="form-label">Message Content:</label>
                                    <textarea id="messageContent" class="form-control" rows="5"></textarea>
                                </div>
                                <button id="sendTenantButton" class="btn btn-primary">Send Message</button>
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
