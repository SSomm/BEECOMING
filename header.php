	<script type="text/javascript" src="libs/vdialog.js"></script>
	<script type="text/javascript" src="libs/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		// $(".find_pos").click(function(){
  //  			 new daum.Postcode({
  //       oncomplete: function(data) {
  //       	var postcode=data.zonecode;
  //       	var address1=data.address;
  //       	$(".regis_pos").val(postcode);
  //       	$(".regis_address").val(address1);
  //       }
  // 			  }).open();
		// });
	
		$(".join_search").click(function(){
			new daum.Postcode({
				oncomplete:function(data2){
					var postcode2=data2.zonecode;
					var address2=data2.address;
					$(".regis_pos").val(postcode2);
					$(".regis_address").val(address2);
				}
			}).open();
		});	
		$(".saler_search").click(function(){
			new daum.Postcode({
				oncomplete:function(data2){
					var postcode2=data2.zonecode;
					var address2=data2.address;
					$(".regis_company_pos").val(postcode2);
					$(".regis_company_address").val(address2);
				}
			}).open();
		});	

});


</script>
	<?php
		session_start();

	?>
	<?php
			include 'chat_modal.php';
			include 'log.php';
		?>
<div class="login_modal " style="display: none;">
		<div class="login_wrap">
			<div class="modal_left">
				<div class="modal_left_top">
					<div class="white_line_top">
					</div>
					<img src="images/top_logo.png" alt="img">
					<div class="white_line_bot">
					</div>
				</div>
				<div class="modal_left_info">
					<h1 style="    font-family: '조선일보명조'; font-weight: lighter; font-size:2.0em;">" 환영합니다. "</h1>
				</div>
				<div class="modal_left_logo">
					<img src="images/logo.png" alt="logo">
				</div>
			</div>
			<div class="modal_right">
				<img src="images/back_images.png" alt="img">
				<div class="right_wrap">
					<div class="modal_close">
						<i class="fas fa-times"></i>
					</div>			
					<div class="modal_right_top">
						<h1>로그인</h1>
					</div>
					<div class="modal_right_mid">
						<div class="form_group">
							<span>아이디</span>
							<input type="text" name="text" class="login_id">
						</div>
						<div class="form_group">
							<span>패스워드</span>
							<input type="password" name="text" class="login_pw">
						</div>
					</div>
					<div class="modal_right_bottom">
						<button class="login_btn">로그인</button>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!--회원가입-->
	<div class="register_modal" style="display: none;">
		<div class="register_wrap">
			<div class="modal_left">
				<div class="modal_left_top">
					<div class="white_line_top">
					</div>
					<img src="images/top_logo.png" alt="img">
					<div class="white_line_bot">
					</div>
				</div>
				<div class="modal_left_info">
					<h1 style="    font-family: '조선일보명조'; font-weight: lighter; font-size: 2.2em; ">회원이 되시면</h1>

					<p style="    font-family: '조선일보명조'; font-size: 2.0em; font-weight: lighter; line-height:37px; ">보다 다양한 서비스를<br> 이용하실 수 있습니다.</p>
				</div>
				<div class="modal_left_logo">
					<img src="images/logo.png" alt="logo">
				</div>
			</div>
			<div class="modal_right">
				<img src="images/back_images.png" alt="img">
				<div class="right_wrap">
					<div class="modal_close">
						<i class="fas fa-times"></i>
					</div>
					<div class="modal_right_top">
						<h1>회원가입</h1>
					</div>
					<div class="register_modal_intro" >
						
						<div class="modal_intro_wrap">
							<p>개인 혹은 판매샵 운영자로 선택,<br>
