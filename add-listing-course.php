
<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
    exit();
}

require_once "maininclude/dashboard-header.php";
$database = new Database();
$conn     = $database->connection;

if (isset($_SESSION['user_email'])) {
	$user_login    = $_SESSION['user_email'];
	$query         = "SELECT * FROM users WHERE email = '$user_login'";
	$result        = $conn->query($query);
	$row           = mysqli_fetch_array($result);
	$username      = $row['name'];
	$email         = $row['email'];
	$profile_photo = $row['user_profile_photo'];
	$users_id      = $row['users_id'];
	$biography     = $row['biography'];
	$social_link   = $row['social_link'];
	$social_array  = explode(" ", $social_link);

	$name   = isset($_GET['name']) ? $_GET['name'] : '';
	$data_1 = $social_array[0] ?? '';
	$data_2 = $social_array[1] ?? '';
	$data_3 = $social_array[2] ?? '';
}
?>

<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->


<!-- ============================ Dashboard: My Order Start ================================== -->
<section class="gray pt-0">
	<div class="container-fluid">

		<!-- Row -->
		<div class="row">

			<?php
			require_once "maininclude/dashboard-menubar.php";

			?>
			<div class="col-lg-9 col-md-9 col-sm-12">

				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Add Listing</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- /Row -->
				<form action="" method="post" id="add_course_data" enctype="multipart/form-data">
					<!-- Row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="dashboard_container">
								<div class="dashboard_container_header">
									<div class="dashboard_fl_1">
										<h4>Submit Your Course</h4>
									</div>
								</div>
								<div class="dashboard_container_body p-4">
									<!-- Basic info -->
									<div class="submit-section">
										<div class="form-row">

											<div class="form-group col-md-6">
												<label>Course Title</label>
												<input type="text" name="course_title" class="form-control" placeholder="Course Title">
											</div>

											<div class="form-group col-md-6">
												<label>Course Orginal Price</label>
												<input type="text" name="course_orginal_price" class="form-control" placeholder="Ex. 199.10">
											</div>
											<div class="form-group col-md-6">
												<label>Discount Price</label>
												<input type="text" name="course_sell_price" class="form-control" placeholder="Course Selling Price" />
											</div>
											<div class="form-group col-md-6">
												<label>Course Duration</label>
												<input type="text" name="course_durations" class="form-control" placeholder="Course Duration" />
											</div>
											<div class="form-group col-md-6">
												<label>Course Tags</label>
												<input type="text" name="course_tag" class="form-control" placeholder="Course Tag" />
											</div>

											<div class="form-group col-md-6 form-check">
												<input type="checkbox" class="form-check-input" name="is_free_course" id="is_free_course" value="1">
												<label class="form-check-label">Check if this course is Free?</label>

											</div>
											<div class="form-group col-md-6 form-check">
												<input type="checkbox" class="form-check-input" name="is_featured_course" id="is_featured_course" value="1">
												<label class="form-check-label">Check if this course is Featured?</label>

											</div>

											<div class="form-group col-md-6">
												<label>Course Image</label>
												<input type="file" class="form-control" id="course_images" name='course_images' value="" />
											</div>
											<div class="form-group col-md-6">
												<label>Course Overview Provider</label>
												<input type="text" name="course_provider" class="form-control" placeholder="youtube" />
											</div>
											<div class="form-group col-md-6">
												<label>Course Provider URL</label>
												<input type="text" name="course_provider_url" class="form-control" placeholder="Course Url" />
											</div>
										</div>
									</div>
									<!-- Basic info -->

								</div>

							</div>
						</div>
					</div>
					<!-- /Row -->

					<!-- Row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="dashboard_container">
								<div class="dashboard_container_header">
									<div class="dashboard_fl_1">
										<h4>Course Description</h4>
									</div>
								</div>
								<div class="dashboard_container_body p-4">
									<!-- Basic info -->
									<div class="submit-section">
										<div class="form-row">
											<div class="form-group col-md-12">
												<label>Outcomes</label>
												<input type="text" class="form-control" name="outcome" value="" />
											</div>
											<div class="form-group col-md-12">
												<label>Short Description</label>
												<textarea class="form-control" name="course_desc" placeholder="Description"></textarea>
											</div>
											<div class="form-group col-md-12">
												<label>Long Description</label>
												<textarea class="form-control" name="long_desc" placeholder="Description"></textarea>
											</div>
											<div class="form-group col-md-12">
												<label>Course Level</label>
												<input type="text" name="course_level" class="form-control" placeholder="Course Level">
											</div>

											<div class="form-group col-md-12">
												<label for="course_category">Course Category</label>
												<select name="course_category" class="form-control course_category">
													<option value="">--select category--</option>
													<?php
													$database = new Database();
													$data     = array('cat_id', 'cat_name');
													$query    = $database->getData("categories", $data);

													while ($row = mysqli_fetch_array($query)) {
														$cat_id   = (int) $row['cat_id'];
														$cat_name = $row['cat_name'];
														echo "<option value='$cat_id'>$cat_name</option>";
													}
													?>
												</select>
											</div>
											<div class="course_sub_category form-group col-lg-12"></div>
											<div class="form-group col-md-6">
												<input type="checkbox" class="form-check-input" name="is_top_course" id="is_top_course" value="1">
												<label class="form-check-label">Check if this course is top course?</label>

											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- Row -->
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="dashboard_container">
								<div class="dashboard_container_header">
									<div class="dashboard_fl_1">
										<h4>Course Requirements</h4>
									</div>
								</div>
								<div class="dashboard_container_body p-4">
									<!-- Basic info -->
									<div class="submit-section">
										<div class="form-row">
											<div class="form-group col-md-12">
												<label>Requirements</label>
												<textarea class="form-control" name="course_req" placeholder="Requirements"></textarea>
											</div>
											<div class="form-group col-md-12">
												<label>Features</label>
												<textarea class="form-control" name="course_feature" placeholder="Description"></textarea>
											</div>
										</div>
									</div>
									<div id="success"></div>
								</div>

							</div>
						</div>
					</div>
					<!-- /Row -->
					<div class="row">
						<div class="form-group col-lg-12 col-md-12">
							<input type="hidden" value="<?php echo $users_id; ?>" name="userid" />
							<input type="hidden" name="page" value="add_course" />
							<?php echo $database->formtoken(); ?>
							<button class="btn btn-theme" name="add_course" type="submit">Save Course</button>
						</div>
						<div class="form-group">
							<!-- Basic info -->

						</div>
					</div>
				</form>

			</div>

		</div>
		<!-- Row -->

	</div>
</section>
<!-- ============================ Dashboard: My Order Start End ================================== -->
<?php require_once "maininclude/footer.php"; ?>