<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
    exit();
}
require_once "maininclude/dashboard-header.php";

$database = new Database();
$conn     = $database->connection;

if (isset($_SESSION['is_login'])) {
	$user_login      = $_SESSION['user_email'];
	$query           = "SELECT * FROM users WHERE email = '$user_login'";
	$result          = $conn->query($query);
	$row             = mysqli_fetch_array($result);
	$username        = $row['name'];
	$email           = $row['email'];
	$profile_photo   = $row['user_profile_photo'];
	$users_id        = $row['users_id'];
	$biography       = $row['biography'];
	$user_experience = $row['user_experience'];
	$description     = $row['description'];
	$social_link     = $row['social_link'];
	$social_array    = explode(" ", $social_link);

	$name   = isset($_GET['name']) ? $_GET['name'] : '';
	$data_1 = $social_array[0] ?? '';
	$data_2 = $social_array[1] ?? '';
	$data_3 = $social_array[2] ?? '';

	$enroll_sql    = "SELECT * FROM enroll";
	$result_enroll = $conn->query($enroll_sql);
	$fetch_enroll  = mysqli_fetch_array($result_enroll);

	$enroll_course_id = $fetch_enroll['course_id'];

	$lesson_sql = "SELECT * FROM lesson WHERE course_id = {$enroll_course_id} AND status = 1";

	$lesson_query = $conn->query($lesson_sql);
	$fetch_lesson = mysqli_fetch_array($lesson_query);

	$lesson_user = $fetch_lesson['course_id'];

	if ( isset( $_GET['lessonuserid'] ) ) {
		$lessonuserid = $_GET['lessonuserid'];

		$lesson_update = "UPDATE lesson SET status = 0 WHERE course_id = {$lessonuserid}";

		$update_sql = mysqli_query($conn, $lesson_update);
		if ($update_sql) {
			echo "success";
		}
	}
}
?>

