<?php 
ob_start();
require_once('admin/init.php');
require_once('admin/functions.php');?>
<!DOCTYPE >
<php lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title>  Design and Development of an Automatic Course Registration Recommender System </title>
		<link href="assets/css/course-video.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/styles.css" rel="stylesheet">
       
		<link rel="stylesheet" href="./src/ALightBox.css">
		
		<!-- Custom Color Option -->
		<link href="assets/css/colors.css" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

		<style media="screen">
			.t img {
				width: 200px;
				height: auto;
			}
		</style>

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

		.progress-label-left
		{
			float: left;
			margin-right: 0.5em;
			line-height: 1em;
		}
		.progress-label-right
		{
			float: right;
			margin-left: 0.3em;
			line-height: 1em;
		}
		.star-light
		{
			color:#e9ecef;
		}

		.video-tab .nav-tabs {
			height: 700px;
		}


	</style>
	<style type="text/css">

        .heading{
            color:#444;
            font-size:40px;
            text-align:center;
            padding:10px;
        }

        .container-video{
            display:grid;
            grid-template-columns:2fr 1fr;
            gap:15px;
            align-items: flex-start;
            padding:30px 2%;
        }

        .container-video .main-video video{
           width:100%;
           border-radius:5px ;
        }

        .container-video .main-video .title {
			color: #fff;
			font-size: 23px;
			padding: 20px;
		}

        .container-video .video-list{
            background:#fff;
            border-radius:5px;
            height:520px;
            height:520px;
            overflow-y:scroll;
			color:#fff;
        }

		.container-video .video-list .card{
			margin-bottom:8px;
		} 
		.container-video .video-list .card-header{
			background:#FFFFFF;
		} 

		

		.container-video .video-list a{
			color:#000!important;
		}

        .container-video .video-list::-webkit-scrollbar{
            width:7px;
        }

        .container-video .video-list::-webkit-scrollbar-track{
           background:#ccc;
           border-radius:50px;
        }

        .container-video .video-list::-webkit-scrollbar-thumb{
           background:#666;
           border-radius:50px;
        }

        .container-video .video-list .vid video{
            width:100px;
            border-radius:5px;
			display:none;
        }

        .container-video .video-list .vid{
            padding: 17px 15px;
			background: #f1f4fb;
			color: #24394e;
			border-bottom: 1px solid #e5e8ef;
			position: relative;
			width: 100%;
			display: flex;
			align-items: center;
			font-weight: 600;
			cursor: pointer;
        }

        .container-video .video-list .vid:hover{
            background:#eee;
        }

        .container-video .video-list .vid.active{
            background: #F7F8F9;
        }

        .container-video .video-list .vid.active .title{
           color:#000;
        }

        .container-video .video-list .vid .title {
			color: #24394e;
			font-size: 15px;
			font-weight: 500;
		}

		.about-image img{
			width:450px;
			height:450px;
			border-radius: 100%;
		}

		.packages_price .pr-value {
			text-decoration: line-through;
		}

        @media (max-width:991px){
            .container-video{
                grid-template-columns: 2fr 1fr;
                padding:10px;
            }
        } 

        @media (max-width:768px){
            .container-video{
                grid-template-columns:1fr;
                padding:10px;
            }
        } 

		#alb_overlay {
			top: 102px;
			position: relative;
			width: 951px;
			height: 509px;
		}

		.nav-tabs li h3{
			font-size: 14px;
		}

		.video-tab .nav-tabs{
			height: 600px;
		}


		ul.course-video-list li:before {
			content: "";
			display: none!important;
		}

		ul.course-video-list li a{
			width: 100%;
			position: relative;
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-between;
			background: #fff;
			margin-bottom: 5px;
			font-size: 16px;
			font-weight: 600;
		}

		#course_lesson {
			margin-top: 10px;
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
				<?php 
					$database     = new Database();
					$conn         = $database->connection;
					$data         = array('logo');
					$query        = $database->getData("setting", $data);
					$numrows      = $database->numRows($query);
					$row          = mysqli_fetch_array($query);
					
					$logo         = $row['logo'];
				?>
						<div class="nav-header">
							<a class="nav-brand" href="http://localhost/education_learning">
								<img src="admin/images/logo/<?php echo $logo;?>" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li class="active"><a href="index.php">Home<span class="submenu-indicator"></span></a>
								</li>
								
								<li><a href="#">Courses<span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="list-with-sidebar.php">Courses with Sidebar</a></li>
										<li><a href="full-width-course.php">Courses grid</a></li>
										<li><a href="http://localhost/education_learning/detail.php?courseid=23">Courses Details</a></li>
										<li><a href="find-instructor.php">All Instructor</a></li>
										<li><a href="http://localhost/education_learning/instructor-detail.php?usersid=1">Instructor Detail</a></li>
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
							<?php 
								if(isset($_SESSION['is_login'])){ 
									$user_login = $_SESSION['user_email']; 
									$query = "SELECT * FROM users WHERE email = '$user_login'";
									$result = $conn->query($query);
									$row         = mysqli_fetch_array($result);
									$profile_photo       = $row['user_profile_photo'];
									
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
										<li class=""><a href="#">User Dashboard<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a>
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