<div class="col-lg-3 col-md-3 p-0">
    <div class="dashboard-navbar">
   <?php
   $database    = new Database();
   $conn        = $database->connection;
    if(isset($_SESSION['is_login'])){
		$user_login = $_SESSION['username']; 
		$query = "SELECT * FROM admin WHERE username = '$user_login'";
		$result = $conn->query($query);
		$row         = mysqli_fetch_array($result);
		$username    = $row['username'];
		$email       = $row['email'];
		$profileimg  = $row['profileimg'];
		


	} ?>    
        <div class="d-user-avater">
            <?php if(!empty($profile_photo)) : ?>
            <img src="../assets/img/profile/<?php echo $profileimg;?>" class="img-fluid avater" alt="">
            <?php else : ?>
                <img src="../assets/img/placeholder.png" class="img-fluid avater" alt="">
            <?php endif;?>
            <?php if(!empty($username)) : ?>
                <h4><?php echo $username;?></h4>
            <?php else : ?>
                <h4>Farid Mia</h4>
            <?php endif;?>
            <?php if(!empty($email)) : ?>
                <span><?php echo $email;?></span>
            <?php else : ?>
                <span>mdfarid7830@gmail.com</span>
            <?php endif;?>
        </div>
        
        <div class="d-navigation">
            <ul id="side-menu">
                <li class="active"><a href="index.php"><i class="ti-user"></i>Dashboard</a></li>
                <li><a href="category.php"><i class="ti-user"></i>View Categories</a></li>
                <li><a href="add-listing-course.php"><i class="ti-plus"></i>Add Course</a></li>
                <li><a href="lessons.php"><i class="ti-heart"></i>Lessons</a></li>
                <li class="dropdown">
                    <a href="all-students.php"><i class="ti-layers"></i>Students<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add-student.php">Add Students</a></li>
                        <li><a href="all-students.php">All Students</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="all-students.php"><i class="ti-layers"></i>Sub Category<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add-sub-category.php">Add Sub Category</a></li>
                        <li><a href="all-students.php">All Sub Category</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="all-courses.php"><i class="ti-layers"></i>Courses<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add-listing-course.php">Add Course</a></li>
                        <li><a href="all-courses.php">All Course</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="add-section.php"><i class="ti-layers"></i>Section<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add-section.php">Add Section</a></li>
                        
                    </ul>
                </li>

                
                <li><a href="add_terms_conditions.php"><i class="ti-shopping-cart"></i>View T&C</a></li>
                <li class="dropdown">
                    <a href="all-students.php"><i class="ti-layers"></i>Faq<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="faq_category.php"><i class="ti-shopping-cart"></i>View Faq Category</a></li>
                        <li><a href="add_faq.php"><i class="ti-shopping-cart"></i>View Faq</a></li>
                    </ul>
                </li>
                
                <li><a href="setting.php"><i class="ti-setting"></i>Setting</a></li>
                <li><a href="settings.php"><i class="ti-settings"></i>Settings</a></li>
                <li><a href="logout.php"><i class="ti-power-off"></i>Log Out</a></li>
            </ul>
        </div>
    </div>
</div>