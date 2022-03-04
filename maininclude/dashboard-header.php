<?php 
ob_start();
require_once('admin/init.php');
require_once('admin/functions.php');?>
<!DOCTYPE php>
<php lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title>  Design and Development of an Automatic Course Registration Recommender System </title>
		 
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
		
		
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">

		<style type="text/css">
		.panel {
			border: 0;
		}
		form {
			padding: 0 10px;
		}
		.addon-diff-color {
	      background-color: #f0ad4e;
	      color: white;
	    }
	   .panel-title {
	   		color: #f0ad4e;
	   		font-weight: bolder;
	    }
	    .sign-up, .forgot-pass{
			display: none;
		}
	   

		.alert-danger.custom-login {
			width: 96%;
			padding: 10px;
			margin-bottom: 25px;
			margin-left: 10px;
		}

		img.img-footer {
			max-width: 150px;
			margin-bottom: 2rem;
			display: none;
		}

		span#statusMsg1,span#statusMsg2,span#statusMsg3,span#statusMsg4 {
			margin-bottom: 10px;
			display: block;
		}

		span#statusLogMsg {
			margin-top: 20px;
			display: block;
		}

		div#statusLogMsg {
			margin-top: 15px;
		}

		.menu-img-placeholder img {
			height: 45px;
			width: 45px;
			text-align: center;
			line-height: 45px;
			display: inline-block;
			border-radius: 50%;
			color: #686f7a;
			border: 1px solid transparent;
			margin:-10px 0;
			font-size: 18px;
		}

		.profile-submenu-indicator > a .submenu-indicator{
			display: none;
		}

		.notification-count{
			position: relative;
		}

		.notification-count span {
			position: absolute;
			left: 98px;
			top: 0px;
			background: #54b963;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			color: white;
			text-align: center;
			line-height: 28px;
		}


	</style>
		
    </head>
	
    <body class="red-skin">
	
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader"><div class="preloader"><span></span><span></span></div></div>
		
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<div class="header header-light">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<?php 
								if(isset($_SESSION['is_login'])){ 
									$user_login 	= $_SESSION['user_email']; 
									$query 			= "SELECT * FROM users WHERE email = '$user_login'";
									$result 		= $conn->query($query);
									$row         	= mysqli_fetch_array($result);
									$profile_photo  = $row['user_profile_photo'];
									
									?>
							<ul class="nav-menu align-to-right ">
								<li><a href="add-listing-course.php?username=instructor">Instructor</a></li>
								<li class="profile-submenu-indicator">
									<a href="javascript::" class="menu-img-placeholder">
									<?php if(!empty($profile_photo)) : ?>
									<img src="assets/img/profile/<?php echo $profile_photo;?>" class="img-fluid avater" alt="">
									<?php else : ?>
									   <img src="assets/img/placeholder.png" class="img-fluid avater" alt="">
									<?php endif;?>
											</a>
									<ul class="nav-dropdown nav-submenu" style="right: auto; display: none;">
										<li><a href="#">User Dashboard<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a>
											<?php 
													echo '<li>
														<a href="users-settings.php">User Profile</a>
													</li>
													<li>
														<a href="logout.php">Logout</a>
													</li>';
												
											?>
											
										</li>
									</ul>
								</li>
							</ul>
							<?php } else { ?>
							<ul class="nav-menu nav-menu-social align-to-right">
								
								<?php 
									echo '<li class="login_click light">
									<a href="#" data-toggle="modal" data-target="#login">Sign in</a>
								</li>
								<li class="login_click theme-bg">
									<a href="#" data-toggle="modal" data-target="#signup">Sign up</a>
								</li>';
								?>
							</ul>
							<?php } ?>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->