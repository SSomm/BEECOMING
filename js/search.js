$(document).ready(function(){
	$(".shop_more_btn_search").click(function(){
		var keyward = $(this).data("keyward");
		$.ajax({
			type:"POST",
			data:{keyward:keyward,div:"shop_more"},
			url:"./php/search_json.php",
			dataType:"json",
			success:function(response){
				var div = ``;
				$.each(response.result,function(key,value){
					var imgarr = value.product_thumb.split(",");
					div += `<div class="shop_main_item">
								<div class="shop_item_img">
									<img src="./category_img/${value.category}/${imgarr[0]}" alt="img">
								</div>
								<div class="shop_item_info">
									<p>${value.product_brand}</p>
<p>${value.product_name}</p>
<p>${value.product_price}</p>
								</div>
							</div>`;
				});
				$(".shop_main").html(div);
				$(".shop_main").css("height","auto");
				$(".shop_body").css("height","auto");
				$(".search_shop").css("height","auto");
				$(".search_cuartor").hide();
				$(".search_board").hide();
				$(".search_shop").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});


	$(".cutator_more_btn_search").click(function(){
		var keyward = $(this).data("keyward");
		$.ajax({
			type:"POST",
			data:{keyward:keyward,div:"cuator_more"},
			url:"./php/search_json.php",
			dataType:"json",
			success:function(response){
				var div = ``;
				$.each(response.result,function(key,value){
					div += `<div class="curator_card">
							<div class="curator_back">
								<img src="${value.cupage_img}" alt="img">
								<h3>${value.page_title}</h3>
							</div>
							<div class="curator_info">
								<div class="circle search_circle_cuator">
									<img src="${value.profile_img}" alt="img">
								</div>
								<p>서비스 ${value.service_count}회</p>
							</div>
						</div>`;
				});
				$(".curator_body").html(div);
				$(".curator_body").css("height","auto");
				$(".search_cuartor").css("height","auto");
				// $(".search_shop").css("height","auto");
				$(".search_shop").hide();
				$(".search_board").hide();
				$(".search_cuartor").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});


	$(".board_more_btn_search").click(function(){
		var keyward = $(this).data("keyward");
		$.ajax({
			type:"POST",
			data:{keyward:keyward,div:"board_more"},
			url:"./php/search_json.php",
			dataType:"json",
			success:function(response){
				var div = ``;
				$.each(response.result,function(key,value){
					var hasharr = value.boardhash.split(",");
					div += `<div class="item_board">
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
									<div class="view_hash different">`		
								
								for(var i=0;i<hasharr.length; i++){ 
									div += `<span>#${hasharr[i]}</span>&nbsp;`;
								}
									
						div += `</div>

								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<img src="${value.m_profile}" alt="img">
										</div>
									</div>
									<p>${value.m_nickname}</p>`;

									if(value.curator == "1"){
										div += `<div class="bal">
										<div class="balloon cr_flag">
											<p>CR</p>
										</div>
									</div>`;
									}			
								div += `</div>
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
							</div>`;

				});
				$(".board_list_items").html(div);
				$(".item_img_wrap > img").css("height","100%");
				// $(".curator_body").css("height","auto");
				// $(".search_cuartor").css("height","auto");
				// $(".search_shop").css("height","auto");
				$(".search_shop").hide();
				$(".search_cuartor").hide();
				$(".search_board").show();
			},error:function(request,status,error){
        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
       }
		});
	});


	$(document).on("click", ".shop_item_img>img", function(){

		var num=$(this).data("num");
		location.href="./categoryDetail.php?product_num="+num;
	});
	$(document).on("click", ".shop_item_info>p", function(){

		var num=$(this).data("num");
		location.href="./categoryDetail.php?product_num="+num;

	});


});

