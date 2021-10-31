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
											<li class="breadcrumb-item active" aria-current="page">Add Category</li>
										</ol>
									</nav>
								</div>
							</div>

							<?php if(isset($_GET['catid'])) { 


								$database    = new Database();
								$conn        = $database->connection;
								$catid         = (int) $_GET['catid'];
								$data        = array('cat_id','cat_name');
								$query       = $database->getData("categories",$data,"cat_id",'=',"$catid");
								$numrows     = $database->numRows($query);
								if($numrows > 0){
									$fetch                    = mysqli_fetch_array($query);
									$catnameDb           	  = $fetch['cat_name']; 
									$catidDb              	  = $fetch['cat_id'];

								?>
								<!-- /Row -->
							<form action="" method="post" id="update_category_data" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Edit Category</h4>
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
														<label>Category</label>
														<input type="text" name="cat_name" class="form-control" value="<?php echo $catnameDb;?>">
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
									<input type="hidden" name="catid" value="<?php echo $catidDb;?>"/>
									<input type="hidden" name="page" value="category"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_category" type="submit">update Category</button>
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
							<form action="" method="post" id="add_category_data" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add Category</h4>
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
														<label>Category</label>
														<input type="text" name="category" class="form-control" placeholder="Category Name">
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
									<input type="hidden" name="page" value="add_category"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="add_student" type="submit">Add Category</button>
								</div>
							</div>
							</form>
						
                            <!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>All Category</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
											<?php
												$database    = new Database();
												$conn        = $database->connection;
												$data        = array('cat_id','	cat_name');
												$query       = $database->getData("categories",$data); ?>
												<table class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col">Category ID</th>
															<th scope="col">Category Name</th>
															<th scope="col">Action</th>
															
														</tr>
													</thead>
													<tbody>

												<?php	
														$i = 1;
														while($row = mysqli_fetch_array($query)){
															$cat_id          = (int) $row['cat_id'];
															$cat_name        = $row['cat_name'];
													echo "<tr>";
															echo "<th scope='row'>$i</th>";
															echo "<td>$cat_name</td>";
															echo "<td>
																<div class='dash_action_link'>
																	<a href='category.php?catid=$cat_id&name=category' class='view'>View</a>
																	<a href='delete.php?catid=$cat_id&name=category' class='cancel'>Cancel</a>
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

				$('#update_category_data').submit(function(e){
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

            $('#add_category_data').submit(function(e){
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