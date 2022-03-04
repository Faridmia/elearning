<?php
require_once "maininclude/header.php";
?>
<!-- Top header  -->
<!-- ============================================================== -->

<?php

if (isset($_GET['usersid'])) {

	$database = new Database();
	$conn     = $database->connection;

	$userid = $_GET['usersid'];

	$sql_two = "SELECT * FROM users WHERE users_id = {$userid}";

	$sec_query = mysqli_query($conn, $sql_two);
	$numRows   = $database->numRows($sec_query);

	$course_sql = "SELECT * from courses where users_id = $userid";
	$c_query    = mysqli_query($conn, $course_sql);
	$cfetch     = mysqli_fetch_array($c_query);

	$courseid = $cfetch['course_id'];

	while ($row = mysqli_fetch_array($sec_query)) {

		$users_id = $row['users_id'];

		$sqllesson    = "SELECT * FROM lesson WHERE course_id = {$courseid}";
		$lesson_query = mysqli_query($conn, $sqllesson);
		$fetch        = mysqli_fetch_array($lesson_query);
		$total_lesson = $database->numRows($lesson_query);

		$username           = $row['username'];
		$user_experience    = $row['user_experience'];
		$biography          = $row['biography'];
		$description        = $row['description'];
		$user_profile_photo = $row['user_profile_photo'];

		$social_link  = $row['social_link'];
		$social_array = explode(" ", $social_link);

		$name   = isset($_GET['name']) ? $_GET['name'] : '';
		$data_1 = $social_array[0] ?? '';
		$data_2 = $social_array[1] ?? '';
		$data_3 = $social_array[2] ?? '';

?>
		<!-- ============================ Instructor header Start================================== -->
		<div class="image-cover ed_detail_head invers" style="background:#0b1c38;" data-overlay="0">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12 col-md-12">
						<div class="viewer_detail_wraps">
							<div class="viewer_detail_thumb">
								<img src="assets/img/profile/<?php echo $user_profile_photo; ?>" class="img-fluid" alt="" />

							</div>
							<div class="caption">
								<div class="viewer_package_status"><?php echo $username; ?></div>
								<div class="viewer_header">
									<h4><?php echo $user_experience; ?> Experience</h4>
									<span class="viewer_location"><?php echo $biography; ?></span>
									<ul>

										<li><strong><?php echo $total_lesson; ?></strong> Videos</li>

									</ul>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- ============================ Instructor header End ================================== -->
	<?php }
	?>

	<!-- ============================ Instructor Detail ================================== -->
	<section>
		<div class="container">
			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="custom-tab customize-tab tabs_creative">
						<ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Courses</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Education</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">

							<!-- Classess -->
							<div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="row">
									<?php

									$userid     = $_GET['usersid'];
									$course_sql = "SELECT * from courses where users_id = $userid";
									$c_query    = mysqli_query($conn, $course_sql);

								
									$m = 1;
									while ($crow = mysqli_fetch_array($c_query)) {

										$course_id = $crow['course_id'];
										$catid     = $crow['category_id'];
										$cat_sql   = "SELECT * from categories WHERE cat_id = $catid";
										$cat_query = mysqli_query($conn, $cat_sql);
										$catfetch  = mysqli_fetch_array($cat_query);

										$category_name = $catfetch['cat_name'];

										$course_img      = $crow['course_img'];
										$course_title    = $crow['course_title'];
										$video_url       = $crow['video_url'];
										$course_duration = $crow['course_duration'];

									?>
										<!-- Single Video -->
										<div class="col-lg-4 col-md-6">
											<div class="edu-watching">
												<div class="property_video sm">
													<div class="thumb">
														<img class="pro_img img-fluid w100" src="assets/img/course/<?php echo $course_img; ?>" alt="7.jpg">
														<div class="overlay_icon">
															<div class="bb-video-box">
																<div class="bb-video-box-inner">
																	<div class="bb-video-box-innerup">
																		<a href="<?php echo $video_url; ?>" data-toggle="modal" data-target="#popup-video<?php echo $m;?>" class="theme-cl"><i class="ti-control-play"></i></a>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="edu_duration"><?php echo $course_duration; ?></div>
												</div>
												<div class="edu_video detail">
													<div class="edu_video_header">
														<h4><a href="detail.php?courseid=<?php echo $course_id;?>"><?php echo ucfirst($course_title); ?></a></h4>
													</div>
													<div class="edu_video_bottom">

														<div class="edu_video_bottom_right">
															<i class="ti-desktop"></i><?php echo $category_name; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Video Modal -->
										<div class="modal fade" id="popup-video<?php echo $m;?>" tabindex="-1" role="dialog" aria-labelledby="popup-video<?php echo $m;?>" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<iframe class="embed-responsive-item" width="100%" height="480" src="<?php echo $video_url; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
											</div>
										</div>
			<!-- End Video Modal -->
									<?php 
									$m++;
								} ?>


								</div>
							</div>

							<!-- Education -->
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="details_single p-2">
									<h2>Education</h2>
									<?php
									$database = new Database();
									$conn     = $database->connection;
									$userid   = $_GET['usersid'];

									$data = array(
										'coll_skill_title',
										'coll_session',
										'coll_name',
										'coll_desc',
										'ver_skill_title',
										'ver_session',
										'ver_name',
										'ver_desc',
										'users_id',
									);
									$query_edu = $database->getData("education", $data, 'users_id', '=', $userid);
									$rowdata   = mysqli_fetch_array($query_edu);

									$ver_skill_title  = $rowdata['ver_skill_title'];
									$ver_session      = $rowdata['ver_session'];
									$ver_name         = $rowdata['ver_name'];
									$ver_desc         = $rowdata['ver_desc'];
									$coll_skill_title = $rowdata['coll_skill_title'];
									$coll_session     = $rowdata['coll_session'];
									$coll_name        = $rowdata['coll_name'];
									$coll_desc        = $rowdata['coll_desc'];

									?>

									<ul class="skills_info">
										<li>
											<div class="skills_captions">
												<h4 class="Skill_title"><?php echo $ver_skill_title; ?></h4>
												<span><?php echo $ver_session; ?></span>
												<span><?php echo $ver_name; ?></span>
												<p class="skills_dec"><?php echo $ver_desc; ?> </p>
											</div>
										</li>

										<li>
											<div class="skills_captions">
												<h4 class="Skill_title"><?php echo $coll_skill_title; ?></h4>
												<span><?php echo $coll_session; ?></span>
												<span><?php echo $coll_name; ?></span>
												<p class="skills_dec"><?php echo $coll_desc; ?> </p>
											</div>
										</li>

									</ul>
								</div>
							</div>

							<!-- Reviews -->
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
								<div class="reviews-comments-wrap">
									<!-- reviews-comments-item -->
									<?php

										$userid      = $_GET['usersid'];
										$courses_sql = "SELECT * FROM courses WHERE users_id = {$userid}";
										$result      = mysqli_query($conn, $courses_sql);
										$course_id_arr = [];
										while ($row = mysqli_fetch_array($result)) {
											$course_id_arr[] = $row['course_id'];

										}

										$array_implode = implode(",",$course_id_arr);

										$sql_two = "SELECT users.users_id,users.user_profile_photo, review_table.review_id,review_table.user_rating,review_table.users_id,review_table.course_id,review_table.user_name,review_table.user_review,review_table.datetime
													FROM review_table
													INNER JOIN users ON review_table.users_id = users.users_id where course_id in ($array_implode)";

										$resulttwo = mysqli_query($conn, $sql_two);
										
										while ($review = mysqli_fetch_array($resulttwo)) {

											$user_profile_photo = $review['user_profile_photo'];
											$user_name          = $review['user_name'];
											$user_review        = $review['user_review'];
											$rating             = $review['user_rating'];
											$datetime           = $review['datetime'];

											$array   = [];
											$count   = [];
											$array[] = $rating;
											$count[] = count((array) $rating);

											$rating_output = "";
											$array_sum     = array_sum($array);
											$count         = array_sum($count);
											$ranking       = '';
											if ($count != 0) {
												$ranking = round($array_sum / $count);
											}
											$rating_output = '';
											$totalRating   = 5;

											$sum = 1;
											$avg_output='';

											for ($i = 1; $i <= $totalRating; $i++) {
												if ($ranking < $i) {
													$rating_output .= '<i class="ti-star"></i>';
												} else {
													$rating_output .= '<i class="ti-star active"></i>';

													$avg_output = number_format($sum, 1);
													$sum++;
												}	
											}

											
									?>
										<div class="reviews-comments-item">
											<div class="review-comments-avatar">
												<img src="assets/img/profile/<?php echo $user_profile_photo; ?>" class="img-fluid" alt="">
											</div>
											<div class="reviews-comments-item-text">
												<h4><a href="#"><?php echo $user_name; ?></a><span class="reviews-comments-item-date" style="margin-left: 20px;"><i class="ti-calendar theme-cl"></i><?php echo date('d M Y', $datetime); ?></span></h4>

												<div class="listing-rating high" data-starrating2="5">
													<?php echo $rating_output; ?>
													<span class="review-count"><?php echo $avg_output; ?></span>
												</div>
												<div class="clearfix"></div>
												<p><?php echo $user_review; ?></p>

											</div>
										</div>
										<!--reviews-comments-item end-->
									<?php } ?>

								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- ============================ Instructor Detail ================================== -->
<?php } ?>

<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>