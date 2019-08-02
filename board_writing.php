<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="libs/animate.css">
	<link rel="stylesheet" type="text/css" href="libs/fontawesome/css/all.min.css">
	<link rel="icon" href="./images/cuator_logo.png" type="image/ico">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/board_writing.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<script type="text/javascript" src="libs/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="libs/inputTags.jquery.js"></script>
	<script type="text/javascript" src="libs/ckeditor/ckeditor.js"></script>
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
		include("dbcon.php");
		session_start();
	?>
	<div class="wrap">
		<section class="cuator_main_section">
			<img src="images/board_back.png" alt="img">
			<div class="path_div">
				<span style="margin-left: 20px;">Home > </span><span>Community Page</span>
			</div>
			<div class="info_board">
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
					<?php $data_id=$_SESSION['user_id']; 
						$today = date("Y-m-d H:i:s");
					?>
					<p style="color:black;" class="writer" data-id="<?php echo $data_id; ?>"></p>
				</nav>
			</div>
			<div class="board_div">
				<div class="board_wrap">
					<div class="board_wrap_top">
						<h2>게시판 글쓰기</h2>
						<span>작성일 : <?php echo $today; ?></span>
						<span style="border-left: 3px solid #696868;">작성자 : <?php echo$_SESSION['user_id'];?></span>
					</div>
					<div class="board_wrap_select">
						<div class="select_wrap">
							<div class="select_logo">
								<img src="images/search_logo.png" alt="img">
							</div>
							<div class="select_body">
								<select>
									<option value="전체게시판">전체게시판</option>
									<option value="자유게시판">자유게시판</option>
									<option value="선물 후기 게시판">선물 후기 게시판</option>
									<option value="큐레이션 후기 게시판">큐레이션 후기 게시판</option>
								</select>
							</div>
						</div>
					</div>
					<div class="board_wrap_title">
						<input type="text" name="text" class="board_title wr_title" placeholder="제목을 입력해주세요.">
					</div>
					<div class="board_wrap_bodytext">
						<form enctype='multipart/form-data' id="editor_content" action='./php/board_insert.php' method='post'>
						<textarea name="contents" class="wr_bodytext"></textarea>
					</form>
					</div>
					<div class="board_wrap_hash">
						<!-- <div class="board_hash" placeholder="태그를 입력하세요. (최대 4개까지 가능합니다.)"> -->
						<input type="text" id="tags" class="board_hash wr_hash" name="tags" value="" placeholder="태그는 ','로 구별됩니다.">
					</div>
					<div class="board_wrap_pw">
						<div class="board_wrap_pw_left">
							<span>비밀번호</span>
							<input type="password" name="text" class="board_wrap_pw_input wr_pw">
						</div>
						<div class="board_wrap_pw_right">
							<span>비밀번호 확인</span>
							<input type="password" name="text" class="board_wrap_pw_input wr_pw_con">
						</div>
					</div>
					<div class="board_btn_wrap">
						<button class="board_reset">재작성</button>
						<button class="board_list">목록보기</button>
						<button class="board_success">작성완료</button>
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
<script>

    CKEDITOR.replace('contents',{
    	 // width:'100%',
            height:'600px',
      // CKEDITOR.instances.contents.updateElement();

    	filebrowserImageUploadUrl:'./libs/ckeditor/upload.php'
    });
  

</script>
</html>