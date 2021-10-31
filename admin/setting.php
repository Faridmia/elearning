<?php 
  require_once('includes/header.php');  ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
        <div id="main-wrapper">
		
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
											<li class="breadcrumb-item active" aria-current="page">Settings</li>
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
												<h4>Site Setting</h4>
                        <?php 
                              $database    = new Database();
                              $conn        = $database->connection;
                              $data        = array('phone','email','facebook','twitter','linkedin','instagram','logo','address','copyright','banner_title','banner_desc','banner_img');
                              $query       = $database->getData("setting",$data);
                              $numrows     = $database->numRows($query);
                              $row         = mysqli_fetch_array($query);
                              $phone       = $row['phone']; 
                              $email       = $row['email'];
                              $facebook    = $row['facebook'];
                              $twitter     = $row['twitter'];
                              $linkedin    = $row['linkedin'];
                              $instagram   = $row['instagram'];
                              $address     = $row['address'];
                              $logo        = $row['logo'];
                              $copyright   = $row['copyright'];
                              $banner_desc = $row['banner_desc'];
                              $banner_title= $row['banner_title'];
                              $banner_img  = $row['banner_img'];
                             

                              

                              
                      ?>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
										
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                              <form class="form-horizontal" action="#" method="POST" id="update" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="Phone" class="col-sm-4 control-label">Phone</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="Phone" name='phone' value="<?php echo $phone;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="email" class="col-sm-4 control-label">E-mail</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="email" name='email' value="<?php echo $email;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="facebook" class="col-sm-4 control-label">facebook</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="facebook" name='facebook' value="<?php echo $facebook;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="twitter" class="col-sm-4 control-label">twitter</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="twitter" name='twitter' value="<?php echo $twitter;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="linkedin" class="col-sm-4 control-label">linkedin</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="linkedin" name='linkedin' value="<?php echo $linkedin;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="fullname" class="col-sm-4 control-label">Instagram</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="google" name='instagram' value="<?php echo $instagram;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="logo" class="col-sm-4 control-label">logo</label>
                                      <div class="col-sm-8">
                                        <input type="file" class="form-control" name='logo'/>

                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="address" class="col-sm-4 control-label">Address</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="address" name='address' value="<?php echo $address;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="copyright" class="col-sm-4 control-label">Copyright</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="copyright" name='copyright' value="<?php echo $copyright;?>"/>
                                      </div>
                                      <div class="form-group">
                                      <label for="logo" class="col-sm-4 control-label">Banner Image</label>
                                      <div class="col-sm-8">
                                        <input type="file" class="form-control" name='banner_img'/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="banner_title" class="col-sm-4 control-label">Banner Title</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="banner_title" name='banner_title' value="<?php echo $banner_title;?>"/>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="banner_desc" class="col-sm-4 control-label">Banner Description</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="banner_desc" name='banner_desc' value="<?php echo $banner_desc;?>"/>
                                      </div>
                                    </div>
                                      <div class="form-group">
                                          <div id="success"></div>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input type="hidden" name="page" value="setting"/>
                                          <?php echo $database->formtoken();?>
                                              <button type="submit" name="submit" value='submit' class="btn btn-primary btn-lg">update profile <span class="glyphicon glyphicon-ok-sign"></span></button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="col-lg-3 col-md-3">
                              <h3>Logo</h3>
                              <img src="images/logo/<?php echo $logo; ?>" width='150px' height='150'>

                          </div>   
                          <div class="col-lg-3 col-md-3">
                              <h3>Banner Image</h3>
                              <img src="images/banner/<?php echo $banner_img; ?>" width='150px' height='150'>

                          </div>           
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
   <!-- /** setting js */ -->
        <script type='text/javascript'>
            $('#update').submit(function(e){
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