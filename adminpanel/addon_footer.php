<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" id="employeeForm">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" required>
                        <input type="hidden" id="employee_id" name="employee_id">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="+260" required>
                    </div>
                    <div class="mb-3">
                        <label for="team_role" class="form-label">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Select</option>
                            <option value="academics">Academics</option>
                            <option value="accounts">Accounts</option>
                            <option value="farms">Farm</option>
                            <option value="hospital">Hospital</option>
                            <option value="media">Media</option>
                            <option value="orphanage">Orphanage</option>
                            <option value="real-estates">Real Estate</option>
                            <option value="transport-logistics">Transport & logistics</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="job_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" name="job_title" id="job_title"  required>
                    </div>
                    <div class="mb-3">
                        <label for="user_role" class="form-label">Role</label>
                        <select name="user_role" id="user_role" class="form-control">
                            <option value="">Select</option>
                            <option value="superAdmin">Super Admin</option>
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="team_role" class="form-label">Employee Contract</label>
                        <select name="employee_contract" id="employee_contract" class="form-control">
                            <option value="">Select</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Intern">Intern</option>
                            <option value="Casual / Short Term">Casual / Short Term</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="add_employee" class="btn btn-primary">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Results Modal -->
<button type="button" style="display: none;" class="btn btn-primary" id="resultsBtn" data-toggle="modal" data-target="#resultsModal"> Create Report</button>
<div class="modal fade" id="resultsModal" tabindex="-1" aria-labelledby="resultsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resultsModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                <div id="details_modal"></div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->

<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->

<!-- Data Tables -->
<script type="text/javascript" src="dist/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="dist/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="dist/js/jszip.min.js"></script>
<script type="text/javascript" src="dist/js/pdfmake.min.js"></script>
<script type="text/javascript" src="dist/js/vfs_fonts.js"></script>
<script type="text/javascript" src="dist/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="dist/js/buttons.print.min.js"></script>
<!-- Scripting controls -->
<script type="text/javascript" src="dist/js/pages/controls.js"></script>

<!-- date Picker -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- Apex Chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

