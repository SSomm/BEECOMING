$(document).ready(function(){

	//주문 내역 전체 보기
	$(".order_list_all").click(function(){
		var div=$(this).attr("data-div");
		// alert(div);
		if(div){
			// alert(div);
				// $(".order_search_div").show();
				$(".order_ltem").remove();
				$(".qna_list").hide();
				$(".list_wrap").hide();
				$(".shop_magne_list").hide();
				$(".admin_message_div").hide();
				var order_list="";
				$.ajax({
					type:"POST",
					url:"./php/seller_view_all.php",
					data:{div:div},
					dataType:"json",
					success:function(response){
						// alert(response);
						$.each(response.order,function(key, value){

							order_list+=`<div class="saller_item order_ltem">
										<div class="saller_item_img">
											<img src="${value.thumb_img}" alt="img">
										</div>
										<div class="saller_item_title">
											<p>${value.product_name}</p>
										</div>
										<div class="saller_item_bodytext">
											<p>${value.purchase_msg}</p>
										</div>
										<div class="saller_item_count">
											<p>${value.purchase_quantity}개</p>
										</div>
										<div class="saller_item_price">
											<p>${value.stack_money}원</p>
										</div>
										<div class="saller_item_user">
											<p>${value.name1}(${value.user_id})</p>
										</div>
										<div class="saller_item_date">
											<p>${value.date}</p>
										</div>
										<div class="saller_check_div">

											<input type="checkbox" id="table_item_check_ORDER">
											<label for="table_item_check_ORDER">
											</label>
										</div>

									</div>`;

						});
						$(".saller_order_body").append(order_list);
					}
				})
		}
	});

	//문의 내역 전체 보기
	$(".qna_list_all").on("click", function(){
		var div=$(this).attr("data-div");
		// alert(div);
		if(div){
			// $(".question_search_div").show();
			$(".order_list").hide();
			$(".order_ltem").remove();
			$(".list_wrap").hide();
			$(".shop_magne_list").hide();
			$(".admin_message_div").hide();
			var question_list="";
			$.ajax({
				type:"POST",
				url:"./php/seller_view_all.php",
				data:{div:div},
				dataType:"json",
				success:function(response){
					// alert(repsonse);
					$.each(response.question,function(key, value){
						question_list+=`<div class="saller_item order_ltem">
										<div class="saller_item_img">
											<img src="${value.thumb_img}" alt="img">
										</div>
										<div class="qna_item_title">
											<p>${value.product_name}</p>
										</div>
										<div class="qna_body_text">
											<span style="margin-right: 30px; color:#ee1e72;" class="question_category">[ ${value.question_cate} ]</span><span class="question_bodybody">${value.question_body}</span>
										</div> 
										<div class="qna_user">
											<p>${value.questioner_id}</p>
										</div>`;
										// <?php
											if(value.answer_com==1){
										// ?>
										question_list+=`<div class="qna_flag">
											<p class="qna_success">답변완료</p>
										</div>`;
										// <?php
											}else{
										// ?>
										question_list+=`<div class="qna_flag">
											<p class="flag_div">답변하기</p>
										</div>`;
										
											}
											
									question_list+=`</div>`;
					});

					$(".saller_order_body").append(question_list);
				}
			});
		}
	});	


	//판매 등록상품 전체보기
	$(".product_list_all").on("click", function(){
		var div=$(this).attr("data-div");
		// alert(div);
		var v=0;
		if(div){
			// $(".product_search_div").show();
			$(".order_list").hide();
			$(".qna_list").hide();
			$(".product_item").remove();
			// $(".list_wrap").hide();
			$(".shop_magne_list").hide();
			$(".admin_message_div").hide();
			var product_list="";
				$.ajax({
				type:"POST",
				url:"./php/seller_view_all.php",
				data:{div:div},
				dataType:"json",
				success:function(response){
					// alert(response.product);
					$.each(response.product,function(key, value){
						product_list+=`<div class="product_item">
										<div class="product_check_div">
											<input type="checkbox" class="product_check" id="product_check${v}" data-num="${value.product_num}" data-pmnum="${value.pm_num}">
											<label for="product_check${v}"></label>
										</div>
										<div class="product_item_img">
											<img src="${value.product_thumb}" alt="img">
										</div>
										<p class="p_name_title">${value.product_name}`;


										
										if(value.product_option){
										
										product_list+=`${value.p_opt_detail1}`;
										
										}else{

										}
										
							product_list+=`<div class="product_info">
											<p>판매원가 : ${value.product_price}</p>`;

											if(value.sale_percent){
											
											product_list+=`<p>할인율 : <span class="info_red">${value.sale_percent}</span></p>
											<p>할인적용금액 : <span class="info_green">${value.product_drice}</span></p>`;
											
												}
											
											product_list+=`<p>재고수량 : `; 

											if(value.product_quantity>0){

											 product_list+=`${value.product_quantity}개`;
											}else{
											 product_list+=`품절`;

											}

										product_list+= `</p>
											<p class="order_processing_cnt">주문진행 : 건</p>
										</div>
										<button class="product_update" data-num="${value.pm_num}" data-num2="${value.product_num}">판매정보 수정</button>`;

											if(value.product_flag==1){

										product_list+=`<button class="product_stop" data-num="${value.pm_num}" data-num2="${value.product_num}">판매 중단</button>`;

									}else{
										
										product_list+=`<button class="product_restart" data-num="${value.pm_num}" data-num2="${value.product_num}">판매 개시</button>`;
										
										}
										product_list+=`</div>`;

										v++;
					});

					$(".product_body").append(product_list);

				}

			})

		}
	});


	//SHOP관리 문의 전체보기
	$(".shop_magne_list_all").on("click", function(){
		var div=$(this).attr("data-div");
		if(div){
			// $(".product_search_div").show();
			$(".order_list").hide();
			$(".qna_list").hide();
			$(".list_wrap").hide();
			// $(".list_wrap").hide();
			$(".shop_magne_ltem").remove();
			// $(".admin_message_div").hide();

			var admin_question_list="";
			$.ajax({
				type:"POST",
				url:"./php/seller_view_all.php",
				data:{div:div},
				dataType:"json",
				success:function(response){
					// alert(response.product);
					$.each(response.question_admin,function(key, value){
						admin_question_list+=`<div class="saller_item shop_magne_ltem">
										<div class="shop_magne_item_check">
											<input type="checkbox" class="shop_magne_check" id="shop_magne_check">
											<label for="shop_magne_check"></label>
										</div>
										<div class="shop_magne_title">
											<p>${value.message_title}</p>
										</div>
										<div class="shop_magne_date">
											<p>${value.date}</p> 
										</div>`;
							
										if(value.confirm_flag==0){

										admin_question_list+=`<div class="shop_magne_success">
											<p class="magne_walt">답변 대기중</p>
										</div>`;

										}else{
											admin_question_list+=`<div class="shop_magne_success">
											<span class="magne_success">답변확인하기</span>
										</div>`;

										}
									admin_question_list+=`</div>`;
					});

					$(".shop_magne_body").append(admin_question_list);
				}
			});
		}
	});

	//주문내역 검색
	$(".order_seacrh").keydown(function(key){
		if(key.keyCode == 13){
			var keyward = $(this).val();
			if(keyward == ""){
				alert("검색어를 입력해주세요.");
				return false;
			}else{

			}

		}
	});	


	//주문내역 처리체크
	$(".order_processing").on("click", function(){
		// var 

	});


	$(document).on("click",".product_update",function(){
		var num = $(this).data("num");
		var pmnum=$(this).data("pmnum")
		location.href="./product_update.php?num="+num+"&pmnum="+pmnum;
	});


	//주문사항 처리하기
	$(document).on("click", ".order_processing", function(){

		var purchase_num=new Array();
		var m=0;
		var check_flag=0;

		$(".seller_ordered").each(function(){
			var check_check=$(this).children(".saller_check_div").children("input:checkbox[name='seller_order_process']").is(":checked");
			// alert(check_check);
			if(check_check==true){
				// purchase_num=
				// alert("aa");
				purchase_num.push($(this).children(".saller_check_div").children("input:checkbox[name='seller_order_process']").data("purchase_num"));
				check_flag=1;
			}		

			// alert("aa");
		});
		if(check_flag==0){
			alert("주문처리할 상품을 선택하십시오.");
		}else{

			$.ajax({
				type:"POST",
				url:"./php/order_process.php",
				data:{purchase_num:purchase_num},
				success:function(response){
					// alert(response);
					if(response=="success"){
						alert("주문 처리 완료!");
						location.reload();
					}else{
						alert("주문 처리 실패!");
					}
				}
			})
		}
		// alert(purchase_num);
	});

	$(document).on("click", ".flag_div", function(){
		var qnum=$(this).data("qnum");
		var name;
		var id;
		var profile_img;
	
		$.ajax({
			type:"POST",
			url:"./php/questioner_info.php",
			dataType:"json",
			data:{qnum:qnum},
			success:function(response){
				// alert(response.questioner);
				$.each(response.questioner, function(key, value){
					$(".payer_input").val(value.name1+"("+value.id1+")");
					$(".reply_search").css("display","none");
					$(".payer_input").css("width","514px");
					$(".getterimg>img").attr("src",value.profile_img);
					$(".reply_success").attr("data-qnum", qnum);					
				});
					
					$(".reply_modal").show();
			}
		})
	});



	$(document).on("click", ".check_producnt_delete", function(){

		var num_array=new Array();
		var pm_array=new Array();
		var flag=0;
		var order_flag = 0;
		$(".product_check").each(function(){
			if($(this).prop("checked")==true){
				// 
				var order_str = $(this).parent("div").parent("div").children(".product_info").children(".order_processing_cnt").text();
				var order_count = order_str.replace(/[^0-9]/g,"");
				// alert(order_count);
				if(order_count == 0){
					num_array.push($(this).data("num"));
					pm_array.push($(this).data("pmnum"));	
					flag+=1;
				}else{
					order_flag++;
					// alert("주문 진행이 0건이 상품만 삭제할수 있습니다.");
					// return false;
				}
			}

		});
		// $(".product_item").each(function())

		if(order_flag != 0){
			alert("주문 진행중인 상품은 삭제하실수 없습니다.");
			return false;
		}else{
			if(flag==0){
			alert("삭제할 상품을 선택하세요.");
			return false;
			}else{
				$.ajax({
				type:"POST",
				data:{num_array:num_array,pm_array,pm_array},
				url:"./php/product_sel_delete.php",
				success:function(response){
					// alert(response);
					if(response=="success"){
						alert("상품 삭제 성공!");
						location.reload();
					}else{
						alert("상품 삭제 실패!");
						return false;
					}
				}
			});
			}
		}

		


	$(".re_list_btn").click(function(){
		// alert("a");
		$.ajax({
			type:"POST",
			data:{div:"refund"},
			url:"./php/get_re_ex.php",
			dataType:"json",
			success:function(response){
				var div = ``;
				$.each(response,function(key,value){
					div += `<div class="re_ex_item order_ltem re_ex_ordered">
										<div class="re_ex_item_img">
											<img src="${value.thumbs}" alt="img">
										</div>
										<div class="re_ex_item_title">
											<p>${value.re_ex_title}</p>
										</div>
										<div class="re_ex_item_bodytext">
											<p>${value.re_ex_bodytext}</p>
										</div>
										<div class="re_ex_item_count">
											<p>${value.re_ex_count}</p>
										</div>
										<div class="re_ex_item_price">
											<p>${value.re_ex_price}원</p>
										</div>
										<div class="re_ex_item_user">
											<p>${value.re_ex_name}(${value.re_ex_id})</p>
										</div>
										<div class="re_ex_item_date">
											<p>${value.re_ex_date}</p>
										</div>
									</div>`;
				});
				$(".re_ex_body").html(div);
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});

	$(".exchange_list_btn").click(function(){
		// alert("a");
		$.ajax({
			type:"POST",
			data:{div:"exchange"},
			url:"./php/get_re_ex.php",
			dataType:"json",
			success:function(response){
				var div = ``;
				$.each(response,function(key,value){
					div += `<div class="re_ex_item order_ltem re_ex_ordered">
										<div class="re_ex_item_img">
											<img src="${value.thumbs}" alt="img">
										</div>
										<div class="re_ex_item_title">
											<p>${value.re_ex_title}</p>
										</div>
										<div class="re_ex_item_bodytext">
											<p>${value.re_ex_bodytext}</p>
										</div>
										<div class="re_ex_item_count">
											<p>${value.re_ex_count}</p>
										</div>
										<div class="re_ex_item_price">
											<p>${value.re_ex_price}원</p>
										</div>
										<div class="re_ex_item_user">
											<p>${value.re_ex_name}(${value.re_ex_id})</p>
										</div>
										<div class="re_ex_item_date">
											<p>${value.re_ex_date}</p>
										</div>
									</div>`;
				});
				$(".re_ex_body").html(div);
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});
		


	});






	
});