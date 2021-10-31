<?php require_once('includes/header.php');  ?>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
		<?php require_once('includes/top-nav.php');  ?>

			
			<!-- ============================ Dashboard: My Order Start ================================== -->
			<section class="gray pt-0">
				<div class="container-fluid">
					
					<!-- Row -->
					<div class="row">
					
					<?php require_once("includes/menu-navbar.php");?>
						
					<div class="col-lg-9 col-md-9 col-sm-12">
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb">
											<li class="breadcrumb-item"><a href="#">Home</a></li>
											<li class="breadcrumb-item active" aria-current="page">List of Students</li>
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
												<h4>All Course</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
											<?php
												$database    = new Database();
												$conn        = $database->connection;
												$data        = array('users_id','name','email','user_profile_photo');
												$query       = $database->getData("users",$data); ?>
												<table class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col">Photo</th>
															<th scope="col">Name</th>
															<th scope="col">E-Mail</th>
															<th scope="col">Enroll Course</th>
															<th scope="col">Action</th>
															
														</tr>
													</thead>
													<tbody>

												<?php	
														$i = 1;
														while($row = mysqli_fetch_array($query)){
															$users_id          	= (int) $row['users_id'];
															$name        		= $row['name'];
															$email       		= $row['email'];
															$user_profile_photo = $row['user_profile_photo'];
														echo "<tr>";
															echo "<td><img src='../assets/img/profile/$user_profile_photo' width='60px'></td>";
															echo "<td>$name</td>";
															echo "<td>$email</td>";
															echo "<td>1</td>";
															echo "<td>
																<div class='dash_action_link'>
																	<a href='edit-student.php?stuid=$users_id&name=student' class='view'>View</a>
																	<a href='delete.php?stuid=$users_id&name=student' class='cancel'>Cancel</a>
																</div>	
															</td>";
														echo "</tr>";
													$i++;
													}
									   			?>

													</tbody>
												</table>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							
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