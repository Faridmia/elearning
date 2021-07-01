<?php 

    ob_start();
    require_once('../admin/init.php');
    require_once('../admin/functions.php');
    if(!isset($_SESSION)){
        session_start();
    }
    $database 	= new Database();
    $conn 		= $database->connection;

    // checking email already registered

    if(isset($_POST['checkemail']) && isset($_POST['stuemail'])) {

        $stuemail  		 = escape($_POST['stuemail']);

        $sql = "SELECT stu_email FROM student_reg WHERE stu_email = '".$stuemail."'";
        $result = $conn->query($sql);

        $row = $result->num_rows;
        echo json_encode($row);

    }
    // student insert query code under
    
    if(isset($_POST['signupbtn']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stuusername']) && isset($_POST['stupass'])) {

        $stuname     	 = escape($_POST['stuname']); 
        $stuemail  		 = escape($_POST['stuemail']);
        $stupass         = escape($_POST['stupass']);
        $stuusername     = escape($_POST['stuusername']);

        $added = time();
        $data 		= array('stu_name' => $stuname, 'stu_email' => $stuemail,'stu_username' => $stuusername,'stu_pass' => $stupass,'stu_occ' => '','stu_img' => '');

        $query = $database->insertdata('student_reg',$data);
        if($query){
            echo json_encode("ok");
        }
        else
        {
            echo json_encode("failed");
        }

    }


    // student login verifications
    if(!isset($_SESSION['is_login'])){

        if(isset($_POST['checkLogemail']) && isset($_POST['user_email'])  && isset($_POST['user_pass']) ){

            $user_email     	 = escape($_POST['user_email']); 
            $user_pass  		 = escape($_POST['user_pass']);
    
            $sql = "SELECT stu_email,stu_pass FROM student_reg WHERE stu_email = '$user_email' AND stu_pass = '$user_pass'";
            $result = $conn->query($sql);
    
            $row = $result->num_rows;
    
            if($row === 1){
    
                $_SESSION['is_login'] = true; 
                $_SESSION['user_email'] = $user_email; 
                echo json_encode($row);
            }elseif($row === 0){
                echo json_encode($row);
            }
        }
    }


?>