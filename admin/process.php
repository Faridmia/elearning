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
		// start setting page validation
		elseif($page == 'setting'){
			$phone       = escape($_POST['phone']); 
			$email       = escape($_POST['email']);
			$facebook    = escape($_POST['facebook']);
			$twitter     = escape($_POST['twitter']);
			$linkedin    = escape($_POST['linkedin']);
			$instagram   = escape($_POST['instagram']);
			$logo        =       $_FILES['logo'];
			$copyright   = escape($_POST['copyright']);
			$address     = escape($_POST['address']);


            $errors = array();
			if(isset($phone,$email,$facebook,$twitter,$linkedin,$instagram,$address,$copyright)){
				if(empty($phone) && empty($email) && empty($facebook) && empty($twitter) && empty($linkedin) && empty($instagram) && empty($address) && empty($copyright)){
					
						$errors[] = 'All field are required';
				}
				else
				{
					if(empty($phone)){
						$errors[] = 'phone field are required';
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

					$database 	= new Database();
					$conn 		= $database->connection;
					$data 		= array('phone' => $phone, 'email' => $email,'facebook' => $facebook,'twitter' => $twitter,'instagram' => $instagram,'address' => $address,'copyright' => $copyright,'linkedin' => $linkedin);

			    	if(!empty(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))) {
						//$newFile 	= md5(uniqid(rand(), true)).'.'.$extension;
			    		$newFile 	 = random(10).'.'.$extension;
						$dataFile 	 = array('logo' => $newFile);
						$data 		 = array_merge($data, $dataFile);
					}

					$query = $database->updatedata('setting',$data,'s_id', '=', 5);
					if($query){
						echo "<div class='alert alert-success'>Update successfully.</div>";
						if(!empty(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name']))) {
							move_uploaded_file($tmp_name, 'images/logo/'.$newFile);
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

	

			
	} // post token check if
	else
	{
		echo "oop! you are wrong";
	}
	


?>