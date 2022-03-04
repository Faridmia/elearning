<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
    exit();
}
	require_once('admin/init.php');
	
	require_once('admin/functions.php');


	$database = new Database();
	$conn        = $database->connection;
	$token = $database->token($database->generatetoken());
	if($_POST){
		$page           			= escape($_POST['page']);
		$cid            			= (int) escape($_POST['cid']); 
		$course_title         		= escape($_POST['course_title']); 
		$course_orginal_price   	= escape($_POST['course_orginal_price']);
		
		$course_overview_provider   = escape($_POST['course_overview_provider']);
		$course_tag            		= escape($_POST['course_tag']);
		$video_url        			= escape($_POST['course_provider_url']);
		$course_desc        		= $_POST['course_desc'];
		$outcomes       			= escape($_POST['outcome']);
		$course_duration       		= escape($_POST['course_duration']);
		$course_sell_price       	= escape($_POST['course_sell_price']);
		$long_desc       			= $_POST['long_desc'];
		$level       				= escape($_POST['course_level']);
		
		$requirement       			= $_POST['course_req'];
		$course_features       		= $_POST['course_feature'];
		$category_id       			= escape($_POST['course_category']);
		
		if(isset($_FILES['course_images']['name'])){
			$file_name   = $_FILES['course_images']['name'];
			$explode     = explode(".", $file_name);
			$extension   = end($explode);
			$tmp_name    = $_FILES['course_images']['tmp_name'];
			$size        = $_FILES['course_images']['size'];
			$type        = $_FILES['course_images']['type'];

		}

		$free_course             	= '';
		if(!empty($_POST['free_course'])) {
			$free_course   				= ($_POST['free_course'] == 'on') ? 1 : 0;
		}
		$is_top_course = '';
		if(!empty($_POST['is_top_course'])){
			$is_top_course       		= ($_POST['is_top_course'] == 'on') ? 1 : 0;
		}

		$is_featured_course = '';
		if(!empty($_POST['is_featured_course'])){
			$is_featured_course       	= ($_POST['is_featured_course'] == 'on') ? 1 : 0;
		}

        $data = array(
			'course_title' 				=> $course_title,
			'course_original_price' 	=> $course_orginal_price,
			'is_free_course' 			=> $free_course,
			'course_overview_provider' 	=> $course_overview_provider,
			'course_tag' 				=> $course_tag,
			'video_url' 				=> $video_url,
			'course_desc' 				=> $course_desc,
			'outcomes' 					=> $outcomes,
			'course_duration' 			=> $course_duration,
			'course_sell_price' 		=> $course_sell_price,
			'long_desc' 				=> $long_desc,
			'level' 					=> $level,
			'is_top_course' 			=> $is_top_course,
			'requirement' 				=> $requirement,
			'course_features' 			=> $course_features,
			'category_id' 				=> $category_id,
			'is_featured_course' 	    => $is_featured_course,
		);

		if(!empty(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name']))) {
			$newFile 	 = random(10).'.'.$extension;
			$dataFile 	 = array('course_img' => $newFile);
			$data 		 = array_merge($data, $dataFile);
		}
        $query = $database->updatedata('courses',$data,'course_id', '=', $cid);
		if($query){
			echo "<div class='alert alert-success'>Update Successfully.</div>";
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