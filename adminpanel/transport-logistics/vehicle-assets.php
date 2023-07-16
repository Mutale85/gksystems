<?php include('../../includes/db.php')?>
<?php require('../addons/tip.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../addon_header.php')?>
    <style>
        #image-preview {
            margin-top: 10px;
        }

        #image-preview img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 5px;
        }
    </style>
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
                    <button type="button" id="edit_vehicle_btn" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addVehicleModal">Add Vehicle</button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Vehicle Asset</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
              
                                <!-- Add Vehicle Form Button -->
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>License Plate Number</th>
                                            <th>VIN Number</th>
                                            <th>Assigned Driver</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showVehicles">
                                        <?php
                                          echo fetchVehicleAssets();  
                                        ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- Add Vehicle Modal -->
        <div class="modal fade" id="addVehicleModal" tabindex="-1" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addVehicleModalLabel">Add Vehicle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="addVehicleForm" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image" class="form-label">Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                            </div>
                            <div class="mb-3" id="image-preview">

                            </div>
                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <input type="text" class="form-control" id="year" name="year" required>
                                <input type="hidden" class="form-control" id="vehicle_id" name="vehicle_id" required>
                            </div>
                            <div class="mb-3">
                                <label for="make" class="form-label">Make</label>
                                <input type="text" class="form-control" id="make" name="make" required>
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Model</label>
                                <input type="text" class="form-control" id="model" name="model" required>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color" name="color" required>
                            </div>
                            <div class="mb-3">
                                <label for="license_plate" class="form-label">License Plate Number</label>
                                <input type="text" class="form-control" id="license_plate" name="license_plate" required>
                            </div>
                            <div class="mb-3">
                                <label for="vin" class="form-label">VIN Number</label>
                                <input type="text" class="form-control" id="vin" name="vin" required>
                            </div>
                            <div class="mb-3">
                                <label for="purchase_date" class="form-label">Purchase Date</label>
                                <input type="text" class="form-control" id="purchase_date" name="purchase_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="purchase_price" class="form-label">Purchase Price</label>
                                <div class="input-group">
                                    <select class="form-control" name="currency" id="currency" required>
                                        <option value="">Select</option>
                                        <option value="ZMW">ZMW</option>
                                        <option value="USD">USD</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                    <input type="number" class="form-control" id="purchase_price" name="purchase_price" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="purchase_mileage" class="form-label">Purchase Mileage</label>
                                <input type="number" class="form-control" id="purchase_mileage" name="purchase_mileage" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Assign Driver</label>
                                <select class="form-control" id="driver" name="driver" required>
                                    <option value="">Select a driver</option>
                                        <?php
                                            $stmt = $connect->query("SELECT * FROM team_members WHERE job_title LIKE '%driver%'");
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['phonenumber']}'>{$row['firstname']} {$row['lastname']}</option>";
                                            }
                                        ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" id="add_vehicle">Add Vehicle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>
</body>
</html>
