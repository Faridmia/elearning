<?php require_once('includes/header.php');  
    require_once('functions.php');
	$database    = new Database();
	?>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <!-- Start Navigation -->
			<?php require_once('includes/top-nav.php');  ?>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->	
			<!-- ============================ Dashboard: My Order Start ================================== -->
			<section class="gray pt-0">
				<div class="container-fluid">
					
					<!-- Row -->
					<div class="row">
						<?php require_once('includes/menu-navbar.php');  ?>
						
						<div class="col-lg-9 col-md-9 col-sm-12">
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">Add Listing</li>
										</ol>
									</nav>
								</div>
							</div>
                            <?php
                                $database    = new Database();
                                $conn        = $database->connection;
                                $cid         = (int) $_GET['courseid'];
								$data        = array('course_id','course_title','course_original_price','is_free_course','course_overview_provider','course_tag','video_url','course_desc','outcomes','course_duration','course_sell_price','course_img','long_desc','level','is_top_course','requirement','course_features','category_id','sub_category_id');
                                // $data        = array('course_id','course_title','course_original_price','	course_start','course_expire','course_tag','course_instractor','course_img','course_desc','course_category','course_duration','course_sell_price');
                                $query       = $database->getData("courses",$data,"course_id",'=',"$cid");
                                $numrows     = $database->numRows($query);
                                if($numrows > 0){
                                    
                                    $row                    = mysqli_fetch_array($query);
                                    $course_id              = escape($row['course_id']);
                                    $course_title           = escape($row['course_title']);  
                                    $course_original_price  = escape($row['course_original_price']);
                                    $is_free_course           = escape($row['is_free_course']); 
                                    $course_overview_provider = escape($row['course_overview_provider']);
                                    $course_tag             = escape($row['course_tag']);
                                    $video_url              = escape($row['video_url']);
                                    $course_desc            = escape($row['course_desc']);
                                    $outcomes        		= escape($row['outcomes']);
                                    $course_duration        = escape($row['course_duration']);
                                    $course_sell_price      = escape($row['course_sell_price']);
                                    $course_img      		= escape($row['course_img']);
                                    $long_desc      		= escape($row['long_desc']);
                                    $level     	 			= escape($row['level']);
                                    $is_top_course      	= escape($row['is_top_course']);
                                    $requirement      		= escape($row['requirement']);
                                    $course_features      	= escape($row['course_features']);
                                    $category_id      		= escape($row['category_id']);
                                    $sub_category_id      	= escape($row['sub_category_id']);
                            ?>
							<!-- /Row -->
							<form action="" method="post" id="course_update" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Edit your Course</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-6">
														<label>Course Title</label>
														<input type="text" name="course_title" class="form-control" value="<?php echo $course_title;?>">
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Orginal Price</label>
														<input type="text" name="course_orginal_price" class="form-control" value="<?php echo $course_original_price;?>">
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Start</label>
														<input type="text" name="course_start" class="form-control" value="<?php echo $course_start;?>" />
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Expire</label>
														<input type="text" name="course_expire" class="form-control" value="<?php echo $course_expire;?>" />
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Tag</label>
														<input type="text" name="course_tag" class="form-control" value="<?php echo $course_tag;?>">
													</div>
													
													<div class="form-group col-md-6">
														<label>Instructor Name</label>
														<input type="text" name="instractor_name" class="form-control" value="<?php echo $course_instractor;?>"/>
													</div>
													<div class="form-group col-md-6">
														<label>Selling Price</label>
														<input type="text" name="course_sell_price" class="form-control" value="<?php echo $course_sell_price;?>"/>
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Image</label>
														<input type="file" class="form-control" id="course_images" name='course_images' value=""/>
                                                        <img src="<?php echo "../assets/img/course/$course_img";?>" alt="" width="100px"><br/>
													</div>
                                                   
													
												</div>
											</div>
											<!-- Basic info -->
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Course Description</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">

													<div class="form-group col-md-12">
														<label>About Course</label>
														<textarea class="form-control" name="course_desc" ><?php echo $course_desc;?></textarea>
													</div>
													
													<div class="form-group col-md-12">
														<label>Category</label>
														<input type="text" name="course_category" class="form-control" value="<?php echo $course_category;?>">
													</div>
													<div class="form-group col-md-12">
														<label>Course Durations</label>
														<input type="text" name="course_durations" class="form-control" value="<?php echo $course_duration;?>">
													</div>
													
												</div>
											</div>
											<!-- Basic info -->
											<div id="success"></div>
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<?php echo $database->formtoken();?>
                                    <input type="hidden" name="cid" value="<?php echo $cid;?>"/>
                                    <input type="hidden" name="page" value="course"/>
									<button class="btn btn-theme" name="add_course" type="submit">Save Course</button>
								</div>
								<div class="form-group">
                                	<div id="success"></div>
                            	</div>
							</div>
							</form>
                            <?php
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>No! Course found it</div>";
                            }

                            ?>
						</div>
					
					</div>
					<!-- Row -->
					
				</div>
			</section>
			<!-- ============================ Dashboard: My Order Start End ================================== -->
			<?php require_once('includes/footer.php');  ?>
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
		<?php  require_once('includes/js.php'); ?>
		<script type="text/javascript">

            $('#course_update').submit(function(e){
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'update-course.php',
                    data: data,
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }


                });
            });     
        </script>

	</body>
</html>