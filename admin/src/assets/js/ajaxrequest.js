function addStu(){

    var stuname     = $("#stuname").val();
    var stuemail    = $("#stuemail").val();
    var stuusername = $("#stuusername").val();
    var stupass     = $("#stupass").val();
    alert(stuname);

jQuery.ajax({

        url:'student/addStudent.php',
        method:'POST',
        data: {
            submit : submit,
            stuname : stuname,
            stuemail : stuemail,
            stuusername : stuusername,
            stupass : stupass,

        },
        success: function(data){
            console.log(data);
            if( data == 'OK'){
                $("#successMsg").html("<span>Registration Successful !</span>");
            } else if( data == 'failed'){
                $("#successMsg").html("<span>Unable to Register !</span>");
            }
        },

    });
}