<script type="text/javascript" src="./js/cu_service.js"></script>
<div class="poll_modal" style="display: none;">
	<div class="cuator_list_wrap animated" style="display: none;">
				<div class="modal_cuatorright_title">
					<p>큐레이터검색</p>
				</div>
				<div class="modal_cuator_search">
					<input type="text" class="cuator_search_user" placeholder="(이름, 아이디, 이메일로 검색 가능합니다.)">
					<i class="fas fa-search cuator_search_icon"></i>
				</div>
				<div class="cuator_items">
					<div class="cuator_node">
						<div class="node_porfile">
							<div class="circle node_porfile_circle">
								<div class="circle node_in_circle">
									<img src="" alt="img">
								</div>
							</div>
						</div>
						<div class="cuator_info">
							<p class="id_or_name" data-img="">4XTYLE(4XTYLE) </p>
							<p class="reply_email">4XTYLE@gmail.com</p>
						</div>
						<div class="cuator_check">
							<div class="circle checkcircle cuator_fail_check">
								<i class="fas fa-check"></i>
							</div>
							<div class="circle checkcircle cuator_success_check" style="display:none;" data-state="1">
								<i class="fas fa-check"></i>
							</div>
							
						</div>
					</div>
						
				</div>

				<div class="cuator_close_div">
					<button class="cuator_close_btn"><i class="fas fa-long-arrow-alt-left"></i> 닫기</button>

				</div>
</div>


		<div class="poll_wrap">
			<div class="poll_first" style="overflow: hidden;"> 
				<div class="poll_first_wrap" style="margin-left: 0%;">
					<div class="poll_intro">
						<img src="images/modal_background.png" alt="img">
						<button class="intro_next">다음  <i class="fas fa-angle-double-right" style="color:white;"></i></button>  
						<p style="margin-top: 50px;"><span style="color: #ee1e73; font-family: '더페이스샵 잉크립퀴드체';font-size: 2.1em;">비커밍 큐레이션<br> 서비스</span><span style="color:white;font-family: '더페이스샵 잉크립퀴드체'; font-size:2.1em;">는<br>
선물하시고자 하는 대상의 <br>특성을 기준으로<br>
 가장 </span><span style="color: #ee1e73;font-family: '더페이스샵 잉크립퀴드체';font-size:2.1em;">적절하고 알맞은<br>선물</span><span style="color: white; font-family: '더페이스샵 잉크립퀴드체';font-size:1.8em;">을 추천합니다.
<br><br>
5가지의 간단한 질문에 답하시어<br> 
 타겟을 설정하세요.
