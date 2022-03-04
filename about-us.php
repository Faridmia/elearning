<?php
require_once "maininclude/header.php";
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
					<h1 class="breadcrumb-title">About Us</h1>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ========================== About Facts List Section =============================== -->
<section class="pt-0">
	<div class="container">

		<div class="row align-items-center">

			<?php
			$database      = new Database();
			$conn          = $database->connection;
			$data          = array(
				'about_title', 
				'about_desc', 
				'about_title_2', 
				'about_desc_2', 
				'about_title_3', 
				'about_desc_3', 
				'button_title', 
				'button_link', 
				'about_img', 
				'about_heading'
			);

			$query         = $database->getData("about_us", $data);
			$numrows       = $database->numRows($query);
			$row           = mysqli_fetch_array($query);
			$about_title   = $row['about_title'];
			$about_desc    = $row['about_desc'];
			$about_title_2 = $row['about_title_2'];
			$about_desc_2  = $row['about_desc_2'];
			$about_title_3 = $row['about_title_3'];
			$about_desc_3  = $row['about_desc_3'];
			$button_title  = $row['button_title'];
			$button_link   = $row['button_link'];
			$about_img     = $row['about_img'];
			$about_heading = $row['about_heading'];

			?>

			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="list_facts_wrap">
					<div class="sec-heading mb-3">
						<h2><?php echo $about_heading; ?></h2>
					</div>
					<div class="list_facts">

						<div class="list_facts_caption">
							<h4><?php echo $about_title; ?></h4>
							<p><?php echo $about_desc; ?></p>
						</div>
					</div>
					<div class="list_facts">

						<div class="list_facts_caption">
							<h4><?php echo $about_title_2; ?></h4>
							<p><?php echo $about_desc_2; ?></p>
						</div>
					</div>
					<div class="list_facts">

						<div class="list_facts_caption">
							<h4><?php echo $about_title_3; ?></h4>
							<p><?php echo $about_desc_3; ?></p>
						</div>
					</div>

				</div>
				<a href="<?php echo $button_link; ?>" class="btn btn-modern"><?php echo $button_title; ?><span><i class="ti-arrow-right"></i></span></a>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 about-image">
				<div class="list_facts_wrap_img">

					<img src="assets/img/course/<?php echo $about_img; ?>" class="img-fluid" alt="" />

				</div>
			</div>

		</div>

	</div>
</section>
<!-- ========================== About Facts List Section =============================== -->

<!-- ============================ Featured Instructor Start ================================== -->
<section class="bg-light">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-6 col-sm-12">
				<div class="sec-heading center">
					<p>Meet Instructors</p>
					<h2><span class="theme-cl">Top & Famous</span> Instructor </h2>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">

				<div class="four_slide-dots articles arrow_middle">

					<?php
					$database = new Database();
					$conn     = $database->connection;
					$sql_two = "SELECT users.biography,users.name,users.users_id,users.user_profile_photo ,users.username,users.user_experience,users.social_link,users.description 
						FROM users 
						INNER JOIN courses ON 
						users.users_id = courses.users_id 
						GROUP BY courses.users_id";

					$sec_query = mysqli_query($conn, $sql_two);
					$numRows   = $database->numRows($sec_query);

					if ($sql_two) {

						while ($row = mysqli_fetch_array($sec_query)) {
							$users_id           = $row['users_id'];
							$biography          = $row['biography'];
							$username           = $row['name'];
							$user_profile_photo = $row['user_profile_photo'];
							$social_link        = $row['social_link'];
							$social_array       = explode(" ", $social_link);

							$name   = isset($_GET['name']) ? $_GET['name'] : '';
							$data_1 = $social_array[0] ?? '';
							$data_2 = $social_array[1] ?? '';
							$data_3 = $social_array[2] ?? '';
					?>

							<!-- Single Slide -->
							<div class="singles_items">
								<div class="instructor_wrap">
									<div class="instructor_thumb">
										<a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><img src="assets/img/profile/<?php echo $user_profile_photo; ?>" class="img-fluid" alt=""></a>
									</div>
									<div class="instructor_caption">
										<h4><a href="instructor-detail.php?usersid=<?php echo $users_id; ?>"><?php echo $username; ?></a></h4>
										<span><?php echo $biography; ?></span>
										<ul>
											<li><a href="<?php echo $data_1; ?>" class="cl-fb"><i class="ti-facebook"></i></a></li>
											<li><a href="<?php echo $data_2; ?>" class="cl-twitter"><i class="ti-twitter"></i></a></li>
											<li><a href="<?php echo $data_3; ?>" class="cl-linked"><i class="ti-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
					<?php
						}
					}
					?>

				</div>

			</div>
		</div>

	</div>
</section>
<!-- ============================ Featured Instructor End ================================== -->

<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>