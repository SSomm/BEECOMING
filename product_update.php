<?php
	error_reporting(0);
	include("./dbcon.php");
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
	<link rel="stylesheet" href="libs/ssi/ssi-uploader.css"/> 

	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/reply_modal.css">
	<link rel="stylesheet" type="text/css" href="css/reply_view.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link rel="stylesheet" type="text/css" href="css/product_update.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script src="libs/ssi/ssi-uploader.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/product_update.js"></script>
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
<style type="text/css">
	/*.ssi-button{
		position: absolute;
		left: -100px;
		z-index: 1;
		top: 100px;
	}*/
</style>
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
	<?php

		$sql="select * from member where id='".$_SESSION['user_id']."'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);



		$product_num = $_GET['num'];
		$pm_num=$_GET['pmnum'];
		$sql1 = "select * from shop_product where product_num = $product_num";
		$result1 = mysqli_query($con,$sql1);
		$row1 = mysqli_fetch_array($result1);
	?>
	<p class="get_cate" style="display: none;"><?=$row1['category']?></p>
		<section class="cuator_main_section">
			<img src="./images/saller_back.png" alt="img" class="main_img">
			<img src="images/gray_div.png" alt="img" class="gray_img">
		</section>
		<section class="saller_section">
			<div class="saller_wrap">
				<div class="saler_left">
					<div class="saller_logo">
						<div class="saller_logo_img">
							<img src="./images/exp_saller.png" alt="img">
						</div>
					</div>
					<div class="saller_info">
						<p># <?php echo $row['name'];?></p>
						<p><?php echo $row['email'];?></p>
					</div>
					<div class="saller_other">
						<p>주문 내역 확인</p>
						<p>주문 문의 확인</p>
						<p>판매 상품 관리</p>
						<p>shop 관리 문의</p>
						<div class="circle order_count_circle">
							<p class="order_count">51</p>
						</div>
						<div class="circle product_count_circle">
							<p class="product_count">3</p>
						</div>
					</div>
					<div class="sales_rate_div">
						<p>총 상품 판매량</p>
						<h1>1,200<sub>건</sub></h1>
					</div>
					<div class="sales_rate_div">
						<p>총 판매 매출액</p>
						<h1>1,000,000<sub>원</sub></h1>
					</div>
					<div class="sales_rate_div" style="border-bottom: none;">
						<p>판매평점</p>
						<h1>4.5<sub>점</sub></h1>
					</div>
				</div>
				<div class="saller_right">
					<div class="saller_right_top">
						<h1>판매샵 # <?php echo $row['name'];?> 의 페이지 입니다. </h1>
					</div>
					<div class="saller_right_body">
						<div class="saller_right_body_wrap">
							<h1>상품 수정 페이지 입니다.</h1>
							<p class="product_sell_placeholder" style="font-size:13px;">*필수사항은 반드시 입력하셔야 합니다.</p>
							<div class="saller_insert_group" style="margin-top: 50px;">
								<div class="saller_insert_group_title">
									<p>상품 이름</p>
								</div>
								<input type="text" class="product_name" value="<?=$row1['product_name']?>">
							</div>
							<div class="saller_insert_group">
								<div class="product_div">
									<div class="saller_insert_group_title" style="width: 110px; margin-left: -10px;">
										<p>상품 카테고리</p>
									</div>
									<select class="product_select" style="width: 265px;" disabled="disabled" readonly>


										<option>선택하세요</option>
										<option value="clothes">의류</option>
										<option value="shoe">슈즈</option>
										<option value="jewels">쥬얼리&시계</option>
										<option value="fashion_acc">패션소품</option>
										<option value="makeup">메이크업</option>
										<option value="perfume">향수</option>
										<option value="diffuser">디퓨저&스프레이</option>
										<option value="flowers">플라워</option>
										<option value="tea">차/커피/음료</option>
										<option value="digital">디지털용품</option>
									</select>


								</div>
								<div class="more_div">
									<div class="saller_insert_group_title" style="width: 110px; ">
										<p>상세 카테고리</p>
									</div>
									<select class="more_select" style="width: 265px;" disabled="disabled" readonly>
										<option>선택하세요</option><!-- 
										<option class="man">남성</option>
										<option class="woman">여성</option> -->
									</select>
								</div>
							</div>
							<div class="saller_insert_group">
								<div class="saller_insert_group_title">
									<p>판매 원가</p>
								</div>
								<?php
									$price = preg_replace("/[^0-9]*/s", "", $row1['product_price'])
								?>
								<input type="text" class="product_price" placeholder="판매 원가를 입력하세요. ( 숫자만 입력하세요. )" numberOnly="numberOnly" value="<?=$price?>">
							</div>
							<div class="saller_insert_group">
								<div class="saller_insert_group_title">
									<p>할인율</p>
								</div>
								<?php
									$percent = preg_replace("/[^0-9]*/s", "", $row1['sale_percent']);
								?>
								<input type="text" class="product_sale" placeholder="할인율을 입력하세요. ( 숫자만 입력하세요. )" value="<?=$percent?>">
							</div>
							<div class="saller_insert_group">
								<div class="saller_insert_group_title" style="width: 150px; margin-left: -50px;" >
									<p>할인 적용 금액</p>
								</div>
								<?php
									$drice = preg_replace("/[^0-9]*/s", "", $row1['product_drice']);
								?>
								<input type="text" class="product_sale_success" readonly="readonly" disabled value="<?=$drice?>">
							</div>

							<div class="saller_insert_group option_box">
								<?php
								$sql2 = "SELECT * FROM `product_manage` WHERE `pm_num` = $product_num";
								$result2 = mysqli_query($con,$sql2);
								// $row2 = mysqli_fetch_array($con,$result2);
								$i=1;
								while($row2 = mysqli_fetch_array($result2)){
							?>
								<div class="option_group_wrap option_group">
									<div class="product_option">
										<div class="saller_insert_group_title">
											<p>상품 옵션</p>
										</div>


										<?php 
											if($row2['product_option'] == "사이즈"){
										?>
										<select class="product_more_option" disabled="disabled" readonly>
											<option>선택</option>
											<option value="size" selected>사이즈</option>
											<option value="color" >색상</option>
											<option value="volume">용량</option>
										</select>
										<?php
											}else if($row2['product_option'] == "색상"){
										?>
										<select class="product_more_option" disabled="disabled" readonly>
											<option>선택</option>
											<option value="size" >사이즈</option>
											<option value="color" selected>색상</option>
											<option value="volume">용량</option>
										</select>
										<?php
											}else{
										?>
										<select class="product_more_option" disabled="disabled" readonly>
											<option>선택</option>
											<option value="size" >사이즈</option>
											<option value="color" selected>색상</option>
											<option value="volume">용량</option>
										</select>
										<?php
											}
										?>
										
									

									</div>
									<div class="product_more">
										<div class="saller_insert_group_title" style="width: 50px;">
											<p style="width: 50px;" disabled="disabled" readonly>상세 1</p>
										</div>
										<input type="text" class="product_more_insert detail_opt1" placeholder="직접입력" style="width: 90px;" value="<?=$row2['p_opt_detail1']?>" disabled="disabled" readonly>


										<div class="saller_insert_group_title" style="width: 50px; margin-left: 10px;" >
											<p style="width: 50px;" >상세 2</p>
										</div>
										<input type="text" class="product_more_insert detail_opt2" placeholder="직접입력" style="width: 90px;"  value="<?=$row2['p_opt_detail2']?>" disabled="disabled" readonly>
									</div>
									<div class="product_item_count">
										<div class="saller_insert_group_title" style="width: 80px;">
											<p>재고수량</p>
										</div>
										<input type="number" class="product_count_insert"  value="<?=$row2['product_quantity']?>">
									</div>
									<!-- <div class="product_opiton_add">
										<i class="fas fa-plus-circle"></i>
									</div> -->
								</div>
							<?php
							$i++;
								}
							?>
							</div>


							<div class="saller_insert_group" style="position: relative;">
								<div class="saller_insert_group_title">
									<p>배송 정보</p>
								</div>
								<input type="text" class="product_delivery" placeholder="배송 정보를 입력하세요." value="<?=$row1['product_delivery']?>">
								<i class="fas fa-sort-down down_icon"></i>
								<div class="delivery_info">
									<p>무료배송, 도서산간 지역 무료배송</p>
									<p>업체 무료배송</p>
								</div>
							</div>
							<div class="saller_insert_group large_group">
								<div class="saller_insert_group_title">
									<p>교환 정보</p>
								</div>
								<textarea class="exchange_input" placeholder="교환정보를 입력하세요."><?=$row1['product_exchange']?></textarea>
							</div>
							<div class="saller_insert_group large_group">
								<div class="saller_insert_group_title">
									<p>환불 정보</p>
								</div>
								<textarea class="refund_input" placeholder="환불정보를 입력하세요."><?=$row1['product_refund']?></textarea>
							</div>
							<div class="saller_insert_group large_group">
								<div class="saller_insert_group_title">
									<p>상품 설명</p>
								</div>
								<textarea class="prodcunt_guild_input" placeholder="상품 설명을 입력하세요."><?=$row1['product_desc']?></textarea>
							</div>
							<div class="saller_insert_group auto_group">
								<div class="saller_insert_group_title">
									<p style="line-height: 30px; text-align: center;">섬네일<br>이미지<br>등록하기</p>
								</div>
								<div class="thumbnail_div">
									<input type="file" multiple id="thumbnail-upload" name="myInputName" style="display: none;" />
									<input type="file" multiple id="thumbnail-upload_backup"  name="myInputName" style="display: none;"/>
								</div>
							</div>
							<div class="saller_insert_group auto_group">
								<div class="saller_insert_group_title">
									<p style="line-height: 30px; text-align: center;">상품<br>상세이미지<br>등록하기</p>
								</div>
								<div class="producnt_file_div">
									<input type="file" multiple id="producnt_file-upload" name="myInputName" style="display: none;"/>
									<input type="file" multiple id="producnt_file-upload_backup" name="myInputName"  style="display: none;" //>
								</div>
							</div>
							
							<div class="producnt_insert_btns"> 
								<button class="producnt_insert_reset">재작성</button>
								<button class="producnt_insert_cancel">등록취소</button>
								<button class="producnt_insert_success" style="background-color: #ee1e72;" data-name="<?php echo $row['name'];?>" data-id="<?php echo $_SESSION['user_id']?>" data-num="<?=$product_num?>" data-pmnum="<?=$pm_num?>">입력완료</button>
							</div>
							<div class="product_banner">
								<img src="./images/banner2.png" alt="img">
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