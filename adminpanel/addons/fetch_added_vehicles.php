<?php
    require '../../includes/db.php'; 
    if(isset($_POST['showVehicles'])){
        echo fetchVehicleAssets();
    }

    if(isset($_POST['vehicle_id'])){
        $vehicleId = $_POST['vehicle_id'];    
    ?>
        <div class="card">
            <div class="card-header">
                <h5>Vehicle Details</h5>
            </div>
            <div class="card-body">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Fetch vehicle images from the database
                        $stmt = $connect->prepare("SELECT image_path FROM vehicle_images WHERE license_plate = ?");
                        $stmt->execute([$vehicleId]);
                        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);
                        $active = true;

                        foreach ($images as $image) {
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<img src="addons/' . $image . '" class="d-block w-100" alt="Vehicle Image">';
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
                        // Fetch vehicle details from the database
                        $stmt = $connect->prepare("SELECT * FROM vehicles WHERE license_plate = ?");
                        $stmt->execute([$vehicleId]);
                        $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);
                        $row = $vehicle;
                        
                        extract($row);
                        $output = '
                        <table class="table mt-4">
                            <tbody>
                                <tr><th scope="row">Year</th><td>'.$year.'</td></tr>
                                <tr><th scope="row">Make</th><td>'.$make.'</td></tr>
                                <tr><th scope="row">Model</th><td> '.$model.'</td></tr>
                                <tr><th scope="row">Color</th><td>'.$color.'</td></tr>
                                <tr><th scope="row">License Plate</th><td>'.$license_plate.'</td></tr>
                                <tr><th scope="row">Vin</th><td>'.$vin.'</td></tr>
                                <tr><th scope="row">Purchase Date</th><td>'.date('j, F Y', strtotime($purchase_date)).'</td></tr>
                                <tr><th scope="row">Purchase Price</th><td>'.$currency.' '.$purchase_price.'</td></tr>
                                <tr><th scope="row">Purchase Mileage</th><td>'.$purchase_mileage.' KM</td></tr>
                                <tr><th scope="row">Driver</th><td>'.getReporterByPhone($driver).'</td></tr>
                            </tbody>
                        </table>
                        ';
                        echo $output;
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    <?php
        
    }
?>
