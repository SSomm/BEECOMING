
$(document).ready(function(){
		$(".cart_circle_btn").click(function(){
			// alert("a");
			var src = $(this).parent("div").children(".shop_item_div_img").children("img").attr("src");
			// alert(src);
			$(".cart_ul").append(`<li><img src="${src}" alt="img"></li>`);
			var itemLength = findElement.find(" > li").length;
		});






		var findElement = $(".roglling").find(">ul");
		var itemLength = findElement.find(" > li").length;
		var prev = $(".cart_up > i");
		var next = $(".cart_down > i");
		var timer = 0;
		var speed = 3000;
		var move = 320;
		function moveNextSlide(){
	      var firstChild = findElement.children().filter(":first-child").clone(true);
	      firstChild.appendTo(findElement);
	      findElement.children().filter(":first-child").remove();
	      findElement.css("left","0");
	      // findElement.animate({"top":"-"+move+"px"},"normal");
    	}
    	function movePrevSlide(){
	      var lastChild = findElement.children().filter(":last-child").clone(true);
	      lastChild.prependTo(findElement);
	      // findElement.css("left","-"+move+"px");
	      findElement.children().filter(":last-child").remove();
	      // findElement.animate({"top":"0"},"normal");
	    }
	    $(".cart_up").click(function(){
	    	moveNextSlide();
	    });
	    $(".cart_down").click(function(){
	    	movePrevSlide();
	    });

	    //쉼표찍기
	    function numberWithCommas(x) {
//    alert(x);
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

$(".detail_cate_menu>nav>ul>li").on("click", function(){
		var cate=$(this).children("a").text();
		if(cate=="전체"){
			location.href="./category.php";
		}else{
			location.href="./category.php?cate="+cate;
		}
		

});	
	// $(".cate_menu > nav > ul > li ").click(function(){
		$(document).on("click", ".cate_menu>nav>ul>li", function(){
			// location.href="./category.php";
			// history.back();
		$(".li_line").remove();
		$(".cate_menu > nav > ul > li > .li_line").remove();
		$(".cate_menu > nav > ul > li > a").css("color", "black");
		$(this).children("a").css("color", "#ee1e73");
			var category=$(this).children("a").text();
		$(this).append('<div class="li_line"></div>');
		if($(".category_section").is(":visible")){
			
			$(".category_section").stop().slideUp();
			$(".cate_menu > nav > ul > li > .li_line").remove();
		}else{
			// $(this).children("a").css("color", "gray");
			$(".category_section").stop().slideDown();

		}
			if(category=="의류"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/clothes.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("의류");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>의류</h2>");
						
					}	
				
				$(".sali_bottom").hide();
				$(".event_section").hide();

				
				$(".shop_item").remove();
				var cate="clothes";
				// alert(cate);
					var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}" >${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="슈즈"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/shoes.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("슈즈");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>슈즈</h2>");
						
					}	
				$(".sali_bottom").hide();
				$(".event_section").hide();
				
				$(".shop_item").remove();
				var cate="shoe";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="패션소품"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/accessories.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("패션소픔");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>패션소품</h2>");
						
					}	
				$(".sali_bottom").hide();
				$(".event_section").hide();
								
				$(".shop_item").remove();
				var cate="fashion_acc";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="메이크업"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/makeupset.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("메이크업");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>메이크업</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();
				
				$(".shop_item").remove();
				var cate="makeup";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="향수"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/perfume.png");
					var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("향수");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>향수</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();
			
				$(".shop_item").remove();
				var cate="perfume";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="디퓨저&스프레이"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/spray.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("디퓨저&스프레이");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>디퓨저&스프레이</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();
			
				$(".shop_item").remove();
				var cate="diffuser";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="플라워"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/flowers.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("플라워");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>플라워</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();
				
				$(".shop_item").remove();
				var cate="flowers";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="차/커피/음료"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/tea.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("차/커피/음료");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>차/커피/음료</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();
								
				$(".shop_item").remove();
				var cate="tea";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="디지털용품"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/digital.png");
				var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("디지털용품");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>디지털용품</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();
			
				$(".shop_item").remove();
				var cate="digital";
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}

			if(category=="쥬얼리&시계"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/jewels.png");
			var cate=$(".sali_top>h2").text();
					if(cate=="전체"){
						$(".sali_top>h2").text("쥬얼리&시계");
					}else{
						$(".sali_top>h2").hide();
						$(".sali_top").html("<h2>쥬얼리&시계</h2>");
						
					}
				$(".sali_bottom").hide();
				$(".event_section").hide();

				
				$(".shop_item").remove();
				var cate="jewels";
				// alert(cate);
					var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}" >${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
			if(category=="전체"){
				$('.sali_rank_slick').slick('unslick');
				// $(".sali_rank_slick div").remove();
				$(".rank_shop_item").remove();
				$(".cuator_main_section>img").attr("src", "category_img/all.png");
				$(".sali_top>h2").text("전체");
				$(".sali_bottom").hide();
				$(".event_section").hide();
				
				$(".shop_item").remove();
				var cate="all";
				// alert(cate);
				// alert(cate);
					var list="";
				var list="";
				$.ajax({
					type:"POST",
					url:"./php/shop_cate_sel.php",
					data:{cate:cate},
					dataType:"json",
					success:function(response){				
							var new_rank="";
							$.each(response.rank, function(key, value){
								// alert("aa");
								new_rank+=`<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="${value.product_thumb}" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="${value.product_num}">
											<div class="hover_title">
												<h3>${value.product_name}</h3>
											</div>
											<div class="hover_info">
												<p>판매가 : ${value.product_price}</p><br>
												`;
												
												if(value.product_drice){												
												
												new_rank +=`<p>할인판매가 : ${value.product_drice}<span style="color: red;">${value.sale_percent}</span></p>`;
												
												}	
												
											new_rank +=`</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p>${value.product_view_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p>${value.product_sel_num}</p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><${value.product_review_num}</p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;${value.product_brand}</p>
										<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
										<p class="p_price">${value.product_price}</p>

									</div>
									<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>`;

								

							});
							$(".sali_rank_slick").html(new_rank);

							//20190602 서정현 수정
				$(".sali_rank").show();
				$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});

						

						$.each(response.shopping, function(key, value){

							list += `<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="${value.product_thumb}" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="${value.product_num}">
									<div class="hover_title">
										<h3>${value.product_name}</h3>
									</div>
									<div class="hover_info">
										<p>판매가 :${value.product_price}</p><br>`;

										if(value.product_drice){
										
										list+=`<p>할인판매가 : ${value.product_drice} <span style="color: red;">${value.sale_percent}</span></p>`;
									}else{}
		
										list+=`</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p>${value.product_view_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p>${value.product_sel_num}</p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p>${value.product_review_num}</p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> ${value.product_brand}</p>
								<p class="p_name" data-num="${value.product_num}">${value.product_name}</p>
								<p class="p_price">${value.product_price}</p>

							</div>
							<div class="circle cart_circle_btn" data-num="${value.product_num}" data-id="${value.user_id}">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>`;

						});
						$(".shop_body").html(list);

					},
				})
			}
	});


	var b_flag = 0;
	$(".brand").click(function(){
		if(b_flag == 0){
			$(this).children(".remocon_sub").slideDown();
			b_flag = 1;
		}else{
			$(this).children(".remocon_sub").slideUp();
			b_flag = 0;
		}

	});


	$(document).on("mouseover", ".shop_item_div_img", function(){

		$(this).children(".hover_div").stop().fadeIn();
	});


	$(document).on("mouseleave", ".shop_item_div_img", function(){
		$(this).children(".hover_div").stop().fadeOut();
	});
	
	
	$('.cart_circle_info').click(function(){
		if($(".bal").is(":visible")){
			$(".bal").hide();
		}else{
			$(".bal").show();

		}
	});

	$(document).on("click", ".p_name", function(){

		var product_num=$(this).attr("data-num");
		// alert(product_num);

		location.href="categoryDetail.php?product_num="+product_num;
	});
	$(document).on("click", ".hover_div", function(){
		var product_num=$(this).attr("data-num");
		// alert(product_num);

		location.href="categoryDetail.php?product_num="+product_num;
	});



	$(".sub_img>img").on("mouseover", function(){
		var now_thumb=$(this).attr("src");
		// alert(now_thumb);
		$(".body_left_main_img>img").attr("src", now_thumb);
	});


	//상세페이지 이미지 슬라이드
		//섬네일 이미지 쪼개기
	var thumbs=$(".sub_img>img").length;
	// alert(thumbs);
	var aa=0;
	var thumbb=new Array(thumbs);
	$(".sub_img>img").each(function(){
		thumbb[aa]=$(this).attr("src");
		aa++;
	});
	var bb=0;
	//슬라이드 인터벌
	setInterval(function(){
		bb++;
		if(bb==thumbs){
			bb=0;
		}
		// alert(bb);
		$(".body_left_main_img>img").attr("src", thumbb[bb]);
		// alert(bb);
		// bb++;
	},1000);


	$(document).on("click", ".cart_circle_btn", function(){
			var cart_p=$(this).attr("data-num");
			var cart_u=$(this).attr("data-id");
			var cart_lists="";
			var cart_count=0;
			// alert("a");
			if(cart_u==""){
				alert("로그인 하셔야만 장바구니 기능을 이용하실 수 있습니다.");
			}else{
				$.ajax({
				type:"POST",
				url:"./php/cart_insert.php",
				dataType:"json",
				data:{cart_p:cart_p, cart_u:cart_u},
				success:function(response){
					if(response.double){
						alert("먼저 상품 옵션을 선택하셔야 합니다.");
					}else{
						alert("제품이 장바구니에 담겼습니다.");
					$(".cart_ul>li").remove();
					$.each(response.shopping,function(key,value){
						cart_count+=1;
						cart_lists+=`<li><img src="${value.product_thumb}"></li>`;
					});
						$(".cart_ul").append(cart_lists);
						$(".cart_circle_number>p").text(cart_count);
					}									
				},
				error:function(request,status,error){
      			  alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
    			 }
     
			})	
			}
	});

	//상세페이지에서 장바구니
	$(document).on("click", ".gocart_btn", function(){
			var cart_p=$(this).attr("data-num");
			var cart_u=$(this).attr("data-id");
			var cart_lists="";
			// alert("a");
			var product_option=$(".detail_option option:selected").val();
			var p_opt_detail1=$(".detail1 option:selected").val();
			var p_opt_detail2=$(".detail2 option:selected").val();
			var p_count=$(".count").val();

			if(cart_u==""){
				alert("로그인 하셔야만 장바구니 기능을 이용하실 수 있습니다.");
			}else{

				if(p_count==0){
					alert("수량을 1개 이상 입력하세요.");

				}else{
					$.ajax({
				type:"POST",
				url:"./php/cart_insert.php",
				dataType:"json",
				data:{cart_p:cart_p, cart_u:cart_u, product_option:product_option, p_opt_detail1:p_opt_detail1, p_opt_detail2:p_opt_detail2, p_count:p_count},
				success:function(response){
					// alert(response);
					alert("제품이 장바구니에 담겼습니다.");
					$(".cart_ul>li").remove();
					$.each(response.shopping,function(key,value){
						cart_lists+=`<li><img src="${value.product_thumb}"></li>`;
					});
						$(".cart_ul").append(cart_lists);
					// if(response=="success"){
						// var remote_cart=``;
						// $(".cart_ul").appned()
					// }else{
						// alert("상품이 장바구니에 담기지 않았습니다.")
					// }					
				},
				error:function(request,status,error){
      			  alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
    		   }
     
					})	
				}

			
			}

	});	


	//수량변경 이벤트
	$(document).on("change", ".count", function(){

		var count=$(this).val();

		if(count>=1){
			var pp=$(this).parent(".item_spinner").parent(".body_list_item").children(".item_info").children(".item_info_bottom").children(".final_money").text();
			
			var pp_n=pp.replace(/[^0-9]/g,"");
			var pp=Number(pp_n);

			var result_p=pp*count;
			$(this).parent(".item_spinner").parent(".body_list_item").children(".item_prcie").children("h4").text(numberWithCommas(result_p)+"원");
			$(this).attr("value",count);
			//배송비 계산
	var d_num=new Array();
	var n=0;
	$(".item_delivery>h4").each(function(){

		d_num[n]=$(this).text().replace(/[^0-9]/g,"");
		n++;
	});

	var z=0;
	var d_total=0;
	for(z=0;z<d_num.length;z++){

		d_total=d_total+Number(d_num[z]);
	}
	
	//선택 상품 금액
	var p_price=new Array();
	var va=0;
	$(".item_prcie>h4").each(function(){

		p_price[va]=$(this).text().replace(/[^0-9]/g,"");
		va++;
	});

	var y=0;
	var p_total=0;
	for(y=0;y<p_price.length;y++){
		p_total=p_total+Number(p_price[y]);
	}

	$(".select_price").text(numberWithCommas(p_total)+"원");

	var pro_p=$(".select_price").text().replace(" ","");

	var sel_pro_p=pro_p.replace(/[^0-9]/g,"");


	$(".delivery_price").text(numberWithCommas(d_total)+"원");
	//총 배송비
	var del_p=$(".delivery_price").text().replace(" ","");
	var sel_de_p=del_p.replace(/[^0-9]/g,"");

	// alert(sel_pro_p);
	// alert(sel_de_p);
	var total_order_p=Number(sel_pro_p)+Number(sel_de_p);
	// alert(total_order_p);
	$(".end_this_price").text(numberWithCommas(total_order_p)+" 원");
		}


	});
	//수량변경 버튼
	$(document).on("click", ".count_ch", function(){

			var count_ch=$(this).parent(".item_spinner").children(".count").attr("value");
			var cart_pnum=$(this).attr("data-num");
			// alert(count_ch);
			// alert(cart_pnum);

			$.ajax({
				type:"POST",
				url:"./php/cart_cnt_update.php",
				data:{count_ch:count_ch,cart_pnum:cart_pnum},
				success:function(response){
					// alert(response);
					if(response=="success"){
						alert("수량변경완료!");
					}else{
						return false;
					}
				}
			})
	});

	//전체 선택 체크박스
	$(document).on("change", "#all_check", function(){
		// var q=0;
		if($(this).is(":checked")==true){
			$("input[name=check]:checkbox").each(function(){
			$("input:checkbox[name='check']").prop("checked", true);
		});
		}else{
			$("input[name=check]:checkbox").each(function(){
			$("input:checkbox[name='check']").prop("checked", false);
		});
		}
		
	});

	// 
	var cart_del_p=new Array();

	//선택 삭제
	$(document).on("click", ".shooping_btn", function(){
		var i="";
		// $(this).$(".body_list_item").remove();
		var answer=confirm("선택한 상품을 정말로 삭제하시겠습니까?");

		if(answer){

		$(".item_check>input:checkbox[name='check']").each(function(){
			// count_tp[r]=$(this).parent(".item_check").parent(".body_list_item").children(".item_spinner").children(".count").val();
		
		if($(this).prop("checked")==true){
			$(this).parent(".item_check").parent(".body_list_item").remove();
			i=i+$(this).attr("data-num")+",";
		}	
	});
			cart_del_p=i.split(",");
			var json_cart=JSON.stringify(cart_del_p);

			// var lists="";
			// var k=0;
			$.ajax({
				type:"POST",
				url:"./php/cart_delete.php",
				data:{data:json_cart},
				success:function(response){
					// alert(response);
					if(response=="success"){
						
					var d_num=new Array();
	var n=0;
	$(".item_delivery>h4").each(function(){

		d_num[n]=$(this).text().replace(/[^0-9]/g,"");
		n++;
	});

	var z=0;
	var d_total=0;
	for(z=0;z<d_num.length;z++){

		d_total=d_total+Number(d_num[z]);
	}
	
	//선택 상품 금액
	var p_price=new Array();
	var va=0;
	$(".item_prcie>h4").each(function(){

		p_price[va]=$(this).text().replace(/[^0-9]/g,"");
		va++;
	});

	var y=0;
	var p_total=0;
	for(y=0;y<p_price.length;y++){
		p_total=p_total+Number(p_price[y]);
	}

	$(".select_price").text(numberWithCommas(p_total)+"원");

	var pro_p=$(".select_price").text().replace(" ","");

	var sel_pro_p=pro_p.replace(/[^0-9]/g,"");


	$(".delivery_price").text(numberWithCommas(d_total)+"원");
	//총 배송비
	var del_p=$(".delivery_price").text().replace(" ","");
	var sel_de_p=del_p.replace(/[^0-9]/g,"");

	// alert(sel_pro_p);
	// alert(sel_de_p);
	var total_order_p=Number(sel_pro_p)+Number(sel_de_p);
	// alert(total_order_p);
	$(".end_this_price").text(numberWithCommas(total_order_p)+" 원");
					}
		}
	})
		}else{
			return false;
		}

});

	//선택상품 주문하기
	$(document).on("click", ".order_divs_btn", function(){
		
		var each_i = 0;
		$(".body_list_item").each(function(){
			each_i++;
		});

		var price=new Array();
		var point;
		var product_num;
		var price_onlynum;
		var result = new Array(each_i);
		var success_flag=new Array();
		var i=0;
		$(".body_list_item").each(function(){
			//상품번호
			result[i] = new Array();
			result[i][0] = $(this).children(".item_check").children(".check").attr("data-pnum");
			price=$(this).children(".item_prcie").children("h4").text();
			result[i][1] = price.replace(/[^0-9]/g,"");
			result[i][2] = parseInt(result[i][1]*0.005);
			result[i][3] = $(this).data("pmnum");
			result[i][4] = $(this).data("cartnum");
			result[i][5] = $(this).data("pseller");
			i++;
		});
		// alert(result[0][2]);
		if(i==0){
			alert("장바구니에 상품이 없습니다.");
			return false;
		}else{
			$.ajax({
				type:"POST",
				url:"./php/buyrecord_insert.php",
				data:{result:result},
				success:function(response){
					// alert(response);
					alert("주문하기 성공!");
					$(".body_list_item").remove();
					$(".select_price").text("0 원");
					$(".delivery_price").text("0 원");
					$(".end_this_price").text("0 원");
					// $(".order_list_modal").show();
						// alert(response);
						var order_list="<thead></thead>";
						var u=0;
						var purchase_num=0;
					$.ajax({
						type:"POST",
						url:"./php/order_list_all.php",
						dataType:"json",
						data:{response:response},
						success:function(data){
							// alert(data);
						$.each(data.list, function(key, value){
							// alert(value.product_name);
							product_num=value.product_num;
							purchase_num=value.purchase_num;
							order_list+=`<tr>
							<td>
								<div class="table_check">
									<input type="checkbox" id="table_item_check${u}" class="purchase_com" data-purchasenum="${value.purchase_num}" data-pmnum="${value.pm_num}" data-num="${value.product_num}">
									<label for="table_item_check${u}">
									</label>
								</div>
								<div class="table_item_img">
									<img src="${value.product_thumb}" alt="img">
								</div>
								<div class="table_item_info">
									<div class="table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_money}원</p>
									</div>
								</div>
								<div class="table_item_btnes">
									<button class="refund_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">환불신청</button>
									<button class="exchange_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">교환신청</button>
									<button class="purchase_btn" style="background: #ee1e72" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">구매확정</button>
								</div>
							</td>
						</tr>`;

						u++;
							});
						$(".review_success_1").attr("data-date", response);
						$(".review_success_1").attr("data-num", product_num);
						$(".review_success_1").attr("data-purchasenum", purchase_num);
						$(".order_list_table").html(order_list);
						page();
						$(".order_list_modal").show();						
						},error:function(request,status,error){
		       			 alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		      		 }

					});
				}	
			})
		}
		
	});

	//구매확정 -> 구매후기 
	$(document).on("click", ".purchase_btn", function(){
		var product_num=$(this).data("num");
		var pm_num=$(this).data("pmnum");
		var purchase_num=$(this).data("purchasenum");

		var answer=confirm("상품 후기를 작성하시겠습니까?");
		if(answer){

				var review_form="";
		// alert()
		$.ajax({
			type:"POST",
			url:"./php/review_form.php",
			data:{product_num:product_num, pm_num:pm_num, purchase_num:purchase_num},
			dataType:"json",
			success:function(response){
				// alert(response.review);
				$.each(response.review, function(key, value){
					// review_form+=``;
					// alert(value.product_name);
					// alert(value.product_money);
					// alert(value.purchase_date);
					// alert(value.product_brand);
					$(".review_img>img").attr("src", value.product_thumb);
					$(".review_product_name>p").html(`${value.product_name}`);
					$(".review_money>p").html(`${value.product_money}원`);
					$(".purchase_date_review>p").html(`${value.purchase_date}`);
					$(".review_brand>p").html(`# ${value.product_brand}`);
					$(".review_success_1").attr("data-num", product_num);
					$(".review_success_1").attr("data-purchasenum", value.purchase_num);

				});
				$(".review_title").val("");
				CKEDITOR.instances.review_area.setData("");
				$('.openraido').prop("checked",false);
				$(".order_list_modal").hide();
				$(".product_review_modal").show();
			}
		})

		}else{

			$.ajax({
				type:"POST",
				url:"./php/purchase_complete.php",
				data:{purchase_num:purchase_num},
				success:function(response){
					alert("구매 확정이 완료되었습니다.");
				}

			})
		}
	});


	//교환신청 클릭시



	//환불신청 클릭시




	//마이페이지에서 상품 상세 
	$(".brandn_c").on("click", function(){
		var num=$(this).attr("data-num");
		// alert(num);
		location.href="./categoryDetail.php?product_num="+num;
	});
	$(".item_img_div>img").on("click", function(){
		var num=$(this).attr("data-num");
		// alert(num);
		location.href="./categoryDetail.php?product_num="+num;
	});

