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
											<li class="breadcrumb-item active" aria-current="page">Add Sub Category</li>
										</ol>
									</nav>
								</div>
							</div>
								<form class="form-horizontal" action="#" method="POST" id="add">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
													<label for="p_category" class="col-sm-4 control-label">Course Category</label>
													<div class="col-sm-8">
													<select name="cat_name"  class="form-control p_category">
													<option value="">--select sub category--</option>
													<?php
														$database    = new Database();
														$data        = array('cat_id','cat_name');
														$query       = $database->getData("categories",$data);

														while($row = mysqli_fetch_array($query)){
															$cat_id    = (int) $row['cat_id'];
															$cat_name  = $row['cat_name'];
															echo "<option value='$cat_id'>$cat_name</option>";
														}

													?>
													</select>
												</div> 
											</div>
											<div class="form-group">
												<label for="sub_name" class="col-sm-4 control-label">Sub Category</label>
												<div class="col-sm-8">
												<input type="text" class="form-control" id="sub_name" name='sub_name' value=""/>
												</div>
											</div>

											<div class="form-group">
												<div id="success"></div>
											</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-10">
													<input type="hidden" name="page" value="sub_category"/>
													<?php echo $database->formtoken();?>
														<button type="submit" name="submit" value='submit' class="btn btn-theme">Add Sub Category<span class="glyphicon glyphicon-ok-sign"></span></button>
												</div>
											</div>
										</div>
									</div>
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
		<script type='text/javascript'>
            $('#add').submit(function(e){
                e.preventDefault();
                 //alert(1);
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