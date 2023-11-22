<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Rent</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./assets/css/style.css?v=<?php echo time(); ?>">
    <style>
      .navbar{
        height: 30px;
      }
    </style>

</head>
<body>
<div class="header">
			
			<!-- Logo -->
			<div class="header-left">
				<a href="dashboard.php" class="logo">
					<img src="../images/logo34.png" alt="Logo">Smart Rent
				</a>
				<a href="dashboard.php" class="logo logo-small">
					<img src="../images/logo34.png" alt="Logo" width="30" height="30">
				</a>
			</div>
			<!-- /Logo -->
			
			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>
			

			
			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->
			
			<!-- Header Right Menu -->
			<ul class="nav user-menu">

				
				<!-- User Menu -->
				<!-- <h4 style="color:white;margin-top:13px;text-transform:capitalize;"><?php echo $_SESSION['fullname'];?></h4> -->
				<li class="nav-item dropdown app-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt="Ryan Taylor"></span>
					</a>
					
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6><?php echo $_SESSION['fullname'];?></h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile.php">Profile</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</li>

				<!-- /User Menu -->
				
			</ul>
			<!-- /Header Right Menu -->
			
		</div>
		
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							
							<!-- <li class="menu-title"> 
								<span>Authentication</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="index.php"> Login </a></li>
									<li><a href="register.php"> Register </a></li>
									
								</ul>
							</li> -->
							<li class="menu-title"> 
								<span>All Users</span>
							</li>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> All Users </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="adminlist.php"> Admin </a></li>
									<li><a href="userlist.php"> Users </a></li>
									
									
								</ul>
							</li>
              <li class="menu-title"> 
								<span>Renters</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-map"></i> <span> Renters</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									
									<li><a href="rentersview.php"> View Renters </a></li>
									
								</ul>
							</li>

							
						
							
							
							
							<li class="menu-title"> 
								<span>Query</span>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-comment"></i> <span>Feedback </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									
									<li><a href="feedbackview.php"> Feedback </a></li>
								</ul>
							</li>
							
							
						</ul>
					</div>
                </div>
            </div>