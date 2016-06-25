
$(document).ready(function() {
    console.log( "ready!" );
    
	    $('.edit-message-button').click( function(e){ // 
		e.preventDefault();
		var value = $(this).attr("value")
		//console.log(value);
		$("#edit-message"+value).show();
		$("#reply"+value).hide();
		$("#reply-message"+value).hide();
		e.preventDefault();
	});

	$(".edit-cancel").click(function(e){
		var value = $(this).attr("value");
		$("#edit-message"+value).hide();
		e.preventDefault();
	});

	$( ".reply-message-button" ).click(function(e) {
		var value = $(this).attr("value");
		//console.log(value);
		$("#reply"+value).show();
		$("#reply-message"+value).show();
		$("#edit-message"+value).hide();
		e.preventDefault();

	});

	$(".cancel-reply-button").click(function(e){
		var value = $(this).attr("value");
		$("#reply"+value).hide()
		$("#reply-message"+value).hide();
		e.preventDefault();
	});
});