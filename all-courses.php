<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
    exit();
}
require_once "maininclude/dashboard-header.php";
$conn     = $database->connection;

if (isset($_SESSION['is_login'])) {
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

			<?php require_once "maininclude/dashboard-menubar.php"; ?>

			<div class="col-lg-9 col-md-9 col-sm-12">
				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">All Course</li>
							</ol>
						</nav>
					</div>
				</div>

				<!-- Row -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="dashboard_container">
							<div class="dashboard_container_header">
								<div class="dashboard_fl_1">
									<h4>All Course</h4>
								</div>
							</div>
							<div class="dashboard_container_body">
								<div class="table-responsive">
									<?php
									
									$conn     = $database->connection;

									if (isset($_SESSION['is_login'])) {
										$user_login = $_SESSION['user_email'];
										
									}

									$usersql = "SELECT * FROM users where email = '$user_login'";

									$userquery = mysqli_query($conn, $usersql);

									$userfetch = mysqli_fetch_array($userquery);

									$users_id = $userfetch['users_id'];

									$sql   = "SELECT * FROM courses WHERE status = 1 AND users_id = '$users_id'";
									$query = mysqli_query($conn, $sql);

									?>
									<table class="table table-striped">
										<thead class="thead-dark">
											<tr>
												<th scope="col">ID</th>
												<th scope="col">Course Title</th>
												<th scope="col">Course Level</th>
												<th scope="col">Course Category</th>
												<th scope="col">Course Image</th>
												<th scope="col">Section & Lesson</th>
												<th scope="col">Enroll Student</th>
												<th scope="col">Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											while ($row = mysqli_fetch_array($query)) {
												$course_id  = (int) $row['course_id'];
												$enroll_sql = "SELECT * FROM enroll WHERE course_id = {$course_id}";

												$enroll_query = mysqli_query($conn, $enroll_sql);
												$fetch_enroll = mysqli_fetch_array($enroll_query);
												$total_enroll = $database->numRows($enroll_query);

												// total lesson list

												$lesson_sql = "SELECT * FROM lesson WHERE course_id = {$course_id}";
												$lesson_query = mysqli_query($conn, $lesson_sql);
												$total_lesson = $database->numRows($lesson_query);

												$course_title      = $row['course_title'];
												$course_instractor = $row['level'];
												$course_category   = $row['category_id'];
												$course_img        = $row['course_img'];

												// category query

												$cat_sql = "SELECT * FROM categories WHERE cat_id = {$course_category}";

												$cat_query = mysqli_query($conn, $cat_sql);
												$fetch_cat = mysqli_fetch_array($cat_query);

												$category_name = $fetch_cat['cat_name'];

												echo "<tr>";
												echo "<th scope='row'>$i</th>";
												echo "<td>$course_title</td>";
												echo "<td>$course_instractor</td>";
												echo "<td>$category_name</td>";
												echo "<td><img src='assets/img/course/$course_img' width='100px'></td>";
												echo "<td>$total_lesson</td>";
												echo "<td>$total_enroll</td>";
												echo "<td>
																<div class='dash_action_link'>
																	<a href='edit-course.php?courseid=$course_id&name=course' class='view'>View</a>
																	<a href='delete.php?courseid=$course_id&name=course' class='cancel'>Cancel</a>
																</div>
															</td>";
												echo "</tr>";
												$i++;
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
			</div>
		</div>
		<!-- Row -->
	</div>
</section>
<!-- ============================ Dashboard: My Order Start End ================================== -->
<?php require_once "maininclude/footer.php"; ?>