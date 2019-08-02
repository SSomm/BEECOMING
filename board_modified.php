<?php
	include("./dbcon.php");
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
	<link rel="stylesheet" type="text/css" href="css/board_writing.css">
	<link rel="stylesheet" type="text/css" href="css/circles.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="libs/inputTags.css">
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
	?>

	<div class="wrap">
		<?php
			$boardnum=$_GET['boardnum'];
			$sql="select * from board where board_num=".$boardnum;
			$result=mysqli_query($con, $sql);
			$row=mysqli_fetch_array($result);

		?>
		<p class="get_cate" style="display: none;"><?=$row['boardcate']?></p>
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
				</nav>
			</div>
			<div class="board_div">
				<div class="board_wrap">
					<div class="board_wrap_top">
						<h2>게시판 글수정</h2>
						<span>작성일 : 190421</span>
						<span style="border-left: 3px solid #696868;">작성자 : 관리자</span>
					</div>
					<div class="board_wrap_select">
						<div class="select_wrap">
							<div class="select_logo">
								<img src="images/search_logo.png" alt="img">
							</div>
							<div class="select_body">
								<select class="cate_select">	
									<option value="전체게시판">전체게시판</option>
									<option value="자유게시판">자유게시판</option>
									<option value="선물 후기 게시판">선물 후기 게시판</option>
									<option value="큐레이션 후기 게시판">큐레이션 후기 게시판</option>
								
								</select>
							</div>
						</div>
					</div>
					<div class="board_wrap_title">
						<input type="text" name="text" class="board_title modi_title" placeholder="제목을 입력해주세요." value="<?php echo $row['boardtitle'];?>">
					</div>
					<div class="board_wrap_bodytext">
						<textarea id="contents" name="contents" class="modi_bodytext"><?php echo $row['bodytext'];?>					
						</textarea>
					</div>
					<div class="board_wrap_hash modify_hash">
						<!-- <div class="board_hash" placeholder="태그를 입력하세요. (최대 4개까지 가능합니다.)"> -->
						<input type="text" id="tags" class="board_hash wr_hash" name="tags" value="<?php echo $row['boardhash']?>" placeholder="태그는 ','로 구별됩니다.">
					</div>
					<div class="board_wrap_pw">
						<div class="board_wrap_pw_left">
							<span>비밀번호</span>
							<input type="password" name="text" value="<?php echo $row['boardpw']?>" class="board_wrap_pw_input modi_pw">
						</div>
						<div class="board_wrap_pw_right">
							<span>비밀번호 확인</span>
							<input type="password" name="text" value="<?php echo $row['boardpw']?>" class="board_wrap_pw_input modi_pw_con">
						</div>
					</div>
					<div class="board_btn_wrap" style="width: 450px;">
						<button class="board_reset">재작성</button>
						<button class="board_list">목록보기</button>
						<button class="board_modi_canel">수정취소</button>
						<button class="board_modi_success" data-num="<?php echo $row['board_num'];?>" data-id="<?php echo $row['user_id']; ?>">수정완료</button>
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