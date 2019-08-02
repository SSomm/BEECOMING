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
	<link rel="stylesheet" type="text/css" href="css/mypage.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="libs/jquery-animate-css-rotate-scale.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/category.js"></script>
	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
	<title>비커밍</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".target").hide();
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
			$('.mypage_shopingback_body').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows:true,
  autoplay:true,
  prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
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
		$sql="select * from member where id='".$_SESSION['user_id']."'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);

		//row4 : 수신 메시지
		// $sql4="select count(*) as msgcnt from message where receiver_id='".$_SESSION['user_id']."' and confirm_flag=0";
		$sql4="select count(*) as msgcnt from message where receiver_id='".$_SESSION['user_id']."'";


		$result4=mysqli_query($con, $sql4);
		$row4=mysqli_fetch_array($result4);

		//row11 : 발신 메시지
		$sql11="select count(*) as msgcnt from message where sender_id='".$_SESSION['user_id']."'";
		$result11=mysqli_query($con, $sql11);
		$row11=mysqli_fetch_array($result11);

		$sql12="select count(*) as msgcnt from message where receiver_id='".$_SESSION['user_id']."' and confirm_flag=0";
		$result12=mysqli_query($con,$sql12);
		$row12=mysqli_fetch_array($result12);


	?>
	<!--설문조사-->
	<?php
		include 'poll_modal.php';
	?>
	<?php
		include 'reply_modal.php';
		include 'reply_view.php';
	?>


	<div class="my_info_update_modal" style="display: none;">
		<div class="update_modal_wrap">
			<div class="upate_modal_wraps">
				<div class="update_modal_left">
					<img src="images/cuator_modal_back.png" alt="img">
					<p class="modal_title"><?php echo $row['name'];?> 님의 프로필</p>
					<div class="circle modal_circle">
						<div class="circle modal_in_circle profile_img_div">
							<img src="<?php echo $row['profile_img'];?>" alt="img">
						</div>
					</div>
					<div class="page_fiels">
									<label for="ex_page_file">
										<div class="page_file_circle">
											<i class="fas fa-pen"></i>
										</div>
									</label>
									<input type="file" id="ex_page_file" accept=".gif, .jpg, .png, .jpeg" data-id="<?=$_SESSION['user_id'];?>">
					</div>
					<div class="update_infos">
						<p>이름 : <?php echo $row['name'];?></p>
						<p><?php echo $row['email'];?></p>
					</div>
					<p class="member_delete">회원탈퇴</p>

					<div class="page_white_logo">
						<img src="images/logo.png" alt="img">
					</div>
				</div>
				<div class="upate_modal_right">
					<div class="modal_right_top">
						<div class="right_top_left">
							<p>마이페이지<br>상단 이미지</p>
						</div>						
						<div class="right_top_right">
							<div class="mypage_img">
								<div class="mypage_img_wrap">
									<img src="<?php echo $row['mypage_img']?>" alt="img">
									<div class="mypage_hover" style="display: none;">
										<p>아이콘을 클릭하여<br>
