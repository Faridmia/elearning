<?php
require_once 'includes/header.php';
?>
<div id="main-wrapper">
	<!-- Start Navigation -->
	<?php require_once 'includes/top-nav.php'; ?>
	<!-- ============================================================== -->
	<!-- Top header  -->
	<!-- ============================================================== -->
	<!-- ============================ Dashboard: My Order Start ================================== -->
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
									<li class="breadcrumb-item active" aria-current="page">Update Section</li>
								</ol>
							</nav>
						</div>
					</div>

					<?php if (isset($_GET['sectionid'])) {

						
						$conn      = $database->connection;
						$sectionid = (int) $_GET['sectionid'];
						$data      = array('section_id', 'section_title', 'course_id');
						$query     = $database->getData("section", $data, "section_id", '=', "$sectionid");
						$numrows   = $database->numRows($query);
						if ($numrows > 0) {
							$fetch         = mysqli_fetch_array($query);
							$section_title = $fetch['section_title'];
							$course_id_db  = $fetch['course_id'];
							$section_id    = $fetch['section_id'];

					?>
							<!-- /Row -->
							<form action="" method="post" id="update_section_data" enctype="multipart/form-data">
								<!-- Row -->
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="dashboard_container">
											<div class="dashboard_container_header">
												<div class="dashboard_fl_1">
													<h4>Edit Section</h4>
												</div>
											</div>
											<div class="dashboard_container_body p-4">
												<div class="form-group">
													<div id="success"></div>
												</div>
												<!-- Basic info -->
												<div class="submit-section">
													<div class="form-row">
														<div class="form-group col-md-12">
															<label>Section Title</label>
															<input type="text" name="section_title" class="form-control" value="<?php echo $section_title; ?>">
														</div>
														<div class="form-group col-md-12">
															<label>Course Name/ID</label>
															<div class="col-sm-12">
																<select name="course_name" class="form-control p_category">
																	<option value="">--select course--</option>
																	<?php
																	
																	if (isset($_SESSION['is_login'])) {
																		$user_login = $_SESSION['username'];
																	}

																	$data = array('course_id', 'course_title', 'user_id');

																	$sql         = "SELECT * FROM courses WHERE status = 1 AND user_id = '$user_login'";
																	$querycourse = mysqli_query($conn, $sql);

																	while ($row = mysqli_fetch_array($querycourse)) {
																		$course_id = (int) $row['course_id'];
																		$sel       = "";
																		if ($course_id_db == $course_id) {
																			$sel = "selected = 'selected'";
																		}

																		$course_title = $row['course_title'];
																		echo "<option $sel value='$course_id'>$course_title</option>";
																	}
																	?>
																</select>
															</div>
														</div>
													</div>
												</div>
												<!-- Basic info -->
											</div>

										</div>
									</div>
								</div>
								<!-- /Row -->
								<!-- /Row -->
								<div class="row">
									<div class="form-group col-lg-12 col-md-12">
										<input type="hidden" name="sectionid" value="<?php echo $section_id; ?>" />
										<input type="hidden" name="page" value="section" />
										<?php echo $database->formtoken(); ?>
										<button class="btn btn-theme" name="update_section" type="submit">Update Section</button>
									</div>
								</div>
							</form>
						<?php
						} else {
							echo "<div class='alert alert-danger'>No! Section found it</div>";
						}

						?>

					<?php } else { ?>
						<!-- /Row -->
						<form action="" method="post" id="add_section_data" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add Section</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<div class="form-group">
												<div id="success"></div>
											</div>
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
													<div class="form-group col-md-12">
														<label>Section</label>
														<input type="text" name="section_title" class="form-control" placeholder="Section Name">
													</div>
													<div class="form-group col-md-12">
														<label>Course Name/ID</label>
														<div class="col-sm-12">
															<select name="course_name" class="form-control p_category">
																<option value="">--select course--</option>
																<?php

																
																if (isset($_SESSION['is_login'])) {
																	$user_login = $_SESSION['username'];
																}
																$sql         = "SELECT * FROM courses WHERE status = 1 AND user_id = '$user_login'";
																$querycourse = mysqli_query($conn, $sql);

																while ($row = mysqli_fetch_array($querycourse)) {
																	$course_id    = (int) $row['course_id'];
																	$course_title = $row['course_title'];
																	echo "<option value='$course_id'>$course_title</option>";
																}
																?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<!-- Basic info -->
										</div>

									</div>
								</div>
							</div>
							<!-- /Row -->
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<input type="hidden" name="page" value="add_section" />
									<?php echo $database->formtoken(); ?>
									<button class="btn btn-theme" name="add_section" type="submit">Add Section</button>
								</div>
							</div>
						</form>

						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="dashboard_container">
									<div class="dashboard_container_header">
										<div class="dashboard_fl_1">
											<h4>All Section</h4>
										</div>
									</div>
									<div class="dashboard_container_body">
										<div class="table-responsive">
											<?php
										
											$conn     = $database->connection;

											if (isset($_SESSION['username'])) {
												$user_login = $_SESSION['username'];
											}
											$sql         = "SELECT * FROM courses WHERE status = 1 AND user_id = '$user_login'";
											$querycourse = mysqli_query($conn, $sql);

										


											 ?>
											<table class="table table-striped">
												<thead class="thead-dark">
													<tr>
														<th scope="col">SL NO</th>
														<th scope="col">Section Name</th>
														<th scope="col">Action</th>

													</tr>
												</thead>
												<tbody>
													<?php
													while ($course_data = mysqli_fetch_array($querycourse)) {

														$course_id_db = $course_data['course_id'];

														$data  = array('section_title', 'course_id', 'section_id');
														$query = $database->getData("section", $data,'course_id' ,'=' ,$course_id_db);
													$i = 1;
													while ($row = mysqli_fetch_array($query)) {
														$section_title = $row['section_title'];
														$course_id     = $row['course_id'];
														$section_id    = $row['section_id'];
														echo "<tr>";
														echo "<th scope='row'>$i</th>";
														echo "<td>$section_title</td>";
														echo "<td>
																<div class='dash_action_link'>
																	<a href='add-section.php?sectionid=$section_id&name=section' class='view'>View</a>
																	<a href='delete.php?sectionid=$section_id&name=section' class='cancel'>Cancel</a>
																</div>
															</td>";
														echo "</tr>";
														$i++;
													}
												}
													?>
												</tbody>
											</table>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- /Row -->
					<?php } ?>
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
	$('#update_section_data').submit(function(e) {
		e.preventDefault();
		var data = new FormData(this);
		$.ajax({
			type: 'POST',
			url: 'edit_process.php',
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

	$('#add_section_data').submit(function(e) {
		//alert("test form data");
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