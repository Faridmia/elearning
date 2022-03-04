<?php
require_once 'includes/header.php';
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
									<li class="breadcrumb-item active" aria-current="page">Add Student</li>
								</ol>
							</nav>
						</div>
					</div>
					<!-- /Row -->
					<form action="" method="post" id="add_student_data" enctype="multipart/form-data">
						<!-- Row -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="dashboard_container">
									<div class="dashboard_container_header">
										<div class="dashboard_fl_1">
											<h4>Add Student</h4>
										</div>
									</div>
									<div class="dashboard_container_body p-4">
										<!-- Basic info -->
										<div class="submit-section">
											<div class="form-row">

												<div class="form-group col-md-6">
													<label>Name</label>
													<input type="text" name="stu_name" class="form-control" placeholder="Student Name">
												</div>

												<div class="form-group col-md-6">
													<label>Email</label>
													<input type="text" name="stu_email" class="form-control" placeholder="Ex. example@gmail.com">
												</div>

												<div class="form-group col-md-12">
													<label>biography</label>
													<input type="text" name="biography" class="form-control" value="" />
												</div>

												<div class="form-group col-md-12">
													<label>Student Image</label>
													<input type="file" class="form-control" id="user_profile_photo" name='user_profile_photo' value="" />

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
								<input type="hidden" name="page" value="add_student" />
								<?php echo $database->formtoken(); ?>
								<button class="btn btn-theme" name="add_student" type="submit">Add Student</button>
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
<script type="text/javascript">
	$('#add_student_data').submit(function(e) {
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