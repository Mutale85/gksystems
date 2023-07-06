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

        <button type="button" style="display:none;" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#addTenantModal">
            Add Tenant
        </button>
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-4 col-6">
                    <a href="tenants/payments">
                        <div class="card bg-success text-center">
                            <div class="card-header"> 
                                <div class="icon"></div>
                                <h4><i class="bi bi-wallet"></i> <br> Payments</h4>
                            </div>
                            <div class="card-body">Proceed</div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-6">
                    <a href="tenants/reports">
                        <div class="card bg-danger text-center">
                            <div class="card-header"> 
                                <div class="icon"></div>
                                <h4><i class="bi bi-flag"></i> <br> Reports</h4>
                            </div>
                            <div class="card-body">Proceed</div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-6">
                    <a href="tenants/terms">
                        <div class="card bg-info text-center">
                            <div class="card-header"> 
                                <div class="icon"></div>
                                <h4><i class="bi bi-award"></i> <br> Terms & Conditions</h4>
                            </div>
                            <div class="card-body">Proceed</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Hey, <?php echo $_SESSION['username']?></h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                $tenant_id = $_SESSION['user_id'];
                                echo fetchTenantsProfile($connect, $tenant_id);
                            ?>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo $tenant_id?>" class="btn btn-primary edit_tenant"><i class="bi bi-pen"></i> Edit Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- tenants modal -->
        <div class="modal fade" id="addTenantModal"  aria-labelledby="addTenantModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTenantModalLabel">Add Tenant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="tenantsForm">
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
                                <input type="text" class="form-control" name="email" id="tenant_email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="260" required>
                            </div>
                            <div class="mb-3">
                                <label for="house_number" class="form-label">House Number:</label>
                                <input type="text" class="form-control" name="house_number" id="house_number" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="num_people" class="form-label">Number of People Living in the House:</label>
                                <input type="number" class="form-control" name="num_people" id="num_people" min="1" required>
                                <input type="hidden" name="tenant_id" id="tenant_id">
                            </div>
                            <h4>Rent Details</h4>
                            <div class="mb-3">
                                <label for="leaseStartDate" class="form-label">Lease Start Date</label>
                                <input type="text" class="form-control" readonly name="leaseStartDate" id="leaseStartDate">
                            </div>

                            <div class="mb-3">
                                <label for="leaseEndDate" class="form-label">Lease End Date</label>
                                <input type="text" class="form-control" readonly name="leaseEndDate" id="leaseEndDate">
                            </div>

                            <div class="mb-3">
                                <label for="rentAmount" class="form-label">Rent Amount</label>
                                <div class="input-group">
                                    <select class="form-control" readonly name="currency" id="currency">
                                        <option value="">Select currency</option>
                                        <option value="ZMW">ZMW</option>
                                        <option value="USD">USD</option>
                                    </select>
                                    <input type="number" class="form-control" readonly name="rentAmount" id="rentAmount" placeholder="Enter rent amount">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                                <select class="form-control" readonly name="paymentFrequency" id="paymentFrequency">
                                    <option value="">Select payment frequency</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="quarterly">Quarterly</option>
                                    <option value="annually">Annually</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="submitBtn" class="btn btn-primary">Add Tenant</button>
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

    <script>
        
    </script>
</body>
</html>
