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
	<link rel="stylesheet" type="text/css" href="css/aboutus.css">
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
	<script type="text/javascript" src="js/about.js"></script>
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
		// include 'poll_modal.php';
	?>
	<?php
		// include 'img_scale.php';
	?>
	<?php
			// include 'circles.php';
		?>
	<div class="wrap">
		<section class="welcome_section">
			<!-- <img src="./images/about_back1.png" alt="img"> -->
			<div class="welcome_wrap">
				<div class="welcome_body">
					<div class="welcome_body_wrap">
						<img src="./images/aboutlogo.png" alt="img" class="main_img">
						<h1>“ 안녕하십니까.  센스 큐레이션 기프트샵 비커밍입니다. ”</h1>
						<p class="greetings">  저희 비커밍은 선물을 주고받는 것이 주는 사람에게도, 받는 사람에게도 의미있는<br>
  인생의 기억을 만들어가는 계기가 된다고 생각합니다.<br>
  여러분이 평생 추억하며 웃음짓게 될 순간들을 더욱 풍성히 만들어갈 수 있도록,<br>
  비커밍이 함께하겠습니다.</p>
 						<img src="./images/logo.png" alt="img" class="logos_img">
					</div>
				</div>

				<div class="title_btn welcome_btn">
					<div class="tri">
					</div>
					<p>WELCOME</p>
				</div>
			</div>
		</section>
		<section class="service_section">
			<div class="service_wrap">
				<h1>비커밍에서 누릴 수 있는 다양한 서비스</h1>
				<div class="service_body">
					<div class="service_item" id="curator_page">
						<div class="big_tri">
						</div>
						<h2>비커밍 큐레이터</h2>
						<img src="./images/service_icon.png" alt="img">
						<p>빅데이터 & 큐레이터<br>
품목별 상품 추천 시스템
</p>
					</div>
					<div class="service_item" id="shop_page">
						<div class="big_tri">
						</div>
						<h2>비커밍샵</h2>
						<img src="./images/service_icon1.png" alt="img">
						<p>품질 기본, 센스 가득<br>
상품 선별 제공
</p>
					</div>
					<div class="service_item" id="community_page">
						<div class="big_tri">
						</div>
						<h2>비커밍 커뮤니티</h2>
						<img src="./images/service_icon2.png" alt="img">
						<p>각종 꿀팁들을<br>
공유하는 게시판
</p>
					</div>
				</div>
				<div class="service_info">
					<span class="use">이용약관</span>
					<span class="contract">전자상거래 약관</span>
					<span class="span_seart">개인정보 취급방침</span>
				</div>

				<div class="title_btn service_btn1" style="top: 90px;">
					<div class="tri">
					</div>
					<p>SEVICES</p>
				</div>
			</div>
		</section>
		<section class="send_section">
			<div class="send_wrap">
				<h1>비커밍은 판매자, 사용자들에게 열려있는 기업입니다.</h1>
				<div class="send_body">
					<div class="send_body_left">
						<div class="send_body_top">
							<img src="./images/aboutlogo.png" alt="img">
						</div>
						<div class="send_left_bottom">
							<div class="send_item">
								<img src="./images/send_icon1.png" alt="img">
								<p style="line-height: 35px;">+82 070-0000-0000<br>+82 070-0000-0000</p>
							</div>
							<div class="send_item">
								<img src="./images/send_icon2.png" alt="img" style="width: 11%;">
								<p>제주특별자치도 제주시<br>
산천단동 한국폴리텍대학<br>
제주캠퍼스 융합디자인학과</p>
							</div>
							<div class="send_item">
								<img src="./images/send_icon3.png" alt="img" style="width: 13%;">
								<p>somiv0427@naver.com<br>
admin27@gmail.com</p>
							</div>
						</div>
					</div>
					<div class="send_body_right">
						<input type="text" class="right_top_input send_name e_send_name" placeholder="이름">
						<input type="text" class="right_top_input send_name e_send_num" style="margin-left: 13px;" placeholder="전화번호">
						<input type="text" class="send_mail e_send_email" placeholder="이메일주소">
						<input type="text" class="send_title e_send_title" placeholder="제목">
						<textarea class="sned_body e_send_msg" placeholder="내용"></textarea>
						<button class="send_btn">보내기</button>
					</div>
				</div>
				<div class="title_btn contacts_btn" style="top: 90px;">
					<div class="tri">
					</div>
					<p>CONTACTS</p>
				</div>
			</div>

		</section>
		
		<?php
			include 'footer.php';
		?>
	</div>
</body>
</html>