$(document).ready(function(){
	$('#settime').click(function(){	//set time function
		//if the cancel button is clicked at confirmation then do not submit form
	    if(!confirm ("Are You Sure You Want to UPDATE The Sign-in Time?"))
	       event.preventDefault();
		else{
			var course = $('#course').val();
			var start = $('#start').val();
			var late_start = $('#late_start').val();
			var late_end = $('#late_end').val();
			var end = $('#end').val();
			var clickBtnValue = $(this).val();
			var ajaxurl = 'includes/instructor_setting.php',
			data = {course:course,start:start,late_start:late_start,late_end:late_end,end:end,action:clickBtnValue};
			$.post(ajaxurl, data, function(response){
				$('#alert2').show();
	 				$('#result2').html(response);
			});
		}
	});


	$('#setkey').click(function(){	//set new QR code function
		//if the cancel button is clicked at confirmation then do not submit form
	    if(!confirm ("Are You Sure You Want to UPDATE The QR Key?"))
	       event.preventDefault();
		else{
			var newkey = $('#newkey').val();
			var course = $('#course').val();
			var clickBtnValue = $(this).val();
			var ajaxurl = 'includes/instructor_setting.php',
			data = {newkey:newkey,course:course,action:clickBtnValue};
			$.post(ajaxurl, data, function(response){
				$('#alert1').show();
	 				$('#result1').html(response);
			});
		}	
	});



	$('#clear_db').click(function(){	//Clear content in db
	    if(!confirm ("Are You Sure You Want to DELETE Content?"))
	       event.preventDefault();
		else{
			var course = $('#course').val();
			var clickBtnValue = $(this).val();
			var ajaxurl = 'includes/instructor_setting.php',
			data = {course:course,action:clickBtnValue};
			$.post(ajaxurl, data, function(response){
				$('#alert3').show();
	 				$('#result3').html(response);
			});
		}	
	});

});


$(".button").click(function () { 
    return false; 
});
