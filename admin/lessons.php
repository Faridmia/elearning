<?php require_once 'includes/header.php';
$database = new Database();
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
									<li class="breadcrumb-item active" aria-current="page">Update Lesson</li>
								</ol>
							</nav>
						</div>
					</div>

					<?php if (isset($_GET['lessonid'])) {

						$database = new Database();
						$conn     = $database->connection;
						$lessonid = (int) $_GET['lessonid'];
						$data     = array('lesson_id', 'lesson_title', 'course_id', 'section_id', 'video_url', 'upload_video');
						$query    = $database->getData("lesson", $data, "lesson_id", '=', "$lessonid");
						$numrows  = $database->numRows($query);
						if ($numrows > 0) {
							$fetch         = mysqli_fetch_array($query);
							$lesson_id     = $fetch['lesson_id'];
							$lesson_title  = $fetch['lesson_title'];
							$course_id_db  = $fetch['course_id'];
							$section_Db_id = $fetch['section_id'];
							$video_url     = $fetch['video_url'];
							$upload_video  = $fetch['upload_video'];

					?>
							<!-- /Row -->
							<form action="" method="post" id="update_lesson_data" enctype="multipart/form-data">
								<!-- Row -->
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="dashboard_container">
											<div class="dashboard_container_header">
												<div class="dashboard_fl_1">
													<h4>Edit Lesson</h4>
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
															<label>Lesson Title</label>
															<input type="text" name="lesson_title" class="form-control" value="<?php echo $lesson_title; ?>">
														</div>
														<div class="form-group col-md-6">
															<label>Course Video</label>
															<input type="file" class="form-control" id="course_video" name='course_video' value="<?php echo $upload_video; ?>" />
														</div>
														<!-- Part 1 -->
														<div class="form-group col-md-6">

															<div class="vid">
																<video style="width:200px;height:auto;" src="../assets/video/<?php echo $upload_video; ?>" controls muted autoplay></video>
															</div>

														</div>
														<div class="form-group col-md-12">
															<label>Video URL</label>
															<input type="text" name="video_url" class="form-control" value="<?php echo $video_url; ?>">
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

																	$database = new Database();

																	while ($row = mysqli_fetch_array($querycourse)) {
																		$course_id    = (int) $row['course_id'];
																		$course_title = $row['course_title'];
																		$sel          = "";
																		if ($course_id_db == $course_id) {
																			$sel = "selected = 'selected'";
																		}
																		echo "<option $sel value='$course_id'>$course_title</option>";
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="form-group col-md-12">
															<label>Section Name/ID</label>
															<div class="col-sm-12">
																<select name="section_name" class="form-control p_category">
																	<option value="">--select section--</option>
																	<?php
																	$database = new Database();
																	$data     = array('section_id', 'section_title');
																	$query    = $database->getData("section", $data);

																	while ($row = mysqli_fetch_array($query)) {
																		$section_id    = (int) $row['section_id'];
																		$section_title = $row['section_title'];
																		$sel           = "";
																		if ($section_Db_id == $section_id) {
																			$sel = "selected = 'selected'";
																		}

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
										<input type="hidden" name="lessonid" value="<?php echo $lesson_id; ?>" />
										<input type="hidden" name="page" value="lesson" />
										<?php echo $database->formtoken(); ?>
										<button class="btn btn-theme" name="update_lesson" type="submit">Update Lesson</button>
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
						<form action="" method="post" id="add_lesson_data" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add Lesson</h4>
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
														<label>Lesson</label>
														<input type="text" name="lesson_title" class="form-control" placeholder="Lesson Name">
													</div>
													<div class="form-group col-md-12">
														<label>Video Url</label>
														<input type="text" name="video_url" class="form-control" placeholder="Video URL">
													</div>
													<div class="form-group col-md-6">
														<label>Course Video</label>
														<input type="file" class="form-control" id="course_video" name='course_video' value="" />
													</div>
													<div class="form-group col-md-12">
														<label>Course Name/ID</label>
														<div class="col-sm-12">
															<select name="course_name" class="form-control p_category">
																<option value="">--select course--</option>
																<?php
																$database = new Database();
																$data     = array('course_id', 'course_title');
																$query    = $database->getData("courses", $data);

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
													<div class="form-group col-md-12">
														<label>section Name/ID</label>
														<div class="col-sm-12">
															<select name="section_name" class="form-control p_category">
																<option value="">--select section--</option>
																<?php
																
																if (isset($_SESSION['is_login'])) {
																	$user_login = $_SESSION['username'];
																}
																$sql         = "SELECT * FROM courses WHERE status = 1 AND user_id = '$user_login'";
																$querycourse = mysqli_query($conn, $sql);
																
															
																while ($c_row = mysqli_fetch_array($querycourse)) {

																	$course_id_db = $c_row['course_id'];
																	$data         = array('section_id', 'section_title');
																	
																	$query        = $database->getData("section", $data,'course_id','=',$course_id_db);

																	while ($row = mysqli_fetch_array($query)) {
																		$section_id    = (int) $row['section_id'];
																		$section_title = $row['section_title'];
																		echo "<option value='$section_id'>$section_title</option>";
																	}
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
									<input type="hidden" name="page" value="add_lesson" />
									<?php echo $database->formtoken(); ?>
									<button class="btn btn-theme" name="add_lesson" type="submit">Add Lesson</button>
								</div>
							</div>
						</form>

						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="dashboard_container">
									<div class="dashboard_container_header">
										<div class="dashboard_fl_1">
											<h4>All Lesson</h4>
										</div>
									</div>
									<div class="dashboard_container_body">
										<div class="table-responsive">
											<?php
											
											$conn     = $database->connection;
										
											if (isset($_SESSION['is_login'])) {
												$user_login = $_SESSION['username'];
											}
											$sql         = "SELECT * FROM courses WHERE status = 1 AND user_id = '$user_login'";
											$querycourse = mysqli_query($conn, $sql);
											
											
											
											?>
											<table class="table table-striped">
												<thead class="thead-dark">
													<tr>
														<th scope="col">SL NO</th>
														<th scope="col">Lesson Name</th>
														<th scope="col">Action</th>

													</tr>
												</thead>
												<tbody>
													<?php
													while ($course_data = mysqli_fetch_array($querycourse)) {

														$course_id_db = $course_data['course_id'];
														
														$data        = array('lesson_title', 'section_id', 'video_url', 'lesson_id', 'course_id', 'upload_video');
														$sqllesson  = $database->getData("lesson", $data, 'course_id' ,'=',$course_id_db); 

												
															$i = 1;
															while ($row = mysqli_fetch_array($sqllesson)) {
																$lesson_title = $row['lesson_title'];
																$lesson_id    = $row['lesson_id'];
																$upload_video = $row['upload_video'];

																echo "<tr>";
																echo "<th scope='row'>$i</th>";
																echo "<td>$lesson_title</td>";
																echo "<td>
																		<div class='dash_action_link'>
																			<a href='lessons.php?lessonid=$lesson_id&name=lesson' class='view'>View</a>
																			<a href='delete.php?lessonid=$lesson_id&name=lesson' class='cancel'>Cancel</a>
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
	$('#update_lesson_data').submit(function(e) {
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

	$('#add_lesson_data').submit(function(e) {
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