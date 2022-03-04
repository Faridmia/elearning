<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

            <?php 
                $database          = new Database();
                $conn              = $database->connection;

                $data 		= array(
                    'addr_title', 
                    'contact_info',
                    'menu_title_1',
                    'menu_info_1',
                    'menu_title_2',
                    'menu_info_2',
                    'menu_title_3',
                    'menu_info_3',
                    'app_title',
                    'app_text_1',
                    'app_text_2',
                    'app_link_1',
                    'app_link_2'
                    
                );
                $query       	   = $database->getData("footer_top",$data);
                $numrows     	   = $database->numRows($query);
                $row         	   = mysqli_fetch_array($query);
                
                $addr_title       = $row['addr_title']; 
                $contact_info     = $row['contact_info'];
                $menu_title_1     = $row['menu_title_1'];
                $menu_info_1      = $row['menu_info_1'];
                $menu_title_2     = $row['menu_title_2']; 
                $menu_info_2      = $row['menu_info_2'];
                $menu_title_3     = $row['menu_title_3'];
                $menu_info_3      = $row['menu_info_3'];
                $app_title        = $row['app_title'];
                $app_text_1       = $row['app_text_1'];
                $app_text_2       = $row['app_text_2'];

                $app_link_1       = $row['app_link_1'];
                $app_link_2       = $row['app_link_2'];
                ?>

                <div class="col-lg-3 col-md-3">
                    <div class="footer-widget">
                        <img src="assets/img/logo-light.png" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p><?php echo $addr_title;?></p>
                            <?php echo $contact_info;?>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo $menu_title_1;?></h4>
                        <ul class="footer-menu">
                            <?php echo $menu_info_1;?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo $menu_title_2;?></h4>
                        <ul class="footer-menu">
                            <?php echo $menu_info_2;?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo $menu_title_3;?></h4>
                        <ul class="footer-menu">
                            <?php echo $menu_info_3;?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo $app_title;?></h4>
                        <a href="<?php echo $app_link_1;?>" class="other-store-link" target="_blank">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-playstore theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    <?php echo $app_text_1;?>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo $app_link_2;?>" class="other-store-link" target="_blank">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-apple theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    <?php echo $app_text_2;?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

            <?php 
                $database    = new Database();
                $conn        = $database->connection;
                $data        = array('phone','email','facebook','twitter','linkedin','instagram','logo','address','copyright','banner_title','banner_desc','banner_img');
                $query       = $database->getData("setting",$data);
                $numrows     = $database->numRows($query);
                $row         = mysqli_fetch_array($query);
                $facebook    = $row['facebook'];
                $twitter     = $row['twitter'];
                $linkedin    = $row['linkedin'];
                $instagram   = $row['instagram'];
                $copyright   = $row['copyright'];
                        
                ?>
                
                <div class="col-lg-6 col-md-6">
                    <p class="mb-0"><?php echo $copyright;?>.</p>
                </div>
                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="<?php echo $facebook;?>" target="_blank"><i class="ti-facebook"></i></a></li>
                        <li><a href="<?php echo $twitter;?>" target="_blank"><i class="ti-twitter"></i></a></li>
                        <li><a href="<?php echo $instagram;?>" target="_blank"><i class="ti-instagram"></i></a></li>
                        <li><a href="<?php echo $linkedin;?>" target="_blank"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->
<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true" class="sign-in">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Log In</h4>
                <div class="login-form">
                    <span id="error_message"></span>
                    <form action="" method="post" id="login_form">
                        <div id="error_message"></div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" name="stu_username" class="form-control" id="user_email" placeholder="Username">
                            <div class="login-email-error error"></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="stu_pass" class="form-control" id="user_pass" placeholder="*******">
                            <div class="login-password-error error"></div>
                        </div>
                        <div class="form-group">
                            
                            <button type="submit"  id="login_button" class="btn btn-md full-width pop-login" name="loginpage" value="Login">Login</button>
                            <div id="statusLogMsg"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-divider"><span>Or login via</span></div>
                <div class="text-center">
                    <p class="mt-2">Haven't Any Account? <a href="JavaScript:Void(0);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#signup">Click Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<!--Enroll Modal -->