</span></p>
					</div>
					<div class="poll_body">
						<div class="poll_body_title">
							<p style="font-family: '더페이스샵 잉크립퀴드체'; font-size: 1.8em;">비커밍 큐레이션 서비스를 이용을 위한<br> 타켓 설정</p>
						</div>
						<div class="poll_body_wrap" style="margin-left: 0%;">
							<div class="poll_body_wrap_first">
								<div class="poll_body_wrap_top">
									<span class="circle num_circle">01</span><p>귀하가 선물하시고자 하는 대상의 성별?</p>
								</div>
								<div class="poll_body_wrap_mid">
									<ul>
										<li><span>1)</span>
											<input type="radio" name="gender" value="0" id="man_id"><label for="man_id">남</label></li>
										<li><span>2)</span>
											<input type="radio" name="gender" value="1" id="woman_id"><label for="woman_id">여</label></li>
									</ul>
								</div>
							</div>
							<div class="poll_body_wrap_second">
								<div class="poll_body_wrap_top">
									<span class="circle num_circle">02</span><p>귀하가 선물하시고자 하는 대상의 나이는?</p>
								</div>
								<div class="poll_body_wrap_mid">
									<ul>
										<li><span>1)</span><input type="radio" name="year" value="10대" id="ten_id"><label for="ten_id">10대</label></li>
										<li><span>2)</span><input type="radio" name="year" value="20대" id="two_id"><label for="two_id">20대</label></li>
										<li><span>3)</span><input type="radio" name="year" value="30대" id="thre_id"><label for="thre_id">30대</label></li>
										<li><span>4)</span><input type="radio" name="year" value="40대" id="for_id"><label for="for_id">40대</label></li>
										<li><span>5)</span><input type="radio" name="year" value="50대" id="five_id"><label for="five_id">50대</label></li>
									</ul>
								</div>
							</div>
							<div class="poll_body_wrap_thired">
								<div class="poll_body_wrap_top">
									<span class="circle num_circle">03</span><p>선물을 챙기고 있는 이벤트는 무엇인가요?</p>
								</div>
								<div class="poll_body_wrap_mid">
									<ul>
										<li><span>1)</span><input type="radio" name="case" value="발렌타인데이" id="event1"><label for="event1">발렌타인데이</label></li>
										<li><span>2)</span><input type="radio" name="case" value="화이트데이" id="event2"><label for="event2">화이트데이</label></li>
										<li><span>3)</span><input type="radio" name="case" value="생일" id="event3"><label for="event3">생일</label></li>
										<li><span>4)</span><input type="radio" name="case" value="기념일" id="event4"><label for="event4">기념일</label></li>
										<li><span>5)</span><input type="radio" name="case" value="기타" id="event5"><label for="event5">기타</label></li>
									</ul>
								</div>
							</div>
							<div class="poll_body_wrap_four">
								<div class="poll_body_wrap_top">
									<span class="circle num_circle">04</span><p>해당 대상은 당신에게 어떤 사람인가요?</p>
								</div>
								<div class="poll_body_wrap_mid">
									<ul>
										<li><span>1)</span><input type="radio" name="rel" value="친구" id="re1"><label for="re1">친구</label></li>
										<li><span>2)</span><input type="radio" name="rel" value="연인" id="re2"><label for="re2">연인</label></li>
										<li><span>3)</span><input type="radio" name="rel" value="부모" id="re3"><label for="re3">부모</label></li>
										<li><span>4)</span><input type="radio" name="rel" value="직장동료" id="re4"><label for="re4">직장동료</label></li>
										<li><span>5)</span><input type="radio" name="rel" value="자녀" id="re5"><label for="re5">자녀</label></li>
									</ul>
								</div>
							</div>
							<div class="poll_body_wrap_five">
								<div class="poll_body_wrap_top">
									<span class="circle num_circle">05</span><p>해당 대상의 취미는 무엇인가요?</p>
								</div>
								<div class="poll_body_wrap_mid">
									<ul>
										<li><span>1)</span><input type="radio" name="hobby" value="음악듣기" id="hobby1"><label for="hobby1">음악듣기</label></li>
										<li><span>2)</span><input type="radio" name="hobby" value="애완동물 돌보기" id="hobby2"><label for="hobby2">애완동물 돌보기</label></li>
										<li><span>3)</span><input type="radio" name="hobby" value="운동" id="hobby3"><label for="hobby3">운동</label></li>
										<li><span>4)</span><input type="radio" name="hobby" value="여행" id="hobby4"><label for="hobby4">여행</label></li>
										<li><span>5)</span><input type="radio" name="hobby" value="독서" id="hobby5"><label for="hobby5">독서</label></li>
									</ul>
								</div>
							</div>
							<div class="poll_body_wrap_six">
								<div class="poll_body_wrap_top">
									<div class="poll_logo_six">
										<img src="images/cuator_logo.png" alt="img">
										<p>해당 타겟은 다음의 선물을 선호합니다.<br>클릭하여 상품을 확인하세요.</p>
									</div>
									<div class="poll_six_body">
										<ul>
											<!-- <li>
												<label for="radio_first">1위 : </label>
												<label for="radio_first">쥬얼리</label>
												<input type="radio" name="radio_first" class="cur_radio" id="radio_first">
											</li>
											<li>
												<label for="radio_second">2위 : </label>
												<label for="radio_second">향수</label>
												<input type="radio" name="radio_first" class="cur_radio" id="radio_second">
											</li>
											<li>
												<label for="radio_thired">3위 : </label>
												<label for="radio_thired">시계</label>
												<input type="radio" name="radio_first" class="cur_radio" id="radio_thired">
											</li>
											<li>
												<label for="radio_four">4위 : </label>
												<label for="radio_four">패션소품</label>
												<input type="radio" name="radio_first" class="cur_radio" id="radio_four">
											</li>
											<li>
												<label for="radio_five">5위 : </label>
												<label for="radio_five">차/커피/음료</label>
												<input type="radio" name="radio_first" class="cur_radio" id="radio_five">
											</li> -->
										</ul>
									</div>
								</div>
								<!-- <div class="poll_body_wrap_mid">
									<ul>
										<li><span>1)</span><input type="radio" name="hobby" value="음악듣기"><label>음악듣기</label></li>
										<li><span>2)</span><input type="radio" name="hobby" value="애완동물 돌보기"><label>애완동물 돌보기</label></li>
										<li><span>3)</span><input type="radio" name="hobby" value="운동"><label>운동</label></li>
										<li><span>4)</span><input type="radio" name="hobby" value="여행"><label>여행</label></li>
										<li><span>5)</span><input type="radio" name="hobby" value="독서"><label>독서</label></li>
									</ul>
								</div> -->
							</div>
						</div>
						<div class="poll_body_button">
							<button class="prev_btn"><i class="fas fa-angle-double-left" style="color:white;"></i> 이전</button>
							<button class="next_btn">다음 <i class="fas fa-angle-double-right" style="color:white;"></i></button>
							<button class="setting_cancel">
								설정취소
							</button>
							<button class="reset">
								재설정
							</button>
							<button class="cu_pick" style="display: none;">
								도움받기
							</button>
							<button class="info">
								상품보기
							</button>
							
							<!-- <button class="submit_btn" style="display: none;">제출 <i class="fas fa-angle-double-right" style="color:white;"></i></button> -->
						</div>
					</div>
				</div>
			</div>

			<div class="poll_logo">
				<img src="images/modal_img_logo.png" alt="img">
			</div>
		</div>
	</div>

