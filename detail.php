<?php 

 	require_once("maininclude/header.php");
	if(isset($_GET['courseid'])) {

 		$courseid = (int) $_GET['courseid'];
		$query =  mysqli_query($conn, "SELECT courses.*, categories.* FROM courses LEFT JOIN categories ON categories.cat_id = courses.course_id WHERE courses.course_id = $courseid");
		// $data           = array('p_images', 'p_name', 'p_price', 'p_id', 'p_description', 'p_web_id', 'p_qnt', 'p_availability', 'p_condition', 'b_id');

		// $query          = $database->getData("products", $data, 'p_id', '=', $p_id);
		$fetch 			= mysqli_fetch_array($query);

		$course_id      			= (int) $fetch['course_id'];
		$course_title 				= $fetch['course_title'];
		$course_original_price 		= $fetch['course_original_price'];
		$course_overview_provider 	= $fetch['course_overview_provider'];
		$course_tag 				= $fetch['course_tag'];
		$video_url 					= $fetch['video_url'];
		$course_desc 				= $fetch['course_desc'];
		$outcomes 					= $fetch['outcomes'];
		$course_duration 			= $fetch['course_duration'];
		$course_sell_price 			= $fetch['course_sell_price'];
		$course_img 				= $fetch['course_img'];
		$long_desc 					= $fetch['long_desc'];
		$level 						= $fetch['level'];
		$is_free_course 		    = $fetch['is_free_course'];
		$is_top_course 				= $fetch['is_top_course'];
		$requirement 				= $fetch['requirement'];
		$course_features 			= $fetch['course_features'];
		$category_id 				= $fetch['category_id'];
		$sub_category_id 			= $fetch['sub_category_id'];
		$added 						= $fetch['added'];
		$cat_name 					= $fetch['cat_name'];
		
		

?>				
			<!-- ============================ Page Title Start================================== -->
			<div class="ed_detail_head">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-4 col-md-5">
							
							<div class="property_video">
								<div class="thumb">
									<img class="pro_img img-fluid w100" src="assets/img/course/<?php echo $course_img;?>" class="img-fluid avater" alt="">
									<div class="overlay_icon">
										<div class="bb-video-box">
											<div class="bb-video-box-inner">
												<div class="bb-video-box-innerup">
													<a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="col-lg-8 col-md-7">
							<div class="ed_detail_wrap">
								<ul class="cources_facts_list">
									<li class="facts-1"><?php echo ucfirst($cat_name);?></li>
								</ul>
								<div class="ed_header_caption">
									<h2 class="ed_title"><?php echo $course_title;?></h2>
									<ul>
										<li><i class="ti-calendar"></i>10 - 20 weeks</li>
										
										<li><i class="ti-user"></i>502 Student Enrolled</li>
									</ul>
								</div>
								<div class="ed_header_short">
									<p><?php echo $course_desc;?></p>
								</div>
								
								<div class="ed_rate_info">
									<div class="star_info">
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star filled"></i>
										<i class="fas fa-star"></i>
									</div>
									<div class="review_counter">
										<strong class="high">4.7</strong>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ============================ Page Title End ================================== -->
			
			<!-- ============================ Course Detail ================================== -->
			<section class="bg-light">
				<div class="container">
					<div class="row">
					
						<div class="col-lg-8 col-md-8">
							
							<!-- Overview -->
							<div class="edu_wraper">
								<h4 class="edu_title">Course Overview</h4>
								<?php echo $long_desc;?>
								<h6>Requirements</h6>
								<ul class="lists-3">
									<?php echo $requirement;?>
								</ul>
							</div>
							
							<div class="edu_wraper">
								<h4 class="edu_title">Course Circullum</h4>
								<div id="accordionExample" class="accordion shadow circullum">

								<?php 
							
									$query = "SELECT * FROM section ORDER BY section_id ASC";
									
									$exc_query = mysqli_query($conn,$query);

									$i = 1;
									while($row = mysqli_fetch_array($exc_query)){ 
										$active = '';
										$aria_exp = 'false';
										if($i == 1) {
											$active = 'show';
											$aria_exp = 'true';
										}

										$section_id = $row['section_id'];

										$section_title = $row['section_title'];
										?>
									<!-- Part 1 -->
									<div class="card">
									  <div id="headingOne<?php echo $i;?>" class="card-header bg-white shadow-sm border-0">
										<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne<?php echo $i;?>" aria-expanded="<?php echo $aria_exp;?>" aria-controls="collapseOne<?php echo $i;?>" class="d-block position-relative text-dark collapsible-link py-2"><?php echo $section_title;?></a></h6>
									  </div>
									  <div id="collapseOne<?php echo $i;?>" aria-labelledby="headingOne<?php echo $i;?>" data-parent="#accordionExample" class="collapse <?php echo $active;?>">
										<div class="card-body pl-3 pr-3">
											<?php 
												$sqllesson = "SELECT lesson.lesson_id ,lesson.lesson_title,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
												FROM lesson
												INNER JOIN section ON lesson.section_id = section.section_id";

												$sec_query = mysqli_query($conn,$sqllesson);

												// echo "<pre>";
												// print_r($sec_query);
												// echo "</pre>";
											?>
											<ul class="lectures_lists">
												<?php
												$count = 1;
												while($row2 = mysqli_fetch_array($sec_query)){ 
													$section_iddb = $row2['section_id'];
													$active = '';
													$aria_exp = 'false';
													if($i == 1) {
														$active = 'show';
														$aria_exp = 'true';
													}
			
													$lesson_title = $row2['lesson_title'];
													if($section_id  == $section_iddb ) {
													?>
												<li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: <?php echo $count;?></div><?php echo $lesson_title;?></li>
												<?php } $count++;}?>
											</ul>
										</div>
									  </div>
									</div>

									<?php $i++;} ?>

								</div>
							</div>
							
							<!-- Reviews -->
							<div class="rating-overview">
								<div class="rating-overview-box">
									<span class="rating-overview-box-total">4.2</span>
									<span class="rating-overview-box-percent">out of 5.0</span>
									<div class="star-rating" data-rating="5"><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
									</div>
								</div>

								<div class="rating-bars">
									<div class="rating-bars-item">
										<span class="rating-bars-name">5 Star</span>
										<span class="rating-bars-inner">
											<span class="rating-bars-rating high" data-rating="4.7">
												<span class="rating-bars-rating-inner" style="width: 85%;"></span>
											</span>
											<strong>85%</strong>
										</span>
									</div>
									<div class="rating-bars-item">
										<span class="rating-bars-name">4 Star</span>
										<span class="rating-bars-inner">
											<span class="rating-bars-rating good" data-rating="5">
												<span class="rating-bars-rating-inner" style="width: 75%;"></span>
											</span>
											<strong>75%</strong>
										</span>
									</div>
									<div class="rating-bars-item">
										<span class="rating-bars-name">3 Star</span>
										<span class="rating-bars-inner">
											<span class="rating-bars-rating mid" data-rating="3.2">
												<span class="rating-bars-rating-inner" style="width: 52.2%;"></span>
											</span>
											<strong>53%</strong>
										</span>
									</div>
									<div class="rating-bars-item">
										<span class="rating-bars-name">1 Star</span>
										<span class="rating-bars-inner">
											<span class="rating-bars-rating poor" data-rating="2.0">
												<span class="rating-bars-rating-inner" style="width:20%;"></span>
											</span>
											<strong>20%</strong>
										</span>
									</div>
								</div>
							</div>
							
							<!-- Reviews -->
							<div class="list-single-main-item fl-wrap">
								<div class="list-single-main-item-title fl-wrap">
									<?php 
									// $data           = array('rating', 'course_id', 'r_name', 'email', 'message', 'added', );
									// $query          = $database->getData("reviews", $data, 'course_id', '=', $course_id ); 

									$sql_two = "SELECT users.users_id,users.user_profile_photo, reviews.r_id,reviews.rating,reviews.users_id,reviews.course_id,reviews.r_name,reviews.email,reviews.message,reviews.added
									FROM reviews
									INNER JOIN users ON reviews.users_id = users.users_id WHERE course_id = $course_id";

									$result_2 = $conn->query($sql_two);

									$total_review = mysqli_num_rows($result_2);  
									
									?>
									<h3>Item Reviews -  <span> <?php echo $total_review;?> </span></h3>
								</div>
								<div class="reviews-comments-wrap">
									
									<!-- reviews-comments-item -->  
									<?php

									
									while ( $fetch      = mysqli_fetch_array($result_2)) {
										$profile_photo = $fetch['user_profile_photo'];
										
										$rating 		= $fetch['rating'];
										$name 			= $fetch['r_name'];
										$email 			= $fetch['email'];
										$message 		= $fetch['message'];
										$added 			= $fetch['added'];
										
										?>
									<div class="reviews-comments-item">
										<div class="review-comments-avatar">
										<?php if(!empty($profile_photo)) : ?>
											<img src="assets/img/profile/<?php echo $profile_photo;?>" class="img-fluid avater" alt="">
											<?php else : ?>
											<img src="assets/img/placeholder.png" class="img-fluid avater" alt="">
										<?php endif;?>
										</div>
										<div class="reviews-comments-item-text">
											<h4><a href="#"><?php echo $name;?></a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i><?php echo $added;?></span></h4>
											
											<div class="listing-rating mid" data-starrating2="5">
											<?php
									
												for ($i=1; $i <= $rating; $i++) { 
													echo '<i class="ti-star active"></i>';
												}

												$sum_total[] = $rating;
												
												$total = array_sum($sum_total);
											    $avg = $total/count($sum_total);

												$substr = substr($avg,0,4);

												?> 
												<span class="review-count"><?php echo $substr;?></span> 
											</div>
											<div class="clearfix"></div>
											<p><?php echo $message;?></p>
										</div>
									</div>
									<?php
									}
								?>
									<!--reviews-comments-item end-->
									
									
								</div>
							</div>
							<?php 
								if(isset($_SESSION['is_login'])){ 
									$user_login = $_SESSION['user_email']; 
									$query = "SELECT * FROM users WHERE email = '$user_login'";
									$result = $conn->query($query);
									$row         = mysqli_fetch_array($result);
									$users_id    = $row['users_id'];

									
									?>
							<!-- Submit Reviews -->
							<div class="edu_wraper">
								<h4 class="edu_title">Submit Reviews</h4>
								<div class="review-form-box form-submit">
									<form action="" method="post" id="do_review">
										<div class="row">
											
											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label>Name</label>
													<input class="form-control" name="name" type="text" placeholder="Your Name">
												</div>
											</div>
											
											<div class="col-lg-6 col-md-6 col-sm-12">
												<div class="form-group">
													<label>Email</label>
													<input class="form-control" name="email" type="email" placeholder="Your Email">
												</div>
											</div>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label>Review</label>
													<textarea name="message" class="form-control ht-140" placeholder="Review"></textarea>
												</div>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<label>Rating:</label>
													<select name="rating" class="form-control">
														<option value="">--Select--</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>
											
											<div class="col-lg-12 col-md-12 col-sm-12">
												<div class="form-group">
													<input type="hidden" name="course_id" value="<?php  echo $course_id; ?>">
													<input type="hidden" name="users_id" value="<?php  echo $users_id; ?>">
													<button type="submit" class="btn btn-theme">Submit Review</button>
												</div>
											</div>
											<div id="message"></div>
											
										</div>
									</form>
								</div>
							</div>

							<?php } else { ?>
							<h3>You must be logged in to course a review.</h3>
							<?php } ?>
						</div>
						
						<!-- Sidebar -->
						<div class="col-lg-4 col-md-4">
						
							<div class="ed_view_box style_2">
							
								<div class="ed_author">
									<div class="ed_author_thumb">
										<img class="img-fluid" src="assets/img/user-5.jpg" alt="7.jpg">
									</div>
									<div class="ed_author_box">
										<h4>Michael Russell</h4>
										<span>Web Designer in Canada</span>
									</div>
								</div>
								
								<div class="ed_view_price pl-4">
									<span>Acctual Price</span>
									<h2 class="theme-cl">
										<?php 
											if($is_free_course){
												echo "Free";
											}else{
												echo $course_original_price;
											}
										?>
									</h2>
								</div>
								<div class="ed_view_features pl-4">
									<span>Course Features</span>
									<ul>
										<?php echo $course_features;?>
									</ul>
								</div>
								<div class="ed_view_link">
									<a href="#" class="btn btn-theme enroll-btn btn-buy-now" onclick="handleEnrolledButton()">Get Enrolled<i class="ti-angle-right"></i></a>
								</div>
								
							</div>
							
							<?php 
								$sqllesson = "SELECT lesson.lesson_id ,lesson.lesson_title,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
								FROM lesson
								INNER JOIN section ON lesson.section_id = section.section_id";

								$sec_query = mysqli_query($conn,$sqllesson); 

								$fetch = mysqli_fetch_array($sec_query);

								echo "<pre>";
								print_r($fetch);
								echo "</pre>";
							?>
							
							<div class="edu_wraper">
								<h4 class="edu_title">Course Features</h4>
								<ul class="edu_list right">
									<li><i class="ti-user"></i>Student Enrolled:<strong>1740</strong></li>
									<li><i class="ti-files"></i>lectures:<strong>10</strong></li>
									<li><i class="ti-time"></i>Duration:<strong><?php echo $course_duration;?></strong></li>
									<li><i class="ti-tag"></i>Skill Level:<strong><?php echo $level;?></strong></li>
									<li><i class="ti-flag-alt"></i>Language:<strong>English</strong></li>
								</ul>
							</div>
							
						</div>
					
					</div>
				</div>
			</section>
			<!-- ============================ Course Detail ================================== -->

			<?php } ?>
			
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