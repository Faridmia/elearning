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

				<?php 
					$sql = "SELECT course_id,course_title,course_original_price,is_free_course,course_overview_provider,course_tag,video_url,course_desc,outcomes,course_desc,course_duration,course_sell_price,course_img,long_desc,level,is_top_course,requirement,course_features,category_id,sub_category_id,is_active FROM courses LEFT JOIN categories ON courses.category_id = categories.cat_id LEFT JOIN sub_categories ON courses.sub_category_id = sub_categories.cat_id ORDER BY courses.course_id  DESC";
                        $query = mysqli_query($conn,$sql);
					//	$query       = $database->getData("courses ",$data);

					$fetch_data = mysqli_fetch_array($query);

					$category_id = $fetch_data['category_id'];

					//$cat_tab_sql = "SELECT * FROM categories";
					$cat_tab_sql = $sql = "SELECT DISTINCT(cat_name),cat_id FROM categories LEFT JOIN courses ON categories.cat_id = courses.category_id  ORDER BY categories.cat_id  DESC";

					$cat_query = mysqli_query($conn,$cat_tab_sql);

				   $fetch_cat = mysqli_fetch_array($cat_query);

				   

				  


					
						
					// echo "<pre>";
					// print_r($fetch_cat);
					// echo "</pre>";

					
				?>
					
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
												<label for="a-4" class="checkbox-custom-label"></label>
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
								<?php 
									$i = 4;
									while ($row = mysqli_fetch_array($cat_query) ) { ?>
									<li>
										<input id="aa-<?php echo $i;?>" class="checkbox-custom category" name="category" value="<?php echo $row['cat_id'];?>" type="checkbox">
										<label for="aa-<?php echo $i;?>" class="checkbox-custom-label"><?php echo $row['cat_name'];?></label>
									</li>	
								<?php	$i++;}?>
									
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
							<div class="row filter_data">
						
								
							</div>
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
		<style>
			#loading{
				text-align:center;
				background:url('loader.gif') no-repeat center;
				height: 150px;
			}
		</style>

<?php require_once("maininclude/footer.php"); ?>