//옵션 동적 추가
	$(document).on("change", ".detail_option", function(){
		var num=$(this).attr("data-num");
		// alert(num);
		var option_detail_box="";
		$.ajax({
			type:"POST",
			url:"./php/option_dynamic.php",
			dataType:"json",
			data:{num:num},
			success:function(response){
				$(".detail1").remove();
				// alert(response.option);
				option_detail_box+=`<select class="detail1" data-num="`+num+`">
											<option>선택하기</option>`;
				$.each(response.option, function(key, value){
					// alert(value.pm_num);
					if(value.p_opt_detail1){

						option_detail_box+=`<option value="${value.p_opt_detail1}">${value.p_opt_detail1}</option>`;
			
					}
					// if(value.p_opt_detail2){
					// 	option_detail_box+=`<option>${value.p_opt_detail2}</option>`;
					// }
				});
					option_detail_box+=`</select>`;
					// alert(option_detail_box);
					$(".detail_option").parent("td").append(option_detail_box);
			}
		})
	});
	//옵션 동적 추가
	$(document).on("change", ".detail1", function(){
		var num=$(this).attr("data-num");
		// alert(num);
		var detail2=new Array();
		var option_detail_box="";
		$.ajax({
			type:"POST",
			url:"./php/option_dynamic.php",
			dataType:"json",
			data:{num:num},
			success:function(response){
				$(".detail2").remove();
				// alert(response.option);
				if(response.option.p_opt_detail2){
			
				option_detail_box+=`<select class="detail2" data-num=`+num+`">
											<option>선택하기</option>`;
				$.each(response.option, function(key, value){
					// alert(value.p_opt_detail2);

					if($.inArray(value.p_opt_detail2, detail2)===-1){
						// option_detail_box+=`<option>${value.p_opt_detail2}</option>`;
						detail2.push(value.p_opt_detail2);
					}

					// if(value.p_opt_detail2){
					// 	option_detail_box+=`<option>${value.p_opt_detail2}</option>`;
					// }
				});
				$.each(detail2, function(key, value){

					option_detail_box+=`<option value="${value.p_opt_detail2}">${detail2}</option>`;
				
				});

					option_detail_box+=`</select>`;

					// alert(option_detail_box);
					$(".detail1").parent("td").append(option_detail_box);
				}
			}
		})
	});

