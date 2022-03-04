<?php
require_once "maininclude/header.php";
?>

<!-- ============================ Page Title Start================================== -->
<section class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="breadcrumbs-wrap">
					<h1 class="breadcrumb-title">All Instructor</h1>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Find Courses with Sidebar ================================== -->
<section class="pt-0">
	<div class="container">
		<!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="edu_wraper p-0">

							<?php
							$database = new Database();
							$conn     = $database->connection;

							$sql_two = "SELECT  COUNT(courses.course_id),courses.users_id,users.users_id,users.user_profile_photo ,users.username,users.user_experience,users.social_link,users.description FROM users INNER JOIN courses ON users.users_id = courses.users_id GROUP BY courses.users_id";

							$sec_query = mysqli_query($conn, $sql_two);

							$numRows = $database->numRows($sec_query);
							if ($sql_two) {
								while ($row = mysqli_fetch_array($sec_query)) {

									$total_course = $row['COUNT(courses.course_id)'];
									$users_id     = $row['users_id'];
									$course_sql   = "SELECT * from courses where users_id = $users_id";
									$c_query      = mysqli_query($conn, $course_sql);
									$cfetch       = mysqli_fetch_array($c_query);
									$catid        = $cfetch['category_id'];
									$cat_sql      = "SELECT * from categories where cat_id = $catid";
									$cat_query    = mysqli_query($conn, $cat_sql);
									$catfetch     = mysqli_fetch_array($cat_query);

									$category_name      = $catfetch['cat_name'];
									$username           = $row['username'];
									$user_experience    = $row['user_experience'];
									$description        = $row['description'];
									$user_profile_photo = $row['user_profile_photo'];
									$social_link        = $row['social_link'];
									$social_array       = explode(" ", $social_link);
									$name               = isset($_GET['name']) ? $_GET['name'] : '';
									$data_1             = $social_array[0] ?? '';
									$data_2             = $social_array[1] ?? '';
									$data_3             = $social_array[2] ?? '';

							?>
									<!-- Single Instructor -->
									<div class="single_instructor border">
										<div class="single_instructor_thumb">
											<a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><img src="assets/img/profile/<?php echo $user_profile_photo; ?>" class="img-fluid" alt="" width="230px" height="230px"></a>
										</div>
										<div class="single_instructor_caption">
											<h4><a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><?php echo $username; ?></a></h4>
											<ul class="instructor_info">
												<li><i class="ti-tag"></i><?php echo ucfirst($category_name); ?></li>
												<li><i class="ti-video-camera"></i><?php echo $total_course; ?> Courses</li>
												<li><i class="ti-user"></i><?php echo $user_experience; ?></li>
											</ul>
											<p><?php echo $description; ?></p>
											<ul class="social_info">
												<li><a href="<?php echo $data_1; ?>" target="_blank"><i class="ti-facebook"></i></a></li>
												<li><a href="<?php echo $data_2; ?>" target="_blank"><i class="ti-twitter"></i></a></li>
												<li><a href="<?php echo $data_3; ?>" target="_blank"><i class="ti-linkedin"></i></a></li>

											</ul>
										</div>
									</div>
							<?php }
							}
							?>
						</div>

					</div>

				</div>

			</div>

		</div>
		<!-- Row -->

	</div>
</section>
<!-- ============================ Find Courses with Sidebar End ================================== -->

<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>