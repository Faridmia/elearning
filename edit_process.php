<?php
	ob_start();
	require_once('admin/init.php');
	require_once('admin/functions.php');

	$database = new Database();
	$conn 		= $database->connection;
	$token = $database->token($database->generatetoken());

	
	
		$page = $_POST['page'];

		if($page == 'user_profile'){
		  		
			$userid    = (int) $_POST['userid'];
			$user_name  = escape($_POST['user_name']);
			$biography   = escape($_POST['biography']);

			$user_facebook   = escape($_POST['user_facebook']);
			$user_twitter    = escape($_POST['user_twitter']);
			$user_linkedin   = escape($_POST['user_linkedin']);

			$social_data = [
				$user_facebook,
				$user_twitter,
				$user_linkedin
			];

			$implode_data = join(" ",$social_data);   //prints 1, 2, 3

			$data 	 = array('name' => $user_name,'biography' => $biography,'social_link' => $implode_data);
			$query   = $database->updatedata('users',$data,'users_id ','=', $userid);

			if($query){
				echo "<div class='alert alert-success'>";
					echo "Profile updated";
				?>
					<script>
					setTimeout(function(){
						window.location = "users-settings.php";

					},3000);
						
					</script>
				<?php
				echo "<div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>";
					echo "Profile is not updated".mysqli_error($conn);
				echo "<div>";
			}
		} // elseif end

		elseif($page == 'user_photo'){ 

			$userid = $_POST['userid'];

			if(isset($_FILES['user_photo']['name'])){
				$file_name   = $_FILES['user_photo']['name'];
				$explode     = explode(".", $file_name);
				$extension   = end($explode);
				$tmp_name    = $_FILES['user_photo']['tmp_name'];
				$size        = $_FILES['user_photo']['size'];
				$type        = $_FILES['user_photo']['type'];
	
			}

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'];
			}

			$added = time();
			
	
			if(!empty(isset($_FILES['user_photo']['name']) && !empty($_FILES['user_photo']['name']))) {
				$newFile 	 = random(10).'.'.$extension;
				$dataFile 	 = array('user_profile_photo' => $newFile);
			}

			$added = time();
			$query = $database->updatedata('users',$dataFile,'users_id', '=', $userid);
			if($query){
				echo "<div class='alert alert-success'>Update successfully.</div>";
				if(!empty(isset($_FILES['user_photo']['name']) && !empty($_FILES['user_photo']['name']))) {
					move_uploaded_file($tmp_name, 'assets/img/profile/'.$newFile);
				} ?>
	
					<script>
						setTimeout(function(){
							window.location = "users-settings.php";
	
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
		elseif($page == 'changepassword'){

			$userid    = (int) $_POST['userid'];
			
			$old_pass = escape($_POST['old_pass']);
			$new_pass = escape($_POST['new_pass']);
			$re_pass  = escape($_POST['re_pass']);
			$sql_pass  = "SELECT * FROM users WHERE users_id ='$userid'";

			$query = mysqli_query($conn,$sql_pass);

			$chg_pwd1 = mysqli_fetch_array($query);
			$data_pwd = escape($chg_pwd1['password']);
			if($data_pwd==$old_pass){
				if($new_pass==$re_pass){
					$sql_update = "UPDATE users set password = '$new_pass' where users_id ='$userid'";
					$update_query = mysqli_query($conn,$sql_update);
					echo "<div class='alert alert-success'>Update successfully.</div>";
						?>
				<script>
					setTimeout(function(){
						window.location = "users-settings.php";
					},3000);	
				</script>
				<?php }
				else{
					echo "<div class='alert alert-danger'><script>alert('Your new and Retype Password is not match'); window.location='users-settings.php.php?userid=$userid&name=account'</script></div>";
					echo mysqli_error($conn);
				}





			}
			else
			{
				echo "<div class='alert alert-danger'><script>alert('Your old password is wrong'); window.location='users-settings.php?userid=$userid&name=account'</script></div>";
				echo mysqli_error($conn);
			}
		}
		

	
		


?>