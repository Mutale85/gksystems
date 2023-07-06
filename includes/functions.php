<?php
    function Clean($string){
		return htmlspecialchars($string);
		return trim($string);
	}
	
	function getUserIpAddr(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	function time_ago_check($time){
		date_default_timezone_set("Africa/Lusaka");
		$time_ago 	= strtotime($time);
		$current_time = time();
		$time_difference = $current_time - $time_ago;
		$seconds = $time_difference;
		//lets make tround thes into actual time.
		$minutes 	= round($seconds / 60);
		$hours		= round($seconds / 3600);
		$days 		= round($seconds / 86400);
		$weeks   	= round($seconds / 604800); // 7*24*60*60;  
		$months  	= round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
		$years   	= round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "$seconds Seconds Ago";
		}else if ($minutes <= 60) {

			if ($minutes == 1) {
				return "1 minute Ago";
			}else{
				return "$minutes minutes ago";
			}
			
		}else if ($hours <= 24) {
			if ($hours == 1) {
				return "1 hour ago";
			}else{
				return "$hours hrs ago";
			}
		}else if ($days <= 7) {
			if ($days == 1) {
				return "1 day ago";
			}else{
				return "$days days ago";
			}
		}else if ($weeks < 7) {
			if ($weeks == 1) {
			
				return "1 week ago";
			}else{
				return "$weeks Weeks ago";
			}
		}else if ($months <= 12) {
			if ($months == 1) {
				return "1 month ago";
			}else{
				return "$months Months ago";
			}
		}else {
			if ($years == 1) {
				return "One year ago";
			}else{
				return "$years years ago";
			}
		}
	}


    function passwordGenerate() {
	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	    $password = array(); 
	    $alphabet_Length = strlen($alphabet) - 1;
	    for ($i = 0; $i < 9; $i++) {
	        $new = rand(0, $alphabet_Length);
	        $password[] = $alphabet[$new];
	    }
	    return implode($password); //turn the array into a string
	}


    // to be converted to personell data

    function getTenantsDetails($connect, $tenant_id){
        $query = $connect->prepare("SELECT * FROM `tenants` WHERE tenant_id = ? ");
        $query->execute([$tenant_id]);
        $row = $query->fetch();
        extract($row);
        ?>
    
            <h3 class="profile-username text-center"><span id="title"></span> <?php echo $firstname?>  <?php echo $lastname?></h3>
            <ul class="list-group list-group-unbordered mb-3">
            
                <li class="list-group-item">
                    <b>Address</b> <a class="float-right" id="address"> <?php echo $house_number?></a>
                </li>
                <li class="list-group-item">
                    <b>Phone No</b> <a class="float-right" id="phone"><?php echo $phonenumber?></a>
                </li>
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right" id="email"><?php echo $email?></a>
                </li>
                <li class="list-group-item">
                    <b>Username</b> <a class="float-right" id="gender"><?php echo $phonenumber?></a><br>
                    <b>Password</b> <a class="float-right" id="gender"><?php echo $pw?></a>
                </li>
            </ul>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lease Details</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered mb-3">
                        
                        <li class="list-group-item">
                            <b>Lease Start Date</b> <a class="float-right" id="address"> <?php echo date("j F, Y", strtotime($leaseStartDate))?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Lease End Date</b> <a class="float-right" id="phone"><?php echo date("j F, Y", strtotime($leaseEndDate))?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Rent Amount </b> <a class="float-right" id="email"><?php echo $currency?> <?php echo $rentAmount?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Payment Frequency </b> <a class="float-right" id="gender"><?php echo ucwords($paymentFrequency)?></a><br>
                        </li>
                    </ul>   
                </div>
            </div>
        <?php
    }

    function fetchTenantsProfile($connect, $tenant_id){
        $query = $connect->prepare("SELECT * FROM `tenants` WHERE tenant_id = ? ");
        $query->execute([$tenant_id]);
        $row = $query->fetch();
        extract($row);
        ?>
            <div class="text-center">
            
            </div>
            <h3 class="profile-username text-center"><span id="title"></span> <?php echo $firstname?>  <?php echo $lastname?></h3>
            <ul class="list-group list-group-unbordered mb-3">
            
                <li class="list-group-item">
                    <b>Address</b> <a class="float-right" id="address"> <?php echo $house_number?></a>
                </li>
                <li class="list-group-item">
                    <b>Phone</b> <a class="float-right" id="phone"><?php echo $phonenumber?></a>
                </li>
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right" id="email"><?php echo $email?></a>
                </li>
            </ul>
        <?php
    }

    function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }


    //================================================ 

    function getCountryName($connect, $country_id){
        $query = $connect->prepare("SELECT * FROM countries WHERE country_id = ?");
        $query->execute([$country_id]);
        $result = $query->fetch();
        return $result['country_name'];
    }

    function fetchEmployees($connect, $user_role){
        $output = '';
        $query = $connect->prepare("SELECT * FROM team_members WHERE user_role = ? ");
        $query->execute([$user_role]);

        foreach($query->fetchAll() as $row){
            extract($row);
            $output .= '
                <tr>
                    <td><a href="employee?serial'.base64_encode($id).'">'.$firstname.' '.$lastname.'</a></td>
                    <td>'.$phonenumber.'</td>
                    <td>'.$email.'</td>
                    <td>'.ucwords($department).'</td>
                    <td>'.$job_title.'</td>
                    <td>
						<div class="btn-group">
							<a href="'.$id.'" class="btn btn-primary btn-sm edit_data"><i class="bi bi-pen "></i> Edit</a>
							<a href="'.$id.'" class="btn btn-danger btn-sm delete_data"><i class="bi bi-trash "></i> Edit</a>
                        
						</div>
                        
                    </td>
                </tr>
            ';
        }
        return $output;
    }

    function fetchEmployeesForSMSandEmail($user_role){
        global $connect;
        $output = '';
        $query = $connect->prepare("SELECT * FROM team_members WHERE user_role = ? ");
        $query->execute([$user_role]);

        foreach($query->fetchAll() as $row){
            extract($row);
            $output .= '
                <tr>
                    <td>'.$phonenumber.'</td>
                    <td>'.$firstname.' '.$lastname.'</td>
                    <td>'.$email.'</td>
                </tr>
            ';
        }
        return $output;
    }

    function fetchDepartmentEmployees($connect, $user_role, $department){
        $output = '';
        $query = $connect->prepare("SELECT * FROM team_members WHERE user_role = ? AND department = ? ");
        $query->execute([$user_role, $department]);

        foreach($query->fetchAll() as $row){
            extract($row);
            $output .= '
                <tr>
                    <td><a href="employee/serial'.base64_encode($id).'">'.$firstname.' '.$lastname.'</a></td>
                    <td>'.$phonenumber.'</td>
                    <td>'.$email.'</td>
                    <td>'.ucwords($department).'</td>
                    <td>'.$job_title.'</td>
                </tr>
            ';
        }
        return $output;
    }
    
    // ============= SEND EMAIL TO EMPLOYEE ==================
    

    function fetchMemberByPhone($phonenumber){
        global $connect;
        $query = $connect->prepare("SELECT * FROM team_members WHERE phonenumber = ?");
        $query->execute([$phonenumber]);
        $row = $query->fetch();
        extract($row);
        return $firstname .' '.$lastname;

    }

    // fetch reports details

    function fetchReportsDetails($connect, $reference){
        $query = $connect->prepare("SELECT * FROM `problem_reports` WHERE reference = ? ");
        $query->execute([$reference]);
        $row = $query->fetch();
        extract($row);
        if($severity == 'Low') {
            $severity = $severity;
        }else if($severity == 'Medium'){
            $severity = "<span class='text-warning'>$severity</span>";
        }else{
            $severity = "<span class='text-danger'>$severity</span>";
        }

        if($urgency == 'Low') {
            $urgency = $urgency;
        }else if($urgency == 'Medium'){
            $urgency = "<span class='text-warning'>$urgency</span>";
        }else{
            $urgency = "<span class='text-danger'>$urgency</span>";
        }
            ?>
            
            <h3 class="profile-username ">Reported by: <span id="title"></span> <?php echo $names?></h3>
            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <b>Location</b> <a class="float-right" id="address"> <?php echo $location?></a>
                </li>
                <li class="list-group-item">
                    <b>Report Title</b> <a class="float-right" id="phone"><?php echo $problemType?></a>
                </li>
                <li class="list-group-item">
                    <b>Decription </b> <a class="float-right" id="email"><?php echo $problemDescription?></a>
                </li>
                <li class="list-group-item">
                    <b>Severity </b> <a class="float-right" id="email"><?php echo ucwords($severity)?></a>
                </li>
                <li class="list-group-item">
                    <b>Urgency </b> <a class="float-right" id="email"><?php echo ucwords($urgency)?></a>
                </li>
                <li class="list-group-item">
                    <b>Time Reported </b> <a class="float-right" id="email"><?php echo time_ago_check($problemDate) ?></a>
                </li>
                <li class="list-group-item">
                    <b> Status </b> <a class="float-right" id="email"><?php echo ucwords($status) ?></a>
                </li>
            </ul>
            <p>Attachments</p>
            <?php echo fetchReportImages($reference)?>
        <?php
    }


    function getTenantsAdress($tenants_phone){
        global $connect;
        $query = $connect->prepare("SELECT * FROM `tenants` WHERE phonenumber = ? ");
        $query->execute([$tenants_phone]);
        $row = $query->fetch();
        extract($row);
        return $house_number;
    }

    function getTenantsNames($connect, $tenants_phone){
        $query = $connect->prepare("SELECT * FROM `tenants` WHERE phonenumber = ? ");
        $query->execute([$tenants_phone]);
        if($query->rowCount() > 0){
            $row = $query->fetch();
            extract($row);
            return $firstname .' '. $lastname;
        }else{

        }
    }


    function fetchReportImages($reference){
        global $connect;
        $query = $connect->prepare("SELECT * FROM `report_attachments` WHERE reference = ? ");
        $query->execute([$reference]);
        foreach ($query->fetchAll() as $row ) {
            extract($row);?>
            <p><img src="addons/<?php echo $file_path?>" alt="<?php echo $file_name?>" class="img-fluid"></p>
        <?php

       }
    }

    function assignedTasks($connect, $reference){
        $query = $connect->prepare(" SELECT * FROM `problem_reports` WHERE reference = ? ");
        $query->execute([$reference]);
        foreach($query->fetchAll() as $row){
            extract($row);
        ?>
        <tr>
            <td><?php echo $reference?></td>
            <td><?php echo $problemType?></td>
            <td><?php echo date("j F Y", strtotime($problemDate))?></td>
            <td><?php echo ucwords($status)?></td>
            <td><a href="<?php echo $reference?>" class="btn btn-primary btn-sm view_report_details"><i class="bi bi-box"></i> Details</a></td>
            <td><a href="<?php echo $reference?>" class="btn btn-secondary btn-sm assign_task"><i class="bi bi-person-workspace"></i> Assign Task</a> </td>
        </tr>
        <?php        
        }
    }

    //=========================== orphans function =========================
    function addOrphan($photo_path, $names, $age, $gender, $caretakerId){
        global $connect;
        $stmt = $connect->prepare("INSERT INTO orphans (photo_path, names, age, gender, caretaker_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$photo_path, $names, $age, $gender, $caretakerId]);
        return $connect->lastInsertId();
    }


    // incident details reporting by transport =====
    function getReporterByPhone($phonenumber){
        global $connect;
        $output = '';
        
        $query = $connect->prepare("SELECT * FROM `team_members` WHERE phonenumber = ? ");
        $query->execute([$phonenumber]);
        if($query->rowCount() > 0){
            $row = $query->fetch();
            extract($row);
            $output =  $firstname .' '. $lastname;
        }

        return $output;
    }

    function fetchTransportReportsDetails($reference){
        global $connect;
        $query = $connect->prepare("SELECT * FROM `problem_reports` WHERE reference = ? ");
        $query->execute([$reference]);
        $row = $query->fetch();
        extract($row);
        if($severity == 'Low') {
            $severity = $severity;
        }else if($severity == 'Medium'){
            $severity = "<span class='text-warning'>$severity</span>";
        }else{
            $severity = "<span class='text-danger'>$severity</span>";
        }

        if($urgency == 'Low') {
            $urgency = $urgency;
        }else if($urgency == 'Medium'){
            $urgency = "<span class='text-warning'>$urgency</span>";
        }else{
            $urgency = "<span class='text-danger'>$urgency</span>";
        }
            ?>
            
            <h3 class="profile-username ">Reported by: <span id="title"></span> <?php echo $names?></h3>
            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <b>Location</b> <a class="float-right" id="address"> <?php echo $location ?></a>
                </li>
                <li class="list-group-item">
                    <b>Report Title</b> <a class="float-right" id="phone"><?php echo $problemType?></a>
                </li>
                <li class="list-group-item">
                    <b>Decription </b> <a class="float-right" id="email"><?php echo $problemDescription?></a>
                </li>
                <li class="list-group-item">
                    <b>Severity </b> <a class="float-right" id="email"><?php echo ucwords($severity)?></a>
                </li>
                <li class="list-group-item">
                    <b>Urgency </b> <a class="float-right" id="email"><?php echo ucwords($urgency)?></a>
                </li>
                <li class="list-group-item">
                    <b>Time Reported </b> <a class="float-right" id="email"><?php echo time_ago_check($problemDate) ?></a>
                </li>
                <li class="list-group-item">
                    <b> Status </b> <a class="float-right" id="email"><?php echo ucwords($status) ?></a>
                </li>
            </ul>
            <p>Attachments</p>
            <?php echo fetchReportImages($reference)?>
        <?php
    }


    function getTransactions($transaction){
        global $connect;
        $sql = $connect->prepare("SELECT * FROM transactions WHERE type = ? ORDER BY added_on DESC");
        $sql->execute([$transaction]);
        foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row ){
            extract($row);
        ?>
            <tr>
                <td><?php echo $description?></td>
                <td><?php echo $currency?> <?php echo $amount?></td>
                <td><?php echo  date("j F, Y", strtotime($added_on))?></td>
                <td>
                    <div class="btn-group">
                        <a href="<?php echo $id?>" class="btn btn-primary btn-sm editTransaction"><i class="bi bi-pen"></i> Edit</a>
                        <a href="<?php echo $id?>" class="btn btn-danger btn-sm removeTransaction"><i class="bi bi-trash"></i> Remove</a>
                    </div>
                </td>
            </tr>
        <?php
        } 
    }

    function incomeExpenseTable(){
        $output = '
            <thead>
                <tr>
                    <th>Narrative</th>
                    <th>Amount</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
        ';
        return $output;
    }

    function incomeExpenseTableFooter($transaction){
        $output = '
            <tfoot>
                <tr>
                    <th>Total </th>
                    <th>'.getTotalTransaction($transaction).'</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        ';
        return $output;
    }

    function getTotalTransaction($transaction){
        global $connect;
        $query = $connect->prepare("SELECT SUM(amount) AS total_transaction, currency FROM transactions WHERE type = ? ");
        $query->execute([$transaction]);

        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row['currency'].' '.$row['total_transaction'];
        
    }

    function counTransactions($transaction){
        global $connect;
        $query = $connect->prepare("SELECT * FROM transactions WHERE type = ? ");
        $query->execute([$transaction]);
        $result = $query->rowCount();
        return $result;
    }


    // ============= send sms function =============
    function SMSNOW($to, $message, $api_key, $sender_id){
		global $connect;
        $output = "";
		$query = $connect->prepare("SELECT * FROM `sms_counter` ");
	  	$query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetch();
            $balance = $result['remaining_sms'];
            if($balance > 0){
                $url = 'https://bulksms.zamtel.co.zm/api/v2.1/action/send/api_key/'.$api_key.'/contacts/'.$to.'/senderId/'.$sender_id.'/message/'.$message.'';
                $gateway_url = $url;
                try {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $gateway_url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_HTTPGET, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                    $output = curl_exec($ch);
                    // we add sms counting 
                    $sql = $connect->prepare("INSERT INTO `sms_counter` (`receiver`, `message`) VALUES(?, ?) ");
                    $sql->execute([$to, $message]);
                    $updatedSmsCount = $balance - 1;
                    $update = $connect->prepare("UPDATE `sms_counter` SET `remaining_sms` = ? ");
                    $update->execute([$updatedSmsCount]);
                    $response = array(
                        'success' => true,
                        'message' => 'SMS sent successfully.'
                    );

                    if (curl_errno($ch)) {
                        $output = curl_error($ch);
                    }
                    curl_close($ch);
                    
                }catch (Exception $exception){
                    echo $exception->getMessage();
                }
            }else{
                
                $response = array(
                    'success' => true,
                    'message' => 'Contact admin: 260976330092'
                );
                exit();
            } 
        }else{
            $sql = $connect->prepare("INSERT INTO `sms_counter` (`receiver`, `message`) VALUES(?, ?) ");
            $sql->execute([$to, $message]);
            $update = $connect->prepare("UPDATE `sms_counter` SET `remaining_sms` = remaining_sms - 1 ");
            $update->execute();
        }

         // Return the response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);
  	}
?>