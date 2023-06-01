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
                            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addTenantModal">
                                Add Tenant
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Added Tenants</h4>
                                </div>
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tenants Modal -->
                <div class="modal fade" id="addTenantModal" tabindex="-1" aria-labelledby="addTenantModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTenantModalLabel">Add Tenant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="process_tenant.php">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name:</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phonenumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="260" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="house_number" class="form-label">House Number:</label>
                                        <input type="text" class="form-control" name="house_number" id="house_number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="num_people" class="form-label">Number of People Living in the House:</label>
                                        <input type="number" class="form-control" name="num_people" id="num_people" min="1" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Tenant</button>
                                    </div>
                                </form>
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
