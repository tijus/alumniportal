$(function(){

	$("#modalBtn").click(function(){
	  $("#modal").modal('show');
		.find("#modalContent")
		.load($(this).attr('value'));
	});
});