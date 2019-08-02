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
	<link rel="stylesheet" type="text/css" href="css/search_page.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	<script type="text/javascript">
		//20190422-수정
		$(document).ready(function(){
			$(".curator_circle").hide();
			$(".close_circle").hide();
			$(".open_circle").hide();
			$(".qu_circle_2").hide();
			$(".write_btn").click(function(){
		
					location.href="./board_writing.php";
			});





		});
	</script>
	<title>비커밍</title>
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
	<div class="wrap">
		<section class="cuator_main_section">
			<img src="images/searcg_img.png" alt="img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>Search Page</span>
			</div>
			<?php
				$search_key=$_GET['search_key'];
				$search_flag = 0;
			?>
			<div class="communitypage_info">
				<p>'<?php echo $search_key; ?>' 에 대한 검색결과</p>
			</div>
		</section>
		<section class="serach_section">
			<div class="search_wrap">
				<?php
					$sql2 = "SELECT * FROM shop_product where sub_category like '%".$search_key."%' or product_name like '%".$search_key."%' or product_brand like '".$search_key."' limit 0,4";
					$result2 = mysqli_query($con,$sql2);
					$result5 = mysqli_query($con,$sql2);
					$row5 = mysqli_fetch_array($result5);
					if($row5){	
					$search_flag  = 1;		
				?>
				<div class="search_shop">
					<div class="shop_title">
						<h1>관련상품</h1><span class="shop_more_btn_search" data-keyward="<?=$search_key?>">상품만 더보기</span>
					</div>
					<div class="shop_body">
						<div class="shop_main">

							<?php
								
								while($row2 = mysqli_fetch_array($result2)){
									$imgarr = explode(",", $row2['product_thumb']);
							?>
							<div class="shop_main_item">
								<div class="shop_item_img">
									<img src="./category_img/<?=$row2['category']?>/<?=$imgarr[0]?>" alt="img" data-num="<?php echo $row2['product_num']?>">
								</div>
								<div class="shop_item_info">
									<p data-num="<?php echo $row2['product_num']?>"><?=$row2['product_brand']?></p>
									<p data-num="<?php echo $row2['product_num']?>"><?=$row2['product_name']?></p>
									<p data-num="<?php echo $row2['product_num']?>"><?=$row2['product_price']?></p>
								</div>
							</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
				<?php
					}else{
				?>
				<div>
				</div>
				<?php
					}
				?>
				<?php
					$sql3 = "SELECT * FROM curator where expert_hash like '%".$search_key."%' or user_id like '%".$search_key."%' limit 0,5";
					$result3 = mysqli_query($con,$sql3);
					$result6 = mysqli_query($con,$sql3);
					$row6 = mysqli_fetch_array($result6);
					if($row6){
						$search_flag  = 2;
				?>
				<div class="search_cuartor" style="position: relative;">
					<div class="curator_top">
						<h1>큐레이터 추천</h1><span class="cutator_more_btn_search" data-keyward="<?=$search_key?>">큐레이터만 더보기</span>
					</div>
					<div class="curator_body">
						<?php
							
							while($row3 = mysqli_fetch_array($result3)){
								$sql4 = "SELECT profile_img from member where id = '".$row3['user_id']."'";
								$result4 = mysqli_query($con,$sql4);
								$row4 = mysqli_fetch_array($result4);
						?>
						<div class="curator_card">
							<div class="curator_back">
								<img src="<?=$row3['cupage_img']?>" alt="img">
								<h3><?=$row3['page_title']?></h3>
							</div>
							<div class="curator_info">
								<div class="circle search_circle_cuator">
									<img src="<?=$row4['profile_img']?>" alt="img">
								</div>
								<p>서비스 <?=$row3['service_count']?>회</p>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				<?php
					}else{
				?>
				<div>
				</div>
				<?php
					}
				?>
			<!-- 	<div class="search_event">
					<div class="event_top">
						<h1>관련이벤트</h1>
					</div>
					<div class="event_body">
						<div class="event_div">
							<img src="images/event_img1_search.png" alt="img">
							<div class="event_black">
							</div>
							<h1>파티 용품 세트 <br><span  style="color: #fce700;">20%</span>할인</h1>
						</div>

						<div class="event_div" style="margin-left: 15px;">
							<img src="images/event_img1_search.png" alt="img">
							<div class="event_black">
							</div>
							<h1>파티 용품 세트 <br><span  style="color: #fce700;">20%</span>할인</h1>
						</div>
					</div>
				</div> -->
				<?php
					$sql="select * from board where boardtitle like '%".$search_key."%' or bodytext like'%".$search_key."%'order by board_num desc";
					$result=mysqli_query($con, $sql);
					$result7 = mysqli_query($con,$sql);
					$row7 = mysqli_fetch_array($result7);
					if($row7){	
						$search_flag  = 3;
				?>	
				<div class="search_board">
					<div class="board_top">
						<h1>관련 게시물</h1><span data-keyward="<?=$search_key?>"  class="board_more_btn_search">게시물만 더보기</span>
					</div>
					<div class="board_main">
 								<div class="board_list_items">
 	<?php
							
								while($row=mysqli_fetch_array($result)){
							?>
							<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
									<?php
										$str=$row['bodytext'];
										preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
										if($matches[1]==""){
										?>
										<img src="<?php echo $row['thumbnail'];?>" alt="img">
										<?php	
										}else{
											?>
											<img src="<?php echo $matches[1];?>" alt="img">
											<?php
										}
										?>								
									</div>
								</div>
								<div class="item_info">
									<div class="item_info_top">
										<div class="info_top_left">
											<h1 data-num='<?php echo $row['board_num']; ?>'><?php echo $row['boardtitle'];?></h1>
										</div>
										<div class="info_top_right">
											<p><?php $date = date_create($row['first_written']);
						echo date_format($date,"Y. m. d");?></p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p><?php
										$ck_body=$row['bodytext'];
										echo trim(strip_tags($ck_body));
										?></p>
									</div>
									<div class="view_hash different">			
								<?php
								$board_hashtags=array();
								$ex_hash=explode(",", $row['boardhash']);
								$i=0;
								for($i=0;$i<count($ex_hash); $i++){ 
									echo '<span>#'.$ex_hash[$i],'</span> ';
								}
								?>	
						</div>

								</div>
								<div class="item_icon_board">
									<div class="circle icon_board_circle">
										<div class="circle icon_in_board_circle">
											<?php
											$sql1="select * from member where id='".$row['user_id']."'";
											$result1=mysqli_query($con, $sql1);
											$row1=mysqli_fetch_array($result1);
											?>
											<img src="<?php echo $row1['profile_img'];?>" alt="img">
										</div>
									</div>
									<p><?php echo $row1['nickname'];?></p>

									<?php
									if($row1['curator']=="1"){
									?>
									<div class="bal">
										<div class="balloon cr_flag">
											<p>CR</p>
										</div>
									</div>
									<?php
								}else{}
									?>
								
								</div>
								<div class="item_icon_like">
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-eye"></i>
										</div>
										<p class="icon_info_div_count">조회수 <?php echo $row['view_num'];?></p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 <?php echo $row['comment_num'];?></p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 <?php echo $row['like_num'];?></p>
									</div>
								</div>
							</div>
							<?php
						}
						?>
				
					</div>
				</div>
			</div>
			<?php
				}else{
			?>
			<div>
				<?php
					if($search_flag == 0){
				?>
					<h1 style="text-align: center; line-height: 100px; color:#ee1e72;font-family: '더페이스샵 잉크립퀴드체'; font-size: 30pt; margin-top: 100px;">검색 결과가 없습니다.</h1>
				<?php
					}
				?>
			</div>
			<?php
				}
			?>
			</div>
		</section>
		<?php
			include 'circles.php';
		?>
		
		<?php
			include 'footer.php';
		?>
	</div>
</body>
</html>