//상세페이지 이미지 출력 제어
$(".detail_main_img img").css("max-width","780px");
	//상세페이지 내에 즉시구매 버튼 클릭시
	$(document).on("click", ".dr_btn", function(){
		// var each_i = 0;		
		// var price=new Array();
		var id=$(this).attr("data-id");
		var product_count=$(".count").val();
		// alert(product_count)
		var drice=$(".sell_p_d").text();
		
		var product_drice=drice.split("[");
		var product_price=$(".sell_p_p").text();

		if(product_drice[0]){
			var price=product_drice[0];
		}else{
			var price=product_price;
		}
		// var product_num;		
		var price_onlynum;
		price_onlynum=parseInt(price.replace(/[^0-9]/g,""));
		var point=parseInt(price_onlynum*0.005);
		// alert(point);
		var product_num=$(this).attr("data-num");
		var product_option=$(".detail_option option:selected").val();

		var p_opt_detail1=$(".detail1 option:selected").val();
		var p_opt_detail2=$(".detail2 option:selected").val();

		// alert(product_option);
		var order_box_list="";
		// alert("aa");
		var u=0;
			if(product_count!="0"){

				$.ajax({
				// alert("aa");
				type:"POST",
				url:"./php/dr_buy_record.php",
				// dataType:"json",
				data:{point:point, price_onlynum:price_onlynum, product_num:product_num, product_option:product_option, p_opt_detail1:p_opt_detail1,p_opt_detail2:p_opt_detail2,product_count:product_count},
				success:function(response){
					// alert(response);
					purchase_num=response;
					if(response){
						alert("상품 구매 성공!");
						$(".order_list_modal").fadeIn();
						$(".order_box").remove();

						$.ajax({
							type:"POST",
							url:"./php/order_list.php",
							data:{product_num:product_num, response:response},
							dataType:"json",
							success:function(response){
								// alert(response);
								$.each(response.list, function(key, value){
									order_box_list+=`<tr class="order_box">
							<td>
								<div class="table_check">
									<input type="checkbox" id="table_item_check${u}">
									<label for="table_item_check${u}">
									</label>
								</div>
								<div class="table_item_img">
									<img src="${value.product_thumb}" alt="img">
								</div>
								<div class="table_item_info">
									<div class="table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="table_item_info_body">`;

									if(value.product_drice){
										order_box_list+=`<p>${value.product_drice}</p>`;

									}else{
										order_box_list+=`<p>${value.product_price}</p>`;	
									}										

									order_box_list+=`</div>
								</div>
								<div class="table_item_btnes">
									<button class="refund_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">환불신청</button>
									<button class="exchange_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">교환신청</button>
									<button class="purchase_btn" style="background: #ee1e72" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">구매확정</button>
								</div>
							</td>
						</tr>`;

							});

								$(".order_list_table").html(order_box_list);
								$(".review_success").attr("data-purchasenum",purchase_num);
								$(".review_success").attr("data-num",product_num);
							}

						})
					}else{
						// alert(response);
						alert("상품 구매 실패!");
						// return false;
					}
				}
			})

			}else{
				alert("수량을 1개 이상 입력하세요.");
			}

			
	});


	//장바구니에서 바로 주문
	$(".dirent_order").on("click", function(){
		var product_num=$(this).data("num");
		var pmnum=$(this).data("pmnum");
		var cart_num=$(this).data("cartnum");
		var product_count=$(".count").val();
		// alert(product_count)
		var price=$(".final_money").text();		
		var price_onlynum;
		price_onlynum=parseInt(price.replace(/[^0-9]/g,""));
		var point=parseInt(price_onlynum*0.005);
		// alert(price_onlynum);
		// alert(point);

		if(product_count==0){
			alert("수량이 1개 이상일 때 바로 주문 가능합니다.");
		}else{
			$.ajax({
				// alert("aa")
				type:"POST",
				url:"./php/dr_buy_record.php",
				data:{point:point, price_onlynum:price_onlynum, product_num:product_num,	cart_num:cart_num ,pmnum:pmnum, product_count:product_count},
				success:function(response){
					if(response=="success"){
						alert("즉시 구매 성공!");
						location.reload();
					}else{
						alert(response);
						alert("즉시 구매 실패!");
						return false;
					}

				}

			})
		}


	});


	 $(".review_success").click(function(){
	 	var num = $(this).attr("data-num");
	 	var purchase_num=$(this).data("purchasenum");
	 	// alert(num);
	 	CKupdate();
	 	var radio_check = $('input:radio[name=open_or_notopen]').is(':checked');
	 	 var bodytext =  CKEDITOR.instances.review_area.getData();
	 	 var review_title=$(".review_title").val();
	 	// alert(radio_check);
	 	if(review_title==""){
	 		review_title=$(".review_title_1").val();
	 	}
	 	if(radio_check == false || $(".review_title_1").val() == "" || bodytext == "" ){
	 		alert("제목, 공개여부, 본문 내용을 모두 입력하셔야 합니다.");
	 	}else{
	 		 var radioVal = $('input[name="open_or_notopen"]:checked').val();
	 		 var title = $(".review_title_1").val();
	 		
	 		
	 		// alert(title);
	 		$.ajax({
	 			type:"POST",
	 			data:{num:num, purchase_num:purchase_num, bodytext:bodytext,open:radioVal, review_title:review_title},
	 			url:"./php/review_insert.php",
	 			success:function(response){
	 					// alert(response);
	 				if(response == "success"){
	 					alert("후기 등록 성공");
	 					location.reload();

	 				}else{
	 					alert("후기 등록 실패");
	 					return false;
	 				}
	 			}

	 		});
	 	}
	 });

	  $(".review_success_1").click(function(){
	 	var num = $(this).attr("data-num");
	 	var date =$(this).attr("data-date");
	 	var purchase_num=$(this).attr("data-purchasenum");
	 	// alert(purchase_num);
	 	// $(this).attr("data-num", num);
	 	// $(".")
	 	// alert(num);
	 	CKupdate();
	 	var radio_check = $('input:radio[name=open_or_notopen]').is(':checked');
	 	 var bodytext =  CKEDITOR.instances.review_area.getData();
	 	 var review_title=$(".review_title").val();
	 	// alert(radio_check);
	 	if(review_title==""){
	 		review_title=$(".review_title_1").val();
	 	}
	 	if(radio_check == false || $(".review_title_1").val() == "" || bodytext == "" ){
	 		alert("제목, 공개여부, 본문 내용을 모두 입력하셔야 합니다.");
	 	}else{
	 		 var radioVal = $('input[name="open_or_notopen"]:checked').val();
	 		 var title = $(".review_title_1").val();
	 		var u=0;
	 		var order_list="";
	 		// alert(title);
	 		$.ajax({
	 			type:"POST",
	 			data:{num:num, title:title,bodytext:bodytext,open:radioVal, review_title:review_title, purchase_num:purchase_num},
	 			url:"./php/review_insert.php",
	 			success:function(response){
	 					// alert(response);
	 				if(response == "success"){
	 						$.ajax({
						type:"POST",
					url:"./php/order_list_all.php",
						dataType:"json",
						data:{response:date },
						success:function(data){
							// alert(data);
							
							// alert(data.list);
							if(data.list != ""){
								alert("후기 등록 성공");
								$.each(data.list, function(key, value){
							// alert(value.product_name);
							purchase_date=value.purchase_date;
							product_num=value.product_num;
							purchase_num=value.purchase_num;
							order_list+=`<tr>
							<td>
								<div class="table_check">
									<input type="checkbox" id="table_item_check${u}">
									<label for="table_item_check${u}">
									</label>
								</div>
								<div class="table_item_img">
									<img src="${value.product_thumb}" alt="img">
								</div>
								<div class="table_item_info">
									<div class="table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_money}원</p>
									</div>
								</div>
								<div class="table_item_btnes">
									<button class="refund_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">환불신청</button>
									<button class="exchange_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">교환신청</button>
									<button class="purchase_btn" style="background: #ee1e72" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">구매확정</button>
								</div>
							</td>
						</tr>`;

						u++;
							});
						// $(".review_success_1").attr("data-date", purchase_date);
						// $(".review_success_1").attr("data-num", product_num);
						// $(".review_success_1").attr("data-purchasenum", purchase_num);
						$(".order_list_table").html(order_list);
						page();$(".product_review_modal").hide();
						$(".order_list_modal").show();	
					}else{
						alert("모든 상품의 후기를 작성했습니다.");
						$(".order_list_modal").hide();
						$(".product_review_modal").hide();
					}
											
						},error:function(request,status,error){
		       			 alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
		      		 }




		      		 	});


	 					
	 					// location.reload();
	 					
	 					// $(".")
	 					
	 				}else{
	 					alert("후기 등록 실패");
	 					return false;
	 				}
	 			}

	 		});
	 	}
	 });
	//구매확정 & 후기 업뎃
	// $(document).on("click", ".purchase_btn", function(){
	// 	var answer=confirm("구매확정 완료되었습니다. 후기를 쓰시겠습니까?");
	// 	var num=$(this).attr("data-num");
	// 	var purchase_one="";
	// 	// alert(num);
	// 	if(answer){

	// 		$(".order_list_modal").stop().fadeOut();
	// 		// $(".review_info").remove();

	// 		$.ajax({
	// 			type:"POST",
	// 			url:"./php/order_list.php",
	// 			data:{product_num:num},
	// 			dataType:"json",
	// 			success:function(response){
	// 				var now = new Date();

	// 	     		 var year= now.getFullYear();
	// 	   			var mon = (now.getMonth()+1)>9 ? ''+(now.getMonth()+1) : '0'+(now.getMonth()+1);
	// 	     	      var day = now.getDate()>9 ? ''+now.getDate() : '0'+now.getDate();
				              
	// 			      var chan_val = year + '.' + mon + '.' + day;
	// 			      // alert(response);
	// 				$.each(response.list, function(key, value){
	// 					// alert(value.product_thumb);
	// 					$(".review_img>img").attr("src",value.product_thumb);
	// 					$(".review_info_body>p").text(value.product_name);
	// 	 				if(value.product_drice){
	// 						$(".small_info_body>p").text(value.product_drice);
	// 					}else{
	// 						$(".small_info_body>p").text(value.product_price);
	// 					}
	// 					$(".small_date>p").text(chan_val);
	// 					$(".small_brand>p").text('# '+value.product_brand);

	// 				});
	// 				$(".review_success").attr("data-num",num);
	// 					$(".product_review_modal").show();
						
	// 			},
	// 			error:function(request,status,error){
	// 	        alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	// 	       }

	// 		})
	// 	}
	// }); 

	$(".detail_nav > ul > li").click(function(){
		var name = $(this).text();
		// alert(name);
		if(name == "상품 상세 설명"){
			 var offset = $(".detail_main_img").offset();
        	$('html, body').animate({scrollTop : offset.top - 300}, 400);

		}else if(name == "상품 후기"){
			var offset = $(".review").offset();
        	$('html, body').animate({scrollTop : offset.top - 300}, 400);
		}else if(name == "상품 Q&A"){
			var offset = $(".qna").offset();
        	$('html, body').animate({scrollTop : offset.top - 300}, 400);
		}else{
			var offset = $(".detail_main_info").offset();
        	$('html, body').animate({scrollTop : offset.top - 300}, 400);
		}
	});

	//판매자 페이지
 	//판매 중단
