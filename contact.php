<?php 
	require_once("maininclude/header.php");
?>
		
           <!-- ============================ Page Title Start================================== -->
			<section class="page-title">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Contact Us</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Contact</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->	
			
			<!-- ============================ Agency List Start ================================== -->
			<section class="bg-light">
			
				<div class="container">
				
					<!-- row Start -->
					<div class="row">
					
						<div class="col-lg-8 col-md-7">
							<div class="prc_wrap">
								
								<div class="prc_wrap_header">
									<h4 class="property_block_title">Fillup The Form</h4>
								</div>
								<div class="prc_wrap-body">
									<div class="alert alert-success" id="form-message" role="alert" style="display:none">submit success message</div>
									<form action="mailer.php" method="post" id="ajax-contact">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label>Name</label>
													<input type="text" name="contact_name" id="contact_name" class="form-control simple">
												</div>
											</div>
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="contact_email" id="contact_email" class="form-control simple">
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label>Subject</label>
											<input type="text" name="contact_subject" id="contact_subject" class="form-control simple">
										</div>
										
										<div class="form-group">
											<label>Message</label>
											<textarea class="form-control simple" name="contact_message" id="contact_message"></textarea>
										</div>
										
										<div class="form-group">
											<button class="btn btn-theme" id="contact_send_button" type="submit">Submit Request</button>
										</div>
									</form>
								</div>
								
							</div>
											
						</div>
						
						<div class="col-lg-4 col-md-5">
						
							<div class="prc_wrap">
								
								<div class="prc_wrap_header">
									<h4 class="property_block_title">Reach Us</h4>
								</div>
								
								<div class="prc_wrap-body">
									<div class="contact-info">
								
										<h2>Contact Us</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do </p>
										
										<div class="cn-info-detail">
											<div class="cn-info-icon">
												<i class="ti-home"></i>
											</div>
											<div class="cn-info-content">
												<h4 class="cn-info-title">Reach Us</h4>
												# DeFactor- 4/1 Chowdurypara,<br> DIT Road, Malibagh,<br>Dhaka 1219
											</div>
										</div>
										
										<div class="cn-info-detail">
											<div class="cn-info-icon">
												<i class="ti-email"></i>
											</div>
											<div class="cn-info-content">
												<h4 class="cn-info-title">Drop A Mail</h4>
												support@gmail.com<br>farid@gmail.com
											</div>
										</div>
										
										<div class="cn-info-detail">
											<div class="cn-info-icon">
												<i class="ti-mobile"></i>
											</div>
											<div class="cn-info-content">
												<h4 class="cn-info-title">Call Us</h4>
												(88) 01739692387<br>01739692387
											</div>
										</div>
										
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
					<!-- /row -->		
					
				</div>
						
			</section>
			<!-- ============================ Agency List End ================================== -->
			
			<!-- ============================== Start Newsletter ================================== -->
			<section class="newsletter theme-bg inverse-theme">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 col-sm-12">
							<div class="text-center">
								<h2>Join Thousand of Happy Students!</h2>
								<p>Subscribe our newsletter & get latest news and updation!</p>
								<form class="sup-form">
									<input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
									<input type="submit" class="btn btn-theme" value="Get Started">
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ================================= End Newsletter =============================== -->			
<?php require_once("maininclude/footer.php"); ?>