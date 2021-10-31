<?php   
 require_once("maininclude/header.php");


			$database    = new Database();
			$conn        = $database->connection;
			$data        = array('phone','email','facebook','twitter','linkedin','instagram','logo','address','copyright','banner_title','banner_desc','banner_img');
			$query       = $database->getData("setting",$data);
			$numrows     = $database->numRows($query);
			$row         = mysqli_fetch_array($query);
			$phone       = $row['phone']; 
			$email       = $row['email'];
			$facebook    = $row['facebook'];
			$twitter     = $row['twitter'];
			$linkedin    = $row['linkedin'];
			$instagram   = $row['instagram'];
			$address     = $row['address'];
			$logo        = $row['logo'];
			$copyright   = $row['copyright'];
			$banner_desc = $row['banner_desc'];
			$banner_title= $row['banner_title'];
			$banner_img  = $row['banner_img'];
                             
?>

			
			<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero_banner hero-inner-2 shadow rlt" style="background:url(assets/img/banner-2.jpg) no-repeat;" data-overlay="7">
				<div class="elix_img_box">
					<!-- <img src="assets/img/preet-o.png" class="img-fluid" alt="" /> -->
				</div>
				<div class="container">
					
					<div class="hero-caption small_wd mb-5">
						<h1 class="big-header-capt cl_2 mb-0"><?php echo $banner_title;?></h1>
						<p><?php echo $banner_desc;?></p>
					</div>
					<!-- Type -->
					<form action="list-with-sidebar.php" method="post" >
					<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="banner-search shadow_high">
								<div class="search_hero_wrapping">
									<div class="row">
									
										<div class="col-lg-10 col-md-10 col-sm-12 br-right">
											<div class="form-group">
												<div class="input-with-icon">
													<input id="search" name="search_course" type="search" class="form-control" placeholder="Keyword" />
													<img src="assets/img/search.svg" class="search-icon" alt="" />
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-3 col-sm-12 pl-0">
											<div class="form-group none">
												<input type="submit" name="search_btn" value="Search" class="btn search-btn full-width"/>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					</form>
					<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12">
							<div class="list-group" id="show-list">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->
			
			<!-- ============================ Trips Facts Start ================================== -->
			<section class="p-0 trips_top">
				<div class="container">
					<div class="trips_wrap">
						<div class="row m-0">
						
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="trips">
									<div class="trips_icons">
										<i class="ti-video-camera"></i>
									</div>
									<div class="trips_detail">
										<h4>100,000 online courses</h4>
										<p>Nor again is there anyone who loves or pursues or desires</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="trips">
									<div class="trips_icons">
										<i class="ti-medall"></i>
									</div>
									<div class="trips_detail">
										<h4>Expert instruction</h4>
										<p>Nam libero tempore, cum soluta and nobis est eligendi optio</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="trips none">
									<div class="trips_icons">
										<i class="ti-infinite"></i>
									</div>
									<div class="trips_detail">
										<h4>Lifetime access</h4>
										<p>These cases are perfectly simple and easy to distinguish</p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Trips Facts Start ================================== -->
			
			<!-- ============================ Featured Courcses Start ================================== -->
			<section>
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 p-0">

							<div class="arrow_slide three_slide arrow_middle">

							<?php

							 	$data        = array('course_img','course_sell_price','course_title','course_id','course_desc','course_duration');
							    $query       = $database->getData("courses",$data);
							    $row         = mysqli_fetch_array($query);
							    while($row = mysqli_fetch_array($query)){

							    	$course_id       = (int) $row['course_id'];
							    	$course_title    = $row['course_title'];
							    	$course_desc     = $row['course_desc'];
							    	$course_duration = $row['course_duration'];    
							    	$course_img      = $row['course_img'];    
							    	$course_sell_price      = $row['course_sell_price'];    

								?>
			
								<!-- Single Slide -->
								<div class="singles_items">
									<div class="education_block_grid style_2">
										<div class="education_block_thumb n-shadow">
										<a href='detail.php?courseid=<?php echo $course_id;?>'><img src='assets/img/course/<?php echo $course_img;?>' class='img-fluid' alt=''></a>
											<div class="cources_price">$<?php echo $course_sell_price;?></div>
										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="detail.php?courseid=<?php echo $course_id;?>"><?php echo $course_title;?></a></h4>
											
										</div>
										<div class="education_block_footer">
											<div class="education_block_author">
												<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a></div>
												<h5><a href="instructor-detail.html">Robert Wilson</a></h5>
											</div>
										</div>
									</div>	
								</div>

								<?php } ?>

							
							</div>
						</div>

					</div>
					
				</div>
			</section>
			<!-- ============================ Featured Courcses End ================================== -->
			
			<!-- ============================ Featured Category Start ================================== -->
			<section class="bg-light">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-12 mb-3">
							<div class="sec-heading2">
								<div class="sec-left">
									<h3>Got & Popular Categories</h3>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 p-0">

							<div class="arrow_slide three_slide-dots arrow_middle">

							<?php

							 	$data        = array('course_img','course_sell_price','course_title','course_id','course_desc','course_duration');
							    $query       = $database->getData("courses",$data);
							    $row         = mysqli_fetch_array($query);
							    while($row = mysqli_fetch_array($query)){

							    	$course_id       = (int) $row['course_id'];
							    	$course_title    = $row['course_title'];
							    	$course_desc     = $row['course_desc'];
							    	$course_duration = $row['course_duration'];    
							    	$course_img      = $row['course_img'];    
							    	$course_sell_price      = $row['course_sell_price'];    

								?>
								
								<!-- Single Slide -->
								<div class="singles_items">
									<div class="edu_cat">
										<div class="pic">
											<a class="pic-main" href="#" style="background-image:url(assets/img/course/<?php echo $course_img;?>);"></a>
										</div>
										<div class="edu_data">
											<h4 class="title"><a href="detail.php?courseid=<?php echo $course_id;?>"><?php echo $course_title;?></a></h4>
											<ul class="meta">
												<li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
												<li class="lessions"><i class="ti-book"></i>54 Lessions</li>
											</ul>
										</div>
									</div>	
								</div>
								
								<?php } ?>
								
							
							</div>
						</div>

					</div>
					
				</div>
			</section>
			<!-- ============================ Featured Category End ================================== -->
			
			<!-- ========================== Articles Section =============================== -->
			<section>
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading-flex">
								<h2 class="pl-2">Blog Post</h2>
							</div>
						</div>
					</div>
					
					<div class="row">
								
						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/course-b-2.jpg" class="img-fluid" alt="" /></a>
								</div>
								
								<div class="articles_grid_caption">
									<h4>The National Minimum wage is an important part</h4>
									<div class="articles_grid_author">
										<div class="articles_grid_author_img"><img src="assets/img/user-1.jpg" class="img-fluid" alt="" /></div>
										<h4>admin</h4>
									</div>
								</div>
							</div>
						</div>
						
						
						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-3.jpg" class="img-fluid" alt="" /></a>
								</div>
								
								<div class="articles_grid_caption">
									<h4>The National Minimum wage is an important part</h4>
									<div class="articles_grid_author">
										<div class="articles_grid_author_img"><img src="assets/img/user-1.jpg" class="img-fluid" alt="" /></div>
										<h4>admin</h4>
									</div>
								</div>
							</div>
						</div>
						<!-- Single Article -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="articles_grid_style">
								<div class="articles_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/course-b-2.jpg" class="img-fluid" alt="" /></a>
								</div>
								
								<div class="articles_grid_caption">
									<h4>The National Minimum wage is an important part</h4>
									<div class="articles_grid_author">
										<div class="articles_grid_author_img"><img src="assets/img/user-1.jpg" class="img-fluid" alt="" /></div>
										<h4>admin</h4>
									</div>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</section>
			<!-- ========================== Articles Section =============================== -->
						
			<!-- ============================== Start Newsletter ================================== -->
			<section class="bg-cover newsletter inverse-theme" style="background:url(assets/img/banner-2.jpg);" data-overlay="9">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 col-sm-12">
							<div class="text-center">
								<h2>Join Thousand of Happy Students!</h2>
								<p>Subscribe our newsletter & get latest news and updation!</p>
								<?php 

									$user_email = "";
									if(isset($_POST['subscription'])){

										$user_email = $_POST['sub_email'];

										if(filter_var($user_email,FILTER_VALIDATE_EMAIL)){
											$subject = "Thanks for subscribing us.";
											$message = "Thanks for subscribing to our blog. You'll always recive latest updates form us. And we won't share or sell you.";

											$sender = "From: faridcse7800@gmail.com" . "\r\n";

											if(mail($user_email,$subject,$message,$sender)){ ?>
												<div class="alert alert-success"> Thanks for your subscribing us.</div>
											<?php } else { ?>
												<div class="alert alert-danger"> Failed while sending your email</div>
											<?php }
										}else { ?>
											<div class="alert alert-danger"> <?php echo "$sub_email - Invalid Email";?></div>
										<?php }
									}
								?>
								<form class="sup-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
									<input type="email" class="form-control sigmup-me" name="sub_email" placeholder="Your Email Address" value="<?php echo $user_email;?>" required="required">
									<input type="submit" class="btn btn-theme" name="subscription" value="Get Started">
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ================================= End Newsletter =============================== -->
			<?php require_once("maininclude/footer.php"); ?>