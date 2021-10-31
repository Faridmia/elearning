(function ($) {
    "use strict";


   
        $('#update_user_profile').submit(function(e){
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

        $('#update_user_photo').submit(function(e){
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

        $('#update_user_account').submit(function(e){
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
   


    	$("#do_review").submit(function(e) {
            e.preventDefault();
            //var data = $("#update").serialize();
            var data = new FormData(this);            
            $.ajax({
                type : 'POST',
                url : 'do-review.php',
                data : data,
                dataType : 'html', 
                cache:false,
                contentType: false,
                processData: false,
                beforeSend : function () {
                    $("#message").html('Loading...');
                }, 
                success : function ( result ) {
                    $("#message").html( result );
                }
            });
        });
    



    $(document).ready(function(){

        filter_data();

        function filter_data(){

            $('.filter_data').html('<div id="loading" style=""></div>');

            var action = 'fetch_data';
            var category = get_filter('category');

            $.ajax({
                url:"fetch_data.php",
                method:"POST",
                data:{
                    action:action,
                    category:category
                },
                success:function(data){
                    $('.filter_data').html(data);
                }

            });
        }

        function get_filter(class_name) {

            var filter = [];

            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });


            return filter;
        }

        $('.checkbox-custom').click(function(){
            filter_data();

        });
    });


    $(document).ready(function(){

        $("#search").keyup(function(){

            var searchText = $(this).val();

            if(searchText != ""){
                $.ajax({
                    url: 'searchaction.php',
                    method:'post',
                    data:{query:searchText},
                    success:function(response){
                        $("#show-list").html(response);
                    }
                });
            }else{
                $("#show-list").html("");
            }

        });

        $(document).on('click','a',function(){
           var testdata= $("#search").val($(this).text());

            console.log(testdata);
            $("#show-list").html("");
        });
    });


})(jQuery);