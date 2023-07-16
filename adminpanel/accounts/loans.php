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
                            <button type="button" id="loanBtn" class="btn btn-primary" data-toggle="modal" data-target="#loanModal">
                                Add Loan
                            </button>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">My Debts</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table table-responsive">
                                        <table class="table table-striped" id="allTables">
                                            <thead>
                                                <tr>
                                                    <th>Loan Type</th>
                                                    <th>Creditor</th>
                                                    <th>Amount</th>
                                                    <th>Due Date</th>
                                                    <th>R Days</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="postedLoans">
                                                <?php 
                                                    echo fetchLoans();
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
            <div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="loanModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loanModalLabel">Add Loan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="loanForm">
                                <div class="form-group">
                                    <label for="loanType">Loan Type:</label>
                                    <input type="text" class="form-control" id="loanType" name="loanType" required>
                                    <input type="hidden" name="loan_id" id="loan_id">
                                </div>
                                <div class="form-group">
                                    <label for="creditor">Creditor:</label>
                                    <input type="text" class="form-control" id="creditor" name="creditor" required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount:</label>
                                    <div class="input-group">
                                        <input type="number" step="any" class="form-control" id="amount" name="amount" required>
                                        <select class="form-control" id="currency" name="currency">
                                            <option value="ZMW">ZMW</option>
                                            <option value="USD">USD</option>
                                            <option value="GBP">GBP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dueDate">Due Date:</label>
                                    <input type="text" class="form-control" id="dueDate" name="dueDate" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="">Select</option>
                                        <option value="On Going">On Going</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                </div>
                                <button type="submit" id="loansBtn" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Loan Payment Modal -->
            <!-- Button to trigger the modal -->
                <button type="button" id="paymentbtn" style="display: none;" class="btn btn-primary" data-toggle="modal" data-target="#addPaymentModal">
                    Add Payment
                </button>

            <!-- Modal -->
            <div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPaymentModalLabel">Add Loan Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="paymentForm">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="loanId" name="loanId" required>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount:</label>
                                    <div class="input-group">
                                        <input type="number" step="any" class="form-control" id="amount" name="amount" required>
                                        <select class="form-control" id="currency" name="currency">
                                            <option value="ZMW">ZMW</option>
                                            <option value="USD">USD</option>
                                            <option value="GBP">GBP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datePaid">Date Paid:</label>
                                    <input type="text" class="form-control" id="datePaid" name="datePaid" required>
                                </div>
                                <div class="form-group">
                                    <label><input type="checkbox" name="payment_true" id="payment_true" value="1" required> Payment is True</label>
                                </div>
                                <button type="submit" id="submit_paymentBtn" class="btn btn-primary">Add Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php include('../addon_footer_content.php')?>
    </div>
    <?php include('../addon_footer.php')?>

    <script>
            // Call the function initially to display the posted loans
        displayPostedLoans();
    </script>
</body>
</html>
