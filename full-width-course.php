<?php   
  require_once("maininclude/header.php");
?>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->

			<!-- ============================ Page Title Start================================== -->
			<section class="page-title">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Full Width Courses</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Find Courses</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->			

			
			<!-- ============================ Full Width Courses  ================================== -->
			<section class="pt-0">
				<div class="container">
					<!-- Row -->
					<div class="row">	
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="row">

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
								<!-- Cource Grid 1 -->
								<div class="col-lg-4 col-md-6">
									<div class="education_block_grid">
										
										<div class="education_block_thumb">
											<a href='detail.php?courseid=<?php echo $course_id;?>'><img src='assets/img/course/<?php echo $course_img;?>' class='img-fluid' alt=''></a>
											<div class="cources_price">$<?php echo $course_sell_price;?></div>
										</div>
										
										<div class="education_block_body">
											<h4 class="bl-title"><a href="detail.php?courseid=<?php echo $course_id;?>"><?php echo $course_title;?></a></h4>
											<p><?php echo $course_desc;?></p>
										</div>
										
										<div class="education_block_footer">
											<div class="education_block_author">
												<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a></div>
												<h5><a href="instructor-detail.html">Daksh Preet</a></h5>
											</div>
											<span class="education_block_time"><i class="ti-time mr-1"></i><?php echo $course_duration;?></span>
										</div>
										
									</div>	
								</div>

							<?php } ?>
								
							</div>
							
						</div>
					
					</div>
					<!-- Row -->
					
				</div>
			</section>
			<!-- ============================ Full Width Courses End ================================== -->
			
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