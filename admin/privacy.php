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
											<li class="breadcrumb-item active" aria-current="page">Privacy</li>
										</ol>
									</nav>
								</div>
							</div>
						
							<!-- /Row -->
							<form action="" method="post" id="update_privacy" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Update Privacy</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
										<?php 
											$database          = new Database();
											$conn              = $database->connection;
											$data              = array('heading','desc_1','desc_2','desc_3');
											$query       	   = $database->getData("privacy_policy",$data);
											$numrows     	   = $database->numRows($query);
											$row         	   = mysqli_fetch_array($query);
											$heading           = $row['heading']; 
											$desc_1            = $row['desc_1'];
											$desc_2            = $row['desc_2'];
											$desc_3            = $row['desc_3'];
										?>
                                            
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-12">
														<label>About Heading</label>
														<input type="text" name="heading" value="<?php echo $heading;?>" class="form-control">
													</div>
											
													<div class="form-group col-md-12">
														<label>Description 1</label>
														<textarea class="form-control" name="desc_1"><?php echo $desc_1;?></textarea>
													</div>
													
													<div class="form-group col-md-12">
														<label>Description 2</label>
														<textarea class="form-control" name="desc_2" placeholder="Description"><?php echo $desc_2;?></textarea>
													</div>
													
													<div class="form-group col-md-12">
														<label>Description 3</label>
														<textarea class="form-control" name="desc_3" placeholder="Description"><?php echo $desc_3;?></textarea>
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
									<input type="hidden" name="page" value="privacy"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_privacy" type="submit">Update Privacy</button>
								</div>
								<div class="form-group">
									<div id="success"></div>
								</div>
							</div>
							</form>

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
		<script type='text/javascript'>
            $('#update_privacy').submit(function(e){
                e.preventDefault();
                //  alert(1);
                //var data = $('#update').serialize();
                var data = new FormData(this);

                //alert(1);
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