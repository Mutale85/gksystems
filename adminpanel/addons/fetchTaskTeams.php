<?php 
    include("../../includes/db.php");

    if(isset($_POST['reference'])){
        $reference = $_POST['reference'];
        
    ?>
        <!-- <h1>Assign Task</h1> -->
        <form id="assignTaskForm">
            <table class="table table-bordered" id="employeeTable">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Employee Job</th>
                        <th>Assign Task</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $user_role = 'employee'; 
                        $query = $connect->prepare("SELECT * FROM team_members WHERE user_role = ? ");
                        $query->execute([$user_role]);
                
                        foreach($query->fetchAll() as $row){
                            extract($row);
                            $check = $connect->prepare("SELECT * FROM task_assignments WHERE employeeId = ? AND status = 'open' ");
                            $check->execute([$phonenumber]);
                            
                    ?>
                            <tr>
                                <td><?php echo $phonenumber ?></td>
                                <td><?php echo $firstname ?> <?php echo $lastname ?></td>
                                <td><?php echo ucwords($job_title)?></td>
                                <?php 
                                    if($check->rowCount() > 0):?>
                                    <td><input type="checkbox" name="employeeId[]"  value="<?php echo $phonenumber ?>" checked> <?php echo $reference?></td>
                                <?php else:?>
                                    <td><input type="checkbox" name="employeeId[]"  value="<?php echo $phonenumber ?>"></td>
                                <?php endif;?>
                            </tr>
                   <?php
                        }
    
                    ?>
                </tbody>
            </table>
            <div class="mt-3 mb-3 border-bottom pb-3">
                <textarea class="form-control" name="special_instructions" id="special_instructions" rows="4" placeholder="You can add more instructions"></textarea>
                <input type="hidden" name="taskId" id="taskId" value="<?php echo $reference?>">
            </div>
            <button type="submit" class="btn btn-primary">Assign Task</button>
        </form>
        <script>
            $("#employeeTable").DataTable();
            function validateForm() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"][name="employeeId[]"]');
                var isChecked = false;

                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                    isChecked = true;
                    break;
                    }
                }

                if (!isChecked) {
                    alert('Please select at least one employee.');
                    return false;
                }
            }
            $(document).ready(function() {
                $('#assignTaskForm').submit(function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    validateForm();
                    $.ajax({
                        type: 'POST',
                        url: 'addons/assign_task',
                        data: formData,
                        success: function(response) {
                            alert(response);
                            location.reload();
                        },
                        error: function() {
                            alert('Error occurred. Please try again.');
                        }
                    });
                });
            });
            
        </script>
    <?php
    }