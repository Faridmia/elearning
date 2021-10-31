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
			

			$data 	 = array('lesson_title' => $lesson_title,'course_id' => $course_name,'section_id' => $section_name,'video_url' => $video_url);
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

	} // token check end


?>