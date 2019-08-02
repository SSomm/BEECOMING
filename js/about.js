function email_check( email ) {
    
    var regex=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return (email != '' && email != 'undefined' && regex.test(email));

}

$(document).ready(function(){
	// alert("a");
	$(".service_item").mouseover(function(){
		$(this).stop().animate({
  top:-20,
});
	});
	$(".service_item").mouseleave(function(){
		$(this).stop().animate({
			  top:0,
			});
	});

	//서비스 창
	$("#curator_page").on("click", function(){
		location.href="./curator.php";
	});
	$("#shop_page").on("click", function(){
		location.href="./category.php";
	});
	$("#community_page").on("click", function(){
		location.href="./communitypage.php";
	});

	$(".span_seart").click(function(){
		var windowW = 500;  // 창의 가로 길이
        var windowH = 700;  // 창의 세로 길이
        var left = Math.ceil((window.screen.width - windowW)/2);
        var top = Math.ceil((window.screen.height - windowH)/2);
window.open("./Becoming.html","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);

	});

	$(".contract").click(function(){
		var windowW = 800;  // 창의 가로 길이
        var windowH = 700;  // 창의 세로 길이
        var left = Math.ceil((window.screen.width - windowW)/2-1000);
        var top = Math.ceil((window.screen.height - windowH)/2-200);
window.open("./becoming_contract.html","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);

	});

	$(".use").click(function(){
		var windowW = 800;  // 창의 가로 길이
        var windowH = 700;  // 창의 세로 길이
        var left = Math.ceil((window.screen.width - windowW)/2-1000);
        var top = Math.ceil((window.screen.height - windowH)/2-200);
// window.open("#","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);

	});

	$(".send_btn").on("click", function(){
		// alert("자동 메일보내기 기능은 현재 개발중입니다.");
		// $(".send_body_right>input").val("");
		// $(".sned_body").val("");
		var name=$(".e_send_name").val();
		var subject=$(".e_send_title").val();
		var email=$(".e_send_email").val();
		var phone=$(".e_send_num").val();
		var msg=$(".e_send_msg").val();


		if(subject==""||msg==""||name==""||email==""||phone==""){
						alert("이름, email주소, 제목, 내용, 전화번호를 모두 입력해주십시오.");
						return false;
					}else{

						 if(! email_check(email) ) {
			          		  alert('잘못된 형식의 이메일 주소입니다.');
					            $(this).focus();
					            return false;
					        }else{
					        	$.ajax({
										type:"POST",
										url:"./php/send_email.php",
										data:{subject:subject, name:name, msg:msg, email:email, phone:phone},
										success:function(response){
										
												alert("BEECOMING 관리자에게 메일을 송부하였습니다.");
												$(".e_send_name").val("");
												$(".e_send_title").val("");
												$(".e_send_email").val("");
												$(".e_send_num").val("");
												$(".e_send_msg").val("");

										}
										})
					        }
						
					}




	});




});