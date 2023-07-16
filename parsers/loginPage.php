<?php

	include("../includes/db.php");
	if (isset($_POST['phonenumber'])) {
		$phonenumber = trim(filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_SPECIAL_CHARS));
		$p_word = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
		$phonenumber = trim(rtrim($phonenumber));
		$p_word = trim(rtrim($p_word));
		
		if ($phonenumber == "") {
			echo "Phonenumber is empty";
			exit();
		}

		if ($p_word === "") {
			echo "password is empty";
			exit();
		}
		
		$query = $connect->prepare("SELECT * FROM team_members WHERE phonenumber = ? ");
		$query->execute(array($phonenumber));

		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				extract($row);
				if($activate == 1){
					if (password_verify($p_word, $password)) {
						$_SESSION['username'] 	= $username;
						$_SESSION['email'] 		= $email;
					    $_SESSION['user_id'] 	= $id;
					    $_SESSION['firstname'] 	= $firstname;
					    $_SESSION['lastname'] 	= $lastname;
					    $_SESSION['user_role'] 	= $user_role;
					    $_SESSION['parent_id'] 	= $parent_id;
						$_SESSION['phonenumber'] = $phonenumber;
						$_SESSION['department'] = $department;
					    setcookie("gksysmtems", base64_encode($_SESSION['email']. password_hash($_SESSION['email'], PASSWORD_DEFAULT)), time()+60*60*24*30, '/');
						setcookie("gksysmtemsAccount", $user_role, time()+60*60*24*30, '/');			    
					    echo "Redirecting you in 1 Second";
					}else{
						echo "Incorrect login credentials";
						exit();
					}
				}else{
					echo "User is not activated";
					exit();
				}
			}
		}else{
			// echo "Now";u
			$queryTenant = $connect->prepare("SELECT * FROM tenants WHERE phonenumber = ? ");
			$queryTenant->execute([$phonenumber]);
			if($queryTenant->rowCount() > 0){
				foreach ($queryTenant->fetchAll() as $row) {
					extract($row);
					if($activate == 1){
						if (password_verify($p_word, $password)) {
							$_SESSION['username'] 	= $firstname;
							$_SESSION['email'] 		= $email;
							$_SESSION['user_id'] 	= $tenant_id;
							$_SESSION['firstname'] 	= $firstname;
							$_SESSION['lastname'] 	= $lastname;
							$_SESSION['user_role'] 	= 'estate_tenant';
							$_SESSION['phonenumber'] = $phonenumber;
							$_SESSION['department'] = 'tenants';
							setcookie("gksysmtems", base64_encode($_SESSION['email']. password_hash($_SESSION['email'], PASSWORD_DEFAULT)), time()+60*60*24*30, '/');
							setcookie("gksysmtemsAccount", $_SESSION['user_role'], time()+60*60*24*30, '/');
												
							echo "Redirecting you in 1 Second";

						}else{
							echo "Incorrect login credentials";
							exit();
						}
					}else{
						echo "user is not activated";
						exit();
					}
				}
			}else{
				echo 'user not found';
				exit();
			}
		}

	}
?>