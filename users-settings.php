<?php   
 require_once("maininclude/header.php");

	$database    = new Database();
	$conn        = $database->connection;

	if(isset($_SESSION['is_login'])){
		$user_login = $_SESSION['user_email']; 
		$query = "SELECT * FROM users WHERE email = '$user_login'";
		$result = $conn->query($query);
		$row         = mysqli_fetch_array($result);
		$username       = $row['name'];
		$email       = $row['email'];
		$profile_photo       = $row['user_profile_photo'];
		$users_id       = $row['users_id'];
		$biography    = $row['biography'];
		$social_link     = $row['social_link'];
		$social_array = explode(" ",$social_link);

		$name = isset($_GET['name']) ? $_GET['name'] : '';
		$data_1 = $social_array[0] ?? '';
		$data_2 = $social_array[1] ?? '';
		$data_3 = $social_array[2] ?? '';

	}
?>

			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->	

			
			<!-- ============================ Dashboard: My Order Start ================================== -->
			<section class="gray pt-0">
				<div class="container-fluid">
					
					<!-- Row -->
					<div class="row">
					
						<div class="col-lg-3 col-md-3 p-0">
						<div class="dashboard-navbar">
								<div class="d-user-avater">
									<?php if(!empty($profile_photo)) : ?>
									<img src="assets/img/profile/<?php echo $profile_photo;?>" class="img-fluid avater" alt="">
									<?php else : ?>
									   <img src="assets/img/placeholder.png" class="img-fluid avater" alt="">
									<?php endif;?>
									<?php if(!empty($username)) : ?>
										<h4><?php echo $username;?></h4>
									<?php else : ?>
										<h4>Farid Mia</h4>
									<?php endif;?>
									<?php if(!empty($email)) : ?>
										<span><?php echo $email;?></span>
									<?php else : ?>
										<span>mdfarid7830@gmail.com</span>
									<?php endif;?>
								</div>
								
								<div class="d-navigation">
									<ul id="side-menu">
										<li class="dropdown active">
											<a href="users-settings.php"><i class="ti-settings"></i>Settings<span class="ti-angle-left"></span></a>
											<ul class="nav nav-second-level collapse show" style="">
												
												<li><a href="users-settings.php">Profile</a></li>
												<?php echo "<li><a href='users-settings.php?userid=$users_id&name=account'>Account</a></li>"; ?>
												<?php echo "<li><a href='users-settings.php?userid=$users_id&name=photo'>Photo</a></li>";?>
											</ul>
										</li>
										<li><a href="logout.php"><i class="ti-power-off"></i>Log Out</a></li>
									</ul>
								</div>
							</div>
						</div>	
						
						<div class="col-lg-9 col-md-9 col-sm-12">
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Settings</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Setup Your Detail</h4>
											</div>
										</div>
									<?php
										if(isset($_GET['userid']) && $name == 'account') { ?> 
										<form action="" method="post" id="update_user_account" enctype="multipart/form-data">
											<div class="dashboard_container_body p-4">
												<!-- Social Account info -->
												<div class="form-submit">	
													<div class="submit-section">
														<div class="form-row">
															<div class="form-group col-md-6">
																<label>Email</label>
																<input type="email" name="user_email" class="form-control" value="<?php echo $email;?>">
															</div>
															<div class="form-group col-md-6">
																<label>Current Password</label>
																<input type="password" name="old_pass" class="form-control" value="">
															</div>
															<div class="form-group col-md-6">
																<label>New Password</label>
																<input type="password" name="new_pass" class="form-control" value="">
															</div>
															<div class="form-group col-md-6">
																<label>Re-Type Password</label>
																<input type="password" name="re_pass" class="form-control" value="">
															</div>
															<div class="form-group col-lg-12 col-md-12">
															<input type="hidden" name="userid" value="<?php echo $users_id;?>"/>
															<input type="hidden" name="page" value="changepassword"/>
															<?php echo $database->formtoken();?>
																<button type="submit" class="btn btn-theme" name="changepasswordbtn">Save Changes</button>
															</div>
															
														</div>
													</div>
												</div>
												<!-- / Social Account info -->
											</div>
										</form>
										<?php } else if(isset($_GET['userid']) && $name == 'photo') { 
											?>
										<form action="" method="post" id="update_user_photo" enctype="multipart/form-data">
											<div class="dashboard_container_body p-4">
												<!-- Social Account info -->
												<div class="form-submit">	
													<div class="submit-section">
														<div class="form-row">
															<div class="form-group col-md-12">
																<label>Profile Photo Update</label>
																<input type="file" class="form-control" id="profile_photo" name='user_photo' value=""/>
															</div>
															<div class="form-group col-lg-12 col-md-12">
															<input type="hidden" name="userid" value="<?php echo $users_id;?>"/>
															<input type="hidden" name="page" value="user_photo"/>
															<?php echo $database->formtoken();?>
																<button type="submit" class="btn btn-theme" name="submit">Save Changes</button>
															</div>
															
														</div>
													</div>
												</div>
												<!-- / Social Account info -->
											</div>
										</form>
									<?php }  else { ?>
										<form action="" method="post" id="update_user_profile" enctype="multipart/form-data">
											<div class="dashboard_container_body p-4">
												<!-- Basic info -->
												<div class="submit-section">
													<div class="form-row">
													
														<div class="form-group col-md-6">
															<label>Your Name</label>
															<input type="text" name="user_name" class="form-control" value="<?php echo $username;?>">
														</div>
														
														<div class="form-group col-md-6">
															<label>Email</label>
															<input type="email" readonly name="user_email" class="form-control" value="<?php echo $email;?>">
														</div>
														
														<div class="form-group col-md-12">
															<label>Biography:</label>
															<textarea class="form-control" name="biography"><?php echo $biography;?></textarea>
														</div>
														
													</div>
												</div>
												<!-- Basic info -->
												
												<!-- Social Account info -->
												<div class="form-submit">	
													<h4 class="pl-2 mt-2">Social Accounts</h4>
													<div class="submit-section">
														<div class="form-row">
														
															<div class="form-group col-md-6">
																<label>Facebook</label>
																<input type="text" name="user_facebook" placeholder="https://facebook.com/" class="form-control" value="<?php echo $data_1;?>">
															</div>
															
															<div class="form-group col-md-6">
																<label>Twitter</label>
																<input type="text" name="user_twitter" placeholder="https://twitter.com/" class="form-control" value="<?php echo $data_2;?>">
															</div>
															<div class="form-group col-md-12">
																<label>LinkedIn</label>
																<input type="text" name="user_linkedin" placeholder="https://linkedin.com/" class="form-control" value="<?php echo $data_3;?>">
															</div>
															
															<div class="form-group col-lg-12 col-md-12">
															<input type="hidden" name="userid" value="<?php echo $users_id;?>"/>
															<input type="hidden" name="page" value="user_profile"/>
															<?php echo $database->formtoken();?>
																<button type="submit" class="btn btn-theme" name="submit">Save Changes</button>
															</div>
															
														</div>
													</div>
												</div>
												<!-- / Social Account info -->
											</div>
										</form>
										<?php } ?>
										<div class="form-group">
											<div id="success"></div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							
						</div>
					
					</div>
					<!-- Row -->
					
				</div>
			</section>
			<!-- ============================ Dashboard: My Order Start End ================================== -->
<?php require_once("maininclude/footer.php"); ?>