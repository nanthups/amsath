function unfollow(id){
	$.ajax({
		url: 'un-follow/'+id,
		success:function(data){
			alert('Unfollowed successfully..!');
			location.reload();   
		},
		error: function (err) {
			alert('Error while unfollowing..!');
		}
	});
}
function follow(id){
	$.ajax({
		url: 'follow/'+id,
		success:function(data){
			alert('Followed back successfully..!');
			location.reload();   
		},
		error: function (err) {
			alert('Error while following..!');
		}
	});
}
$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});

$("form[name='crtgroup']").submit(function(e){
	e.preventDefault(); 
	var form = $(this);
	var url = form.attr('action');
	if ($('#grpname').val().length != 0) { 
		$.ajax({
			type: "POST",
			url: url,
			data: form.serialize(), 
			success: function(data)
			{
				location.reload(); 
				$("#salert").show();
			}
		});
	}else{
		$("#malert").show();
	}
});
