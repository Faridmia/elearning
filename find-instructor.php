<?php 
	require_once("maininclude/header.php");
?>
			<!-- Top header  -->
			<!-- ============================================================== -->	

			<!-- ============================ Page Title Start================================== -->
			<section class="page-title">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							
							<div class="breadcrumbs-wrap">
								<h1 class="breadcrumb-title">Courses with Sidebar</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Find Courses</li>
									</ol>
								</nav>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Page Title End ================================== -->			

			
			<!-- ============================ Find Courses with Sidebar ================================== -->
			<section class="pt-0">
				<div class="container">
					
					<!-- Onclick Sidebar -->
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div id="filter-sidebar" class="filter-sidebar">
								<div class="filt-head">
									<h4 class="filt-first">Advance Options</h4>
									<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i class="ti-close"></i></a>
								</div>
								<div class="show-hide-sidebar">
									
									<!-- Find New Property -->
									<div class="sidebar-widgets">
										
										<!-- Search Form -->
										<form class="form-inline addons mb-3">
											<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
											<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
										</form>	
										
										<h4 class="side_title">Course categories</h4>
										<ul class="no-ul-list mb-3">
											<li>
												<input id="a-4" class="checkbox-custom" name="a-4" type="checkbox">
												<label for="a-4" class="checkbox-custom-label">Backend (3)</label>
											</li>
											<li>
												<input id="a-5" class="checkbox-custom" name="a-5" type="checkbox">
												<label for="a-5" class="checkbox-custom-label">Frontend (2)</label>
											</li>
											<li>
												<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
												<label for="a-6" class="checkbox-custom-label">General (2)</label>
											</li>
											<li>
												<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
												<label for="a-7" class="checkbox-custom-label">IT & Software (2)</label>
											</li>
											<li>
												<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
												<label for="a-8" class="checkbox-custom-label">Photography (2)</label>
											</li>
											<li>
												<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
												<label for="a-9" class="checkbox-custom-label">Technology (2)</label>
											</li>
										</ul>
										
										<h4 class="side_title">Instructors</h4>
										<ul class="no-ul-list mb-3">
											<li>
												<input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
												<label for="a-1" class="checkbox-custom-label">Keny White (4)</label>
											</li>
											<li>
												<input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
												<label for="a-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>
											</li>
											<li>
												<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
												<label for="a-6" class="checkbox-custom-label">Mike hussy (4)</label>
											</li>
											<li>
												<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
												<label for="a-7" class="checkbox-custom-label">Adam Riky (7)</label>
											</li>
											<li>
												<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
												<label for="a-8" class="checkbox-custom-label">Balcony</label>
											</li>
											<li>
												<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
												<label for="a-9" class="checkbox-custom-label">Icon</label>
											</li>
										</ul>
										<button class="btn btn-theme full-width mb-2">Filter Result</button>
									
									</div>
									
								</div>
							</div>
						</div>
					</div>

					<!-- Row -->
					<div class="row">
					
						<div class="col-lg-4 col-md-12 col-sm-12 order-2 order-lg-1 order-md-2">							
							<div class="page_sidebar hide-23">
								
								<!-- Search Form -->
								<form class="form-inline addons mb-3">
									<input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
									<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
								</form>	
								
								<h4 class="side_title">Course categories</h4>
								<ul class="no-ul-list mb-3">
									<li>
										<input id="aa-4" class="checkbox-custom" name="aa-4" type="checkbox">
										<label for="aa-4" class="checkbox-custom-label">Backend (3)</label>
									</li>
									<li>
										<input id="aa-5" class="checkbox-custom" name="aa-5" type="checkbox">
										<label for="aa-5" class="checkbox-custom-label">Frontend (2)</label>
									</li>
									<li>
										<input id="aa-6" class="checkbox-custom" name="aa-6" type="checkbox">
										<label for="aa-6" class="checkbox-custom-label">General (2)</label>
									</li>
									<li>
										<input id="aa-7" class="checkbox-custom" name="aa-7" type="checkbox">
										<label for="aa-7" class="checkbox-custom-label">IT & Software (2)</label>
									</li>
									<li>
										<input id="aa-8" class="checkbox-custom" name="aa-8" type="checkbox">
										<label for="aa-8" class="checkbox-custom-label">Photography (2)</label>
									</li>
									<li>
										<input id="aa-9" class="checkbox-custom" name="aa-9" type="checkbox">
										<label for="aa-9" class="checkbox-custom-label">Technology (2)</label>
									</li>
								</ul>
								
								<h4 class="side_title">Instructors</h4>
								<ul class="no-ul-list mb-3">
									<li>
										<input id="aa-41" class="checkbox-custom" name="aa-41" type="checkbox">
										<label for="aa-41" class="checkbox-custom-label">Keny White (4)</label>
									</li>
									<li>
										<input id="aa-2" class="checkbox-custom" name="aa-2" type="checkbox">
										<label for="aa-2" class="checkbox-custom-label">Hinata Hyuga (11)</label>
									</li>
									<li>
										<input id="aa-3" class="checkbox-custom" name="aa-3" type="checkbox">
										<label for="aa-3" class="checkbox-custom-label">Mike hussy (4)</label>
									</li>
									<li>
										<input id="aa-71" class="checkbox-custom" name="aa-71" type="checkbox">
										<label for="aa-71" class="checkbox-custom-label">Adam Riky (7)</label>
									</li>
									<li>
										<input id="aa-81" class="checkbox-custom" name="aa-81" type="checkbox">
										<label for="aa-81" class="checkbox-custom-label">Balcony</label>
									</li>
									<li>
										<input id="aa-91" class="checkbox-custom" name="aa-91" type="checkbox">
										<label for="aa-91" class="checkbox-custom-label">Icon</label>
									</li>
								</ul>
							</div>
							
						</div>	
						
						<div class="col-lg-8 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1">
							<div class="row">
						
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="edu_wraper p-0">
										
										<!-- Single Instructor -->
										<div class="single_instructor border">
											<div class="single_instructor_thumb">
												<a href="#"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">Jonathan Campbell</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-tag"></i>Graphic Design</li>
													<li><i class="ti-video-camera"></i>25 Classes</li>
													<li><i class="ti-user"></i>Exp. 3.5 Year</li>
												</ul>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
										
										<!-- Single Instructor -->
										<div class="single_instructor border">
											<div class="single_instructor_thumb">
												<a href="#"><img src="assets/img/user-8.jpg" class="img-fluid" alt=""></a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">Shilpa D. Singh</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-tag"></i>Java & PHP</li>
													<li><i class="ti-video-camera"></i>102 Classes</li>
													<li><i class="ti-user"></i>Exp. 7 Year</li>
												</ul>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
										
										<!-- Single Instructor -->
										<div class="single_instructor border">
											<div class="single_instructor_thumb">
												<a href="#"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">Adam Wikrome</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-tag"></i>Business</li>
													<li><i class="ti-video-camera"></i>54 Classes</li>
													<li><i class="ti-user"></i>Exp. 6 Year</li>
												</ul>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
										
										<!-- Single Instructor -->
										<div class="single_instructor border">
											<div class="single_instructor_thumb">
												<a href="#"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">niharika Pandey</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-tag"></i>WordPress & PHP</li>
													<li><i class="ti-video-camera"></i>62 Classes</li>
													<li><i class="ti-user"></i>Exp. 4.5 Year</li>
												</ul>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
										
										<!-- Single Instructor -->
										<div class="single_instructor border">
											<div class="single_instructor_thumb">
												<a href="#"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">Hanshraj Singh</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-tag"></i>Accounting</li>
													<li><i class="ti-video-camera"></i>45 Classes</li>
													<li><i class="ti-user"></i>Exp. 3 Year</li>
												</ul>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
										
										<!-- Single Instructor -->
										<div class="single_instructor border">
											<div class="single_instructor_thumb">
												<a href="#"><img src="assets/img/user-6.jpg" class="img-fluid" alt=""></a>
											</div>
											<div class="single_instructor_caption">
												<h4><a href="#">Ritu Shiksha</a></h4>
												<ul class="instructor_info">
													<li><i class="ti-tag"></i>Web Design</li>
													<li><i class="ti-video-camera"></i>72 Classes</li>
													<li><i class="ti-user"></i>Exp. 4 Year</li>
												</ul>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias.</p>
												<ul class="social_info">
													<li><a href="#"><i class="ti-facebook"></i></a></li>
													<li><a href="#"><i class="ti-twitter"></i></a></li>
													<li><a href="#"><i class="ti-linkedin"></i></a></li>
													<li><a href="#"><i class="ti-instagram"></i></a></li>
												</ul>
											</div>
										</div>
										
									</div>
									
								</div>
								
							</div>
							
							<!-- Row -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									
									<!-- Pagination -->
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12">
											<ul class="pagination p-center">
												<li class="page-item">
												  <a class="page-link" href="#" aria-label="Previous">
													<span class="ti-arrow-left"></span>
													<span class="sr-only">Previous</span>
												  </a>
												</li>
												<li class="page-item"><a class="page-link" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item active"><a class="page-link" href="#">3</a></li>
												<li class="page-item"><a class="page-link" href="#">...</a></li>
												<li class="page-item"><a class="page-link" href="#">18</a></li>
												<li class="page-item">
												  <a class="page-link" href="#" aria-label="Next">
													<span class="ti-arrow-right"></span>
													<span class="sr-only">Next</span>
												  </a>
												</li>
											</ul>
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
			<!-- ============================ Find Courses with Sidebar End ================================== -->
			
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