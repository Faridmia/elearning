<div class="col-lg-3 col-md-3 p-0">
    <div class="dashboard-navbar">
        <div class="d-user-avater">
            <?php if(!empty($profile_photo)) : ?>
            <img src="assets/img/profile/<?php echo $profile_photo;?>" class="img-fluid avater" alt="">
            <?php else : ?>
                <img src="assets/img/placeholder.png" class="img-fluid avater" alt="">
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
                <li class="dropdown">
                    <a href="add-listing-course.php"><i class="ti-settings"></i>Add Course<span class="ti-angle-left"></span></a>
                    <ul class="nav nav-second-level collapse show" style="">
                        
                        <li><a href="all-courses.php">All Course</a></li>
                        <li><a href="add-section.php">Add Section</a></li>
                        <li><a href="lessions.php">Add Lesson</a></li>
                        
                    </ul>
                </li>
                <li><a href="logout.php"><i class="ti-power-off"></i>Log Out</a></li>
            </ul>
        </div>
    </div>
</div>	