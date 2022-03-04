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
											<li class="breadcrumb-item active" aria-current="page">Add About Us</li>
										</ol>
									</nav>
								</div>
							</div>
                            <?php 

                                if(isset($_SESSION['is_login'])){
                                    $user_name = $_SESSION['username']; 
                                }

                                $sql_users = "SELECT * FROM users WHERE role_id = 1";

                                $query = mysqli_query($conn,$sql_users);

                                $fetch_users = mysqli_fetch_array($query);

                                $users_id = $fetch_users['users_id'];

                                $data = array(
                                    'coll_skill_title',
                                    'coll_session',
                                    'coll_name',
                                    'coll_desc',
                                    'ver_skill_title',
                                    'ver_session',
                                    'ver_name',
                                    'ver_desc',
                                    'users_id'
                                );
                                $query_edu  = $database->getData("education",$data,'users_id','=',$users_id); 
                                $rowdata = mysqli_fetch_array($query_edu);

                                $ver_skill_title  = $rowdata['ver_skill_title'];
                                $ver_session 	  = $rowdata['ver_session'];
                                $ver_name         = $rowdata['ver_name'];
                                $ver_desc         = $rowdata['ver_desc'];

                                $coll_skill_title = $rowdata['coll_skill_title'];
                                $coll_session     = $rowdata['coll_session'];
                                $coll_name        = $rowdata['coll_name'];
                                $coll_desc        = $rowdata['coll_desc'];

                                ?>
                                <div class="dashboard_container_body p-4">
                                <!-- Collage info -->
                                <form action="" method="post" id="update_user_education" enctype="multipart/form-data">
                                    <div class="form-submit">	
                                        <h4 class="pl-2 mt-2">Collage Info</h4>
                                        <div class="submit-section">
                                            <div class="form-row">
                                            
                                                <div class="form-group col-md-6">
                                                    <label>Skill Title</label>
                                                    <input type="text" name="skill_title"  class="form-control" value="<?php echo $coll_skill_title;?>">
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label>Session</label>
                                                    <input type="text" name="session"  class="form-control" value="<?php echo $coll_session;?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Collage Name</label>
                                                    <input type="text" name="clg_name"  class="form-control" value="<?php echo $coll_name;?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>skill Description</label>
                                                    <input type="text" name="skill_desc"  class="form-control" value="<?php echo $coll_desc;?>">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Social Account info -->

                                    <!-- university info -->
                                    <div class="form-submit">	
                                        <h4 class="pl-2 mt-2">University Info</h4>
                                        <div class="submit-section">
                                            <div class="form-row">
                                            
                                                <div class="form-group col-md-6">
                                                    <label>Skill Title</label>
                                                    <input type="text" name="skill_title_2"  class="form-control" value="<?php echo $ver_skill_title;?>">
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label>Session</label>
                                                    <input type="text" name="session_2"  class="form-control" value="<?php echo $ver_session;?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>University Name</label>
                                                    <input type="text" name="versity_name"  class="form-control" value="<?php echo $ver_name;?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>skill Description</label>
                                                    <input type="text" name="skill_desc_2"  class="form-control" value="<?php echo $ver_desc;?>">
                                                </div>

                                                <div class="form-group col-lg-12 col-md-12">
                                                    <input type="hidden" name="userid" value="<?php echo $users_id;?>"/>
                                                    <input type="hidden" name="page" value="user_education"/>
                                                    <?php echo $database->formtoken();?>
                                                        <button type="submit" class="btn btn-theme" name="submit">Education Update</button>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / Social Account info -->
                                    <div id="success"></div>
                                </form>
                                </div>
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
        <script>
            $('#update_user_education').submit(function(e){
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
        </script> 
</body>
</html> 
