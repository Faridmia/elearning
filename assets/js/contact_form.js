(function ($) {
    "use strict";
	
	// get the form
	var form = $("#ajax-contact");

	// get the message div
	var formMessage = $("#form-message");

	// set up and event listener from the contact from

	$(form).submit(function(e){

		e.preventDefault();

		var formData = new FormData(this);

		$.ajax({
			type: 'POST',
			url : $(form).attr('action'),
			data: formData,
			processData : false,
			contentType : false,
		}).done(function(response){

			response = $.parseJSON(response);
			//console.log(response);
			//alert("sending data");

			if(response.error == 0){

				$(formMessage).removeClass("alert-danger");
				$(formMessage).addClass("alert-success");

				// set the message text

				$(formMessage).text(response.msg);

				$(formMessage).fadeIn();

				// clear the form data
				$(form).trigger('reset');
				$(form).slideUp();

			}else{

				$(formMessage).removeClass("alert-success");
				$(formMessage).addClass("alert-danger");
				$(formMessage).text(response.msg);

				$(formMessage).fadeIn();
			}

		}).fail(function(data){

			$(formMessage).removeClass("alert-success");
			$(formMessage).addClass("alert-danger");
			

			if(data.responseText !== "" ){

				$(formMessage).text(data.responseText);
			}else{

				$(formMessage).text("Opos! an error occured and your message could not be sent");
			}

		});

	});



	
})(jQuery);