가입을  진행하십시오.</p>
							<div class="circle regis_circle user_circle">
							<i class="fas fa-user"></i>
							<p>개인회원</p>
						</div>
						<div class="circle regis_circle saler_circle">
							<i class="fas fa-bezier-curve"></i>
							<p>판매샵 운영자</p>
						</div>
						
						</div>
						
					</div>
					<div class="saller_modal_wrap" style="display: none;">
						<div class="first_wrap">
							<div class="form_group">
								<span>아이디</span>
								<input type="text" name="text" class="regis_company_id" placeholder="영문과 숫자만 입력하세요.">
							</div>

							<div class="form_group">
								<span>패스워드</span>
								<input type="password" name="text" class="regis_company_pw" placeholder="영문,특수문자,숫자 조합으로 입력하세요.">
							</div>
							<div class="form_group">
								<span style="font-size: 1em;">패스워드확인</span>
								<input type="password" name="text" class="regis_company_pw_con" placeholder="비밀번호를 확인하세요.">
							</div>
							<div class="form_group">
								<span>회사명</span>
								<input type="text" name="text" class="regis_company_name" placeholder="회사명을 입력하세요.">
							</div>
							<div class="form_group">
								<span>회사메일</span>
								<input type="text" name="text" class="regis_company_email" placeholder="회사 대표 메일을 입력하세요.">
							</div>	
							<div class="form_group">
								<span>회사전화</span>
								<input type="text" name="text" class="regis_company_tel" placeholder="회사 대표 전화번호를 입력하세요.">
							</div>
							<div class="modal_right_bottom" style="margin-top: 10px;">

								<button class="register_saller_btn">다음  <i class="fas fa-angle-double-right" style="color:white;"></i></button>
								<button class="register_prev_btn"><i class="fas fa-angle-double-left" style="color:white;"></i>  이전</button>
							</div>
						</div>
						<div class="second_wrap">
							<div class="form_group">
								<span>사업자 번호</span>
								<input type="text" name="text" class="regis_company_number" placeholder="사업자 등록 번호를 입력하세요.">
							</div>
							<div class="form_group">
								<span style="font-size: 16px;">판매상품종류</span>
								<select class="regis_producnt">
									<option>선택하세요.</option>
									<option value="clothes">의류</option>
									<option value="shoe">슈즈</option>
									<option value="jewels">쥬얼리&시계</option>
									<option value="fashion_acc">패션소품</option>
									<option value="makeup">메이크업</option>
									<option value="perfume">향수</option>
									<option value="diffuser">디퓨저&스프레이</option>
									<option value="flowers">플라워</option>
									<option value="tea">차/커피/음료</option>
									<option value="digital">디지털용품</option>
								</select>
							</div>
							<div class="form_group" style="position: relative;">
								<span>우편번호</span>
								<input type="text" name="text" class="regis_company_pos">
								<button class="find_pos saler_search">찾아보기</button>
							</div>
							<div class="form_group">
								<span>회사주소</span>
							</div>
							<div class="form_group">
								<input type="text" name="text" class="regis_company_address" style="width: 91%;">
							</div>
							<div class="form_group" style="position: relative;">
								<span>회사로고</span>
								<p class="logo_info">jpg, png, jpeg, gif 파일</p>
									<input type="file" name="company_logo" id="company_logo">
								<label for="company_logo">찾아보기</label>
							</div>
							<div class="modal_right_bottom" style="margin-top: 10px;">
								<button class="register_saller_btn">완료</button>
								<button class="first_saler_prev"><i class="fas fa-angle-double-left" style="color:white;"></i> 이전</button>
								<button class="service_btn">이용약관 확인 및 동의</button>
							</div>
						</div>
					</div>
					<div class="modal_right_wrap user_wrap" style="display: none;">
						<div class="first_wrap">
							<div class="form_group">
								<span>아이디</span>
								<input type="text" name="text" class="regis_id" placeholder="영문과 숫자만 입력하세요.">
							</div>

							<div class="form_group">
								<span>패스워드</span>
								<input type="password" name="text" class="regis_pw" placeholder="영문,특수문자,숫자 조합으로 입력하세요.">
							</div>
							<div class="form_group">
								<span style="font-size: 1em;">패스워드확인</span>
								<input type="password" name="text" class="regis_pw_con" placeholder="비밀번호를 확인하세요.">
							</div>
							<div class="form_group">
								<span>이름</span>
								<input type="text" name="text" class="regis_name" placeholder="이름을 입력하세요.">
							</div>

							<div class="form_group">
								<span>생년월일</span>
								<input type="text" name="text" class="regis_birth" placeholder="숫자만 입력하세요. ex)20000101">
							</div>

							

							<div class="form_group">
								<span>이메일</span>
								<input type="text" name="text" class="regis_email" placeholder="이메일 형식으로 입력하세요.">
							</div>							

							<div class="modal_right_bottom" style="margin-top: 10px;">

								<button class="register_btn">다음  <i class="fas fa-angle-double-right" style="color:white;"></i></button>
								<button class="register_prev_btn"><i class="fas fa-angle-double-left" style="color:white;"></i>  이전</button>
							</div>
						</div>
						<div class="second_wrap">
							<div class="form_group">
								<span>닉네임</span>
								<input type="text" name="text" class="regis_nick" placeholder="한글과 특수문자만 입력하세요.">
							</div>
							<div class="form_group" style="position: relative;">
								<span>우편번호</span>
								<input type="text" name="text" class="regis_pos">
								<button class="find_pos join_search">찾아보기</button>
							</div>
							<div class="form_group">
								<span>주소</span>
							</div>
							<div class="form_group">
								<input type="text" name="text" class="regis_address" style="width: 91%;">
							</div>
							<div class="form_group">
								<span>취미</span>
								<select class="hobby_select">
									<option >선택하기</option>
									<option value="음악듣기">음악듣기</option>
									<option value="애완동물 돌보기">애완동물 돌보기</option>
									<option value="운동">운동</option>
									<option value="여행">여행</option>
									<option value="독서">독서</option>
								</select>
							</div>
							<div class="modal_right_bottom" style="margin-top: 10px;">
								<button class="register_btn">다음  <i class="fas fa-angle-double-right" style="color:white;"></i></button>
								<button class="first_prev"><i class="fas fa-angle-double-left" style="color:white;"></i> 이전</button>
							</div>
						</div>
						<div class="thired_div">
							<div class="register_que">
								<div class="left_top_board">
								</div>
								<div class="left_bottom_board">
								</div> 
								<p style="display: inline; color: white; text-align: left; font-size: 1.3em; font-family: 'ThecircleL'; box-sizing: border-box;padding-top: 20px; ">
										비커밍큐레이터는 <br>다른 사용자들이 선물을 고를 때, <br>쪽지나 채팅으로 도움을 주게 됩니다. 
