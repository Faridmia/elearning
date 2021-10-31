<?php 
	require_once('includes/header.php');  
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
											<li class="breadcrumb-item active" aria-current="page">Faq</li>
										</ol>
									</nav>
								</div>
							</div>

							<?php if(isset($_GET['faqid'])) { 


								$database    = new Database();
								$conn        = $database->connection;
								$faqid         = (int) $_GET['faqid'];
								$data        = array('faq_id','faq_ques','faq_answer','faq_cat_id');
								$query       = $database->getData("faq",$data,"faq_id",'=',"$faqid");
								$numrows     = $database->numRows($query);
								if($numrows > 0){
									$fetch                    = mysqli_fetch_array($query);
									$faq_id_Db                = $fetch['faq_id'];
									$faq_ques_Db           	  = $fetch['faq_ques']; 
									$faq_answer_Db            = $fetch['faq_answer']; 
									$db_faq_cat_id            = $fetch['faq_cat_id']; 

								?>
								<!-- /Row -->
							<form action="" method="post" id="update_faq" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Edit Faq</h4>
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
														<label>Faq Question</label>
														<input type="text" name="faq_ques" class="form-control" value="<?php echo $faq_ques_Db;?>">
													</div>
													<div class="form-group col-md-6">
														<label>Select Tab for</label>
														<select name="for_tab" id="for_tab" class="form-control">
														<option value="">--select--</option>
														<?php 
															$database    = new Database();
															$conn        = $database->connection;
															$data        = array('faq_cat_id','faq_cat_name');
															$query       = $database->getData("faq_category",$data);

															while($row = mysqli_fetch_array($query)){
																echo $faq_cat_id    	  = (int) $row['faq_cat_id'];
																$faq_cat_name    = $row['faq_cat_name'];
																if($db_faq_cat_id == $faq_cat_id){
																	$sel1 = 'selected = "selected"';
																}
																else
																{
																	$sel1 = '';
																}
																echo "<option $sel1 value='$faq_cat_id'>$faq_cat_name</option>";
														   }
														
														?>
														</select>
													</div>
													<div class="form-group col-md-12">
														<label>Faq Answer</label>
														<textarea class="form-control" name="faq_ans"><?php echo $faq_answer_Db;?></textarea>
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
									<input type="hidden" name="faq_id" value="<?php echo $faq_id_Db;?>"/>
									<input type="hidden" name="page" value="faq"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_faq" type="submit">Update Faq</button>
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
							<form action="" method="post" id="add_faq" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add New Faq</h4>
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
														<label>faq Question</label>
														<input type="text" name="faq_ques" class="form-control" placeholder="Enter Faq Question Here">
													</div>
													<div class="form-group col-md-6">
														<label>Select Tab for</label>
														<select name="for_tab" id="for_tab" class="form-control">
														<option value="">--select--</option>
														<?php 


															$database    = new Database();
															$conn        = $database->connection;
															$data        = array('faq_cat_id','faq_cat_name');
															$query       = $database->getData("faq_category",$data);

															while($row = mysqli_fetch_array($query)){
																$faq_cat_id    	  = (int) $row['faq_cat_id'];
																$faq_cat_name    = $row['faq_cat_name'];

																echo "<option  value='$faq_cat_id'>$faq_cat_name</option>";
														   }
														
														?>
														</select>
													</div>
													<div class="form-group col-md-12">
														<label>faq Answer</label>
														<textarea class="form-control" name="faq_ans" placeholder="Answer"></textarea>
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
									<input type="hidden" name="page" value="add_faq"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="add_faq" type="submit">Add Faq</button>
								</div>
							</div>
							</form>
						
                            <!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>All Faq</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
											<?php
												$database    = new Database();
												$conn        = $database->connection;
												// $data        = array('faq_id ','faq_ques','faq_answer');
												// $query       = $database->getData("faq",$data); 

												$sql = "SELECT faq_id,faq_ques,faq_answer,faq_cat_name FROM faq LEFT JOIN faq_category ON faq.faq_cat_id = faq_category.faq_cat_id  ORDER BY faq.faq_id DESC";
												$query = mysqli_query($conn,$sql);
												
												
												?>
												<table class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col">faq ID</th>
															<th scope="col">faq question</th>
															<th scope="col">tab title</th>
															<th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>

												<?php	
														$i = 1;
														while($row = mysqli_fetch_array($query)){
															$faq_id          = (int) $row['faq_id'];
															$faq_ques        = $row['faq_ques'];
															$faq_cat_name        = $row['faq_cat_name'];
													echo "<tr>";
															echo "<th scope='row'>$i</th>";
															echo "<td>$faq_ques</td>";
															echo "<td>$faq_cat_name</td>";
															echo "<td>
																<div class='dash_action_link'>
																	<a href='add_faq.php?faqid=$faq_id&name=faq' class='view'>View</a>
																	<a href='delete.php?faqid=$faq_id&name=faq' class='cancel'>Delete</a>
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

				$('#update_faq').submit(function(e){
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

            $('#add_faq').submit(function(e){
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