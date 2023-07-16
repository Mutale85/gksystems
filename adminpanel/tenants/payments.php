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
                <button type="button" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#paymentModal">
                    Add Payment
                </button>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Payments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Payment date</th>
                                            <th>Payment Status</th>
                                            <th>Details</th>
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
        <div class="modal fade" id="paymentModal"  aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Tenant Payment Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- <form id="paymentReportForm" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="tenant" id="tenant" class="form-control" value="<?php echo $_SESSION['firstname'].' ' . $_SESSION['lastname']?>">
                            <input type="hidden" name="tenant_id" id="tenant_id" class="form-control" value="<?php echo  $_SESSION['phonenumber']?>">
                        
                            <div class="mb-3">
                                <label for="date">Amount Paid </label>
                                <div class="input-group">
                                    <input type="text" name="currency" id="currency" class="form-control" value="ZMW" readonly>
                                    <input type="text" name="amount" id="amount" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="date">Payment Mode </label>
                                <select class="form-control" name="payment_mode" id="payment_mode">
                                    <option value="">Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Mobile Money">Mobile Money</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date">Payment Date </label>
                                <input type="text" name="paymentDate" id="paymentDate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="attachments" class="form-label">Attach Payment Proof</label>
                                <input type="file" class="form-control" id="attachments" name="attachments[]" multiple accept="image/*, .pdf">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form> -->

                        <div class="container">
                            <h2>Pay Rental</h2>
                            <form action="/pay-rentals" method="post">
                                <input type="text" name="amount" placeholder="Amount" required>
                                <input type="text" name="description" placeholder="Description" required>
                                <input type="text" name="reference" placeholder="Reference" required>
                                <input type="text" name="first_name" placeholder="First Name" required>
                                <input type="text" name="last_name" placeholder="Last Name" required>
                                <input type="email" name="email" placeholder="Email" required>
                                <input type="tel" name="phone_number" placeholder="Phone Number" required>
                                <select name="mobile_money_provider">
                                    <option value="MTN">MTN</option>
                                    <option value="Airtel">Airtel</option>
                                    <option value="Zamtel">Zamtel</option>
                                </select>
                                <input type="submit" value="Pay Rentals">
                            </form>
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
  <script type="text/javascript">
    function calculate() {
        var amount = document.getElementById('amount');
        varitemPrice = document.getElementById('item_price');
        var quantity = document.getElementById('quantity');
        amount.value = itemPrice.value * quantity.value;
    }

    // calculate on page load
    calculate();
    </script>
</body>
</html>
