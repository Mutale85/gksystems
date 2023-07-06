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
                    <div id="chartContainer"></div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <?php include('../addon_footer_content.php')?>
    </div>
    <?php include('../addon_footer.php')?>
    <script>
        $(document).ready(function() {
            // Function to fetch income and expense data and create the ApexCharts graph
           // Call the function to create the graph
            createGraph();
        });

    </script>
</body>
</html>
