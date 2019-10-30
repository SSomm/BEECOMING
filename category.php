<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="libs/animate.css">
	<link rel="stylesheet" type="text/css" href="libs/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="libs/slick/slick.css">

	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/category.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/jquery-ui.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/category.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.slide_div_wrap').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:true
			});
			$('.sali_rank_slick').slick({
				arrows:false,
				autoplay:true,
				autoplayspeed:1000,
				dots:false,
				slidesToShow: 4,
			    slidesToScroll: 1
			});
			$(".slick-dots > li > button").text("");
		});
	</script>
	<style type="text/css">
		.slick-dots{
			/*background: red;*/
			position: absolute;
			z-index: 600;
			left: 170px;
			bottom: 10px;
		}
		.slick-dots > li{
			width: 9px;
			height:9px;
			cursor: pointer;
			background: #f5989d;
			margin-left: 10px;
			float: left;
			border-radius: 50%;
		}
		.slick-dots > li > button{
			border-radius: 50%;
			background: none;
			border-right: none;;
			content: "";
			opacity: 0;
		}
	</style>
</head>
<body>
	<?php
		include ("./dbcon.php");
		include 'header.php';
	?>
	<!--설문조사-->
	<?php
		include 'poll_modal.php';
		$cate=$_GET['cate'];

		if($cate=="향수"){
			$cate="perfume";
		}else if($cate=="의류"){
			$cate="clothes";
		}else if($cate=="쥬얼리/시계"){
			$cate="jewels";
		}else if($cate=="패션소품"){
			$cate="fashion_acc";
		}else if($cate=="메이크업"){
			$cate="makeup";
		}else if($cate=="슈즈"){
			$cate="shoe";
		}else if($cate=="디퓨저/스프레이"){
			$cate="diffuser";
		}else if($cate=="플라워"){
			$cate="flowers";
		}else if($cate=="차/커피/음료"){
			$cate="tea";
		}else if($cate=="디지털 용품"){
			$cate="digital";
		}



	?>
	<?php
		if(isset($cate)){
	?>
	<p class="get_cate_category" style="display: none;"><?=$cate?></p>
	<?php
		}else{
	?>
	<p class="get_cate_category" style="display: none;">all</p>
	<?php
		}
	?>
	
	<div class="remocon" style="display: none;">
		<div class="remocon_wrap">
			<div class="remocon_top">
				<ul class="remocon_ul">
					<li>여성향수</li>
					<li>남성향수</li>
					<li class="brand">브랜드별 <i class="fas fa-angle-down"></i>
						<ul class="remocon_sub" style="display: none;">
							<li>랑방</li>
							<li>샤넬</li>
							<li>구찌</li>
							<li>마크제이콥스</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="remocon_bottom">
				<h3>SALE<br>EVENT</h3>
				<button class="coupon">COUPON<br>ZONE</button>
			</div>
		</div>
	</div>
	<?php
		include 'cart.php';
	?>
	<div class="wrap">
		<section class="cuator_main_section">
			<img src="category_img/all.png" alt="img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>SHOP</span>
			</div>
			<div class="communitypage_info">
				<p  style="color:#4c4949; margin-left: 100px;">카테고리별 기프트 상품을 보실 수 있습니다.</p>
			</div>
		</section>
		<div class="cate_menu">
			<nav>
				<ul>



					<li  style="width: 80px;" class="all_li"><a href="#">전체</a>
						<div class="li_line">
						</div>
					</li>
					

					<li style="width: 80px;"  class="clothes_li"><a href="#">의류</a></li>
					
					<li  style="width: 80px;"  class="shoe_li"><a href="#">슈즈</a></li>
					
					<li class="jewels_li"><a href="#"  >쥬얼리&시계</a></li>
					<li class="fashion_li"><a href="#"  >패션소품</a></li>
					<li class="make_li"><a href="#"  >메이크업</a></li>
					<li class="perfume_li"><a href="#"  >향수</a></li>
					<li  style="width: 130px;"  class="diffuser_li"><a href="#">디퓨저&스프레이</a></li>
					<li class="flower_li"><a href="#"  >플라워</a></li>
					<li class="tea_li"><a href="#"  >차/커피/음료</a></li>
					<li  class="digital_li"><a href="#" >디지털용품</a></li>
				</ul>
			</nav>
		</div>
		<section class="sali_section">
			<div class="sali_wrap">
				<div class="sali_top">
					<?php
							if(isset($cate)){
					?>	
					<h2><?php  

					switch($cate){

					case("clothes") : echo "<h2>의류</h2>";break;
					case("all") : echo "<h2>전체</h2>";break;
					case("shoe") : echo "<h2>슈즈</h2>";break;
					case("jewels") : echo "<h2>쥬얼리&시계</h2>";break;
					case("fashion_acc") : echo "<h2>패션소품</h2>";break;
					case("makeup") : echo "<h2>메이크업</h2>";break;
					case("perfume") : echo "<h2>향수</h2>";break;
					case("diffuser") : echo "<h2>디퓨저&스프레이</h2>";break;
					case("flowers") : echo "<h2>플라워</h2>";break;
					case("tea") : echo "<h2>차/커피/음료</h2>";break;
					case("digital") : echo "<h2>디지털용품</h2>";break;
					 }

					?></h2>
					<?php
				}else{
					?>
					<h2>전체</h2>
					<?php
					}
					?>
				</div>
				<div class="sali_rank" style="display: none;">
					<div class="sali_rank_title">
						<h1>BEST TOP 5</h1>
						<p>최근 일주일간 가장 많이 팔린 상품 리스트 입니다.</p>
					</div>
					<div class="sali_rank_body">
						<div class="sali_rank_slick">
							<?php

								if(isset($cate)){
									$sql2="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.category='".$cate."' and shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc limit 0,5";
								$result2=mysqli_query($con, $sql2);
								}else{


								$sql2="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc limit 0,5";
								$result2=mysqli_query($con, $sql2);
								}
								while($row2=mysqli_fetch_array($result2)){
									
									$th_img=explode(",",$row2['product_thumb']);
									$th=$th_img[0];
							?>					

							<div class="rank_shop_item">
								<div class="shop_item_div" >
									<div class="shop_item_div_img">
										<img src="./category_img/<?php echo $row2['category']?>/<?php echo $th;?>" alt="img">
										<button class="new_or_hot">NEW</button>
										<div class="hover_div" style="display: none;" data-num="<?php echo $row['product_num'];?>">
											<div class="hover_title">
												<h3><?php echo $row2['product_name']?></h3>
											</div>
											<div class="hover_info">
												<p>판매가 : <?php echo $row2['product_price']?></p><br>
												<?php
												if($row2['product_drice']){												
												?>
												<p>할인판매가 : <?php echo $row2['product_drice']; ?><span style="color: red;"><?php echo $row2['sale_percent']?></span></p>
												<?php
												}	
												?>
											</div>
											<div class="hover_ather">
												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-eye"></i>
													</div>
													<p><?php echo $row2['product_view_num']?></p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle">
														<i class="fas fa-heart" style="margin-left: 1px;"></i>
													</div>
													<p><?php echo $row2['product_sel_num']?></p>
												</div>

												<div class="ather_div">
													<div class="circle ather_circle" style="text-align: center;">
														<i class="fas fa-comments"></i>
													</div>
													<p><?php echo $row2['product_review_num']?></p>
												</div>
											</div>
										</div>
									</div>
									<div class="shop_info_div">
										<p class="p_brand"><span class="brand_tape">판매샵</span>&nbsp;&nbsp;<?php echo $row2['product_brand']?></p>
										<p class="p_name"><?php echo $row2['product_name'];?></p>
									<!-- 	<p>EDT 100ml</p> -->
									<!-- <br> -->
										<p class="p_price"><?php echo $row2['product_price'];?></p>

									</div>
									<div class="circle cart_circle_btn">
										<i class="fas fa-shopping-cart"></i>
									</div>
								</div>
							</div>
							<?php
							}
							?>

						</div>
					</div>
				</div>
				<div class="sali_bottom" style="">
					<div class="sali_img">
						<img src="images/sali_img.png" alt="img">
					</div>
					<div class="sali_left">
						<div class="left_one" style="margin-top: 0px; background: #1b1464;">
							<p>성년의 날 맞이 향수 할인 행사!<br>
							할인폭 30% ~ 최대 65%;
							</p>
						</div>
						<div>
							<p>브랜드 이월상품 할인 이벤트 SNS에 업로드하여 더블할인!!
							</p>
						</div>
						<div>
							<p >[ 1 + 1] 선착순 한정 이벤트</p>
								<p style="text-align: center;margin-top: 5px">"향기를 남기다."
							</p>
						</div>
						<div>
							<p>#취향저격 #봄내음<br>
							Joyous 신제품 출시 이벤트
							</p>
						</div>
						<div>
							<p>따뜻한 봄 햇살처럼,<br>
