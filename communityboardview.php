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
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
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
			<img src="images/board_back.png" alt="img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>Community Page</span>
			</div>
			<div class="communitypage_info">
				<p>비커밍 커뮤니티 게시판입니다.</p>
			</div>
		</section>
		<section class="board_section" >
			<div class="tab_div">
				<nav class="tab_nav">
					<ul class="tab_ul">
						<li class="all">
							<a href="communitypage.php?boardcate=전체게시판" style="color: #ee1e73;">전체게시판</a>
							<div class="bottom_line">
							</div>
						</li>
						<li class="free">
							<a href="communitypage.php?boardcate=자유게시판">자유게시판</a>
						</li>
						<li class="pr">
							<a href="communitypage.php?boardcate=선물 후기 게시판">선물 후기 게시판</a>
						</li>
						<li class="cu">
							<a href="communitypage.php?boardcate=큐레이션 후기 게시판">큐레이션 후기 게시판</a>
						</li>
					</ul>
				</nav>
			</div>
					<?php
						$board_num=$_GET['boardnum'];
						$sql="select * from board where board_num=".$board_num;
						$result=mysqli_query($con, $sql);
						$row=mysqli_fetch_array($result);
						$sql3="update board set view_num=view_num+1 where board_num=".$board_num;
						$result=mysqli_query($con, $sql3);
					?>
			<div class="view_wrap">
				<div class="view_wrap_title">
					<div class="view_profile">
						<div class="porfile_div">
							<img src="images/writer.png" alt="img">
						</div>
					</div>
					<p id="board_num_hide" style="display:none;"><?php echo $row['board_num'];?></p>
					<p id="login_person" style="display:none;"><?php echo $_SESSION['user_id'];?></p>
					<div class="view_title">
						<span style="color: #ff2a6b; font-size: 20px;">[ <?php echo $row['boardcate'];?> ]</span>

					
						<span style="color: #3f3b3b; font-size: 23px;" class="title"><?php echo $row['boardtitle']; ?></span>
					</div>
					<div class="view_info">
						<div class="view_info_div">
							<div class="circle view_icon_circle">
								<i class="fas fa-eye"></i>
							</div>
							<p class="count"><?php echo $row['view_num'];?></p>
						</div>
						<div class="view_info_div">
							<div class="circle view_icon_circle" >
								<i class="fas fa-comment"></i>
							</div>
							<p class="count"><?php echo $row['comment_num'];?></p>
						</div>
						<div class="view_info_div">
							<div class="circle view_icon_circle">
								<i class="fas fa-heart"></i>
							</div>
							<p class="count"><?php echo $row['like_num'];?></p>
						</div>
					</div>
					<div class="view_writer_or_date">
						<span>작성자 : </span><span><?php echo $row['user_id']; ?></span><br>
						<span>작성일 : </span><span><?php 
						$date = date_create($row['first_written']);
						echo date_format($date,"Y-m-d"); ?></span>
					</div>
				</div>
				<div class="view_body">
					<div class="view_bodytext">
						<?php
						echo $row['bodytext'];
						?>
					</div>
					<?php
					if($_SESSION['user_id']==$row['user_id']){
					?>
						<div class="view_modif">
						<button class="view_modif_btn" data-num="<?php echo $row['board_num'];?>">수정하기</button>
					</div>
					<div class="view_del">
						<button class="view_del_btn" data-num="<?php echo $row['board_num'];?>">삭제하기</button>
					</div>
					<?php
					}
					?>
					

					<div class="view_body_info">
						<div class="view_hash">
								
								<?php
								$board_hashtags=array();
								$ex_hash=explode(",", $row['boardhash']);
								$i=0;
								for($i=0;$i<count($ex_hash); $i++){ 
									echo '<span>#'.$ex_hash[$i],'</span> ';
								}
								?>
													
						</div>
						<div class="view_icons">
							<!-- <div class="view_icon">
								<div class="circle view_body_circle click_btn">
									<i class="fas fa-eye"></i>
								</div>
								<p>조회수</p>
							</div>
 -->
							<div class="view_icon">
								<div class="circle view_body_circle commentboard_btn">
									<i class="fas fa-comment"></i>
								</div>
								<p>댓글</p>
							</div>

							<?php

							$sql12="select * from alert_poll where alarm_cate='board' and cate_key=".$board_num." and click_id='".$_SESSION['user_id']."'";
							$result12=mysqli_query($con, $sql12);
							$row12=mysqli_fetch_array($result12);
								$alarm_flag=0;
								if($row12){
									$alarm_flag=1;
								}else{
									$alarm_flag=0;
								}
							?>


							<div class="view_icon">
								<div class="circle view_body_circle alarm_btn" data-num="<?php echo $row['board_num']; ?>" data-flag="<?php echo $alarm_flag;?>"	data-id="<?php echo $_SESSION['user_id']; ?>">
									<i class="fas fa-phone"></i>
								</div>
								<p>신고하기</p>
							</div>
							<?php
								$sql10="select * from like_poll where like_cate='board' and cate_key=".$board_num." and click_id='".$_SESSION['user_id']."'";
								$result10=mysqli_query($con, $sql10);
								$row10=mysqli_fetch_array($result10);
								$like_flag=0;
								if($row10){
									$like_flag=1;
								}else{
									$like_flag=0;
								}
							?>
							<div class="view_icon">
								<div class="circle view_body_circle like_btn" data-num="<?php echo $row['board_num']; ?>" data-flag="<?php echo $like_flag;?>"	data-id="<?php echo $_SESSION['user_id']; ?>">
									<i class="fas fa-heart"></i>
								</div>
								<p>좋아요</p>
							</div>
						
						</div>
					</div>
				</div>
				<div class="view_next_prev">
							<?php

								$sql6="select * from board where board_num=".($board_num-1);
								$result6=mysqli_query($con, $sql6);
								$row6=mysqli_fetch_array($result6);
							?>
					<div class="prev_page">
						<button class="prev_btn_page" data-num="<?php echo $row6["board_num"]?>">이전글</button>
						<?php
								if($row6!=null){
							?>
						<div class="prev_title">
							<p data-num="<?php echo $row6["board_num"]?>"><?php echo $row6['boardtitle']; ?></p>
						</div>
						<div class="nickname">
								<?php
									$sql8="select * from member where id='".$row6['user_id']."'";
									$result8=mysqli_query($con, $sql8);
									$row8=mysqli_fetch_array($result8);
								?>
							<p>by. <?php echo $row8['nickname'];?></p>
						</div>
						<div class="prev_date">
							<p><?php 
								$date1 = date_create($row6['first_written']);
								echo date_format($date1,"Y. m. d");
							?></p>
						</div>
							<?php
								}else{
							?>
							<div class="prev_title">							
								<p>이전글이 없습니다.</p>
							</div>
							<?php
								}
							?>
					</div>
					<div class="next_page">
						<?php
								$sql7="select * from board where board_num=".($board_num+1);
								$result7=mysqli_query($con, $sql7);
								$row7=mysqli_fetch_array($result7);
							?>
							<button class="next_btn_page" data-num="<?php echo $row7["board_num"]?>">다음글</button>
							<?php
								if($row7!=null){
							?>
							<div class="next_title">							
								<p data-num="<?php echo $row7["board_num"]?>"><?php echo $row7['boardtitle']; ?></p>
							</div>
							<div class="nickname">
									<?php
									$sql9="select * from member where id='".$row7['user_id']."'";
									$result9=mysqli_query($con, $sql9);
									$row9=mysqli_fetch_array($result9);
								?>

								<p>by. <?php echo $row9['nickname']; ?></p>
							</div>
							<div class="next_date">
								<p><?php 
										$date2 = date_create($row7['first_written']);
										echo date_format($date2,"Y. m. d");
							?></p>
							</div>
							<?php
								}else{
							?>
							<div class="next_title">							
								<p>다음글이 없습니다.</p>
							</div>
							<?php
								}
							?>
						
					</div>
				</div>
				<div class="view_comment">
					<div class="view_comment_top">
						<div class="comment_top_title">
							<i class="fas fa-comment"></i>
							<span>댓글쓰기</span>
						</div>
						<div class="comment_top_body">
							<textarea placeholder="최대 255자 까지 입력가능합니다."></textarea>
						</div>
						<div class="comment_btn">
							<button class="comment_insert">댓글등록</button>
						</div>
					</div>
					<div class="view_comment_bottom">
						<div class="comment_list">

							<?php

								$sql1="select * from comment where board_num=".$board_num." and comment_open=1";
								$result1=mysqli_query($con, $sql1);


								while($row1=mysqli_fetch_array($result1)){
									$sql2 = "SELECT * FROM member where id = '".$row1['id']."'";
									$result2=mysqli_query($con, $sql2);
									$row2=mysqli_fetch_array($result2);
							?>
							<div class="comment_item">
								<div class="comment_title">
									<div class="circle comment_title_circle">
										<div class="circle in_circle main_cupro">
											<img src="<?= $row2['profile_img']?>"  data-num="<?php echo $row1['curator_num']?>" alt="img">
									
										</div>
									</div>
								</div>
								<div class="comment_bodytext">
									<span class="comment_nickname"><?php echo $row2['nickname'];?></span>
									<span class="comment_bodytext_aa"><?php echo $row1['comment_bodytext'];?>
									</span>
								</div>
								<div class="comment_button">
									<?php
									if($_SESSION['user_id']==$row1['id']){
									?>
									<span class="com_btn comment_del_btn" data-num="<?php echo $row1['comment_num'];?>"><i class="fas fa-minus-circle"></i> 삭제하기</span><br>
									<?php
									}
									?>		

									<?php
										$sql11="select * from like_poll where like_cate='comment' and cate_key=".$row1['comment_num']." and click_id='".$_SESSION['user_id']."'";
										$result11=mysqli_query($con, $sql11);
										$row11=mysqli_fetch_array($result11);
										$comment_like_flag=0;
										if($row11){
											$comment_like_flag=1;
										}else{
											$comment_like_flag=0;
										}

										$sql13="select * from alert_poll where alarm_cate='comment' and cate_key=".$row1['comment_num']." and click_id='".$_SESSION['user_id']."'";

										$result13=mysqli_query($con, $sql13);
										$row13=mysqli_fetch_array($result13);

										$comment_alarm_flag=0;
										if($row13){
											$comment_alarm_flag=1;
										}else{
											$comment_alarm_flag=0;
										}
									?>							
									<span class="com_btn comment_alarm_btn" data-num="<?php echo $row1['comment_num']; ?>" data-id="<?php echo $_SESSION['user_id'];?>" data-flag="<?php echo $comment_alarm_flag;?>"><i class="fas fa-exclamation-circle"></i> 신고하기</span><br>


									<span class="com_btn comment_like_btn" data-num="<?php echo $row1['comment_num']; ?>" data-id="<?php echo $_SESSION['user_id'];?>" data-flag="<?php echo $comment_like_flag;?>"><i class="fas fa-hand-holding-heart"></i> 공감하기</span>

								</div>
								<div class="comment_date">
									<p><?php 
									$date1 = date_create($row1['comment_time']);
										echo date_format($date1,"Y-m-d"); ?>
											
										</p>
								</div>
							</div>
							<?php
							}
							?>
						</div>
						<div class="comment_page">
							<!-- 페이징 영역 -->
						</div>
					</div>
				</div>
				<div class="comment_last_btn">
					<button class="list_go">목록보기</button>
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