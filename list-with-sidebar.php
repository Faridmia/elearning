<?php
require_once "maininclude/header.php";
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
		$sql   = "SELECT course_id,course_title,course_original_price,is_free_course,course_overview_provider,course_tag,video_url,course_desc,outcomes,course_desc,course_duration,course_sell_price,course_img,long_desc,level,is_top_course,requirement,course_features,category_id,sub_category_id,is_active FROM courses LEFT JOIN categories ON courses.category_id = categories.cat_id LEFT JOIN sub_categories ON courses.sub_category_id = sub_categories.cat_id ORDER BY courses.course_id  DESC";
		$query = mysqli_query($conn, $sql);

		$fetch_data  = mysqli_fetch_array($query);
		$category_id = $fetch_data['category_id'];
		$cat_tab_sql = "SELECT DISTINCT(cat_name),cat_id FROM categories LEFT JOIN courses ON categories.cat_id = courses.category_id  ORDER BY categories.cat_id  DESC";

		$cat_query = mysqli_query($conn, $cat_tab_sql);

		$fetch_cat = mysqli_fetch_array($cat_query);

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
					<form class="form-inline addons mb-3" id="search-form" action="">
						<input class="form-control" type="search" id="search_course_text" name="search" placeholder="Search Courses" aria-label="Search">
						<button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
					</form>

					<h4 class="side_title">Course categories</h4>
					<ul class="no-ul-list mb-3">
						<?php
						$i = 4;
						while ($row = mysqli_fetch_array($cat_query)) { ?>
							<li>
								<input id="aa-<?php echo $i; ?>" class="checkbox-custom category" name="category" value="<?php echo $row['cat_id']; ?>" type="checkbox">
								<label for="aa-<?php echo $i; ?>" class="checkbox-custom-label"><?php echo $row['cat_name']; ?></label>
							</li>
						<?php $i++;
						} ?>

					</ul>

					<h4 class="side_title">Instructors</h4>
					<ul class="no-ul-list mb-3">
						<?php 
							$sql_two = "SELECT  COUNT(courses.course_id),courses.users_id,users.users_id,users.user_profile_photo ,users.name,users.username,users.user_experience,users.social_link,users.description FROM users INNER JOIN courses ON users.users_id = courses.users_id GROUP BY courses.users_id";

							$sec_query = mysqli_query($conn, $sql_two);

							$numRows = $database->numRows($sec_query);
							if ($sql_two) {
								$count = 1;
								while ($row = mysqli_fetch_array($sec_query)) {

									$total_course = $row['COUNT(courses.course_id)'];
									$name = $row['name'];
									$users_id = $row['users_id'];
								?>
						
						<li>
							<input id="aaa-<?php echo $count;?>" class="checkbox-custom instructor" name="instructor" type="checkbox" value="<?php echo $users_id; ?>">
							<label for="aaa-<?php echo $count;?>" class="checkbox-custom-label"><?php echo $name ;?> (<?php echo $total_course;?>)</label>
						</li>
						<?php $count++;} }?>
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

<?php require_once "maininclude/newsletter.php"; ?>
<!-- ================================= End Newsletter =============================== -->
<style>
	#loading {
		text-align: center;
		background: url('loader.gif') no-repeat center;
		height: 150px;
	}
</style>

<?php require_once "maininclude/footer.php"; ?>