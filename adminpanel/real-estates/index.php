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
                            <button type="button" class="btn btn-primary mb-4" id="btnModal" data-toggle="modal" data-target="#addTenantModal">
                                Add Tenant
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Added Tenants</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table table-responsive">
                                        <table class="table table-bordered" id="allTables">
                                            <thead>
                                                <tr>
                                                    <th>Names</th>
                                                    <th>Phone </th>
                                                    <th>Email </th>
                                                    <th>House No.</th>
                                                    <th>Occupants</th>
                                                    <th>Actions</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $query = $connect->prepare("SELECT * FROM tenants WHERE parent_id = ?");
                                                    $query->execute([$_SESSION['parent_id']]);
                                                    foreach($query->fetchAll() as $row){
                                                        extract($row);
                                                ?>
                                                    <tr>
                                                        <td><a href="real-estates/details?tenant=<?php echo base64_encode($phonenumber)?>"><?php echo $firstname?> <?php echo $lastname?></a></td>
                                                        <td><?php echo $phonenumber?></td>
                                                        <td><?php echo $email?></td>
                                                        <td><?php echo $house_number?></td>
                                                        <td><?php echo $num_people?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo $tenant_id?>" class="btn btn-primary btn-sm edit_tenant"><i class="bi bi-pencil"></i> Edit</a>
                                                                <a href="<?php echo $tenant_id?>" class="btn btn-danger btn-sm remove_tenant"><i class="bi bi-trash"></i> Remove</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tenants Modal -->
                <div class="modal fade" id="addTenantModal"  aria-labelledby="addTenantModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addTenantModalLabel">Add Tenant</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="tenantsForm">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name:</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name:</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phonenumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="260" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="house_number" class="form-label">House Number:</label>
                                        <input type="text" class="form-control" name="house_number" id="house_number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="num_people" class="form-label">Number of People Living in the House:</label>
                                        <input type="number" class="form-control" name="num_people" id="num_people" min="1" required>
                                        <input type="hidden" name="tenant_id" id="tenant_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" id="submitBtn" class="btn btn-primary">Add Tenant</button>
                                    </div>
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
        $(function(){
            $("#tenantsForm").submit(function(e){
                e.preventDefault();
                var tenantsForm = $(this).serialize();
                $.ajax({
                    url: "real-estates/parsers/submitTenant",
                    method:"post",
                    data:tenantsForm,
                    // dataType:'Json',
                    beforeSend:function(){
                        $("#submitBtn").html("Processing...");
                    },
                    success:function(response){
                        $("#submitBtn").html("Add Tenant");
                        alert(response);
                    }
                })
            });

            $(document).on("click", ".edit_tenant", function(e){
                e.preventDefault();
                var tenant_id = $(this).attr("href");
                $("#btnModal").click();
                $.ajax({
                    url: "real-estates/parsers/editTenant",
                    method:"post",
                    data:{tenant_id:tenant_id},
                    dataType:'Json',
                    success:function(data){
                        $("#first_name").val(data.firstname);
                        $("#last_name").val(data.lastname);
                        $("#email").val(data.email);
                        $("#phonenumber").val(data.phonenumber);
                        $("#house_number").val(data.house_number);
                        $("#num_people").val(data.num_people);
                        $("#tenant_id").val(data.tenant_id);
                    }
                })
            })
        })
    </script>

    
</body>
</html>
