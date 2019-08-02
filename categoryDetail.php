<?php
	include("./dbcon.php");
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="libs/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="libs/animate.css">
	<link rel="stylesheet" type="text/css" href="libs/fontawesome/css/all.min.css">
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/category.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/categoryDetail.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/category.js"></script>
	<script type="text/javascript" src="js/modal.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".count").click(function(){
				// alert("a");
				if($(this).val() < 0){
					$(this).val("0");
				}
			});
			 CKEDITOR.replace('review_area',{
    	 // width:'100%',
            height:'320px',
      // CKEDITOR.instances.contents.updateElement();

    	filebrowserImageUploadUrl:'./libs/ckeditor/upload_review.php'
    });
		});
	</script>
</head>
<body>
	<?php
		$product_num=$_GET['product_num'];
		include 'header.php';
		$sql="select * from shop_product where product_num=".$product_num;
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);


		if($row['category']=="pefume"){
			$category="향수";
		}else if($row['category']=="clothes"){
			$category="의류";
		}else if($row['category']=="fashion_acc"){
			$category="패션소품";
		}else if($row['category']=="shoe"){
			$category="슈즈";
		}else if($row['category']=="jewels"){
			$category="쥬얼리&시계";
		}else if($row['category']=="makeup"){
			$category="메이크업";
		}else if($row['category']=="diffuser"){
			$category="디퓨저&스프레이";
		}else if($row['category']=="flowers"){
			$category="플라워";
		}else if($row['category']=="tea"){
			$category="차/커피/음료";
		}else if($row['category']=="digital"){
			$category="디지털용품";
		}




		$thb=explode(",", $row['product_thumb']);
		$sql1="select * from product_manage where product_num=".$product_num;
		$result1=mysqli_query($con, $sql1);
		$row1=mysqli_fetch_array($result1);
			if($row['category']=="여성향수"||$row['category']=="남성향수"){
									$p_category="perfume";
								}
	?>
	<!--설문조사-->
	<?php
		include 'poll_modal.php';
	?>
	<?php
		include 'cart.php';
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



	<!-- 환불신청 -->
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

	
		<div class="product_review_modal" style="display: none;" >
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
							<div class="review_info_body">
								<p>[디즈니] 레몬밤티 _ 토이스토리(6개입)(티백,차)</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title">
								<p>구매금액 : </p>
							</div>
							<div class="review_info_body small_info_body">
								<p>12,500원</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title ">
								<p>구매확정일 : </p>
							</div>
							<div class="review_info_body small_info_body small_date">
								<p>2019. 05. 17.</p>
							</div>
						</div>

						<div class="review_info_div small_info_div">
							<div class="review_info_title">
								<p>판매샵 : </p>
							</div>
							<div class="review_info_body small_info_body small_brand">
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
								<input type="text" class="review_title_1">
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
					<button class="review_success" style="background: #ee1e72">작성완료</button>
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
						<tr class="order_box">
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
									<button class="refund_btn"  data-num="<?php echo $row['product_num']?>">환불신청</button>
									<button class="exchange_btn"  data-num="<?php echo $row['product_num']?>">교환신청</button>
									<button class="purchase_btn" style="background: #ee1e72"  data-num="<?php echo $row['product_num']?>">구매확정</button>
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
	<div class="product_qna_modal" style="display: none;">
		<div class="product_qna_wrap">
			<div class="qna_modal_wrap_wrap">
				<div class="qna_modal_top">
					<div class="modal_top_left">
						<div class="circle qna_icon_circle">
							<i class="fas fa-question"></i>
						</div>
						<h1>상품 관련 문의하기</h1>
					</div>
					<div class="modal_top_right">
						<input type="text" class="inquirer_input" value="<?php echo $_SESSION['user_id'];?>" readonly disabled>
						<p>문의자 : </p>
					</div>
				</div>
				<div class="qna_modal_body">
					<div class="qna_modal_img">
		
						<img src="./category_img/<?php echo $row['category']?>/<?php echo $thb[0]?>" alt="img">
		
					</div>
					<div class="qna_body_table_div">
						<div class="table_div">
							<div class="table_title">
								<p>제품명 : </p>
							</div>
							<div class="table_names">
								<p class="product_modal_name"><?php echo $row['product_name']?></p>
							</div>
						</div>
						<div class="table_div low_table_div">
							<div class="table_title">
								<p>판매샵 : </p>
							</div>
							<div class="table_names low_table_names">
								<p class="product_modal_brand"># <?php echo $row['product_brand']?></p>
							</div>
						</div>
						<div class="table_div low_table_div">
							<div class="table_title">
								<p>카테고리 : </p>
							</div>
							<div class="table_names low_table_names">
								<p class="product_modal_category"><?php echo $row['category']; ?></p>
							</div>
						</div>

						<div class="table_div low_table_div">
							<div class="table_title">
								<p>문의유형 : </p>
							</div>
							<div class="table_names low_table_names">
								<select class="qna_type">
									<option value="none">선택하기</option>
									<option value="상품 정보 관련">상품 정보 관련</option>
									<option value="배송관련">배송관련</option>
									<option value="교환/환불관련">교환/환불관련</option>
									<option value="기타">기타</option>
								</select>
							</div>
						</div>
						<div class="table_div low_table_div">
							<div class="table_title">
								<p>공개여부 : </p>
							</div>
							<div class="table_names low_table_names qna_radio_div" style="padding-top: 8px;">
								<input type="radio" name="open_or_notopen" class="openraido" value="1" id="openradio_1">
								<label for="openradio_1">공개</label>
								<input type="radio" name="open_or_notopen" class="openraido" value="0" id="notopenradio_1">
								<label for="notopenradio_1" style="margin-left: 40px;">비공개</label>
							</div>
						</div>
						<div class="table_div" style="margin-top: 10px;">
							<div class="table_title">
								<p>문의제목 : </p>
							</div>
							<div class="table_names">
								<input type="text" class="qna_title_input">
							</div>
						</div>
					</div>
				</div>
				<div class="qna_modal_area">
					<textarea class="qna_bodytext_a"></textarea>
					<p class="bodytextlength">( 0 / 500 자)</p>
				</div>
				<div class="qna_modal_btns"> 
					<button class="qna_reset">재작성</button>
					<button class="qna_cancel">작성취소</button>
					<button class="qna_success" style="background: #ee1e72" data-pnum="<?php echo $row['product_num']?>">작성완료</button>
				</div>
			</div>
			<div class="circle qna_close_circle">
				<i class="fas fa-times"></i>
			</div>
		</div>
	</div>




	<div class="wrap_1">
		<section class="cuator_main_section">
			<img src="images/category_back.png" alt="img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>SHOP</span>
			</div>
			<div class="communitypage_info">
				<p  style="color:#4c4949; margin-left: 100px;">카테고리별 기프트 상품을 보실 수 있습니다.</p>
			</div>
		</section>
		<div class="cate_menu detail_cate_menu">
			<nav>
				<ul>
					<li  style="width: 80px;"><a href="#">전체</a>
						<div class="li_line">
						</div>
					</li>
					<li style="width: 80px;"><a href="#">의류</a></li>
					<li  style="width: 80px;"><a href="#">슈즈</a></li>
					<li><a href="#">쥬얼리/시계</a></li>
					<li><a href="#">패션소품</a></li>
					<li><a href="#">메이크업</a></li>
					<li><a href="#">향수</a></li>
					<li  style="width: 130px;"><a href="#">디퓨저/스프레이</a></li>
					<li><a href="#">플라워</a></li>
					<li><a href="#">차/커피/음료</a></li>
					<li><a href="#">디지털용품</a></li>
				</ul>
			</nav>
		</div>
		<?php 
				$thumbnail=explode(",",$row['product_thumb']);
				$one_thumb=$thumbnail[0];
				// echo $thumbnail[0];
		?>
		<section class="detail_section">
			<div class="detail_wrap">
				<div class="detail_title">
					<div class="detail_top_title">
						<p>HOME > SHOP > 향수 > <?php echo $row['category'];?></p>
					</div>
					<div class="detail_top_body">
						<div class="top_body_left">
							<div class="body_left_main_img">
								<img src="./category_img/<?php echo $row['category'];?>/<?php echo $one_thumb?>" alt="img">
							</div>
							<div class="body_left_sub_img">
								<?php 

								$t=count($thumbnail);
								$s=0;
								while($s<$t-1 && $s<4){
								?>
								<div class="sub_img" style="margin-left: 0px;  overflow: hidden;">
									<img src="./category_img/<?php echo$row['category']?>/<?php echo $thumbnail[$s]?>" alt="img">
								</div>
								<?php
								$s++;
								}
								?>
							</div>

						</div>
						<div class="body_right_sub_img">
							<div class="right_sub_title"><span class="detial_shop" style="font-size: 0.9em;">판매샵</span>
								<span># <?php echo $row['product_brand'];?></span><br>
								<p><?php echo $row['product_name'];?></p>
							</div>
							<table class="detail_info">
								<tr>
									<td style="width:100px;">판매가</td>
									<td class="sell_p_p"><?php echo $row['product_price']?></td>
								</tr>
								<?php
								 if($row['product_drice']){
								?>
								<tr>

									<td style="width:100px;">할인적용금액</td>
									<td  class="sell_p_d"><?php echo $row['product_drice']?><span style="color:red;"> [<?php echo $row['sale_percent']?>] </span></td>
								</tr>
								<?php
								}
								?>
								<!-- <tr>
									<td>쿠폰적용금액</td>
									<td>29,700원<span style="color:green">[22%]</span></td>
								</tr> -->
								<tr>
									<td style="width:100px;">배송비 정보</td>
									<td class="del_desc"><?php echo $row['product_delivery'];?></td>
								</tr>
								<tr>
									<td style="width:100px;">수량</td>
									<!--이쪽 제이쿼리 ui 로 스피너 구현한건데.. 버튼이 색깔이 안바뀌네요..-->
									<td><input class="count" type="number" value="0"/></td>
								</tr>
								<tr>
									<?php
										$sql3="select DISTINCT product_option from product_manage where product_num=".$row['product_num'];
										$result3=mysqli_query($con, $sql3);
										$row3=mysqli_fetch_array($result3);
										if($row3['product_option']){
										?>
											<td style="width:100px;">옵션</td>
											<td><select class="detail_option" data-num="<?php echo $row['product_num']?>">
											<option>선택하기</option>

									<?php
										// }while($row3=mysqli_fetch_array($result3)){											
									?>
										<option value="<?php echo $row3['product_option'];?>"><?php echo $row3['product_option'] ?></option>
																	
									<?php
									}if($row3['product_option']){
									?>
									</select></td>
									<?php
									}
									?>			
								</tr>
							</table>
							<div class="right_sub_btn">
								<button class="dr_btn"  data-num="<?php echo$product_num?>" data-id="<?php echo $_SESSION['user_id']?>">즉시 구매</button>
								<button class="gocart_btn" data-id="<?php echo $_SESSION['user_id']?>" data-num="<?php echo$product_num?>">장바구니 넣기</button>
								<!-- <button class="goheart_btn" style="background: white;
	border: 2px solid #acacac;
	color: #acacac; box-sizing: border-box;">관심상품 등록</button> -->
							</div>
						</div>
					</div>
				</div>

				<div class="detail_main">
					<nav class="detail_nav">
						<ul>
							<li>상품 상세 설명</li>
							<li>상품 후기</li>
							<li>상품 Q&A</li>
							<li>배송 및 교환/환불 안내</li>
						</ul>
					</nav>
					<div class="detail_main_img">
						<h1>상품설명</h1>
						<?php
							echo '<p style="padding-top:50px; font-family:a뉴고딕M">'.$row['product_desc'].'</p>';
							$detail_imgs=explode(",",$row['product_detail_img']);
							$k=0;
								// echo "aa";
								// $detail_imgs[$k];
						
								$m=count($detail_imgs);
							while($k<$m-1){
						// ?>
						<img src="./category_img/<?php echo$row['category'];?>/details/<?php echo$detail_imgs[$k]?>" alt="img">
						 <?php
						$k++;
						}
						?>
					</div>
					<div class="detail_main_info">
						<div class="detail_main_top">
							<img src="images/logo.png" alt="img">
							<span class="detial_shop" style="font-size: 0.9em; margin-left: 20px; margin-top: 30px;">판매샵</span>
						</div>
						<div class="deatil_main_bottom">
							<div class="main_bottom_list">
								<p class="gurid">배송안내</p>
								<p style="margin-left: 20px;"><?php echo $row['product_delivery']?></p>
							</div>

							<div class="main_bottom_list">
								<p class="gurid">교환/환불안내</p>
								<p style="margin-left: 20px;"><?php echo $row['product_exchange']." / ".$row['product_refund'] ?></p>
							</div>

							<div class="main_bottom_list">
								<p class="gurid">문의전화</p>
								<p style="margin-left: 20px;">064) 700-700 혹은 070-0000-0000</p>
							</div>
						</div>
					</div>
					<div class="qna_or_review">
						<div class="qna">
							<div class="qna_title">
								<span>상품 Q&A</span> <span class="question" data-cate="<?php echo $row['category']?>">문의하기</span> 
							</div>
							<div class="qna_body">
								<div class="qna_list">
									<?php 
										$sql2="select * from product_qna where product_num=".$row['product_num']." and QnA_open=1";
										$result2=mysqli_query($con, $sql2);
										while($row2=mysqli_fetch_array($result2)){
											$sql3="select * from member where id='".$row2['questioner_id']."'";
											$result3=mysqli_query($con, $sql3);
											$row3=mysqli_fetch_array($result3);

											$sql6="select * from member where id='".$row2['answerer_id']."'";
											$result6=mysqli_query($con, $sql6);
											$row6=mysqli_fetch_array($result6);

									 ?>
									<div class="qna_list_itme" style="margin-left: 0px;">
										<div class="qna_item_title">
											<div class="circle qna_title_circle">
												<div class="circle qna_circle">
													<img src="<?php echo $row3['profile_img']?>" alt="img">
												</div>
											</div>
										</div>
										<div class="qna_bodytext">
											<span class="qna_nickname"><?php
												if($row3['nickname']){
													echo $row3['nickname']; 
											}
											 
												else{
												 echo $row3['name']; 
											}	
											?>


												</span>
											<span class="qna_bodytext_aa">
												<?php echo $row2['question_title'];?>
											</span>
											<?php

											if($row2['QnA_open']){
												?>	
											<span class="qna_bodyaaa">
												&nbsp;&nbsp;<?php echo $row2['question_body']?>
											</span>
										<?php
										}else{
										?>
										<span class="qna_bodyaaa">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-lock"></i></span>

										<?php
										}
										?>
										</div>
										<div class="qna_date">
											<?php
												$date=date_create($row2['question_date']);
												$datee=date_format($date, "Y. m. d");

											?>
											<p><?php echo $datee; ?></p>
										</div>
									</div>
									<?php
									if(isset($row2['answer_body'])){
									?>
									<div class="question_answer">
										<p class="answer_reply"><span>답변 </span> <i class="fas fa-arrow-right"></i></p>
										<div class="answer_body_title">
											<p class="answer_title"><?php echo $row2['answer_title']?></p>	
										<p class="answer_body"><?php echo $row2['answer_body']?></p>
										</div>
										
										<!-- <p class="answer_company"><?php echo $row6['name']?></p> -->
										<p class="answer_date"><?php 
										echo date_format(date_create($row2['answer_date']), "Y. m. d");
										?></p>	

									</div>
									<?php
								} }
									?>
								</div>
							</div>
							<div class="qna_page">
								<!-- 페이징을 부탁드립니다.... -->
							</div>
						</div>

						<div class="review">
							<div class="review_title">
								<span>상품후기</span>
								<!-- <span class="review_write">후기쓰기</span> -->
							</div>
							<div class="review_body">
								
								<?php

								$sql4="select * from product_review where product_num=".$product_num." order by review_num desc";
								$result4=mysqli_query($con, $sql4);
								while($row4=mysqli_fetch_array($result4)){
									$sql5="select * from member where id='".$row4['buyer_id']."'";
									$result5=mysqli_query($con, $sql5);
									$row5=mysqli_fetch_array($result5);
								?>
								<div class="review_list_item">
									<div class="review_list_left" style="float: left;">
									<?php

									$str=$row4['review_body'];
												preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
												if($matches[1]==""){
													// echo count($matches);
												?>
												<img src="http://192.168.20.78/becoming0508/images/board_wrap_img.png" alt="img">
												<img src="http://192.168.20.78/becoming0508/images/board_wrap_img.png" alt="img">
												<img src="http://192.168.20.78/becoming0508/images/board_wrap_img.png" alt="img">
												<?php	
												}else{
														for($i=0;$i<=count($matches);$i++){

													?>
													<img src="<?php echo $matches[1];?>" alt="img">
													<?php
												}
												}


									?>


									</div>
									<div class="review_list_nickname">
										<p><?php echo $row5['name']?></p>
									</div>
									<div class="review_list_bodytext">
										<p><?php echo preg_replace("/<img[^>]+\>/i", "", $row4['review_title']) ?></p>
									</div>
									<div class="review_list_date">
										<p><?php

										$date_q=date_create($row4['review_date']);
										// echo $date_q;
										 echo date_format($date_q, "Y-m-d");
										?></p>
									</div>
								</div>

								<?php
	
									}
								?>
							</div>
							<div class="review_page">
								<!-- 페이징을.... -->
							</div>
						</div>
						<div class="last_div">
							<button class="go_list_btn">상품 리스트로 돌아가기</button>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php
			include 'circles.php';
		?>
		
		<?php
			include 'footer.php';
		?>
</body>
</html>