<br><br>
비커밍의 큐레이터로 활동시,<br> 소정의 <p style="display: inline; font-family: 'ThecircleL'; color: #fffc00;font-size: 1.3em;">활동비</p><p style="display: inline-block; color: white; font-size: 1.3em; font-family: 'ThecircleL';">를 드립니다.</p>
								</p>
							</div>
							<div class="cuator_insert">
								<button class="cuator_btn">큐레이터 등록</button>
								<div class="cuator_div">
									<input type="radio" name="cu_argree" value="1"><label style="margin-left: 10px;  " >참여</label>

									<input type="radio" name="cu_argree"  value="0" style="margin-left: 80px;"><label style="margin-left: 10px;">불참여</label>
								</div>
							</div>
							<div class="cuator_button">
								<button class="cuator_btn_success">완료</button>
								<button class="second_prev"><i class="fas fa-angle-double-left" style="color:white;"></i> 이전</button>
							</div>
						</div>
					</div>
					<!-- <div class="modal_right_mid">
						<div class="form_group">
							<span>아이디</span>
							<input type="text" name="text" class="login_id">
						</div>
						<div class="form_group">
							<span>패스워드</span>
							<input type="text" name="text" class="login_id">
						</div>
					</div> -->
					
				</div>

			</div>
		</div>
	</div>
	<header>
		<div class="header_wrap">
			<div class="header_logo">
				<a href="index.php"><img src="images/logo.png" alt="logo"></a>
			</div>
			<div class="search_div">
				<input type="text" name="text" class="search_input" placeholder="검색어를 입력하세요.">
				<span class="circle search_circle">
					<i class="fas fa-search"></i>
				</span>
			</div>
			<div class="menu_div">
				<div class="menu_div_top">
					<?php
						if($_SESSION['seller']=="1"){
					?>
					<a href="#" class="company_mypage_go" data-id='<?=$_SESSION['user_id']?>'>마이페이지</a>
					<?php
					}else if($_SESSION['seller']=="0"){
					?>
					<a href="#" class="mypage_go"  data-id='<?=$_SESSION['user_id']?>'>마이페이지</a>
					<?php
					}else{
					?>
					<a href="#" class="register_go">회원가입</a>	
					<?php
					}
					?>
					<?php
						if(isset($_SESSION['user_id'])){
					?>
					<a href="#" class="logout_go">로그아웃</a>
					<?php
					}else{
					?>
					<a href="#" class="login_go">로그인</a>
					<?php
					}
					?>
				</div>
				<div class="menu_div_bottom">
					<p class="becomingpage"><a href="aboutus.php">ABOUT US</a></p>
					<p class="shoppage"><a href="category.php">SHOP</a></p>
					<p class="communitypage"><a href="communitypage.php">커뮤니티</a></p>
					<p class="curatorpage"><a href="curator.php">큐레이터</a></p>
				</div>
			</div>
		</div>
	</header>