<?php
    ob_start();
    require_once('init.php');
    $login = new login();
    if($login->islogin() == false){
       header('location:login.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="www.frebsite.nl" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
        <title>  Online Course & Education Site</title>
		 
        <!-- Custom CSS -->
        <link href="src/assets/css/styles.css" rel="stylesheet">
		
		<!-- Custom Color Option -->
		<link href="src/assets/css/colors.css" rel="stylesheet">
		
    </head>
	
    <body class="red-skin">
	
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->