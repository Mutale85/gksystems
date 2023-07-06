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
                <button type="button" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#reportModal">
                    Create Report
                </button>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Reports</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Report ID</th>
                                            <th>Report Title</th>
                                            <th>Report date</th>
                                            <th>Report Status</th>
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
                                            <td><a href="<?php echo $reference?>" class="btn btn-primary btn-sm view_incident_report_details"><i class="bi bi-box"></i> Details</a></td>
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
        <style>
            .clear-input {
                position: relative;
            }

            .clear-input input {
                padding-right: 20px;
            }

            .clear-input .clear-btn {
                position: absolute;
                top: 50%;
                right: 10px;
                transform: translateY(-50%);
                cursor: pointer;
            }
        </style>
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
                            <input type="hidden" name="names" id="names" class="form-control" value="<?php echo $_SESSION['firstname'].' ' . $_SESSION['lastname']?>">
                            <input type="hidden" name="email" id="email" class="form-control" value="<?php echo  $_SESSION['email']?>">
                            <div class="mb-3">
                                <label for="problemType" class="form-label">Problem Type</label>
                                <div class="clear-input">
                                    <input type="text" class="form-control" id="problemType" name="problemType" list="problemTypes">
                                    <span class="clear-btn" onclick="clearInput()">X</span>
                                </div>
                                <datalist id="problemTypes">
                                    <option value="Accident">Accident</option>
                                    <option value="Breakdown">Breakdown</option>
                                    <option value="Cargo Damage">Cargo Damage</option>
                                    <option value="Delayed Delivery">Delayed Delivery</option>
                                    <option value="Fuel Theft">Fuel Theft</option>
                                    <option value="Lost Shipment">Lost Shipment</option>
                                    <option value="Overloaded Vehicle">Overloaded Vehicle</option>
                                    <option value="Road Rage">Road Rage</option>
                                    <option value="Route Deviation">Route Deviation</option>
                                    <option value="Stolen Vehicle">Stolen Vehicle</option>
                                    <option value="Tire Blowout">Tire Blowout</option>
                                    <option value="Traffic Violation">Traffic Violation</option>
                                    <option value="Unauthorized Access">Unauthorized Access</option>
                                    <option value="Unsafe Driving">Unsafe Driving</option>
                                    <option value="Vehicle Fire">Vehicle Fire</option>
                                    <option value="Vehicle Theft">Vehicle Theft</option>
                                    <option value="Weather Conditions">Weather Conditions</option>
                                    <option value="Workplace Injury">Workplace Injury</option>
                                    <option value="Wrong Delivery">Wrong Delivery</option>
                                    <option value="Wrong Route">Wrong Route</option>
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
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="urgency" class="form-label">Urgency</label>
                                <select class="form-control" id="urgency" name="urgency" required>
                                    <option value="">Select urgency level</option>
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
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
    function clearInput() {
      document.getElementById('problemType').value = '';
    }
  </script>
</body>
</html>