$(".product_stop").on("click", function(){
	var num=$(this).attr("data-num");
	var pm_num=$(this).attr("data-pmnum");
	// alert(num1);
	// alert(num2);

	$.ajax({
		type:"POST",
		url:"./php/product_delete.php",
		data:{num:num,pm_num:pm_num},
		success:function(response){
			// alert("aa");
			if(response=="success"){
				alert("상품 판매 중단 처리 완료!");
				location.reload();

			}else{
				alert(response);
				alert("상품 판매 중단 처리 실패!");
			}
		}

	})

});

	//판매 개시
$(".product_restart").on("click", function(){
	var num=$(this).attr("data-num");
	var pm_num=$(this).attr("data-pmnum");
	// alert(num1);
	// alert(num2);

	$.ajax({
		type:"POST",
		url:"./php/product_resel.php",
		data:{num:num,pm_num:pm_num},
		success:function(response){
			// alert("aa");
			if(response=="success"){
				alert("상품 판매 개시 처리 완료!");
				location.reload();

			}else{
				alert(response);
				alert("상품 판매 개시 처리 실패!");
			}
		}

	})

});

//관리 문의 처리
$(document).on("click",".admin_message_btn", function(){
	var img=$(this).attr("data-img");
	// alert(img);
	$(".reply_modal").show();
	$(".payer_input").val("admin");
	$(".reply_search").hide();
	$(".payer_input").attr("disabled","disabled");
	$(".payer_input").css("width","515px");
	$(".getterimg>img").attr("src", img);

});


