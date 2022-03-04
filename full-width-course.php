<?php
require_once "maininclude/header.php";
?>
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="breadcrumbs-wrap">
					<h1 class="breadcrumb-title">Courses Grid</h1>
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

					$data  = array('course_img', 'course_sell_price', 'course_title', 'course_id', 'course_desc', 'course_duration', 'users_id');
					$query = $database->getData("courses", $data);

					while ($row = mysqli_fetch_array($query)) {

						$course_id          = (int) $row['course_id'];
						$course_title       = $row['course_title'];
						$course_desc        = $row['course_desc'];
						$course_duration    = $row['course_duration'];
						$course_img         = $row['course_img'];
						$course_sell_price  = $row['course_sell_price'];
						$users_id           = $row['users_id'];
						$user_data          = array('users_id', 'name', 'user_profile_photo');
						$user_query         = $database->getData("users", $user_data, 'users_id', '=', $users_id);
						$user_fetch         = mysqli_fetch_array($user_query);
						$name               = $user_fetch['name'];
						$user_profile_photo = $user_fetch['user_profile_photo'];
						$users_id           = $user_fetch['users_id'];

						$course_desc = substr($course_desc,0,100);

					?>
						<!-- Cource Grid 1 -->
						<div class="col-lg-4 col-md-6">
							<div class="education_block_grid">

								<div class="education_block_thumb">
									<a href='detail.php?courseid=<?php echo $course_id; ?>'><img src='assets/img/course/<?php echo $course_img; ?>' class='img-fluid' alt=''></a>
									<div class="cources_price">Free</div>
								</div>

								<div class="education_block_body">
									<h4 class="bl-title"><a href="detail.php?courseid=<?php echo $course_id; ?>"><?php echo $course_title; ?></a></h4>
									<p><?php echo $course_desc; ?></p>
								</div>

								<div class="education_block_footer">
									<div class="education_block_author">
										<div class="path-img"><a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><img src="assets/img/profile/<?php echo $user_profile_photo; ?>" class="img-fluid" alt=""></a></div>
										<h5><a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><?php echo $name; ?></a></h5>
									</div>
									<span class="education_block_time"><i class="ti-time mr-1"></i><?php echo $course_duration; ?></span>
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
<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>