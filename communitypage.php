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
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/communitypage.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="libs/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title>비커밍</title>
	<script type="text/javascript">
		$(document).ready(function(){
			// alert("a");
			$('.rank_list_slick').slick({
   infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows:true,
  autoplay:true,
  prevArrow:"<button type='button' class='slick-prev pull-left prev_btn_slick'><</button>",
            nextArrow:"<button type='button' class='slick-next pull-right next_btn_slick' >></button>"
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
	?>
	<div class="wrap">
			<?php
			$boardcate=$_GET['boardcate'];

				if(!isset($boardcate)){
					$boardcate="전체게시판";
				}

			?>
		<section class="cuator_main_section">
			<img src="images/board_back.png" alt="img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>Community Page</span>
			</div>
			<div class="communitypage_info">
				<p>비커밍 커뮤니티 게시판입니다.</p>
			</div>
		</section>
		<section class="board_section">
			<div class="tab_div">
				<nav class="tab_nav">
					<ul class="tab_ul">
						<li class="all">
							<a href="#" style="color: #ee1e73;">전체게시판</a>
							<div class="bottom_line">
							</div>
						</li>
						<li class="free">
							<a href="#">자유게시판</a>
						</li>
						<li class="pr">
							<a href="#">선물 후기 게시판</a>
						</li>
						<li class="cu">
							<a href="#">큐레이션 후기 게시판</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="board_div">
				<div class="board_wrap">
					<div class="board_top_title">
						<span><?php
								echo $boardcate;
						?></span><br><span class="title_des_change">비커밍 커뮤니티의 <?php echo $boardcate; ?>글을 볼 수 있는 게시판입니다.</span>
					</div>
					<div class="board_top_rank">
						<div class="board_top_rank_title">
							<h1>BEST 인기글</h1>
							<p>최근 일주일 간 <?php echo $boardcate;?>에서 좋아요수와 조회수가 가장 높은 글입니다.</p>
						</div>
						<div class="borad_top_rank_list">
							<div class="rank_list_slick">
									<?php

										if($boardcate=="전체게시판"){
											$sql4="select * from board where board_open=1 order by like_num+view_num desc limit 0,10";
										}else{
											$sql4="select * from board where boardcate='".$boardcate."' and board_open=1 order by like_num+view_num desc limit 0,10";
										}
										
										$result4=mysqli_query($con, $sql4);
										$i=1;
										while($row4=mysqli_fetch_array($result4)){				
									?>
								<div class="rank_list_item">
									<div class="rank_wrap">
										<div class="rank_img_wrap">
											<?php
												$str=$row4['bodytext'];
												preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
												if($matches[1]==""){
												?>
												<img src="<?php echo $row4['thumbnail'];?>" alt="img">
												<?php	
												}else{
													?>
													<img src="<?php echo $matches[1];?>" alt="img">
													<?php
												}
												?>	
<!-- 
											<img src="images/top_img.png" alt="img"> -->									
										</div>
										<div class="rank_numbers">
											<p>BEST <?php echo $i;?></p>
										</div>
										<div class="rank_info">
											<p class="rank_info_title" data-num="<?php echo $row4['board_num'];?>"><?php echo $row4['boardtitle'];?></p>
												<?php
													$sql5="select * from member where id='".$row4['user_id']."'";
													$result5=mysqli_query($con, $sql5);
													$row5=mysqli_fetch_array($result5);
												?>
											<p>BY.<?php echo $row5['nickname'];?></p>
										</div>
									</div>
								</div>
									<?php
									$i++;}
									?>
							</div>
						</div>
					</div>
					<div class="borad_lists">
						<div class="board_lists_top">
							<h1>CONTENTS LIST</h1>
							<p><?php echo $boardcate;?>에는 총 5개의 글이 있습니다.</p>
						</div>
						<div class="board_lists_search">
							<div class="board_search_icon">
								<img src="images/search_logo.png" alt="img">
							</div>
							<select class="board_search_select">
								<option value="1">전체게시판</option>
								<option value="2">자유게시판</option>
								<option value="3">선물 후기 게시판</option>
								<option value="4">큐레이션 후기 게시판</option>
							</select>
							<select class="board_search_cate">
								<option value="1">제목</option>
								<option value="2">본문</option>
								<option value="3">제목+본문</option>
							</select>
							<input type="text" name="text" class="board_search_input">
							<div class="board_search_icon_icon">
								<i class="fas fa-search"></i>
							</div>
						</div>
						<div class="board_list_wrap_1">
							<div class="board_list_items">
							<?php
							if($boardcate=="전체게시판"){
								$sql="select * from board where board_open=1 order by board_num desc";
							}else{
								$sql="select * from board where boardcate='".$boardcate."' and board_open=1 order by board_num desc";
							}
								
								$result=mysqli_query($con, $sql);
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
							
						<!-- 	<span>#추억</span><br>
							<span>#존멋탱큐레이터</span>
							<span>#비커밍인정</span> -->
													
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
						
						
						<div class="board_wirte_btn_div">
							<button class="board_write_btn" data-id="<?php echo$_SESSION['user_id'];?>"> 글쓰기</button>
						</div>

						<div class="board_pagin">
							<!-- 페이징부분입니다 -->
						</div>
					</div>
				</div>
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