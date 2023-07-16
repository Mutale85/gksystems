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
                        Add Transaction
                    </button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Petty Cash</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-striped" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Cash Out</th>
                                            <th>Cash In</th>
                                            <!-- <th>Transaction Type</th>
                                            <th>Transaction Mode</th> -->
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody id="petty_cash">
                                        <?php 
                                            echo pettyCash();
                                        ?>
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
                        <form id="pettyCashForm" method="POST">
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="text" class="form-control" id="transaction_date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <div class="input-group">
                                    <span class="input-group-text">ZMW</span>
                                    <input type="number" step="any" class="form-control" id="amount" name="amount" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="transaction_type">Transaction Type:</label>
                                <select class="form-control" id="transaction_type" name="transaction_type" required>
                                    <option value="">Select</option>
                                    <option value="Cash In">Cash In</option>
                                    <option value="Cash Out">Cash Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_mode">Transaction Mode:</label>
                                <select class="form-control" id="payment_mode" name="payment_mode" required>
                                    <option value="">Select </option>
                                    <option value="Mobile Money">Mobile Money</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><input type="checkbox" name="correct" id="correct" value="correct" required> Transaction is true</label>
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
