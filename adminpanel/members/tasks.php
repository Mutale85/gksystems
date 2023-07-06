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
                            <h4 class="card-title">Assigned Tasks</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <td>Emp ID</td>
                                            <th>Instructions</th>
                                            <th>Date Tasked</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $empID = $_GET['empID'];
                                        $empID = base64_decode($empID);
                                        $query = $connect->prepare("SELECT * FROM task_assignments WHERE employeeId = ?");
                                        $query->execute([$empID]);


                                        foreach($query->fetchAll() as $row){
                                            extract($row);
                                    ?>
                                        <tr>
                                            <td><?php echo $empID?></td>   
                                            <td><?php echo $special_instructions?></td>
                                            <td><?php echo date("j F Y", strtotime($date_assigned))?></td>
                                            <td><?php echo ucwords($status);?> <i class="bi bi-arrow-right"></i> <a href="<?php echo $reference?>" id="<?php echo $task_id?>" class="update_work_status" > Update</a></td>
                                            <td><a href="<?php echo $reference?>" class="btn btn-primary btn-sm view_report_details"><i class="bi bi-box"></i> Task Details</a></td>
                                        </tr>
                                        <button type="button" style="display: none;" class="btn btn-primary" id="resultsBtn_<?php echo $task_id?>" data-toggle="modal" data-target="#taskModal_<?php echo $task_id?>"> Create Report</button>
                                        <div class="modal fade" id="taskModal_<?php echo $task_id?>" tabindex="-1" aria-labelledby="resultsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="resultsModalLabel">Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" id="taskUpdate">
                                                            <div class="md-3">
                                                                <label>Have you done the work?</label>
                                                                <select class="form-control" name="work_status" id="work_status">
                                                                    <option value="">Select</option>
                                                                    <option value="Works completed">Works Completed</option>
                                                                    <option value="Works uncompleted">Works uncompleted</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Remarks</label>
                                                                <textarea class="form-control" name="remarks" id="remarks" rows="5" placeholder="Write your remarks"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Report Date</label>
                                                                <input type="text" name="date_worked" id="problemDate" class="form-control" placeholder="Click to add date">
                                                                <input type="hidden" name="reference" id="reference" class="form-control" value="<?php echo $reference?>">
                                                                <input type="hidden" name="task_id" id="task_id" class="form-control" value="<?php echo $task_id?>">
                                                            </div>
                                                            <button type="submit" id="submit_btn" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php        
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
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