//장바구니에서 상품 보기
$(document).on("click", ".item_img_wrap>img", function(){
	var num=$(this).data("num");
	location.href="./categoryDetail.php?product_num="+num;
});

$(document).on("click", ".brand_product", function(){
	var num=$(this).data("num");
	location.href="./categoryDetail.php?product_num="+num;
});




	var get_cate_category = $(".get_cate_category").text();
	$(".li_line").remove();
	$(".cate_menu > ul > li > a").css("color","black");
	if(get_cate_category == "all"){
		$(".all_li > a").css("color","rgb(238, 30, 115)");
		
		$(".all_li").append(`<div class="li_line">
						</div>`);
	}else if(get_cate_category == "clothes"){
		$(".clothes_li > a").css("color","rgb(238, 30, 115)");

		$(".clothes_li").append(`<div class="li_line">
						</div>`);
	}else if(get_cate_category == "shoe"){
		$(".shoe_li > a").css("color","rgb(238, 30, 115)");
		$(".shoe_li").append(`<div class="li_line">
						</div>`);
	}else if(get_cate_category == "jewels"){
		$(".jewels_li > a").css("color","rgb(238, 30, 115)");
			$(".jewels_li").append(`<div class="li_line">
							</div>`);
	}else if(get_cate_category == "fashion_acc"){
		$(".fashion_li > a").css("color","rgb(238, 30, 115)");
		$(".fashion_li").append(`<div class="li_line">
			</div>`);
	}else if(get_cate_category == "makeup"){
		$(".make_li > a").css("color","rgb(238, 30, 115)");
		$(".make_li").append(`<div class="li_line">
			</div>`);
	}else if(get_cate_category == "perfume"){
		$(".perfume_li > a").css("color","rgb(238, 30, 115)");
		$(".perfume_li").append(`<div class="li_line">
			</div>`);
	}else if(get_cate_category == "diffuser"){
		$(".diffuser_li > a").css("color","rgb(238, 30, 115)");
		$(".diffuser_li").append(`<div class="li_line">
			</div>`);
	}else if(get_cate_category == "flowers"){
		$(".flower_li > a").css("color","rgb(238, 30, 115)");
		$(".flower_li").append(`<div class="li_line">
			</div>`);
	}else if(get_cate_category == "tea"){
		$(".tea_li > a").css("color","rgb(238, 30, 115)");
		$(".tea_li").append(`<div class="li_line">
			</div>`);
	}else if(get_cate_category == "digital"){
		$(".digital_li > a").css("color","rgb(238, 30, 115)");
		$(".digital_li").append(`<div class="li_line">
			</div>`);
	}



	$(document).on("click",".order_list_success",function(){
		// var complete = "";
		var num_array = new Array();
		var pmnum_array = new Array();
		var purchasenum_array = new Array();

		var num_array1 = new Array();
		var pmnum_array1 = new Array();
		var purchasenum_array1 = new Array();
		var i = 0;
		var j=0;
		$(".purchase_com").each(function(){
				if($(this).is(":checked") == true){
						num_array.push($(this).data("num"));
						pmnum_array.push($(this).data("pmnum"));
						purchasenum_array.push($(this).data("purchasenum"));
						i++;
				}else{
						num_array1.push($(this).data("num"));
						pmnum_array1.push($(this).data("pmnum"));
						purchasenum_array1.push($(this).data("purchasenum"));
				}
				j++;
		});
		if(i == 0){
			alert("상품을 선택해주세요.");
			return false;
		}else{

			if(j==i){
				$.ajax({
				type:"POST",
				url:"./php/purchase_sel_complete.php",
				data:{num_array:num_array,pmnum_array:pmnum_array,purchasenum_array:purchasenum_array},
				success:function(response){
					// alert(response);
					if(response=="success"){
						alert("선택상품 구매확정 성공!");
						location.reload();
						// $(".")
					}else{
						alert("선택상품 구매확정 실패!");
						return false;
					}
				}
			});			
			}else{
				order_list="<thead></thead>";
				var u=0;
				$.ajax({
				type:"POST",
				url:"./php/purchase_sel_complete.php",
				data:{num_array:num_array,pmnum_array:pmnum_array,purchasenum_array:purchasenum_array},
				// dataType:"json",
				success:function(response){
					// alert(response);
					if(response=="success"){

						// alert("선택상품 구매확정 성공!")	
					$.ajax({
						type:"POST",
						url:"./php/rest_purchase.php",
						dataType:"json",
						data:{num_array1:num_array1,pmnum_array1:pmnum_array1,purchasenum_array1:purchasenum_array1},
						success:function(data){
							// alert(data);
							$.each(data.order, function(key, value){
								// alert(value.product_thumb);
								order_list+=`<tr>
							<td>
								<div class="table_check">
									<input type="checkbox" id="table_item_check${u}" class="purchase_com" data-purchasenum="${value.purchase_num}" data-pmnum="${value.pm_num}" data-num="${value.product_num}">
									<label for="table_item_check${u}">
									</label>
								</div>
								<div class="table_item_img">
									<img src="${value.product_thumb}" alt="img">
								</div>
								<div class="table_item_info">
									<div class="table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_name}</p>
									</div>
									<div class="table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="table_item_info_body">
										<p># ${value.product_brand}</p>
									</div>
									<div class="table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="table_item_info_body">
										<p>${value.product_money}원</p>
									</div>
								</div>
								<div class="table_item_btnes">
									<button class="refund_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">환불신청</button>
									<button class="exchange_btn" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">교환신청</button>
									<button class="purchase_btn" style="background: #ee1e72" data-num="${value.product_num}" data-pmnum="${value.pm_num}" data-purchasenum="${value.purchase_num}">구매확정</button>
								</div>
							</td>
						</tr>`;
							u++;

							});
							$(".order_list_table").html(order_list);
							page();
							// $()
							// $(".")
						}
					});

					}else{
						alert("선택상품 구매확정 실패!");
					}
				}
			});
		}
		}

	});


//전체선택 체크박스 토글
	$(document).on("change", "#allcheck_modal", function(){
		// alert("aa");
		if($("#allcheck_modal").prop("checked")){
			// if()
			$(".purchase_com").each(function(){

				if($(this).is(":visible")==true){

					$(this).prop("checked", true);
				}
			});
			
		}else{
			$(".purchase_com").each(function(){

				if($(this).is(":visible")==true){

					$(this).prop("checked", false);
				}
			});
		}

	});
//페이징 클릭 이벤트
	$(document).on("click", ".page-number", function(){
		$("input[type='checkbox']").prop("checked", false);

	});
//교환 신청 버튼
	$(document).on("click", ".exchange_btn", function(){
		$(".order_list_modal").hide();
		$(".exchange_review_modal").show();
	}); 
//환불 신청 버튼
	$(document).on("click", ".refund_btn", function(){
		$(".order_list_modal").hide();
		$(".return_modal").show();
	}); 
});


function page(){ 
var reSortColors = function($table) {
  $('tbody tr:odd td', $table).removeClass('even').removeClass('listtd').addClass('odd');
  $('tbody tr:even td', $table).removeClass('odd').removeClass('listtd').addClass('even');
 };
 $('table.order_list_table').each(function() {
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
