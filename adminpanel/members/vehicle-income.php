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
                <div class="col-md-12 mb-4">
                    <!-- Button to trigger the modal -->
                    <button type="button" id="transactionBtn" class="btn btn-primary" data-toggle="modal" data-target="#transactionModal">
                        Add Income
                    </button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Income You Added</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <?php 
                                        $transaction = $_SESSION['phonenumber'];
                                        echo getVehicleIncome($transaction);
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between mb-3">
                                <div><i class="bi bi-circle text-success"></i> <span class="text-secondary">Income</span></div>
								<div><?php echo counVehicleTransactions($transaction) ?> Transactions</div>
                            </div>
                            <div class="progress mb-3" style="height:30px; border-radius: 5px;">
                                <div id="incomeProgressBar" class="progress-bar bg-success" role="progressbar" style="width: <?php echo counVehicleTransactions($transaction) ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"> <?php echo counVehicleTransactions($transaction)?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transactionModalLabel">Add Transaction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="incomeForm" method="POST">
                        <div class="mb-3">
                            <label for="incomeAmount" class="form-label">Income Amount</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="currency" name="currency" value="ZMW" readonly>
                                <input type="number" class="form-control" id="incomeAmount" name="incomeAmount" required>
                                <input type="hidden" class="form-control" id="driver" name="driver" value="<?php echo $_SESSION['phonenumber']?>">
                                <input type="hidden" name="vehicle_reg_number" id="vehicle_reg_number" value="<?php echo getVehicleRegNumberByDriverID($_SESSION['phonenumber'])?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="vehicleStatus" class="form-label">Vehicle Status</label>
                            <select class="form-control" id="vehicleStatus" name="vehicleStatus" required>
                            <option value="" disabled selected>Select status</option>
                            <option value="serviceable">Serviceable</option>
                            <option value="unserviceable">Unserviceable</option>
                            <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="confirmationCheck" name="confirmationCheck" required>
                            <label class="form-check-label" for="confirmationCheck">I confirm that the information provided is true.</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
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
