	
	<?php require_once 'includes/header.php';
	$database = new Database();
	$conn = $database->connection;
	?>
	<div id="main-wrapper">
		<!-- Start Navigation -->
		<?php require_once 'includes/top-nav.php'; ?>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->
		<!-- ============================ Dashboard: My Order Start ================================== -->
		<?php
		if (isset($_SESSION['username'])) {
			$user_login = $_SESSION['username'];
			$query      = "SELECT * FROM users WHERE username = '$user_login'";
			$result     = $conn->query($query);
			$row        = mysqli_fetch_array($result);

			$users_id = $row['users_id'];
		}
		?>
		<section class="gray pt-0">
			<div class="container-fluid">

				<!-- Row -->
				<div class="row">
					<?php require_once 'includes/menu-navbar.php'; ?>

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
												<h4>Submit your Course</h4>
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
														<label for="recom_course">Recommand Course</label>
														<select name="recom_course" class="form-control course_com">
															<option value="">--select Course--</option>
															<?php
															$database = new Database();
															$datac    = array('course_id', 'course_title');
															$queryc   = $database->getData("courses", $datac);

															while ($row = mysqli_fetch_array($queryc)) {
																$course_id    = (int) $row['course_id'];
																$course_title = $row['course_title'];
																echo "<option value='$course_id'>$course_title</option>";
															}
															?>
														</select>
													</div>
													<div class="form-group col-md-12">
														<label for="course_category">Course Category</label>
														<select name="course_category" class="form-control course_category">
															<option value="">--select category--</option>
															<?php

															$data  = array('cat_id', 'cat_name');
															$query = $database->getData("categories", $data);

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

									<input type="hidden" name="userid" value="<?php echo $users_id; ?>" />
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
		<?php require_once 'includes/footer.php'; ?>

		<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	<?php require_once 'includes/js.php'; ?>
	<script type="text/javascript">
		$(".course_category").on('change', function(e) {

			var cCatId = $('.course_category').val();
			$.ajax({
				type: 'POST',
				url: 'get-sub-category.php',
				dataType: 'html',
				data: {
					c_id: cCatId,
				},

				beforesend: function() {
					$('.course_sub_category').html('loading.....');
				},
				success: function(result) {
					$('.course_sub_category').html(result);
				}
			});
		});

		$('#add_course_data').submit(function(e) {
			e.preventDefault();
			var data = new FormData(this);

			$.ajax({
				type: 'POST',
				url: 'process.php',
				data: data,
				dataType: 'html',
				contentType: false,
				cache: false,
				processData: false,

				beforesend: function() {
					$('#success').html('loading.....');
				},
				success: function(result) {
					$('#success').html(result);
				}


			});
		});
	</script>

	</body>

	</html>