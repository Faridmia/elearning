<?php
	require_once('init.php');
	require_once('functions.php');

	$database = new Database();
	$conn 		= $database->connection;
	$token = $database->token($database->generatetoken());
	if($_POST['token'] == $_SESSION['token']){
		$page = $_POST['page'];
		if($page == 'category'){

			$catid    = (int)$_POST['catid'];
			$catname  = $_POST['cat_name'];

			$data 	 = array('cat_name' => $catname);
			$query   = $database->updatedata('categories',$data,'cat_id', '=', $catid );

			if($query){
				echo "<div class='alert alert-success'>";
					echo "category updated";
				echo "<div>"; ?>
				<script>
					setTimeout(function(){
						window.location = "category.php";

					},3000);	
				</script>
			<?php }
			else
			{
				echo "<div class='alert alert-danger'>";
					echo "category is not updated".mysqli_error($conn);
				echo "<div>";
			}
		}
		elseif($page == 'user_education'){

			

			$userid = $_POST['userid'];

			$skill_title    = escape($_POST['skill_title']);
			$session        = escape($_POST['session']);
			$clg_name   	= escape($_POST['clg_name']);
			$skill_desc     = escape($_POST['skill_desc']);
			$skill_title_2  = escape($_POST['skill_title_2']);
			$session_2      = escape($_POST['session_2']);
			$versity_name   = escape($_POST['versity_name']);
			$skill_desc_2   = escape($_POST['skill_desc_2']);


			$data = array(
				'coll_skill_title'  => $skill_title,
				'coll_session' 		=> $session,
				'coll_name'         => $clg_name,
				'coll_desc'         => $skill_desc,
				'ver_skill_title'   => $skill_title_2,
				'ver_session'       => $session_2,
				'ver_name'          => $versity_name,
				'ver_desc'          => $skill_desc_2,
				'users_id'          => $userid
			);

			$edu_sql = "SELECT * FROM education where users_id = {$userid}";
                
			$edu_query = mysqli_query($conn,$edu_sql);

			$fetch_edu = mysqli_fetch_array($edu_query);
			
			$numRows = $database->numRows($edu_query);

			if($numRows > 0){
				$query   = $database->updatedata('education',$data,'users_id','=', $userid);
				if($query){
					echo "<div class='alert alert-success'>";
						echo "Education updated";
					?>
						<script>
						setTimeout(function(){
							window.location = "education.php";
	
						},3000);
							
						</script>
					<?php
					echo "<div>";
				}
				else
				{
					echo "<div class='alert alert-danger'>";
						echo "Education is not updated".mysqli_error($conn);
					echo "<div>";
				}
			}else{
				$insert_query = $database->insertdata('education',$data);
				if($query){
					echo "<div class='alert alert-success'>";
						echo "Education updated";
					?>
						<script>
						setTimeout(function(){
							window.location = "education.php";
	
						},3000);
							
						</script>
					<?php
					echo "<div>";
				}
				else
				{
					echo "<div class='alert alert-danger'>";
						echo "Education is not updated".mysqli_error($conn);
					echo "<div>";
				}
			}
			

			

		}
		elseif($page == 'conditions'){
		  		
			$condition_id    = (int) $_POST['condition_id'];
			$terms 	 		 = $_POST['terms'];
			$for_whoom  	 = $_POST['for_whoom'];

			$data 	 = array('t_id' => $condition_id,'terms' => $terms,'for_whoom' => $for_whoom);
			$query   = $database->updatedata('terms',$data,'t_id','=', $condition_id);

			if($query){
				echo "<div class='alert alert-success'>";
					echo "terms updated";
				?>
					<script>
					setTimeout(function(){
						window.location = "add_terms_conditions.php";

					},3000);
						
					</script>
				<?php
				echo "<div>";
			}

			else
			{
				echo "<div class='alert alert-danger'>";
					echo "terms is not updated".mysqli_error($conn);
				echo "<div>";
			}
		} // elseif end
		elseif($page == 'faq_cat'){
		  		
			$faq_cat_id    = (int) $_POST['faq_cat_id'];
			$faq_category  = $_POST['faq_category'];

			$data 	 = array('faq_cat_id ' => $faq_cat_id,'faq_cat_name' => $faq_category);
			$query   = $database->updatedata('faq_category',$data,'faq_cat_id ','=', $faq_cat_id);

			if($query){
				echo "<div class='alert alert-success'>";
					echo "Faq category updated";
				?>
					<script>
					setTimeout(function(){
						window.location = "faq_category.php";

					},3000);
						
					</script>
				<?php
				echo "<div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>";
					echo "Faq Category is not updated".mysqli_error($conn);
				echo "<div>";
			}
		} // elseif end

		elseif($page == 'section'){
		  		
			$sectionid    	= (int) $_POST['sectionid'];
			$section_title  = $_POST['section_title'];
			$course_id  	= $_POST['course_name'];
			

			$data 	 = array('section_title' => $section_title,'course_id' => $course_id);
			$query   = $database->updatedata('section',$data,'section_id','=', $sectionid);

			if($query){
				echo "<div class='alert alert-success'>";
					echo "section updated";
				?>
					<script>
					setTimeout(function(){
						window.location = "add-section.php";

					},3000);
						
					</script>
				<?php
				echo "<div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>";
					echo "Section is not updated".mysqli_error($conn);
				echo "<div>";
			}
		} // elseif end

		elseif($page == 'lesson'){
		  		
			$lessonid    	= (int) $_POST['lessonid'];
			$lesson_title  	= $_POST['lesson_title'];
			$video_url  	= $_POST['video_url'];
			$course_name  	= $_POST['course_name'];
			$section_name  	= $_POST['section_name'];


			$data 	 = array('lesson_title' => $lesson_title,'course_id' => $course_name,'video_url' => $video_url);
			$query   = $database->updatedata('lesson',$data,'lesson_id','=', $lessonid);

			if($query){
				echo "<div class='alert alert-success'>";
					echo "lesson updated";
				?>
					<script>
					setTimeout(function(){
						window.location = "lessons.php";

					},3000);
						
					</script>
				<?php
				echo "<div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>";
					echo "Section is not updated".mysqli_error($conn);
				echo "<div>";
			}
		} // elseif end

		elseif($page == 'faq'){
		  		
			$faqid    = (int) $_POST['faq_id'];
			$faq_ques  = escape($_POST['faq_ques']);
			$faq_ans   = escape($_POST['faq_ans']);
			$for_tab   = escape($_POST['for_tab']);

			$data 	 = array('faq_id' => $faqid,'faq_ques' => $faq_ques,'faq_answer' => $faq_ans,'faq_cat_id' => $for_tab);
			$query   = $database->updatedata('faq',$data,'faq_id ','=', $faqid);

			if($query){
				echo "<div class='alert alert-success'>";
					echo "Faq updated";
				?>
					<script>
					setTimeout(function(){
						window.location = "add_faq.php";

					},3000);
						
					</script>
				<?php
				echo "<div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>";
					echo "Faq is not updated".mysqli_error($conn);
				echo "<div>";
			}
		} // elseif end

		elseif($page == 'update_post'){

			$post_title         		= escape($_POST['post_title']); 
			$postid         			= escape($_POST['post_id']); 

			$database 	= new Database();
			$conn 		= $database->connection;
			$added = time();

			if(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name'])){
				$file_name   = $_FILES['post_image']['name'];
				$explode     = explode(".", $file_name);
				$extension   = end($explode);
				$tmp_name    = $_FILES['post_image']['tmp_name'];
				$size        = $_FILES['post_image']['size'];
				$type        = $_FILES['post_image']['type'];

			}

			$data 	= array(
				'post_title' 		=> $post_title,
			);
		
			if(!empty(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name']))) {
				$newFile 	 = random(10).'.'.$extension;
				$dataFile 	 = array('post_image' => $newFile);
				$data 		 = array_merge($data, $dataFile);
			}
			

			$query = $database->updatedata('blog_post',$data,'post_id','=',$postid);
			if($query){
				echo "<div class='alert alert-success'>New data added successfully.</div>";
				if(!empty(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name']))) {
					move_uploaded_file($tmp_name, '../assets/img/post/'.$newFile);
				} ?>

				<script>
					setTimeout(function(){
						window.location = "blog-post.php";

					},3000);
						
					</script>
			<?php }
			else
			{
				echo "<div class='alert alert-danger'>data not added</div>";
				echo mysqli_error($conn);
			}
		}	// end of elseif file blog post page.............

	} // token check end


?>