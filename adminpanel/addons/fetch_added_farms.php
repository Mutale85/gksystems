<?php
    require '../../includes/db.php'; 
    if(isset($_POST['showFarms'])){
        echo fetchFarmAssets();
    }

    if(isset($_POST['farm_id'])){
        $farmId = $_POST['farm_id'];    
    ?>
        <div class="card">
            <div class="card-header">
                <h5>farm Details</h5>
            </div>
            <div class="card-body">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Fetch farm images from the database
                        $stmt = $connect->prepare("SELECT image_path FROM farm_images WHERE farm_id = ?");
                        $stmt->execute([$farmId]);
                        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);
                        $active = true;

                        foreach ($images as $image) {
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<img src="addons/' . $image . '" class="d-block w-100" alt="farm Image">';
                            echo '</div>';
                            $active = false;
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <table class="table mt-4">
                    <tbody>
                        <?php
                        // Fetch farm details from the database
                        $stmt = $connect->prepare("SELECT * FROM farms WHERE farm_id = ?");
                        $stmt->execute([$farmId]);
                        $farm = $stmt->fetch(PDO::FETCH_ASSOC);
                        $row = $farm;
                        
                        echo '
                            <table class="table mt-4">
                                <tbody>
                        
                                    <tr>
                                        <tr><th scope="row">Farmin Activity</th>
                                        <td>' . $row['activity'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Location</th>
                                        <td>' . $row['location'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Address</th>
                                        <td>' . $row['address'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Purchase Amount</th>
                                        <td>'.$row['currency'].' ' . $row['purchase_amount'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Current Value</th>
                                        <td>'.$row['currency'].' ' . $row['current_value'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Purchase Date</th>
                                        <td>' . date("j F, Y", strtotime($row['purchase_date'])) . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Farm Size</th>
                                        <td>' . $row['farm_size'] . ' '.$row['measurement'].'</td>
                                    </tr>
                                </tbody>
                            </table>
                            ';
                    
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    <?php
        
    }
?>
