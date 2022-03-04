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
							<form action="" method="post" id="update_contact_info" enctype="multipart/form-data">
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
											$data              = array('sub_heading','heading','content','addr_title','address','mail_title','mail','phone_title','phone_num');
											$query       	   = $database->getData("contact_us",$data);
											$numrows     	   = $database->numRows($query);
											$row         	   = mysqli_fetch_array($query);

											$sub_heading       = $row['sub_heading']; 
											$heading           = $row['heading'];
											$content           = $row['content'];
											$addr_title        = $row['addr_title'];
											$address           = $row['address']; 
											$mail_title        = $row['mail_title'];
											$mail              = $row['mail'];
											$phone_title       = $row['phone_title'];
											$phone_num         = $row['phone_num'];

											
										?>
                                            
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-12">
														<label>Sub Heading</label>
														<input type="text" name="sub_heading" value="<?php echo $sub_heading;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>Heading</label>
														<input type="text" name="heading" value="<?php echo $heading;?>" class="form-control">
													</div>
											
													<div class="form-group col-md-12">
														<label>Description</label>
														<textarea class="form-control" name="desription"><?php echo $content;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Address Title</label>
														<input type="text" name="addr_title" value="<?php echo $addr_title;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>Address</label>
														<textarea class="form-control" name="address"><?php echo $address;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Mail Title</label>
														<input type="text" name="mail_title" value="<?php echo $mail_title;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>E-Mail</label>
														<textarea class="form-control" name="email"><?php echo $mail;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Phone Title</label>
														<input type="text" name="phone_title" value="<?php echo $phone_title;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>Phone Number</label>
														<textarea class="form-control" name="phone_number"><?php echo $phone_num;?></textarea>
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
									<input type="hidden" name="page" value="contact_info"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_privacy" type="submit">Update Contact Info</button>
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
            $('#update_contact_info').submit(function(e){
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