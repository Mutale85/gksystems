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
                
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $query = $connect->prepare(" SELECT * FROM `problem_reports` ");
                                        $query->execute();
                                        foreach($query->fetchAll() as $row){
                                            extract($row);
                                            if($status == 'closed'){
                                                $status = "<span class='badge bg-danger'>$status</span>";
                                                $td = "<td><a href='".$reference."' class='btn btn-info btn-sm view_completed_task'><i class='bi bi-person-workspace'></i> View Report</a> </td>";
                                            } else{
                                                $status = "<span class='badge bg-success'>$status</span>";
                                                $td = "<td><a href='".$reference."' class='btn btn-secondary btn-sm assign_task'><i class='bi bi-person-workspace'></i> Assign Task</a> </td>";
                                            } 
                                    ?>
                                        <tr>
                                            <td><a href="reports/details?ref=<?php echo $reference?>"><?php echo $reference?></td>
                                            <td><?php echo $problemType?></td>
                                            <td><?php echo date("j F Y", strtotime($problemDate))?></td>
                                            <td><?php echo ucwords($status)?></td>
                                            <td><a href="<?php echo $reference?>" class="btn btn-primary btn-sm view_report_details"><i class="bi bi-box"></i> Details</a></td>
                                            <?php echo $td?>
                                        </tr>
                                    <?php        
                                        }
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
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>
</body>
</html>
