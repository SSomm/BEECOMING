	 // 글자 타이핑 과정
function changeText1(text1, container, speed){
    var text =text1.text();
    var ocontent=text.split("");
    var i=0;
    function show(){
        if(i<ocontent.length){
            container.append("<span class='text1'>"+ocontent[i]+"</span>");
            i++;
        }else if(i==ocontent.length){
            removeText1($(".element"), 70, $(".text2"));
            clearInterval(timer);
        }
    };
    var timer=setInterval(show, speed);
};

function changeText2(con1,container,speed){
    var text=con1.text();
    // alert(text);
    var ocontent=text.split("");
    var i=0;
    var flag=0;
    // alert(ocontent);
    function show(){
    	// alert("a");
        if(i<ocontent.length){
            container.append("<span class='text1'>"+ocontent[i]+"</span>");
            i++;
        }else if(i==ocontent.length){
            removeText3(70);
            clearInterval(timer);
        }
    }
    var timer=setInterval(show, speed);
}
//    //타이핑된 글자 지우기 과정
function removeText1(container, speed, secondtext){
    
    var text1=secondtext.text();
    var acontent=text1.split("");
    var pre_length=0;
    var sp=new Array();
    var a=0;// each문 사용을 위한 인덱스 변수(텍스트 넣기) - 제거용
    var s=0;// 두번째 텍스트용 인덱스 변수 - 출력용
    $(".element>span").each(function(){

        sp[a]=$(this);
        a++;
        pre_length++;
    })
    function show(){
        if(pre_length>=0){
            $(sp[pre_length-1]).remove();
            pre_length--;
        }else if(pre_length==-1){
//            alert(acontent.length);
            if(s<acontent.length){
                container.append("<span class='text1'>"+acontent[s]+"</span>");
                s++;
            }else if(s==acontent.length){
                removeText2($(".element"),70,$(".text3"));
                clearInterval(timer);
            }
        }
    };
    var timer=setInterval(show, speed);

};

function removeText2(con2, speed, con3){
    var text1=con3.text();
    var acontent=text1.split("");    
    var i=0;
    var sp=new Array();
    var index=0;// 지울 텍스트 배열에 담을 때의 index용 변수
    $(".element>span").each(function(){
       sp[index]=$(this);
        index++; 
        i++;
    });
    function show(){
        if(index>=0){
            $(sp[index]).remove();
            index--;
        }else if(index==-1){
            changeText2($(".text3"), $(".element"),120);
            clearInterval(timer);
        }
    }
    var timer=setInterval(show, speed); 
}

function removeText3(speed){
    var sp=new Array();
    var index=0;
    $(".element>span").each(function(){
       sp[index]=$(this);
        index++;
    });
    var num=index-1;
    function show(){
        if(num>=0){
            $(sp[num]).remove();
            num--;
          
        }else if(num==-1){
            changeText1($(".text1"), $(".element"), 120);
            clearInterval(timer);
        }
    }
    var timer=setInterval(show, speed);
}
// function imgSize(which){
//     var width = eval("document."+which+".width");
//     var height = eval("document."+which+".height");
//     var temp = 0; 
//     var max_width= 600;   // 이미지의 가로 최대 크기    
//     var max_height = 400; // 이미지의 세로 최대 크기
    
//     if ( width > max_width ) {  // 이미지가 600보다 크다면 너비를 600으로 맞우고 비율에 맞춰 세로값을 변경한다.      
//         height = height/(width / max_width);
//         eval("document."+which+".width = max_width");     
//         eval("document."+which+".height = height");
//         width = max_width;     
//     }
 
