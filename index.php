<?php
	error_reporting(0);
	include("dbcon.php");
	session_start();
	// echo $_SESSION['user_nickname'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="libs/animate.css">
	<link rel="stylesheet" type="text/css" href="libs/fontawesome/css/all.min.css">
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/content.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="libs/slick/slick.css" >
	<link rel="stylesheet" type="text/css" href="libs/vdialog.css" >
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="libs/vdialog.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>


</script>
<?php
		include 'header.php';
	?>
<style type="text/css">
	.name{
  position: absolute;
  left: 50px;
  /*top: -70px;*/
}
</style>
	<title>비커밍</title>
</head>
<body>
	<!--header-->
	
	<!--설문조사-->
	<?php
		include 'poll_modal.php';
	?>
	<?php
		// include 'img_scale.php';
	?>
	<div class="wrap">
		
		<?php
			include 'circles.php';
		?>
		<section class="main_section">
			<div class="slick_slide">
			<img src="images/slide_img1.jpg" class="slick autoplay" alt="img">
			<img src="images/image05.jpg" class="slick autoplay" alt="img">
			<img src="images/image01.jpg" class="slick autoplay" alt="img">
			</div>
			<h1 id="headline">센스 큐레이팅 기프트샵 비커밍</h1>
			<div class="element">
			<div class="message text1">비커밍에 오신 여러분, 환영합니다!</div>
			<div class="message text2">
			비커밍은 기프트 큐레이션 서비스를 제공하는 소비자 경험중심 쇼핑몰 입니다.</div><br>
			<div class="message text3 test_1">저희 사이트를 통해 행복한 기억이 배가될 수 있기를 바랍니다.
			 </div>
			</div>
		</section>
		<section class="category_section">
			<div class="category_wrap">
				<div class="category">
					<div class="circle category_circle">
						<i class="fas fa-spray-can"></i>
					</div>
					<p>향수</p>
				</div>

				<div class="category">
					<div class="circle category_circle" style="padding-left: 16%;">
						<i class="fas fa-gem"></i>
					</div>
					<p>쥬얼리/시계</p>
				</div>

				<div class="category">
					<div class="circle category_circle" style="padding-left: 15%;">
						<i class="fas fa-tshirt"></i>
					</div>
					<p>의류</p>
				</div>

				<div class="category">
					<div class="circle category_circle" style="padding-left: 15%;">
						<i class="fas fa-shoe-prints"></i>
					</div>
					<p>슈즈</p>
				</div>

				<div class="category">
					<div class="circle category_circle">
						<i class="fas fa-suitcase"></i>
					</div>
					<p>패션소품</p>
				</div>

				<div class="category">
					<div class="circle category_circle">
						<i class="fas fa-magic"></i>
					</div>
					<p>메이크업</p>
				</div>

				<div class="category">
					<div class="circle category_circle" style="padding-left: 15%;">
						<i class="fas fa-coffee"></i>
					</div>
					<p>차/커피/음료</p>
				</div>

				<div class="category">
					<div class="circle category_circle" >
						<i class="fas fa-seedling"></i>
					</div>
					<p>플라워</p>
				</div>

				<div class="category">
					<div class="circle category_circle">
						<i class="fas fa-wind"></i>
					</div>
					<p>디퓨저/스프레이</p>
				</div>

				
				<div class="category">
					<div class="circle category_circle" style="padding-left: 15%;">
						<i class="fas fa-digital-tachograph"></i>
					</div>
					<p>디지털 용품</p>
				</div>
			</div>
		</section>
		<section class="content_section">
			<div class="content_top">
				<div class="top_warp">
					<div class="top_left">
						<h3>NOTICE</h3>
						
						<div class="notice_div">
							<img src="images/event_img1_1.png" alt="img">
							<div class="content_top_black_div" style="display: none;">
								<h1>6월 행사 이벤트!</h1>
								<h3>플라워 기프트류<br>최대 <span style="color: #fe0000;">40%</span>할인!</h3>
							</div>
						</div>
					</div>
					<div class="top_right">
						<h3>EVENTS</h3>
						<div class="events_div">
							<img src="images/event_img1_search.png" alt="img">
							<div class="content_top_black_div" style="display: none;">
								<h1>파티용품 세트</h1>
								<h1 class="sales"><span style="color: #fae51d;" >20%</span> 할인</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="content_bottom">
				<div class="bottom_wrap">
					<div class="bottom_top">
						<div class="left_btn" style="left: 170px;">
							<i class="fas fa-angle-left"></i>
						</div>
						<h1>BEST ITEMS</h1>
						<div class="right_btn">
							<i class="fas fa-angle-right"></i>
						</div>
					</div>
					<div class="bottom_bottom">
						 <ul>
	
						 	<?php
						 		$sql5="select * from shop_product where product_open=1 order by product_sel_num+product_view_num desc limit 0,5";
						 		$result5=mysqli_query($con, $sql5);

						 		while($row5=mysqli_fetch_array($result5)){
						 			$thumbs=explode(",", $row5['product_thumb']);
						 			$thumb_img="./category_img/".$row5['category']."/".$thumbs[0];

						 	?>

						 	<li data-num="<?php echo $row5['product_num']?>">
						 		<div class="hover_img"></div>
						 		<img src="<?php echo $thumb_img; ?>" alt="img">
						 		<div class="hover_div_index">
									<div class="hover_title_index">
										<h3><?php echo $row5['product_name']?></h3>
									</div>
									<div class="hover_info_index">
										<p>판매가 : <?php echo $row5['product_price']?></p>
										<?php
											if($row5['product_drice']){
										?>
										<p>할인판매가 : <?php echo $row5['product_drice']?> <span style="color: red;"> [<?php echo $row5['sale_percent']?>] </span></p>
										<?php
									}else{}
										?>
										<!-- <p>쿠폰적용가 : 31,450원 <span style="color: green;">[25%]</span></p> -->
									</div>
									<div class="hover_ather_index">
										<div class="ather_div_index">
											<div class="circle ather_circle_index">
												<i class="fas fa-eye"></i>
											</div>
											<p><?php echo $row5['product_view_num']?></p>
										</div>

										<div class="ather_div_index">
											<div class="circle ather_circle_index">
												<i class="fas fa-heart" style="margin-left: 1px;"></i>
											</div>
											<p><?php echo $row5['product_sel_num']?></p>
										</div>

										<div class="ather_div_index">
											<div class="circle ather_circle_index">
												<i class="fas fa-comments"></i>
											</div>
											<p><?php echo $row5['product_review_num']?></p>
										</div>
									</div>
								</div>
						 	</li>
						 	<?php
						 	}

						 	?>
						 </ul>
					</div>
				</div>
			</div>
		</section>
		<section class="hash_section">
		<!-- 	<div class="search_bar">
				<div class="search_logo">
					<img src="images/search_logo.png" alt="img">
				</div>
				<div class="search_input">
					<input type="text" name="text" placeholder="검색어를 입력하세요.">
				</div>
				<div class="search_btn">
					<button class="search_button">검색</button>
				</div> -->
			<!-- </div> -->
			<div class="hash_wrap">
				<div class="hash_left">
					<span># 향수</span>
					<span># 시계</span>
					<span># 반지</span>
					<span># 목걸이</span>
					<span># 귀걸이</span>
					<span># 믹스</span>
				</div>
				<div class="hash_title">
					<h2>태그로 검색해보세요 <br>SEARCH WITH TAG</h2>
				</div>
				<div class="hash_right">
					<span># 넥타이</span>
					<span># 린넨</span>
					<span># 뱃지</span>
					<span># 플라워</span>
					<span># 여름</span>
					<span># 스니커즈</span>
				</div>
			</div>
		</section>
		<section class="chucheon_section">
			<div class="chucheon_warp">
				<div class="chucheon_hash">
					<div class="chucheon_title">
						<?php
							$date=date("m");
							// $date1=date_create($date);
						?>
						<h3><?php echo $date?>월 추천</h3>
					
					</div>
					<div class="chucheon_bottom">
						<span>#디퓨저</span><br>
						<span>#린넨셔츠</span><br>
						<span>#스니커즈</span><br>
					</div>
				</div>
				<div class="pick">
					<div class="pick_title">
						<h3>MD's Pick</h3>
					</div>
					<?php 
						$sql10="select * from shop_product where product_event='mdpick' order by product_num desc limit 0,1";
						$result10=mysqli_query($con, $sql10);
						$row10=mysqli_fetch_array($result10);
						$thumbss2=explode(",", $row10['product_thumb']);
						 			$thumbs_img2="./category_img/".$row10['category']."/".$thumbss2[0];
						 	$detail2=explode(",",$row10['product_detail_img']);
						 			$detail_img2="./category_img/".$row10['category']."/details/".$thumbss2[0];
					?>
					
					<div class="pink_img" data-num="<?php echo $row10['product_num']?>">						
						<div class="new_img_hover" style="display: none;"> 
							<div class="pink_info">
							<img src="images/pink_info_img.png" alt="img">
							<p><?php echo $row10['product_name'];?></p>
						</div>
						</div>
						<img src="<?php echo $thumbs_img2; ?>" alt="img">
					</div>

				</div>
				<div class="new_div">
					<div class="new_title">
						<h3>신상품</h3>
					</div>
					<?php
							$sql6="select * from shop_product where product_open=1 order by product_num desc limit 0,1";
							$result6=mysqli_query($con, $sql6);
							$row6=mysqli_fetch_array($result6);

							$sql7="select * from member where id='".$row6['product_seller_id']."'";
							$result7=mysqli_query($con, $sql7);
							$row7=mysqli_fetch_array($result7);
							$thumbss=explode(",", $row6['product_thumb']);
						 			$thumbs_img="./category_img/".$row6['category']."/".$thumbss[0];
						 	$detail=explode(",",$row6['product_detail_img']);
						 			$detail_img="./category_img/".$row6['category']."/details/".$thumbss[0];
					
					?>
					<div class="new_img" data-num="<?php echo $row6['product_num']?>">
						<div class="new_img_hover" style="display: none;">
							<div class="new_info">
								<img src="<?php echo $row7['profile_img']?>" alt="img">
								<p><?php echo $row6['product_name']?></p>
							</div>
						</div>
						<img src="<?php echo $thumbs_img?>" alt="img">
					</div>
				
				</div>
				<div class="tip_div">
					<div class="tip_title">
						<h3>BEST 인기글</h3>
					
					</div>
					<div class="tip_div_1">
						<ul class="honey_list">
							<?php

						$sql="select * from board order by like_num+view_num desc limit 0,5";
						$result=mysqli_query($con, $sql);
						$i=0;
						while($row=mysqli_fetch_array($result)){
						?>

							<li>
								<span class="numbers">
									<?php echo $i+1; echo "위"; ?>
								</span>
								<span class="best_boa_title" data-num="<?php echo $row['board_num']?>"><?php echo $row['boardtitle'];?></span>
								<span class="best_boa_date"><?php $date = date_create($row['first_written']);
											echo date_format($date,"m. d");?></span>
							</li>
							<?php
							$i++;
								}
							?>
					</ul>
					<img src="images/tip_img.png" alt="img">
					</div>
					
				</div>
			</div>
		</section>
		<section class="best_section">
			<div class="best_top">
				<div class="best_top_wrap">
					<div class="best_top_left">
						<?php
							$date2=date("m");
							// $date1=date_create($date);
						?>
						<h3><?php echo $date2;?>월 BEST 큐레이터 <br>BEST CURATOR OF JUNE</h3>
						<?php
							$sql3="select * from curator order by service_pointavg+service_success+service_count desc limit 1";
							$result3=mysqli_query($con, $sql3);
							$row3=mysqli_fetch_array($result3);

							$sql4="select * from member where id='".$row3['user_id']."'";
							$result4=mysqli_query($con, $sql4);
							$row4=mysqli_fetch_array($result4);

						?>
						<div class="circle best_circle">
							<div class="circle best_in_circle">
									<img src="<?php echo $row4['profile_img']?>" alt="img"  data-num="<?php echo $row3['curator_num']?>">
							</div>
							
						</div>
					</div>
					<div class="best_top_right">
						<p>&nbsp;&nbsp;Curator. <?php echo $row4['nickname'];?> 활동이력 보기</p>
						<div class="stars">

						<?php 

									$j=0;
									for($j=0;$j<$row3['service_pointavg'];$j++){ 
									?>
								<img src="images/star.png" alt="img">
						<?php
						}
						?>
						</div>
					</div>
				</div>
			</div>
			<div class="best_bototm">
				<div class="best_bottom_wrap">
					<div class="bb_top">
						<?php
							$sql1="select * from curator order by service_pointavg+service_success+service_count desc limit 1,4";
							$result1=mysqli_query($con, $sql1);
							while($row1=mysqli_fetch_array($result1)){
								$sql2="select * from member where id='".$row1['user_id']."'";
								$result2=mysqli_query($con, $sql2);
								$row2=mysqli_fetch_array($result2);
							?>
						<div class="bb_list">
							<div class="circle list_circle">
								<div class="list_in_circle main_cupro">
									<img src="<?php echo $row2['profile_img']; ?>" alt="img" data-num="<?php echo $row1['curator_num']?>">
								</div>
								
							</div>
							<div class="list_info">
								<div class="name_cautor_index">
									<div class="circle icon_circle">
										<i class="fas fa-crown"></i>
										</div>
									<p class="main_nick" data-num="<?php echo $row1['curator_num']?>"><?php echo $row2['nickname']?></p>
								</div>
								<div class="bb_starts">
									<?php 

									$j=0;
									for($j=0;$j<$row1['service_pointavg'];$j++){ 
									?>
								<img src="images/star.png" alt="img">
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
					<div class="bb_bottom">
						<?php 
							$sql8="select * from board where boardcate='큐레이션 후기 게시판' order by like_num+view_num+comment_num desc limit 0,1";
							$result8=mysqli_query($con, $sql8);
							$row8=mysqli_fetch_array($result8);
						?>
							<p class="bb_bottom_betitle">
							<i class="fas fa-crown"></i>
							<span>[ BEST CURATOR REVIEW ] </span>
							</p>
							<br><br>

							<h3 class="bb_bottom_boardtitle">" <?php echo $row8['boardtitle']?> "</h3>
							<p class="bb_bottom_body">
							<br><br>
							<?php
							$ck_body=$row8['bodytext'];
									echo trim(strip_tags($ck_body));
						  ?>
						  </p>
					</div>
				</div>
			</div>
		</section>
		<section class="banner_section">
			<div class="banner_gal">
				<div>
					<?php
							$str=$row8['bodytext'];
							preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
							$i=0;
							// var_dump($matches[1]);
							for($i=0;$i<count($matches[1]);$i++){
					?>
						<img src="<?php echo $matches[1][$i] ;?>" alt="img">
					<?php
				}
					?>
				</div>
			</div>
			
		</section>
		
		<?php
			include 'footer.php';
		?>
		<!-- <footer>
			<div class="footer_left">
				<ul class="footer_menu">
					<li><a href="#">회사소개</a></li>
					<li><a href="#">이용약관</a></li>
					<li><a href="#">개인정보 취급방침</a></li>
					<li><a href="#">사이트 이용 문의</a></li>
					<li><a href="#">전자상거래 약관</a></li>
				</ul>

				<div class="footer_info">
					<p> 상호명 : 비커밍 | 대표자 : 고소영<br>
 사업자등록번호 : 792-19-000000 | 이메일 : admin27@gmail.com<br>
 주소 : 제주시 대원길58 아라1동 | 연락처 : 064-702-3237</p>
				</div>
				<div class="copyright">
					<p>Copyright©All Rights Reserved by BEE:COMING. </p>
				</div>
			</div>
			<div class="footer_right">
				<img src="images/logo.png" alt="img">
			</div>
		</footer> -->
	</div>
</body>
</html>