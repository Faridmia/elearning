<?php 
 ob_start();
 require_once('admin/init.php');
 require_once('admin/functions.php');
//end of file registration page.............
function studentlogin(){
	echo "hello tesssssssssssssssssssssssssssssssssssssss";

	if($_GET['login_form'] && $_GET['login_form'] == true){

		$stu_username = $_POST['stu_username'];
		$stu_pass     = $_POST['stu_pass'];

		print_r($_POST);
	}
}
studentlogin();