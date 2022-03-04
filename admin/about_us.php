<?php require_once 'includes/header.php';
$database = new Database();
?>
<div id="main-wrapper">
	<!-- Start Navigation -->
	<?php require_once 'includes/top-nav.php'; ?>
	<!-- ============================================================== -->
	<!-- Top header  -->
	<!-- ============================================================== -->
	<!-- ============================ Dashboard: My Order Start ================================== -->
	<section class="gray pt-0">
		<div class="container-fluid">

			<!-- Row -->
			<div class="row">
				<?php require_once 'includes/menu-navbar.php'; ?>

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

					<!-- /Row -->
					<form action="" method="post" id="update_about" enctype="multipart/form-data">
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="dashboard_container">
									<div class="dashboard_container_header">
										<div class="dashboard_fl_1">
											<h4>Update About</h4>
										</div>
									</div>
									<div class="dashboard_container_body p-4">
										<?php
										$database      = new Database();
										$conn          = $database->connection;
										$data          = array(
											'about_title', 
											'about_desc', 
											'about_title_2', 
											'about_desc_2', 
											'about_title_3', 
											'about_desc_3', 
											'button_title', 
											'button_link', 
											'about_img', 
											'about_heading'
										);
										$query         = $database->getData("about_us", $data);
										$numrows       = $database->numRows($query);
										$row           = mysqli_fetch_array($query);
										$about_title   = $row['about_title'];
										$about_desc    = $row['about_desc'];
										$about_title_2 = $row['about_title_2'];
										$about_desc_2  = $row['about_desc_2'];
										$about_title_3 = $row['about_title_3'];
										$about_desc_3  = $row['about_desc_3'];
										$button_title  = $row['button_title'];
										$button_link   = $row['button_link'];
										$about_img     = $row['about_img'];
										$about_heading = $row['about_heading'];

										?>

										<!-- Basic info -->
										<div class="submit-section">
											<div class="form-row">

												<div class="form-group col-md-12">
													<label>About Heading</label>
													<input type="text" name="heading" value="<?php echo $about_heading; ?>" class="form-control">
												</div>
												<div class="form-group col-md-12">
													<label>About Title 1</label>
													<input type="text" name="title_1" class="form-control" value="<?php echo $about_title; ?>">
												</div>
												<div class="form-group col-md-12">
													<label>Description 1</label>
													<textarea class="form-control" name="desc_1"><?php echo $about_desc; ?></textarea>
												</div>
												<div class="form-group col-md-12">
													<label>About Title 2</label>
													<input type="text" name="title_2" class="form-control" value="<?php echo $about_title_2; ?>">
												</div>
												<div class="form-group col-md-12">
													<label>Description 2</label>
													<textarea class="form-control" name="desc_2" placeholder="Description"><?php echo $about_desc_2; ?></textarea>
												</div>
												<div class="form-group col-md-12">
													<label>About Title 1</label>
													<input type="text" name="title_3" class="form-control" placeholder="Heading" value="<?php echo $about_title_3; ?>">
												</div>
												<div class="form-group col-md-12">
													<label>Description 3</label>
													<textarea class="form-control" name="desc_3" placeholder="Description"><?php echo $about_desc_3; ?></textarea>
												</div>
												<div class="form-group col-md-12">
													<label>Button Title</label>
													<input type="text" name="btn_title" class="form-control" placeholder="Buiton Title" value="<?php echo $button_title; ?>">
												</div>
												<div class="form-group col-md-12">
													<label>Button Link</label>
													<input type="text" name="btn_link" class="form-control" placeholder="Buiton Link" value="<?php echo $button_link; ?>">
												</div>
												<div class="form-group col-md-6">
													<label>About Image</label>
													<input type="file" class="form-control" id="about_images" name='about_images' value="" />
													<img src="<?php echo "../assets/img/course/$about_img"; ?>" alt="" width="100px"><br />
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
								<input type="hidden" name="page" value="aboutus" />
								<?php echo $database->formtoken(); ?>
								<button class="btn btn-theme" name="add_student" type="submit">Update About</button>
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
	<?php require_once 'includes/footer.php'; ?>

	<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<?php require_once 'includes/js.php'; ?>
<script type='text/javascript'>
	$('#update_about').submit(function(e) {
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

			beforesend: function() {
				$('#success').html('loading.....');
			},
			success: function(result) {
				$('#success').html(result);
			}


		});
	});
</script>

</body>

</html>