//     if( height > max_height ) {
//         width = width/(height / max_height);
//         eval(document.getElementById(which).width = width);
//         eval(document.getElementById(which).height = max_height);
//     }
// }
var isloaded = false;
$(document).ready(function(){
	if (isloaded) {

	return;

	}
	// alert("a");
	//news_div fadeIn/out 
	//설정 창 없음
	// $(".target").hide();
	// imgSize("img")
	//타이핑
	$(".message").css("display", "none");
    changeText1($(".message:nth-child(1)"),$(".element"),120)

	$(".news_div").mouseover(function(){
		$(this).children(".gray_div").stop().fadeIn();
	});
	$(".news_div").mouseleave(function(){
		$(this).children(".gray_div").stop().fadeOut();
	});

	$(".hashtag").mouseover(function(){
		$(this).css("background","#01578e");
		$(this).css("color","white");
	});
	$(".hashtag").mouseleave(function(){
		$(this).css("background","white");
		$(this).css("color","#01578e");
	});
	$(".main_content_div").mouseover(function(){
		$(this).children(".show_info").stop().fadeIn();
	});
	$(".main_content_div").mouseleave(function(){
		$(this).children(".show_info").stop().fadeOut();
	});


	$(".toggle_btn2").click(function(){
		$(this).css({
			"border-left":"1px solid #959595",
			"border-top":"1px solid #959595",
			"border-right":"1px solid #959595",
			"background":"white"
		});
		$(this).children("p").css("color","#959595");
		$(".toggle_btn1").css({
			"background":"#01578e",
			"border":"none"
		});
		$(".toggle_btn1").children("p").css({
			"color":"white"
		});
		$(".honey").fadeOut();
		$(".top5").fadeIn();
	});
	$(".toggle_btn1").click(function(){
		$(this).css({
			"border-left":"1px solid #959595",
			"border-top":"1px solid #959595",
			"border-right":"1px solid #959595",
			"background":"white"
		});
		$(this).children("p").css("color","#959595");
		$(".toggle_btn2").css({
			"background":"#01578e",
			"border":"none"
		});
		$(".toggle_btn2").children("p").css({
			"color":"white"
		});
		$(".honey").fadeIn();
		$(".top5").fadeOut();
	});
	
	//회원가입 초기화면 옵션(일반/판매자 회원)
	$(".user_circle").click(function(){
		$(".register_modal_intro").stop().fadeOut();
		$(".user_wrap").stop().fadeIn();
	});
	$(".saler_circle").click(function(){
		$(".register_modal_intro").stop().fadeOut();
		$(".saller_modal_wrap").stop().fadeIn();
	});
	var saler_flag = 0;

	//판매자 회원 가입
	$(".register_saller_btn").click(function(){
		if(saler_flag == 0){
			$(".saller_modal_wrap").css("margin-left","-100%");
			saler_flag = 1;
		}else{
			//회원가입 ajax
			var id=$(".regis_company_id").val();
			var pw=$(".regis_company_pw").val();
			var pw_confirm=$(".regis_company_pw_con").val();
			var name=$(".regis_company_name").val();
			var email=$(".regis_company_email").val();
			var phone=$(".regis_company_tel").val();
			var number=$(".regis_company_number").val();
			var p_cate=$(".regis_producnt option:selected").val();
			var pos=$(".regis_company_pos").val();
			var address=$(".regis_company_address").val();
			var comp_address=pos+","+address;
			var seller=1;
			// alert(comp_address);


				var pw_flag=0; var id_flag=0; var email_flag=0; var birth_flag=0;

		if(pw==pw_confirm){
			if(id!=undefined && pw!=undefined && name!= undefined && email!= undefined && number!= undefined && p_cate!= undefined && comp_address!= undefined && seller !=undefined ){
			
			var regType1 = /^[A-Za-z0-9+]*$/;
			//패스워드용
				var num = pw.search(/[0-9]/g);
				var eng  =pw.search(/[a-z]/ig);
				var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

			var regbirth=/^[0-9]+$/;
			// var regnick = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi;
			// var regnick=  /^[가-힣a-zA-Z]+$/;;
			var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

			if(regType1.test(id)==true){
				id_flag=1;
			}else if(regType1.test(id)==false){
				alert("id가 형식에 맞지 않습니다.");
			}
			if((eng>=0) && (num>=0 ||spe>=0)){
						pw_flag=1;
					}else{
						pw_flag=0;
						alert("패스워드가 형식에 맞지 않습니다.");
					}
			if(regbirth.test(number)==true){
				birth_flag=1;
			}else if(regbirth.test(number)==false){
				alert("사업자 번호가 형식에 맞지 않습니다.");
			}
			
			if(regEmail.test(email)==true){
				email_flag=1;
			}else if(regEmail.test(email)==false){
				alert("이메일이 형식에 맞지 않습니다.");
			}


	if(id_flag==1 && birth_flag==1 && pw_flag==1 && email_flag==1){
			// var 
			$.ajax({
				type:"POST",
				url:"./php/join.php",
				data:{id:id, pw:pw, name:name, email:email,
				phone:phone, number:number, p_cate:p_cate,
				comp_address:comp_address, seller:seller},
				success:function(response){
					// alert(response);
				if(response=="success"){
					// var id=$("#company_logo").attr("data-id");
					var formData = new FormData();
					var file_name=$("#company_logo")[0].files[0];
					formData.append("service_image",file_name);
					// var source_img= new Array();
					// source_img=file_namee.split("\");
					// alert(source_img);
					// alert(id);
		//회사 로고 업로드
		$.ajax({
		dataType:"json",
		 url: './php/company_logo.php?id='+id,
		 data: formData,
		 processData: false, 
		 contentType: false,
		 type: 'POST', 
		 success: function(data){ 
		 	// alert(data.error);
		 	if(data.success!=false){
		 		alert("판매자 회원 가입 성공!");
		 		location.reload();
		 		// alert(data.width);
		 		// location.reload();
			 	}else{
			 		alert("판매자 회원 가입 실패1!");
					return false;
				 	}
				}
			});						
							// location.reload();
					}else{
						alert("판매자 회원 가입 실패2!");
						return false;
					}
				  }
			})
			}
			}else{
				alert("모든 정보를 입력해주십시오.");
			}
		}else{
			alert("비밀번호가 일치하지 않습니다.");
		}
		}
	});



	$('.first_saler_prev').click(function(){
		if(saler_flag == 1){
			$(".saller_modal_wrap").css("margin-left","0%");
			saler_flag = 0;
		}
	});
	$(".register_prev_btn").click(function(){
		$(".saller_modal_wrap").hide();
		$(".user_wrap").hide();
		$(".register_modal_intro").show();
	});
	
	$(document).on("click",function(e){
		if($(".register_modal").is(e.target)){
			$(".register_modal").stop().fadeOut();
		};
	});



	//회원가입 버튼 - 슬라이드

	var re_flag = 0;
	$(".register_btn").click(function(){
		if(re_flag == 0){
			$(".modal_right_wrap").css("margin-left","-100%");
			re_flag = 1;
		}else if(re_flag == 1){
			$(".modal_right_wrap").css("margin-left","-200%");
		}
		// 
	});

	//-----------20190508_서정현_수정-----------------
	$(".first_prev").click(function(){
		$(".modal_right_wrap").css("margin-left","0%");
		re_flag = 0;
	});
	$(".second_prev").click(function(){
		$(".modal_right_wrap").css("margin-left","-100%");
		re_flag = 1;
	});
	//--------------------------------------------------------
	$(".login_go").click(function(e){
		e.preventDefault();
		$(".login_modal").fadeIn();
	});
	$(".modal_close > i").click(function(){
		$(".login_modal").fadeOut();
		$(".register_modal").fadeOut();
		re_flag = 0;
		$(".modal_right_wrap").css("margin-left","0%");
		$(".saller_modal_wrap").css("margin-left","0%");
		$('.saller_modal_wrap').hide();
		$(".user_wrap").hide();
		$(".register_modal_intro").show();
		reset();
	});
	$(".register_go").click(function(e){
		e.preventDefault();
		$(".register_modal").fadeIn();

	});

	//카테고리 스케일 
	$(".category_circle").mouseover(function(){
		$(this).scale(1.2);
	});
	$(".category_circle").mouseleave(function(){
		$(this).scale(1);
	});

	//카테고리 리디렉션

	$(".category_circle").on("click", function(){
		var cate=$(this).parent(".category").children("p").text();
		// alert(cate);
		location.href="./category.php?cate="+cate;

	});

	$(".new_img").on("click", function(){
		var num=$(this).attr("data-num");
		location.href="./categoryDetail.php?product_num="+num;

	});


	$(".bottom_bottom li").mouseover(function(){
		// alert("a");
		$(this).stop().animate({ marginTop: '-20px' }, 500);
		$(this).children(".hover_div_index").css("opacity", "1");
		$(this).children(".hover_div_index").css("transition", "all 1s");
		// $(".hover_info_index").css("position", "relative");
		// $(".hover_info_index").css("z-index", "999");
	});
	$(".bottom_bottom li").mouseleave(function(){
		// alert("a");
		$(this).stop().animate({ marginTop: '0px' }, 500);
		$(this).children(".hover_div_index").css("opacity", "0");
		$(this).children(".hover_div_index").css("transition", "all 1s");
	});

	//해시태그 버튼 제어
	$(".hash_left > span").mouseover(function(){
		$(this).css("background",'#ee1e72');
		$(this).css("color","white");
	});
	$(".hash_left > span").mouseleave(function(){
		$(this).css("background",'white');
		$(this).css("color","#ee1e72");
	});
	$(".hash_right > span").mouseover(function(){
		$(this).css("background",'#ee1e72');
		$(this).css("color","white");
	});
	$(".hash_right > span").mouseleave(function(){
		$(this).css("background",'white');
		$(this).css("color","#ee1e72");
	});

	// var icn_blink = setInterval(function() { 
	//  $('.message_circle').fadeOut('fast').fadeIn('fast'); 
	//  	// $(".message_circle").css("background","#ee1e72");
	//  	// setTimeout(function(){
	//  	// 	$(".message_circle").css("background","salmon");
	//  	// },750);
	//   },1500);

	//추천 해시태그
	$(".chucheon_bottom > span").mouseover(function(e){
		$(this).css("background",'#ee1e72');
		$(this).css("color","white");
	});
	$(".chucheon_bottom > span").mouseleave(function(e){
		$(this).css("background",'white');
		$(this).css("color","#ee1e72");
	});


	//큐레이션 필터링 슬라이드
	$(".intro_next").click(function(){
		// alert("a");
		$(".poll_first_wrap").css("marginLeft","-100%");
	});
	var b_flag = 0;
	var clse_flag = 0;
	$(".curator_circle").click(function(){
		$(".poll_modal").fadeIn();
		clse_flag = 1;
		b_flag = 0;
		$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
		reset();
	});

		$(document).on("click",function(e){
			if($(".poll_modal").is(e.target)){
				$(".poll_modal").fadeOut();
			}
		});
	
	//큐레이션 필터링 이전 페이지
	$(".prev_btn").click(function(){
		// alert(b_flag);
		$(".next_btn").removeClass("submit_btn");
		if(b_flag == 5){
			$(".poll_body_wrap").css("marginLeft","-400%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
		}
		else if(b_flag == 4){
			$(".poll_body_wrap").css("marginLeft","-300%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
		}else if(b_flag == 3){
			$(".poll_body_wrap").css("marginLeft","-200%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
		}else if(b_flag == 2){
			$(".poll_body_wrap").css("marginLeft","-100%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
		}else if(b_flag == 1){
			$(".poll_body_wrap").css("marginLeft","0%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
		}else{
			$(".poll_first_wrap").css("marginLeft","0%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
			return false;
		}

		b_flag--;

	});
	//큐레이션 필터링 다음 페이지
	$(".next_btn").click(function(){
		// alert(b_flag);
		// $(".next_btn").removeClass("submit_btn");
		if(b_flag == 0){
			// $(".next_btn").removeClass("submit_btn");
			$(".poll_body_wrap").css("marginLeft","-100%");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
			b_flag =1;
		}else if(b_flag == 1){
			$(".poll_body_wrap").css("marginLeft","-200%");
			// $(".next_btn").removeClass("submit_btn");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
			b_flag =2;
		}else if(b_flag == 2){
			$(".poll_body_wrap").css("marginLeft","-300%");
			// $(".next_btn").removeClass("submit_btn");
			$(".next_btn").html("다음 "+"<i class='fas fa-angle-double-right' style='color:white;'></i>");
			b_flag =3;
		}else if(b_flag ==3){
			$(".poll_body_wrap").css("marginLeft","-400%");
			b_flag =4;
		}else if(b_flag == 4){
			var gender=$(".poll_body_wrap_mid").children("ul").children("li").children("input[name='gender']:checked").val();
			// alert(gender);
			var age=$(".poll_body_wrap_mid").children("ul").children("li").children("input[name='year']:checked").val();
			var case1=$(".poll_body_wrap_mid").children("ul").children("li").children("input[name='case']:checked").val();
			var rel=$(".poll_body_wrap_mid").children("ul").children("li").children("input[name='rel']:checked").val();
			var hobby=$(".poll_body_wrap_mid").children("ul").children("li").children("input[name='hobby']:checked").val();
			// alert(age);
			if(gender!=undefined && age !=undefined && case1!=undefined && rel!=undefined && hobby!=undefined){
			
					$.ajax({
				type:"POST",
				url:"./php/cu_filter.php",
				// contentType:"json",
				dataType:"json",
				data:{gender:gender, age:age, case1:case1, rel:rel, hobby:hobby},
				
				success:function(response){
								// alert(response.length);
					var gender_kor;

					if(gender==1){
						gender_kor="여";
					}else{
						gender_kor="남";
					}

					$(".poll_gender").text(gender_kor);
					$(".poll_age").text(age);
					$(".poll_case").text(case1);
					$(".poll_rel").text(rel);
					$(".poll_hobby").text(hobby);
					// alert(age);
					$(".poll_body_title > p").html("타겟 분석 결과 입니다. <br> 클릭하시면 추천상품을 안내합니다.");
					$(".poll_body_wrap").css("marginLeft","-500%");
					// $(".poll_body_button").css("width","270px");
					$(".prev_btn").hide();
					$(".next_btn").hide();
					$(".setting_cancel").show();
					$(".reset").show();
					$(".info").show();
					$(".cu_pick").show();







					localStorage.setItem("gender",gender_kor);
					localStorage.setItem("age",age);
					localStorage.setItem("case",case1);
					localStorage.setItem("rel",rel);
					localStorage.setItem("hobby",hobby);
					localStorage.setItem('target', 'show');
					localStorage.setItem('cricle', 'hide');
					var i = 0;
					// $(".target_body > ul > li").remove();
					$()
					$(".poll_six_body > ul > li").remove();
					$.each(response,function(){
						// alert(response[i]);
						var list=`<li>
												<label for="radio_first">${i+1}위 : </label>
												<label for="radio_first">${response[i]}</label>
												<input type="radio" name="radio_first" class="cur_radio" value="${response[i]}" id="radio_first">
											</li>`;

						$(".poll_six_body").children("ul").append(list);

						i++;
					});
					// alert(response.gift);
					// if(response){
					// 	// var a=JSON.parse(response);
					// 	alert(response.gift);

					// 	// alert(response[0].gift);
				
					// }else{
					// 	alert("error");
					// 	return false;
					// }
				}
			})

				}else{
					alert("5가지 모든 문항에 답하여 주십시오.");
				}		
			b_flag =5;
			return false;
		}else{
		
		}
		// b_flag++;
	});

	//로컬 가지고오기
	$(".poll_gender").text(localStorage.getItem("gender"));
	$(".poll_age").text(localStorage.getItem("age"));
	$(".poll_case").text(localStorage.getItem("case"));
	$(".poll_rel").text(localStorage.getItem("rel"));
	$(".poll_hobby").text(localStorage.getItem("hobby"));

	// 메뉴 mouseover event
	$(".menu_div_bottom>p").on("mouseover", function(){
		$(this).children("a").css("color", "#ee1e72");
	});
	$(".menu_div_bottom>p").on("mouseleave", function(){
		$(this).children("a").css("color", "dimgray");
	});
	//로그인 회원가입 mouseover
	$(".menu_div_top>a").on("mouseover", function(){
		$(this).css("color", "#ee1e72");
	});
	$(".menu_div_top>a").on("mouseleave", function(){
		$(this).css("color", "dimgray");
	});

	//메인페이지
	$(".best_boa_title").on("click", function(){
		var boardnum=$(this).attr("data-num");
		// alert(boardnum);
		location.href="./communityboardview.php?boardnum="+boardnum;
	});
	//메인 큐레이터
	$(".main_nick").on("click", function(){
		var curator_num=$(this).attr("data-num");
		location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	$(".best_in_circle>img").on("click", function(){
		var curator_num=$(this).attr("data-num");
		location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	$(".img_in_circle>img").on("click", function(){
		var curator_num=$(this).attr("data-num");
		location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	$(".top_right_right>p").on("click", function(){
		var curator_num=$(this).attr("data-num");
		location.href="./cuartor_view.php?curator_num="+curator_num;
	});

	//페이지 이동시 상호작용 효과 
	var url = $(location).attr('href');
	// alert(url);
	var urlsplit = url.split("/");
	// alert(urlsplit[4]);
	if(urlsplit[4]=="curator.php"){
		// alert("a");
		$(".menu_div_bottom").children(".curatorpage").children("a").css("color", "#ee1e72");
	}else if(urlsplit[4]=="community.php"){
		$(".menu_div_bottom").children(".communitypage").children("a").css("color", "#ee1e72");
	}else if(urlsplit[4]=="shop.php"){
		$(".menu_div_bottom").children(".shoppage").children("a").css("color", "#ee1e72");
	}else if(urlsplit[4]=="becomtip.php"){
		$(".menu_div_bottom").children(".becomingpage").children("a").css("color", "#ee1e72");
	}

	// var set_page=urlsplit[4].split("?");
	// 	// alert(set_page[0]);
	// if(set_page[0]=="curator_view.php"){
	// 	$.ajax({
	// 		type:"POST",
	// 		url:"./curator_view.php"
	// 	});

	// 	}

	//회원가입 제어
	$(".cuator_btn_success").on("click", function(){
		var id=$(".regis_id").val();
		var pw=$(".regis_pw").val();
		var pw_2=$(".regis_pw_con").val();
		var nickname=$(".regis_nick").val();
		var name=$(".regis_name").val();
		var email=$(".regis_email").val();
		var birth=$(".regis_birth").val();
		var hobby=$(".hobby_select option:selected").val();
		var address=$(".regis_pos").val()+','+$('.form_group>.regis_address').val();
		// alert(address);
		// alert(birth);
		// var curator=$(".cuator_div").children("input[name='cu_argree']:checked").val();
		var curator=$("input[name='cu_argree']:checked").val();
		var pw_flag=0; var id_flag=0; var nick_flag=0; var email_flag=0; var birth_flag=0;

		if(pw==pw_2){
			if(id!=undefined && pw!=undefined && nickname!= undefined && name!= undefined && email!= undefined && birth!= undefined && hobby!= undefined && address!= undefined && curator !=undefined ){
			
			var regType1 = /^[A-Za-z0-9+]*$/;
			//패스워드용
				var num = pw.search(/[0-9]/g);
				var eng  =pw.search(/[a-z]/ig);
				var spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

			var regbirth=/^[0-9]+$/;
			// var regnick = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/gi;
			var regnick=  /^[가-힣a-zA-Z]+$/;;
			var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

			if(regType1.test(id)==true){
				id_flag=1;
			}else if(regType1.test(id)==false){
				alert("id가 형식에 맞지 않습니다.");
			}
			if((eng>=0) && (num>=0 ||spe>=0)){
						pw_flag=1;
					}else{
						pw_flag=0;
						alert("패스워드가 형식에 맞지 않습니다.");
					}
			if(regbirth.test(birth)==true){
				birth_flag=1;
			}else if(regbirth.test(birth)==false){
				alert("생년월일이 형식에 맞지 않습니다.");
			}
			if(regnick.test(nickname)==true){
				nick_flag=1;
			}else if(regnick.test(nickname)==false){
				alert("닉네임이 형식에 맞지 않습니다.");
			}
			if(regEmail.test(email)==true){
				email_flag=1;
			}else if(regEmail.test(email)==false){
				alert("이메일이 형식에 맞지 않습니다.");
			}

			if(id_flag==1 && birth_flag==1 && nick_flag==1 && pw_flag==1 && email_flag==1){
						$.ajax({
							type:"POST", 
							url:"./php/join.php",
							data:{id:id, pw:pw, name:name, nickname:nickname, email:email, birth:birth, address:address, hobby: hobby, curator:curator},
							success:function(response){
								// alert(response);
								if(response=="success"){
									alert("회원 가입 성공!");
									location.reload();
								}else{
									alert("회원 가입 실패!");
									return false;
								}	
							}
		})
			}	
		}else{
			alert("정보를 모두 입력해주십시오.");
		}
		}else{
			alert("비밀번호가 일치하지 않습니다.");
		}
	
	}); 

	//아이디 중복 체크
	$(".regis_id").keydown(function(){
		var id=$(this).val();
		// alert(id);
		$.ajax({
			// alert(id);
			type:"POST",
			url:"./php/joincheck.php",
			data:{id:id},
			success:function(response){      
				
			},
			error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		})
	});
	$(".login_pw").keydown(function(key){
		if(key.keyCode == 13){
			var id=$(".login_id").val();
		var pw=$(".login_pw").val();
		// alert(id);
		// alert(pw);
		$.ajax({
			type:"POST",
			url:"./php/login.php",
			data:{id:id, pw:pw},
			success:function(response){
				// alert(response);
				if(response=="success"){
					alert("로그인 성공!");
					location.reload();
				}else{
					alert("아이디와 비밀번호를 확인하세요.");
					// location.reload();
					return false;
				}
			}
		})
		}
	});
	//로그인 이벤트
	$(".login_btn").on("click", function(){
		var id=$(".login_id").val();
		var pw=$(".login_pw").val();
		// alert(id);
		// alert(pw);
		$.ajax({
			type:"POST",
			url:"./php/login.php",
			data:{id:id, pw:pw},
			success:function(response){
				// alert(response);
				if(response=="success"){
					alert("로그인 성공!");
					location.reload();
				}else{
					alert("아이디와 비밀번호를 확인하세요.");
					// location.reload();
					return false;
				}
			}
		})
	});
	//로그아웃 이벤트
	$(".logout_go").on("click", function(){

		$.ajax({
			type:"POST",
			url:"./php/logout.php",
			success:function(response){
				// alert(response);
				if(response=="success"){
					alert("로그아웃 성공!");
					location.href="./index.php";
				}else{
					alert("로그아웃 실패!");
					return false;
				}
			}
		})
	});

	$("button").on("mouseover", function(){
		$(this).css("cursor", "pointer");
	});

//설정 취소,재설정,상품보기
	$(".setting_cancel").click(function(){
		$(".poll_modal").fadeOut();
	});
	$(".reset").click(function(){
		$(".poll_body_title > p").html("비커밍 큐레이션 서비스 이용을 위한. <br> 타겟설정.");
		$(".poll_body_wrap").css("marginLeft","0%");
		$(".prev_btn").show();
		$(".next_btn").show();
		$(".setting_cancel").hide();
		$(".reset").hide();
		$(".info").hide();
		// $(".poll_body_button").css("width","41%");
		$(".poll_modal input").prop("checked",false);
		b_flag = 0;
	});

	var boardcategory=$(".board_top_title>span:nth-child(1)").text();
	// alert(boardcategory);
	if(boardcategory=="전체게시판"){
		// alert("aa");
		$(".all").children("a").css("color","#ee1e73");
		$('.bottom_line').animate({
		  left:0,
		  width:109
		},0);
	}
	else if(boardcategory=="자유게시판"){
		$(".free").children("a").css("color","#ee1e73");
			$('.bottom_line').animate({
		  left:150,
		  width:135
		},0);
	}
	else if(boardcategory=="선물 후기 게시판"){
		$(".pr").children("a").css("color","#ee1e73");
			$('.bottom_line').animate({
		  left:350,
		  width:190
		},0);
	}
	else if(boardcategory=="큐레이션 후기 게시판"){
		$(".cu").children("a").css("color","#ee1e73");
		$('.bottom_line').animate({
		  left:580,
		  width:210
		},0);
	}


	//큐레이션 게시판
	$(".all").click(function(){
		$('.rank_list_slick').slick('unslick');
		$(".rank_list_slick div").remove();
		$(".rank_list_item").remove();
		$(".board_list_items").remove();
		$(".tab_ul a").css("color","black");
		$(this).children("a").css("color","#ee1e73");
		$(".board_top_title > span:nth-child(1)").text("전체게시판");
		$(".title_des_change").text("비커밍 커뮤니티의 전체게시판글을 볼 수 있는 게시판입니다.");
		$(".board_top_rank_title>p").text("최근 일주일 간 전체게시판에서 좋아요수와 조회수가 가장 높은 글입니다.");
		var boardcate="전체게시판";
		$('.bottom_line').animate({
		  left:0,
		  width:109
		},500);

				$.ajax({
					type:"GET",
					url:"./communitypage.php?boardcate="+boardcate,

				})

				$.ajax({
			type:"POST",
			url:"./php/communityjson.php",
			data:{boardcate:boardcate},
			dataType:"json",
			success:function(response){
				// alert(response);
				// $.each()
				var i =0;
				
				$.each(response.rank,function(key,value){
				
					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
					var new_rank = `<div class="rank_list_item">
									<div class="rank_wrap">
										<div class="rank_img_wrap">
												<img src="${value.thumbnail}" alt="img">								
										</div>
										<div class="rank_numbers">
											<p>BEST ${i+1}</p>
										</div>
										<div class="rank_info">
											<p class="rank_info_title" data-num="${value.board_num}">${value.boardtitle}</p>
											<p>BY.${value1.nickname}</p>
										
										</div>
									</div>
								</div>
									<?php
									$i++;}
									?>
							</div>`;				
					
							$(".rank_list_slick").append(new_rank);
							i++;
						}

					});	
							
				});

$('.rank_list_slick').slick({
   infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows:true,
  autoplay:true,
  prevArrow:"<button type='button' class='slick-prev pull-left prev_btn_slick'><</button>",
            nextArrow:"<button type='button' class='slick-next pull-right next_btn_slick' >></button>"
});
var j=0;
var new_list = "";
				$.each(response.list,function(key,value){
					// alert("a");

					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
							var k=0;

							var board_hash=new Array();
							// alert(value.boardhash);
							// alert(value.boardhash.replace(/,/g, ' '));



							var ex_hash=value.boardhash.split(",");
							// replace(ex_hash,",");

							// alert(ex_hash[0]);
							// alert(ex_hash[1]);
							// alert(ex_hash[2]);
							// alert(ex_hash[3]);

							// var l = 0;
							for(var k in ex_hash){
								
									ex_hash[k].replace(/,/g, ' ');
									board_hash.push("<span># "+ex_hash[k]+"</span>");
								// alert(ex_hash[k]);
								// ex_hash[k].replace(",","");
								
								// boardhash[k].replace(",","");
							}

												// alert(value.user_id);
				new_list+=`	<div class="board_list_items">
									<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
									<img src="${value.thumbnail}" alt="img">							
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<div class="info_top_left">
											<h1 data-num='${value.board_num}'>${value.boardtitle}</h1>
										</div>
										<div class="info_top_right">
											<p>${value.first_written}</p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p>${value.bodytext}</p>
									</div>
									<div class="view_hash different">
									${board_hash.join(" ")}

									</div>
								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<img src="${value1.profile_img}" alt="img">
										</div>
									</div>
									<p class="boardnickname">${value1.nickname}</p>															
									`;
									
									if(value1.curator==1){
										new_list+=`<div class="bal">
										<div class="balloon cr_flag">
											<p>CR</p>
										</div>
									</div>`;
									}
								new_list+=`</div>
								<div class="item_icon_like">
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-eye"></i>
										</div>
										<p class="icon_info_div_count">조회수 ${value.view_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 ${value.comment_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 ${value.like_num}</p>
									</div>
								</div>
							</div>
						`;	
							// $(".board_lists_search").after(new_list);
							i++;
							j++;					
							
						}
				});

				
			});
				$(".board_list_wrap_1").html(new_list);
				//이미지 조절
				var text_thumb=$(".item_img_wrap>img");
				if(text_thumb.width()>text_thumb){
					$(this).css("style","height:135px");
					$(this).css("style","width:auto");
				}else{
					$(this).css("style","width:135px");
					$(this).css("style","height:auto");
				}
		}
	});
	});
	$(".free").click(function(){
		$('.rank_list_slick').slick('unslick');
		$(".rank_list_slick div").remove();
		$(".rank_list_item").remove();
		$(".board_list_items").remove();
		$(".tab_ul a").css("color","black");
		$(this).children("a").css("color","#ee1e73");
		$(".board_top_title > span:nth-child(1)").text("자유게시판");
		$(".title_des_change").text("비커밍 커뮤니티의 자유게시판글을 볼 수 있는 게시판입니다.");
		$(".board_top_rank_title>p").text("최근 일주일 간 자유게시판에서 좋아요수와 조회수가 가장 높은 글입니다.");
		var boardcate="자유게시판";
		$('.bottom_line').animate({
		  left:150,
		  width:135
		},500);

		$.ajax({
					type:"GET",
					url:"./communitypage.php?boardcate="+boardcate,

				})

		$.ajax({
			type:"POST",
			url:"./php/communityjson.php",
			data:{boardcate:boardcate},
			dataType:"json",
			success:function(response){
				// alert(response);
				// $.each()
				var i =0;
				
				$.each(response.rank,function(key,value){
				
					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
					var new_rank = `<div class="rank_list_item">
									<div class="rank_wrap">
										<div class="rank_img_wrap">
												<img src="${value.thumbnail}" alt="img">								
										</div>
										<div class="rank_numbers">
											<p>BEST ${i+1}</p>
										</div>
										<div class="rank_info">
											<p class="rank_info_title" data-num="${value.board_num}">${value.boardtitle}</p>
											<p>BY.${value1.nickname}</p>
										
										</div>
									</div>
								</div>
									<?php
									$i++;}
									?>
							</div>`;				
					
							$(".rank_list_slick").append(new_rank);
							i++;
						}

					});	
							
				});

$('.rank_list_slick').slick({
   infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows:true,
  autoplay:true,
  prevArrow:"<button type='button' class='slick-prev pull-left prev_btn_slick'><</button>",
            nextArrow:"<button type='button' class='slick-next pull-right next_btn_slick' >></button>"
});
var j=0;
			var new_list = "";
				$.each(response.list,function(key,value){
					// alert("a");

					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
							var k=0;

							var board_hash=new Array();
							// alert(value.boardhash);
							// alert(value.boardhash.replace(/,/g, ' '));



							var ex_hash=value.boardhash.split(",");
							// replace(ex_hash,",");

							// alert(ex_hash[0]);
							// alert(ex_hash[1]);
							// alert(ex_hash[2]);
							// alert(ex_hash[3]);

							// var l = 0;
							for(var k in ex_hash){
								
									ex_hash[k].replace(/,/g, ' ');
									board_hash.push("<span># "+ex_hash[k]+"</span>");
								// alert(ex_hash[k]);
								// ex_hash[k].replace(",","");
								
								// boardhash[k].replace(",","");
							}

												// alert(value.user_id);
				new_list+=`	<div class="board_list_items">
									<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
									<img src="${value.thumbnail}" alt="img">							
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<div class="info_top_left">
											<h1 data-num='${value.board_num}'>${value.boardtitle}</h1>
										</div>
										<div class="info_top_right">
											<p>${value.first_written}</p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p>${value.bodytext}</p>
									</div>
									<div class="view_hash different">
									${board_hash.join(" ")}

									</div>
								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<img src="${value1.profile_img}" alt="img">
										</div>
									</div>
									<p class="boardnickname">${value1.nickname}</p>															
									`;
									
									if(value1.curator==1){
										new_list+=`<div class="bal">
										<div class="balloon cr_flag">
											<p>CR</p>
										</div>
									</div>`;
									}
								new_list+=`</div>
								<div class="item_icon_like">
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-eye"></i>
										</div>
										<p class="icon_info_div_count">조회수 ${value.view_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 ${value.comment_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 ${value.like_num}</p>
									</div>
								</div>
							</div>
						`;	
							// $(".board_lists_search").after(new_list);
							i++;
							j++;

							// var cu=`<div class="bal">
							// 			<div class="balloon cr_flag">
							// 				<p>CR</p>
							// 			</div>
							// 		</div>`;
							// if(value1.curator=="1"){
							// 	$(".boardnickname").after(cu);
							
							
						}
				});

				
			});
				$(".board_list_wrap_1").html(new_list);
		}
	});
	});


	$(".pr").click(function(){
		$('.rank_list_slick').slick('unslick');
		$(".rank_list_slick div").remove();
		$(".rank_list_item").remove();
		$(".board_list_items").remove();
		$(".tab_ul a").css("color","black");
		$(this).children("a").css("color","#ee1e73");
		$(".board_top_title > span:nth-child(1)").text("선물 후기 게시판");
		$(".title_des_change").text("비커밍 커뮤니티의 선물 후기 게시판글을 볼 수 있는 게시판입니다.");
		$(".board_top_rank_title>p").text("최근 일주일 간 선물 후기 게시판에서 좋아요수와 조회수가 가장 높은 글입니다.");
		var boardcate="선물 후기 게시판";
		$('.bottom_line').animate({
		  left:350,
		  width:190
		},500);
			$.ajax({
					type:"GET",
					url:"./communitypage.php?boardcate="+boardcate,
				})

				$.ajax({
			type:"POST",
			url:"./php/communityjson.php",
			data:{boardcate:boardcate},
			dataType:"json",
			success:function(response){
				// alert(response);
				// $.each()
				var i =0;
				
				$.each(response.rank,function(key,value){
				
					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
					var new_rank = `<div class="rank_list_item">
									<div class="rank_wrap">
										<div class="rank_img_wrap">
												<img src="${value.thumbnail}" alt="img">								
										</div>
										<div class="rank_numbers">
											<p>BEST ${i+1}</p>
										</div>
										<div class="rank_info">
											<p class="rank_info_title" data-num="${value.board_num}">${value.boardtitle}</p>
											<p>BY.${value1.nickname}</p>
										
										</div>
									</div>
								</div>
									<?php
									$i++;}
									?>
							</div>`;				
					
							$(".rank_list_slick").append(new_rank);
							i++;
						}

					});	
							
				});

$('.rank_list_slick').slick({
   infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows:true,
  autoplay:true,
  prevArrow:"<button type='button' class='slick-prev pull-left prev_btn_slick'><</button>",
            nextArrow:"<button type='button' class='slick-next pull-right next_btn_slick' >></button>"
});
var j=0;
			var new_list = "";
				$.each(response.list,function(key,value){
					// alert("a");

					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
							var k=0;

							var board_hash=new Array();
							// alert(value.boardhash);
							// alert(value.boardhash.replace(/,/g, ' '));



							var ex_hash=value.boardhash.split(",");
							// replace(ex_hash,",");

							// alert(ex_hash[0]);
							// alert(ex_hash[1]);
							// alert(ex_hash[2]);
							// alert(ex_hash[3]);

							// var l = 0;
							for(var k in ex_hash){
								
									ex_hash[k].replace(/,/g, ' ');
									board_hash.push("<span># "+ex_hash[k]+"</span>");
								// alert(ex_hash[k]);
								// ex_hash[k].replace(",","");
								
								// boardhash[k].replace(",","");
							}

												// alert(value.user_id);
				new_list+=`	<div class="board_list_items">
									<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
									<img src="${value.thumbnail}" alt="img">							
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<div class="info_top_left">
											<h1 data-num='${value.board_num}'>${value.boardtitle}</h1>
										</div>
										<div class="info_top_right">
											<p>${value.first_written}</p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p>${value.bodytext}</p>
									</div>
									<div class="view_hash different">
									${board_hash.join(" ")}

									</div>
								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<img src="${value1.profile_img}" alt="img">
										</div>
									</div>
									<p class="boardnickname">${value1.nickname}</p>															
									`;
									
									if(value1.curator==1){
										new_list+=`<div class="bal">
										<div class="balloon cr_flag">
											<p>CR</p>
										</div>
									</div>`;
									}
								new_list+=`</div>
								<div class="item_icon_like">
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-eye"></i>
										</div>
										<p class="icon_info_div_count">조회수 ${value.view_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 ${value.comment_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 ${value.like_num}</p>
									</div>
								</div>
							</div>
						`;	
							// $(".board_lists_search").after(new_list);
							i++;
							j++;

							// var cu=`<div class="bal">
							// 			<div class="balloon cr_flag">
							// 				<p>CR</p>
							// 			</div>
							// 		</div>`;
							// if(value1.curator=="1"){
							// 	$(".boardnickname").after(cu);
							
							
						}
				});

				
			});
				$(".board_list_wrap_1").html(new_list);
		}
	});
	});
	$(".cu").click(function(){
		$('.rank_list_slick').slick('unslick');
		$(".rank_list_slick div").remove();
		$(".rank_list_item").remove();
		$(".board_list_items").remove();
		$(".tab_ul a").css("color","black");
		$(this).children("a").css("color","#ee1e73");
		$(".board_top_title > span:nth-child(1)").text("큐레이션 후기 게시판");
		$(".title_des_change").text("비커밍 커뮤니티의 큐레이션 후기 게시판글을 볼 수 있는 게시판입니다.");
		$(".board_top_rank_title>p").text("최근 일주일 간 큐레이션 후기 게시판에서 좋아요수와 조회수가 가장 높은 글입니다.");
		var boardcate="큐레이션 후기 게시판";
		$('.bottom_line').animate({
		  left:580,
		  width:210
		},500);
		$.ajax({
					type:"GET",
					url:"./communitypage.php?boardcate="+boardcate,

				})
				$.ajax({
			type:"POST",
			url:"./php/communityjson.php",
			data:{boardcate:boardcate},
			dataType:"json",
			success:function(response){
				// alert(response);
				// $.each()
				var i =0;
				
				$.each(response.rank,function(key,value){
				
					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
					var new_rank = `<div class="rank_list_item">
									<div class="rank_wrap">
										<div class="rank_img_wrap">
												<img src="${value.thumbnail}" alt="img">								
										</div>
										<div class="rank_numbers">
											<p>BEST ${i+1}</p>
										</div>
										<div class="rank_info">
											<p class="rank_info_title" data-num="${value.board_num}">${value.boardtitle}</p>
											<p>BY.${value1.nickname}</p>
										
										</div>
									</div>
								</div>
									<?php
									$i++;}
									?>
							</div>`;				
					
							$(".rank_list_slick").append(new_rank);
							i++;
						}

					});	
							
				});

$('.rank_list_slick').slick({
   infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows:true,
  autoplay:true,
  prevArrow:"<button type='button' class='slick-prev pull-left prev_btn_slick'><</button>",
            nextArrow:"<button type='button' class='slick-next pull-right next_btn_slick' >></button>"
});
var j=0;
				var new_list = "";
				$.each(response.list,function(key,value){
					// alert("a");

					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
							var k=0;

							var board_hash=new Array();
							// alert(value.boardhash);
							// alert(value.boardhash.replace(/,/g, ' '));



							var ex_hash=value.boardhash.split(",");
							// replace(ex_hash,",");

							// alert(ex_hash[0]);
							// alert(ex_hash[1]);
							// alert(ex_hash[2]);
							// alert(ex_hash[3]);

							// var l = 0;
							for(var k in ex_hash){
								
									ex_hash[k].replace(/,/g, ' ');
									board_hash.push("<span># "+ex_hash[k]+"</span>");
								// alert(ex_hash[k]);
								// ex_hash[k].replace(",","");
								
								// boardhash[k].replace(",","");
							}

												// alert(value.user_id);
				new_list+=`<div class="board_list_items">
								<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
										<img src="${value.thumbnail}" alt="img">
																		
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<div class="info_top_left">
											<h1 data-num='${value.board_num}'>${value.boardtitle}</h1>
										</div>
										<div class="info_top_right">
											<p>${value.first_written}</p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p> ${value.bodytext}</p>
									</div>
									<div class="view_hash different">`+			
											board_hash[j]+`		
								</div>

								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<img src="${value1.profile_img}" alt="img">
										</div>
									</div>
									<p>${value1.nickname}</p>`;

									var a=value1.curator;
									if(a==1){
									
									new_list+=`<div class="bal">
										<div class="balloon cr_flag">
											<p>CR</p>
										</div>
										</div>`;
									
								}else{}
								
								
								new_list+=`</div>
								<div class="item_icon_like">
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-eye"></i>
										</div>
										<p class="icon_info_div_count">조회수 ${value.view_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 ${value.comment_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 ${value.like_num}</p>
									</div>
								</div>
							</div>
							</div>														
									`;
									
							 // $(".board_lists_search").after(new_list);
							i++;
							j++;

							// var cu=`<div class="bal">
							// 			<div class="balloon cr_flag">
							// 				<p>CR</p>
							// 			</div>
							// 		</div>`;
							// if(value1.curator=="1"){
							// 	$(".boardnickname").after(cu);
							
							
						}
				});

				
			});
				$(".board_list_wrap_1").html(new_list);
		}
	});
	});







	//설정 취소,재설정,상품보기
	$(".setting_cancel").click(function(){
		$(".poll_modal").fadeOut();
	});
	$(".reset").click(function(){
		$(".poll_body_title > p").html("비커밍 큐레이션 서비스 이용을 위한. <br> 타겟설정.");
		$(".poll_body_wrap").css("marginLeft","0%");
		$(".prev_btn").show();
		$(".next_btn").show();
		$(".setting_cancel").hide();
		$(".reset").hide();
		$(".info").hide();
		// $(".poll_body_button").css("width","41%");
		$(".poll_modal input").prop("checked",false);
		b_flag = 0;
	});

	//타겟 설정창 띄우기
	
	//이미지 슬라이드
	$('.slick_slide').slick({
		dots: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 2000,
	});
	



	$(".cancel_target").on("click", function(){
		var cancel_targetting=confirm("타겟 설정을 취소하시겠습니까?");
		if(cancel_targetting){
			$(".target").fadeOut();
			$(".question_circle").fadeIn();
			$(".curator_circle").fadeIn();
			$(".close_circle").fadeIn();
			localStorage.setItem('target', 'hide');
			localStorage.setItem('cricle', 'show');
		}else{
			return false;
		}
		
	});

	// $(".shop_item").on("click", function(){

	// 	location.href="categoryDetail.php";
	// });

	$(".bottom_bottom>ul>li").on("click", function(){
		var num=$(this).attr("data-num");
		location.href="categoryDetail.php?product_num="+num;
	});
	//메인페이지 클릭
	$(document).on("mouseover",".info_top_left>h1", function(){
		$(this).css("cursor", "pointer");
		$(this).css("text-decoration", "underline");
	});
	$(document).on("mouseleave",".info_top_left>h1", function(){
		$(this).css("text-decoration", "");
	});

	$(document).on("mouseover", ".rank_info_title", function(){
		$(this).css("cursor", "pointer");
		$(this).css("text-decoration", "underline");
	});
	$(document).on("mouseleave", ".rank_info_title", function(){
		$(this).css("text-decoration", "");
	});

	$(".pink_img").on("click", function(){
		var num=$(this).attr("data-num");
		// alert(num);
		location.href="./categoryDetail.php?product_num="+num;
	});

	
	// $(".rank_info_title").on("click",function(){
	// 	var boardnum=$(this).attr("data-num");
	// 	location.href="./communityboardview.php?boardnum="+boardnum;
	// });

	$(document).on("click",".rank_info_title", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./communityboardview.php?boardnum="+boardnum;
	});
	//이전글 클릭
	$(".prev_btn_page").on("click", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./communityboardview.php?boardnum="+boardnum;
	});
	$(".prev_title>p").on("click", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./communityboardview.php?boardnum="+boardnum;
	});
	$(".next_title>p").on("click", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./communityboardview.php?boardnum="+boardnum;
	});
	//다음 글 글릭
	$(".next_btn_page").on("click", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./communityboardview.php?boardnum="+boardnum;
	});


	$(".main_cupro>img").on("click", function(){
		var curator_num=$(this).attr("data-num");
		location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	$(document).on("click", ".info_top_left>h1", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./communityboardview.php?boardnum="+boardnum;
	});
	
	// $(".item_img_wrap>img").on("click",function(){
	// 	location.href="communityboardview.php";
	// });

	//검색하기 
	$(".search_circle").on("click", function(){
			var search_key=$(".search_input").val();
			if(search_key!=""){
			location.href="search_page.php?search_key="+search_key;
			}else{
				alert("검색어를 입력하세요.");
				return false;
			}
	});
	//검색 키
	$(".search_input").keydown(function(e){

		if(e.keyCode==13){
			var search_key=$(".search_input").val();
			if(search_key!=""){
			location.href="search_page.php?search_key="+search_key;
			}else{
				alert("검색어를 입력하세요.");
				return false;
			}
		}
	});

	//스크롤 스르륵
	$('.top_circle').click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 400 );
		return false;
	});

	//게시판 해시태그 처리
	$("#tags").inputTags({
	});
	$(".inputTags-field").attr("placeholder", "태그는 ','로 구별됩니다.");
	$(".page_table_inputs>.inputTags-list").css("background","rgba(255,255,255,0.1)");
	$(".page_table_inputs>.inputTags-list").css("border","none");
	// $(".page_table_inputs>.inputTags-list>.inputTags-field::placeholder").css("color","white");
	$(".page_table_inputs>.inputTags-list").css("border-bottom","4px solid white");
	// $(".page_table_inputs>.inputTags-list>input").css("width", "150px");
	$(".list_go").on("click", function(){
		location.href="communitypage.php";
	});

	//게시판 글 DB작업
	// document.on("click", ".board_success", function(){

		//게시판 수정 창
		var board_category_mod=$(".get_cate").text();

		if(board_category_mod=="전체게시판 "){
			$(".cate_select option[value='전체게시판']").attr("selected", "selected");
		}else if(board_category_mod=="자유게시판"){
			$(".cate_select option[value='자유게시판']").attr("selected", "selected");
		}else if(board_category_mod=="선물 후기 게시판"){
			$("..cate_select option[value='선물 후기 게시판']").attr("selected", "selected");
		}else if(board_category_mod=="큐레이션 후기 게시판"){
			$(".cate_select option[value='큐레이션 후기 게시판']").attr("selected","selected");
		}


	// })
	$(".board_success").on("click", function(){
		// alert("aa");	
		CKupdate();
		var boardtitle=$(".wr_title").val();
		// alert(boardtitle);
		var bodytext=$(".wr_bodytext").val();
		// alert(bodytext);
		var tagval=$("#tags").val();
		// alert(tagval);
		var pw=$(".wr_pw").val();
		var pw1=$(".wr_pw_con").val();
		// alert(pw);
		var cate=$(".select_body>select>option:selected").val();
		// alert(cate);
		var writer=$(".writer").attr("data-id");
			// alert(writer);
			if(boardtitle!="" && bodytext!="" && pw !="" && cate!="" &&writer!=""){
				if(pw==pw1){
								$.ajax({
						type:"POST",
						url:"./php/board_insert.php",
						data:{boardtitle:boardtitle, bodytext:bodytext, tagval:tagval, writer, cate, pw:pw},
						success:function(response){
								// alert(response);
								if(response=="success"){
									alert("게시물 등록 성공!");
									location.href="./communitypage.php";
								}else{
									alert("게시물 등록 실패!");
									return false;
								}
						}
				});
			}else{
				alert("비밀번호가 일치하지 않습니다.");
			}
			}else{
				alert("제목, 내용, 비밀번호는 반드시 입력해주세요.");
				return false;
			}
	});

	//글쓰기 버튼
	$(".board_write_btn").click(function(){
		var id=$(this).attr("data-id");
		if(id!=""){
			location.href="./board_writing.php";
		}else{
			alert("로그인 하십시오.");
			return false;
		}					
	});

	//게시글 삭제
	$(".view_del_btn").on("click", function(){
		var board_num=$(this).attr("data-num");
		var answer=confirm("해당 게시글을 삭제하시겠습니까?");

		if(answer){
			$.ajax({
				type:"POST",
				url:"./php/board_delete.php",
				data:{board_num:board_num},
				success:function(response){
					if(response=="success"){
						alert("게시글 삭제 성공!");
						location.href="./communitypage.php";
					}else{
						alert("게시글 삭제 실패!");
						return false;
					}
				}
			})
		}

	});

	//게시판 글 수정하기
	$(".view_modif_btn").on("click", function(){
		var boardnum=$(this).attr("data-num");
		location.href="./board_modified.php?boardnum="+boardnum;
	});	



	//댓글 등록하기
	$(".comment_insert").on("click", function(){
		var comment_body=$(".comment_top_body>textarea").val();
		var board_num=$("#board_num_hide").text();
		var comment_writer=$("#login_person").text();
		
		if(comment_body!=""){
			$.ajax({
				type:"POST",
				url:"./php/comment_insert.php",
				data:{comment_body:comment_body, board_num:board_num, comment_writer:comment_writer},
				success:function(response){
					if(response=="success"){
						location.reload();
					}else{
						return false;
					}
				}
			})
		}else{
			alert("댓글 내용을 입력하세요.");
		}

	});
	//상품리스트로 돌아가기
	$(".go_list_btn").on("click", function(){
		location.href="./category.php";
	});

	//프로필 업로드
	$("#ex_file").change(function(){
		var id=$(this).attr("data-id");
		var formData = new FormData();
		var file_name=$(this)[0].files[0];
		formData.append("service_image",file_name);
		// var source_img= new Array();
		// source_img=file_namee.split("\");
		// alert(source_img);
		// alert(id);
		$.ajax({
		dataType:"json",
		 url: './php/profile_update.php?id='+id,
		 data: formData,
		 processData: false, 
		 contentType: false,
		 type: 'POST', 
		 success: function(data){ 
		 	if(data.success!=false){
		 		alert("성공!");
		 		// alert(data.width);
		 		// location.reload();
		 		$(".profile_circle img").attr("src", data.url);
		 	}else{
		 		alert(data.error);

		 	}
		}
	})
});

		//마이페이지 수정 사진업로드
		$("#ex_mypagefile").change(function(){
				var id=$(this).attr("data-id");
				var formData= new FormData();
				var file_name=$(this)[0].files[0];
				formData.append("service_image", file_name);
				$.ajax({
						dataType:"json",
						url:"./php/mypage_modify.php?id="+id,
						data:formData,
						processData: false, 
				 		contentType: false,
		 				type: 'POST', 
			 			success: function(data){ 
						if(data.success!=false){
					 	alert("성공!");
			 				// alert(data.width);
			 				// location.reload();
			 				$(".mypagetheme img").attr("src", data.url);
			 				$(".main_img").attr("src", data.url);
			 			}else{
			 				alert(data.error);
			 			}
					}
				})
		});

		//마이페이지 수정 모달 사진(프로필) 업로드
		$("#ex_page_file").change(function(){
				var id=$(this).attr("data-id");
				var formData= new FormData();
				var file_name=$(this)[0].files[0];
				formData.append("service_image", file_name);
				$.ajax({
						dataType:"json",
						url:"./php/profile_update.php?id="+id,
						data:formData,
						processData: false, 
				 		contentType: false,
		 				type: 'POST', 
			 			success: function(data){ 
						if(data.success!=false){
					 	alert("성공!");
			 				// alert(data.width);
			 				// location.reload();
			 				$(".profile_img_div img").attr("src", data.url);
			 				$(".profile_circle img").attr("src", data.url);
			 			}else{
			 				alert(data.error);
			 			}
					}
				})
		});

		//마이페이지 수정 모달 페이지 사진 업로드
		$("#ex_right_files").change(function(){
				var id=$(this).attr("data-id");
				var formData= new FormData();
				var file_name=$(this)[0].files[0];
				formData.append("service_image", file_name);
				$.ajax({
						dataType:"json",
						url:"./php/mypage_modify.php?id="+id,
						data:formData,
						processData: false, 
				 		contentType: false,
		 				type: 'POST', 
			 			success: function(data){ 
						if(data.success!=false){
					 	alert("성공!");
			 				// alert(data.width);
			 				// location.reload();
			 				$(".mypage_img_wrap img").attr("src", data.url);
			 				$(".main_img").attr("src", data.url);
			 			}else{
			 				alert(data.error);
			 			}
					}
				})
		});
		//마이페이지 발신 메시지함으로 변화
		$(".send_message").on("click", function(){
			$(".reply_item").remove();
			$(this).hide();
			$(".receive_message").show();
			var sender_id=$(this).attr("data-id");
			var send_cnt=$(this).attr("data-cnt");			
			var box_desc="총 ";
			box_desc+=send_cnt;
			box_desc+="개의 발신 메시지가 있습니다.";
			$(".messageboxtitle").text("나의 발신 메시지함");
			$(".boxtitledesc").text(box_desc);

			var message_box="";

			$.ajax({
				type:"POST",
				url:"./php/send_message_all.php",
				data:{sender_id:sender_id},
				dataType:"json",
				success:function(response){
					// alert(response.mem);
					var k =0;
					$.each(response.message, function(key, value){
						// alert(response.mem);
						$.each(response.mem, function(key, value1){
							k++;
							// alert("a");
							message_box+=`<div class="reply_item">
									<div class="reply_item_check">
										<input type="checkbox" id="checkbox_item${k}" name="check_msg" data-num="${value.message_num}" data-id="${value.receiver_id}">
										<label for="checkbox_item${k}"></label>
									</div>
									<div class="reply_item_title">
										<p data-num="${value.message_num}">${value.message_title}</p>
									</div>
									<div class="reply_item_writer">
										<p>${value1.name1}</p>
									</div>
									<div class="reply_item_date">
										<p>${value.send_date}</p>
									</div>
									<div class="reply_item_check_this">`;
									if(value.confirm_flag==0){

										message_box+=`<p>미확인</p>`;
									}else{
										message_box+=`<p>${value.get_date}</p>`;
									}

										message_box+=`</div></div>`;
						
						});				
					});
					$(".mypage_reply_body").html(message_box);
					// alert(k);
				},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
			})
		});

	//글만 보기
	$(document).on("click",".text_only",function(){
		// $(".mypage_write").show();
		$(".messages").css("font-weight","normal");
		$(".messages").css("color","black");
		var id=$(this).attr("data-id");
		
		$(".item_board").remove();
		// $(".mypage_reply").remove();
		// $(".mypage_orderlist").remove();
		// $(".mypage_shoopingback").remove();
		// $(".mypage_person").remove();
		// $(".mypage_theme").remove();

		$(".mypage_right_bottom > div").hide();
		$(".mypage_write").css("display","block");
		// $(".mypage_orderlist").hide();
		// $(".mypage_shoopingback").hide();
		// $(".mypage_person").hide();
		// $(".mypage_theme").hide();

		var status=$(this).text();
		if(status=="모아보기"){
			$(".text_onlybtn").remove();
			
		}else{
			$(".text_only").css("color","#ee1e72");
			$(".text_only").css("font-weight","bold");
			// $(this).css("background-color","#7da7d9");
			// $(this).css("opacity","0.7")
			$(".text_onlybtn").remove();
		}
		// alert(id);

		$.ajax({
			type:"POST",
			url:"./php/textonly.php",
			data:{id:id},
			dataType:"json",
			success:function(response){
			// var k=0;
			$(".item_board").remove();
			var j=0;
			var new_list = "";
				$.each(response.board,function(key,value){
					// alert("a");

					$.each(response.member, function(key, value1){
						
						if(value.user_id==value1.id){
							var k=0;

							var board_hash=new Array();
							// alert(value.boardhash);
							// alert(value.boardhash.replace(/,/g, ' '));
							var ex_hash=value.boardhash.split(",");
							// replace(ex_hash,",");

							// alert(ex_hash[0]);
							// alert(ex_hash[1]);
							// alert(ex_hash[2]);
							// alert(ex_hash[3]);

							// var l = 0;
							for(var k in ex_hash){
								
									ex_hash[k].replace(/,/g, ' ');
									board_hash.push("<span># "+ex_hash[k]+"</span>");
								// alert(ex_hash[k]);
								// ex_hash[k].replace(",","");
								
								// boardhash[k].replace(",","");
							}

												// alert(value.user_id);
				new_list+=`	<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
									<img src="${value.thumbnail}" alt="img" class="thumbnail_class">							
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<div class="info_top_left">
											<h1 data-num='${value.board_num}'>${value.boardtitle}</h1>
										</div>
										<div class="info_top_right">
											<p>${value.first_written}</p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p>${value.bodytext}</p>
									</div>
									<div class="view_hash different">
									${board_hash.join(" ")}

									</div>
								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<img src="${value1.profile_img}" alt="img">
										</div>
									</div>
									<p>${value1.nickname}</p>															
									`;
									
									if(value1.curator==1){
										new_list+=`<div class="bal_1">
										<div class="balloon_1 cr_flag">
											<p>CR</p>
										</div>
									</div>`;
									}else{};
								new_list+=`</div>
								<div class="item_icon_like">
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-eye"></i>
										</div>
										<p class="icon_info_div_count">조회수 ${value.view_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 ${value.comment_num}</p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 ${value.like_num}</p>
									</div>
								</div>
							</div>
						`;	
						// class_img = "thumbnail_class";
							// i++;
							j++;							
							
						}
				});

				
			});
			
				
				// var size=class_img.width();
				// alert(size);
				$(".mypage_write_bottom").append(new_list);
				var imgsize=$(".thumbnail_class");
					if(imgsize.width()>=imgsize.height()){
						imgsize.height("138px");
						imgsize.width("auto");
					}else{
						imgsize.width("138px");
						imgsize.height("auto");
					}
			},
		})
	});

	$(document).on("click",".message_all",function(){
		var id=$(this).attr("data-id");
		$(".mypage_reply").css("display","block");
		$(".messageboxtitle").text("나의 전체 메시지함");
		// $(".mypage_reply").show();
		$(".mypage_write").hide();
		$(".mypage_orderlist").hide();
		$(".mypage_shoopingback").hide();
		$(".mypage_person").hide();
		$(".mypage_theme").hide();

		var message_box="";

		$.ajax({
			type:"POST",
			url:"./php/message_all.php",
			data:{id:id},
			dataType:"json",
			success:function(response){
					// alert("aa");
					// alert(response.message);
					var k =0;
					$.each(response.message, function(key, value){
						// alert(response.mem);
						// alert("a");
						$.each(response.mem, function(key, value1){
							k++;

							// alert("a");
							message_box+=`<div class="reply_item">
									<div class="reply_item_check">
										<input type="checkbox" id="checkbox_item${k}" name="check_msg" data-num="${value.message_num}" data-id="${value.receiver_id}">
										<label for="checkbox_item${k}"></label>
									</div>
									<div class="reply_item_title" >
										<p data-num="${value.message_num}">${value.message_title}</p>
									</div>
									<div class="reply_item_writer">
										<p>${value.sender_id}</p>
									</div>
									<div class="reply_item_date">
										<p>${value.send_date}</p>
									</div>
									<div class="reply_item_check_this">`;
									if(value.confirm_flag==0){

										message_box+=`<p>미확인</p>`;
									}else{
										message_box+=`<p>${value.get_date}</p>`;
									}

										message_box+=`</div></div>`;
						
						});				
					});
					$(".mypage_reply_body").html(message_box);
					$(".messages").css("font-weight","bold");
					$(".messages").css("color","#ee1e72");
			}


		})
	});

	//메시지함 버튼
	$(document).on("click", ".messages", function(){
			$(".text_only").css("font-weight","normal");
			$(".text_only").css("color","black");

			var id=$(this).attr("data-id");
		$(".messageboxtitle").text("나의 전체 메시지함");
			// $(".reply_item").remove();
		$(".mypage_right_bottom>div").hide();
		$(".mypage_reply").show();

		var message_box="";

		$.ajax({
			type:"POST",
			url:"./php/message_all.php",
			data:{id:id},
			dataType:"json",
			success:function(response){
					// alert("aa");
					// alert(response.message);
					var k =0;
					$.each(response.message, function(key, value){
						// alert(response.mem);
						// alert("a");
						$.each(response.mem, function(key, value1){
							k++;

							// alert("a");
							message_box+=`<div class="reply_item">
									<div class="reply_item_check">
										<input type="checkbox" name="check_msg" id="checkbox_item${k}" data-num="${value.message_num}" data-id="${value.receiver_id}">
										<label for="checkbox_item${k}"></label>
									</div>
									<div class="reply_item_title" >
										<p data-num="${value.message_num}">${value.message_title}</p>
									</div>
									<div class="reply_item_writer">
										<p>${value.sender_id}</p>
									</div>
									<div class="reply_item_date">
										<p>${value.send_date}</p>
									</div>
									<div class="reply_item_check_this">`;
									if(value.confirm_flag==0){

										message_box+=`<p>미확인</p>`;
									}else{
										message_box+=`<p>${value.get_date}</p>`;
									}

										message_box+=`</div></div>`;
						
						});				
					});
					$(".mypage_reply_body").html(message_box);
					$(".messages").css("font-weight","bold");
					$(".messages").css("color","#ee1e72");
			}


		})

	});		


	//수신메시지함 토글
	$(".receive_message").on("click", function(){
			$(".reply_item").remove();
			$(this).hide();
			$(".send_message").show();
			var receiver_id=$(this).attr("data-id");
			var receive_cnt=$(this).attr("data-cnt");			
			var box_desc="총 ";
			box_desc+=receive_cnt;
			box_desc+="개의 수신 메시지가 있습니다.";
			$(".messageboxtitle").text("나의 수신 메시지함");
			$(".boxtitledesc").text(box_desc);

			var message_box="";

			$.ajax({
				type:"POST",
				url:"./php/receive_message_all.php",
				data:{receiver_id:receiver_id},
				dataType:"json",
				success:function(response){
					// alert(response.mem);
					var k =0;
					$.each(response.message, function(key, value){
						// alert(response.mem);
						$.each(response.mem, function(key, value1){
							k++;
							// alert("a");
							message_box+=`<div class="reply_item">
									<div class="reply_item_check">
										<input type="checkbox" id="checkbox_item${k}" name="check_msg" data-num="${value.message_num}" data-id="${value.receiver_id}">
										<label for="checkbox_item${k}"></label>
									</div>
									<div class="reply_item_title">
										<p data-num="${value.message_num}">${value.message_title}</p>
									</div>
									<div class="reply_item_writer">
										<p>${value.sender_id}</p>
									</div>
									<div class="reply_item_date">
										<p>${value.send_date}</p>
									</div>
									<div class="reply_item_check_this">`;
									if(value.confirm_flag==0){

										message_box+=`<p>미확인</p>`;
									}else{
										message_box+=`<p>${value.get_date}</p>`;
									}

										message_box+=`</div></div>`;
						
						});				
					});
					$(".mypage_reply_body").html(message_box);
					// alert(k);
				},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
			})
		});

	//발신 메시지함 토글
		$(".send_message").on("click", function(){
			$(".reply_item").remove();
			$(this).hide();
			$(".receive_message").show();
			var sender_id=$(this).attr("data-id");
			var send_cnt=$(this).attr("data-cnt");			
			var box_desc="총 ";
			box_desc+=send_cnt;
			box_desc+="개의 발신 메시지가 있습니다.";
			$(".messageboxtitle").text("나의 발신 메시지함");
			$(".boxtitledesc").text(box_desc);

			var message_box="";

			$.ajax({
				type:"POST",
				url:"./php/send_message_all.php",
				data:{sender_id:sender_id},
				dataType:"json",
				success:function(response){
					// alert(response.mem);
					var k =0;
					$.each(response.message, function(key, value){
						// alert(response.mem);
						$.each(response.mem, function(key, value1){
							k++;
							// alert("a");
							message_box+=`<div class="reply_item">
									<div class="reply_item_check">
										<input type="checkbox" id="checkbox_item${k}" name="check_msg" data-num="${value.message_num}" data-id="${value.receiver_id}">
										<label for="checkbox_item${k}"></label>
									</div>
									<div class="reply_item_title" >
										<p data-num="${value.message_num}">${value.message_title}</p>
									</div>
									<div class="reply_item_writer">
										<p>${value.receiver_id}</p>
									</div>
									<div class="reply_item_date">
										<p>${value.send_date}</p>
									</div>
									<div class="reply_item_check_this">`;
									if(value.confirm_flag==0){

										message_box+=`<p>미확인</p>`;
									}else{
										message_box+=`<p>${value.get_date}</p>`;
									}

										message_box+=`</div></div>`;
						
						});				
					});
					$(".mypage_reply_body").html(message_box);
					// alert(k);
				}
				// ,error:function(request,status,error){
    //     alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
    //    }
			})
		});

		//쪽지 쓰기
		$(".reply_search_user").on("keyup", function(){
			$(".reply_node").remove();
			var find_user=$(this).val();
			if(find_user!=""){
				$.ajax({
					type:"POST",
					url:"./php/search_member.php",
					data:{find_user:find_user},
					dataType:"json",
					success:function(response){
						$.each(response.member, function(key, value){
							var mem_search_result=`<div class="reply_node">
						<div class="node_porfile">
							<div class="circle node_porfile_circle">
								<div class="circle node_in_circle">
									<img src="${value.profile_img}" alt="img">
								</div>
							</div>
						</div>
						<div class="node_info">
							<p class="id_or_name" data-img="${value.profile_img}"">${value.name1}(`;

							mem_search_result+=`${value.id1}`;
							mem_search_result+=`) </p>
							<p class="reply_email">${value.email}</p>
						</div>
						<div class="node_check">
							<div class="circle checkcircle fail_check">
								<i class="fas fa-check"></i>
							</div>
							<div class="circle checkcircle success_check" style="display:none;" data-state="1">
								<i class="fas fa-check"></i>
							</div>
							
						</div>
					</div>`;
						
						$(".reply_items").prepend(mem_search_result);

						});				
					}
			})
			}

		});

	//쪽지 읽기
	$(document).on("click", ".reply_item_title>p", function(){
		var num=$(this).attr("data-num");
		var receiver=$(this).attr("data-id");
		$(".my_msg").remove();
		var this_num=$(this);
		// $(".repy_view_modal_left_top").text("");
		var cate=$(".messageboxtitle").text();
		// alert(cate);
		$(".reply_view_modal").show();

			if(cate=="나의 수신 메시지함"){
				var arr=new Array();

		$.ajax({
			type:"POST",
			url:"./php/reply_sel.php",
			data:{num:num,receiver:receiver},
			dataType:"json",
			success:function(response){
				// alert("aa");
				$.each(response.message, function(key, value){
					var title=" "+value.message_title;
					var name=value.sender_name;
					var sender=value.sender_id;
					var bodytext=value.message_body;
					var p_img=value.sender_img;
					var num=value.message_num;
					var get=value.get_date;
					// alert(get);
					$(".reply_view_sendback").text("답장하기");
					$(".reply_view_pp").html("<p class='message_sender'>"+name+"</p>");
					$(".sender_input").html("<p class='msg_title'>"+title+"</p>");
					$(".reply_bodytext_view_div_main").html("<p class='message_contents'>"+bodytext+"</p>");
					$(".reply_view_modal_in_circle>img").attr("src", p_img);
					$(".reply_view_delete").attr("data-num",num);
					$(".reply_view_sendback").attr("data-id",sender);
					if(get){
								this_num.parent(".reply_item_title").parent(".reply_item").children(".reply_item_check_this").html("<p>"+get+"</p>");
							}else{

							}
			
					// $(".reply")
					// $(".my_msg>p").remove();
				
				});
							
			}

		})
			}else{
				var receiver=$(this).attr("data-id");
				$(".my_msg>p").remove();
				$.ajax({
				type:"POST",
				url:"./php/reply_sel.php",
				data:{num:num, receiver:receiver},
				dataType:"json",
				success:function(response){
				// alert("aa");
				$.each(response.message, function(key, value){
					var title=" "+value.message_title;
					var name=value.receiver_name;
					var receiver=value.receiver_id;
					var bodytext=value.message_body;
					var p_img=value.receiver_img;
					var sender=value.sender_id;
					var sender_name=value.sender_name;
					var num=value.message_num;
					var get=value.get_date;

					$(".reply_view_pp").html("<p class='message_sender'>"+name+"</p>");
					$(".sender_input").html("<p class='msg_title'>"+title+"</p>");
					$(".reply_bodytext_view_div_main").html("<p class='message_contents'>"+bodytext+"</p>");
					$(".reply_view_modal_in_circle>img").attr("src", p_img);
					$(".reply_view_sendback").text("또보내기");

					var text=`<div class="my_msg"><p>${sender_name}님께서 보내신 메시지 입니다.</p></div>`;
					$(".repy_view_modal_left_top").append(text);
					$(".repy_view_modal_left_top").css("height", "140px");
					$(".my_msg").css("height", "80px");
					$(".my_msg>p").css("line-height","60px");
					$(".reply_view_delete").attr("data-num",num);
					$(".reply_view_sendback").attr("data-id",receiver);

					this_num.parent(".reply_item_title").parent(".reply_item").children(".reply_item_check_this").html("<p>"+get+"</p>");
					
				});
			}
			})
			}
		
	});	

	//쪽지 삭제하기
	$(document).on("click",".reply_view_delete", function(){
		var msg_num=$(this).attr("data-num");
		var answer=confirm("정말로 메시지를 삭제하시겠습니까?");
		if(answer){
			$.ajax({
				type:"POST",
				url:"./php/message_del.php",
				data:{msg_num:msg_num},
				success:function(response){
					$(".reply_view_modal").hide();
					location.reload();
					// $(".reply_modal").show();
				}
			})
		}else{

		}
	});
	//쪽지 답장하기
	$(document).on("click",".reply_view_sendback", function(){
		var receiver=$(this).attr("data-id");
		// alert(receiver);
		$(".reply_view_modal").hide();
		$(".reply_modal").show();
		
		
			$.ajax({
				type:"POST",
				url:"./php/msg_g.php",
				data:{receiver:receiver},
				dataType:"json",
				success:function(response){
					
					$.each(response.member, function(key, value){
						var name=value.name1;
						var id=value.id1;
						var img=value.profile_img;
						// alert(img);
						$(".payer_input").val(name+"("+id+")");
						$(".getterimg>img").attr("src",img);
					});
					// $(".reply_modal").show();
				}
			})			
	});

	//쪽지 모달 닫기 - x 창
	$(".reply_view_close_circle").on("click", function(){
		$(".reply_view_modal").hide();
	});


	//쪽지 선택 삭제
	$(document).on("click", ".message_select_del", function(){
		var i="";
		// $(this).$(".body_list_item").remove();
		var answer=confirm("선택한 쪽지를 정말로 삭제하시겠습니까?");

		if(answer){

		$(".reply_item_check>input:checkbox[name='check_msg']").each(function(){
			// count_tp[r]=$(this).parent(".item_check").parent(".body_list_item").children(".item_spinner").children(".count").val();
		
		if($(this).prop("checked")==true){
			$(this).parent(".reply_item_check").parent(".reply_item").remove();
			i=i+$(this).attr("data-num")+",";
		}	
	});
			msg_del_p=i.split(",");
			var json_msg=JSON.stringify(msg_del_p);

			$.ajax({
				type:"POST",
				url:"./php/msg_sel_delete.php",
				data:{data:json_msg},
				success:function(response){
					location.reload();
				}
			})
		}
	});

	//유저 리스트선택
	$(document).on("click", ".fail_check", function(){
		$(this).hide();
		$(this).parent(".node_check").children(".success_check").show();
		$(this).parent(".node_check").parent(".reply_node").children(".node_info").children(".id_or_name").addClass("sel_user_id");
		// $(this).parent(".cuator_check").children(".success_check").show();
		// $(this).parent(".cuator_check").parent(".reply_node").children(".node_info").children(".id_or_name").addClass("sel_user_id");
	});	
	//유저 
	$(document).on("click",".reply_comp_btn", function(){

		var current_reply=$(".payer_input").val();
		var select=$(".sel_user_id").text();
		var receiver_img=$(".sel_user_id").attr("data-img");

		select+=$(".sel_user_email").text();
		// alert(select);
		// alert(getter);
		var sel_array=new Array();
		sel_array=select.split(" ");
		// alert(sel_array);
		current_reply+=sel_array;
		if(select !=""){
			$(".payer_input").val(current_reply);
			$(".reply_modal_right").removeClass("fadeInLeft");
 			$(".reply_modal_right").addClass("fadeOutLeft");
 			$(".getterimg>img").attr("src", receiver_img);
 			select="";
		}else{
			alert("메시지를 받을 대상을 검색하여 선택하세요.");
		}
	});

	//큐레이터 뷰페이지에서 자동 수신인 설정 기능
	$(".title_message_circle").on("click", function(){
		var cu_id=$(this).attr("data-id");
		var cu_img=$(this).attr("data-img");
		$(".reply_modal").css("display","block");
		$(".payer_input").val(cu_id+",");
		$(".getterimg>img").attr("src", cu_img);

	});

	//메시지db저장
	$(".reply_success").on("click", function(){
		var send=$(".sender_input").attr("placeholder");
		var qnum=$(this).data("qnum");
		//아이디만 추출
		sender=send.split("(");
		var sendermod=sender[1].replace(")","");
		// alert(sendermod);
		var receive=$(".payer_input").val();
		receiver=receive.split("(");
		if(receiver[1]){
			var receivermo=receiver[1].replace(")","");
			receivermod=receivermo.replace(",","");
		}else{
			receivermod=$(".payer_input").val();

			}

		var messagetitle=$(".title_input").val();
		var messagebody=$(".reply_bodytext_main").val();

		if(sendermod==""||receiver==""||messagetitle==""||messagebody==""){
			alert("입력되지 않은 사항이 있습니다.");
		}else{
			
			if(qnum==""){
				$.ajax({
				type:"POST",
				url:"./php/message_insert.php",
				data:{sendermod:sendermod,receivermod:receivermod, messagetitle:messagetitle, messagebody:messagebody},
				success:function(response){
					// alert(response);
					if(response=="receiver_not_exist"){
						alert("수신인 정보가 올바르지 않습니다.");
					}else if(response=="success"){
									alert("메시지 전송 완료!");
									$(".reply_modal_right").removeClass("fadeOutLeft");
									$(".reply_modal_right").hide();
									$(".reply_modal_right").removeClass("fadeOutRight");
									$(".reply_input ").val("");
							 		$('.reply_bodytext_main').val("");
							 		$(".reply_modal").stop().fadeOut();
							 		location.reload();
					}else{
						alert("메시지 전송 실패!");
					}
				}
			});

			}else{
				// alert("aa");
				$.ajax({
				type:"POST",
				url:"./php/message_insert.php",
				data:{sendermod:sendermod,receivermod:receivermod, messagetitle:messagetitle, messagebody:messagebody},
				success:function(response){
					// alert(response);
					if(response=="receiver_not_exist"){
						alert("수신인 정보가 올바르지 않습니다.");
					}else if(response=="success"){
						// alert()
						$.ajax({
							type:"POST",
							url:"./php/qna_answer_insert.php",
							data:{sendermod:sendermod,messagetitle:messagetitle, messagebody:messagebody, qnum:qnum},
							success:function(data){
								// alert("aa");
								if(data=="success"){
									alert("메시지 전송 완료!");
									$(".reply_modal_right").removeClass("fadeOutLeft");
									$(".reply_modal_right").hide();
									$(".reply_modal_right").removeClass("fadeOutRight");
									$(".reply_input ").val("");
							 		$('.reply_bodytext_main').val("");
							 		$(".reply_modal").stop().fadeOut();
							 		location.reload();
								}else{
									alert("실패");
									return false;
								}
							},error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
						})								
					}else{
						alert("메시지 전송 실패!");
					}
				}
			});
			}

			
		}
	});

		//큐레이터페이지 사진 수정 업로드
		$("#ex_curatorpagefile").change(function(){
				var id=$(this).attr("data-id");
				var formData= new FormData();
				var file_name=$(this)[0].files[0];
				formData.append("service_image", file_name);
				$.ajax({
						dataType:"json",
						url:"./php/curatorpage_modify.php?id="+id,
						data:formData,
						processData: false, 
				 		contentType: false,
		 				type: 'POST', 
			 			success: function(data){ 
						if(data.success!=false){
					 	alert("성공!");
			 				// alert(data.width);
			 				// location.reload();
			 				$(".curatorpagetheme img").attr("src", data.url);
			 			}else{
			 				alert(data.error);
			 			}
					}
				})
		});

		$("#ex_curatorpagefile").change(function(){
				var id=$(this).attr("data-id");
				var formData= new FormData();
				var file_name=$(this)[0].files[0];
				formData.append("service_image", file_name);
				$.ajax({
						dataType:"json",
						url:"./php/curatorpage_modify.php?id="+id,
						data:formData,
						processData: false, 
				 		contentType: false,
		 				type: 'POST', 
			 			success: function(data){ 
						if(data.success!=false){
					 	alert("성공!");
			 				// alert(data.width);
			 				// location.reload();
			 				$(".curatorpagetheme img").attr("src", data.url);
			 			}else{
			 				alert(data.error);
			 			}
					}
				})
		});

		$("#ex_curator_page_imgfile").change(function(){
				var id=$(this).attr("data-id");
				var formData= new FormData();
				var file_name=$(this)[0].files[0];
				formData.append("service_image", file_name);
				$.ajax({
						dataType:"json",
						url:"./php/curatorpage_modify.php?id="+id,
						data:formData,
						processData: false, 
				 		contentType: false,
		 				type: 'POST', 
			 			success: function(data){ 
						if(data.success!=false){
					 	alert("성공!");
			 				// alert(data.width);
			 				// location.reload();
			 				$(".main_img").attr("src", data.url);
			 				$(".page_img img").attr("src", data.url);
			 			}else{
			 				alert(data.error);
			 			}
					}
				})
		});



		//마이페이지 수정시 
			var currentok=0;
		$(".curent_pw").on("keyup", function(){
			var nowpw=$(".cur_pw").text();
			var changepw=$(this).val();
			
			if(nowpw==changepw){
				$(this).css("border-bottom", "3px solid white");
				currentok=1;
			}else{
				$(this).css("border-bottom", "3px solid red");
				currentok=0;
			}
		});
		$(".update_pw_cf").on("keyup", function(){
			var updatepw=$(".update_pw").val();
			var updatecon=$(this).val();
			if(updatepw==updatecon){
				$(this).css("border-bottom", "3px solid white");
			}else{
				$(this).css("border-bottom", "3px solid red");
			}
		});

		//마이페이지 수정
		$(".update_success").on("click", function(){
			// var page_img=$(".").val();
			var nickname=$(".inputsnick").val();
			var curator_flag=$('input[name="cu_check"]:checked').val();
			var address1=$(".adress_one").val();
			var address2=$(".adress_two").val();
			var address=address1+','+address2;
			var cu_pw=$(".current_pw").css("border-bottom");
			var new_pw=$(".update_pw").val();
			var new_pwcon=$(".update_pw_cf").val();
			var hobby_new="";
			var i=0;
			$("input[name='hobby_up']:checked").each(function() {
				  hobby_new += $(this).val()+",";
				  i++; 
			});
			hobby_new +=$(".hobby_etc").val();
			if(currentok==1){
				if(nickname!=""&&curator_flag!=""&address!=""&&hobby_new!=""&&new_pw!=""){
					// alert(hobby_new);
					$.ajax({
						// alert(hobby_new);
						type:"POST",
						url:"./php/profile_allupdate.php",
						data:{nickname:nickname, curator_flag:curator_flag, new_pw:new_pw, hobby_new:hobby_new, address:address},
						success:function(response){
								// alert(response);
							if(response=="success"){
								alert("나의 정보 수정 성공!");
								$(".my_info_update_modal").hide();
							}else{
								alert("나의 정보 수정 실패!");
								return false;
							}
						}
					})
				}else{
					alert("모든 정보를 기입하셔야 합니다.");
				}
			}else{
				alert("현재 비밀번호가 잘못 입력되었습니다.");
			}			
		});

		//큐레이터 페이지 수정
		$(".setting_success").on("click", function(){
			var title=$(".infso_text").val();
			var tags=$(".page_table_inputs #tags").val();
			var count_pu=$("input[name='cu_puborpri']:checked").val();
			var success_pu=$("input[name='radio2']:checked").val();
			var point_pu=$("input[name='radio3']:checked").val();
			if(title!=""&&tags!=""&&count_pu!=""&&success_pu!=""&&point_pu!=""){
				$.ajax({
					type:"POST",
					url:"./php/curator_update.php",
					data:{title:title, tags:tags, count_pu:count_pu, success_pu:success_pu, point_pu:point_pu},
					success:function(response){
						if(response=="success"){
							alert("큐레이터 정보 수정 성공!");
							// $(".page_update_modal").hide();
							location.reload();
						}else{
							alert("큐레이터 정보 수정 실패!");
							return false;
						}
					}
				})
			}else{
				alert("모든 정보를 기입하셔야 합니다.");
			}

		});


	//큐레이터 페이지 이동
	// $(".my_cuartor_page").on("click", function(){
	// 	location.href="./cuartor_view.php";
	// });
	$(".board_bottom_list>.list_mid>.nickname").on("click", function(){
		var id=$(this).attr("data-id");
		var curator_num=$(this).attr("data-num");
		location.href="./cuartor_view.php?id="+id+"&curator_num="+curator_num;

	});
	$(".my_cuartor_page").on("click", function(){
		var curator_num=$(this).attr("data-num");
			location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	$(".card_circle>img").on("click", function(){
		var curator_num=$(this).attr("data-num");
			location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	// 	vdialog({
	// 	title:'Title',
	// 	content:"알림창입니다.",
	// 	// ok:function(){
	// 	// 	alert("confirm");
	// 	// }
	// 	// cancel:function(){
	// 	// 	alert("cancel");
	// 	// }
	// }).showModal();

	//게시판
	$(".like_btn").on("click", function(){
		var board_num=$(this).attr("data-num");
		var id=$(this).attr("data-id");
		
		$.ajax({
			type:"POST",
			url:"./php/like_board.php",
			data:{board_num:board_num, id:id},
			success:function(response){
				if(response=="success"){
					// $(this).attr("disabled", "disabled");
					alert("좋아요 되었습니다.");
					$(".like_btn").css("border","solid 1px #ee1e72");
 					$(".like_btn>i").css("color","#ee1e72");
				
					// location.reload();
				}else if(response=="like_already"){
					alert("좋아요 취소되었습니다");
					$(".like_btn").css("border","solid 1px black");
 					$(".like_btn>i").css("color","black");
					// location.reload();
				}
				else{
					return false;
				}
			}
		})
	});


	//게시판 신고버튼
	$(".alarm_btn").on("click", function(){
		var board_num=$(this).attr("data-num");
		var id=$(this).attr("data-id");

		$.ajax({
			type:"POST",
			url:"./php/alarm_board.php",
			data:{board_num:board_num, id:id},
			success:function(response){
				if(response=="success"){
					// $(this).attr("disabled", "disabled");
					alert("신고 되었습니다.");
					$(".alarm_btn").css("border","solid 1px red");
 					$(".alarm_btn>i").css("color","red");
				
					// location.reload();
				}else if(response=="alarm_already"){
					alert("신고 취소되었습니다");
					$(".alarm_btn").css("border","solid 1px black");
 					$(".alarm_btn>i").css("color","black");
					// location.reload();
				}
				else{
					return false;
				}
			}
		})



	});


	//게시판 글 수정
	$(".board_modi_success").on("click", function(){
		CKupdate()
		var boardnum=$(this).attr("data-num");
		var id=$(this).attr("data-id");
		var boardtitle=$(".modi_title").val();
		var boardcate=$(".select_body>select>option:selected").val();
		var bodytext=$(".modi_bodytext").val();
		var tags=$("#tags").val();
		var pw=$(".modi_pw").val();
		var pw_con=$(".modi_pw_con").val();
		alert(boardcate);
		if(pw==pw_con){
			$.ajax({
			type:"POST",
			url:"./php/board_update.php",
			data:{boardnum:boardnum, id:id, pw:pw, boardtitle:boardtitle,
				 boardcate:boardcate, bodytext:bodytext, tags:tags},
			success:function(response){
				if(response=="success"){
					alert("수정 성공!");
					location.reload();
				}else{
					alert(response);
					alert("수정 실패!");
					return false;
				}
			}
		})
		}else{
			alert("비밀번호가 일치하지 않습니다.");
			return false;
			}

	});


//좋아요 버튼 마크 유지 기능
 	var like_mark=$(".like_btn").attr("data-flag");
 	// alert(like_mark);
 	if(like_mark=="1"){
 		$(".like_btn").css("border","solid 1px #ee1e72");
 		$(".like_btn>i").css("color","#ee1e72");
 	}else{
 		$(".like_btn").css("border","solid 1px black");
 		$(".like_btn>i").css("color","black");
 	}
 	var alarm_mark=$(".alarm_btn").attr("data-flag");
 	// alert(like_mark);
 	if(alarm_mark=="1"){
 		$(".alarm_btn").css("border","solid 1px red");
 		$(".alarm_btn>i").css("color","red");
 	}else{
 		$(".alarm_btn").css("border","solid 1px black");
 		$(".alarm_btn>i").css("color","black");
 	}
//공감하기 버튼 마크 유지 기능
$(".comment_item").each(function(){
var comment_like=$(this).children(".comment_button").children(".comment_like_btn").attr("data-flag");
			 	// alert(like_mark);
			 	if(comment_like=="1"){
			 		$(this).children(".comment_button").children(".comment_like_btn").css("color","#ee1e72");
			 		$(this).children(".comment_button").children(".comment_like_btn").children("i").css("color","#ee1e72");
			 	}else{
			 		$(this).children(".comment_button").children(".comment_like_btn").css("color","black");
			 		$(this).children(".comment_button").children(".comment_like_btn").children("i").css("color","black");
			 	}
});

$(".comment_item").each(function(){
var comment_alarm=$(this).children(".comment_button").children(".comment_alarm_btn").attr("data-flag");
			 	// alert(like_mark);
			 	if(comment_alarm=="1"){
			 		$(this).children(".comment_button").children(".comment_alarm_btn").css("color","red");
			 		$(this).children(".comment_button").children(".comment_alarm_btn").children("i").css("color","red");
			 	}else{
			 		$(this).children(".comment_button").children(".comment_alarm_btn").css("color","black");
			 		$(this).children(".comment_button").children(".comment_alarm_btn").children("i").css("color","black");
			 	}
});


 	


	$(".comment_like_btn").on("click", function(){
		var comment_num=$(this).attr("data-num");
		var id=$(this).attr("data-id");
		// alert(comment_num);
		// alert(id);
		var like_item=$(this);

		$.ajax({
			type:"POST",
			url:"./php/like_comment.php",
			data:{comment_num:comment_num, id:id},
			success:function(response){
				if(response=="success"){
					alert("공감 되었습니다.");
					like_item.css("color","#ee1e72");
 					like_item.children("i").css("color","#ee1e72");
					// location.reload();
					// like_item.css("color","ee1e72");
				}else if(response=="like_already"){
					alert("공감 취소되었습니다");
					like_item.css("color","black");
 					like_item.children("i").css("color","black");
				}
				else{
					return false;
				}
			}

		})
	});


	$(".comment_alarm_btn").on("click", function(){
		var comment_num=$(this).attr("data-num");
		var id=$(this).attr("data-id");
		// alert(comment_num);
		// alert(id);
		var alarm_item=$(this);

		$.ajax({
			type:"POST",
			url:"./php/alarm_comment.php",
			data:{comment_num:comment_num, id:id},
			success:function(response){
				if(response=="success"){
					alert("신고 되었습니다.");
					alarm_item.css("color","red");
 					alarm_item.children("i").css("color","red");
					// location.reload();
					// like_item.css("color","ee1e72");
				}else if(response=="alert_already"){
					alert("신고 취소되었습니다");
					alarm_item.css("color","black");
 					alarm_item.children("i").css("color","black");
				}
				else{
					return false;
				}
			}

		})
	});

//댓글 삭제
	$(".comment_del_btn").on("click", function(){
		var com_num=$(this).attr("data-num");

		var com_del=confirm("정말로 댓글을 삭제하시겠습니까?");
		if(com_del){
				$.ajax({
			type:"POST",
			url:"./php/comment_del.php",
			data:{com_num:com_num},
			success:function(response){
				if(response=="success"){
					alert("댓글 삭제 완료");
					location.reload();
				}else{
					alert(response);
				}
			}
		})
			}else{
				return false;
			}
	
	});

	$(".board_list").on("click", function(){
		location.href="./communitypage.php";
	});

	//게시판 이미지 출력시 제어
	var img_resize_test=$(".view_bodytext img").width();
	// alert(img_resize_test);
	if(img_resize_test>1026){
			$(".view_bodytext img").css("width","100%");
			$(".view_bodytext img").css("height","auto");	
	}
	$(".view_bodytext p").css("font-family","a뉴고딕M");
	$(".view_bodytext p").css("line-height","20px");

	//메인페이지 사진 조정
	var main_proimg=$(".main_cupro>img");
	if(main_proimg.width()>main_proimg.height()){
		main_proimg.height("160px");
		main_proimg.width("auto");
	}else{
		main_proimg.height("auto");
		main_proimg.width("160px");
	}
	//커뮤니티 페이지 사진 조정
	var thumbnail_img =$(".item_img_wrap>img");
	if(thumbnail_img.width()>thumbnail_img.height()){
		thumbnail_img.height("140px");
		thumbnail_img.width("auto");
	}else{
		thumbnail_img.width("140px");
		thumbnail_img.height("auto");
	}
	//프로필 이미지 사진 조정
	var pp_img=$(".profile_circle").children(".in_circle").children("img");
	if(pp_img.width()>pp_img.height()){
		pp_img.height("180px");
		pp_img.width("auto");
	}else{
		pp_img.width("180px");
		pp_img.height("auto");
	}
	$(".right_list>img").css("width", "100%");
	//커뮤니티 페이지 사진 
	var nick_img=$(".icon_in_board_circle").children("img");
	if(nick_img.width()>nick_img.height()){
		nick_img.height("75px");
		nick_img.width("auto");
	}else{
		nick_img.width("75px");
		nick_img.height("auto");
	}
	//큐레이터 뷰페이지 이미지 조정(동그라미)
	var cura_img=$(".title_in_circle").children("img");
	if(cura_img.width()>cura_img.height()){
		cura_img.height("200px");
		cura_img.width("auto");
	}else{
		cura_img.width("200px");
		cura_img.height("auto");
	}
	//큐레이터 페이지 사진 조정
	var cura_thumb=$(".curator_ser_thumb").children("img");
	if(cura_thumb.width()>cura_thumb.height()){
		cura_thumb.height("73px");
		cura_thumb.width("auto");
	}else{
		cura_thumb.width("73px");
		cura_thumb.height("auto");
	}

	//마이페이지 모달 사진 조정
	var pro_mo_circle=$(".profile_img_div").children("img");
	if(pro_mo_circle.width()>=pro_mo_circle.height()){
		pro_mo_circle.height("205px");
		pro_mo_circle.width("auto");
	}else{
		pro_mo_circle.width("205px");
		pro_mo_circle.height("auto");
	}
	var my_top=$(".mypage_img_wrap").children("img");
	if(my_top.width()>=my_top.height()){
		my_top.height("138px");
		my_top.width("auto");
	}else{
		my_top.width("400px");
		my_top.height("auto");
	}

	//메시지창 프로필 이미지 조정
	var reply_modal_circle=$(".reply_modal_in_circle").children("img");
	if(reply_modal_circle.width()>=reply_modal_circle.height()){
		reply_modal_circle.height("45px");
		reply_modal_circle.width("auto");
	}else{
		reply_modal_circle.height("45px");
		reply_modal_circle.width("auto");

	}

	//큐레이터 페이지 이동
	$(".list_mid > .nickname").on("mouseover", function(){
		$(this).css("cursor", "pointer");
	});
	$(".card_top>img").on("click", function(){
		var curator_num=$(this).attr("data-num");
		// alert(curator_num);
			location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	$(".cu_bottom_pro>img").on("click", function(){
		var curator_num=$(this).attr("data-num");
		// alert(curator_num);
			location.href="./cuartor_view.php?curator_num="+curator_num;
	});
	// $(".card_circle").on("click",function(){
	// 	location.href="./cuartor_view.php";
	// });
	$(".card_top").on("mouseover", function(){
		$(this).css("cursor", "pointer");
	});
	// $(".card_circle").on("mouseover", function(){
	// 	$(this).css("cursor", "pointer");
	// 	$(this).children("img").css("transform": "scale(1.2)");
	// });
	$(".list_rank>li").on("click", function(){
		location.href="./communityboardview.php";
	});
	$(".go_list").on("click", function(){
		location.href="./curator.php";
	});
	$(".list_rank>li").css("cursor", "pointer");

	//마이페이지 이동
	$(".mypage_go").on("click", function(){
		location.href="./mypage.php";
	});
	$(".company_mypage_go").on("click", function(){
		location.href="./seller.php";
	});

	$(".go_cartpage").on("click", function(){
		location.href="./shoopingback.php";
	});
	$(".cart_more").on("click", function(){
		location.href="./shoopingback.php";
	});

	//question 클릭

	$(".qu_circle_2").on("click", function(){ 
		var que_circle=$(".question_radius").css("display");
		if(que_circle=="none"){
			$(".question_radius").css("display", "block");
		}else{
			$(".question_radius").css("display","none");
		}
	});
	$(".qu_circle_1").on("click", function(){
		var que_circle1=$(".question_radius2").css("display");
		if(que_circle1=="none"){
			$(".question_radius2").css("display", "block");
		}else{
			$(".question_radius2").css("display", "none");
		}
	});

	var brocoli = null;
	var index = 0;
	var array = new Array();
	var count = 0;
	//이미지 확대
	$(".banner_gal>div>img").on("click", function(){
		var index_img_mag=$(this).attr("src");
		var img_modal=`<div class='img_mag'><img>

		<button class="index_prev_btn"><i class="fas fa-chevron-circle-left"></i></button>
		<button class="index_next_btn"><i class="fas fa-chevron-circle-right"></i></button>



		</div>`;
		$(".wrap").append(img_modal);
		
		index = $( ".banner_gal>div>img" ).index( this );;
		// alert(index);

		
		$(".banner_gal > div > img").each(function(){
			array.push($(this).attr("src"));
			count++;
		});


		$(".img_mag > img").attr("src",array[index]);
		brocoli = setInterval(function(){
			index++;
			if(count == index){
				index = 0;
			}
			$(".img_mag > img").attr("src",array[index]);
		},1000);

	});

	$(document).on("click",function(e){
		if($(".img_mag").is(e.target)){
			$(".img_mag").remove();
			clearInterval(brocoli);
		}
	});
	$(document).on("click",".index_prev_btn",function(){
		clearInterval(brocoli);
		if(index == 0){
			index = count;
		}
		index--;
		$(".img_mag > img").attr("src",array[index]);
		brocoli = setInterval(function(){
			index++;
			if(count == index){
				index = 0;
			}
			$(".img_mag > img").attr("src",array[index]);
		},1000);
	});

	$(document).on("click",".index_next_btn",function(){
		clearInterval(brocoli);
		// alert(index);
		if(index == count-1){
			index = -1;
		}
		index++;
		// alert(count);
		$(".img_mag > img").attr("src",array[index]);
		brocoli = setInterval(function(){
			index++;
			if(count == index){
				index = 0;
			}
			$(".img_mag > img").attr("src",array[index]);
		},1000);
	});

	// localStorage.clear();
	//--------------20190507_서정현_수정
	// alert(localStorage.getItem('cricle'));
	if(localStorage.getItem('cricle') == "show"){
		$(".curator_circle").show();
		$(".open_circle").hide();
		$(".close_circle").show();
		$(".qu_circle_2").show();
	}else if(localStorage.getItem('cricle') == "hide"){
		$(".curator_circle").hide();
		$(".close_circle").hide();
		$(".open_circle").show();
		$(".qu_circle_2").hide();
	}else{
		$(".curator_circle").show();
		$(".open_circle").hide();
		$(".close_circle").show();
		$(".qu_circle_2").hide();
	}


	if(localStorage.getItem("target") == "show"){
		$(".target").show();
		$(".curator_circle").hide();
		$(".close_circle").hide();
		$(".qu_circle_2").hide();
		$(".open_circle").hide();
		// alert("a");
	}else{
		$(".target").hide();
		$(".curator_circle").show();
		$(".close_circle").show();
		$(".qu_circle_2").show();
		$(".open_circle").hide();
	}

	$(".close_circle").click(function(){
		$(".curator_circle").stop().fadeOut();
		$(this).stop().fadeOut();
		$(".open_circle").stop().fadeIn();
		$(".open_circle").animate({
			"top":'10px',
			"left":"10px"
		},1500);
		$('.open_circle').css("zIndex","1000");
		$(".qu_circle_2").stop().fadeOut();
		localStorage.setItem('cricle', 'hide');
	});
	$(".open_circle").click(function(){
		$(".qu_circle_2").stop().fadeIn();
		$(".curator_circle").stop().fadeIn();
		$(this).stop().fadeOut();
		$(".close_circle").stop().fadeIn();
		localStorage.setItem('cricle', 'show');
	});

	$(".pink_img").mouseover(function(){
		// alert("a");
		$(this).children(".new_img_hover").stop().fadeIn();
		// $(this).children(".pink_info").stop().fadeIn();
	});
	$(".pink_img").mouseleave(function(){
		$(this).children(".new_img_hover").stop().fadeOut();
	});

	$(".new_img").mouseover(function(){


		$(this).children(".new_img_hover").stop().fadeIn();
	});
	$(".new_img").mouseleave(function(){
		$(this).children(".new_img_hover").stop().fadeOut();
	});

	$(".top_warp > .top_left").mouseover(function(){
		$(this).children(".notice_div").children(".content_top_black_div").stop().fadeIn();
	});
	$(".top_warp > .top_left").mouseleave(function(){
		$(this).children(".notice_div").children(".content_top_black_div").stop().fadeOut();
	});
	$(".top_warp > .top_right").mouseover(function(){
		$(this).children(".events_div").children(".content_top_black_div").stop().fadeIn();
	});
	$(".top_warp > .top_right").mouseleave(function(){
		$(this).children(".events_div").children(".content_top_black_div").stop().fadeOut();
	});





	//2019-05-11
	$(".page_close_circle").click(function(){
		$(".page_table input[type='text']").val("");
		$(".page_update_modal").fadeOut();
	});
	$(".update_btn").click(function(){
		$(".page_update_modal").fadeIn();
	});
	$(".setting_canel").click(function(){
		$(".page_table input[type='text']").val("");
		$(".page_update_modal").fadeOut();
	});
	$(".setting_rest").click(function(){
		$(".page_table input[type='text']").val("");
	});
	$(".mypage_img").mouseover(function(){
		// alert("a");
		$(this).children(".mypage_img_wrap").children(".mypage_hover").stop().fadeIn();
	});
	$(".mypage_img").mouseleave(function(){
		// alert("a");
		$(this).children(".mypage_img_wrap").children(".mypage_hover").stop().fadeOut();
	});
	$(".update_close_circle").click(function(){
		$(".inputs").val("");
		$(".my_info_update_modal").stop().fadeOut();
	});
	$(".update_rest").click(function(){
		$(".inputs").val("");
	});
	$(".update_canel").click(function(){
		$(".inputs").val("");
		$(".my_info_update_modal").stop().fadeOut();
	});
	$(".my_info_update_btn").click(function(){
		$(".my_info_update_modal").stop().fadeIn();
	});
	$(".page_img_wrap").mouseover(function(){
		$(this).children(".page_img").children(".page_hover").stop().fadeIn();
	});
	$(".page_img_wrap").mouseleave(function(){
		$(this).children(".page_img").children(".page_hover").stop().fadeOut();
	});
	//쪽지 기능
	$(".reply_circle").on("click", function(){
		$(".reply_modal").show();
	});
	$(".message_write").on("click", function(){
		$(".reply_modal").css("display","block");
	});
	$('.reply_bodytext_main').keyup(function(){
		var content = $(this).val();
		$(".legtn_coun").text(content.length);
	});
	$(".reply_reset").click(function(){
 		$(".reply_input ").val("");
 		$('.reply_bodytext_main').val("");
	});
	$(".reply_canel").click(function(){
		$(".reply_modal_right").removeClass("fadeOutLeft");
		$(".reply_modal_right").hide();
		$(".reply_modal_right").removeClass("fadeOutRight");
		$(".reply_input ").val("");
 		$('.reply_bodytext_main').val("");
 		$(".reply_modal").stop().fadeOut();
	});
	$(".reply_close_circle").click(function(){
		$(".reply_modal_right").removeClass("fadeOutLeft");
		$(".reply_modal_right").hide();
		$(".reply_modal_right").removeClass("fadeOutRight");
		$(".reply_input ").val("");
 		$('.reply_bodytext_main').val("");
 		$(".reply_modal").stop().fadeOut();
	});
	$(".reply_modal_right").hide();
	$(".reply_close_btn").click(function(){
		$(".reply_modal_right").removeClass("fadeInLeft");
 		$(".reply_modal_right").addClass("fadeOutLeft");
	});
	$(".reply_search").click(function(){
		$(".reply_modal_right").show();
		$(".reply_modal_right").removeClass("fadeOutLeft");
		$(".reply_modal_right").addClass("fadeInLeft");
	});

	$(".not_login_message").click(function(){
		alert("로그인 해주세요.");
	});
	$(".login_message").click(function(){
		$(".chat_modal").stop().fadeIn();
	});
	isloaded = true;



	$(document).on("click",".cu_pick",function(){
		// fadeInLeft
		$(".cuator_list_wrap").removeClass("fadeOutLeft");
		$(".cuator_list_wrap").addClass("fadeInLeft");
		$(".cuator_list_wrap").show();
		var gender = $('input[name="gender"]:checked').val();
		var age = $('input[name="year"]:checked').val();
		// alert(age);
		age1=age.split("대");
		// alert(age1[0]);
		var case_pick = $('input[name="case"]:checked').val();
		var rel = $('input[name="rel"]:checked').val();
		var hobby = $('input[name="hobby"]:checked').val();
		// alert(gender+","+age+","+case_pick+","+rel+","+hobby);
		var curator_id;
		$(".cuator_node").remove();

		$.ajax({
			type:"POST",
			url:"./php/cuator_filter.php",
			data:{age:age, hobby:hobby},
			dataType:"json",
			success:function(response){
				// alert(response);
				// alert(response.hobby);
				// alert(response.age);
				var curator_list=``;
				$.each(response.curator, function(key, value){
					
					
					$.each(response.member,function(key1,value1){
						// 
						if(value.id1==value1.user_id){
							// alert(value.hobby);
						if(value.hobby.search(hobby) != -1){
							// alert(value1.birthday);
							// alert(calcAge(value1.birthday));
							if(calcAge(value1.birthday)>=age1[0] && age1[0]+10>calcAge(value1.birthday)){
								curator_list+=`<div class="cuator_node">
								<div class="node_porfile">
								<div class="bal_1">
										<div class="balloon_1 cr_flag">
											<p>추천</p>
										</div>
									</div>
									<div class="circle node_porfile_circle">
										<div class="circle node_in_circle">
											<img src="${value.profile_img}" alt="img">
										</div>
									</div>
								</div>
								<div class="cuator_info">
									<p class="id_or_name" data-img="${value.profile_img}">${value.name1}(${value.id1}) </p>
									<p class="reply_email">${value.email}</p>
								</div>
								<div class="cuator_check">
									<div class="circle checkcircle cuator_fail_check">
										<i class="fas fa-check"></i>
									</div>
									<div class="circle checkcircle cuator_success_check" data-id="${value.id1}"style="display:none;" data-state="1">
										<i class="fas fa-check"></i>
									</div>
									
								</div>
							</div>`;
							}			
						}else{
							curator_list+=`<div class="cuator_node">
								<div class="node_porfile">
									<div class="circle node_porfile_circle">
										<div class="circle node_in_circle">
											<img src="${value.profile_img}" alt="img">
										</div>
									</div>
								</div>
								<div class="cuator_info">
									<p class="id_or_name" data-img="${value.profile_img}">${value.name1}(${value.id1}) </p>
									<p class="reply_email">${value.email}</p>
								</div>
								<div class="cuator_check">
									<div class="circle checkcircle cuator_fail_check">
										<i class="fas fa-check"></i>
									</div>
									<div class="circle checkcircle cuator_success_check" data-id="${value.id1}"style="display:none;" data-state="1">
										<i class="fas fa-check"></i>
									</div>
									
								</div>
							</div>`;



						}
					}
					});
				
				});
				// alert(curator_list+"1");
				curator_list+=`<button class="cuator_comp_btn">선택완료</button>`;
				$(".cuator_items").html(curator_list);


			},error:function(request, status, error){
				alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
			}
		})





	});
	$(".cuator_close_btn").click(function(){
		$(".cuator_list_wrap").removeClass("fadeInLeft");
		$(".cuator_list_wrap").addClass("fadeOutLeft");
		// $(".cuator_list_wrap").hide();
	});

	$(document).on("click", ".cuator_fail_check", function(){
		$(".cuator_fail_check").hide();
		$(".cuator_fail_check").show();
		$(".cuator_success_check").hide();
		$(this).parent(".cuator_check").children(".cuator_fail_check").hide();
		$(this).parent(".cuator_check").children(".cuator_success_check").show();
		// $(this).parent(".cuator_check").parent(".reply_node").children(".node_info").children(".id_or_name").addClass("sel_user_id");
		// $(this).parent(".cuator_check").children(".success_check").show();
		// $(this).parent(".cuator_check").parent(".reply_node").children(".node_info").children(".id_or_name").addClass("sel_user_id");
	});	
	$(document).on("click",".cuator_comp_btn", function(){
			var id;
		$(".cuator_check").each(function(){
			if($(this).children(".cuator_success_check").is(":visible")){
				id=$(this).children(".cuator_success_check").data("id");
			}
		});
		var gender = $('input[name="gender"]:checked').val();
		var age = $('input[name="year"]:checked').val();
		var case_pick = $('input[name="case"]:checked').val();
		var rel = $('input[name="rel"]:checked').val();
		var hobby = $('input[name="hobby"]:checked').val();
		var cu_profile = gender+"/"+age+"/"+case_pick+"/"+rel+"/"+hobby;
		// alert(cu_profile);
		// alert(id);
		$.ajax({
			type:"POST",
			data:{service_cu:id,cu_profile:cu_profile},
			url:"./php/service_insert.php",
			success:function(response){
				// alert(response);
				if(response == "success"){
					$(".cuator_list_wrap").removeClass("fadeInLeft");
		$(".cuator_list_wrap").addClass("fadeOutLeft");
				}
				else{
					alert("큐레이터 선택 실패");
					return false;
				}
			}
		});

	});


//상품 선택 안하면 안넘어감
	$(document).on("click",".info",function(){
		var info = $("input[name='radio_first']:checked").val();
			if(info!=undefined){
				location.href="./category.php?cate="+info;
			}else{
				alert("상품을 선택하세요.");
				return false;
			}
	});

	$(".chucheon_bottom>span").on("click", function(){
		var keyword=$(this).text();
		var key=keyword.replace("#", "");
		// alert(key);
		location.href="./search_page.php?search_key="+key;

	});
	$(".hash_left>span").on("click", function(){
		var keyword=$(this).text();
		var key=keyword.replace("#", "");
		// alert(key);
		location.href="./search_page.php?search_key="+key;
	});
		$(".hash_right>span").on("click", function(){
		var keyword=$(this).text();
		var key=keyword.replace("#", "");
		// alert(key);
		location.href="./search_page.php?search_key="+key;
	});



	//footer 개인정보처리방침
	$(".li_seart > a").click(function(e){
		e.preventDefault();
		var windowW = 500;  // 창의 가로 길이
        var windowH = 700;  // 창의 세로 길이
        var left = Math.ceil((window.screen.width - windowW)/2);
        var top = Math.ceil((window.screen.height - windowH)/2);
		window.open("./Becoming.html","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);

	});
	$(".li_contract>a").on("click", function(e){
		e.preventDefault();
		var windowW = 800;  // 창의 가로 길이
        var windowH = 700;  // 창의 세로 길이
        var left = Math.ceil((window.screen.width - windowW)/2);
        var top = Math.ceil((window.screen.height - windowH)/2-200);
		window.open("./becoming_contract.html","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);

	});
	$(".li_use>a").on("click", function(e){
		e.preventDefault();
		var windowW = 800;  // 창의 가로 길이
        var windowH = 700;  // 창의 세로 길이
        var left = Math.ceil((window.screen.width - windowW)/2);
        var top = Math.ceil((window.screen.height - windowH)/2-200);
		window.open("http://crabland.com/html/rule.html","pop_01","l top="+top+", left="+left+", height="+windowH+", width="+windowW);

	});



});



function CKupdate(){
        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
    }

function reset(){
	$(".poll_body_title > p").html("비커밍 큐레이션 서비스 이용을 위한 <br> 타겟설정");
	$(".poll_modal input").prop("checked",false);
	$(".poll_first_wrap").css("marginLeft","0%");
	$(".poll_body_wrap").css("marginLeft","0%");
	// $(".poll_body_button").css("width","41%");
	$(".prev_btn").show();
	$(".next_btn").show();
	$(".setting_cancel").hide();
	$(".reset").hide();
	$(".info").hide();
	$(".cu_pick").hide();
	$(".register_modal input").val("");
	$(".saller_modal_wrap input").val("");
	$(".logo_info").text("jpg, png, jpeg,gif 파일");
	$(".register_modal input[name='cu_argree']").prop("checked", false);
}

function img_mag_cancel(target){
	clearInterval(target);
	$('.img_mag').remove();
}


//나이계산
function calcAge(birth) {                 

    var date = new Date();

    var year = date.getFullYear();

    var month = (date.getMonth() + 1);

    var day = date.getDate();       

    if (month < 10) month = '0' + month;

    if (day < 10) day = '0' + day;

    var monthDay = month + day;

       

    birth = birth.replace('-', '').replace('-', '');

    var birthdayy = birth.substr(0, 4);

    var birthdaymd = birth.substr(4, 4);

 

    var age = monthDay < birthdaymd ? year - birthdayy - 1 : year - birthdayy;
    console.log(age);
    return age;

} 