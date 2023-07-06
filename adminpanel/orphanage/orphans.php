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
                <div class="col-md-12 mb-3">
                    <button type="button" id="addOrphanBtn" class="btn btn-primary" data-toggle="modal" data-target="#addOrphanModal">Add Orphan</button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Orphanes</h4>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <table class="table table-bordered" id="allTables">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Names</th>
                                            <th>Age </th>
                                            <th>Gender</th>
                                            <th>Care Taker</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <?php
                                            $query = $connect->prepare("SELECT * FROM `orphans`");
                                            $query->execute();
                                            foreach($query->fetchAll() as $row){
                                                extract($row);
                                            ?>
                                        <tr>
                                            <td><img src="addons/<?php echo $photo_path?>" alt="photo" class="img-responsive" style="width:80px; height: 80px;border-radius:50%;"></td>
                                            <td><?php echo ucwords($names)?></td>
                                            <td><?php echo $age?> Years</td>
                                            <td><?php echo $gender?></td>
                                            <td><?php echo fetchMemberByPhone($caretaker_id)?></td>
                                            <td>
                                                <divc class="btn-group">
                                                    <a href="<?php echo $id?>" class="edit_orphan btn btn-primary btn-sm"><i class="bi bi-pen"></i> Edit</a>
                                                    <a href="<?php echo $id?>" class="remove_orphan btn btn-danger btn-sm"><i class="bi bi-trash"></i> Remove</a>
                                                </divc>
                                            </td>
                                        </tr>
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
       <!-- Modal -->
        <div class="modal fade" id="addOrphanModal" tabindex="-1" aria-labelledby="addOrphanModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOrphanModalLabel">Add Orphan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="addOrphanForm" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo" >
                                <input type="hidden" name="orphan_id" id="orphan_id">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="names" name="names" required>
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="caretakerId" class="form-label">Caretaker</label>
                                <select class="form-control" id="caretakerId" name="caretakerId" required>
                                    <option value="">Select Caretaker</option>
                                    <!-- Caretaker options will be loaded dynamically using AJAX -->
                                </select>
                            </div>
                            <button type="submit" id="orphanbtn" class="btn btn-primary">Add Orphan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  <!-- End of modal -->
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>
</body>
</html>