DAILY PERFUME PRODUCT
							</p>
						</div>
					</div>

				</div>
			</div>
		</section>
		<section class="event_section">
			<div class="event_wrap">
				<div class="left_event">
					<div class="event_top">
						<h1>SPECIAL EVENTS</h1>
					</div>
					<div class="event_bottom ">
						<img src="images/event_img1.png" alt="img" style="margin-left: 50px;">
					</div>
				</div>
				<div class="right_event">
					<div class="event_top">
						<h1 style="margin-right: 50px;">TODAY’s HOT</h1>
					</div>
					<div class="event_bottom slide_div">
						<div class="slide_div_wrap">

							<?php
							if(isset($cate)){
								$sql1="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.category='".$cate."' and shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc limit 0,5";
									$result1=mysqli_query($con, $sql1);

							}else{
									$sql1="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc limit 0,5";
									$result1=mysqli_query($con, $sql1);
							}		
								while($row1=mysqli_fetch_array($result1)){

									$thumb1=explode(",",$row1['product_thumb']);
							?>
							<div class="slide_div_item">
								<div class="slide_div_item_top">
								</div>
								<div class="slide_div_item_bottom">
									<div class="slide_bottom_left">
										<img src="./category_img/<?php echo $row1['category']?>/<?php echo$thumb1[0];?>" alt="img">
									</div>
									<div class="slide_bottom_right">
										<div class="right_hot">
											<p>HOT</p>
										</div>
										<p>[<?php echo $row1['product_brand']?>]</p>
										<p><?php echo $row1['product_name']?></p>
										<?php
											if($row1['product_drice']){
										?>
										<h3><?php echo $row1['product_drice']?></h3>
										<?php
									}else{
										?>
										<h3><?php echo $row1['product_price']?></h3>
									<?php
									}
									?>
									</div>
								</div>
							</div>	
							<?php
							}
							?>
						</div>
						<!-- <img src="images/event_img2.png" alt="img"> -->
					</div>
				</div>
			</div>
		</section>
		<section class="shop_section">
			<div class="shop_wrap">
				<div class="shop_title">
					<h1>PRODUCT LISTS</h1>
				</div>
				<div class="shop_body">
					<?php
						if(isset($cate)){
							$sql="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.category='".$cate."' and shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_num desc";
							$result=mysqli_query($con, $sql);

						}else{
							$sql="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_num desc";
							$result=mysqli_query($con, $sql);
						}
						
					
						while($row=mysqli_fetch_array($result)){
							$thumb=explode(",",$row['product_thumb']);
							// if($row['category']=="여성향수"||$row['category']=="남성향수"){
							// 	$category="perfume";
							// }
					?>
					<div class="shop_item">
						<div class="shop_item_div" >
							<div class="shop_item_div_img">
								<img src="./category_img/<?php echo $row['category']?>/<?php echo$thumb[0];?>" alt="img">
								<button class="new_or_hot">NEW</button>
								<div class="hover_div" style="display: none;" data-num="<?php echo $row['product_num'];?>">
									<div class="hover_title">
										<h3><?php echo $row['product_name'];?></h3>
									</div>
									<div class="hover_info">
										<p>판매가 : <?php echo $row['product_price'];?></p><br>
										<?php
										if($row['product_drice']){
										?>
										<p>할인판매가 : <?php echo $row['product_drice']?> <span style="color: red;"><?php echo $row['sale_percent']?></span></p>
										<?php
									}else{}
										?>
									
									</div>
									<div class="hover_ather">
										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-eye"></i>
											</div>
											<p><?php echo $row['product_view_num']?></p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p><?php echo $row['product_sel_num']?></p>
										</div>

										<div class="ather_div">
											<div class="circle ather_circle">
												<i class="fas fa-comments"></i>
											</div>
											<p><?php echo $row['product_review_num']?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="shop_info_div">
								<p class="p_brand"><span class="brand_tape">판매샵</span> <?php echo $row['product_brand']?></p>
								<p class="p_name" data-num="<?php echo $row['product_num'];?>"><?php echo $row['product_name']?></p>
							<!-- 	<p>EDT 100ml</p> -->
							<!-- <br> -->
								<p class="p_price"><?php echo $row['product_price']?></p>

							</div>
							<div class="circle cart_circle_btn" data-num="<?php echo $row['product_num']?>" data-id="<?php echo $_SESSION['user_id']?>">
								<i class="fas fa-shopping-cart"></i>
							</div>
						</div>
					</div>

					<?php

				}
					?>

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
