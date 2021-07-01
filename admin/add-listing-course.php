	<?php require_once('includes/header.php');  ?>
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
							<!-- /Row -->
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Submit your Course</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-6">
														<label>Course Title</label>
														<input type="text" name="course_title" class="form-control" placeholder="Course Title">
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Orginal Price</label>
														<input type="email" name="course_orginal_price" class="form-control" placeholder="Ex. 199.10">
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Start</label>
														<input type="text" name="course_start" class="form-control" value="10/24/2020" />
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Expire</label>
														<input type="text" name="course_expire" class="form-control" value="10/24/2021" />
													</div>
													
													<div class="form-group col-md-6">
														<label>Course Tag</label>
														<input type="text" name="course_tag" class="form-control" value="Ex. design, PHP, CSS">
													</div>
													
													<div class="form-group col-md-6">
														<label>Instructor Name</label>
														<input type="text" name="instractor_name" class="form-control" placeholder="Anshu Majavi">
													</div>
													
													<div class="form-group col-md-12">
														<label>Course Image</labe>
														<input type="file" class="form-control" id="p_images" name='p_images' value=""/>
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
														<textarea class="form-control" name="course_desc" placeholder="Description"></textarea>
													</div>
													
													<div class="form-group col-md-12">
														<label>Category</label>
														<input type="text" name="course_category" class="form-control" placeholder="Ex. Science, Physics, Math..">
													</div>
													<div class="form-group col-md-12">
														<label>Course Durations</label>
														<input type="text" name="course_durations" class="form-control" placeholder="Course Durations">
													</div>
													<div class="form-group col-md-12">
														<label>Selling Price</label>
														<input type="text" name="course_sell_price" class="form-control" placeholder="Course Selling Price">
													</div>
													
												</div>
											</div>
											<!-- Basic info -->
											
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<button class="btn btn-theme" name="add_course" type="submit">Save Course</button>
								</div>
							</div>
							
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

	</body>
</html>