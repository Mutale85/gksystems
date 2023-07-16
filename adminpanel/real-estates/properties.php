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
                    <button type="button" id="add_real_estateBtn" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addHousingModal">Add Property</button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Housing Asset</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>Condition</th>
                                            <th>Current State</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showreal_estates">
                                        <?php
                                          echo fetchRealEstateAssets();  
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Add RealEstate Modal -->
                            <div class="modal fade" id="addHousingModal" tabindex="-1" aria-labelledby="addHousingModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addHousingModalLabel">Add House</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="addRealEstateForm" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Images</label>
                                                    <input type="file" class="form-control" id="images" name="images[]" multiple>
                                                    <input type="hidden" class="form-control" id="estate_id" name="estate_id">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="year" class="form-label">Category</label>
                                                    <select class="form-control" name="category" id="category" >
                                                        <option value="Flats">Flats</option>    
                                                        <option value="Stand Alone House">Stand Alone House</option>
                                                        <option value="Shop">Shop</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="make" class="form-label">Condition</label>
                                                    <select class="form-control" name="condition" id="condition" required>
                                                        <option value="">Select</option>
                                                        <option value="Great">Great</option>
                                                        <option value="Good">Good</option>
                                                        <option value="Satisfactory">Satisfactory</option>
                                                        <option value="Bad">Bad</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="model" class="form-label">Location</label>
                                                    <input type="text" class="form-control" id="location" name="location" required>
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
                                                        <input type="text" class="form-control" id="purchase_amount" name="purchase_amount" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="license_plate" class="form-label">Current Value</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="currency" id="currency_value" >
                                                            <option value="ZMW">ZMW</option>
                                                            <option value="USD">USD</option>
                                                            <option value="GBP">GBP</option>
                                                        </select>
                                                        <input type="text" class="form-control" id="current_value" name="current_value" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="purchase_date" class="form-label">Purchase Date</label>
                                                    <input type="text" class="form-control" id="purchase_date" name="purchase_date" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rental_amount" class="form-label">Rental Amount</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="currency" id="currency_rental" >
                                                            <option value="ZMW">ZMW</option>
                                                            <option value="USD">USD</option>
                                                            <option value="GBP">GBP</option>
                                                        </select>
                                                        <input type="number" class="form-control" id="rental_amount" name="rental_amount" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="purchase_mileage" class="form-label">Current State </label>
                                                    <select class="form-control" name="current_state" id="current_state" >
                                                        <option value="Occupied">Occupied</option>
                                                        <option value="Vacant">Vacant</option>
                                                        <option value="For Sell">For Sell</option>
                                                    </select>
                                                </div>
                                                
                                                <button type="submit" id="real_estateBtn" class="btn btn-primary">Add Housing</button>
                                            </form>
                                        </div>
                                    </div>
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
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>
</body>
</html>
