$(document).ready(function(){
	//문의사항 입력 글자수 세기 
	$(".qna_bodytext_a").keyup(function(e){
		var content = $(this).val();
		$('.bodytextlength').text("( "+content.length+" / 500 자)");
		if(content.length >= 500){
			alert("글자수 초과");
			return false;
		}
	});
	//교환신청,환불시청 버튼제어
	$(".exchange_reset").click(function(){
		$(".exchange_title").val("");
		$(".exchange_text").val("");
	});
	$(".exchange_cancel").click(function(){
		$(".exchange_title").val("");
		$(".exchange_text").val("");
		$(".exchange_review_modal").hide();
	});
	$(".exchange_close_circle").click(function(){
		$(".exchange_title").val("");
		$(".exchange_text").val("");
		$(".exchange_review_modal").hide();
	});
	$(".return_reset").click(function(){
		$(".return_title").val("");
		$(".return_text").val("");
	});
	$(".return_cancel").click(function(){
		$(".return_title").val("");
		$(".return_text").val("");
		$(".return_modal").hide();
	});
	$('.return_close_circle').click(function(){
		$(".return_title").val("");
		$(".return_text").val("");
		$(".return_modal").hide();
	});

	//문의사항 reset
	$(".qna_reset").click(function(){
		$(".qna_title_input").val("");
		$(".qna_bodytext_a").val("");
	});
	
	//문의사항 입력 취소
	$(".qna_cancel,.qna_close_circle").click(function(){
		$(".product_qna_modal").stop().fadeOut();
	});

	//
	$(".question").click(function(){
		$(".product_qna_modal").stop().fadeIn();
	});
	
	//문의사항 입력 완료
	$(".qna_success").click(function(){
		
		var qna_product_num=$(this).attr("data-pnum");
		var qna_title=$(".qna_title_input").val();
		var qna_body=$(".qna_bodytext_a").val();
		var qna_open=$('input:radio[name="open_or_notopen"]:checked').val();
		var qna_questioner=$(".inquirer_input").val();
		var qna_cate=$('.qna_type option:selected').val();

		$.ajax({
			type:"POST",
			url:"./php/qna_insert.php",
			data:{qna_product_num:qna_product_num, qna_title: qna_title,qna_body:qna_body, qna_open:qna_open, qna_questioner:qna_questioner, qna_cate:qna_cate},
			success:function(response){
				// alert(response);
				if(response=="success"){
					alert("문의 등록 성공!");
					// $(".product_qna_modal").stop().fadeOut();
					location.reload();
				}else{
					alert("문의 등록 실패!");
					return false;
				}

			}

		});

	});

	//주문 리스트 닫기
	$(".order_list_close_circe").click(function(){
		$(".order_list_modal").stop().fadeOut();
	});

	//후기 모달 닫기
	$(".review_close_circle,.review_cancel").click(function(){
		$(".product_review_modal").stop().fadeOut();
	});

	$(".review_reset").click(function(){
		$('.review_title').val("");
		CKEDITOR.instances.review_area.setData("");
	});
	$(document).on("click",function(e){
		if($(".product_review_modal").is(e.target)){
			$(".product_review_modal").stop().fadeOut();
		}
	});
	$(document).on("click",function(e){
		if($(".order_list_modal").is(e.target)){
			$(".order_list_modal").stop().fadeOut();
		}
	});
	$(document).on("click",function(e){
		if($(".buy_order_modal").is(e.target)){
			$(".buy_order_modal").stop().fadeOut();
		}
	});

	//구매내역
	$(".bottom_info_div").click(function(){
		// alert("a");
		$.ajax({
			type:"POST",
			data:{div:"all"},
			dataType:"json",
			url:"./php/purchase_list.php",
			success:function(response){
				// alert(response);
				var table_list = "<thead></thead>";
				$.each(response.purchase,function(key,value){
					// console.log(value.user_id);
					// alert("aa");
					table_list += `<tr>
							<td>
								<div class="buy_table_item_img">
									<img src="http://192.168.20.78/becoming0508/category_img/${value.category}/${value.thumb}" alt="img">
								</div>
								<div class="buy_table_item_info">
									<div class="buy_table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_price}</p>
									</div>
								</div>
							</td>
						</tr>`;
				});

				$(".buy_list_table").html(table_list);
				page_table();
				$(".buy_order_modal").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});


	$(".buy_all").click(function(){
		// alert("a");
		$(".buy_modal_top_right > button").css({
			"background":"white",
			"color":"rgb(238, 30, 114)"
		});
		$(this).css({
			"background":"rgb(238, 30, 114)",
			"color":"white"
		});
		$.ajax({
			type:"POST",
			data:{div:"all"},
			dataType:"json",
			url:"./php/purchase_list.php",
			success:function(response){
				// alert(response);
				var table_list = "<thead></thead>";
				$.each(response.purchase,function(key,value){
					// console.log(value.user_id);
					// alert("aa");
					table_list += `<tr>
							<td>
								<div class="buy_table_item_img">
									<img src="http://192.168.20.78/becoming0508/category_img/${value.category}/${value.thumb}" alt="img">
								</div>
								<div class="buy_table_item_info">
									<div class="buy_table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_price}</p>
									</div>
								</div>
							</td>
						</tr>`;
				});

				$(".buy_list_table").html(table_list);
				page_table();
				$(".buy_order_modal").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});


	$('.buy_now').click(function(){
		$(".buy_modal_top_right > button").css({
			"background":"white",
			"color":"rgb(238, 30, 114)"
		});
		$(this).css({
			"background":"rgb(238, 30, 114)",
			"color":"white"
		});
		$.ajax({
			type:"POST",
			data:{div:"now_all"},
			dataType:"json",
			url:"./php/purchase_list.php",
			success:function(response){
				// alert(response);
				var table_list = "<thead></thead>";
				$.each(response.purchase,function(key,value){
					// console.log(value.user_id);
					// alert("aa");
					table_list += `<tr>
							<td>
								<div class="buy_table_item_img">
									<img src="http://192.168.20.78/becoming0508/category_img/${value.category}/${value.thumb}" alt="img">
								</div>
								<div class="buy_table_item_info">
									<div class="buy_table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_price}</p>
									</div>
								</div>
							</td>
						</tr>`;
				});

				$(".buy_list_table").html(table_list);
				page_table();
				$(".buy_order_modal").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});




	$('.first_now').click(function(){
		$(".buy_modal_top_right > button").css({
			"background":"white",
			"color":"rgb(238, 30, 114)"
		});
		$(this).css({
			"background":"rgb(238, 30, 114)",
			"color":"white"
		});
		$.ajax({
			type:"POST",
			data:{div:"first_all"},
			dataType:"json",
			url:"./php/purchase_list.php",
			success:function(response){
				// alert(response);
				var table_list = "<thead></thead>";
				$.each(response.purchase,function(key,value){
					// console.log(value.user_id);
					// alert("aa");
					table_list += `<tr>
							<td>
								<div class="buy_table_item_img">
									<img src="http://192.168.20.78/becoming0508/category_img/${value.category}/${value.thumb}" alt="img">
								</div>
								<div class="buy_table_item_info">
									<div class="buy_table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_price}</p>
									</div>
								</div>
							</td>
						</tr>`;
				});

				$(".buy_list_table").html(table_list);
				page_table();
				$(".buy_order_modal").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});

	$('.second_now').click(function(){
		$(".buy_modal_top_right > button").css({
			"background":"white",
			"color":"rgb(238, 30, 114)"
		});
		$(this).css({
			"background":"rgb(238, 30, 114)",
			"color":"white"
		});
		$.ajax({
			type:"POST",
			data:{div:"second_all"},
			dataType:"json",
			url:"./php/purchase_list.php",
			success:function(response){
				// alert(response);
				var table_list = "<thead></thead>";
				$.each(response.purchase,function(key,value){
					// console.log(value.user_id);
					// alert("aa");
					table_list += `<tr>
							<td>
								<div class="buy_table_item_img">
									<img src="http://192.168.20.78/becoming0508/category_img/${value.category}/${value.thumb}" alt="img">
								</div>
								<div class="buy_table_item_info">
									<div class="buy_table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>${value.product_price}</p>
									</div>
								</div>
							</td>
						</tr>`;
				});

				$(".buy_list_table").html(table_list);
				page_table();
				$(".buy_order_modal").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});

	$(".buy_list_close_circe").click(function(){
		$(".buy_order_modal").hide();
	});
});
function page_table(){ 
var reSortColors = function($table) {
  $('tbody tr:odd td', $table).removeClass('even').removeClass('listtd').addClass('odd');
  $('tbody tr:even td', $table).removeClass('odd').removeClass('listtd').addClass('even');
 };
 $('table.buy_list_table').each(function() {
  var pagesu = 10;  //페이지 번호 갯수
  var currentPage = 0;
  var numPerPage = 4;  //목록의 수
  var $table = $(this);    
  
  //length로 원래 리스트의 전체길이구함
  var numRows = $table.find('tbody tr').length;
  //Math.ceil를 이용하여 반올림
  var numPages = Math.ceil(numRows / numPerPage);
  //리스트가 없으면 종료
  if (numPages==0) return;
  //pager라는 클래스의 div엘리먼트 작성
  var $pager = $('<td align="center" id="remo" colspan="10"><div class="pager"></div></td>');
  
  var nowp = currentPage;
  var endp = nowp+10;
  
  //페이지를 클릭하면 다시 셋팅
  $table.bind('repaginate', function() {
  //기본적으로 모두 감춘다, 현재페이지+1 곱하기 현재페이지까지 보여준다
  
   $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
   $("#remo").html("");
   
   if (numPages > 1) {     // 한페이지 이상이면
    if (currentPage < 5 && numPages-currentPage >= 5) {   // 현재 5p 이하이면
     nowp = 0;     // 1부터 
     endp = pagesu;    // 10까지
    }else{
     nowp = currentPage -5;  // 6넘어가면 2부터 찍고
     endp = nowp+pagesu;   // 10까지
     pi = 1;
    }
    
    if (numPages < endp) {   // 10페이지가 안되면
     endp = numPages;   // 마지막페이지를 갯수 만큼
     nowp = numPages-pagesu;  // 시작페이지를   갯수 -10
    }
    if (nowp < 1) {     // 시작이 음수 or 0 이면
     nowp = 0;     // 1페이지부터 시작
    }
   }else{       // 한페이지 이하이면
    nowp = 0;      // 한번만 페이징 생성
    endp = numPages;
   }
   // [처음]
   $('<br /><span class="page-number dobule_icon" cursor: "pointer"><i class="fas fa-angle-double-left  icons"></i></span>').bind('click', {newPage: page},function(event) {
          currentPage = 0;   
          $table.trigger('repaginate');  
          $($(".page-number")[2]).addClass('active').siblings().removeClass('active');
      }).appendTo($pager).addClass('clickable');
    // [이전]
      $('<span class="page-number signle_icon" cursor: "pointer">&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-left icons"></i>&nbsp;</span>').bind('click', {newPage: page},function(event) {
          if(currentPage == 0) return; 
          currentPage = currentPage-1;
    $table.trigger('repaginate'); 
    $($(".page-number")[(currentPage-nowp)+2]).addClass('active').siblings().removeClass('active');
   }).appendTo($pager).addClass('clickable');
    // [1,2,3,4,5,6,7,8]
   for (var page = nowp ; page < endp; page++) {
    $('<span class="page-number numbers" cursor: "pointer" style="margin-left: 8px; "></span>').text(page + 1).bind('click', {newPage: page}, function(event) {
     currentPage = event.data['newPage'];
     $table.trigger('repaginate');
     $($(".page-number")[(currentPage-nowp)+2]).addClass('active').siblings().removeClass('active');
     }).appendTo($pager).addClass('clickable');
   } 
    // [다음]
      $('<span class="page-number signle_icon" cursor: "pointer">&nbsp;&nbsp;&nbsp;<i class="fas fa-angle-right icons"></i>&nbsp;</span>').bind('click', {newPage: page},function(event) {
    if(currentPage == numPages-1) return;
        currentPage = currentPage+1;
    $table.trigger('repaginate'); 
     $($(".page-number")[(currentPage-nowp)+2]).addClass('active').siblings().removeClass('active');
   }).appendTo($pager).addClass('clickable');
    // [끝]
   $('<span class="page-number dobule_icon" cursor: "pointer">&nbsp;<i class="fas fa-angle-double-right icons"></i></span>').bind('click', {newPage: page},function(event) {
           currentPage = numPages-1;
           $table.trigger('repaginate');
           $($(".page-number")[endp-nowp+1]).addClass('active').siblings().removeClass('active');
   }).appendTo($pager).addClass('clickable');
     
     $($(".page-number")[2]).addClass('active');
reSortColors($table);
  });
   $pager.insertAfter($table).find('span.page-number:first').next().next().addClass('active');   
   $pager.appendTo($table);
   $table.trigger('repaginate');
 });
}
function xssthis(origin) {
return origin.replace(/\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-/g, "");
}
