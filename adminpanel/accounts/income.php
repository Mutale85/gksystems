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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Income</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <?php echo incomeExpenseTable()?>
                                    <tbody id="incomeTable">
                                        <?php 
                                            $transaction = 'income';
                                            echo getTransactions($transaction);
                                        ?>
                                    </tbody>
                                    <?php echo incomeExpenseTableFooter($transaction)?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between mb-3">
                                <div><i class="bi bi-circle text-success"></i> <span class="text-secondary">Income</span></div>
								<div><?php echo counTransactions($transaction) ?> Transactions</div>
                            </div>
                            <div class="progress mb-3" style="height:30px; border-radius: 5px;">
                                <div id="incomeProgressBar" class="progress-bar bg-success" role="progressbar" style="width: <?php echo counTransactions($transaction) ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"> <?php echo counTransactions($transaction)?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Expenses</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <?php echo incomeExpenseTable()?>
                                    <tbody id="expenseTable">
                                        <?php 
                                            $transaction = 'expense';
                                            echo getTransactions($transaction);
                                        ?>
                                    </tbody>
                                    <?php echo incomeExpenseTableFooter($transaction)?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between mb-3">
                                <div><i class="bi bi-circle text-danger"></i> <span class="text-secondary">Expenses</span></div>
								<div><?php echo counTransactions($transaction) ?> Transactions</div>
                            </div>
                            <div class="progress mb-3" style="height:30px; border-radius: 5px;">
                                <div id="incomeProgressBar" class="progress-bar bg-danger" role="progressbar" style="width: <?php echo counTransactions($transaction) ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"> <?php echo counTransactions($transaction)?></div>
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
                            <form id="transactionForm">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount:</label>
                                    <input type="number" class="form-control" id="amount" name="amount" required step="any">
                                    <input type="hidden" class="form-control" id="transaction_id" name="transaction_id">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <input type="text" class="form-control" id="description" name="description" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type:</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="income">Income</option>
                                        <option value="expense">Expense</option>
                                    </select>
                                </div>
                                
                                <button type="submit" id="btnTrans" class="btn btn-primary">Add Transaction</button>
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
