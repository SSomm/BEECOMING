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
	<link rel="stylesheet" type="text/css" href="css/cuartor_view.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/reply_modal.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title>비커밍</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".curator_circle").hide();
			$(".close_circle").hide();
			$(".open_circle").hide();
			$(".qu_circle_2").hide();
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
	<!--쪽지-->
	<?php
		include 'reply_modal.php';
	?>
	<?php
		$curator_num=$_GET['curator_num'];
		// $id=$_GET['id'];
		$sql2="select * from curator where curator_num=".$curator_num;
		$result2=mysqli_query($con, $sql2);
		$row2=mysqli_fetch_array($result2);

		$sql3="select * from member where id='".$row2['user_id']."'";
		$result3=mysqli_query($con, $sql3);
		$row3=mysqli_fetch_array($result3);
	?>
	<div class="page_update_modal" style="display: none;">
		<div class="page_update_wrap">
			<div class="last_wrap">
				<div class="last_wrap_left">
					<img src="images/cuator_modal_back.png" alt="img">
					<div class="page_white_div">
					</div>
					<div class="page_first_info">
						<h1>큐레이터 페이지는</h1>
						<p>큐레이터 여러분의<br> 활동 내용 소개와 홍보가<br> 이루어지는 공간입니다.</p>
					</div>
					<div class="page_second_info">
						<p>사진이나 글을<br>
  알맞게 편집하시어<br>
  활발한 활동 하시기 바랍니다. </p>
					</div>

					<div class="page_white_logo">
						<img src="images/logo.png" alt="img">
					</div>
				</div>
				<div class="last_wrap_right">
					<div class="page_right_top">
						<div class="page_top_left">
							<div class="circle page_circle">
								<div class="circle page_in_circle">
									<img src="<?php echo $row3['profile_img']; ?>" alt="img">
								</div>
							</div>
							<p>Curator. <?php echo $row3['name'];?>님</p>
						</div>
						<div class="page_top_rigth">
							<p><?php echo $row3['name'];?> 님의 큐레이터 페이지 설정</p>
							<div class="page_img_wrap">
								<div class="page_img">
									<img src="<?php echo $row2['cupage_img'];?>" alt="img">
									<div class="page_hover" style="display: none;">
										<p>아이콘을 클릭하여<br>
