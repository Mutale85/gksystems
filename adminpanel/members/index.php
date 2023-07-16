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
        <style>
            .profile-card {
                max-width: 400px;
                margin: 0 auto;
                text-align: center;
                padding: 30px;
                background-color: #f9f9f9;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            .profile-card img {
                width: 150px;
                height: 150px;
                object-fit: cover;
                border-radius: 50%;
                margin-bottom: 20px;
                border: 5px solid #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .profile-card h3 {
                font-size: 24px;
                margin-bottom: 10px;
                color: #333;
            }

            .profile-card p {
                color: #666;
                margin-bottom: 5px;
            }

            .profile-card .contact-info {
                margin-bottom: 20px;
            }

            .profile-card .department {
                font-weight: bold;
            }

            .profile-card .job-title {
                font-style: italic;
            }
        </style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <?php 
                                $query = $connect->prepare("SELECT * FROM team_members WHERE phonenumber = ? ");
                                $query->execute([$_SESSION['phonenumber']]);
                                $result = $query->fetch();
                                extract($result);
                            ?>
                            <div class="profile-card">
                                <img src="<?php echo get_gravatar($email)?>" alt="Profile Picture">
                                <h3><?php echo $firstname?> <?php echo $lastname?></h3>
                                <div class="contact-info">
                                    <p class="department"><?php echo ucwords($department)?></p>
                                    <p class="job-title"><?php echo ucwords($job_title)?></p>
                                    <p>Email: <?php echo $email?></p>
                                    <p>Phone: <?php echo $phonenumber?></p>
                                </div>
                            </div>    
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </div>
    <?php include('../addon_footer_content.php')?>
  </div>
  <?php include('../addon_footer.php')?>
</body>
</html>
