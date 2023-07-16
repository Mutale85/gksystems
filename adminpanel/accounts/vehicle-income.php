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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vehicle Income</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <?php 
                                        
                                        echo getVehicleIncomeReport();
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between mb-3">
                                <div><i class="bi bi-circle text-success"></i> <span class="text-secondary">Income</span></div>
								<div><?php echo counVehicleTransactionsReport() ?> Transactions</div>
                            </div>
                            <div class="progress mb-3" style="height:30px; border-radius: 5px;">
                                <div id="incomeProgressBar" class="progress-bar bg-success" role="progressbar" style="width: <?php echo counVehicleTransactionsReport() ?>%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"> <?php echo counVehicleTransactionsReport()?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vehicle Income Graph</h4>
                        </div>
                        <div class="card-body">
                            <div id="incomechartContainer"></div>
                        </div>
                        <div class="card-footer">
                            <button id="chartTypeButton" class="btn btn-primary">Switch Chart Type</button>
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
