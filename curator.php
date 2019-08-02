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
	<link rel="stylesheet" type="text/css" href="css/cuator.css">
	<link rel="stylesheet" type="text/css" href="css/reply_modal.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
		<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
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
	<!--쪽지 모달 -->
	<?php
		include 'reply_modal.php';
	?>
	<div class="wrap">
		<section class="cuator_main_section">
			<img src="images/cuator_background.png" alt="img">
			<div class="cuator_main_wrap">
				<div class="cuator_main_wrap_top">
					<span>Home</span><span> > </span><span>Curator Page</span>
				</div>
				<div class="cuator_main_wrap_bottom">
					<img src="images/cuator_banner.png" alt="img">
					<div class="bottom_info">
						<p style="margin-top: 40px; font-family: '더페이스샵 잉크립퀴드체'; font-size: 2.1em; ">평생 기억할 추억들을 만들어나가는 당신의 뒤에,</p>
						<p style=" margin-top: 10px; margin-left:30px;font-size: 2.2em; font-family: '더페이스샵 잉크립퀴드체';">큐레이터들이 함께합니다.</p>
					</div>
					
				</div>
			</div>
		</section>
		<section class="cuator_mid_secion">
			<div class="cuator_mid_secion_wrap">
				<div class="cuator_mid_top">
					<div class="top_left">
						<p style="font-size: 1.4em; font-family:'ThecircleB';color: #ee1e72; ">4월 BEST 큐레이터</p>
						<h2 style=" color: #ee1e72; font-family:'ThecircleB';">BEST CURATORS OF APRIL</h2>
						<p  class="curatorbest_desc" style="font-size: 0.9em; margin-top: 7px; color:dimgray;">활동횟수와 평점이 높은 베스트 큐레이터 리스트입니다.</p>
					</div>
					<div class="top_right">
						<?php
							$sql5="select * from curator order by service_pointavg desc limit 1";
						$result5=mysqli_query($con, $sql5);
						$row5=mysqli_fetch_array($result5);
							$sql6="select * from member where id='".$row5['user_id']."'";
							$result6=mysqli_query($con, $sql6);
							$row6=mysqli_fetch_array($result6);
						?>
						<div class="top_right_left">
							<div class="circle crown_circle"><i class="fas fa-crown"></i></div>
							<div class="circle img_circle">
								<div class="circle img_in_circle">
									<img src="<?php echo $row6['profile_img'];?>" data-num="<?php echo $row5['curator_num']?>"alt="img">
								</div>
								
							</div>
						</div>
						<div class="top_right_right">
							<p data-num="<?php echo $row5['curator_num']?>"> Curator. <?php echo $row6['nickname']; ?> 활동이력 보기</p>
							<div class="stars">
									<?php 

									$j=0;
									for($j=0;$j<$row5['service_pointavg'];$j++){ 
									?>
								<img src="images/star.png" alt="img">
								<?php
								}
								?>
							
						
							</div>
							
						</div>
					</div>
				</div>
				<div class="cuator_mid_bottom">
					<?php
						$sql2="select * from curator order by service_pointavg desc limit 1,4";
						$result2=mysqli_query($con, $sql2);
						while($row2=mysqli_fetch_array($result2)){
							$sql3="select * from member where id='".$row2['user_id']."'";
							$result3=mysqli_query($con, $sql3);
							$row3=mysqli_fetch_array($result3);
					?>
					<div class="card_layout">
						<div class="card_top">
							<img src="<?php echo $row2['cupage_img']?>" alt="img" style="height:100%;" data-num="<?php echo $row2['curator_num']?>">
							<h2><?php echo $row2['page_title'];?></h2>
							<div class="card_gray"></div>
							
						</div>
						<div class="card_bottom">
								
							<div class="circle card_circle">
								<img src="<?php echo $row3['profile_img'];?>" alt="img" data-num="<?php echo $row2['curator_num'];?>">
							</div>
							
							<p class="service_point">서비스 <?php echo $row2['service_count'];?>회 | 평점 <?php echo $row2['service_pointavg']?></p>
							<p class="cb_nick" style="margin-top: -20px; font-weight: bold; color:black;"><?php echo $row3['nickname'];?></p>
						</div>
					</div>
					<?php
					}
					?>		
				</div>
			</div>
		</section>
		<section class="board_section">
			<div class="board_section_wrap">
				<div class="board_section_top">
				<h2>BEST CURATORS</h2>
				<p>비커밍에서는 현재 3명의 큐레이터가 활동중입니다.</p>
				</div>
				<div class="board_section_bottom">
					<div class="board_bottm_list_wrap">
							<?php
								
								$sql="select * from member where curator=1";
								$result=mysqli_query($con, $sql);
								while($row=mysqli_fetch_array($result)){
								// echo($row['user_id']);
								$sql1="select * from curator where user_id='".$row['id']."'";
								$result1=mysqli_query($con, $sql1);
								$row1=mysqli_fetch_array($result1);
								// var_dump($row1);
							?>

						<div class="board_bottom_list">
							<div class="list_left">
								<div class="circle pro_circle cu_bottom_pro">
									<img src="<?php echo $row['profile_img'];?>" alt="img" data-num="<?php echo $row1['curator_num']?>">
								</div>
							</div>
							<div class="list_mid">
								<p class="nickname" data-id="<?php echo $row['id']; ?>" data-num="<?php echo $row1['curator_num']?>"><?php echo $row['nickname']." ( ".$row['id']." ) ";?></p>
								<p class="list_mid_info" data-id="<?php echo $row['id']; ?>" data-num="<?php echo $row1['curator_num']?>"><?php echo $row1['page_title'];?></p>
							</div>
							<div class="list_right">
								<div class="list_right_top">
									<p style="margin-left: 10px;">서비스</p><p class="count" style="margin-left: 5px; color:#ee1e72"> <?php echo $row1['service_count'];?>회</p><p style="margin-left: 5px;">|</p><p style="margin-left: 5px;">평점 </p><p style="color:#ee1e72">&nbsp;<?php echo$row1['service_pointavg'];?>점</p>
								</div>
								<div class="list_right_bottom">
									<?php
									$sql4="select * from cu_service where service_cu='".$row['id']."' limit 0,3";
									$result4=mysqli_query($con, $sql4);
									while($row4=mysqli_fetch_array($result4)){
								?>
									<!-- <div class="right_list">
										<img src="images/" alt="img">
									</div>
									<div class="right_list">
										<img src="images/" alt="img">
									</div> -->
									<div class="right_list curator_ser_thumb">
										<img src="<?php echo $row4['service_img'];?>" alt="img">
									</div>

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
					<div class="page_div">
							<div class="page_wrap">
								<span class="block"><i class="fas fa-angle-left"></i></span>
								<span >1</span>
								<span >2</span>
								<span >3</span>
								<span class="block"><i class="fas fa-angle-right"></i></span>
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