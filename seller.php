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
	<link rel="stylesheet" type="text/css" href="libs/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/reply_modal.css">
	<link rel="stylesheet" type="text/css" href="css/reply_view.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link rel="stylesheet" type="text/css" href="css/seller.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/modal.js"></script>
	<script type="text/javascript" src="js/category.js"></script>
	<script type="text/javascript" src="js/comp_script.js"></script>
	<script type="text/javascript" src="js/seller.js"></script>
	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
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
			var bal_flag = 0;
			$(".mypage_quetion").click(function(){
				if(bal_flag == 0){
					$(".bal").show();
					bal_flag = 1;
				}else{
					$(".bal").hide();
					bal_flag = 0;
				}
				
			});
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".find_pos").click(function(){
    new daum.Postcode({
        oncomplete: function(data) {
        	var postcode=data.zonecode;
        	var address1=data.address;
        	$(".regis_pos").val(postcode);
        	$(".regis_address").val(address1);
        }
    }).open();
		});
	});
</script>
</head>
<body>
	<!--header-->
	<?php
		include 'header.php';


	?>
	<!--설문조사-->
	<?php
		include 'poll_modal.php';
	?>
	<?php
		include 'reply_modal.php';
		include 'reply_view.php';
	?>
	<div class="wrap">
		<section class="cuator_main_section">
			<img src="./images/saller_back.png" alt="img" class="main_img">
			<img src="images/gray_div.png" alt="img" class="gray_img">
		</section>
		<?php
			$sql3="select count(*) as cnt from purchase_record where seller_id='".$_SESSION['user_id']."' and purchase_stat=0";
			$result3=mysqli_query($con, $sql3);
			$row3=mysqli_fetch_array($result3);
				
			$sql4="select * from member where id='".$_SESSION['user_id']."'";
			$result4=mysqli_query($con, $sql4);
			$row4=mysqli_fetch_array($result4);

			$sql5="select * from shop_product where product_seller_id='".$_SESSION['user_id']."'";
			$result5=mysqli_query($con, $sql5);

			$sql8="select count(*) as cnt from shop_product where product_seller_id='".$_SESSION['user_id']."'";
			$result8=mysqli_query($con, $sql8);
			$row8=mysqli_fetch_array($result8);
			// echo count($row8);

			$sql11="select count(*) as cnt from product_qna where answerer_id='".$_SESSION['user_id']."' and answer_com=0";
			$result11=mysqli_query($con, $sql11);
			$row11=mysqli_fetch_array($result11);

			$sql16="select count(*) as cnt from purchase_record where seller_id='".$_SESSION['user_id']."' where purchase_stat=5 or purchase_stat=4";
			$result16=mysqli_query($con, $sql16);
			$row16=mysqli_fetch_array($result16);

			$sql12="select * from purchase_record where seller_id='".$_SESSION['user_id']."' and purchase_stat=5";
			$result12=mysqli_query($con, $sql12);
			$total_stackmoney=0;
			$total_point=0;
			$total_quantity=0;
			while($row12=mysqli_fetch_array($result12)){
				$total_stackmoney+=$row12['stack_money'];
				$total_point+=$row12['stack_point'];
				$total_quantity+=$row12['purchase_quantity'];
			}
			$sql13="select * from member where id='admin'";
			$result13=mysqli_query($con, $sql13);
			$row13=mysqli_fetch_array($result13);

		?>
		<section class="saller_section">
			<div class="saller_wrap">
				<div class="saler_left">
					<div class="saller_logo">
						<div class="saller_logo_img">
							<img src="<?php echo $row4['profile_img']?>" alt="img">
						</div>
					</div>
					<div class="saller_info">
						<p><?php echo $row4['name']?> 관리자</p>
						<p><?php echo $row4['email']?></p>
					</div>
					<div class="saller_other">
						<p>주문 내역 확인</p>
						<p>문의 내역 확인</p>
						<p>판매 상품 관리</p>
						<p>shop 관리 문의</p>
						<div class="circle order_count_circle">
							<p class="order_count"><?php echo $row3['cnt']?></p>
						</div>
						<div class="circle product_count_circle">
							<p class="product_count"><?php echo $row11['cnt']?></p>
						</div>
					</div>
					<div class="sales_rate_div">
						<p>총 상품 판매 건수</p>
						<h1><?php echo number_format($row16['cnt']);?><sub>건</sub></h1>
					</div>
					<div class="sales_rate_div">
						<p>총 판매 매출액</p>
						<h1><?php echo number_format($total_stackmoney)?><sub>원</sub></h1>
					</div>
					<div class="sales_rate_div" style="border-bottom: none;">
						<p>총 상품 판매량</p>
						<h1><?php echo number_format($total_quantity)?><sub>개</sub></h1>
					</div>
				</div>
				<div class="saller_right">
					<div class="saller_right_top">
						<h1>판매샵 # <?php echo $row4['name']?> 의 페이지 입니다. </h1>
					</div>
					<div class="saller_right_body">
						<div class="saller_right_body_wrap">
							<div class="saller_order order_list">
								<div class="saller_order_top">
									<div class="order_top_left">
										<div class="circle order_circle">
											<i class="far fa-file"></i>
										</div>
										<h1>주문 내역</h1>
										<p>새로운 <?php echo $row3['cnt']?>개의 주문이 등록되었습니다.</p>

									</div>
									<div class="order_top_right">
										<button class="all_btn order_list_all" data-div="order_list">전체보기</button>

										<div class="search_divs_order order_search_div" style="display: none;">
											<input type="text" class="search_input order_seacrh">
											<div class="search_icon">
												<i class="fas fa-search"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="saller_order_body">

									<?php
										$sql="select * from purchase_record where seller_id='".$_SESSION['user_id']."' order by purchase_num desc";
										$result=mysqli_query($con, $sql);
										$i=0;
										while($row=mysqli_fetch_array($result)){
											
											$date=date_create($row['purchase_date']);
											$datem=date_format($date, "Y. m. d.");
											// echo $date;

											$sql1="select * from shop_product where product_num=".$row['product_num'];
											$result1=mysqli_query($con, $sql1);
											// while($row1=mysqli_fetch_array($result1)){
											$row1=mysqli_fetch_array($result1);
											
											$thumbs=explode(",",$row1['product_thumb']);
											$thumb_img="http://192.168.20.78/becoming0508/category_img/".$row1['category']."/".$thumbs[0];

											$sql2="select * from member where id='".$row['user_id']."'";
											$result2=mysqli_query($con, $sql2);
											$row2=mysqli_fetch_array($result2);

											// while($row2=mysqli_fetch_array($result2)){
											
											// echo $thumb_img;
									?>
									<div class="saller_item order_ltem seller_ordered">

										<!-- <div class="table_check_ORDER"> -->
											
										<!-- </div> -->
										<div class="saller_item_img">
											<img src="<?php echo $thumb_img?>" alt="img">
										</div>
										<div class="saller_item_title">
											<p><?php echo $row1['product_name']?></p>
											<!-- <p><?php ?></p> -->
										</div>
										<div class="saller_item_bodytext">
											<p><?php echo $row['purchase_msg']?></p>
										</div>
										<div class="saller_item_count">
											<p><?php echo $row['purchase_quantity']?>개</p>
										</div>
										<div class="saller_item_price">
											<p><?php echo number_format($row['stack_money'])?>원</p>
										</div>
										<div class="saller_item_user">
											<p><?php echo $row2['name']?>(<?php echo $row['user_id'];?>)</p>
										</div>
										<div class="saller_item_date">
											<p><?php echo $datem?></p>
										</div>
										<div class="saller_check_div">
											<?php
												if($row['purchase_stat']==1){
											?>
											<p style="color:blue; font-family: 'a뉴고딕M'; font-size:14px;" >발송중</p>
											<?php
												}else{

											?>
											<input type="checkbox" id="table_item_check_ORDER<?=$i?>" data-purchase_num="<?php echo $row['purchase_num']?>" name="seller_order_process">
											<label for="table_item_check_ORDER<?=$i?>">
											</label>
											<?php
												}
											?>
											

										</div>

									</div>
									<?php
								// }
							// }
									$i++;
									}
									?>


								</div>

								<button class="order_processing">선택 주문 처리하기</button>
								<p class="check_order_all">전체 선택</p>

							</div>



							<div class="saller_order qna_list" style="margin-top: 70px;">
								<div class="saller_order_top">
									<div class="order_top_left">
										<div class="circle order_circle">
											<i class="far fa-file"></i>
										</div>
										<h1>문의 내역</h1>
										<p>새로운 문의가 <?php echo $row11['cnt']?>개 등록되었습니다.</p>
									</div>
									<div class="order_top_right">
										<button class="all_btn qna_list_all" data-div="question_list">전체보기</button>
										<div class="search_divs_order question_search_div" style="display: none;">
											<input type="text" class="search_input qna_seacrh">
											<div class="search_icon">
												<i class="fas fa-search"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="saller_order_body">
									<?php
										$sql6="select * from shop_product where product_seller_id='".$_SESSION['user_id']."'";
										$result6=mysqli_query($con, $sql6);
										while($row6=mysqli_fetch_array($result6)){
											$sql7="select * from product_qna where product_num=".$row6['product_num'];
											$result7=mysqli_query($con, $sql7);
												$thumbb=explode(",",$row6['product_thumb']);
												$thumba="http://192.168.20.78/becoming0508/category_img/".$row6['category']."/".$thumbb[0];
											while($row7=mysqli_fetch_array($result7)){

											?>
									<div class="saller_item order_ltem">
										<div class="saller_item_img">
											<img src="<?php echo $thumba?>" alt="img">
										</div>
										<div class="qna_item_title">
											<p><?php echo $row6['product_name']?></p>
										</div>
										<div class="qna_body_text">
											<span style="margin-right: 30px; color:#ee1e72;" class="question_category">[ <?php echo $row7['question_cate']?> ]</span><span class="question_bodybody"><?php echo $row7['question_body']?></span>
										</div> 
										<div class="qna_user">
											<p><?php echo $row7['questioner_id']?></p>
										</div>
										<?php
											if($row7['answer_com']){
										?>
										<div class="qna_flag">
											<p class="qna_success">답변완료</p>
										</div>
										<?php
											}else{
										?><div class="qna_flag">
											<p class="flag_div" data-qnum="<?php echo $row7['product_qna_num']; ?>">답변하기</p>
										</div>
										<?php
											}
										?>		
									</div>

									<?php	
											}

										}
									?>
									

									<!-- <div class="saller_item order_ltem">
										<div class="saller_item_img">
											<img src="./images/detail_img.png" alt="img">
										</div>
										<div class="qna_item_title">
											<p>아르마니 향수</p>
										</div>
										<div class="qna_body_text">
											<span style="margin-right: 30px;">[ 배송관련 문의 ]</span><span>배송 언제 시작되나요?</span>
										</div> 
										<div class="qna_user">
											<p>유저원(user1)</p>
										</div>
										<div class="qna_flag">
											<p class="qna_success">답변완료</p>
										</div>
									</div>
 -->
									
								</div>
							</div>
							<div class="saller_order re_ex_list" style="margin-top: 70px;">
								<div class="saller_order_top">
									<div class="order_top_left">
										<div class="circle order_circle">
											<i class="far fa-file"></i>
										</div>
										<h1>교환/환불 신청 내역</h1>
										<p>새로운 신청이 개 등록되었습니다.</p>
									</div>
									<div class="order_top_right re_ex_btns">
										<button class="all_btn re_ex_list_all" data-div="question_list">전체보기</button>
									</div>
								</div>
								<div class="saller_order_mid">
									<button class="re_list_btn" style="margin-right: 0;">환불 신청 내역</button>
									<button class="exchange_list_btn">교환신청 내역</button>
									<button class="re_ex_not_btn">교환/환불 불가</button>
								</div>
								<div class="saller_order_body re_ex_body">					
									<div class="re_ex_item order_ltem re_ex_ordered">
										<div class="re_ex_item_img">
											<img src="./images/detail_img.png" alt="img">
										</div>
										<div class="re_ex_item_title">
											<p>타이틀</p>
										</div>
										<div class="re_ex_item_bodytext">
											<p>bodytext</p>
										</div>
										<div class="re_ex_item_count">
											<p>1개</p>
										</div>
										<div class="re_ex_item_price">
											<p>500원</p>
										</div>
										<div class="re_ex_item_user">
											<p>연아킴</p>
										</div>
										<div class="re_ex_item_date">
											<p>2019.06.17</p>
										</div>
									</div>
								</div>
							</div>
							<div class="saller_order product_insert list_wrap" style="margin-top: 70px;">
								<div class="saller_order_top">
									<div class="order_top_left">
										<div class="circle order_circle">
											<i class="far fa-file"></i>
										</div>
										<h1>판매 등록 상품</h1>
										<p>총 <?php echo $row8['cnt']?>개의 상품이 등록되어 판매중입니다.</p>
									</div>
									<div class="order_top_right">
										<button class="all_btn product_list_all" data-div="product_list">전체보기</button>
										<div class="search_divs_order product_search_div" style="display:none;">
											<input type="text" class="search_input qna_seacrh">
											<div class="search_icon">
												<i class="fas fa-search"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="saller_order_mid">
									<button class="check_producnt_delete" style="margin-right: 0;">선택상품 삭제</button>
									<button class="sold_out" style="width: 150px; "><span style="font-family: 'a뉴고딕M';">품절상품</span>
										<?php
											$sql15="select count(*) as cnt from product_manage where product_brand='".$_SESSION['name']."' and  product_quantity=0";
											$result15=mysqli_query($con, $sql15);
											$row15=mysqli_fetch_array($result15);

										?>
									<span class="sold_count" style="color: white;">총 <?php echo $row15['cnt']?>개</span>

									</button>
									<button class="new_producnt" >새 상품 등록</button>
								</div>
								<div class="product_body">
									<?php
										$v=0;
										$sql9="select * from shop_product where product_seller_id='".$_SESSION['user_id']."' limit 0,4";
										$result9=mysqli_query($con, $sql9);
										while($row9=mysqli_fetch_array($result9)){
												$thb=explode(",",$row9['product_thumb']);
												$tha="http://192.168.20.78/becoming0508/category_img/".$row9['category']."/".$thb[0];

											$sql10="select * from product_manage where product_num=".$row9['product_num'];
											$result10=mysqli_query($con, $sql10);
										
											while($row10=mysqli_fetch_array($result10)){

												if($row9['product_num']==$row10['product_num']){
											$sql14="select count(*) as cnt from purchase_record where pm_num=".$row10['pm_num'];
											$result14=mysqli_query($con, $sql14);
											$row14=mysqli_fetch_array($result14);

									?>
									<div class="product_item">
										<div class="product_check_div">
											<input type="checkbox" class="product_check" id="product_check<?=$v?>" data-num="<?php echo $row9['product_num']?>" data-pmnum="<?php echo $row10['pm_num']?>">
											<label for="product_check<?=$v?>"></label>
										</div>
										<div class="product_item_img">
											<img src="<?php echo $tha?>" alt="img">
										</div>
										<p class="p_name_title"><?php echo $row9['product_name']?>
										<?php
										if($row10['product_option']){
										?>
										<?php echo $row10['p_opt_detail1']?></p>
										<?php
										}else{

										}
										?>
										<div class="product_info">
											<p>판매원가 : <?php echo $row9['product_price']?></p>
											<?php

											if($row9['sale_percent']){
											?>
											<p>할인율 : <span class="info_red"><?php echo $row9['sale_percent']?></span></p>
											<p>할인적용금액 : <span class="info_green"><?php echo $row9['product_drice']?></span></p>
											<?php
												}
											?>
											<p>재고수량 : <?php

											if($row10['product_quantity']>0){

											 echo $row10['product_quantity']."개";
											}else{
												echo "품절";
											}

											 ?></p>
											<p class="order_processing_cnt">주문진행 : <?php echo $row14['cnt']?>건</p>
										</div>
										<button class="product_update" data-pmnum="<?php echo $row10['pm_num']?>" data-num="<?php echo $row10['product_num']?>">판매정보 수정</button>
										<?php
											if($row10['product_flag']==1){
										?>
										<button class="product_stop" data-pmnum="<?php echo $row10['pm_num']?>" data-num="<?php echo $row10['product_num']?>">판매 중단</button>
										<?php
									}else{
										?>
										<button class="product_restart" data-pmnum="<?php echo $row10['pm_num']?>" data-num="<?php echo $row10['product_num']?>">판매 개시</button>
										<?php
										}
										?>

									</div>
									<?php
									$v++;
								}

									}
									
								}
									?>
								</div>
							</div>


							<div class="saller_order shop_magne_list" style="margin-top: 100px;">
								<div class="saller_order_top">
									<div class="order_top_left">
										<div class="circle order_circle">
											<i class="far fa-file"></i>
										</div>
										<h1>SHOP 관리 문의</h1>
										<p>총 0개의 문의 내역이 있습니다.</p>
									</div>
									<div class="order_top_right">
										<button class="all_btn shop_magne_list_all" data-div="question_admin_list">전체보기</button>
										<div class="search_divs_order"  style="display: none;">
											<input type="text" class="search_input qna_seacrh">
											<div class="search_icon">
												<i class="fas fa-search"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="saller_order_body shop_magne_body">
									<!-- <div class="saller_item shop_magne_ltem">
										<div class="shop_magne_item_check">
											<input type="checkbox" class="shop_magne_check" id="shop_magne_check">
											<label for="shop_magne_check"></label>
										</div>
										<div class="shop_magne_title">
											<p>판매자 등록을 취소하고 싶습니다.</p>
										</div>
										<div class="shop_magne_date">
											<p>2018. 05. 18.</p> 
										</div>
										<div class="shop_magne_success">
											<span class="magne_success">답변확인하기</span>
										</div>
									</div> -->
								<?php

									$sql14="select * from message where sender_id='".$_SESSION['user_id']."'";
									$result14=mysqli_query($con, $sql14);
									while($row14=mysqli_fetch_array($result14)){
								?>	
									<div class="saller_item shop_magne_ltem">
										<div class="shop_magne_item_check">
											<input type="checkbox" class="shop_magne_check" id="shop_magne_check">
											<label for="shop_magne_check"></label>
										</div>
										<div class="shop_magne_title">
											<p><?php echo $row14['message_title']?></p>
										</div>
										<div class="shop_magne_date">
											<p><?php 
												$msg_date=date_create($row14['send_date']);
												$msg_datee=date_format($row14['send_date'], "Y. m. d");

											echo date_format($msg_date, "Y. m. d")?></p> 
										</div>
										<?php
											if($row14['confirm_flag']==0){

										?>
										<div class="shop_magne_success">
											<p class="magne_walt">답변 대기중</p>
										</div>


										<?php
										}else{
										?>
											<div class="shop_magne_success">
											<span class="magne_success">답변확인하기</span>
										</div>

										<?php	
										}
										?>

									</div>

							<?php
							}

							?>	


								</div>
							</div>

							<div class="admin_message_div">
								<button class="admin_message_btn" data-img="<?php echo $row13['profile_img']?>">관리자에게 문의하기</button>
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