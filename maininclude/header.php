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
		
        <title>  Distance Learning Online Course & Education Site</title>
		 
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
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="assets/img/logo222222.png" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li class="active"><a href="index.php">Home<span class="submenu-indicator"></span></a>
								</li>
								
								<li><a href="#">Courses<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="list-with-sidebar.php">List Layout with Sidebar</a></li>
										<li><a href="full-width-course.php">Courses grid</a></li>
										<li><a href="find-instructor.php">Find Instructor</a></li>
										<li><a href="instructor-detail.php">Instructor Detail</a></li>
									</ul>
								</li>
								<li><a href="#">Pages<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="about-us.php">About Us</a></li>
										<!-- <li><a href="blog.php">Blog Style</a></li>
										<li><a href="blog-detail.php">Blog Detail</a></li> -->
										<li><a href="pricing.php">Pricing</a></li>
										<li><a href="privacy.php">Privacy Policy</a></li>
										<li><a href="faq.php">FAQs</a></li>
									</ul>
								</li>
								<li><a href="contact.php">Contact</a></li>
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<?php 
									if(isset($_SESSION['is_login'])){ 
										echo '<li>
											<a href="#">My Profile</a>
										</li>
										<li>
											<a href="logout.php">Logout</a>
										</li>';
									 } else{
										 echo '<li class="login_click light">
										 <a href="#" data-toggle="modal" data-target="#login">Sign in</a>
									 </li>
									 <li class="login_click theme-bg">
										 <a href="#" data-toggle="modal" data-target="#signup">Sign up</a>
									 </li>';

									 }
								?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->