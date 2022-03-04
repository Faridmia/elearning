<?php   
require_once("maininclude/header.php");
?>
	<!-- ============================================================== -->
	<!-- Top header  -->
	<!-- ============================================================== -->	
	
	
	<!-- ============================ Page Title Start================================== -->
	<section class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					
					<div class="breadcrumbs-wrap">
						<h1 class="breadcrumb-title">Privacy & Policy</h1>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- ============================ Page Title End ================================== -->	
	
	<!-- ============================ Privacy Start ================================== -->
	<section class="gray">
	
		<div class="container">
		
			<!-- row Start -->
			<div class="row">
			
				<div class="col-lg-8 col-md-12">
					<div class="prc_wrap">

						<?php 
							$database          = new Database();
							$conn              = $database->connection;
							$data              = array('heading','desc_1','desc_2','desc_3');
							$query       	   = $database->getData("privacy_policy",$data);
							$numrows     	   = $database->numRows($query);
							$row         	   = mysqli_fetch_array($query);
							$heading           = $row['heading']; 
							$desc_1            = $row['desc_1'];
							$desc_2            = $row['desc_2'];
							$desc_3            = $row['desc_3'];
						?>
						
						<div class="prc_wrap_header">
							<h4 class="property_block_title"><?php echo $heading;?></h4>
						</div>
						
						<div class="prc_wrap-body">
							<p><?php echo $desc_1;?></p>
							<p><?php echo $desc_2;?></p>
							<p><?php echo $desc_3;?></p>
						</div>
						
					</div>
									
				</div>

				
			</div>
			<!-- /row -->		
			
		</div>
				
	</section>
	<!-- ============================ Privacy End ================================== -->
	
	<?php require_once("maininclude/newsletter.php"); ?>
	<!-- ================================= End Newsletter =============================== -->
<?php require_once("maininclude/footer.php"); ?>