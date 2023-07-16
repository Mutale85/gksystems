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
                    <button type="button" id="addFarmbtn" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addFarmModal">Add Property</button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Farm Asset</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
              
                                <!-- Add Farm Form Button -->
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            
                                            <th>Farming Activities</th>
                                            <th>Location</th>
                                            <th>Farm Size </th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="showFarms">
                                        <?php
                                          echo fetchFarmAssets();  
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
      <!-- Add Farm Modal -->
        <div class="modal fade" id="addFarmModal" tabindex="-1" aria-labelledby="addFarmModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFarmModalLabel">Add Farm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="addFarmForm" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image" class="form-label">Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="make" class="form-label">Activity</label>
                                <select class="form-control" name="activity" id="activity" >
                                    <option value="Farming Activity">Farming Activity</option>
                                    <option value="Not yet">Not Yet</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                                <input type="hidden" class="form-control" id="farm_id" name="farm_id" required>
                            </div>
                            <div class="mb-3">
                                <label for="model" class="form-label">Address</label>
                                <textarea type="text" class="form-control" id="address" name="address" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="color" class="form-label">Purchase Price</label>
                                <div class="input-group">
                                    <select class="form-control" name="currency" id="currency_amount" >
                                        <option value="ZMW">ZMW</option>
                                        <option value="USD">USD</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                    <input type="number" step="any" class="form-control" id="purchase_amount" name="purchase_amount" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="current_value" class="form-label">Current Value</label>
                                <div class="input-group">
                                    <select class="form-control" name="currency" id="currency_value" >
                                        <option value="ZMW">ZMW</option>
                                        <option value="USD">USD</option>
                                        <option value="GBP">GBP</option>
                                    </select>
                                    <input type="number" step="any" class="form-control" id="current_value" name="current_value" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="purchase_date" class="form-label">Purchase Date</label>
                                <input type="text" class="form-control" id="purchase_date" name="purchase_date" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="license_plate" class="form-label">Farm Size</label>
                                <div class="input-group">
                                    <select class="form-control" name="measurement" id="measurement" >
                                        <option value="Acre">Acre</option>
                                        <option value="Hectre">Hectre</option>
                                    </select>
                                    <input type="number" class="form-control" id="farm_size" name="farm_size" required>
                                </div>
                            </div>
                            <button type="submit" id="farmBtn" class="btn btn-primary">Add Farm</button>
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
