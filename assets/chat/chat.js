$(function() {
	$('.message').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			sendTxtMessage($(this).val());
		}
	});
	$('.btnSend').click(function(){
		sendTxtMessage($('.message').val());
	});
	$('.selectVendor').click(function(){
		ChatSection(1);
		var receiver_id = $(this).attr('id');
		$('#ReciverId_txt').val(receiver_id);
		$('#GroupId_txt').val(null);
		$('#ReciverName_txt').html($(this).attr('title'));
		GetChatHistory(receiver_id);
	});
	$('.selectGroup').click(function(){
		ChatSection(1);
		var group_id = $(this).attr('id');
		$('#GroupId_txt').val(group_id);
		$('#ReciverId_txt').val(null);
		$('#ReciverName_txt').html($(this).attr('title'));
		GetGroupChatHistory(group_id);
	});
});	

function ChatSection(status){
	if(status==0){
		$('#chatSection :input').attr('disabled', true);
	} else {
		$('#chatSection :input').removeAttr('disabled');
	}   
}
ChatSection(0);

function ScrollDown(){
	var element = document.getElementById("content");
	var height = element.scrollHeight;
	$('#content').animate({scrollTop: height}, 1000);
}
window.onload = ScrollDown();

function DisplayMessage(message){
	var Sender_Name = $('#Sender_Name').val();
	var str = '<div class="direct-chat-msg right">';
	str+='<div class="direct-chat-info clearfix">';
	str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
	str+='</span><span class="direct-chat-timestamp pull-left"></span>'; 
	str+='<div class="direct-chat-text">'+message;
	str+='</div></div>';
	$('#dumppy').append(str);
}

function sendTxtMessage(message){
	var messageTxt = message.trim();
	if(messageTxt!=''){
		DisplayMessage(messageTxt);
		var ReciverId_txt = $('#ReciverId_txt').val();
		var GroupId_txt = $('#GroupId_txt').val();
		if(ReciverId_txt!=''){
			var data = {messageTxt : messageTxt, receiver_id : ReciverId_txt};
		}
		if(GroupId_txt!=''){
			var data = {messageTxt : messageTxt, group_id : GroupId_txt};
		}
		$.ajax({
			dataType : "json",
			type : 'post',
			data : data,
			url: 'send-message',
			success:function(data){
				if(ReciverId_txt!=''){
					GetChatHistory(ReciverId_txt)	
				}	
				else if(GroupId_txt!=''){
					GetGroupChatHistory(GroupId_txt)	
				} 
			},
			error: function (jqXHR, status, err) {
			}
		});
		ScrollDown();
		$('.message').val('');
		$('.message').focus();
	}
	else{
		$('.message').focus();
	}
}

function GetChatHistory(receiver_id){
	$.ajax({
		url: 'get-chat-history/'+receiver_id,
		success:function(data){
			$('#dumppy').html(data);
			ScrollDown();	 
		},
		error: function (jqXHR, status, err){
		}
	});
}

function GetGroupChatHistory(group_id){
	$.ajax({
		url: 'get-group-history/'+group_id,
		success:function(data){
			$('#dumppy').html(data);
			ScrollDown();	 
		},
		error: function (jqXHR, status, err) {
		}
	});
}

setInterval(function(){ 
	var receiver_id = $('#ReciverId_txt').val();
	if(receiver_id!=''){GetChatHistory(receiver_id);}
}, 3000);

setInterval(function(){ 
	var group_id = $('#GroupId_txt').val();
	if(group_id!=''){GetGroupChatHistory(group_id);}
}, 3000);

$(function(){
	$('.userGroup').click(function(){
		var group_id = $(this).attr('id');
		var group_count = $(this).attr('gcount');
		$('#groupname').html($(this).attr('groname'));
		$('#gcount').html(group_count + ' Members');
		GetGroupMembers(group_id);
	});
});

function GetGroupMembers(group_id){
	$.ajax({
		url: 'get-group-members/'+group_id,
		success:function(data){
			$('#groupmem').html(data);
			ScrollDown();	 
		},
		error: function (jqXHR, status, err) {
		}
	});
}