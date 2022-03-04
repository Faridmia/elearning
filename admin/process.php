<?php
	require_once('init.php');
	require_once('functions.php');

	$database = new Database();
	$token = $database->token($database->generatetoken());
	if($_POST['token'] == $_SESSION['token']){
		$page = $_POST['page'];
		if($page == 'profile'){
			$fullname  		= escape($_POST['full_name']);
			$username  		= escape($_POST['uname']);
			$email     		= escape($_POST['email']);
			$password  		= escape($_POST['password']);
			$errors = array();
			if(isset($fullname,$email)){
				if(empty($fullname) && empty($email)){
					
						$errors[] = 'fullname are required'."<br/>";
						$errors[] = 'email are required'."<br/>";
				}
				else
				{
					if(empty($fullname)){
						$errors[] = 'First name field are required';
					}
					if(empty($email)){
						$errors[] = 'email field are required';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{
					$hashPassword	= hash('sha256', $password);
					//$file_name = escape($_FILES['upload']['name']);
					if(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])){
						$file_name = $_FILES['upload']['name'];
						$explode = explode(".", $file_name);
						$extension = end($explode);
						$tmp_name = $_FILES['upload']['tmp_name'];
						$size = $_FILES['upload']['size'];
						$type = $_FILES['upload']['type'];

					}
					$database 	= new Database();
					$conn 		= $database->connection;
					$data 		= array('full_name' => $fullname, 'email' => $email);

					if(!empty($password)){
							$datapass = array('password' => $hashPassword);
							$data     = array_merge($data,$datapass);
					}

					if(!empty(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name']) )) {
						//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
						$newFile 	 = random(10).'.'.$extension;
						$dataFile 	 = array('profileimg' => $newFile);
						$data 		 = array_merge($data, $dataFile);

					}

					$query = $database->updatedata('admin',$data,'a_id', '=', 1);
					if($query){
						echo "<div class='alert alert-success'>Update successfully.</div>";
						if(!empty(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name']))){
							move_uploaded_file($tmp_name, 'images/'.$newFile);
						}
					}
					else
					{
						echo "<div class='alert alert-danger'>data not update</div>";
						echo mysqli_error($conn);
					}

				} // endelse
			} // endif;
	

		}//end profile page validation
		// start footer top secion
		elseif($page == 'footer_top'){
			
			$address       		= escape($_POST['address']); 
			$contact_info       = $_POST['contact_info'];
			$pages_title    	= $_POST['pages_title'];
			$pages_info         = $_POST['pages_info'];
			$cat_title          = $_POST['cat_title'];
			$cat_info           = $_POST['cat_info'];
			$support_title      = escape($_POST['support_title']);
			$app_title          = $_POST['app_title'];
			$app_text_1         = $_POST['app_text_1'];
			$app_text_2         = $_POST['app_text_2'];
			$suport_info        = $_POST['suport_info'];
			$app_link_1         = $_POST['app_link_1'];
			$app_link_2         = $_POST['app_link_2'];

			$database 	= new Database();
			$conn 		= $database->connection;
			$data 		= array(
				'addr_title' 		=> $address, 
				'contact_info' 		=> $contact_info,
				'menu_title_1'  	=> $pages_title,
				'menu_info_1' 		=> $pages_info,
				'menu_title_2' 		=> $cat_title,
				'menu_info_2' 		=> $cat_info,
				'menu_title_3' 		=> $support_title,
				'menu_info_3' 		=> $suport_info,
				'app_title' 		=> $app_title,
				'app_text_1' 		=> $app_text_1,
				'app_text_2' 		=> $app_text_2,
				'app_link_1' 		=> $app_link_1,
				'app_link_2' 		=> $app_link_2
				
			);

			$select_sql = "SELECT * FROM footer_top";
			$select_que = mysqli_query($conn,$select_sql);
			$num_Row = $database->numRows($select_que);

			if($num_Row  > 0){

				$query = $database->updatedata('footer_top',$data,'footer_id', '=', 1);
				if($query){
					echo "<div class='alert alert-success'>Update successfully.</div>";

				}
				else
				{
					echo "<div class='alert alert-danger'>data not update</div>";
					echo mysqli_error($conn);
				}

			}else{
				$query = $database->insertdata('footer_top',$data);
				if($query){
					echo "<div class='alert alert-success'>New data added successfully.</div>";
				}
				else
				{
					echo "<div class='alert alert-danger'>data not added</div>";
					echo mysqli_error($conn);
				}

			}
		
		}//end of file footer tpp page elseif end
		elseif($page == 'contact_info'){
			$sub_heading       = escape($_POST['sub_heading']); 
			$heading    	   = escape($_POST['heading']);
			$desription        = escape($_POST['desription']);
			$addr_title        = $_POST['addr_title'];
			$address           = $_POST['address'];
			$mail_title        = $_POST['mail_title'];
			$email             = $_POST['email'];
			$phone_title       = $_POST['phone_title'];
			$phone_number      = $_POST['phone_number'];


            $errors = array();
			if(isset($sub_heading,$heading,$desription,$addr_title,$address,$mail_title,$email,$phone_title,$phone_number)){
				if(empty($sub_heading) && empty($heading) && empty($desription) && empty($addr_title) && empty($mail_title) && empty($email) && empty($phone_title) && empty($phone_number)){
					
						$errors[] = 'All field are required';
				}
				else
				{
					if(empty($sub_heading)){
						$errors[] = 'Sub heading field are required';
					}
					
					if(empty($heading)){
						$errors[] = 'Heading field are required';
					}
					
					if(empty($desription)){
						$errors[] = 'Descirption field are required';
					}
					
					if(empty($addr_title)){
						$errors[] = 'Address Title field are required';
					}
					if(empty($address)){
						$errors[] = 'Address field are required';
					}
					
					if(empty($mail_title)){
						$errors[] = 'Mail title field are required';
					}
					
					if(empty($email)){
						$errors[] = 'Email field are required';
					}
					
					if(empty($phone_title)){
						$errors[] = 'Phone Title field are required';
					}

					if(empty($phone_number)){
						$errors[] = 'Phone Number field are required';
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

					$data 		= array(
						'sub_heading' 		=> $sub_heading,
						'heading' 		    => $heading,
						'content' 		    => $desription,
						'addr_title' 		=> $addr_title,
						'address' 		    => $address,
						'mail_title' 		=> $mail_title,
						'mail' 		        => $email,
						'phone_title' 		=> $phone_title,
						'phone_num' 		=> $phone_number
						
					);

					$select_sql = "SELECT * FROM  contact_us";
					$select_que = mysqli_query($conn,$select_sql);

					$fetch_contact_info = mysqli_fetch_array($select_que);

					
					$num_Row = $database->numRows($select_que);

					if($num_Row  > 0){
						$info_id = $fetch_contact_info['con_id'];

						$query = $database->updatedata('contact_us',$data,'con_id', '=', $info_id);
						if($query){
							echo "<div class='alert alert-success'>Update successfully.</div>";
						}
						else
						{
							echo "<div class='alert alert-danger'>data not update</div>";
							echo mysqli_error($conn);
						}

					} else{
						$query = $database->insertdata('contact_us',$data);
						if($query){
							echo "<div class='alert alert-success'>Updated successfully.</div>";
						}
						else
						{
							echo "<div class='alert alert-danger'>data not added</div>";
							echo mysqli_error($conn);
						}

					}
		
			
				} // empty error else if check
		
			} // isset if
		}//end of file setting page elseif end

		elseif($page == 'privacy'){
			$heading       = $_POST['heading']; 
			$desc_1    	   = escape($_POST['desc_1']);
			$desc_2        = escape($_POST['desc_2']);
			$desc_3        = escape($_POST['desc_3']);


            $errors = array();
			if(isset($heading,$desc_1,$desc_2,$desc_3)){
				if(empty($heading) && empty($desc_1) && empty($desc_2) && empty($desc_3)){
					
						$errors[] = 'All field are required';
				}
				else
				{
					if(empty($heading)){
						$errors[] = 'heading field are required';
					}
					
					if(empty($desc_1)){
						$errors[] = 'Description field are required';
					}
					
					if(empty($desc_2)){
						$errors[] = 'Descirption two field are required';
					}
					
					if(empty($desc_3)){
						$errors[] = 'Descirption Three field are required';
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


					$data 		= array(
						'desc_1' 		=> $desc_1,
						'desc_2' 		=> $desc_2,
						'desc_3' 		=> $desc_3,
						'heading' 		=> $heading
						
					);

					$select_sql = "SELECT * FROM privacy_policy";
					$select_que = mysqli_query($conn,$select_sql);

					$fetch_privacy = mysqli_fetch_array($select_que);

					
					$num_Row = $database->numRows($select_que);

					if($num_Row  > 0){
						$privacy_id = $fetch_privacy['privacy_id'];

						$query = $database->updatedata('privacy_policy',$data,'privacy_id', '=', $privacy_id);
						if($query){
							echo "<div class='alert alert-success'>Update successfully.</div>";
						}
						else
						{
							echo "<div class='alert alert-danger'>data not update</div>";
							echo mysqli_error($conn);
						}

					} else{
						$query = $database->insertdata('privacy_policy',$data);
						if($query){
							echo "<div class='alert alert-success'>Updated successfully.</div>";
						}
						else
						{
							echo "<div class='alert alert-danger'>data not added</div>";
							echo mysqli_error($conn);
						}

					}
		
			
				} // empty error else if check
		
			} // isset if
		}//end of file setting page elseif end
		// start about page validation
		elseif($page == 'aboutus'){
			$heading       = escape($_POST['heading']); 
			$title_1       = escape($_POST['title_1']);
			$desc_1    	   = escape($_POST['desc_1']);
			$title_2       = escape($_POST['title_2']);
			$desc_2        = escape($_POST['desc_2']);
			$title_3       = escape($_POST['title_3']);
			$desc_3        = escape($_POST['desc_3']);
			$btn_title     = escape($_POST['btn_title']);
			$btn_link      = escape($_POST['btn_link']);


            $errors = array();
			if(isset($heading,$title_1,$desc_1,$title_2,$desc_2,$title_3,$desc_3,$btn_title,$btn_link)){
				if(empty($heading) && empty($title_1) && empty($desc_1) && empty($title_2) && empty($desc_2) && empty($title_3) && empty($desc_3) && empty($btn_title) && empty($btn_link)){
					
						$errors[] = 'All field are required';
				}
				else
				{
					if(empty($heading)){
						$errors[] = 'heading field are required';
					}
					if(empty($title_1)){
						$errors[] = 'title one field are required';
					}
					if(empty($desc_1)){
						$errors[] = 'Description field are required';
					}
					if(empty($title_2)){
						$errors[] = 'Title Two field are required';
					}
					if(empty($desc_2)){
						$errors[] = 'Descirption two field are required';
					}
					if(empty($title_3)){
						$errors[] = 'Title Three field are required';
					}
					if(empty($desc_3)){
						$errors[] = 'Descirption Three field are required';
					}
					if(empty($btn_title)){
						$errors[] = 'Button field are required';
					}
					if(empty($btn_link)){
						$errors[] = 'Buitton Link field are required';
					}
				
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{
					if(isset($_FILES['about_images']['name']) && !empty($_FILES['about_images']['name'])){
						$file_name   = $_FILES['about_images']['name'];
						$explode     = explode(".", $file_name);
						$extension   = end($explode);
						$tmp_name    = $_FILES['about_images']['tmp_name'];
						$size        = $_FILES['about_images']['size'];
						$type        = $_FILES['about_images']['type'];

					}


					$database 	= new Database();
					$conn 		= $database->connection;

					$heading       = escape($_POST['heading']); 
					$title_1       = escape($_POST['title_1']);
					$desc_1    	   = escape($_POST['desc_1']);
					$title_2       = escape($_POST['title_2']);
					$desc_2        = escape($_POST['desc_2']);
					$title_3       = escape($_POST['title_3']);
					$desc_3        = escape($_POST['desc_3']);
					$btn_title     = escape($_POST['btn_title']);
					$btn_link      = escape($_POST['btn_link']);

					$data 		= array(
						'about_title' 		=> $title_1, 
						'about_desc' 		=> $desc_1,
						'about_title_2'  	=> $title_2,
						'about_desc_2' 		=> $desc_2,
						'about_title_3' 	=> $title_3,
						'about_desc_3' 		=> $desc_3,
						'button_title' 		=> $btn_title,
						'button_link' 		=> $btn_link,
						'about_heading' 	=> $heading
						
					);

			    	if(!empty(isset($_FILES['about_images']['name']) && !empty($_FILES['about_images']['name']))) {
						
			    		$newFile 	 = random(10).'.'.$extension;
						$dataFile 	 	 = array('about_img' => $newFile);
						$data 		 	 = array_merge($data, $dataFile);
					}

					$select_sql = "SELECT * FROM about_us";
					$select_que = mysqli_query($conn,$select_sql);
					$num_Row = $database->numRows($select_que);

					if($num_Row  > 0){

						$query = $database->updatedata('about_us',$data,'about_id', '=', 1);
						if($query){
							echo "<div class='alert alert-success'>Update successfully.</div>";
							if(!empty(isset($_FILES['about_images']['name']) && !empty($_FILES['about_images']['name']))) {
								move_uploaded_file($tmp_name, '../assets/img/course/'.$newFile);
							} 

						}
						else
						{
							echo "<div class='alert alert-danger'>data not update</div>";
							echo mysqli_error($conn);
						}

					}else{
						$query = $database->insertdata('about_us',$data);
						if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['about_img']['name']) && !empty($_FILES['coursabout_imge_images']['name']))) {
								move_uploaded_file($tmp_name, '../assets/img/course/'.$newFile);
							}
						}
						else
						{
							echo "<div class='alert alert-danger'>data not added</div>";
							echo mysqli_error($conn);
						}

					}
		
			
				} // empty error else if check
		
			} // isset if
		}//end of file setting page elseif end
		// start setting page validation
		elseif($page == 'setting'){
			$phone       = escape($_POST['phone']); 
			$email       = escape($_POST['email']);
			$facebook    = escape($_POST['facebook']);
			$twitter     = escape($_POST['twitter']);
			$linkedin    = escape($_POST['linkedin']);
			$instagram   = escape($_POST['instagram']);
		
			$copyright     = $_POST['copyright'];
			$address       = escape($_POST['address']);
			$banner_title  = escape($_POST['banner_title']);
			$banner_desc   = escape($_POST['banner_desc']);
			$news_heading  = escape($_POST['news_heading']);
			$news_con      = $_POST['news_con'];
		


            $errors = array();
			if(isset($phone,$email,$facebook,$twitter,$linkedin,$instagram,$address,$copyright,$banner_title,$banner_desc,$news_heading,$news_con)){
				if(empty($phone) && empty($email) && empty($facebook) && empty($twitter) && empty($linkedin) && empty($instagram) && empty($address) && empty($copyright) && empty($banner_title) && empty($banner_desc) && empty($news_heading) && empty($news_con)){
					
						$errors[] = 'All field are required';
				}
				else
				{
					if(empty($phone)){
						$errors[] = 'phone field are required';
					}
					if(empty($news_heading)){
						$errors[] = 'Newsletter Heading field are required';
					}
					if(empty($news_con)){
						$errors[] = 'Newsletter Content field are required';
					}
					if(empty($email)){
						$errors[] = 'email field are required';
					}
					if(empty($facebook)){
						$errors[] = 'facebook field are required';
					}
					if(empty($twitter)){
						$errors[] = 'twitter field are required';
					}
					if(empty($linkedin)){
						$errors[] = 'linkedin field are required';
					}
					if(empty($instagram)){
						$errors[] = 'instagram field are required';
					}
					if(empty($address)){
						$errors[] = 'address field are required';
					}
					if(empty($copyright)){
						$errors[] = 'copyright field are required';
					}
					if(empty($banner_title)){
						$errors[] = 'Banner title field are required';
					}
					if(empty($banner_desc)){
						$errors[] = 'Banner Description field are required';
					}
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{
					if(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])){
						$file_name   = $_FILES['logo']['name'];
						$explode     = explode(".", $file_name);
						$extension   = end($explode);
						$tmp_name    = $_FILES['logo']['tmp_name'];
						$size        = $_FILES['logo']['size'];
						$type        = $_FILES['logo']['type'];

					}

					if(isset($_FILES['banner_img']['name']) && !empty($_FILES['banner_img']['name'])){
						$file_name_two   = $_FILES['banner_img']['name'];
						$explode_two     = explode(".", $file_name_two);
						$extension_two   = end($explode_two);
						$tmp_name_two    = $_FILES['banner_img']['tmp_name'];
						$size        = $_FILES['banner_img']['size'];
						$type        = $_FILES['banner_img']['type'];

					}

					$database 	= new Database();
					$conn 		= $database->connection;

					$data 		= array(
						'phone' 		=> $phone, 
						'email' 		=> $email,
						'facebook'  	=> $facebook,
						'twitter' 		=> $twitter,
						'instagram' 	=> $instagram,
						'address' 		=> $address,
						'copyright' 	=> $copyright,
						'linkedin' 		=> $linkedin,
						'banner_title' 	=> $banner_title,
						'banner_desc' 	=> $banner_desc,
						'newsletter_heading' 	=> $news_heading,
						'newsletter_content' 	=> $news_con
					);


					$social_data = [
						$facebook,
						$twitter,
						$linkedin
					];
		
					$implode_data = join(" ",$social_data); 

					$data_two = array('social_link' => $implode_data);


			    	if(!empty(isset($_FILES['banner_img']['name']) && !empty($_FILES['banner_img']['name']))) {
						
			    		$banner_File 	 = random(10).'.'.$extension_two;
						$dataFile_two 	 = array('banner_img' => $banner_File);
						$data 		 = array_merge($data, $dataFile_two);
					}

					if(!empty(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))) {
			    		$newFile 	 = random(10).'.'.$extension;
						$dataFile 	 = array('logo' => $newFile);
						$data 		 = array_merge($data, $dataFile);
					}

					$querytwo = $database->updatedata('users',$data_two,'users_id', '=', 1);

					$query    = $database->updatedata('setting',$data,'s_id', '=', 5);
					if($query){
						echo "<div class='alert alert-success'>Update successfully.</div>";
						if(!empty(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))) {
							move_uploaded_file($tmp_name, 'images/logo/'.$newFile);
						} 

						if(!empty(isset($_FILES['banner_img']['name']) && !empty($_FILES['banner_img']['name']))) {
							move_uploaded_file($tmp_name_two, 'images/banner/'.$banner_File);
						}
					}
					else
					{
						echo "<div class='alert alert-danger'>data not update</div>";
						echo mysqli_error($conn);
					}
		
			
				} // empty error else if check
		
			} // isset if
		}//end of file setting page elseif end


		// add course 
		elseif($page == 'add_course'){

			$course_title         	= escape($_POST['course_title']); 
			$course_orginal_price   = escape($_POST['course_orginal_price']);
			$is_free_course         = isset($_POST['is_free_course']) ? escape($_POST['is_free_course']) : '';
			$course_provider        = escape($_POST['course_provider']);
			$course_tag             = escape($_POST['course_tag']);
			$recom_course           = escape($_POST['recom_course']);
			$userid           		= escape($_POST['userid']);

			$course_provider_url    = escape($_POST['course_provider_url']);
			$course_sell_price      = escape($_POST['course_sell_price']);
			$course_desc            = $_POST['course_desc'];
			$course_category        = escape($_POST['course_category']);
			$course_durations       = escape($_POST['course_durations']);
			$outcome       			= escape($_POST['outcome']);
			$long_desc       		= $_POST['long_desc'];
			$course_level       	= escape($_POST['course_level']);
			$is_top_course       	= isset($_POST['is_top_course']) ? escape($_POST['is_top_course']) : '0';
			$is_featured_course     = isset($_POST['is_featured_course']) ? escape($_POST['is_featured_course']) : '0';
			$course_req       		= $_POST['course_req'];
			$course_feature       	= $_POST['course_feature'];
			
			
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
					if(empty($is_top_course)){
						$errors[] = 'top course field are required<br/>';
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

						if(isset($_SESSION['username'])){
							$user_id = $_SESSION['username']; 
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
							'user_id' 					=> $user_id,
							'is_top_course' 			=> $is_top_course,
							'requirement' 				=> $course_req,
							'course_features' 			=> $course_feature,
							'category_id' 				=> $course_category,
							'sub_category_id' 			=> $course_sub_category,
							'is_featured_course' 		=> $is_featured_course,
							'added' 					=> $added,
							'is_active' 				=> 1,
							'status' 					=> 1,
							'users_id' 					=> $userid,
							'rcmd_cid' 					=> $recom_course
						);

						$query = $database->insertdata('courses',$data);
						if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['course_images']['name']) && !empty($_FILES['course_images']['name']))) {
								move_uploaded_file($tmp_name, '../assets/img/course/'.$newFile);
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

		// add category 
		elseif($page == 'add_category'){

			$category         		= escape($_POST['category']); 
			$errors = array();
			if(isset($category)){
				if(empty($category)){
						$errors[] = 'Category field are required';
				}	
				else
				{	
					if(empty($category)){
						$errors[] = 'Category name  are required<br/>';
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

						$select_sql = "SELECT * FROM categories WHERE cat_name = ''";

						$data 	= array(
							'cat_name' 		=> $category,
						);

						$query = $database->insertdata('categories',$data);
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
		elseif($page == 'add_post'){

			$post_title         		= escape($_POST['post_title']); 
			$userid         			= (int) $_POST['userid']; 
			
			$errors = array();
			if(isset($post_title)){
				if(empty($post_title)){
						$errors[] = 'Title field are required';
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
						'users_id' 			=> $userid 
					);
				
					if(!empty(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name']))) {
						$newFile 	 = random(10).'.'.$extension;
						$dataFile 	 = array('post_image' => $newFile);
						$data 		 = array_merge($data, $dataFile);
					}
					

					$query = $database->insertdata('blog_post',$data);
					if($query){
						echo "<div class='alert alert-success'>New data added successfully.</div>";
						if(!empty(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name']))) {
							move_uploaded_file($tmp_name, '../assets/img/post/'.$newFile);
						}
					}
					else
					{
						echo "<div class='alert alert-danger'>data not added</div>";
						echo mysqli_error($conn);
					}

				}
			} // isset if end
		}	// end of elseif file blog post page.............

		// add section 
		elseif($page == 'add_section'){

			$section_title         		= escape($_POST['section_title']); 
			$course_name         		= escape($_POST['course_name']); 
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
			$video_url         			= escape($_POST['video_url']); 
			$course_name         		= escape($_POST['course_name']); 
			$section_name         		= escape($_POST['section_name']); 
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
						'upload_video' 		=> '',
					);
					$query = $database->insertdata('lesson',$data);
					if($query){
						echo "<div class='alert alert-success'>New data added successfully.</div>";

						if(!empty(isset($_FILES['course_video']['name']) && !empty($_FILES['course_video']['name']))) {
							move_uploaded_file($tmp_name, '../assets/video/'.$newFile);
						}
					}
					else
					{
						echo "<div class='alert alert-danger'>data not added</div>";
						echo mysqli_error($conn);
					}

				}
			} // isset if end
		}	// end of elseif file student listing page.............
		

		// add course 
		elseif($page == 'add_student'){

			$stu_name         		= escape($_POST['stu_name']); 
			$stu_email   			= escape($_POST['stu_email']);
			$biography           	= escape($_POST['biography']);
			
			if(isset($_FILES['user_profile_photo']['name'])){
				$file_name   = $_FILES['user_profile_photo']['name'];
				$explode     = explode(".", $file_name);
				$extension   = end($explode);
				$tmp_name    = $_FILES['user_profile_photo']['tmp_name'];
				$size        = $_FILES['user_profile_photo']['size'];
				$type        = $_FILES['user_profile_photo']['type'];

			}
			
			

			$errors = array();
			if(isset($stu_name,$stu_email,$biography)){
				if(empty($stu_name) && empty($stu_email) && empty($biography)){
						$errors[] = 'All field are required';
				}	

				else
				{
					
					if(empty($stu_name)){
						$errors[] = 'student name  are required<br/>';
					}
					if(empty($stu_email)){
						$errors[] = 'student email field  are required<br/>';
					}
					if(empty($biography)){
						$errors[] = 'student biography field are required<br/>';
					}
					
					
				}
				if(!empty($errors)){
					foreach($errors as $error){
						echo $error;
					}
				}
				else
				{

					if(isset($_FILES['user_profile_photo']['name']) && !empty($_FILES['user_profile_photo']['name'])){
						$file_name   = $_FILES['user_profile_photo']['name'];
						$explode     = explode(".", $file_name);
						$extension   = end($explode);
						$tmp_name    = $_FILES['user_profile_photo']['tmp_name'];
						$size        = $_FILES['user_profile_photo']['size'];
						$type        = $_FILES['user_profile_photo']['type'];

					}
				
					if(!empty(isset($_FILES['user_profile_photo']['name']) && !empty($_FILES['user_profile_photo']['name']))) {
						$newFile 	 = random(10).'.'.$extension;
						
					}

						$database 	= new Database();
						$conn 		= $database->connection;
						$added = time();

						$data 	= array(
							'name' 				 => $stu_name,
							'email'	 			 => $stu_email,
							'biography' 		 => $biography,
							'user_profile_photo' => $newFile
							
						);

						$query = $database->insertdata('users',$data);
						if($query){
							echo "<div class='alert alert-success'>New data added successfully.</div>";
							if(!empty(isset($_FILES['user_profile_photo']['name']) && !empty($_FILES['user_profile_photo']['name']))) {
								move_uploaded_file($tmp_name, '../assets/img/profile/'.$newFile);
							}
						}
						else
						{
							echo "<div class='alert alert-danger'>data not added</div>";
							echo mysqli_error($conn);
						}

				}
			} // isset if end
		}	// end of elseif file category listing page.............

		// add course 
		elseif($page == 'add_terms'){

			$term         		= escape($_POST['term']); 
			$for_whoom          = escape($_POST['for_whoom']); 
			$errors = array();
			if(isset($term,$for_whoom)){
				if(empty($term) && empty($term)){
						$errors[] = 'All field are required';
				}	
				else
				{	
					if(empty($term)){
						$errors[] = 'Terms Field  are required<br/>';
					}
					if(empty($for_whoom)){
						$errors[] = 'For Whoom field are required';
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
							'terms' 		=> $term,
							'for_whoom'     => $for_whoom,
						);

						$query = $database->insertdata('terms',$data);
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
		}	// end of elseif file terms  page listing page.............
		// add course 
		elseif($page == 'add_faq'){

			$faq_ques         = escape($_POST['faq_ques']); 
			$faq_ans          = escape($_POST['faq_ans']); 
			$for_tab          = escape($_POST['for_tab']); 
			$errors = array();
			if(isset($faq_ques,$faq_ans,$for_tab)){
				if(empty($faq_ans) && empty($faq_ans) && empty($for_tab)){
						$errors[] = 'All field are required';
				}	
				else
				{	
					if(empty($faq_ques)){
						$errors[] = 'Question Field  are required<br/>';
					}
					if(empty($faq_ans)){
						$errors[] = 'Answer field are required';
					}
					if(empty($for_tab)){
						$errors[] = 'Faq tab field are required';
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
							'faq_ques' 		=> $faq_ques,
							'faq_answer'    => $faq_ans,
							'faq_cat_id'    => $for_tab,
						);

						$query = $database->insertdata('faq',$data);
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
		}	// end of elseif file terms  page listing page.............
		// add course 
		elseif($page == 'add_faq_category'){

			$cat_name         		= escape($_POST['cat_name']); 
			$errors = array();
			if(isset($cat_name)){
				if(empty($cat_name)){
						$errors[] = 'Category field are required';
				}	
				else
				{	
					if(empty($cat_name)){
						$errors[] = 'Category name  are required<br/>';
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
							'faq_cat_name' 		=> $cat_name,
						);

						$query = $database->insertdata('faq_category',$data);
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
		}	// end of elseif file faq Category listing page.............
		elseif($page == 'sub_category'){

			$cat_name = escape($_POST['cat_name']);
			$sub_name = escape($_POST['sub_name']);

			////////////////validate start
			$errors = array();
			if(isset($cat_name)){
				if(empty($cat_name) && empty($sub_name)){
					
						$errors[] = "<div class='alert alert-danger'>All field are required.</div>";
				}
				else{
					if(empty($cat_name)){
						$errors[] = "<div class='alert alert-danger'>Category field are required</div>";

					}
					if(empty($sub_name)){
						$errors[] = "<div class='alert alert-success'>Sub category field are required</div>";

					}

				}
				if(!empty($errors)){
					foreach($errors as $error){
					 echo $error."<br/>";
					}
				}
				else
				{
					$data     = array('sub_name' => $sub_name,'cat_id' => $cat_name);
					$query    = $database->insertdata("sub_categories",$data);

					if($query){
							echo "<div class='alert alert-success'>Sub Category Added successfully.</div>";
									
				    }
					else
					{
						echo "<div class='alert alert-danger'>Sub Category is not Added</div>";
						echo mysqli_error($conn);
					}

				}
			}	
			/// valdate end
		} // sub category end

	} // post token check if
	else
	{
		echo "oop! you are wrong";
	}
	


?>