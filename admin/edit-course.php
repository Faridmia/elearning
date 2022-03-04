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
								$data        = array('course_id','course_title','course_original_price','is_free_course','course_overview_provider','course_tag','video_url','course_desc','outcomes','course_duration','course_sell_price','course_img','long_desc','level','is_top_course','requirement','course_features','category_id','sub_category_id','is_featured_course');
                               
                                $query       = $database->getData("courses",$data,"course_id",'=',"$cid");
                                $numrows     = $database->numRows($query);
                                if($numrows > 0){
                                    
                                    $row                    = mysqli_fetch_array($query);
                                    $course_id              = escape($row['course_id']);
                                    $course_title           = escape($row['course_title']);  
                                    $course_original_price  = escape($row['course_original_price']);
                                    $is_free_course         = $row['is_free_course']; 
                                    $course_overview_provider = escape($row['course_overview_provider']);
                                    $course_tag             = escape($row['course_tag']);
                                    $video_url              = escape($row['video_url']);
                                    $course_desc            = $row['course_desc'];
                                    $outcomes        		= escape($row['outcomes']);
                                    $course_duration        = escape($row['course_duration']);
                                    $course_sell_price      = escape($row['course_sell_price']);
                                    $course_img      		= escape($row['course_img']);
                                    $long_desc      		= $row['long_desc'];
                                    $level     	 			= escape($row['level']);
                                    $is_top_course      	= (int) $row['is_top_course'];
                                    $requirement      		= $row['requirement'];
                                    $course_features      	= $row['course_features'];
                                    $category_id      		= escape($row['category_id']);
                                    $sub_category_id      	= escape($row['sub_category_id']);
                                    $is_featured_course     = $row['is_featured_course'];

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
															<label>Course Tag</label>
															<input type="text" name="course_tag" class="form-control" value="<?php echo $course_tag;?>">
														</div>
														
														<div class="form-group col-md-6">
															<label>Course Duration</label>
															<input type="text" name="course_duration" class="form-control" value="<?php echo $course_duration;?>"/>
														</div>
														<div class="form-group col-md-6">
															<label>Selling Price</label>
															<input type="text" name="course_sell_price" class="form-control" value="<?php echo $course_sell_price;?>"/>
														</div>
														<div class="form-group col-md-6 form-check">
															<input type="checkbox" class="form-check-input"  name="free_course" id="is_free_course"  <?php if($is_free_course == '1') echo "checked='checked'";?>>
															<label class="form-check-label">Check if this course is Free?</label>
														</div>
														<div class="form-group col-md-6">
															<label>Course Image</label>
															<input type="file" class="form-control" id="course_images" name='course_images' value=""/>
															<img src="<?php echo "../assets/img/course/$course_img";?>" alt="" width="100px"><br/>
														</div>
														<div class="form-group col-md-6">
															<label>Course Overview Provider</label>
															<input type="text" name="course_overview_provider" class="form-control" value="<?php echo $course_overview_provider;?>">
														</div>
														<div class="form-group col-md-12">
															<label>Course Provider URL</label>
															<input type="text" name="course_provider_url" class="form-control" value="<?php echo $video_url;?>">
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
														<label>Outcomes</label>
														<input type="text" class="form-control" name="outcome" value="<?php echo $outcomes;?>"/>
													</div>
													<div class="form-group col-md-12">
														<label>Short Description</label>
														<textarea class="form-control" name="course_desc" placeholder="Description"><?php echo $course_desc;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Long Description</label>
														<textarea class="form-control" name="long_desc" placeholder="Description"><?php echo $long_desc;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Course Level</label>
														<input type="text" name="course_level" class="form-control" value="<?php echo $level;?>" placeholder="Course Level">
													</div>

													<div class="form-group col-md-12">
														<label for="course_category">Course Category</label>
														<select name="course_category"  class="form-control course_category">
														<option value="">--select category--</option>
														<?php
															$data        = array('cat_id','cat_name');
															$query       = $database->getData("categories",$data);

															while($row2 = mysqli_fetch_array($query)){
																$cat_id    = (int) $row2['cat_id'];
																$cat_name  = $row2['cat_name'];
																echo $category_id;
																if($category_id  == $cat_id){
																	$sel = 'selected = "selected"';
																}
																else
																{
																	$sel = '';
																}
																echo "<option $sel value={$cat_id}>$cat_name</option>";
															}
														?>
														</select>
													</div>
													<div class="course_sub_category form-group col-lg-12"></div>
													<div class="form-group col-md-6">
														<input type="checkbox" class="form-check-input" <?php if($is_top_course == '1') echo "checked = 'checked'";?> name="is_top_course" id="is_top_course">
														<label class="form-check-label">Check if this course is top course?</label>
														
													</div>
													<div class="form-group col-md-6">
														<input type="checkbox" class="form-check-input" <?php if($is_featured_course == '1') echo "checked = 'checked'";?> name="is_featured_course" id="is_featured_course">
														<label class="form-check-label">Check if this course is Featured course?</label>
														
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Course Requirements</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
													<div class="form-group col-md-12">
														<label>Requirements</label>
														<textarea class="form-control" name="course_req" placeholder="Requirements"><?php echo $requirement;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Features</label>
														<textarea class="form-control" name="course_feature" placeholder="Description"><?php echo $course_features;?></textarea>
													</div>
												</div>
											</div>
											<div id="success"></div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<input type="hidden" name="page" value="update_course"/>
									<input type="hidden" name="cid" value="<?php echo $course_id;?>"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="add_course" type="submit">Update Course</button>
								</div>
								<div class="form-group">
                                	<!-- Basic info -->
											
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