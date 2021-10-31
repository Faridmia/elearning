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
								<h1 class="breadcrumb-title">FAQs</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">FAQs</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->	
			
			<!-- =================================== FAQS =================================== -->
			<section class="pt-0">
				<div class="container">
					
					<div class="row">
						
						<div class="col-lg-10 col-md-12 col-sm-12">
							<div class="property_block_wrap_header">
								<ul class="nav nav-tabs customize-tab tabs_creative" id="myTab" role="tablist">
								<?php 
							
									$query = "SELECT * FROM faq_category";
									$exc_query = mysqli_query($conn,$query);

									$i = 1;
									while($row = mysqli_fetch_array($exc_query)){ 
										$active = '';
										if($i == 1) {
											$active = 'active';
										}

										$cat_name = $row['faq_cat_name'];
										?>
								  <li class="nav-item">
									<a class="nav-link <?php echo $active;?>" id="<?php echo strtolower($cat_name);?>-tab" data-toggle="tab" href="#<?php echo strtolower($cat_name);?>" role="tab" aria-controls="general" aria-selected="true"><?php echo $cat_name;?></a>
								  </li>
								  
								  <?php $i++; } ?>
								</ul>
							</div>
							
							<div class="tab-content tabs_content_creative" id="myTabContent">
							<?php 

								$query = "SELECT * FROM faq_category";
								$exc_query = mysqli_query($conn,$query);
								$i = 1;
									while($row = mysqli_fetch_array($exc_query)){ 
										$active = '';
										$show = '';
										if($i == 1) {
											$active = 'active';
											$show = 'show';
										}

										$cat_name = $row['faq_cat_name'];
										?>
								<!-- general Query -->
								<?php if(strtolower($cat_name) == 'general') { ?>
								<div class="tab-pane fade <?php echo $show;?> <?php echo $active;?>" id="<?php echo strtolower($cat_name);?>" role="tabpanel" aria-labelledby="general-tab">

								<?php 

									$sql = "SELECT faq_id,faq_ques,faq_answer,faq_cat_name FROM faq LEFT JOIN faq_category ON faq.faq_cat_id = faq_category.faq_cat_id  ORDER BY faq.faq_id DESC";
									$cat_query = mysqli_query($conn,$sql);
								?>
									
									
									<div class="accordion" id="generalac<?php echo $i;?>">
									<?php 
									$count = 1;
									while($row = mysqli_fetch_array($cat_query)){ 
										$active = '';
										$show = '';
										if($count == 1) {
											$active = 'active';
											$show = 'show';
										}

										$cat_name = $row['faq_cat_name'];
										$faq_ques = $row['faq_ques'];
										$faq_answer = $row['faq_answer'];
										if(strtolower($cat_name) == 'general') {
										?>
										<div class="card">
											<div class="card-header" id="headingOne<?php echo $count;?>">
											  <h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $count;?>" aria-expanded="true" aria-controls="collapseOne<?php echo $count;?>">
													<?php echo $faq_ques;?>
												</button>
											  </h2>
											</div>

											<div id="collapseOne<?php echo $count;?>" class="collapse <?php echo $show;?>" aria-labelledby="headingOne<?php echo $count;?>" data-parent="#generalac<?php echo $i;?>">
											  <div class="card-body">
												<p class="ac-para"><?php echo $faq_answer;?></p>
											  </div>
											</div>
										</div>
										<?php $count++; } } ?>
									</div>
									
								</div>
								<?php } elseif(strtolower($cat_name) == 'payment') { ?>
								<!-- general Query -->
								<div class="tab-pane fade" id="<?php echo strtolower($cat_name);?>" role="tabpanel" aria-labelledby="payment-tab">
									
									<div class="accordion" id="paymentac">
									<?php 
									$sql = "SELECT faq_id,faq_ques,faq_answer,faq_cat_name FROM faq LEFT JOIN faq_category ON faq.faq_cat_id = faq_category.faq_cat_id  ORDER BY faq.faq_id DESC";
									$cat_query = mysqli_query($conn,$sql);
									$count = 1;
									while($row = mysqli_fetch_array($cat_query)){ 
										$active = '';
										$show = '';
										if($count == 1) {
											$active = 'active';
											$show = 'show';
										}

										$cat_name = $row['faq_cat_name'];
										$faq_ques = $row['faq_ques'];
										$faq_answer = $row['faq_answer'];
										if(strtolower($cat_name) == 'payment') {
										?>
										<div class="card">
											<div class="card-header" id="headingOne1<?php echo $count;?>">
											  <h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#paymentcollapse<?php echo $count;?>" aria-expanded="true" aria-controls="paymentcollapse<?php echo $count;?>">
													<?php echo $faq_ques;?>
												</button>
											  </h2>
											</div>

											<div id="paymentcollapse<?php echo $count;?>" class="collapse <?php echo $show;?>" aria-labelledby="headingOne1<?php echo $count;?>" data-parent="#paymentac">
											  <div class="card-body">
												<p class="ac-para"><?php echo $faq_answer;?></p>
											  </div>
											</div>
										</div>
										<?php $count++; } } ?>

									</div>
									
								</div>
								<?php } elseif(strtolower($cat_name) == 'upgrade') { ?>
								<!-- general Query -->
								<div class="tab-pane fade" id="<?php echo strtolower($cat_name);?>" role="tabpanel" aria-labelledby="upgrade-tab">
									
									<div class="accordion" id="upgradeac">
									<?php 
									$sql = "SELECT faq_id,faq_ques,faq_answer,faq_cat_name FROM faq LEFT JOIN faq_category ON faq.faq_cat_id = faq_category.faq_cat_id  ORDER BY faq.faq_id DESC";
									$cat_query = mysqli_query($conn,$sql);
									$count = 1;
									while($row = mysqli_fetch_array($cat_query)){ 
										$active = '';
										$show = '';
										if($count == 1) {
											$active = 'active';
											$show = 'show';
										}

										$cat_name = $row['faq_cat_name'];
										$faq_ques = $row['faq_ques'];
										$faq_answer = $row['faq_answer'];
										if(strtolower($cat_name) == 'upgrade') {
										?>
										<div class="card">
											<div class="card-header" id="headingOne2<?php echo $count;?>">
											  <h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#upgradecollapseOne<?php echo $count;?>" aria-expanded="true" aria-controls="upgradecollapseOne<?php echo $count;?>">
													<?php echo $faq_ques;?>
												</button>
											  </h2>
											</div>

											<div id="upgradecollapseOne<?php echo $count;?>" class="collapse <?php echo $show;?>" aria-labelledby="headingOne2<?php echo $count;?>" data-parent="#upgradeac">
											  <div class="card-body">
												<p class="ac-para"><?php echo $faq_answer;?></p>
											  </div>
											</div>
										</div>
										<?php $count++; } } ?>
									</div>
								</div>
								<?php }
								
									}
								
								?>
							</div>
							
						</div>
						
					</div>
				</div>
			</section>
			<!-- ====================================== FAQS =================================== -->
			
			<!-- ============================== Start Newsletter ================================== -->
			<section class="newsletter theme-bg inverse-theme">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-7 col-md-8 col-sm-12">
							<div class="text-center">
								<h2>Join Thousand of Happy Students!</h2>
								<p>Subscribe our newsletter & get latest news and updation!</p>
								<form class="sup-form">
									<input type="email" class="form-control sigmup-me" placeholder="Your Email Address" required="required">
									<input type="submit" class="btn btn-theme" value="Get Started">
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ================================= End Newsletter =============================== -->
<?php require_once("maininclude/footer.php"); ?>