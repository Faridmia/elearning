<?php require_once('includes/header.php');  ?>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
		
		<?php require_once('includes/top-nav.php');  ?>

			
			<!-- ============================ Dashboard: Dashboard Start ================================== -->
			<section class="gray pt-0">
    <div class="container-fluid">
                            
        <div class="row">
        
		<?php require_once('includes/menu-navbar.php');  ?>
            
            <div class="col-lg-9 col-md-9 col-sm-12">
                
                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Row -->
                
                <!-- Row -->
                <div class="row">
            
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="dashboard_stats_wrap widget-1">
                            <div class="dashboard_stats_wrap_content"><h4>607</h4> <span>Listings Included</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="ti-location-pin"></i></div>
                        </div>	
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="dashboard_stats_wrap widget-2">
                            <div class="dashboard_stats_wrap_content"><h4>102</h4> <span>Listings Remaining</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="ti-pie-chart"></i></div>
                        </div>	
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="dashboard_stats_wrap widget-4">
                            <div class="dashboard_stats_wrap_content"><h4>70</h4> <span>Featured Included</span></div>
                            <div class="dashboard_stats_wrap-icon"><i class="ti-user"></i></div>
                        </div>	
                    </div>

                </div>
                <!-- /Row -->
            </div>
        
        </div>
        
    </div>
</section>
			<!-- ============================ Dashboard: Dashboard End ================================== -->
			<!-- ============================ Footer Start ================================== -->
			<?php require_once('includes/footer.php');  ?>
			<!-- ============================ Footer End ================================== -->
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<?php  require_once('includes/js.php'); ?>

	</body>
</html>