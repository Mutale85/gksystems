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
                            <h4 class="card-title">Rent Payments Table </h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Rent ID</th>
                                            <th>Month Paid For</th>
                                            <th>Payment date</th>
                                            <th>Next Payment </th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $query = $connect->prepare("SELECT * FROM problem_reports WHERE reporter_id = ? ");
                                        $query->execute([$_SESSION['phonenumber']]);
                                        foreach($query->fetchAll() as $row){
                                            extract($row);
                                    ?>
                                        <tr>
                                            <td><?php echo $reference?></td>
                                            <td><?php echo $problemType?></td>
                                            <td><?php echo date("j F Y", strtotime($problemDate))?></td>
                                            <td><?php echo ucwords($status)?></td>
                                            <td><a href="<?php echo $reference?>" class="btn btn-primary btn-sm view_report_details"><i class="bi bi-box"></i> Details</a></td>
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

        <!-- tenants modal -->
        <div class="modal fade" id="reportModal"  aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reportModalLabel">Tenant Problem Report Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="problemReportForm" method="POST" enctype="multipart/form-data">
                            <!-- <div class="mb-3">
                                <label for="title">Problem Title</label>
                                <input type="text" name="problemTitle" id="problemTitle" class="form-control" >
                            </div> -->
                            <div class="mb-3">
                                <label for="problemType" class="form-label">Problem Type</label>
                                <input type="text" class="form-control" id="problemType" name="problemType" list="problemTypes">
                                <datalist id="problemTypes">
                                    <option value="Appliance Malfunction"> Appliance Malfunction </option>    
                                    <option value="Clogged or blocked drain">Clogged or blocked drain</option>
                                    <option value="Pest infestation (e.g., insects or rodents)">Pest infestation (e.g., insects or rodents)</option>
                                    <option value="Water damage or leakages">Water damage or leakages</option>
                                    <option value="Faulty Electrical Outlet">Faulty Electrical Outlet</option>
                                    <option value="Heating Issue">Heating Issue</option>
                                    <option value="Broken windows or doors">Broken windows or doors</option>
                                    <option value="Roof leaks or damage">Roof leaks or damage</option>
                                    <option value="Insufficient or inconsistent water pressure">Insufficient or inconsistent water pressure</option>
                                    <option value="Malfunctioning or non-responsive thermostat">Malfunctioning or non-responsive thermostat</option>
                                    <option value="Inadequate lighting or electrical problems">Inadequate lighting or electrical problems</option>
                                    <option value="Issues with locks or security systems">Issues with locks or security systems</option>
                                    <option value="Broken or damaged flooring">Broken or damaged flooring</option>
                                    <option value="Plumbing problems (e.g., toilet, shower, or sink issues)">Plumbing problems (e.g., toilet, shower, or sink issues)</option>
                                    <option value="Structural damage (e.g., cracks in walls or ceilings)">Structural damage (e.g., cracks in walls or ceilings)</option>
                                    <option value="Damaged or missing fixtures (e.g., cabinets, countertops)">Damaged or missing fixtures (e.g., cabinets, countertops)</option>
                                </datalist>
                            </div>

                            <div class="mb-3">
                                <label for="problemDescription" class="form-label">Problem Description</label>
                                <textarea class="form-control" id="problemDescription" name="problemDescription" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date">Date Started</label>
                                <input type="text" name="problemDate" id="problemDate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="severity" class="form-label">Severity</label>
                                <select class="form-control" id="severity" name="severity" required>
                                    <option value="">Select severity level</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="urgency" class="form-label">Urgency</label>
                                <select class="form-control" id="urgency" name="urgency" required>
                                    <option value="">Select urgency level</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="attachments" class="form-label">Attachments</label>
                                <input type="file" class="form-control" id="attachments" name="attachments[]" multiple accept="image/*, .pdf">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>

    <script>
        
    </script>
</body>
</html>
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
                            <h4 class="card-title">Rental Payment History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Rent ID</th>
                                            <th>Month paid</th>
                                            <th>Date Paid</th>
                                            <th>Next Payment</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $query = $connect->prepare("SELECT * FROM problem_reports WHERE reporter_id = ? ");
                                        $query->execute([$_SESSION['phonenumber']]);
                                        foreach($query->fetchAll() as $row){
                                            extract($row);
                                    ?>
                                        <tr>
                                            <td><?php echo $reference?></td>
                                            <td><?php echo $problemType?></td>
                                            <td><?php echo date("j F Y", strtotime($problemDate))?></td>
                                            <td><?php echo ucwords($status)?></td>
                                            <td><a href="<?php echo $reference?>" class="btn btn-primary btn-sm view_report_details"><i class="bi bi-box"></i> Details</a></td>
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

        <!-- tenants modal -->
        <div class="modal fade" id="reportModal"  aria-labelledby="reportModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reportModalLabel">Tenant Problem Report Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="problemReportForm" method="POST" enctype="multipart/form-data">
                            <!-- <div class="mb-3">
                                <label for="title">Problem Title</label>
                                <input type="text" name="problemTitle" id="problemTitle" class="form-control" >
                            </div> -->
                            <div class="mb-3">
                                <label for="problemType" class="form-label">Problem Type</label>
                                <input type="text" class="form-control" id="problemType" name="problemType" list="problemTypes">
                                <datalist id="problemTypes">
                                    <option value="Appliance Malfunction"> Appliance Malfunction </option>    
                                    <option value="Clogged or blocked drain">Clogged or blocked drain</option>
                                    <option value="Pest infestation (e.g., insects or rodents)">Pest infestation (e.g., insects or rodents)</option>
                                    <option value="Water damage or leakages">Water damage or leakages</option>
                                    <option value="Faulty Electrical Outlet">Faulty Electrical Outlet</option>
                                    <option value="Heating Issue">Heating Issue</option>
                                    <option value="Broken windows or doors">Broken windows or doors</option>
                                    <option value="Roof leaks or damage">Roof leaks or damage</option>
                                    <option value="Insufficient or inconsistent water pressure">Insufficient or inconsistent water pressure</option>
                                    <option value="Malfunctioning or non-responsive thermostat">Malfunctioning or non-responsive thermostat</option>
                                    <option value="Inadequate lighting or electrical problems">Inadequate lighting or electrical problems</option>
                                    <option value="Issues with locks or security systems">Issues with locks or security systems</option>
                                    <option value="Broken or damaged flooring">Broken or damaged flooring</option>
                                    <option value="Plumbing problems (e.g., toilet, shower, or sink issues)">Plumbing problems (e.g., toilet, shower, or sink issues)</option>
                                    <option value="Structural damage (e.g., cracks in walls or ceilings)">Structural damage (e.g., cracks in walls or ceilings)</option>
                                    <option value="Damaged or missing fixtures (e.g., cabinets, countertops)">Damaged or missing fixtures (e.g., cabinets, countertops)</option>
                                </datalist>
                            </div>

                            <div class="mb-3">
                                <label for="problemDescription" class="form-label">Problem Description</label>
                                <textarea class="form-control" id="problemDescription" name="problemDescription" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date">Date Started</label>
                                <input type="text" name="problemDate" id="problemDate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="severity" class="form-label">Severity</label>
                                <select class="form-control" id="severity" name="severity" required>
                                    <option value="">Select severity level</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="urgency" class="form-label">Urgency</label>
                                <select class="form-control" id="urgency" name="urgency" required>
                                    <option value="">Select urgency level</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="attachments" class="form-label">Attachments</label>
                                <input type="file" class="form-control" id="attachments" name="attachments[]" multiple accept="image/*, .pdf">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>

    <script>
        
    </script>
</body>
</html>
