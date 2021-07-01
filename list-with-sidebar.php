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
							
							<!-- Row -->
							<div class="row align-items-center mb-3">
								<div class="col-lg-6 col-md-6 col-sm-12">
									We found <strong>142</strong> courses for you
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 ordering">
									<div class="filter_wraps">
										<div class="dn db-991 mt30 mb0 show-23">
											<div id="main2">
												<a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2">Show Filter<span><i class="fas fa-arrow-alt-circle-right"></i></span></a>
											</div>
										</div>
										<div class="dropdown show">
											<a class="btn btn-custom dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Recent Courses
											</a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											<a class="dropdown-item" href="#">Popular Courses</a>
											<a class="dropdown-item" href="#">Recent Courses</a>
											<a class="dropdown-item" href="#">Featured Courses</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Row -->
							
							<div class="row">
						
								<!-- Cource Grid 1 -->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="education_block_list_layout">
										
										<div class="education_block_thumb n-shadow">
											<a href="course-detail.html"><img src="assets/img/co-2.jpg" class="img-fluid" alt=""></a>
										</div>
										
										<div class="list_layout_ecucation_caption">
										
											<div class="education_block_body">
												<h4 class="bl-title"><a href="course-detail.html">Learn Full Photoshop Course CS6</a></h4>
												<div class="course_rate_system">
													<div class="course_ratting">
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="course_reviews_info">
														<strong class="high">4.7</strong>(2,420 Reviews)
													</div>											
												</div>
												<div class="cources_price">$520<div class="less_offer">$720</div></div>
											</div>

											<div class="education_block_footer mt-3">
												<div class="education_block_author">
													<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a></div>
													<h5><a href="instructor-detail.html">Robert Wilson</a></h5>
												</div>
												<div class="cources_info_style3">
													<ul>
														<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>54 lectures</div></li>
													</ul>
												</div>
											</div>
										
										</div>
										
									</div>	
								</div>
								
								<!-- Cource Grid 1 -->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="education_block_list_layout">
										
										<div class="education_block_thumb n-shadow">
											<a href="course-detail.html"><img src="assets/img/co-3.jpg" class="img-fluid" alt=""></a>
										</div>
										
										<div class="list_layout_ecucation_caption">
										
											<div class="education_block_body">
												<h4 class="bl-title"><a href="course-detail.html">Full Web Designing Course</a></h4>
												<div class="course_rate_system">
													<div class="course_ratting">
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="course_reviews_info">
														<strong class="mid">4.8</strong>(2,300 Reviews)
													</div>											
												</div>
												<div class="cources_price">$220<div class="less_offer">$499</div></div>
											</div>

											<div class="education_block_footer mt-3">
												<div class="education_block_author">
													<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-2.jpg" class="img-fluid" alt=""></a></div>
													<h5><a href="instructor-detail.html">Ritha Robert</a></h5>
												</div>
												<div class="cources_info_style3">
													<ul>
														<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>14 lectures</div></li>
													</ul>
												</div>
											</div>
										
										</div>
										
									</div>	
								</div>
								
								<!-- Cource Grid 1 -->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="education_block_list_layout">
										
										<div class="education_block_thumb n-shadow">
											<a href="course-detail.html"><img src="assets/img/co-4.jpg" class="img-fluid" alt=""></a>
										</div>
										
										<div class="list_layout_ecucation_caption">
										
											<div class="education_block_body">
												<h4 class="bl-title"><a href="course-detail.html">Adobe Dreamwear Flash Coded</a></h4>
												<div class="course_rate_system">
													<div class="course_ratting">
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="course_reviews_info">
														<strong class="good">4.2</strong>(810 Reviews)
													</div>											
												</div>
												<div class="cources_price">$400<div class="less_offer">$500</div></div>
											</div>

											<div class="education_block_footer mt-3">
												<div class="education_block_author">
													<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a></div>
													<h5><a href="instructor-detail.html">Adam Robert</a></h5>
												</div>
												<div class="cources_info_style3">
													<ul>
														<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>25 lectures</div></li>
													</ul>
												</div>
											</div>
										
										</div>
										
									</div>	
								</div>
								
								<!-- Cource Grid 1 -->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="education_block_list_layout">
										
										<div class="education_block_thumb n-shadow">
											<a href="course-detail.html"><img src="assets/img/co-5.jpg" class="img-fluid" alt=""></a>
										</div>
										
										<div class="list_layout_ecucation_caption">
										
											<div class="education_block_body">
												<h4 class="bl-title"><a href="course-detail.html">Learn Full Photoshop Course CS6</a></h4>
												<div class="course_rate_system">
													<div class="course_ratting">
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="course_reviews_info">
														<strong class="mid">4.3</strong>(3,122 Reviews)
													</div>											
												</div>
												<div class="cources_price">$599<div class="less_offer">$299</div></div>
											</div>

											<div class="education_block_footer mt-3">
												<div class="education_block_author">
													<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a></div>
													<h5><a href="instructor-detail.html">Shilpa Singh</a></h5>
												</div>
												<div class="cources_info_style3">
													<ul>
														<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>54 lectures</div></li>
													</ul>
												</div>
											</div>
										
										</div>
										
									</div>	
								</div>
								
								<!-- Cource Grid 1 -->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="education_block_list_layout">
										
										<div class="education_block_thumb n-shadow">
											<a href="course-detail.html"><img src="assets/img/co-6.jpg" class="img-fluid" alt=""></a>
										</div>
										
										<div class="list_layout_ecucation_caption">
										
											<div class="education_block_body">
												<h4 class="bl-title"><a href="course-detail.html">Business Analysis Full Courses</a></h4>
												<div class="course_rate_system">
													<div class="course_ratting">
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="course_reviews_info">
														<strong class="good">4.5</strong>(2,540 Reviews)
													</div>											
												</div>
												<div class="cources_price">$399<div class="less_offer">$699</div></div>
											</div>

											<div class="education_block_footer mt-3">
												<div class="education_block_author">
													<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a></div>
													<h5><a href="instructor-detail.html">Adam Wilson</a></h5>
												</div>
												<div class="cources_info_style3">
													<ul>
														<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>70 lectures</div></li>
													</ul>
												</div>
											</div>
										
										</div>
										
									</div>	
								</div>
								
								<!-- Cource Grid 1 -->
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="education_block_list_layout">
										
										<div class="education_block_thumb n-shadow">
											<a href="course-detail.html"><img src="assets/img/co-7.jpg" class="img-fluid" alt=""></a>
										</div>
										
										<div class="list_layout_ecucation_caption">
										
											<div class="education_block_body">
												<h4 class="bl-title"><a href="course-detail.html">Learn To Create WP Theme</a></h4>
												<div class="course_rate_system">
													<div class="course_ratting">
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star filled"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="course_reviews_info">
														<strong class="mid">4.7</strong>(3,750 Reviews)
													</div>											
												</div>
												<div class="cources_price">$700<div class="less_offer">$1099</div></div>
											</div>

											<div class="education_block_footer mt-3">
												<div class="education_block_author">
													<div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-6.jpg" class="img-fluid" alt=""></a></div>
													<h5><a href="instructor-detail.html">Priya Singh</a></h5>
												</div>
												<div class="cources_info_style3">
													<ul>
														<li><div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>26 lectures</div></li>
													</ul>
												</div>
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