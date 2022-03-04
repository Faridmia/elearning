<?php require_once('includes/header.php');  ?>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
		<?php require_once('includes/top-nav.php');  ?>

			
			<!-- ============================ Dashboard: Dashboard Start ================================== -->
			<section class="gray pt-0">
    <div class="container-fluid">
                            
        <div class="row">
        
		<?php require_once('includes/menu-navbar.php');  ?>
            
            <div class="col-lg-9 col-md-9 col-sm-12">
                
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Row -->
                
                <!-- Row -->
                <div class="row">
                    <?php 
                        $database = new Database();
                        $conn = $database->connection;

                        $active_sql = "SELECT * FROM courses WHERE is_active = '1'";
                        $act_query = mysqli_query($conn,$active_sql);
                        $fetch = mysqli_fetch_array($act_query);
                        $active_course = $database->numRows($act_query);

                        $pending_sql = "SELECT * FROM courses WHERE is_active = '0'";
                        $pending_query = mysqli_query($conn,$pending_sql);
                        $pen_course = $database->numRows($pending_query);


                        $sql = "SELECT * FROM courses";
                        $query = mysqli_query($conn,$sql);
                        $total_course = $database->numRows($query);

                        $user_sql = "SELECT * FROM users WHERE role_id = '2'";
                        $user_query = mysqli_query($conn,$user_sql);
                        $total_student = $database->numRows($user_query);

                        if(isset($_GET['name']) == 'active_course'){
                            $data = [
                                'is_active' => 1,
                                'status' => 1
                            ];
                            $query = $database->updatedata('courses',$data,'is_active', '=', 0);

                        }

                        // echo "<pre>";
                        // print_r($total_course);
                        // echo "</pre>";
                    ?>
            
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="dashboard_stats_wrap widget-1">
                            <div class="dashboard_stats_wrap_content"><h4><?php echo $total_course;?></h4> <span>Number Of Course</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="dripicons-archive text-muted"></i></div>
                        </div>	
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="dashboard_stats_wrap widget-2">
                            <div class="dashboard_stats_wrap_content"><h4><?php echo $total_student;?></h4> <span>Number of Students</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="dripicons-user-group text-muted"></i></div>
                        </div>	
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="dashboard_stats_wrap widget-1">
                            <div class="dashboard_stats_wrap_content"><h4><?php echo $active_course;?></h4> <span>Active Course</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="dripicons-user-group text-muted"></i></div>
                        </div>	
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12"><a href="index.php?name=active_course">
                        <div class="dashboard_stats_wrap widget-4">
                            <div class="dashboard_stats_wrap_content"><h4><?php echo $pen_course;?></h4> <span>Pending Course</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="dripicons-user-group text-muted"></i></div>
                        </div></a>
                    </div>
                    

                </div>
                <!-- /Row -->
            </div>
        
        </div>
        
    </div>
</section>
			<!-- ============================ Dashboard: Dashboard End ================================== -->
			<!-- ============================ Footer Start ================================== -->
			<?php require_once('includes/footer.php');  ?>
			<!-- ============================ Footer End ================================== -->
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<?php  require_once('includes/js.php'); ?>

	</body>
</html>