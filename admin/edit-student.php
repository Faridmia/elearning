<?php require_once('includes/header.php');  
require_once('functions.php');
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
											<li class="breadcrumb-item active" aria-current="page">Update Student</li>
										</ol>
									</nav>
								</div>
							</div>
							<!-- /Row -->
							<?php
                                $database    = new Database();
                                $conn        = $database->connection;
                                $sid         = (int) $_GET['stuid'];
                                $data        = array('users_id','name','email','user_profile_photo','biography');
                                $query       = $database->getData("users",$data,"users_id",'=',"$sid");
                                $numrows     = $database->numRows($query);
                                if($numrows > 0){
                                    
                                    $row                    = mysqli_fetch_array($query);
                                    $stu_id              	= escape($row['users_id']);
                                    $stu_name           	= escape($row['name']);  
                                    $stu_email  			= escape($row['email']);
                                    $photo           		= escape($row['user_profile_photo']); 
                                    $biography           	= escape($row['biography']); 
                                    
                                
                            ?>
							<form action="" method="post" id="update_student_data" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Update Student Information</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
													<div class="form-group col-md-6">
														<label>ID</label>
														<input type="text" readonly name="stu_id" class="form-control"  value="<?php echo $stu_id;?>">
													</div>
													<div class="form-group col-md-6">
														<label>Name</label>
														<input type="text" name="name" class="form-control"  value="<?php echo $stu_name;?>">
													</div>
													
													<div class="form-group col-md-6">
														<label>Email</label>
														<input type="text" name="email" class="form-control"  value="<?php echo $stu_email;?>">
													</div>
													
													<div class="form-group col-md-6">
														<label>biography</label>
														<input type="text" name="biography" class="form-control"  value="<?php echo $biography;?>" />
													</div>
													<div class="form-group col-md-12">
														<label>Student Image</label>
														<input type="file" class="form-control" id="user_profile_photo" name='user_profile_photo' value=""/>
                                                        <img src="<?php echo "../assets/img/profile/$photo";?>" alt="" width="100px"><br/>
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
									<input type="hidden" name="sid" value="<?php echo $sid;?>"/>
									<input type="hidden" name="page" value="update_student"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="update_student" type="submit">Update Student</button>
								</div>
								<div class="form-group">
                                	<div id="success"></div>
                            	</div>
							</div>
							</form>
							<?php
                            }
                            else
                            {
                                echo "<div class='alert alert-danger'>No! Student found it</div>";
                            }

                            ?>
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

            $('#update_student_data').submit(function(e){
				//alert("test form data");
                e.preventDefault();
                var data = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: 'update-student.php',
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