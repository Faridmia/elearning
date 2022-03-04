<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
    exit();
}
ob_start();
require_once 'admin/init.php';

require_once 'admin/functions.php';

$database = new Database();
$conn     = $database->connection;
$token    = $database->token($database->generatetoken());
$page = $_POST['page'];

if ($page == 'user_profile') {

	$userid          = (int) $_POST['userid'];
	$user_name       = escape($_POST['user_name']);
	$biography       = escape($_POST['biography']);
	$user_experience = escape($_POST['user_experience']);
	$user_desc       = escape($_POST['user_desc']);
	$user_facebook   = escape($_POST['user_facebook']);
	$user_twitter    = escape($_POST['user_twitter']);
	$user_linkedin   = escape($_POST['user_linkedin']);

	$social_data = [
		$user_facebook,
		$user_twitter,
		$user_linkedin,
	];

	$implode_data = join(" ", $social_data); //prints 1, 2, 3

	$data  = array('name' => $user_name, 'biography' => $biography, 'user_experience' => $user_experience, 'description' => $user_desc, 'social_link' => $implode_data);
	$query = $database->updatedata('users', $data, 'users_id', '=', $userid);

	if ($query) {
		echo "<div class='alert alert-success'>";
		echo "Profile updated";
?>
		<script>
			setTimeout(function() {
				window.location = "users-settings.php";

			}, 3000);
		</script>
	<?php
		echo "<div>";
	} else {
		echo "<div class='alert alert-danger'>";
		echo "Profile is not updated" . mysqli_error($conn);
		echo "<div>";
	}
} // elseif end
elseif ($page == 'user_education') {

	$userid = $_POST['userid'];

	$skill_title   = escape($_POST['skill_title']);
	$session       = escape($_POST['session']);
	$clg_name      = escape($_POST['clg_name']);
	$skill_desc    = escape($_POST['skill_desc']);
	$skill_title_2 = escape($_POST['skill_title_2']);
	$session_2     = escape($_POST['session_2']);
	$versity_name  = escape($_POST['versity_name']);
	$skill_desc_2  = escape($_POST['skill_desc_2']);

	$data = array(
		'coll_skill_title' => $skill_title,
		'coll_session'     => $session,
		'coll_name'        => $clg_name,
		'coll_desc'        => $skill_desc,
		'ver_skill_title'  => $skill_title_2,
		'ver_session'      => $session_2,
		'ver_name'         => $versity_name,
		'ver_desc'         => $skill_desc_2,
		'users_id'         => $userid,
	);

	$edu_sql = "SELECT * FROM education";
	$edu_query = mysqli_query($conn, $edu_sql);

	$fetch_edu   = mysqli_fetch_array($edu_query);
	$data_userid = $fetch_edu['users_id'];

	if ($userid != $data_userid) {
		$insert_query = $database->insertdata('education', $data);
	}

	$numRows = $database->numRows($edu_query);

	$query = $database->updatedata('education', $data, 'users_id', '=', $userid);

	if ($query) {
		echo "<div class='alert alert-success'>";
		echo "Education updated";
	?>
		<script>
			setTimeout(function() {
				window.location = "users-settings.php";

			}, 3000);
		</script>
	<?php
		echo "<div>";
	} else {
		echo "<div class='alert alert-danger'>";
		echo "Education is not updated" . mysqli_error($conn);
		echo "<div>";
	}
} elseif ($page == 'user_photo') {

	$userid = $_POST['userid'];

	if (isset($_FILES['user_photo']['name'])) {
		$file_name = $_FILES['user_photo']['name'];
		$explode   = explode(".", $file_name);
		$extension = end($explode);
		$tmp_name  = $_FILES['user_photo']['tmp_name'];
		$size      = $_FILES['user_photo']['size'];
		$type      = $_FILES['user_photo']['type'];
	}

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	$added = time();

	if (!empty(isset($_FILES['user_photo']['name']) && !empty($_FILES['user_photo']['name']))) {
		$newFile  = random(10) . '.' . $extension;
		$dataFile = array('user_profile_photo' => $newFile);
	}

	$added = time();
	$query = $database->updatedata('users', $dataFile, 'users_id', '=', $userid);
	if ($query) {
		echo "<div class='alert alert-success'>Update successfully.</div>";
		if (!empty(isset($_FILES['user_photo']['name']) && !empty($_FILES['user_photo']['name']))) {
			move_uploaded_file($tmp_name, 'assets/img/profile/' . $newFile);
		} ?>

		<script>
			setTimeout(function() {
				window.location = "users-settings.php";

			}, 3000);
		</script>
		<?php
	} else {
		echo "<div class='alert alert-danger'>data not updated</div>";
		echo mysqli_error($conn);
	}
} elseif ($page == 'changepassword') {

	$userid = (int) $_POST['userid'];

	$old_pass 	  = $_POST['old_pass'];
	$old_hashpass = hash('sha256',$old_pass);
	$new_pass 	  = $_POST['new_pass'];
	$new_hashpass = hash('sha256',$new_pass);
	$re_pass      = $_POST['re_pass'];
	$re_hashpass = hash('sha256',$re_pass);
	$sql_pass     = "SELECT * FROM users WHERE users_id ='$userid'";

	$query = mysqli_query($conn, $sql_pass);

	$chg_pwd1 = mysqli_fetch_array($query);
	$data_pwd = $chg_pwd1['password'];
	if ($data_pwd == $old_hashpass) {
		if ($new_hashpass == $re_hashpass) {
			$sql_update   = "UPDATE users set password = '$new_hashpass' where users_id ='$userid'";
			$update_query = mysqli_query($conn, $sql_update);
			echo "<div class='alert alert-success'>Update successfully.</div>";
		?>
			<script>
				setTimeout(function() {
					window.location = "users-settings.php";
				}, 3000);
			</script>
		<?php } else {
			echo "<div class='alert alert-danger'><script>alert('Your new and Retype Password is not match'); window.location='users-settings.php.php?userid=$userid&name=account'</script></div>";
			echo mysqli_error($conn);
		}
	} else {
		echo "<div class='alert alert-danger'><script>alert('Your old password is wrong'); window.location='users-settings.php?userid=$userid&name=account'</script></div>";
		echo mysqli_error($conn);
	}
} elseif ($page == 'section') {

	$sectionid     = (int) $_POST['sectionid'];
	$section_title = $_POST['section_title'];
	$course_id     = $_POST['course_name'];
	$data          = array('section_title' => $section_title, 'course_id' => $course_id);
	$query         = $database->updatedata('section', $data, 'section_id', '=', $sectionid);

	if ($query) {
		echo "<div class='alert alert-success'>";
		echo "section updated";
		?>
		<script>
			setTimeout(function() {
				window.location = "add-section.php";

			}, 3000);
		</script>
	<?php
		echo "<div>";
	} else {
		echo "<div class='alert alert-danger'>";
		echo "Section is not updated" . mysqli_error($conn);
		echo "<div>";
	}
} // elseif end

elseif ($page == 'lesson') {

	$lessonid     = (int) $_POST['lessonid'];
	$lesson_title = $_POST['lesson_title'];
	$video_url    = $_POST['video_url'];
	$course_name  = $_POST['course_name'];
	$section_name = $_POST['section_name'];


	$data = array('lesson_title' => $lesson_title, 'course_id' => $course_name, 'section_id' => $section_name, 'video_url' => $video_url);


	$query = $database->updatedata('lesson', $data, 'lesson_id', '=', $lessonid);

	if ($query) {
		echo "<div class='alert alert-success'>";
		echo "lesson updated";
	?>
		<script>
			setTimeout(function() {
				window.location = "lessions.php";

			}, 3000);
		</script>
<?php
		echo "<div>";
		
	} else {
		echo "<div class='alert alert-danger'>";
		echo "Section is not updated" . mysqli_error($conn);
		echo "<div>";
	}
} // elseif end

?>