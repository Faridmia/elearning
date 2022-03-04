<?php
	require_once('admin/init.php');

	require_once('admin/functions.php');


	$database = new Database();
	$token = $database->token($database->generatetoken());
	if($_POST){
		$page = $_POST['page'] ?? '';

		// add course 
		if($page == 'add_course'){

			$course_title         	= escape($_POST['course_title']); 
			$course_orginal_price   = escape($_POST['course_orginal_price']);
			$is_free_course         = isset($_POST['is_free_course']) ? escape($_POST['is_free_course']) : '';
			$course_provider          = escape($_POST['course_provider']);
			$course_tag             = escape($_POST['course_tag']);

			$course_provider_url    = escape($_POST['course_provider_url']);
			$course_sell_price      = escape($_POST['course_sell_price']);
			$course_desc            = $_POST['course_desc'];
			$course_category        = escape($_POST['course_category']);
			$course_durations       = escape($_POST['course_durations']);
			$outcome       			= escape($_POST['outcome']);
			$userid       			= escape($_POST['userid']);
			$long_desc       		= $_POST['long_desc'];
			$course_level       	= escape($_POST['course_level']);
			$is_top_course       	= isset($_POST['is_top_course']) ? escape($_POST['is_top_course']) : '';
			$course_req       		= $_POST['course_req'];
			$course_feature       	= $_POST['course_feature'];
			$is_featured_course     = isset($_POST['is_featured_course']) ? escape($_POST['is_featured_course']) : '0';
			
			if(isset($_FILES['course_images']['name'])){
				$file_name   = $_FILES['course_images']['name'];
				$explode     = explode(".", $file_name);
				$extension   = end($explode);
				$tmp_name    = $_FILES['course_images']['tmp_name'];
				$size        = $_FILES['course_images']['size'];
				$type        = $_FILES['course_images']['type'];

			}

			$errors = array();
			if(isset($course_title,$course_orginal_price,$course_provider,$course_tag,$course_provider_url,$course_sell_price,$course_desc,$outcome,$course_durations,$file_name,$long_desc,$course_level,$course_req,$course_feature,$course_category)){
				if(empty($course_title) && empty($course_orginal_price) && empty($course_provider) && empty($course_tag) && empty($course_provider_url) && empty($course_sell_price) && empty($course_desc) && empty($outcome) && empty($course_durations) && empty($file_name) && empty($course_level) && empty($course_req) && empty($long_desc) && empty($course_feature) && empty($course_category)){
						$errors[] = 'All field are required';
				}	
				else
				{
					if(empty($course_title)){
						$errors[] = 'course title  are required<br/>';
					}
					if(empty($course_orginal_price)){
						$errors[] = 'Orginal Price field  are required<br/>';
					}
					if(empty($course_provider)){
						$errors[] = 'provider field are required<br/>';
					}
					if(empty($course_tag)){
						$errors[] = 'course tag field are required<br/>';
					}
					if(empty($course_provider_url)){
						$errors[] = 'provider url field are required<br/>';
					}
					if(empty($course_sell_price)){
						$errors[] = 'sell price field are required<br/>';
					}
					if(empty($course_desc)){
						$errors[] = 'description field are required<br/>';
					}
					if(empty($outcome)){
						$errors[] = 'outcome field are required<br/>';
					}
					if(empty($course_durations)){
						$errors[] = 'duration field are required<br/>';
					}
					if(empty($file_name)){
						$errors[] = 'image field are required<br/>';
					}
					if(empty($long_desc)){
						$errors[] = 'long description field are required<br/>';
					}
					if(empty($course_level)){
						$errors[] = 'course level field are required<br/>';
					}
					if(empty($course_req)){
						$errors[] = 'course request field are required<br/>';
					}
					if(empty($course_feature)){
						$errors[] = 'course feature field are required<br/>';
					}
					if(empty($course_category)){
						$errors[] = 'course Category field are required<br/>';
					}
					
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{
						if(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name'])){
							$file_name   = $_FILES['course_images']['name'];
							$explode     = explode(".", $file_name);
							$extension   = end($explode);
							$tmp_name    = $_FILES['course_images']['tmp_name'];
							$size        = $_FILES['course_images']['size'];
							$type        = $_FILES['course_images']['type'];

						}
					
						if(!empty(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name']))) {
							$newFile 	 = random(10).'.'.$extension;
							
						}
						$course_sub_category       	= escape($_POST['course_sub_category']);
						$database 	= new Database();
						$conn 		= $database->connection;
						$added = time();

						if(isset($_SESSION['is_login'])){
							$user_login = $_SESSION['user_email'];
						}

						$data 	= array(
							'course_title' 				=> $course_title,
							'course_original_price' 	=> $course_orginal_price,
							'is_free_course' 			=> $is_free_course,
							'course_overview_provider' 	=> $course_provider,
							'course_tag' 				=> $course_tag,
							'video_url' 				=> $course_provider_url,
							'course_desc' 				=> $course_desc,
							'outcomes' 					=> $outcome,
							'course_duration' 			=> $course_durations,
							'course_sell_price' 		=> $course_sell_price, 
							'course_img' 				=> $newFile,
							'long_desc' 				=> $long_desc,
							'level' 					=> $course_level,
							'user_id'                   => $user_login,
							'is_top_course' 			=> $is_top_course,
							'requirement' 				=> $course_req,
							'course_features' 			=> $course_feature,
							'category_id' 				=> $course_category,
							'sub_category_id' 			=> $course_sub_category,
							'is_featured_course' 		=> $is_featured_course,
							'added' 					=> $added,
							'users_id' 					=> $userid,
							'is_active' 				=> 0,
							'status' 					=> 0
						);

						$query = $database->insertdata('courses',$data);
						if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name']))) {
								move_uploaded_file($tmp_name, 'assets/img/course/'.$newFile);
							}
						}
						else
						{
							echo "<div class='alert alert-danger'>data not added</div>";
							echo mysqli_error($conn);
						}

				}
			} // isset if end
		}	// end of elseif file course listing page.............
		// add section 
		elseif($page == 'add_section'){

			$section_title         		= $_POST['section_title']; 
			$course_name         		= $_POST['course_name']; 
			$errors = array();
			if(isset($section_title,$course_name)){
				if(empty($section_title) && empty($course_name)){
						$errors[] = 'All field are required';
				}
				else
				{	
					if(empty($section_title)){
						$errors[] = 'Section name  are required<br/>';
					}
					if(empty($course_name)){
						$errors[] = 'Course name  are required<br/>';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{

					$database 	= new Database();
					$conn 		= $database->connection;
					$added = time();

					$data 	= array(
						'section_title' 	=> $section_title,
						'course_id' 		=> $course_name,
					);
					$query = $database->insertdata('section',$data);
					if($query){
						echo "<div class='alert alert-success'>New data added successfully.</div>";
					}
					else
					{
						echo "<div class='alert alert-danger'>data not added</div>";
						echo mysqli_error($conn);
					}

				}
			} // isset if end
		}	// end of elseif file student listing page.............

		// add section 
		elseif($page == 'add_lesson'){

			$lesson_title         		= escape($_POST['lesson_title']); 
			$video_url         			= $_POST['video_url']; 
			$course_name         		= $_POST['course_name']; 
			$section_name         		= $_POST['section_name']; 
			$errors = array();
			if(isset($lesson_title,$video_url,$course_name,$section_name)){
				if(empty($lesson_title) && empty($course_name) && empty($video_url) && empty($section_name)){
						$errors[] = 'All field are required';
				}
				else
				{	
					if(empty($lesson_title)){
						$errors[] = 'Lesson name are required<br/>';
					}
					if(empty($video_url)){
						$errors[] = 'Video Url are required<br/>';
					}
					if(empty($course_name)){
						$errors[] = 'Course name are required<br/>';
					}
					if(empty($section_name)){
						$errors[] = 'Section name are required<br/>';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{

					$database 	= new Database();
					$conn 		= $database->connection;
					$added = time();

					$data 	= array(
						'lesson_title' 		=> $lesson_title,
						'course_id' 		=> $course_name,
						'section_id' 		=> $section_name,
						'video_url' 		=> $video_url,
					);
					$query = $database->insertdata('lesson',$data);
					if($query){
						echo "<div class='alert alert-success'>New data added successfully.</div>";
					}
					else
					{
						echo "<div class='alert alert-danger'>data not added</div>";
						echo mysqli_error($conn);
					}

				}
			} // isset if end
		}	// end of elseif file student listing page.............

	} // post token check if
	else
	{
		echo "oop! you are wrong";
	}
	


?>