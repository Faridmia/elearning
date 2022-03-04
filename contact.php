<?php
require_once "maininclude/header.php";
?>

<!-- ============================ Page Title Start================================== -->
<section class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<div class="breadcrumbs-wrap">
					<h1 class="breadcrumb-title">Contact Us</h1>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<section class="bg-light">

	<div class="container">

		<!-- row Start -->
		<div class="row">

			<div class="col-lg-8 col-md-7">
				<div class="prc_wrap">

					<div class="prc_wrap_header">
						<h4 class="property_block_title">Fillup The Form</h4>
					</div>
					<div class="prc_wrap-body">
						<div class="alert alert-success" id="form-message" role="alert" style="display:none">submit success message</div>
						<form action="mailer.php" method="post" id="ajax-contact">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="contact_name" id="contact_name" class="form-control simple">
									</div>
								</div>
								<div class="col-lg-6 col-md-12">
									<div class="form-group">
										<label>Email</label>
										<input type="email" name="contact_email" id="contact_email" class="form-control simple">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label>Subject</label>
								<input type="text" name="contact_subject" id="contact_subject" class="form-control simple">
							</div>

							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control simple" name="contact_message" id="contact_message"></textarea>
							</div>

							<div class="form-group">
								<button class="btn btn-theme" id="contact_send_button" type="submit">Submit Request</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-5">

				<div class="prc_wrap">

					<?php
					$database = new Database();
					$conn     = $database->connection;
					$data     = array(
						'sub_heading', 
						'heading', 
						'content', 
						'addr_title', 
						'address', 
						'mail_title', 
						'mail', 
						'phone_title', 
						'phone_num'
					);
					$query    = $database->getData("contact_us", $data);
					$numrows  = $database->numRows($query);
					$row      = mysqli_fetch_array($query);

					$sub_heading = $row['sub_heading'];
					$heading     = $row['heading'];
					$content     = $row['content'];
					$addr_title  = $row['addr_title'];
					$address     = $row['address'];
					$mail_title  = $row['mail_title'];
					$mail        = $row['mail'];
					$phone_title = $row['phone_title'];
					$phone_num   = $row['phone_num'];

					?>

					<div class="prc_wrap_header">
						<h4 class="property_block_title"><?php echo $sub_heading; ?></h4>
					</div>

					<div class="prc_wrap-body">
						<div class="contact-info">

							<h2><?php echo $heading; ?></h2>
							<p><?php echo $content; ?> </p>

							<div class="cn-info-detail">
								<div class="cn-info-icon">
									<i class="ti-home"></i>
								</div>
								<div class="cn-info-content">
									<h4 class="cn-info-title"><?php echo $addr_title; ?></h4>
									<?php echo $address; ?>
								</div>
							</div>

							<div class="cn-info-detail">
								<div class="cn-info-icon">
									<i class="ti-email"></i>
								</div>
								<div class="cn-info-content">
									<h4 class="cn-info-title"><?php echo $mail_title; ?></h4>
									<?php echo $mail; ?>
								</div>
							</div>

							<div class="cn-info-detail">
								<div class="cn-info-icon">
									<i class="ti-mobile"></i>
								</div>
								<div class="cn-info-content">
									<h4 class="cn-info-title"><?php echo $phone_title; ?></h4>
									<?php echo $phone_num; ?>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- /row -->
	</div>
</section>
<!-- ============================ Agency List End ================================== -->

<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<?php require_once "maininclude/footer.php"; ?>