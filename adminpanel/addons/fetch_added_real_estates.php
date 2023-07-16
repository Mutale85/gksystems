<?php
    require '../../includes/db.php'; 
    if(isset($_POST['showreal_estates'])){
        echo fetchRealEstateAssets();
    }

    if(isset($_POST['real_estateId'])){
        $real_estateId = $_POST['real_estateId'];    
    ?>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Real Estate Details</h5>
            </div>
            <div class="card-body">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Fetch real_estateId images from the database
                        $stmt = $connect->prepare("SELECT image_path FROM estate_images WHERE estate_id = ?");
                        $stmt->execute([$real_estateId]);
                        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);
                        $active = true;

                        foreach ($images as $image) {
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<img src="addons/' . $image . '" class="d-block w-100" alt="real_estateId Image">';
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
                        // Fetch real_estateId details from the database
                        $stmt = $connect->prepare("SELECT * FROM estates WHERE estate_id = ?");
                        $stmt->execute([$real_estateId]);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        
                        
                        echo '
                            <table class="table mt-4">
                                <tbody>
                        
                                    <tr>
                                        <tr><th scope="row">Address</th>
                                        <td>' . $row['address'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Location</th>
                                        <td>' . $row['location'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Condition</th>
                                        <td>' . $row['condition'] . '</td>
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
                                        <tr><th scope="row">Rental Amount</th>
                                        <td>'.$row['currency'].' ' . $row['rental_amount'] . '</td>
                                    </tr>
                                    <tr>
                                        <tr><th scope="row">Current State</th>
                                        <td>' . $row['current_state'] . '</td>
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
