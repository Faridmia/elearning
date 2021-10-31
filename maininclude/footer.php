<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="footer-widget">
                        <img src="assets/img/logo-light.png" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p>4967 Sardis Sta, Victoria 8007, Montreal.</p>
                            <p>+1 246-345-0695</p>
                            <p>info@Distance Learning.com</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Navigations</h4>
                        <ul class="footer-menu">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="faq.html">FAQs Page</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="blog.html">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">New Categories</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Designing</a></li>
                            <li><a href="#">Nusiness</a></li>
                            <li><a href="#">Software</a></li>
                            <li><a href="#">WordPress</a></li>
                            <li><a href="#">PHP</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Help & Support</h4>
                        <ul class="footer-menu">
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Live Chat</a></li>
                            <li><a href="#">Mail Us</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Faqs</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="footer-widget">
                        <h4 class="widget-title">Download Apps</h4>
                        <a href="#" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-playstore theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    Google Play
                                    <span>Get It Now</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-apple theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    App Store
                                    <span>Now it Available</span>
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

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">© 2021 Distance Learning. Designd By <a href="#">Farid Mia</a>.</p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
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

                <div class="social-login mb-3">
                    <ul>
                        <li>
                            <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                            <label for="reg" class="checkbox-custom-label">Save Password</label>
                        </li>
                        <li class="right"><a href="javascript:void(0)" id="forgot_pass" class="link theme-cl" data-dismiss="modal" data-toggle="modal" data-target="#reset">Forgot password?</a></li>
                    </ul>
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

</body>

</html>