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
                            <button type="button" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#addTenantModal">
                                Add Tenant
                            </button>
                            <button type="button" style="display:none" class="btn btn-primary mb-4" id="tenantDetails" data-toggle="modal" data-target="#tenantDetailsModal">
                                Tenant Details
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Added Tenants</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table table-responsive">
                                        <table class="table table-bordered" id="allTables">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Lease Agreement</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $query = $connect->prepare("SELECT * FROM tenants WHERE parent_id = ?");
                                                    $query->execute([$_SESSION['parent_id']]);
                                                    foreach($query->fetchAll() as $row){
                                                        extract($row);
                                                ?>
                                                    <tr>
                                                        <td><a href="real-estates/details?tenant=<?php echo base64_encode($phonenumber)?>"><?php echo $firstname?></a></td>
                                                        <td><a href="real-estates/details?tenant=<?php echo base64_encode($phonenumber)?>"><?php echo $lastname?></a></td>
                                                        <td><a href="<?php echo $phonenumber?>" class="btn btn-primary btn-sm view_agreement">View Agreement</a></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo $tenant_id?>" class="btn btn-secondary btn-sm view_details"><i class="bi bi-people"></i> Details</a>
                                                                <a href="<?php echo $tenant_id?>" class="btn btn-primary btn-sm edit_tenant"><i class="bi bi-pencil"></i> Edit</a>
                                                                <a href="<?php echo $tenant_id?>" class="btn btn-danger btn-sm remove_tenant"><i class="bi bi-trash"></i> Remove</a>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tenants Modal -->
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
                                        <input type="email" class="form-control" name="email" id="tenant_email" required>
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
                                        <input type="hidden" name="tenant_id" id="tenant_id">
                                    </div>
                                    <h4>Rent Details</h4>
                                    <div class="mb-3">
                                        <label for="leaseStartDate" class="form-label">Lease Start Date</label>
                                        <input type="text" class="form-control" name="leaseStartDate" id="leaseStartDate">
                                    </div>

                                    <div class="mb-3">
                                        <label for="leaseEndDate" class="form-label">Lease End Date</label>
                                        <input type="text" class="form-control" name="leaseEndDate" id="leaseEndDate">
                                    </div>

                                    <div class="mb-3">
                                        <label for="rentAmount" class="form-label">Rent Amount</label>
                                        <div class="input-group">
                                            <select class="form-control" name="currency" id="currency">
                                                <option selected>Select currency</option>
                                                <option value="ZMW">ZMW</option>
                                                <option value="USD">USD</option>
                                            </select>
                                            <input type="number" class="form-control" name="rentAmount" id="rentAmount" placeholder="Enter rent amount">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                                        <select class="form-control" name="paymentFrequency" id="paymentFrequency">
                                            <option selected>Select payment frequency</option>
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
                <!-- Tenants Modal Details -->
                <div class="modal fade" id="tenantDetailsModal"  aria-labelledby="tenantDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tenantDetailsModalLabel">Tenants Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body" id="details_modal">
                                
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
