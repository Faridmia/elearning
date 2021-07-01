<?php
    ob_start();
    require_once('admin/init.php');
    require_once('admin/functions.php');

	if(isset($_POST['stuname']) || isset($_POST['stuemail']) || isset($_POST['stupass']) || isset($_POST['stuusername']) && isset($_POST['signup']) )	{

		$stuname     	 = escape($_POST['stuname']); 
		$stuemail  		 = escape($_POST['stuemail']);
		$stupass         = escape($_POST['stupass']);
		$stuusername     = escape($_POST['stuusername']);

	$errors = array();
	if(isset($stuname,$stuemail,$stupass,$stuusername)){
		if(empty($stuname) && empty($stuemail) && empty($stupass) && empty($stuusername)){
			
				$errors[] = 'All field are required';
		}
		else
		{

			$database 	= new Database();
			$conn 		= $database->connection;

			$sql = "SELECT * FROM student_reg where stu_email = '$stuemail' order by stu_id";
			$sqltwo = "SELECT * FROM student_reg where stu_username = '$stuusername' order by stu_id";

			$query = mysqli_query($conn,$sql);
			$query2 = mysqli_query($conn,$sqltwo);

			

			if(empty($stuname)){
				$errors[] = 'Student Name are required';
			}
			if(empty($stuemail)){
				$errors[] = 'email field are required';
			}
			elseif(!filter_var($stuemail, FILTER_VALIDATE_EMAIL) && !empty($stuemail)) {
				$errors[] = 'Invalid E-Mail';
			}
			elseif(mysqli_num_rows($query) > 0) {
				$errors[] = 'E-Mail already exists!';
			}
			if(empty($stupass)){
				$errors[] = 'Password field are required';
			}
			if(empty($stuusername)){
				$errors[] = 'Username field are required';
			}
			elseif(mysqli_num_rows($query2) > 0) {
				$errors[] = 'Username already exists!';
			}
		}
		if(!empty($errors)){
			foreach($errors as $error){
				echo $error."<br/>";
			}
		}

		else
		{

			$database 	= new Database();
			$conn 		= $database->connection;
			$added = time();
			$data 		= array('stu_name' => $stuname, 'stu_email' => $stuemail,'stu_username' => $stuusername,'stu_pass' => $stupass,'stu_occ' => '','stu_img' => '');

			$query = $database->insertdata('student_reg',$data);
			if($query){
				echo "<div class='alert alert-success'>New data added successfully.</div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>data not added</div>";
				echo mysqli_error($conn);
			}
		}
	}
}