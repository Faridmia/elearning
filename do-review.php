<?php
require_once 'admin/init.php';
$database  = new Database();
$conn      = $database->connection;
$rating    = $_POST['rating'];
$message   = $_POST['message'];
$course_id = $_POST['course_id'];
$users_id  = $_POST['users_id'];

$added = date( "Y-m-d h:i:s" );
$data  = array( 'rating' => $rating, 'users_id' => $users_id, 'course_id' => $course_id, 'r_name' => $name, 'email' => $email, 'message' => $message, 'added' => $added );
$query = $database->insertdata( 'reviews', $data );
if ( $query ) {
    echo "<div class='alert alert-success'>Review has been submitted</div>";
    ?>
	<script>
		setTimeout(function() {
			var id = <?php echo $course_id . ';'; ?>
			window.location = 'detail.php?courseid=' + id;
		}, 3000);
	</script>
<?php
} else {
    echo "<div class='alert alert-danger'>Something is wrong.</div>";
}

echo "hello";