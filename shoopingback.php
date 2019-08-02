<?php
	error_reporting(0);
	include("dbcon.php");
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="libs/animate.css">
	<link rel="stylesheet" type="text/css" href="libs/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/shoopingback.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/category.js"></script>
	<script type="text/javascript" src="js/modal.js"></script>
	<title>비커밍</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".count").click(function(){
				// alert("a");
				if($(this).val() < 0){
					$(this).val("0");
				}
			});
			$(".banner_div").mouseover(function(){
				$(this).children("div").stop().fadeIn();
			});
			$(".banner_div").mouseleave(function(){
				$(this).children("div").stop().fadeOut();
			});
			$(".curator_circle").hide();
			$(".close_circle").hide();
			$(".open_circle").hide();
			$(".qu_circle_2").hide();

			 CKEDITOR.replace('review_area',{
    	 // width:'100%',
            height:'320px',
      // CKEDITOR.instances.contents.updateElement();
      	filebrowserImageUploadUrl:'./libs/ckeditor/upload_review.php'
    	// filebrowserImageUploadUrl:'./libs/ckeditor/upload.php'
    });
		});
	</script>
</head>
<body>
	<!--header-->
	<?php
		include 'header.php';
		$sql="select * from member where id='".$_SESSION['user_id']."'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		// $sql1="select count()"

	?>
	<!--설문조사-->
	<?php
		include 'poll_modal.php';
	?>
	<?php
		// include 'cart.php';
	?>
		<!-- 교환신청 -->
	<div class="exchange_review_modal" style="display: none;">
		<div class="exchange_body">
			<div class="exchange_wrap">
				<div class="exchange_top">
					<div class="circle exchange_top_circle">
						<i class="far fa-check-circle"></i>
					</div>
					<h1>교환 신청 하기</h1>
				</div>
				<div class="exchange_info">
					<div class="exchange_img">
						<img src="./images/detail_img.png" alt="img">
					</div>
					<div class="exchange_info_wrap">
						<div class="exchange_info_div">
							<div class="exchange_info_title">
								<p>제품명 : </p>
							</div>
							<div class="exchange_info_body exchange_product_name">
								<p>[디즈니] 레몬밤티 _ 토이스토리(6개입)(티백,차)</p>
							</div>
						</div>
						<div class="exchange_info_div ex_small_info_div">
							<div class="exchange_info_title">
								<p>구매금액 : </p>
							</div>
							<div class="exchange_info_body ex_small_info_body exchange_money">
								<p>12,500원</p>
							</div>
						</div>
						<div class="exchange_info_div ex_small_info_div">
							<div class="exchange_info_title">
								<p>구매확정일 : </p>
							</div>
							<div class="exchange_info_body ex_small_info_body exchange_money">
								<p>2019. 05. 17.</p>
							</div>
						</div>
						<div class="exchange_info_div ex_small_info_div">
							<div class="exchange_info_title">
								<p>판매샵 : </p>
							</div>
							<div class="exchange_info_body ex_small_info_body review_brand">
								<p># DISNEY EDITION</p>
							</div>
						</div>
						<div class="exchange_info_div ex_small_info_div">
							<div class="exchange_info_title ">
								<p>교환신청일 : </p>
							</div>
							<div class="exchange_info_body ex_small_info_body">
								<p>2019. 05. 17.</p>
							</div>
						</div>
						<div class="exchange_info_div">
							<div class="exchange_info_title">
								<p>신청제목 : </p>
							</div>
							<div class="exchange_info_body">
								<input type="text" class="exchange_title">
							</div>
						</div>
					</div>
				</div>
				<div class="exchange_bodytext">
					<textarea class="exchange_text" placeholder="교환신청 사유를 입력해주세요"></textarea>
				</div>
				<div class="exchange_modal_btns"> 
					<button class="exchange_reset" style="cursor: pointer;">재작성</button>
					<button class="exchange_cancel">신청취소</button>
					<button class="exchange_success_1" style="background: #ee1e72">신청완료</button>
				</div>
			</div>
			<div class="circle exchange_close_circle">
				<i class="fas fa-times"></i>
			</div>
		</div>
	</div>




	<div class="return_modal" style="display: none;">
		<div class="return_body">
			<div class="return_wrap">
				<div class="return_top">
					<div class="circle return_top_circle">
						<i class="far fa-check-circle"></i>
					</div>
					<h1>환불 신청 하기</h1>
				</div>
				<div class="return_info">
					<div class="return_img">
						<img src="./images/detail_img.png" alt="img">
					</div>
					<div class="return_info_wrap">
						<div class="return_info_div">
							<div class="return_info_title">
								<p>제품명 : </p>
							</div>
							<div class="return_info_body return_product_name">
								<p>[디즈니] 레몬밤티 _ 토이스토리(6개입)(티백,차)</p>
							</div>
						</div>
						<div class="return_info_div re_small_info_div">
							<div class="return_info_title">
								<p>구매금액 : </p>
							</div>
							<div class="return_info_body re_small_info_body return_money">
								<p>12,500원</p>
							</div>
						</div>
						<div class="return_info_div re_small_info_div">
							<div class="return_info_title">
								<p>구매확정일 :</p>
							</div>
							<div class="return_info_body re_small_info_body return_money">
								<p>2019. 05. 17.</p>
							</div>
						</div>
						<div class="return_info_div re_small_info_div">
							<div class="return_info_title">
								<p>판매샵 :</p>
							</div>
							<div class="return_info_body re_small_info_body return_money">
								<p># DISNEY EDITION</p>
							</div>
						</div>
						<div class="return_info_div re_small_info_div">
							<div class="return_info_title">
								<p>환불신청일 :</p>
							</div>
							<div class="return_info_body re_small_info_body return_money">
								<p>2019. 05. 17.</p>
							</div>
						</div>
						<div class="return_info_div">
							<div class="return_info_title">
								<p>신청제목 : </p>
							</div>
							<div class="return_info_body">
								<input type="text" class="return_title">
							</div>
						</div>
					</div>
				</div>
				<div class="return_bodytext">
					<textarea class="return_text" placeholder="환불신청 사유를 입력해주세요"></textarea>
				</div>
				<div class="return_modal_btns"> 
					<button class="return_reset" style="cursor: pointer;">재작성</button>
					<button class="return_cancel">신청취소</button>
					<button class="return_success_1" style="background: rgb(238, 30, 114); cursor: pointer;">신청완료</button>
				</div>
			</div>
			<div class="circle return_close_circle">
				<i class="fas fa-times"></i>
			</div>
		</div>
	</div>

	<div class="buy_order_modal" style="display: none;">
		<div class="buy_order_wrap">
			<div class="buy_order_body">
				<div class="buy_list_modal_top">
					<div class="buy_list_top_left">
						<div class="circle buy_icon_circle">
							<i class="fas fa-question"></i>
						</div>
						<h1>구매 내역 확인하기</h1>
						<!-- <p>주문일자 : 2019. 05. 30.</p> -->
					</div>
					<div class="buy_modal_top_right">
						<button class="buy_all" style="background: rgb(238, 30, 114); color: white;">전체보기</button>
						<button class="buy_now">이번달</button>
						<button class="first_now">1달전</button>
						<button class="second_now">2달전</button>
						<!-- <button class="order_list_success" style="cursor: pointer;">선택상품 구매확정</button> -->
					</div>
				</div>
				<div class="buy_list_body">
					<table class="buy_list_table" cellspacing="0" cellpadding="0">
						<thead></thead>
						<tr>
							<td>
								<div class="buy_table_item_img">
									<img src="http://192.168.20.78/becoming0508/category_img/fashion_acc/32-1.jpg" alt="img">
								</div>
								<div class="buy_table_item_info">
									<div class="buy_table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>남자 퀄리티 좋은 프리미엄 디자인 기본 넥타이 모음 3_(1785064)</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p># BRIDGE COMMERCE</p>
									</div>
									<div class="buy_table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="buy_table_item_info_body">
										<p>6,900원</p>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="circle buy_list_close_circe">
				<i class="fas fa-times"></i>
			</div>
		</div>
	</div>



	<div class="product_review_modal" style="display: none;">
		<div class="product_review_body">
			<div class="review_wrap">
				<div class="review_top">
					<div class="circle review_top_circle">
						<i class="far fa-check-circle"></i>
					</div>
					<h1>상품 후기쓰기</h1>
				</div>
				<div class="review_info">
					<div class="review_img">
						<img src="./images/detail_img.png" alt="img">
					</div>
					<div class="review_info_wrap">
						<div class="review_info_div">
							<div class="review_info_title">
								<p>제품명 : </p>
							</div>
							<div class="review_info_body review_product_name">
								<p>[디즈니] 레몬밤티 _ 토이스토리(6개입)(티백,차)</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title">
								<p>구매금액 : </p>
							</div>
							<div class="review_info_body small_info_body review_money">
								<p>12,500원</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title ">
								<p>구매확정일 : </p>
							</div>
							<div class="review_info_body small_info_body purchase_date_review">
								<p>2019. 05. 17.</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title">
								<p>판매샵 : </p>
							</div>
							<div class="review_info_body small_info_body review_brand">
								<p># DISNEY EDITION</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title ">
								<p>공개여부 : </p>
							</div>
							<div class="review_info_body small_info_body" style="padding-top: 4px;">
								<input type="radio" name="open_or_notopen" class="openraido" value="0" id="openradio">
								<label for="openradio">공개</label>
								<input type="radio" name="open_or_notopen" class="openraido" value="1" id="notopenradio">
								<label for="notopenradio" style="margin-left: 50px;">비공개</label>
							</div>
						</div>

						<div class="review_info_div">
							<div class="review_info_title">
								<p>후기제목 : </p>
							</div>
							<div class="review_info_body">
								<input type="text" class="review_title">
							</div>
						</div>
					</div>
				</div>
				<div class="review_text_area">
					<textarea id="review_area">
						
					</textarea>
				</div>
				<div class="review_modal_btns"> 
					<button class="review_reset">재작성</button>
					<button class="review_cancel">작성취소</button>
					<button class="review_success_1" style="background: #ee1e72">작성완료</button>
				</div>
			</div>
			<div class="circle review_close_circle">
				<i class="fas fa-times"></i>
			</div>
		</div>
	</div>
	<div class="order_list_modal" style="display: none;">
		<div class="order_list_modal_body">
			<div class="order_list_modal_wrap">
				<div class="order_list_modal_top">
					<div class="order_list_top_left">
						<div class="circle order_icon_circle">
							<i class="fas fa-question"></i>
						</div>
						<h1>주문 내역 확인하기</h1>
						<p>주문일자 : 2019. 05. 30.</p>
					</div>
					<div class="modal_top_right">
						<button class="order_list_success">선택상품 구매확정</button>
					</div>
				</div>
				<div class="order_list_all_check">
					<input type="checkbox" id="allcheck_modal">
					<label for="allcheck_modal">
						<i class="fas fa-caret-left"></i> <span class="sel_buy_all"> &nbsp; 전체상품 선택하기</span>
					</label>
				</div>
				<div class="order_list_body">
					<table class="order_list_table" cellspacing="0" cellpadding="0">
						<thead></thead>
		
						<tr>
							<td>
								<div class="table_check">
									<input type="checkbox" id="table_item_check">
									<label for="table_item_check">
									</label>
								</div>
								<div class="table_item_img">
									<img src="./images/detail_img.png" alt="img">
								</div>
								<div class="table_item_info">
									<div class="table_item_info_title">
										<p>제품명 : </p>
									</div>
									<div class="table_item_info_body">
										<p>[디즈니] 레몬밤티 _ 토이스토리(6개입)(티백,차)</p>
									</div>
									<div class="table_item_info_title">
										<p>판매샵 : </p>
									</div>
									<div class="table_item_info_body">
										<p># DISNEY EDITION</p>
									</div>
									<div class="table_item_info_title">
										<p>상품금액 : </p>
									</div>
									<div class="table_item_info_body">
										<p>30,000원</p>
									</div>
								</div>
								<div class="table_item_btnes">
									<button class="refund_btn">환불신청</button>
									<button class="exchange_btn">교환신청</button>
									<button class="purchase_btn" style="background: #ee1e72">구매확정</button>
								</div>
							</td>
						</tr>
						
					</table>
				</div>
			</div>
			<div class="circle order_list_close_circe">
				<i class="fas fa-times"></i>
			</div>
		</div>

	</div>
	<div class="wrap">
		<section class="cuator_main_section">
			<img src="<?php echo $row['mypage_img']?>" alt="img" class="main_img">
			<img src="images/gray_div.png" alt="img" class="gray_img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>MyPage > </span><span>장바구니 </span>
			</div>
			<div class="infos_div">
				<p>“장바구니 상품을 확인하고 구매 및 결제를 하실 수 있습니다.”</p>
			</div>
		</section>
		<section class="shooping_section">
			<div class="shooping_wrap">
				<div class="shooping_left">
					<div class="left_top">
						<div class="circle profile_circle">
							<div class="circle in_circle">
								<img src="<?php echo $row['profile_img']?>" alt="img">
							</div>
						</div>
					</div>
					<?php
						$sql8="select * from purchase_record where user_id='".$_SESSION['user_id']."'";
						$result8=mysqli_query($con, $sql8);
						$total_stack=0;
						$total_money=0;
						$a=0;
						// $row8=mysqli_fetch_array($result8);
						while($row8=mysqli_fetch_array($result8)){
							$total_stack+=$row8['stack_point'];
							$total_money+=$row8['stack_money'];
							$a++;
						}
					?>
					<div class="left_bottom">
						<div class="left_count_div sum_by">
							<h1><?php echo $a; ?><sub>회</sub></h1>
							<p>총 구매 횟수</p>
						</div>

						<div class="left_count_div sum_price">
							<h1><?php echo $total_stack; ?><sub>포인트</sub></h1>
							<p>적립 포인트</p>
						</div>

						<div class="left_count_div sum_pointe">
							<h1><?php echo number_format($total_money); ?><sub>원</sub></h1>
							<p>총 구매 금액</p>
						</div>
					
						<div class="bottom_info">
							<div class="bottom_info_wrap">
								<button class="bottom_info_div">구매이력보기</button>
								<p>구매 이력은 최근 3개월 동안의 <br> 정보만 제공됩니다.</p>
							</div>
						</div>
					</div>
				
				</div>
				<div class="shopping_right">
					<div class="shopping_right_top">
						<div class="shopping_right_top_left"> 
							<div class="circle cart_circle">
								<i class="fas fa-shopping-cart"></i>
							</div>
							<p class="cart_greet"><?php echo $row['name'];?>님, 장바구니에 총 3개의 상품이 있습니다.</p>
						</div>
						<div class="shopping_right_top_right">
							<ul class="right_ul">
								<li><a href="#">장바구니</a></li>
								<li><a href="#">주문/결제</a></li>
								<li><a href="#">배송조회</a></li>
							</ul>
							<div class="this_div">
								<div class="bar this_bar">
								</div>
							</div>
						</div>
					</div>
					<div class="shopping_right_bottom">
						<div class="shopping_right_bottom_top">
							<div class="top_check">
								<input type="checkbox" name="check" class="all_check" id="all_check">
							
								<label for="all_check">전체선택</label>
								</div>
							<div class="shooping_top_info">
								<p>상품정보</p>
							</div>
							<div class="shooping_top_count">
								<p>수량</p>
							</div>
							<div class="shooping_top_price">
								<p>금액</p>
							</div>
							<div class="shooping_top_delivery">
								<p>배송비</p>
							</div>
							<div class="shooping_top_order">
								<p>주문</p>
							</div>
						</div>
						<div class="shopping_right_bottom_body">
							<?php
								$sql2="select * from shop_cart where user_id='".$_SESSION['user_id']."'";
								$result2=mysqli_query($con, $sql2);
								$t=0;
								while($row2=mysqli_fetch_array($result2)){
									$sql3="select * from shop_product where product_num=".$row2['product_num'];
									$result3=mysqli_query($con, $sql3);
									$row3=mysqli_fetch_array($result3);

									$thumbs=explode(",", $row3['product_thumb']);
									$repre_img=$thumbs[0];
									if($row3['product_drice']){
										$product_p=(preg_replace("/[^0-9]*/s","",$row3['product_drice']));
									}else{
										$product_p=(preg_replace("/[^0-9]*/s","",$row3['product_price']));
									}
									
									// echo (int)$product_p;
									$p_sum=$row2['cart_sum']*(int)$product_p;

									$sql9="select * from product_manage where pm_num=".$row2['pm_num'];
									$result9=mysqli_query($con, $sql9);
									$row9=mysqli_fetch_array($result9);

									
								?>
							<div class="body_list_item" data-pmnum="<?php echo $row2['pm_num']?>" data-cartnum="<?php echo $row2['cart_p_num']?>" data-pseller="<?php echo $row3['product_seller_id']?>">
								<div class="item_check">
									<input type="checkbox" name="check" class="check" id="check<?php echo $t;?>" data-num="<?php echo $row2['cart_p_num'];?>" data-pnum="<?php echo $row3['product_num']?>">
									<label for="check<?php echo $t;?>"></label>
								</div>
								<div class="item_img">
									<div class="item_img_wrap">
										<img src="./category_img/<?php echo $row3['category']?>/<?php echo $repre_img;?>" alt="img" data-num="<?php echo $row3['product_num']?>">
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<p class="brand_name"  >[ <?php echo $row3['product_brand']?> ]</p><br><p class="brand_product" data-num="<?php echo $row3['product_num']?>">
											<?php echo $row3['product_name'];?></p>
											<span class="pro_option" style="font-family:'a뉴고딕M'; font-size:13px; font-weight:bold; color:#ee1e72;"><?php echo $row9['product_option']?> </span>
											<span class="pro_detail1" style="font-family:'a뉴고딕M'; font-size:13px; font-weight:bold; color:#ee1e72;"><?php echo $row9['p_opt_detail1']?></span>
											<span class="pro_detail2" style="font-family:'a뉴고딕M'; font-size:13px; font-weight:bold; color:#ee1e72;"><?php echo $row9['p_opt_detail2']?></span>
									</div>
									<div class="item_info_bottom">
										
										<?php

										if($row3['product_drice']){
										?>
										<span class="sell_sale">할인적용금액</span>
										<span class="cash_discount final_money"> <?php echo $row3['product_drice']?></span>
										<!-- <span>쿠폰적용금액 29,700원</span> -->
										<?php 
										}else{
											?>
											<span class="sell_price">판매원가</span>
										<span class="cash_sell final_money"><?php echo $row3['product_price']?></span>
										<?php
										}
										?>
									</div>
								</div>
								<div class="item_spinner">
									<input class="count" type="number" value="<?php echo$row2['cart_sum'];?>"/>
									<button class="count_ch" data-num="<?php echo $row2['cart_p_num']?>">수량변경</button>
								</div>
								<div class="item_prcie">
									<h4><?php echo number_format($p_sum)."원";?></h4>
								</div>
								<div class="item_delivery">
									<h4><?php echo $row2['delivery_cal']?></h4>
								</div>
								<div class="item_order">
									<button class="dirent_order" data-num="<?php echo $row2['product_num']?>" data-pmnum="<?php echo $row2['pm_num']?>" data-cartnum="<?php echo $row2['cart_p_num']?>">바로주문</button>
								</div>
							</div>
						
						<?php
							$sql5="select count(*) as cnt from shop_cart where user_id='".$_SESSION['user_id']."'";
							$result5=mysqli_query($con,$sql5);
							$row5=mysqli_fetch_array($result5);
							// $k=0;
							$t++;
						}
						?>	
						</div>
						<div class="shooping_btn_div">
							<button class="shooping_btn">선택상품 삭제</button>
						</div>
						<?php
							$sql6="select * from shop_cart where user_id='".$_SESSION['user_id']."'";
							$result6=mysqli_query($con, $sql6);
							$select_price=array();
							$sel_p=array();
							$deli_price=array();
								$k=0;
								while($row6=mysqli_fetch_array($result6)){
										$sql7="select * from shop_product where product_num=".$row6['product_num'];
										$result7=mysqli_query($con, $sql7);
										$row7=mysqli_fetch_array($result7);
											if($row7['product_drice']){
											$sel_price[$k]=(int)(preg_replace("/[^0-9]*/s", "",trim($row7['product_drice'])))*$row6['cart_sum'];
											// echo $sel_price[$k];
											// $sel_p[$k]=number_format($select_price[$k]);
											// $sel_price[$k]=number_format(()));
											// $sel=int
											// echo $sel_price[$k]."원";
										}else{
											$sel_price[$k]=(int)(preg_replace("/[^0-9]*/s", "",trim($row7['product_price'])))*$row6['cart_sum'];
										}
										// echo $select_price[$k];
										
										$deli_price[$k]=(int)(preg_replace("/[^0-9]*/s", "",trim($row6['delivery_cal'])));
										// echo $deli_price[$k];

										$k++;								
								}
									
									$selected_pp=0;
									$deli_all=0;
										$s=0;
										for($s=0;$s<count($sel_price);$s++){
											$selected_pp=$selected_pp+$sel_price[$s];
											$deli_all=$deli_all+$deli_price[$s];
											// echo $selected_pp;
										}

										// echo$deli_all;
										

						?>
						<div class="shooping_order_div">
							<div class="order_div_frist">
								<h1>전체상품금액</h1>
								<h1 class="select_price" style="font-size: 1.9em;">
								<?php echo number_format($selected_pp);?> 원</h1>



							</div>
							<div class="order_plus">
								<div class="circle plus_circle">
									<i class="fas fa-plus"></i>
								</div>
							</div>
							<div class="order_delivery">
								<h1>배송비</h1>
								<h1 class="delivery_price" style="font-size: 1.9em;">

								<?php echo number_format($deli_all);?> 원</h1>
							

							</div>
							<div class="order_eq">
								<div class="circle eq_circle">
									<i class="fas fa-equals"></i>
								</div>
							</div>
							<div class="end_price">
								<h1>결제예정금액</h1>
								<h1 class="end_this_price" style="font-size: 1.9em;">

								<?php echo number_format($selected_pp+$deli_all);?> 원</h1>
						

							</div>
							<div class="order_divs">
								<button class="order_divs_btn">전체 상품 주문</button>
							</div>
						</div>
						<div class="shooping_banner_div">
							<div class="banner_div">
								<img src="images/shooping_baner_one.png" alt="img">
								<div class="banner_white_div" style="display: none;">
									<h1>디저트 전문점</h1>
									<h2>이용상품권</h2><h3 style="margin-left: 10px; margin-top: 15px;">파격할인</h3>
								</div>
							</div>
							<div class="banner_div" style="margin-left: 10px;">
								<img src="images/event_img1_search.png" alt="img">
								<div class="banner_gray_div" style="display: none;">
									<h1>파티용품 세트</h1>
									<h2 style="color: #fde800; margin-left: 35px;">20%</h2><h2>할인</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
			<?php
			include 'footer.php';
		?>
		<?php
			include 'circles.php';
		?>
		
		
	</div>
</body>
</html>