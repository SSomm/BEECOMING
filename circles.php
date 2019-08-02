

<div class="circle open_circle" style="display: none;">
	<img src="images/cuator_logo.png">
</div>
<div class="circle close_circle">
				<i class="fas fa-times"></i>
			</div>
<div class="circle curator_circle">
			<h3>대상 설정하여</h3>
			<h3 style="color: #f5ff00;">큐레이션</h3>
			<h3 style="color: #f5ff00;">서비스</h3>
			<h3>이용해보기</h3>

		</div>
		<div class="circle question_circle qu_circle_2">
			<i class="fas fa-question"></i>
		</div>
		<div class="question_radius">
			<p>간단한 선택질문을 통해<br> 선물아이템 정하기 팁을<br> 얻을 수 있습니다.</p>
			<div class="question_triangle">	
			</div>
		</div>
		<?php
			if(isset($_SESSION['user_id'])){
		?>
		<div class="circle message_circle login_message">
			<i class="fas fa-envelope"></i>
		</div>
		<?php
			}else{
		?>
		<div class="circle message_circle not_login_message">
			<i class="fas fa-envelope"></i>
		</div>
		<?php
			}
		?>
		
		<div class="circle top_circle">
			<i class="fas fa-angle-up"></i>
		</div>
		<div class="circle question_circle qu_circle_1">
			<i class="fas fa-question"></i>
		</div>
		<div class="question_radius2">
			<p>설정한 선물 대상과<br> 유사한 성향의<br> 큐레이터와<br> 대화할 수 있습니다.</p>
			<div class="question_triangle2">	
			</div>
		</div>

		<div class="target" style="display: none;">
			<div class="target_wrap">
				<div class="target_title">
					<p class="target_p">나의 타겟 설정 정보</p>
				</div>
				<div class="target_body">
					<ul>
						<li>
							<span class="circle target_circle">
								01
							</span>
							<span class="body_info">
								<span>성별 : </span>
								<span class="poll_gender">여성</span>
							</span>
							
						</li>
						<li>
							<span class="circle target_circle">
								02
							</span>
							<span class="body_info">
								<span>나이 : </span>
								<span class="poll_age">20대</span>
							</span>
							
						</li>
						<li>
							<span class="circle target_circle">
								03
							</span>
							<span class="body_info">
								<span>이벤트 : </span>
								<span class="poll_case">생일</span>
							</span>
							
						</li>
						<li>
							<span class="circle target_circle">
								04
							</span>
							<span class="body_info">
								<span>관계(나에게) : </span>
								<span class="poll_rel">친구</span>
							</span>
							
						</li>
						<li>
							<span class="circle target_circle">
								05
							</span>
							<span class="body_info">
								<span>취미 : </span>
								<span class="poll_hobby">음악듣기</span>
							</span>
							
						</li>
					</ul>
					<div class="target_btn">
						<button class="cancel_target">설정취소</button>
					</div>
				</div>
				
			</div>
		</div>