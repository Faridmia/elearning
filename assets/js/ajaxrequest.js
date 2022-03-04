$(document).ready(function(){
    // ajax call from already exists email verifications

    $("#stuemail").on("keypress blur",function(){

        var stuemail = $("#stuemail").val();
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        jQuery.ajax({

            url:'student/addStudent.php',
            method:'POST',
            data: {
                checkemail:"checkemail",
                stuemail: stuemail,

            },
            success: function(result){

                if( result != 0){
                    $("#statusMsg2").html("<span style='color:red;'>Email already exist!</span>");
                   $("#signupbtn").attr("disabled",true);
                }
                if(result == 0 && reg.test(stuemail)){
                    $("#statusMsg2").html("<span style='color:green;'>Available</span>");
                    $("#signupbtn").attr("disabled",false);
                }
                if(!reg.test(stuemail)){
                    $("#statusMsg2").html("<span style='color:red;'>Please Enter Valid  Email</span>");
                    $("#signupbtn").attr("disabled",true);
                } 
            },
        });
    });

});



$('#signupbtn').click(function(event){

    event.preventDefault();
    
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuname     = $("#stuname").val();
        var stuemail    = $("#stuemail").val();
        var stuusername = $("#stuusername").val();
        var stupass     = $("#stupass").val();

       // checking from field on form submission

        if(stuname.trim() == ""){
            $("#statusMsg1").html("<span style='color:red;'>Please Enter Your Name</span>");
            $("#stuname").focus();
            return false;
        }
        else if(stuemail.trim() == ""){
            $("#statusMsg2").html("<span style='color:red;'>Please Enter Your Email</span>");
            $("#stuemail").focus();
            return false;
        }
        else if(stuemail.trim() != "" && !reg.test(stuemail)){
            $("#statusMsg2").html("<span style='color:red;'>Please Enter Valid Email</span>");
            $("#stuemail").focus();
            return false;
        }
        else if(stuusername.trim() == ""){
            $("#statusMsg3").html("<span style='color:red;'>Please Enter Your Username</span>");
            $("#stuusername").focus();
            return false;
        }
        else if(stupass.trim() == ""){
            $("#statusMsg4").html("<span style='color:red;'>Please Enter Your Password</span>");
            $("#stupass").focus();
            return false;
        } else {

            jQuery.ajax({

                url:'student/addStudent.php',
                method:'POST',
                dataType: 'JSON',
                data: {
                    signupbtn: "signupbtn",
                    stuname: stuname,
                    stuemail: stuemail,
                    stuusername: stuusername,
                    stupass: stupass,
    
                },
                success: function(data){
                    if( data == 'ok'){
                        $("#successMsg").html("<span class='alert alert-success'>Registration Successful !</span>");
                        clearStuRegField();
                    } else if( "failed" == data){
                        console.log("falid data loader");
                        $("#successMsg").html("<span class='alert alert-danger'>Unable to Register !</span>");
                    }
                },
            });
        }
});
// empty all field

function clearStuRegField(){

    $("#registration_form").trigger("reset");

    $("#statusMsg1").html("");
    $("#statusMsg2").html("");
    $("#statusMsg3").html("");
    $("#statusMsg4").html("");

}


    // check student login verifications
    $('#login_button').click(function(event){

            event.preventDefault();
            var user_email     = $("#user_email").val();
            var user_pass    = $("#user_pass").val();

            jQuery.ajax({

                url:'student/addStudent.php',
                method:'POST',
                data: {
                    checkLogemail:"checkLogemail",
                    user_email: user_email,
                    user_pass: user_pass,

                },
                success: function(result){
                    if( result == 0){
                        $("#statusLogMsg").html("<div class='alert alert-danger'>Invalid Email ID OR Password!</div>");
                        clearStuRegField();
                    } else if( 1 == result){
                        $("#statusLogMsg").html("<div class='spinner-border text-success' role='status'></div>");

                        setTimeout(() => {
                            window.location.href = "index.php";
                        },3000);
                    }
                },
            });
    });

    // check student login verifications
    $('#enroll_login_button').click(function(event){

        event.preventDefault();
        var user_email   = $("#enroll_user_email").val();
        var user_pass    = $("#enroll_user_pass").val();

        jQuery.ajax({

            url:'student/addStudent.php',
            method:'POST',
            data: {
                checkLogemail:"checkLogemail_enroll",
                user_email: user_email,
                user_pass: user_pass,

            },
            success: function(result){
                console.log(result);
                if( result == 0){
                    $("#statusLogMsg").html("<div class='alert alert-danger'>Invalid Email ID OR Password!</div>");
                    clearStuRegField();
                } else if( 1 == result){
                    $("#statusLogMsg").html("<div class='spinner-border text-success' role='status'></div>");

                    setTimeout(() => {
                        // window.location.href = "detail.php";
                        location.reload(true);
                    },3000);
                }
            },
        });
    });


    // $(document).ready(function(){

    //     $('.play-icon').click(function () {
    //         var video = '<iframe allowfullscreen src="' + $(this).attr('data-video') + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    //         $(this).replaceWith(video);
    //     });
    
    //     // $('.play-icon').mousemove(function (e) {
    //     //     var parentOffset = $(this).offset();
    //     //     var relX = e.pageX - parentOffset.left;
    //     //     var relY = e.pageY - parentOffset.top;
    //     //     $(".play-button").css({ left: relX, top: relY});
    //     // });
    //     // $('.play-icon').mouseout(function() {
    //     //     $(".play-button").css({ left: '50%', top: '50%'});
    //     // });

    // });

    
    // complete task ajax
    $('#course_lesson').submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'course-video-play.php',
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



