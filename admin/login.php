<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title>Distance Learning - Online Course & Education Site</title>
		 
        <!-- Custom CSS -->
        <link href="src/assets/css/styles.css" rel="stylesheet">
		
		<!-- Custom Color Option -->
		<link href="src/assets/css/colors.css" rel="stylesheet">
		
    </head>
	
    <body class="red-skin gray">
	
		
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->	
			
			<!-- ========================== Login Section =============================== -->
			<section>
				<div class="container">
					
					<div class="row justify-content-center">
						
						<div class="col-lg-6 col-md-9 col-sm-12">
							<div class="log_wrap">
								<h4>Sign In</h4>		
								<div class="login-form">
								<?php
									require_once('init.php');
									include 'functions.php';
									$login = new login();
									if($login->islogin() === true){
										header('location:index.php');
										exit();
									}

										if(isset($_POST['submit']) && $_POST['submit'] == 'Login'){
									
										$user = escape($_POST['username']);
										$pass  = escape($_POST['password']);
										$hashpass = hash('sha256',$pass);
										$errors = array();
										if(isset($user,$pass)){
											if(empty($email) && empty($pass)){
												$errors[] = 'All field are required';
											}
											else
											{
												if(empty($user)){
													$errors[] = 'Email is required';

												}
												if(empty($pass)){
													$errors[] = 'password is required';

												}
												if(!empty($user) && !empty($pass)){
												
													if(!$login->logindata($user,$hashpass)){
														$errors[] = "Invalid username and/or password";
													}
												}
											}
											if(!empty($errors)){
												foreach($errors as $error){
													echo $error;
													echo "<br/>";
												}
											}
											else
											{
												echo "<div class='alert alert-success'>";
												echo 'Successfully Logged';
												$_SESSION['username'] = $user;   
												$_SESSION['unique_user_id'] = uniqid();   
												header("Refresh:3; url=index.php");
												exit();            
												echo '</div>';
											}

										}
									}
                                    ?>
									<form action="" method="post" <?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>>
										<div class="form-group">
											<label>User Name</label>
											<input type="text" class="form-control" id="username" placeholder="username" name="username">
										</div>
										
										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" id="password" placeholder="Password" name="password">
										</div>
										
										<div class="social-login mb-3">
											<ul>
												<li>
													<input id="reg" class="checkbox-custom" name="reg" type="checkbox">
													<label for="reg" class="checkbox-custom-label">Save Password</label>
												</li>
												<li class="right"><a href="#" class="theme-cl">Forget Password?</a></li>
											</ul>
										</div>
										
										<div class="form-group">
											<button type="submit" name="submit" value="Login" class="btn btn-md full-width pop-login">Login</button>
										</div>
									
									</form>
								</div>
							</div>
						</div>

					</div>
					
				</div>
			</section>
			<!-- ========================== Login Section =============================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="src/assets/js/jquery.min.js"></script>
		<script src="src/assets/js/popper.min.js"></script>
		<script src="src/assets/js/bootstrap.min.js"></script>
		<script src="src/assets/js/select2.min.js"></script>
		<script src="src/assets/js/slick.js"></script>
		<script src="src/assets/js/jquery.counterup.min.js"></script>
		<script src="src/assets/js/counterup.min.js"></script>
		<script src="src/assets/js/custom.js"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
</html>