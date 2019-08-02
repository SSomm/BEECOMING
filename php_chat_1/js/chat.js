$(document).ready(function(){
	setInterval(function(){
		updateUserList();	
		updateUnreadMessageCount();	
	}, 1000);	
	setInterval(function(){
		showTypingStatus();
		updateUserChat();		
			
	}, 1000);
	
	$(".messages").animate({ 
		scrollTop: $(document).height() 
	}, "fast");
	var objheight = $(".messages").height();
	$(".messages").scrollTop(objheight);

	$(document).on("click", '#profile-img', function(event) { 	
		$("#status-options").toggleClass("active");
	});
	$(document).on("click", '.expand-button', function(event) { 	
		$("#profile").toggleClass("expanded");
		$("#contacts").toggleClass("expanded");
	});	
	$(document).on("click", '#status-options ul li', function(event) { 	
		$("#profile-img").removeClass();
		$("#status-online").removeClass("active");
		$("#status-away").removeClass("active");
		$("#status-busy").removeClass("active");
		$("#status-offline").removeClass("active");
		$(this).addClass("active");
		if($("#status-online").hasClass("active")) {
			$("#profile-img").addClass("online");
		} else if ($("#status-away").hasClass("active")) {
			$("#profile-img").addClass("away");
		} else if ($("#status-busy").hasClass("active")) {
			$("#profile-img").addClass("busy");
		} else if ($("#status-offline").hasClass("active")) {
			$("#profile-img").addClass("offline");
		} else {
			$("#profile-img").removeClass();
		};
		$("#status-options").removeClass("active");
	});	
	$(document).on('click', '.contact', function(){		
		$('.contact').removeClass('active');
		$(this).addClass('active');
		var to_user_id = $(this).data('touserid');
		$(this).children("div").children(".meta").children('.name').children("span").html("");
		// showUserChat(to_user_id);

		$.ajax({
		url:"./php_chat_1/chat_action.php",
		method:"POST",
		data:{to_user_id:to_user_id, action:'show_chat'},
		dataType: "json",
		async: false,
		success:function(response){
			$('#userSection').html(response.userSection);
			$('#conversation').html(response.conversation);	
			$('#unread_'+to_user_id).html('');
			// scroll_fun();
				
		},
	});
		$(".member_name").text($(this).children("div").children(".meta").children('.name').text()+"님과의 대화")
	// 	var height = 0;
	// 		$(".messages > ul > li").each(function(){
	// 			height += 70;
	// 		});		
	// 		var objheight = $(".messages").height();
	// 		// alert(objheight);
	// $(".messages").scrollTop(objheight+height);	

		$(".chatMessage").attr('id', 'chatMessage'+to_user_id);
		$(".chatButton").attr('id', 'chatButton'+to_user_id);
			// alert(objheight);
		setTimeout(function(){
				var height = 0;
			$(".messages > ul > li").each(function(){
				height += 70;
			});		
			var objheight = $(".messages").height();
			// alert(objheight);
	$(".messages").scrollTop(objheight+height);		
		},1000);
	});	
	$(document).on("click", '.submit', function(event) { 
		var to_user_id = $(this).attr('id');
		to_user_id = to_user_id.replace(/chatButton/g, "");
		sendMessage(to_user_id);
		// alert(to_user_id);
	});
    $(document).on("keydown",".chatMessage",function(key){
    	if (key.keyCode == 13) {
            var to_user_id = $(this).attr('id');
		to_user_id = to_user_id.replace(/chatMessage/g, "");
		sendMessage(to_user_id);
        }
    });
	$(document).on('focus', '.message-input', function(){
		var is_type = 'yes';
		$.ajax({
			url:"./php_chat_1/chat_action.php",
			method:"POST",
			data:{is_type:is_type, action:'update_typing_status'},
			success:function(){
			}
		});
	}); 
	$(document).on('blur', '.message-input', function(){
		var is_type = 'no';
		$.ajax({
			url:"./php_chat_1/chat_action.php",
			method:"POST",
			data:{is_type:is_type, action:'update_typing_status'},
			success:function() {
			}
		});
	});
	$(document).on("keyup",".chat_serach",function(){
		var keyward = $(this).val();
		$.ajax({
			method:"POST",
			url:"./php_chat_1/chat_action.php",
			data:{action:'search_member',keyward:keyward},
			dataType:"json",
			success:function(response){
				// alert(response.conversation);
				// $.each(response,function(key,value){
				// 	alert(value.conversation);
				// });
				$("#contacts").html(response.conversation);
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});	





}); 
function updateUserList() {
	$.ajax({
		url:"./php_chat_1/chat_action.php",
		method:"POST",
		dataType: "json",
		data:{action:'update_user_list'},
		success:function(response){		
			var obj = response.profileHTML;
			Object.keys(obj).forEach(function(key) {
				// update user online/offline status
				if($("#"+obj[key].userid).length) {
					if(obj[key].online == 1 && !$("#status_"+obj[key].userid).hasClass('online')) {
						$("#status_"+obj[key].userid).addClass('online');
					} else if(obj[key].online == 0){
						$("#status_"+obj[key].userid).removeClass('online');
					}
				}				
			});			
		}
	});
}
function sendMessage(to_user_id) {
	message = $(".message-input input").val();
	// alert(message);
	$('.message-input input').val('');
	if($.trim(message) == '') {
		return false;
	}
	$.ajax({
		url:"./php_chat_1/chat_action.php",
		method:"POST",
		data:{to_user_id:to_user_id, chat_message:message, action:'insert_chat'},
		dataType: "json",
		success:function(response) {
			// alert(response);
			var div ="";
			$.each(response,function(key,value){
				// alert(value.)
				// alert(value);
				div += value;
			});
			// var resp = $.parseJSON(response);	
			var height = 0;
			$(".messages > ul > li").each(function(){
				height += 70;
			});
			$('#conversation').html(div);			
			var objheight = $(".messages").height();
			// alert(objheight);
	$(".messages").scrollTop(objheight+height);		
			// var offset = $(".messages > ul > li:last-child").offset();
			// $(".messages").animate({ scrollTop: offset }, "fast");
			// $(".messages").scrollTop($(".messages").height());
		}
	});

}
function showUserChat(to_user_id){
	$.ajax({
		url:"./php_chat_1/chat_action.php",
		method:"POST",
		data:{to_user_id:to_user_id, action:'show_chat'},
		dataType: "json",
		async: false,
		success:function(response){
			$('#userSection').html(response.userSection);
			$('#conversation').html(response.conversation);	
			$('#unread_'+to_user_id).html('');
			// scroll_fun();
				
		},
	});
}
function updateUserChat() {
	$('li.contact.active').each(function(){
		var to_user_id = $(this).attr('data-touserid');
		$.ajax({
			url:"./php_chat_1/chat_action.php",
			method:"POST",
			data:{to_user_id:to_user_id, action:'update_user_chat'},
			dataType: "json",
			success:function(response){				
				$('#conversation').html(response.conversation);	
			}
		});
	});
}
function updateUnreadMessageCount() {
	$('li.contact').each(function(){
		if(!$(this).hasClass('active')) {
			var to_user_id = $(this).attr('data-touserid');
			$.ajax({
				url:"./php_chat_1/chat_action.php",
				method:"POST",
				data:{to_user_id:to_user_id, action:'update_unread_message'},
				dataType: "json",
				success:function(response){		
					// console.log(response.count);
					if(response.count) {
						$('#unread_'+to_user_id).html(response.count);
						setInterval(function() { 
						 $('.message_circle').fadeOut('slow').fadeIn('slow'); 
						  },1500);
						// console.log(response.count);
					}
					// console.log(response.cout);
				}
			});
		}
	});
}
function showTypingStatus() {
	$('li.contact.active').each(function(){
		var to_user_id = $(this).attr('data-touserid');
		$.ajax({
			url:"./php_chat_1/chat_action.php",
			method:"POST",
			data:{to_user_id:to_user_id, action:'show_typing_status'},
			dataType: "json",
			success:function(response){				
				$('#isTyping_'+to_user_id).html(response.message);			
			}
		});
	});
}
// function get_count(){
// 	$('li.contact').each(function(){
// 			var to_user_id = $(this).attr('data-touserid');
// 			$.ajax({
// 				url:"./php_chat_1/chat_action.php",
// 				method:"POST",
// 				data:{to_user_id:to_user_id, action:'get_count'},
// 				dataType: "json",
// 				success:function(response){		
// 					if(response.count) {
// 						$('#unread_'+to_user_id).html(response.count);	
// 					}					
// 				}
// 			});
// 		}
// }
function scroll_fun(){
	alert("a")
}

function timer(){

}