큐레이터 페이지<br>
상단 이미지를 설정하세요<br></p>
									</div>
								</div>
									
							</div>
							<div class="page_fiels right_files">
									<label for="ex_right_files" style="width: 45px; height: 45px; padding-top: 3.5px;">
										<div class="page_file_circle right_in_file">
											<i class="fas fa-pen"></i>
										</div>
									</label>
									<input type="file" id="ex_right_files" accept=".gif, .jpg, .png, .jpeg" data-id="<?php echo $_SESSION['user_id']?>">
							</div>
						</div>
					</div>
					<div class="modal_right_bottom">
						<div class="moal_right_item">
							<div class="right_item_title">
								<p>닉네임</p>
							</div>
							<div class="right_item_input_div">
								<input type="text" class="nick_name inputsnick" placeholder="닉네임은 한글이나 특수문자를 입력하세요." value="<?php echo $row['nickname']?>">
							</div>
						</div>
						<div class="moal_right_item large_item">
							<div class="right_item_title">
								<p>취미</p>
							</div>
							<div class="right_item_input_div">
								<div class="check_item">
									<input type="checkbox" id="check1" class="check" name="hobby_up" value="운동하기">
									<label for="check1">운동하기</label>
								</div>
								<div class="check_item">
									<input type="checkbox" id="check2" class="check" name="hobby_up" value="여행하기">
									<label for="check2">여행하기</label>
								</div>
								<div class="check_item">
									<input type="checkbox" id="check3" class="check" name="hobby_up">
									<label for="check3" value="독서하기">독서하기</label>
								</div>
								<div class="check_item">
									<input type="checkbox" id="check4" class="check" name="hobby_up" value="음악듣기">
									<label for="check4" >음악듣기</label>
								</div>
								<div class="check_item">
									<input type="checkbox" id="check5" class="check" name="hobby_up" value="애완동물 돌보기">
									<label for="check5" >애완동물 돌보기</label>
								</div>
								<div class="check_item">
									<input type="text" class="gitar inputs hobby_etc" placeholder="기타 취미 입력">
								</div>
							</div>
						</div>
						<div class="moal_right_item" style="margin-top: 7px;">
							<div class="right_item_title">
								<p>큐레이터 활동여부</p>
							</div>
							<div class="right_item_input_div" style="padding-top: 10px;">
								<input type="radio" class="radio" value="1" id="radio1" checked="checked" name="cu_check">
								<label for="radio1">동의</label>
								<input type="radio" class="radio" value="2" id="radio2" name="cu_check">
								<label for="radio2">비동의</label>
							</div>
						</div>
						<div class="moal_right_item very_large_item">
							<div class="right_item_title">
								<?php 
									$sql3="select * from private where user_id='".$_SESSION['user_id']."'";
									$result3=mysqli_query($con, $sql3);
									$row3=mysqli_fetch_array($result3);
									$address=explode(",", $row3['address']);
								?>
								<p>주소</p>
							</div>

							<!-- 	<div class="form_group" style="position: relative;">
								<span>우편번호</span>
								<input type="text" name="text" class="regis_pos">
								<button class="find_pos">찾아보기</button>
							</div>
							<div class="form_group">
								<span>주소</span>
							</div> -->
							<div class="right_item_input_div">
								<input type="text" class="regis_pos adress_one inputs" value="<?php echo $address[0];?>">
								<div class="adress_button">
									<div class="in_address_button find_pos">
										<p>찾아보기</p>
									</div>
								</div>
								<input type="text" class="adress_two inputs regis_address" style="margin-top: 10px;" value="<?php echo $address[1];?>">
							</div>
						</div>

						<div class="moal_right_item" style="margin-top: 10px;">
							<div class="right_item_title">
								<p>현재비밀번호</p>
							</div>
							<div class="right_item_input_div">
								<input type="password" class="curent_pw inputs" placeholder="입력값이 현재 비밀번호와 일치해야만 정보를 수정할 수 있습니다." data-id="<?php echo $_SESSION['user_id'];?>">
							</div>
						</div>

						<div class="moal_right_item">
							<div class="right_item_title">
								<p>비밀번호 수정</p>
							</div>
							<div class="right_item_input_div">
								<input type="password" class="update_pw inputs" placeholder="영어 대,소문자, 특수문자, 숫자를 조합한 비밀번호 최소 8자리 이상">
							</div>
						</div>

						<div class="moal_right_item">
							<div class="right_item_title">
								<p>비밀번호 수정확인</p>
							</div>
							<div class="right_item_input_div">
								<input type="password" class="update_pw_cf inputs" placeholder="영어 대,소문자, 특수문자, 숫자를 조합한 비밀번호 최소 8자리 이상">
							</div>
						</div>

						<div class="update_modal_btns">
							<div class="buttons update_success">
								<div class="buttons_in">
									<p>수정완료</p>
								</div>
							</div>
							<div class="buttons update_canel">
								<div class="buttons_in">
									<p>수정취소</p>
								</div>
							</div>
							<div class="buttons update_rest">
								<div class="buttons_in">
									<p>재설정</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="circle update_close_circle">
				<i class="fas fa-times"></i>
			</div>
			</div>

		</div>
	</div>

	<div class="wrap">
		<section class="cuator_main_section">
			<img src="<?php echo $row['mypage_img']; ?>" alt="img" class="main_img">
			<img src="images/gray_div.png" alt="img" class="gray_img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>MyPage</span>
			</div>
			<div class="infos_div">
				<p>“나의 활동 기록과 정보들을 볼 수 있습니다.”</p>
			</div>
		</section>
		<section class="mypage_section">
			<div class="mypage_wrap">
				<div class="mypage_left">
						<div class="profile_top">
							<div class="circle profile_circle">
								<div class="circle in_circle">
									<?php
									if($row['profile_img']==""){
									?>
									<img src="http://192.168.20.78/becoming0508/profile_img/basic.png" alt="img">
									<?php
									}else{
									?>
									<img src="<?php echo $row['profile_img'];?>" alt="img">
									<?php
									}
									?>
								</div>
							</div>
							<div class="profile_panel">
								<div class="filebox">
									  <label for="ex_file">프로필 사진 수정</label>
									  <input type="file" id="ex_file" accept=".gif, .jpg, .png, .jpeg" data-id="<?=$_SESSION['user_id'];?>">
								</div>
								<h2><?php echo $row['name'];?></h2>
								<p><?php echo $row['email'];?></p>
								<div class="reply_div">
									<div class="circle reply_circle">
										<i class="fas fa-comment"></i>
									</div>
									<p class="messages" data-id="<?php echo $_SESSION['user_id']?>">메시지함</p>
									<?php

										if($row12['msgcnt']==0){

										}else{
											?>
									<div class="circle reply_count_circle">
										<p><?php echo $row12['msgcnt']?></p>
									</div>	
									<?php
										}
									?>
								

								</div>
							</div>
						</div>
						<div class="left_two_div">
							<p class="text_only" data-id="<?php echo $_SESSION['user_id']?>">내가 쓴 글 보기</p>
					<!-- 		<p>스크랩한 글 보기</p> -->
							<p>1:1 대화 기록</p>
						</div>
						<div class="left_three_div">
							<p class="go_cartpage">장바구니</p>
							<p class="go_orderpage">주문내역</p>
							<!-- <p class="go_parcelpage">배송조회</p> -->
							<div class="circle quetion_circle mypage_quetion">
								<i class="fas fa-question"></i>
							</div>
							<div class="bal" style="display: none;">
								<div class="balloon">
									<p>테마색상과<br>마이페이지, 큐레이터<br>상단부 이미지를<br>변경할 수 있습니다.</p>
								</div>
							</div>
						</div>
						<div class="page_thema_update">
							<p>페이지 테마 수정</p>
						</div>
						<div class="my_info_update">
							<button class="my_info_update_btn">나의정보 수정</button>
						</div>
				</div>
				<div class="mypage_right">
					<div class="mypage_right_top">
						<?php
							$sqla="select * from curator where user_id='".$_SESSION['user_id']."'";
							$resulta=mysqli_query($con, $sqla);
							$rowa=mysqli_fetch_array($resulta);
						?>
						<h1>'<?php echo $row['name'];?>' 님의 마이페이지 입니다.</h1>
							<?php
								if($row['curator']==1){
							?>
						<button class="my_cuartor_page" data-num="<?php echo $rowa['curator_num']?>" >나의 큐레이터 페이지</button>
							<?php
							}
								?>					
					</div>
					<p class="cur_pw" style="color:white; font-size:1px;"><?php echo $row['pw'];?></p>
					<div class="mypage_right_bottom">
						<div class="mypage_write">
							<?php
								$sql0="select count(*) as cnt from board where user_id='".$_SESSION['user_id']."'";
								$result0=mysqli_query($con, $sql0);
								$row0=mysqli_fetch_array($result0);
							?>

							<div class="mypage_write_top">
								<div class="mypage_write_top_left">
									<div class="circle mypage_write_circle">
										<i class="fas fa-pen"></i>
									</div>
									<h1 class="mypage_title_h1">내가 쓴 글</h1>
									<p class="mypage_title_p">총 <?php echo $row0['cnt'];?>개의 글을 쓰셨습니다.</p>
								</div>
								<div class="mypage_write_top_right">
									<button class="mypage_btn more_btn text_only text_onlybtn" data-id="<?php echo $_SESSION['user_id']?>">모아보기</button>
								</div>
							</div>
							<div class="mypage_write_bottom">

								<?php
									$sql1="select * from board where user_id='".$_SESSION['user_id']."' order by board_num desc limit 0,3";
									$result1=mysqli_query($con, $sql1);
									while($row1=mysqli_fetch_array($result1)){
								?>
							<div class="item_board">
								<div class="item_img">
									<div class="item_img_wrap">
									<?php
										$str=$row1['bodytext'];
										preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
										if($matches[1]==""){
										?>
										<img src="<?php echo $row1['thumbnail'];?>" alt="img">
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
											<h1 data-num='<?php echo $row1['board_num']; ?>'><?php echo $row1['boardtitle'];?></h1>
										</div>
										<div class="info_top_right">
											<p><?php $date = date_create($row1['first_written']);
						echo date_format($date,"Y. m. d");?></p>
										</div>
									</div>
									<div class="item_info_bottom">
										<p><?php
										$ck_body=$row1['bodytext'];
										echo trim(strip_tags($ck_body));
										?></p>
									</div>
									<div class="view_hash different">			
								<?php
								$board_hashtags=array();
								$ex_hash=explode(",", $row1['boardhash']);
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
											$sql2="select * from member where id='".$_SESSION['user_id']."'";
											$result2=mysqli_query($con, $sql2);
											$row2=mysqli_fetch_array($result2);
											?>
											<img src="<?php echo $row2['profile_img'];?>" alt="img">
										</div>
									</div>
									<p><?php echo $row2['nickname'];?></p>

									<?php
									if($row2['curator']=="1"){
									?>
									<div class="bal_1">
										<div class="balloon_1 cr_flag">
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
										<p class="icon_info_div_count">조회수 <?php echo $row1['view_num'];?></p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-comment"></i>
										</div>
										<p class="icon_info_div_count">댓글수 <?php echo $row1['comment_num'];?></p>
									</div>
									<div class="icon_info_div">
										<div class="circle icon_info_div_circle">
											<i class="fas fa-heart"></i>
										</div>
										<p class="icon_info_div_count">좋아요 <?php echo $row1['like_num'];?></p>
									</div>
								</div>
							</div>
							<?php
							}
							?>


							</div>
						</div>

						<div class="mypage_reply">
							<div class="mypage_write_top">
								<div class="mypage_write_top_left">
									<div class="circle mypage_write_circle">
										<i class="fas fa-envelope"></i>
									</div>
									<h1 class="mypage_title_h1 messageboxtitle">나의 수신 메시지함</h1>
									<p class="mypage_title_p boxtitledesc">총 <?php echo $row4['msgcnt'];?>개의 수신메시지가 있습니다.</p>
								</div>
								<div class="mypage_write_top_right">
									<button class="message_write">메시지쓰기</button>
									<button class="send_message" data-id="<?php echo $_SESSION['user_id'];?>" data-cnt="<?php echo $row11['msgcnt']?>">발신 메시지</button>
									<button class="receive_message" style="display:none;" data-id="<?php echo $_SESSION['user_id'];?>" data-cnt="<?php echo $row4['msgcnt']?>">수신 메시지</button>
									<button class="message_all" data-id="<?php echo $_SESSION['user_id']?>">전체메시지 보기</button>
								</div>
							</div>
							<div class="mypage_reply_body">
								<?php
									$sql5="select * from message where receiver_id='".$_SESSION['user_id']."'";
									$result5=mysqli_query($con, $sql5);	
									$reply_i = 0;
								while($row5=mysqli_fetch_array($result5)){
									$sql6="select * from member where id='".$row5['user_id']."'";
									$result6=mysqli_query($con, $sql6);
									$row6=mysqli_fetch_array($result6);
								?>
								<div class="reply_item">
									<div class="reply_item_check">
										<input type="checkbox" id="checkbox_item<?=$reply_i?>" name="check_msg" data-num="<?php echo $row5['message_num']?>" data-id="<?php echo $row5['receiver_id']?>">
										<label for="checkbox_item<?=$reply_i?>"></label>
									</div>
									<div class="reply_item_title">
										<p data-num="<?php echo $row5['message_num'];?>" data-id="<?php echo $row5['receiver_id']?>"><?php echo $row5['message_title']?></p>
									</div>
									<div class="reply_item_writer">
										<p><?php echo $row5['sender_id'];?></p>
									</div>
									<div class="reply_item_date">
										<p><?php
											$datee = date_create($row5['send_date']);
											echo date_format($datee,"Y. m. d");
										?></p>
									</div>
									<div class="reply_item_check_this">
										<?php
											if($row5['confirm_flag']==0){
										?>
										<p>미확인</p>
										<?php
											}else{
										?>
										<p><?php 
											$get_datee = date_create($row5['get_date']);
											echo date_format($get_datee,"Y. m. d");
											// echo date_format($get_datee,"H: i: s");
										?></p>
										<?php
										}
										?>
									</div>
								</div>
								<?php
								$reply_i++;
								}
								?>

							</div>			
					
						<?php
							if($row4['msgcnt']==0 && $row11['msgcnt']==0){

							}else{
						?>
						<button class="message_select_del">선택메시지 삭제</button>
						<?php
							}
						?>	
						</div>					
						<!-- <button class="message_select_del">전체</button> -->

						<div class="mypage_orderlist">
							<div class="mypage_write_top">
								<div class="mypage_write_top_left">
									<div class="circle mypage_write_circle">
										<i class="fas fa-sticky-note"></i>
									</div>
									<h1 class="mypage_title_h1">주문내역</h1>
									<p class="mypage_title_p">현재 
									<?php 
									$sql18="select count(*) from purchase_record where user_id='".$_SESSION['user_id']."' and purchase_stat=0";
									$result18=mysqli_query($con, $sql18);
									$row18=mysqli_fetch_array($result18);

									echo $row18['cnt'];
									?>개의 주문이 진행 중에 있습니다.</p>
								</div>
								<div class="mypage_write_top_right">
									<button class="mypage_btn more_btn ">자세히</button>
								</div>
							</div>


							<div class="mypage_orderlist_body">
								<?php
								$sql16="select * from purchase_record where user_id='".$_SESSION['user_id']."' and purchase_stat=0 group by purchase_date";
								$result16=mysqli_query($con, $sql16);
								while($row16=mysqli_fetch_array($result16)){
									$date_purchase=date_create($row16['purchase_date']);
									$datee_purchase=date_format( $date_purchase, "Y-m-d");
									// echo $date_purchase;
									// echo $datee_purchase;

									$sql17="select * from shop_product where product_num=".$row16['product_num'];
									$result17=mysqli_query($con, $sql17);
									while($row17=mysqli_fetch_array($result17)){
									
										$thimbbb=explode(",",$row17['product_thumb']);
										$thimb="http://192.168.20.78/becoming0508/category_img/".$row17['category']."/".$thimbbb[0];
								?>

								<div class="orderlist_item">
									<div class="orderlist_item_img">
										<img src="<?php echo $thimb ?>" alt="img">
									</div>
									<div class="orderlist_title">
										<p><?php echo $row17['product_name']?> 외 <?php echo $row16['purchase_quantity']?>종</p>
									</div>
									<div class="orderlist_price">
										<p>총 주문금액  <?php echo number_format($row16['stack_money']); ?>원</p>
									</div>
									<div class="orderlist_date">
										<p><?php echo $datee_purchase;?></p>
									</div>
									<div class="orderlist_state">
										<p>발송 준비중</p>
									</div>
								</div>

								<?php
									}
								}
								?>					
							
							</div>
						</div>

						<div class="mypage_shoopingback">
							<div class="mypage_write_top">
								<div class="mypage_write_top_left">
									<div class="circle mypage_write_circle">
										<i class="fas fa-shopping-cart"></i>
									</div>
									<h1 class="mypage_title_h1">장바구니</h1>
									<?php
										$sql15="select count(*) as cnt from shop_cart where user_id='".$_SESSION['user_id']."'";
										$result15=mysqli_query($con, $sql15);
										$row15=mysqli_fetch_array($result15);
									?>

									<p class="mypage_title_p">현재 <?php echo $row15['cnt'];?>개의 상품이 장바구니에 있습니다.</p>
								</div>
								<div class="mypage_write_top_right">
									<button class="mypage_btn more_btn cart_more">자세히</button>
								</div>
							</div>
							<div class="mypage_shopingback_body">
								<?php
									$sql13="select * from shop_cart where user_id='".$_SESSION['user_id']."'";
									$result13=mysqli_query($con, $sql13);
									while($row13=mysqli_fetch_array($result13)){
										$sql14="select * from shop_product where product_num=".$row13['product_num'];
										$result14=mysqli_query($con, $sql14);
										$row14=mysqli_fetch_array($result14);

										$thumbs=explode(",", $row14['product_thumb']);
										$repre_img=$thumbs[0];
										if($row14['product_drice']){
											$product_p=(preg_replace("/[^0-9]*/s","",$row14['product_drice']));
										}else{
											$product_p=(preg_replace("/[^0-9]*/s","",$row14['product_price']));
										}


								?>
									<div class="shooping_item">
										<div class="item_img_div">
											<img src="category_img/<?php echo $row14['category']?>/<?php echo $repre_img?>" alt="img" data-num="<?php echo $row14['product_num']?>">
										</div>
										<p class="brand_c">[<?php echo $row14['product_brand']?>]</p><br>
										<p class="brandn_c" data-num="<?php echo $row14['product_num']?>"><?php echo $row14['product_name']?></p>
									</div>
								<?php
								}
								?>
									
							</div>
						</div>

						<div class="mypage_person">
							<div class="mypage_write_top">
								<div class="mypage_write_top_left">
									<div class="circle mypage_write_circle">
										<i class="fas fa-users"></i>
									</div>
									<h1 class="mypage_title_h1">최근 대화 상대</h1>
									<?php
								$sql22="select count(distinct chat_receiver_id) as cnt from cu_chat where chat_sender_id='".$_SESSION['user_id']."' order by chat_time desc";
								$result22=mysqli_query($con, $sql22);

									$row22=mysqli_fetch_array($result22);

									?>
									<p class="mypage_title_p">총 <?php echo $row22['cnt'];?>명과 대화를 나누셨습니다.</p>
								</div>
							<!-- 	<div class="mypage_write_top_right">
									<button class="mypage_btn more_btn">자세히</button>
								</div> -->
							</div>
							<div class="mypage_person_body">
								<?php
								$sql20="select * from cu_chat where chat_sender_id='".$_SESSION['user_id']."' group by chat_receiver_id order by chat_time desc limit 0,10";
								$result20=mysqli_query($con, $sql20);
								while($row20=mysqli_fetch_array($result20)){
									$sql21="select * from member where id='".$row20['chat_receiver_id']."'";
									$result21=mysqli_query($con, $sql21);
									$row21=mysqli_fetch_array($result21);
								?>
								<div class="perosn_body_item">
									<div class="person_circle circle">
										<div class="person_in_circle circle">
											<img src="<?php echo $row21['profile_img']?>" alt="img">
										</div>
									</div>
									<p><?php echo $row21['name']?></p>
								</div>
								<?php
								}	
								?>
							</div>
						</div>

						<div class="mypage_theme">
							<div class="mypage_write_top">
								<div class="mypage_write_top_left" style="width: 70%">
									<div class="circle mypage_write_circle">
										<i class="fas fa-cogs"></i>
									</div>
									<h1 class="mypage_title_h1">페이지 테마설정 내용</h1>
									<p class="mypage_title_p">테마색상과 사진을 변경하실 수 있습니다.</p>
								</div>
								<!-- <div class="mypage_write_top_right" style="width: 30%">
									<button class="mypage_btn more_btn modify_theme">테마 수정하기</button>
								</div> -->
							</div>
							<?php
								$sql3="select * from curator where user_id='".$_SESSION['user_id']."'";
								$result3=mysqli_query($con, $sql3);
								$row3=mysqli_fetch_array($result3);
							?>
							<div class="mypage_theme_body">
								<!-- <div class="mypage_theme_left">
									<div class="circle color_circle">
									</div>
									<p>색상 테마</p>
								</div> -->

								<div class="mypage_theme_center">
									<div class="theme_img mypagetheme">
										<img src="<?php echo $row['mypage_img'];?>" alt="img">
									</div>
								<div class="mypage_theme">
									  <label for="ex_mypagefile">마이페이지 상단 이미지 바꾸기</label>
									  <input type="file" id="ex_mypagefile" accept=".gif, .jpg, .png, .jpeg" data-id="<?=$_SESSION['user_id'];?>">
								</div>
									<!-- <p>마이페이지 상단부</p> -->
								</div>

								<div class="mypage_theme_right">
									<div class="theme_img curatorpagetheme">
										<img src="<?php echo $row3['cupage_img']; ?>" alt="img">
									</div>
									<div class="curatorpage_theme">
									  <label for="ex_curatorpagefile">큐레이터페이지 상단 이미지 바꾸기</label>
									  <input type="file" id="ex_curatorpagefile" accept=".gif, .jpg, .png, .jpeg" data-id="<?=$_SESSION['user_id'];?>">
								</div>

									<!-- <p>큐레이터페이지 상단부</p> -->
								</div>
							</div>
						</div>
					</div>
				</div>
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