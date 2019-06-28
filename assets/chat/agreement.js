$(document).ready(function() {
	$(".enroll-btnm").click(function() 
	{
	    var trno = $('#nexttr').val();
	    alert(trno);
        nexttr =  parseInt(trno)+1;
		var html="";
		html+='<div class="custom-file mb-3" id="div'+trno+'">'
		html+='<input type="file" name="file_name[]" class="custom-file-input" id="customFile">'
		html+='<label class="custom-file-label" for="customFile" placeholder="choose file">Upload Images</label>'
		html+='</div>'
		html+='<div class="add-button btn btn-danger btn-sm" onclick="$(this).remove();">'
		html+='<i class="fa fa-minus">'
		html+='</div>'
		$(this).parent().find('.clone-append').append(html).html();
		$('#nexttr').val(nexttr);
	});
});
