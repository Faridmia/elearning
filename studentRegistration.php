<div class="modal fade" class="sign-up" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="sign-up">
            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Sign Up</h4>
                <div class="login-form">
                    <form method="POST" id="registration_form" enctype="multipart/form-data">

                        <div class="form-group">
                            <span id="statusMsg1"></span> 
                            <input type="text" name="stuname" id="stuname" class="form-control name" placeholder="Full Name">
                            
                        </div>

                        <div class="form-group">
                            <span id="statusMsg2"></span>
                            <input type="email" name="stuemail" id="stuemail" class="form-control email" placeholder="Email">

                        </div>

                        <div class="form-group">
                            <span id="statusMsg3"></span>
                            <input type="text" name="stuusername" id="stuusername" class="form-control username" placeholder="Username">

                        </div>

                        <div class="form-group">
                            <span id="statusMsg4"></span>
                            <input type="password" name="stupass" id="stupass" class="form-control password">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="page" value="stureg" />
                            <?php  echo $database->formtoken();?>
                            <button type="submit"  name="signupbtn" class="btn btn-md full-width pop-login submitBtn" id="signupbtn">Sign Up</button>
                            <br />
                            <span id="successMsg"></span>
                        </div>
                        <div class="modal-divider"><span>Or Signup via</span></div>
                        <div class="text-center">
                        <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="JavaScript:Void(0);" class="link" data-dismiss="modal" data-toggle="modal" data-target="#login">
                            Go For LogIn </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>