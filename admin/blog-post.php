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
											<li class="breadcrumb-item active" aria-current="page">Blog Post</li>
										</ol>
									</nav>
								</div>
							</div>

							<?php if(isset($_GET['postid'])) { 

								$database    = new Database();
								$conn        = $database->connection;
								$postid         = (int) $_GET['postid'];
								$data        = array('post_id','post_title','post_image');
								$query       = $database->getData("blog_post",$data,"post_id",'=',"$postid");
								$numrows     = $database->numRows($query);
								if($numrows > 0){
									$fetch                    = mysqli_fetch_array($query);
									$post_id           	      = $fetch['post_id']; 
									$post_title           	  = $fetch['post_title']; 
									$post_image           	  = $fetch['post_image']; 
									

								?>
								<!-- /Row -->
							<form action="" method="post" id="update_post" enctype="multipart/form-data">
								<!-- Row -->
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="dashboard_container">
											<div class="dashboard_container_header">
												<div class="dashboard_fl_1">
													<h4>Edit Post</h4>
												</div>
											</div>
											<div class="dashboard_container_body p-4">
												<div class="form-group">
													<div id="success"></div>
												</div>
												<!-- Basic info -->
												<div class="submit-section">
													<div class="form-row">
													
														<div class="form-group col-md-12">
															<label>Post Title</label>
															<input type="text" name="post_title" class="form-control" value="<?php echo $post_title;?>">
														</div>
														<div class="form-group col-md-8">
															<label>Post Image</label>
															<input type="file" class="form-control" id="post_image" name='post_image' />
															
														</div>
														<div class="col-lg-3 col-md-3">
															<h3>Post Image</h3>
															<img src="../assets/img/post/<?php echo $post_image; ?>" width='150px' height='150'>

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
										<input type="hidden" name="post_id" value="<?php echo $post_id;?>"/>
										<input type="hidden" name="page" value="update_post"/>
										<?php echo $database->formtoken();?>
										<button class="btn btn-theme" name="update_post" type="submit">update post</button>
									</div>
								</div>
							</form>
								<?php
								}
								else
								{
									echo "<div class='alert alert-danger'>No! post found it</div>";
								}

								?>

							<?php } else { 


								//if(isset($_SESSION['is_login'])){
									$user_login  = $_SESSION['username']; 
									$query       = "SELECT * FROM users WHERE username = '$user_login'";
									$result 	 = $conn->query($query);
									$row         = mysqli_fetch_array($result);
									$users_id    = $row['users_id'];

					
							
								
								?>
							<!-- /Row -->
							<form action="" method="post" id="add_post" enctype="multipart/form-data">
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>Add Post</h4>
											</div>
										</div>
										<div class="dashboard_container_body p-4">
                                            <div class="form-group">
                                                <div id="success"></div>
                                            </div>
											<!-- Basic info -->
											<div class="submit-section">
												<div class="form-row">
												
													<div class="form-group col-md-12">
														<label>Post Title</label>
														<input type="text" name="post_title" class="form-control" placeholder="post title">
													</div>
													<div class="form-group col-md-12">
														<label>Post Image</label>
														<input type="file" class="form-control" id="post_image" name='post_image' value=""/>
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
									<input type="hidden" name="page" value="add_post"/>
									<input type="hidden" name="userid" value="<?php echo $users_id;?>"/>
									<?php echo $database->formtoken();?>
									<button class="btn btn-theme" name="add_post" type="submit">Add Post</button>
								</div>
							</div>
							</form>
							<?php //	} ?>
						
                            <!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="dashboard_container">
										<div class="dashboard_container_header">
											<div class="dashboard_fl_1">
												<h4>All Post</h4>
											</div>
										</div>
										<div class="dashboard_container_body">
											<div class="table-responsive">
											<?php
												$database    = new Database();
												$conn        = $database->connection;
												$data        = array('post_id','post_title','post_image');
												$query       = $database->getData("blog_post",$data); ?>
												<table class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col">Post ID</th>
															<th scope="col">Post Title</th>
															<th scope="col">Post Image</th>
															<th scope="col">Action</th>
															
														</tr>
													</thead>
													<tbody>

												<?php	
														$i = 1;
														while($row = mysqli_fetch_array($query)){
															$post_id          = (int) $row['post_id'];
															$post_title       = $row['post_title'];
															$post_image       = $row['post_image'];
													echo "<tr>";
															echo "<th scope='row'>$i</th>";
															echo "<td>$post_title</td>";
															echo "<td><img src='../assets/img/post/$post_image' width='100px'></td>";
															echo "<td>
																<div class='dash_action_link'>
																	<a href='blog-post.php?postid=$post_id&name=post' class='view'>View</a>
																	<a href='delete.php?postid=$post_id&name=post' class='cancel'>Cancel</a>
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

				$('#update_post').submit(function(e){
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

            $('#add_post').submit(function(e){
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