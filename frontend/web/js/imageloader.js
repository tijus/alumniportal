$(function(){
	$("#file").change(function(){
		//console.log(this.files);
		var reader = new FileReader();

		reader.onload = function(image){
			$('.imageUploadedOrNot').show(0);
			$('#blankImg').attr('src',image.target.result);
		}

		reader.readAsDataURL(this.files[0]);
	});
});