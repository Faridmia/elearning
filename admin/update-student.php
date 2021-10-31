<?php
	require_once('init.php');
	require_once('functions.php');

	$database = new Database();
	$conn        = $database->connection;
	$token = $database->token($database->generatetoken());
	if($token){
		$page           		= escape($_POST['page']);
		$sid            		= (int) escape($_POST['sid']); 
		$stu_name         		= escape($_POST['name']); 
		$stu_email   			= escape($_POST['email']);
		$biography           = escape($_POST['biography']);
		
		if(isset($_FILES['user_profile_photo']['name'])){
			$file_name   = $_FILES['user_profile_photo']['name'];
			$explode     = explode(".", $file_name);
			$extension   = end($explode);
			$tmp_name    = $_FILES['user_profile_photo']['tmp_name'];
			$size        = $_FILES['user_profile_photo']['size'];
			$type        = $_FILES['user_profile_photo']['type'];

		}
		
        $data = array(
			'name' 				=> $stu_name,
			'email' 			=> $stu_email,
			'biography' 	    => $biography,
			
		);

		if(!empty(isset($_FILES['user_profile_photo']['name']) && !empty($_FILES['user_profile_photo']['name']))) {
			$newFile 	 = random(10).'.'.$extension;
			$dataFile 	 = array('user_profile_photo' => $newFile);
			$data 		 = array_merge($data, $dataFile);
		}

        $query = $database->updatedata('users',$data,'users_id', '=', $sid);
		if($query){
			echo "<div class='alert alert-success'>Update successfully.</div>";

			if(!empty(isset($_FILES['user_profile_photo']['name']) && !empty($_FILES['user_profile_photo']['name']))) {
				move_uploaded_file($tmp_name, '../assets/img/profile/'.$newFile);
			} ?>
			 ?>
				<script>
					setTimeout(function(){
						window.location = "all-students.php";

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