큐레이터 페이지<br>
상단 이미지를 설정하세요<br></p>
									</div>
								</div>
								<div class="page_fiels">
									<label for="ex_curator_page_imgfile">
										<div class="page_file_circle">
											<i class="fas fa-pen"></i>
										</div>
									</label>
									<input type="file" id="ex_curator_page_imgfile" accept=".gif, .jpg, .png, .jpeg" data-id="<?=$_SESSION['user_id'];?>">
								</div>
							</div>
						</div>
					</div>
					<div class="page_right_bottom">
						<table class="page_table">
							<tr>
								<td class="page_table_title">한줄 소개글</td>
								<td class="page_table_inputs"><input type="text" class="infso_text" value='<?php echo $row2['page_title'];?>'></td>
							</tr>
							<tr>
					
								<td class="page_table_title">전문 분야 태그</td>
								<td class="page_table_inputs"><input type="text" id="tags" class="infso_hash wr_hash" value='<?php $row2['expert_hash']?>'></td>
							
							</tr>
							<tr>
								<td class="page_table_title">서비스 횟수</td>
								<td class="page_table_inputs"><input type="text" class="servie_count small_input" style="width: 351px;" value="<?php echo $row2['service_count']; ?>" disabled="disabled">
									<input type="radio" class="goga radio1" id="goga1" checked="checked" value="1" name="cu_puborpri"><label for="goga1" >공개</label> 

									<input type="radio" class="goga radio2" id="goga2" name="cu_puborpri"><label for="goga2" value="0">비공개</label> 
								</td>
							</tr>
							<tr>
								<td class="page_table_title">서비스 성공률</td>
								<td class="page_table_inputs"><input type="text" class="servie_avg small_input" style="width: 351px;" value="<?php 

								$success1=($row2['service_success']/$row2['service_count'])*100; 
									if(is_nan($success1)){
											echo '0 %';
										}else{
											echo ($row2['service_success']/$row2['service_count'])*100;
											echo "%";
										}


								?>" disabled="disabled">
									<input type="radio" name="radio2" class="goga radio3" id="goga3" checked="checked" value="1"><label for="goga3">공개</label> 

									<input type="radio" name="radio2" class="goga radio4" id="goga4"><label for="goga4" value="0">비공개</label> 

								</td>
							</tr>
							<tr>
								<td class="page_table_title">서비스 평점</td>
								<td class="page_table_inputs"><input type="text" class="servie_sum small_input" style="width: 351px;" value="<?php echo $row2['service_pointavg'];?>" disabled="disabled">
									<input type="radio" name="radio3" class="goga radio5" id="goga5" checked="checked" value="1" ><label for="goga5">공개</label> 

									<input type="radio" name="radio3" class="goga radio6" id="goga6"><label for="goga6" value="0">비공개</label> 
								</td>
							</tr>
						</table>
						<div class="buttons_div">
							<div class="buttons setting_success">
								<div class="buttons_in">
									<p>설정완료</p>
								</div>
							</div>
							<div class="buttons setting_canel">
								<div class="buttons_in">
									<p>설정취소</p>
								</div>
							</div>
							<div class="buttons setting_rest">
								<div class="buttons_in">
									<p>재설정</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="circle page_close_circle">
				<i class="fas fa-times"></i>
			</div>
		</div>
	</div>

	<div class="wrap">
		<?php
			$sql="select * from curator where user_id='".$row2['user_id']."'";
			$result=mysqli_query($con, $sql);
			$row=mysqli_fetch_array($result);

		?>

		<section class="cuator_main_section">
			<?php
				$sql1="select * from member where id='".$row['user_id']."'";
				$result1=mysqli_query($con, $sql1);
				$row1=mysqli_fetch_array($result1);
			?>
			<img src="<?php echo $row['cupage_img'];?>" alt="img" class="main_img">
			<img src="images/gray_div.png" alt="img" class="gray_img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>Cuator Page > </span><span>Cuator "<?php echo $row1['name'];?>"의 페이지 </span>
			</div>
			<div class="infos_div">
				<p>" 큐레이터들의 활동내용을 볼 수 있습니다. "</p>
			</div>
		</section>
		<section class="cuator_section">
			<div class="cuator_wrap">
				<div class="left_section">
					<div class="left_top">
						<div class="left_title">
							<div class="circle title_circle">
								<div class="circle title_in_circle">
									<img src="<?php echo $row1['profile_img'];?>" alt="img">
								</div>
							</div>
							<div class="title_info">
								<p class="name_cuator_view"><?php echo $row1['name'];?></p>
								<p class="email"><?php echo $row1['email'];?></p><br>
								<span class="circle title_message_circle" data-id="<?php echo $row1['name']."(".$row1['id'].")"?>" data-img="<?php echo $row1['profile_img'];?>">
									<i class="fas fa-comment"></i>
								</span>
								<span>메시지로 서비스신청</span>
							</div>
						</div>
						<div class="left_count">
							<p>서비스 횟수</p>
							<h1><?php echo$row['service_count'];?>회</h1>
						</div>
						<div class="left_count">
							<p>서비스 성공률</p>
							<h1><?php 
							
							$success=($row['service_success']/$row['service_count'])*100;
								if(is_nan($success)){
									echo 0;
								}else{
									echo ($row['service_success']/$row['service_count'])*100;
								}


							?>%</h1>
						</div>
						<div class="left_count">
							<p>서비스 평점</p>
							<h1><?php echo$row['service_pointavg'];?>점</h1>
						</div>
						<div class="cuator_hash">
							<p>큐레이션 전문 분야</p>
								
								<?php
								$board_hashtags=array();
								$ex_hash=explode(",", $row['expert_hash']);
								$i=0;
								for($i=0;$i<count($ex_hash); $i++){ 
									echo '<span>#'.$ex_hash[$i],'</span> ';
								}
								?>										

							<!-- <span># 기념일</span><span># 기념일</span><br>
							<span># 의류</span><span># 20대남성</span><br>
							<span># 스타일</span> -->
						</div>
					</div>

					<!-- <div class="chart">
						차트 js 부분이라 요기는..생략 할깨요..
					</div> -->
					<?php
					if($row['user_id']==$_SESSION['user_id']){
					?>
					<button class="update_btn">페이지 수정</button>
					<?php
				}else{}

					?>
				
				</div>
				<div class="right_section">
					<div class="right_top">
						<h1><?php echo$row['page_title'] ?></h1>
						<p>by. <?php echo$row1['nickname']?></p>
					</div>
					<div class="right_body">
							<?php
								$sql4="select * from cu_service where service_cu='".$row3['id']."' limit 0,4";
								$result4=mysqli_query($con, $sql4);
								if($row4=mysqli_fetch_array($result4)){
									$i=1;
								while($row4=mysqli_fetch_array($result4)){
							?>		

						<div class="body_item">
							<div class="item_wrap">
								<h1 style="text-align: center; padding-bottom: 20px; color:#ed145b">[ 큐레이션 서비스 이용 후기 <?php echo $i;?> ] </h1>
								<div class="item_wrap_left">
									<img src="<?php echo $row4['service_img'];?>" alt="img">
								</div>
								<div class="item_wrap_right">
									<table class="item_table">
										<tr>
											<th>서비스 이용자</th>
											<td>닉네임 (<?php echo $row4['service_get'];?>) <span class="circle title_message_circle table_message" data-id="<?php echo $row['']?>">
									<i class="fas fa-comment"></i>
								</span></td>
										</tr>
										<tr>
											<th>대상자 프로필</th>
											<td><?php 


											$profile=explode("/", $row4['cu_profile']);

											// print_r($profile);	
											if($profile[0]==0){
												$profile[0]="남성";
											}else{
												$profile[0]="여성";
											}
												echo $profile[0];
												echo " / ".$profile[1];
												echo " / ".$profile[2];
												echo " / ".$profile[3];
												echo " / ".$profile[4];
												?>
											</td>
										</tr>
										<tr>
											<th>기프트 안내</th>
											<td><?php echo $row4['cu_gift']?></td>
										</tr>
										<tr>
											<th>서비스 결과</th>
											<td><?php if($row4['service_success']==1){echo "성공";}else{echo "실패";}?></td>
										</tr>
										<tr>
											<th>만족도(평점)</th>
											<td><?php echo $row4['service_point'];?></td>
										</tr>
									</table>
									<div class="right_item_info">
										<h2>서비스 후기 글</h2>
										<p><?php echo $row4['cu_review']?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;}
						}else{
						?>

						<div class="body_item">
							<div class="item_wrap">
								<h1 style="text-align: center; padding-bottom: 20px; color:#ed145b">[ 큐레이션 서비스 이용 후기 예시자료 ] </h1>
								<div class="item_wrap_left">
									<img src="./service_img/basic.png" alt="img" class="cu_example">
								</div>
								<div class="item_wrap_right">

									<table class="item_table">
										<tr>
											<th>서비스 이용자</th>
											<td>닉네임 (userid) <span class="circle title_message_circle table_message">
									<i class="fas fa-comment"></i>
								</span></td>
										</tr>
										<tr>
											<th>대상자 프로필</th>
											<td>남성 /20대/생일/직장동료/운동</td>
										</tr>
										<tr>
											<th>기프트 안내</th>
											<td>트레이닝복</td>
										</tr>
										<tr>
											<th>서비스 결과</th>
											<td>성공</td>
										</tr>
										<tr>
											<th>만족도(평점)</th>
											<td>4</td>
										</tr>
									</table>
									<div class="right_item_info">
										<h2>서비스 후기 글</h2>
										<p>쏘 스윗, 친절하셨습니다.<br> 저 진짜 심한 결정장애가 있는데, 너무 편했어요!<br>
										다음번에도 또 서비스 받고 싶습니다.
										</p>
									</div>
								</div>
							</div>
						</div>

<?php
		}
?>
					
						<div class="cuator_page">
							<!-- 제가 정말로 페이징은 값이 안잡히네요.. -->
						</div>
					</div>
				</div>
			</div>
			<div class="cuator_list">
				<button class="go_list">큐레이터 목록보기</button>
			</div>
			<?php
			include 'footer.php';
		?>
		</section>
		<?php
			include 'circles.php';
		?>
		
		
	</div>
</body>
</html>