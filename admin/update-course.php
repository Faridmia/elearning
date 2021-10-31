<?php
	require_once('init.php');
	require_once('functions.php');

	$database = new Database();
	$conn        = $database->connection;
	$token = $database->token($database->generatetoken());
	if($token){
		$page           		= escape($_POST['page']);
		$cid            		= (int) escape($_POST['cid']); 
		$course_title         	= escape($_POST['course_title']); 
		$course_orginal_price   = escape($_POST['course_orginal_price']);
		$course_tag             = escape($_POST['course_tag']);
		$course_sell_price      = escape($_POST['course_sell_price']);
		$course_desc            = escape($_POST['course_desc']);
		$course_category        = escape($_POST['course_category']);
		$course_durations       = escape($_POST['course_durations']);
		
		if(isset($_FILES['course_images']['name'])){
			$file_name   = $_FILES['course_images']['name'];
			$explode     = explode(".", $file_name);
			$extension   = end($explode);
			$tmp_name    = $_FILES['course_images']['tmp_name'];
			$size        = $_FILES['course_images']['size'];
			$type        = $_FILES['course_images']['type'];

		}

        $data = array(
			'course_title' 				=> $course_title,
			'course_original_price' 	=> $course_orginal_price,
			'course_tag' 				=> $course_tag,
			'course_sell_price' 		=> $course_sell_price,
			'course_desc' 				=> $course_desc,
			'course_category' 			=> $course_category,
			'course_duration' 			=> $course_durations
		);

		if(!empty(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name']))) {
			$newFile 	 = random(10).'.'.$extension;
			$dataFile 	 = array('course_img' => $newFile);
			$data 		 = array_merge($data, $dataFile);
		}
        $query = $database->updatedata('courses',$data,'course_id', '=', $cid);
		if($query){
			echo "<div class='alert alert-success'>Update successfully.</div>";
			if(!empty(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name']))) {
				move_uploaded_file($tmp_name, '../assets/img/course/'.$newFile);
			} ?>

				<script>
					setTimeout(function(){
						window.location = "all-courses.php";

					},3000);	
				</script>
		<?php	
		}
		else
		{
			echo "<div class='alert alert-danger'>data not updated</div>";
			echo mysqli_error($conn);
		}			
	}
	
?>