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
											<li class="breadcrumb-item active" aria-current="page">Faq Category</li>
										</ol>
									</nav>
								</div>
							</div>

							<?php if(isset($_GET['faqcatid'])) { 


								$database    = new Database();
								$conn        = $database->connection;
								$faqcatid         = (int) $_GET['faqcatid'];
								$data        = array('faq_cat_id','faq_cat_name');
								$query       = $database->getData("faq_category",$data,"faq_cat_id",'=',"$faqcatid");
								$numrows     = $database->numRows($query);
								if($numrows > 0){
									$fetch                    = mysqli_fetch_array($query);
									$faq_cat_idDb                = $fetch['faq_cat_id'];
									$cat_nameDb           	  = $fetch['faq_cat_name']; 
									//$for_whoom_Db             = $fetch['for_whoom']; 

								?>
								<!-- /Row -->
							<form action="" method="post" id="update_faq_cat" enctype="multipart/form-data">
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
														<label>Category Name</label>
														<input type="text" name="faq_category" class="form-control" value="<?php echo $cat_nameDb;?>">
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
									<input type="hidden" name="faq_cat_id" value="<?php echo $faq_cat_idDb;?>"/>
									<input type="hidden" name="page" value="faq_cat"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_faq_category" type="submit">Update Category</button>
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
							<form action="" method="post" id="add_faq_category" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add Faq Category</h4>
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
														<label>Category Name</label>
														<input type="text" name="cat_name" class="form-control" placeholder="Enter Term Name Here">
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
									<input type="hidden" name="page" value="add_faq_category"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="add_faq_cat" type="submit">Add Faq Category</button>
								</div>
							</div>
							</form>
						
                            <!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>All Faq Category</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
											<?php
												$database    = new Database();
												$conn        = $database->connection;
												$data        = array('faq_cat_id ','faq_cat_name');
												$query       = $database->getData("faq_category",$data); ?>
												<table class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col">faq ID</th>
															<th scope="col">Category Name</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>

												<?php	
														$i = 1;
														while($row = mysqli_fetch_array($query)){
															$faq_cat_id      = (int) $row['faq_cat_id'];
															$faq_cat_name     = $row['faq_cat_name'];
															
													echo "<tr>";
															echo "<th scope='row'>$i</th>";
															echo "<td>$faq_cat_name</td>";
															echo "<td>
																<div class='dash_action_link'>
																	<a href='faq_category.php?faqcatid=$faq_cat_id&name=faq_cat' class='view'>View</a>
																	<a href='delete.php?faqcatid=$faq_cat_id&name=faq_cat' class='cancel'>Cancel</a>
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

			$('#update_faq_cat').submit(function(e){
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

            $('#add_faq_category').submit(function(e){
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