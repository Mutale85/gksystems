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
                <button type="button" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#LeaseModal">
                    Open the Lease agreement form
                </button>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lease agreement</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Lease ID</th>
                                            <th>Property Owner</th>
                                            <th>Client ID</th>
                                            <th>Lease Status</th>
                                            <th>Date Signed</th>
                                            <th>Validity</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- tenants modal -->
        <div class="modal fade" id="LeaseModal"  aria-labelledby="LeaseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="LeaseModalLabel">Tenant lease agreement form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="leaseForm">
                            <div class="row mb-3">
                                <label for="landlordName" class="col-sm-4 col-form-label">Landlord's Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="landlordName" placeholder="Enter landlord's name" value="Gift Katebe" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tenantName" class="col-sm-4 col-form-label">Tenant's Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tenantName" placeholder="Enter tenant's name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="flatNumber" class="col-sm-4 col-form-label">Flat Number</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="flatNumber" placeholder="Enter flat number" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="leaseTerm" class="col-sm-4 col-form-label">Lease Term</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="leaseTerm" placeholder="Enter lease term" min="1" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rentAmount" class="col-sm-4 col-form-label">Monthly Rent Amount</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="ZMW">ZMW</option>
                                            <option value="USD">USD</option>
                                        </select>
                                        <input type="text" class="form-control" id="rentAmount" placeholder="Enter monthly rent amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="securityDeposit" class="col-sm-4 col-form-label">Security Deposit</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="ZMW">ZMW</option>
                                            <option value="UDS">UDS</option>
                                        </select>
                                        <input type="text" class="form-control" id="securityDeposit" placeholder="Enter security deposit amount" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                    <label class="form-check-label" for="agreeTerms">
                                    I agree to the terms and conditions.
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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
