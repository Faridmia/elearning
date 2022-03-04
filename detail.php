<?php

require_once "maininclude/header.php";
if (isset($_GET['courseid'])) {

	$courseid = (int) $_GET['courseid'];
	$query    = mysqli_query($conn, "SELECT courses.*, categories.* FROM courses LEFT JOIN categories ON categories.cat_id = courses.course_id WHERE courses.course_id = $courseid");

	$fetch = mysqli_fetch_array($query);

	$course_id                = (int) $fetch['course_id'];
	$course_title             = $fetch['course_title'];
	$course_original_price    = $fetch['course_original_price'];
	$course_overview_provider = $fetch['course_overview_provider'];
	$course_tag               = $fetch['course_tag'];
	$video_url                = $fetch['video_url'];
	$course_desc              = $fetch['course_desc'];
	$outcomes                 = $fetch['outcomes'];
	$course_duration          = $fetch['course_duration'];
	$course_sell_price        = $fetch['course_sell_price'];
	$course_img               = $fetch['course_img'];
	$long_desc                = $fetch['long_desc'];
	$level                    = $fetch['level'];
	$is_free_course           = $fetch['is_free_course'];
	$is_top_course            = $fetch['is_top_course'];
	$requirement              = $fetch['requirement'];
	$course_features          = $fetch['course_features'];
	$category_id              = $fetch['category_id'];
	$sub_category_id          = $fetch['sub_category_id'];
	$added                    = $fetch['added'];
	$cat_name                 = $fetch['cat_name'];
	$users_id                 = $fetch['users_id'];

	$enroll_sql = "SELECT * FROM enroll WHERE course_id = {$courseid}";

	$enroll_query = mysqli_query($conn, $enroll_sql);
	$fetch_enroll = mysqli_fetch_array($enroll_query);
	$total_enroll = $database->numRows($enroll_query);

?>
	<!-- ============================ Page Title Start================================== -->
	<div class="ed_detail_head">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 col-md-5">
					<div class="property_video">
						<div class="thumb">
							<img class="pro_img img-fluid w100" src="assets/img/course/<?php echo $course_img; ?>" class="img-fluid avater" alt="">
							<div class="overlay_icon">
								<div class="bb-video-box">
									<div class="bb-video-box-inner">
										<div class="bb-video-box-innerup">
											<a href="<?php echo $video_url; ?>" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
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
							<li class="facts-1"><?php echo ucfirst($cat_name); ?></li>
						</ul>
						<div class="ed_header_caption">
							<h2 class="ed_title"><?php echo $course_title; ?></h2>
							<ul>
								<li><i class="ti-calendar"></i><?php echo $course_duration; ?></li>

								<li><i class="ti-user"></i><?php echo $total_enroll; ?> Student Enrolled</li>
							</ul>
						</div>
						<div class="ed_header_short">
							<p><?php echo $course_desc; ?></p>
						</div>

						<div class="ed_rate_info">
							<div class="star_info">
								<?php

								$total_rating = mysqli_query($conn, "SELECT user_rating,course_id FROM review_table WHERE course_id=$course_id");
								$array        = array();
								$count        = array();
								while ($row = mysqli_fetch_array($total_rating)) {
									$user_rating = $row['user_rating'];
									$course_id   = $row['course_id'];
									$array[]     = $user_rating;
									$count[]     = count((array) $user_rating);
								}

								$array_sum = array_sum($array);
								$count     = array_sum($count);
								$ranking       = '';
								if ($count != 0) {
									$ranking = round($array_sum / $count);
								} 

								$totalRating = 5;

								for ($i = 1; $i <= $totalRating; $i++) {
									if ($ranking < $i) {
										echo '<i class="fas fa-star"></i>';
									} else {
										echo '<i class="fas fa-star filled"></i>';
									}
								}
								?>
							</div>
							<div class="review_counter">
								<?php
								$total_rating = mysqli_query($conn, "SELECT AVG(user_rating) FROM review_table WHERE course_id LIKE $course_id");
								while ($row4 = mysqli_fetch_array($total_rating)) {

									$AverageReviewRating = $row4['AVG(user_rating)'];

									$AverageReviewRating = number_format($AverageReviewRating, 2);

									echo '<strong class="high">' . $AverageReviewRating . '</strong>';

									//End if there are approved reviews
								}
								?>
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
						<?php echo htmlspecialchars_decode($long_desc); ?>
						<h6>Requirements</h6>
						<ul class="lists-3">
							<?php echo htmlspecialchars_decode($requirement); ?>
						</ul>
					</div>

					<div class="edu_wraper">
						<h4 class="edu_title">Course Circullum</h4>
						<div id="accordionExample" class="accordion shadow circullum">

							<?php

							$query = "SELECT * FROM section WHERE course_id = {$course_id} ORDER BY section_id ASC";

							$exc_query = mysqli_query($conn, $query);

							$i = 1;
							while ($row = mysqli_fetch_array($exc_query)) {
								$active   = '';
								$aria_exp = 'false';
								if ($i == 1) {
									$active   = 'show';
									$aria_exp = 'true';
								}

								$section_id = $row['section_id'];
								$section_title = $row['section_title'];
							?>
								<!-- Part 1 -->
								<div class="card">
									<div id="headingOne<?php echo $i; ?>" class="card-header bg-white shadow-sm border-0">
										<h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne<?php echo $i; ?>" aria-expanded="<?php echo $aria_exp; ?>" aria-controls="collapseOne<?php echo $i; ?>" class="d-block position-relative text-dark collapsible-link py-2"><?php echo $section_title; ?></a></h6>
									</div>
									<div id="collapseOne<?php echo $i; ?>" aria-labelledby="headingOne<?php echo $i; ?>" data-parent="#accordionExample" class="collapse <?php echo $active; ?>">
										<div class="card-body pl-3 pr-3">
											<?php
											$sqllesson = "SELECT lesson.lesson_id ,lesson.lesson_title,lesson.course_id,lesson.section_id,lesson.video_url,section.section_id ,section.section_title,section.course_id
												FROM lesson
												INNER JOIN section ON lesson.section_id = section.section_id";

											$sec_query = mysqli_query($conn, $sqllesson);

											?>
											<ul class="lectures_lists">
												<?php
												$count = 1;
												while ($row2 = mysqli_fetch_array($sec_query)) {
													$section_iddb = $row2['section_id'];
													$active       = '';
													$aria_exp     = 'false';
													if ($i == 1) {
														$active   = 'show';
														$aria_exp = 'true';
													}

													$lesson_title = $row2['lesson_title'];
													if ($section_id == $section_iddb) {
												?>
														<li class="unview">
															<div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: <?php echo $count; ?></div><?php echo $lesson_title; ?>
														</li>
												<?php }
													$count++;
												} ?>
											</ul>
										</div>
									</div>
								</div>

							<?php $i++;
							} ?>

						</div>
					</div>

					<!-- review custom farid-->
					<div class="edu_wraper">
						<div class="card">
							<div class="card-header">Course Review</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4 text-center">
										<h1 class="text-warning mt-4 mb-4">
											<b><span id="average_rating">0.0</span> / 5</b>
										</h1>
										<div class="mb-3">
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
											<i class="fas fa-star star-light mr-1 main_star"></i>
										</div>
										<h3><span id="total_review">0</span> Review</h3>
									</div>
									<div class="col-sm-4">
										<p>
										<div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

										<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
										</div>
										</p>
										<p>
										<div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

										<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
										</div>
										</p>
										<p>
										<div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

										<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
										</div>
										</p>
										<p>
										<div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

										<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
										</div>
										</p>
										<p>
										<div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

										<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
										<div class="progress">
											<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
										</div>
										</p>
									</div>
									<?php
									if (isset($_SESSION['is_login'])) {
									?>
										<div class="col-sm-4 text-center">
											<h3 class="mt-4 mb-3">Write Review Here</h3>
											<input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
											<input type="hidden" name="users_id" value="<?php echo $users_id; ?>">
											<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="mt-5" id="review_content"></div>
					</div>

					<!--review end wrapper -->
					<!--rating modal -->
					<?php
					if (isset($_SESSION['is_login'])) {
						$user_login = $_SESSION['user_email'];
						$query      = "SELECT * FROM users WHERE email = '$user_login'";
						$result     = $conn->query($query);
						$row        = mysqli_fetch_array($result);
						$users_id   = $row['users_id'];

					?>
						<div id="review_modal" class="modal" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Submit Review</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h4 class="text-center mt-2 mb-4">
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
											<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
										</h4>
										<div class="form-group">
											<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
										</div>
										<div class="form-group">
											<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
										</div>
										<div class="form-group text-center mt-4">
											<input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>">
											<input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id; ?>">
											<button type="submit" class="btn btn-primary" id="save_review">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>">
						<input type="hidden" name="users_id" id="users_id" value="<?php echo $users_id; ?>">
						
					<?php	} ?>
					<!-- rating modal end -->
				</div>

				<!-- Sidebar -->
				<div class="col-lg-4 col-md-4">

					<div class="ed_view_box style_2">
						<?php 
							if(isset($users_id)){
								$get_userid    = $users_id;
								$getquery      = "SELECT name,user_profile_photo,biography FROM users WHERE users_id = '$get_userid'";
								$getresult     = $conn->query($getquery);
								$getrow        = mysqli_fetch_array($getresult);
							}	
						
						?>
						<div class="ed_author">
							<div class="ed_author_thumb">
								<img class="img-fluid" src="assets/img/profile/<?php echo $getrow['user_profile_photo'];?>" alt="7.jpg">
							</div>
							<div class="ed_author_box">
								<h4><?php echo $getrow['name'];?></h4>
								<span><?php echo $getrow['biography'];?></span>
							</div>
						</div>

						<div class="ed_view_price pl-4">
							<span>Acctual Price</span>
							<h2 class="theme-cl">
								<?php
								if ($is_free_course) {
									echo "Free";
								} else {
									echo $course_original_price;
								}
								?>
							</h2>
						</div>
						<div class="ed_view_features pl-4">
							<span>Course Features</span>
							<ul>
								<?php
								header('Content-Type: text/html; charset=utf-8');
								echo htmlspecialchars_decode($course_features); ?>
							</ul>
						</div>
						<div class="ed_view_link">
							<?php
							if (isset($_SESSION['is_login'])) {
								$user_login = $_SESSION['user_email'];
								$query      = "SELECT * FROM users WHERE email = '$user_login'";
								$result     = $conn->query($query);
								$row        = mysqli_fetch_array($result);
								$users_id   = $row['users_id'];

								header("Location:course-video-list.php?courseid=$course_id&userid=$users_id");
							?>
								<!-- <form action="" method="post" id="enroll_course">
									<a href="course-video-list.php?courseid=<?php //echo $course_id; ?>&userid=<?php //echo $users_id; ?>" class="btn btn-theme enroll-btn btn-enroll-button-now" onclick="handleEnrolledButton()">Get Enrolled<i class="ti-angle-right"></i></a>
								</form> -->

							<?php } else { ?>
								<a href="#" class="btn btn-theme enroll-btn" data-toggle="modal" data-target="#logintwo">Get Enrolled<i class="ti-angle-right"></i></a>
							<?php } ?>
						</div>

					</div>

					<?php
					$sqllesson    = "SELECT * FROM lesson WHERE course_id = {$courseid}";
					$sec_query    = mysqli_query($conn, $sqllesson);
					$fetch        = mysqli_fetch_array($sec_query);
					$total_lesson = $database->numRows($sec_query);

					$enroll_sql = "SELECT * FROM enroll WHERE course_id = {$courseid}";

					$enroll_query = mysqli_query($conn, $enroll_sql);
					$fetch_enroll = mysqli_fetch_array($enroll_query);
					$total_enroll = $database->numRows($enroll_query);

					?>

					<div class="edu_wraper">
						<h4 class="edu_title">Course Features</h4>
						<ul class="edu_list right">
							<li><i class="ti-user"></i>Student Enrolled:<strong><?php echo $total_enroll; ?></strong></li>
							<li><i class="ti-files"></i>lectures:<strong><?php echo $total_lesson; ?></strong></li>
							<li><i class="ti-time"></i>Duration:<strong><?php echo $course_duration; ?></strong></li>
							<li><i class="ti-tag"></i>Skill Level:<strong><?php echo $level; ?></strong></li>
							<li><i class="ti-flag-alt"></i>Language:<strong>English</strong></li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</section>
	<!-- ============================ Course Detail ================================== -->
	<!-- Video Modal -->
	<div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popup-video" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<iframe class="embed-responsive-item" width="100%" height="480" src="<?php echo $video_url; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
	</div>
	<!-- End Video Modal -->

<?php } ?>

<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>