<!-- Log In Modal -->
<div class="modal fade" id="logintwo" tabindex="-1" role="dialog" aria-labelledby="registermodal_enroll" aria-hidden="true" class="sign-in">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal_enroll">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Log In</h4>
                <div class="login-form">
                    <span id="error_message"></span>
                    <form action="" method="post" id="enroll_login_form">
                        <div id="error_message"></div>
                        <div class="form-group">
                            <label>User Email</label>
                            <input type="email" name="stu_username" class="form-control" id="enroll_user_email" placeholder="Username">
                            <div class="login-email-error error"></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="stu_pass" class="form-control" id="enroll_user_pass" placeholder="*******">
                            <div class="login-password-error error"></div>
                        </div>
                        <div class="form-group">
                            
                            <button type="submit"  id="enroll_login_button" class="btn btn-md full-width pop-login" name="loginpage" value="Login">Login</button>
                            <div id="statusLogMsg"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-divider"><span>Or login via</span></div>
                <div class="text-center">
                    <p class="mt-2">Haven't Any Account? <a href="JavaScript:Void(0);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#signup">Click Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Enroll Modal -->

<!-- Sign Up Modal -->
    <?php include_once 'studentRegistration.php';?>
<!-- End Modal -->
<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="assets/js/jquery.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>=
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/js/validation.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/contact_form.js"></script>
<script src="assets/js/ajaxrequest.js"></script>
<script src="assets/js/custom-script.js"></script>
    <script>
        function openNav() {
            document.getElementById("filter-sidebar").style.width = "320px";
        }

        function closeNav() {
            document.getElementById("filter-sidebar").style.width = "0";
        }
    </script>
    
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script type="text/javascript">
			$(".course_category").on('change',function(e){

			    var cCatId = $('.course_category').val();
				//alert(1);
				$.ajax({
					type: 'POST',
					url: 'get-sub-category.php',
					dataType: 'html',
					data: {
						c_id : cCatId, 
					},

					beforesend : function(){
						$('.course_sub_category').html('loading.....');
					},
					success : function(result){
						$('.course_sub_category').html(result);
					}
				});
			});

            $('#add_course_data').submit(function(e){
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

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }


                });
            });
        </script>

        <script type="text/javascript">
            $('#course_update').submit(function(e){
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'update-course.php',
                    data: data,
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }
                });
            });     
        </script>

        <script type="text/javascript">
            $('#update_section_data').submit(function(e){
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'edit_process.php',
                    data: data,
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }

                });
            });   

            $('#update_user_education').submit(function(e){
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'edit_process.php',
                    data: data,
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }

                });
            });   

            $('#add_section_data').submit(function(e){
               
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

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }
                });
            });
        </script>

        <script type="text/javascript">

            $('#update_lesson_data').submit(function(e){
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: 'edit_process.php',
                    data: data,
                    dataType: 'html',
                    contentType: false,
                    cache: false,
                    processData: false,

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }

                });
            });   

            $('#add_lesson_data').submit(function(e){
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

                    beforesend : function(){
                        $('#success').html('loading.....');
                    },
                    success : function(result){
                        $('#success').html(result);
                    }
                });
            });
        </script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
		<script src="./src/ALightBox.js"></script>
       
		<script type="text/javascript">
			$('body').ALightBox({
				showYoutubetitle: true
			});
		</script>
		<script type="text/javascript">

            $(document).ready(function(){

                $('#search_course_text').keyup(function(){
                    var search = $(this).val();

                    if(search != '')
                    {
                        $.ajax({
                            url:"fetch_course.php",
                            method:"POST",
                            data:{ query:search },
                            success:function(data)
                            {  
                                $('.filter_data').html(data);
                            }
                        });
                    }
                    else
                    {
                        // load_data();
                        $('.filter_data').html("");
                    }
                });
            });
			
		</script>

<script src="assets/js/rating.js"></script>
<script src="assets/js/modal-proper.js"></script>
<script src="assets/js/modal-bootstrap.js"></script>

</body>

</html>