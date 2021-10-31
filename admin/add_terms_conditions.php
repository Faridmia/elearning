<?php require_once('includes/header.php');  
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
											<li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
										</ol>
									</nav>
								</div>
							</div>

							<?php if(isset($_GET['tid'])) { 


								$database    = new Database();
								$conn        = $database->connection;
								$tid         = (int) $_GET['tid'];
								$data        = array('t_id','terms','for_whoom');
								$query       = $database->getData("terms",$data,"t_id",'=',"$tid");
								$numrows     = $database->numRows($query);
								if($numrows > 0){
									$fetch                    = mysqli_fetch_array($query);
									$tid_dDb              	  = $fetch['t_id'];
									$termseDb           	  = $fetch['terms']; 
									//$for_whoom_Db             = $fetch['for_whoom']; 

								?>
								<!-- /Row -->
							<form action="" method="post" id="update_conditions" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Edit T&C</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
                                            <div class="form-group">
                                                <div id="success"></div>
                                            </div>
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
													<div class="form-group col-md-6">
														<label>Terms Name</label>
														<input type="text" name="terms" class="form-control" value="<?php echo $termseDb;?>">
													</div>
													<div class="form-group col-md-6">
														<label>Select Term For</label>
														<select name="for_whoom" id="for_whoom" class="form-control">
														<option value="">--select--</option>
														<?php 


															$database    = new Database();
															$conn        = $database->connection;
															$data        = array('t_id','for_whoom');
															$query       = $database->getData("terms",$data);

															while($row = mysqli_fetch_array($query)){
																$tid_db_id    	  = (int) $row['t_id'];
																$for_whoom_Db2    = $row['for_whoom'];

																if($tid == $tid_db_id){
																	$sel1 = 'selected = "selected"';
																}
																else
																{
																	$sel1 = '';
																}
																if($for_whoom_Db2 == '1'){
																	$for_whoom = 'student';
																}elseif($for_whoom_Db2 == '2'){
																	$for_whoom = 'teacher';
																}
						
																echo "<option $sel1 value='$tid_db_id'>$for_whoom</option>";
														   }
														
														?>

													</select>
													</div>
												</div>
											</div>
											<!-- Basic info -->
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<input type="hidden" name="condition_id" value="<?php echo $tid_dDb;?>"/>
									<input type="hidden" name="page" value="conditions"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_terms_conditions" type="submit">Update Conditions</button>
								</div>
							</div>
							</form>
								<?php
								}
								else
								{
									echo "<div class='alert alert-danger'>No! Category found it</div>";
								}

								?>

							<?php } else { ?>
							<!-- /Row -->
							<form action="" method="post" id="add_terms_conditions" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add New T&C</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
                                            <div class="form-group">
                                                <div id="success"></div>
                                            </div>
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-6">
														<label>Terms</label>
														<input type="text" name="term" class="form-control" placeholder="Enter Term Name Here">
													</div>

													<div class="form-group col-md-6">
														<label>Select Term For</label>
														<select name="for_whoom" id="for_whoom" class="form-control">
														<option value="">--select--</option>
														<option value="1">Student</option>
														<option value="2">Teacher</option>
													</select>
													</div>
												</div>
											</div>
											<!-- Basic info -->
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Row -->
							<!-- /Row -->
							<div class="row">
								<div class="form-group col-lg-12 col-md-12">
									<input type="hidden" name="page" value="add_terms"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="add_terms" type="submit">Add T&C</button>
								</div>
							</div>
							</form>
						
                            <!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>All T&C</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
											<?php
												$database    = new Database();
												$conn        = $database->connection;
												$data        = array('t_id','	terms','for_whoom');
												$query       = $database->getData("terms",$data); ?>
												<table class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col">Terms ID</th>
															<th scope="col">Terms Name</th>
															<th scope="col">For Whoom</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>

												<?php	
														$i = 1;
														while($row = mysqli_fetch_array($query)){
															$t_id          = (int) $row['t_id'];
															$terms        = $row['terms'];
															$for_whoom_Db    = $row['for_whoom'];
													echo "<tr>";
															echo "<th scope='row'>$i</th>";
															echo "<td>$terms</td>";
															if($for_whoom_Db == '1'){
																$for_whoom = 'student';
															}else{
																$for_whoom = 'teacher';
															}
															echo "<td>$for_whoom</td>";
															echo "<td>
																<div class='dash_action_link'>
																	<a href='add_terms_conditions.php?tid=$t_id&name=terms' class='view'>View</a>
																	<a href='delete.php?tid=$t_id&name=terms' class='cancel'>Cancel</a>
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
							<?php } ?>

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

				$('#update_conditions').submit(function(e){
					e.preventDefault();
					var data = new FormData(this);
					$.ajax({
						type: 'POST',
						url: 'edit_process.php',
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

            $('#add_terms_conditions').submit(function(e){
				//alert("test form data");
                e.preventDefault();
                var data = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
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