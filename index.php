<?php
require_once "maininclude/header.php";

$database     = new Database();
$conn         = $database->connection;
$data         = array('phone', 'email', 'facebook', 'twitter', 'linkedin', 'instagram', 'logo', 'address', 'copyright', 'banner_title', 'banner_desc', 'banner_img');
$query        = $database->getData("setting", $data);
$numrows      = $database->numRows($query);
$row          = mysqli_fetch_array($query);
$phone        = $row['phone'];
$email        = $row['email'];
$facebook     = $row['facebook'];
$twitter      = $row['twitter'];
$linkedin     = $row['linkedin'];
$instagram    = $row['instagram'];
$address      = $row['address'];
$logo         = $row['logo'];
$copyright    = $row['copyright'];
$banner_desc  = $row['banner_desc'];
$banner_title = $row['banner_title'];
$banner_img   = $row['banner_img'];

?>

<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero_banner hero-inner-2 shadow rlt" style="background:url(admin/images/banner/<?php echo $banner_img; ?>) no-repeat;" data-overlay="7">
	<div class="elix_img_box">
	</div>
	<div class="container">

		<div class="hero-caption small_wd mb-5">
			<h1 class="big-header-capt cl_2 mb-0"><?php echo $banner_title; ?></h1>
			<p><?php echo $banner_desc; ?></p>
		</div>
		<!-- Type -->
		<form action="" method="post">
			<div class="row">
				<div class="col-lg-8 col-md-12 col-sm-12">
					<div class="banner-search shadow_high">
						<div class="search_hero_wrapping">
							<div class="row">

								<div class="col-lg-10 col-md-10 col-sm-12 br-right">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="search" name="search_course" type="search" class="form-control" required placeholder="Keyword" />
											<img src="assets/img/search.svg" class="search-icon" alt="" />
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-3 col-sm-12 pl-0">
									<div class="form-group none">
										<input type="submit" name="search_btn" value="Search" class="btn search-btn full-width" />
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
							<h4>10 online courses</h4>
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
							<h4>Free Course</h4>
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
				<div class="sec-heading2" style="margin-bottom:20px;margin-left:10px">
					<div class="sec-left">
						<h3>Featured Courses</h3>
					</div>
				</div>
				<div class="arrow_slide three_slide arrow_middle">

					<?php

					$data  = array('course_img', 'course_sell_price', 'course_title', 'course_id', 'course_desc', 'course_duration', 'users_id');
					$query = $database->getData("courses", $data, 'is_featured_course', '=', 1);
					while ($row = mysqli_fetch_array($query)) {

						$course_id         = (int) $row['course_id'];
						$course_title      = $row['course_title'];
						$course_desc       = $row['course_desc'];
						$course_duration   = $row['course_duration'];
						$course_img        = $row['course_img'];
						$course_sell_price = $row['course_sell_price'];
						$users_id          = $row['users_id'];

						$user_query = "SELECT name,user_profile_photo FROM users WHERE users_id = '$users_id'";
						$result     = mysqli_query($conn, $user_query);

						$user_fetch = mysqli_fetch_array($result);

					?>

						<!-- Single Slide -->
						<div class="singles_items">
							<div class="education_block_grid style_2">
								<div class="education_block_thumb n-shadow">
									<a href='detail.php?courseid=<?php echo $course_id; ?>'><img src='assets/img/course/<?php echo $course_img; ?>' class='img-fluid' alt=''></a>
								</div>

								<div class="education_block_body">
									<h4 class="bl-title"><a href="detail.php?courseid=<?php echo $course_id; ?>"><?php echo $course_title; ?></a></h4>

								</div>
								<div class="education_block_footer">
									<div class="education_block_author">
										<div class="path-img"><a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><img src="assets/img/profile/<?php echo $user_fetch['user_profile_photo']; ?>" class="img-fluid" alt=""></a></div>
										<h5><a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><?php echo $user_fetch['name']; ?></a></h5>
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
						<h3>Popular Categories</h3>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 p-0">

				<div class="arrow_slide three_slide-dots arrow_middle">

					<?php

					// total lesson list

					$data  = array('course_img', 'course_sell_price', 'course_title', 'course_id', 'course_desc', 'course_duration');
					$query = $database->getData("courses", $data, 'is_top_course', '=', 1);

					while ($row = mysqli_fetch_array($query)) {

						$course_id         = (int) $row['course_id'];
						$course_title      = $row['course_title'];
						$course_desc       = $row['course_desc'];
						$course_duration   = $row['course_duration'];
						$course_img        = $row['course_img'];
						$course_sell_price = $row['course_sell_price'];

						$lesson_sql   = "SELECT * FROM lesson WHERE course_id = {$course_id}";
						$lesson_query = mysqli_query($conn, $lesson_sql);
						$total_lesson = $database->numRows($lesson_query);

						$sec_query = "SELECT section_id FROM section WHERE course_id = {$course_id}";

						$exc_query = mysqli_query($conn, $sec_query);
						$total_sec = $database->numRows($exc_query);

					?>

						<!-- Single Slide -->
						<div class="singles_items">
							<div class="edu_cat">
								<div class="pic">
									<a class="pic-main" href="detail.php?courseid=<?php echo $course_id; ?>" style="background-image:url(assets/img/course/<?php echo $course_img; ?>);"></a>
								</div>
								<div class="edu_data">
									<h4 class="title"><a href="detail.php?courseid=<?php echo $course_id; ?>"><?php echo $course_title; ?></a></h4>
									<ul class="meta">
										<li class="video"><i class="ti-video-clapper"></i><?php echo $total_lesson; ?> Videos</li>
										<li class="lessions"><i class="ti-book"></i><?php echo $total_sec; ?> Lecture</li>
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
			<?php

			$database = new Database();
			$conn     = $database->connection;
			$data     = array('post_id', 'post_title', 'post_image', 'users_id');
			$query    = $database->getData("blog_post", $data);
			$numrows  = $database->numRows($query);
			if ($numrows >= 0) {

				while ($fetch = mysqli_fetch_array($query)) {
					$post_id    = $fetch['post_id'];
					$post_title = $fetch['post_title'];
					$post_image = $fetch['post_image'];
					$users_id   = $fetch['users_id'];

					$user_query = "SELECT name,user_profile_photo FROM users WHERE users_id = '$users_id'";
					$result     = mysqli_query($conn, $user_query);

					$user_fetch = mysqli_fetch_array($result);

			?>

					<!-- Single Article -->
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="articles_grid_style">
							<div class="articles_grid_thumb">
								<img src="assets/img/post/<?php echo $post_image; ?>" class="img-fluid" alt="" />
							</div>

							<div class="articles_grid_caption">
								<h4><?php echo $post_title; ?></h4>
								<div class="articles_grid_author">
									<div class="articles_grid_author_img"><img src="assets/img/profile/<?php echo $user_fetch['user_profile_photo']; ?>" class="img-fluid" alt="" /></div>
									<h4><?php echo $user_fetch['name']; ?></h4>
								</div>
							</div>
						</div>
					</div>
			<?php }
			} ?>

		</div>
	</div>
</section>
<!-- ========================== Articles Section =============================== -->


<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>