<!-- ============================ Dashboard: My Order Start ================================== -->
<section class="gray pt-0">
	<div class="container-fluid">

		<!-- Row -->
		<div class="row">

			<div class="col-lg-3 col-md-3 p-0">
				<div class="dashboard-navbar">
					<div class="d-user-avater">
						<?php if (!empty($profile_photo)) : ?>
							<img src="assets/img/profile/<?php echo $profile_photo; ?>" class="img-fluid avater" alt="">
						<?php else : ?>
							<img src="assets/img/placeholder.png" class="img-fluid avater" alt="">
						<?php endif; ?>
						<?php if (!empty($username)) : ?>
							<h4><?php echo $username; ?></h4>
						<?php else : ?>
							<h4>Farid Mia</h4>
						<?php endif; ?>
						<?php if (!empty($email)) : ?>
							<span><?php echo $email; ?></span>
						<?php else : ?>
							<span>mdfarid7830@gmail.com</span>
						<?php endif; ?>
					</div>

					<div class="d-navigation">
						<ul id="side-menu">
							<li class="dropdown active">
								<a href="users-settings.php"><i class="ti-settings"></i>Settings<span class="ti-angle-left"></span></a>
								<ul class="nav nav-second-level collapse show" style="">
									<li><a href="users-settings.php">Profile</a></li>
									<?php echo "<li><a href='users-settings.php?userid=$users_id&name=account'>Account</a></li>"; ?>
									<?php echo "<li><a href='users-settings.php?userid=$users_id&name=photo'>Photo</a></li>"; ?>
									<?php echo "<li><a href='users-settings.php?userid=$users_id&name=education'>Education</a></li>"; ?>
									<li class="notification-count"><a href="users-settings.php?lessonuserid=<?php echo $lesson_user; ?>">Notifications</a>
										<?php
										if ($fetch_lesson > 0) { ?>
											<span>
												<?php
												if ($fetch_lesson > 0) {
													$lesson_num_Rows = mysqli_num_rows($lesson_query);
													echo $lesson_num_Rows;
												}
												?>
											</span>
										<?php } ?>
									</li>

								</ul>
							</li>
							<li><a href="logout.php"><i class="ti-power-off"></i>Log Out</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-9 col-md-9 col-sm-12">

				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Settings</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- /Row -->
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="dashboard_container">
							<div class="dashboard_container_header">
								<div class="dashboard_fl_1">
									<h4>Setup Your Detail</h4>
								</div>
							</div>
							<?php
							if (isset($_GET['userid']) && $name == 'account') { ?>
								<form action="" method="post" id="update_user_account" enctype="multipart/form-data">
									<div class="dashboard_container_body p-4">
										<!-- Social Account info -->
										<div class="form-submit">
											<div class="submit-section">
												<div class="form-row">
													<div class="form-group col-md-6">
														<label>Email</label>
														<input type="email" name="user_email" class="form-control" value="<?php echo $email; ?>">
													</div>
													<div class="form-group col-md-6">
														<label>Current Password</label>
														<input type="password" name="old_pass" class="form-control" value="">
													</div>
													<div class="form-group col-md-6">
														<label>New Password</label>
														<input type="password" name="new_pass" class="form-control" value="">
													</div>
													<div class="form-group col-md-6">
														<label>Re-Type Password</label>
														<input type="password" name="re_pass" class="form-control" value="">
													</div>
													<div class="form-group col-lg-12 col-md-12">
														<input type="hidden" name="userid" value="<?php echo $users_id; ?>" />
														<input type="hidden" name="page" value="changepassword" />
														<?php echo $database->formtoken(); ?>
														<button type="submit" class="btn btn-theme" name="changepasswordbtn">Save Changes</button>
													</div>

												</div>
											</div>
										</div>
										<!-- / Social Account info -->
									</div>
								</form>
							<?php } else if (isset($_GET['userid']) && $name == 'photo') {
							?>
								<form action="" method="post" id="update_user_photo" enctype="multipart/form-data">
									<div class="dashboard_container_body p-4">
										<!-- Social Account info -->
										<div class="form-submit">
											<div class="submit-section">
												<div class="form-row">
													<div class="form-group col-md-12">
														<label>Profile Photo Update</label>
														<input type="file" class="form-control" id="profile_photo" name='user_photo' value="" />
													</div>
													<div class="form-group col-lg-12 col-md-12">
														<input type="hidden" name="userid" value="<?php echo $users_id; ?>" />
														<input type="hidden" name="page" value="user_photo" />
														<?php echo $database->formtoken(); ?>
														<button type="submit" class="btn btn-theme" name="submit">Save Changes</button>
													</div>

												</div>
											</div>
										</div>
										<!-- / Social Account info -->
									</div>
								</form>
							<?php } elseif (isset($_GET['userid']) && $name == 'education') {

								$userid = $_GET['userid'];
								$data   = array(
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

								$ver_skill_title = $rowdata['ver_skill_title'];
								$ver_session     = $rowdata['ver_session'];
								$ver_name        = $rowdata['ver_name'];
								$ver_desc        = $rowdata['ver_desc'];

								$coll_skill_title = $rowdata['coll_skill_title'];
								$coll_session     = $rowdata['coll_session'];
								$coll_name        = $rowdata['coll_name'];
								$coll_desc        = $rowdata['coll_desc'];

							?>
								<div class="dashboard_container_body p-4">
									<!-- Collage info -->
									<form action="" method="post" id="update_user_education" enctype="multipart/form-data">
										<div class="form-submit">
											<h4 class="pl-2 mt-2">Collage Info</h4>
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-6">
														<label>Skill Title</label>
														<input type="text" name="skill_title" class="form-control" value="<?php echo $coll_skill_title; ?>">
													</div>

													<div class="form-group col-md-6">
														<label>Session</label>
														<input type="text" name="session" class="form-control" value="<?php echo $coll_session; ?>">
													</div>
													<div class="form-group col-md-6">
														<label>Collage Name</label>
														<input type="text" name="clg_name" class="form-control" value="<?php echo $coll_name; ?>">
													</div>
													<div class="form-group col-md-6">
														<label>skill Description</label>
														<input type="text" name="skill_desc" class="form-control" value="<?php echo $coll_desc; ?>">
													</div>

												</div>
											</div>
										</div>
										<!-- / Social Account info -->

										<!-- university info -->
										<div class="form-submit">
											<h4 class="pl-2 mt-2">University Info</h4>
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-6">
														<label>Skill Title</label>
														<input type="text" name="skill_title_2" class="form-control" value="<?php echo $ver_skill_title; ?>">
													</div>

													<div class="form-group col-md-6">
														<label>Session</label>
														<input type="text" name="session_2" class="form-control" value="<?php echo $ver_session; ?>">
													</div>
													<div class="form-group col-md-6">
														<label>University Name</label>
														<input type="text" name="versity_name" class="form-control" value="<?php echo $ver_name; ?>">
													</div>
													<div class="form-group col-md-6">
														<label>skill Description</label>
														<input type="text" name="skill_desc_2" class="form-control" value="<?php echo $ver_desc; ?>">
													</div>

													<div class="form-group col-lg-12 col-md-12">
														<input type="hidden" name="userid" value="<?php echo $users_id; ?>" />
														<input type="hidden" name="page" value="user_education" />
														<?php echo $database->formtoken(); ?>
														<button type="submit" class="btn btn-theme" name="submit">Save Changes</button>
													</div>

												</div>
											</div>
										</div>
										<!-- / Social Account info -->
									</form>
								</div>
							<?php } else { ?>
								<form action="" method="post" id="update_user_profile" enctype="multipart/form-data">
									<div class="dashboard_container_body p-4">
										<!-- Basic info -->
										<div class="submit-section">
											<div class="form-row">

												<div class="form-group col-md-6">
													<label>Your Name</label>
													<input type="text" name="user_name" class="form-control" value="<?php echo $username; ?>">
												</div>

												<div class="form-group col-md-6">
													<label>Email</label>
													<input type="email" readonly name="user_email" class="form-control" value="<?php echo $email; ?>">
												</div>

												<div class="form-group col-md-12">
													<label>Designation:</label>
													<textarea class="form-control" name="biography"><?php echo $biography; ?></textarea>
												</div>
												<div class="form-group col-md-12">
													<label>Description:</label>
													<textarea class="form-control" name="user_desc"><?php echo $description; ?></textarea>
												</div>
												<div class="form-group col-md-12">
													<label>Experience</label>
													<input type="text" name="user_experience" class="form-control" value="<?php echo $user_experience; ?>">
												</div>

											</div>
										</div>
										<!-- Basic info -->

										<!-- Social Account info -->
										<div class="form-submit">
											<h4 class="pl-2 mt-2">Social Accounts</h4>
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-6">
														<label>Facebook</label>
														<input type="text" name="user_facebook" placeholder="https://facebook.com/" class="form-control" value="<?php echo $data_1; ?>">
													</div>

													<div class="form-group col-md-6">
														<label>Twitter</label>
														<input type="text" name="user_twitter" placeholder="https://twitter.com/" class="form-control" value="<?php echo $data_2; ?>">
													</div>
													<div class="form-group col-md-12">
														<label>LinkedIn</label>
														<input type="text" name="user_linkedin" placeholder="https://linkedin.com/" class="form-control" value="<?php echo $data_3; ?>">
													</div>
													<div class="form-group col-lg-12 col-md-12">
														<input type="hidden" name="userid" value="<?php echo $users_id; ?>" />
														<input type="hidden" name="page" value="user_profile" />
														<?php echo $database->formtoken(); ?>
														<button type="submit" class="btn btn-theme" name="submit">Save Changes</button>
													</div>

												</div>
											</div>
										</div>
										<!-- / Social Account info -->
									</div>
								</form>
							<?php } ?>
							<div class="form-group">
								<div id="success"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

			</div>

		</div>
		<!-- Row -->

	</div>
</section>
<!-- ============================ Dashboard: My Order Start End ================================== -->
<?php require_once "maininclude/footer.php"; ?>