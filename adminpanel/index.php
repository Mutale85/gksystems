<?php include('../includes/db.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('addon_header.php')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php include('addon_top_nav.php')?>
  
  <?php include('addon_side_nav.php')?>
  <div class="content-wrapper">
    <?php include('addon_content_head.php')?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#employeeModal">
                        Add Employee
                    </button>
                </div>
            </div>
        </div>
                <!-- Employees Modal -->
        <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
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
                                <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="260" required>
                            </div>
                            <div class="mb-3">
                                <label for="team_role" class="form-label">Department</label>
                                <select name="department" id="department" class="form-control">
                                    <option value="">Select</option>
                                    <option value="academics">Academics</option>
                                    <option value="accounts">Accounts</option>
                                    <option value="farm">Farm</option>
                                    <option value="hospital">Hospital</option>
                                    <option value="media">Media</option>
                                    <option value="estate">Real Estate</option>
                                    <option value="transport">Transport logistics</option>
                                </select>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" id="add_employee" class="btn btn-primary">Add Employee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <a href="academics">
                <div class="card bg-info text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-mortarboard"></i> <br> Academics</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="farms">
                <div class="card bg-success text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-flower1"></i> <br> Farms</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="hospitals">
                <div class="card bg-danger text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-hospital"></i> <br> Hospitals</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="income-expenses">
                <div class="card bg-dark text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-piggy-bank"></i> <br> Income & Expenses</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="media">
                <div class="card bg-warning text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-film"></i> <br> Media</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="orphanage">
                <div class="card bg-light text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-person-hearts"></i> <br> Orphanage</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>
            
            <div class="col-lg-3 col-6">
              <a href="real-estates">
                <div class="card bg-primary text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-houses"></i> <br> Real Estates</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-6">
              <a href="transport-logistics">
                <div class="card bg-secondary text-center">
                  <div class="card-header"> 
                    <div class="icon"></div>
                    <h3><i class="bi bi-truck-front"></i> <br> Transport & Logistics</h3>
                  </div>
                  <div class="card-body">Management</div>
                </div>
              </a>
            </div>
          </div>

          <div class="row">

          </div>
        </div>
      </section>
    </div>
    <?php include('addon_footer_content.php')?>
  </div>
  <?php include('addon_footer.php')?>
  <script>
    $(document).ready(function() {
      // Submit form using AJAX
      $('#employeeForm').submit(function(event) {
        event.preventDefault(); // Prevent form from submitting normally

        // Get form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
          url: 'addons/submitEmployee.php', // Replace with the URL where you want to submit the form
          type: 'POST',
          data: formData,
          success: function(response) {
            // Handle success response
            alert(response);
            console.log('Form submitted successfully');
            // You can do something here, like displaying a success message
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.log('Error submitting form: ' + error);
            // You can do something here, like displaying an error message
          }
        });
      });
    });
  </script>
</body>
</html>
