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
											<li class="breadcrumb-item active" aria-current="page">Footer Top Change Option</li>
										</ol>
									</nav>
								</div>
							</div>
						
							<!-- /Row -->
							<form action="" method="post" id="update_footer_top" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Update Footer Top</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
										<?php 
											$database          = new Database();
											$conn              = $database->connection;

                                            $data 		= array(
                                                'addr_title', 
                                                'contact_info',
                                                'menu_title_1',
                                                'menu_info_1',
                                                'menu_title_2',
                                                'menu_info_2',
                                                'menu_title_3',
                                                'menu_info_3',
                                                'app_title',
                                                'app_text_1',
                                                'app_text_2',
												'app_link_1',
                                                'app_link_2'
                                                
                                            );
											$query       	   = $database->getData("footer_top",$data);
											$numrows     	   = $database->numRows($query);
											$row         	   = mysqli_fetch_array($query);

											$addr_title       = $row['addr_title']; 
											$contact_info     = $row['contact_info'];
											$menu_title_1     = $row['menu_title_1'];
											$menu_info_1      = $row['menu_info_1'];
											$menu_title_2     = $row['menu_title_2']; 
											$menu_info_2      = $row['menu_info_2'];
											$menu_title_3     = $row['menu_title_3'];
											$menu_info_3      = $row['menu_info_3'];
											$app_title        = $row['app_title'];
											$app_text_1       = $row['app_text_1'];
											$app_text_2       = $row['app_text_2'];
											$app_link_1       = $row['app_link_1'];
											$app_link_2       = $row['app_link_2'];

											
										?>
                                            
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-12">
														<label>Address</label>
														<input type="text" name="address" value="<?php echo $addr_title;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>Contact Info</label>
														<input type="text" name="contact_info" value="<?php echo $contact_info;?>" class="form-control">
													</div>
                                                    <div class="form-group col-md-12">
														<label>Pages Title</label>
														<input type="text" name="pages_title" value="<?php echo $menu_title_1;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>All Pages</label>
														<textarea class="form-control" name="pages_info"><?php echo $menu_info_1;?></textarea>
													</div>
													<div class="form-group col-md-12">
														<label>Category Title</label>
														<input type="text" name="cat_title" value="<?php echo $menu_title_2;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>Category Info</label>
														<textarea class="form-control" name="cat_info"><?php echo $menu_info_2;?></textarea>
													</div>
                                                    <div class="form-group col-md-12">
														<label>Support Title</label>
														<input type="text" name="support_title" value="<?php echo $menu_title_3;?>" class="form-control">
													</div>
													
													<div class="form-group col-md-12">
														<label>Support Info</label>
														<textarea class="form-control" name="suport_info"><?php echo $menu_info_3;?></textarea>
													</div>
													
													<div class="form-group col-md-12">
														<label>App Title</label>
														<input type="text" name="app_title" value="<?php echo $app_title;?>" class="form-control">
													</div>
                                                    <div class="form-group col-md-12">
														<label>App Text 1</label>
														<input type="text" name="app_text_1" value="<?php echo $app_text_1;?>" class="form-control">
													</div>
                                                    <div class="form-group col-md-12">
														<label>App Text 2</label>
														<input type="text" name="app_text_2" value="<?php echo $app_text_2;?>" class="form-control">
													</div>
													<div class="form-group col-md-12">
														<label>App LInk 1</label>
														<input type="text" name="app_link_1" value="<?php echo $app_link_1;?>" class="form-control">
													</div>
                                                    <div class="form-group col-md-12">
														<label>App LInk 2</label>
														<input type="text" name="app_link_2" value="<?php echo $app_link_2;?>" class="form-control">
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
									<input type="hidden" name="page" value="footer_top"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_privacy" type="submit">Update Footer Top</button>
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
            $('#update_footer_top').submit(function(e){
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