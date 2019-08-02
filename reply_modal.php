<div class="reply_modal" style="display: none;">
	<div class="reply_modal_wrap">
		<div class="reply_modal_left">
			<div class="repy_modal_left_top">
				<img src="images/cuator_logo.png" alt="img">
			</div>
			<?php
						$sql100="select * from member where id='".$_SESSION['user_id']."'";
						$result100=mysqli_query($con, $sql100);
						$row100=mysqli_fetch_array($result100);
					?>
			<div class="reply_modal_left_body">
				<div class="reply_sender_div">
					<div class="reply_profile">
						<div class="circle reply_modal_circle">
							<div class="circle reply_modal_in_circle">
								<img src="<?php echo$row100['profile_img'];?>" alt="img">
							</div>
						</div>
					</div>
					<div class="reply_pp">
						<p>발신이</p>
					</div>					
					<input type="text" class="reply_input sender_input" placeholder="<?php echo$row100['name']."(".$row100['id'].")";?>" readonly style="background-color: #eee;">
				</div>
				<div class="reply_pyer_div">
					<div class="reply_profile">
						<div class="circle reply_modal_circle">

							<div class="circle reply_modal_in_circle getterimg">
								<img src="http://192.168.20.78/becoming0508/profile_img/basic.jpg" alt="img">
							</div>

						</div>
					</div>
					<div class="reply_pp">
						<p>수신이</p>
					</div>
					<input type="text" class="reply_input payer_input" placeholder="아이디 입력 혹은 검색하여 자동입력">
					<button class="reply_search">검색</button>
				</div>
				<div class="reply_title_div">
					<div class="reply_title_div_left">
						<p>쪽지제목</p>
					</div>
					<input type="text" class="reply_input title_input">
				</div>
				<div class="reply_bodytext_div">
					<textarea class="reply_bodytext_main"></textarea>
					<div class="legtn_div">
						<span>( </span><span class="legtn_coun">0 </span><span>/ 255자)</span>
					</div>
				</div>
				<div class="reply_buttons">
					<button class="reply_reset">재작성</button>
					<button class="reply_canel">작성취소</button>
					<button class="reply_success">작성완료</button>
				</div>
				<div class="circle reply_close_circle">
					<i class="fas fa-times"></i>
				</div>
			</div>
		</div>
		<div class="reply_modal_right animated">
			<div class="modal_reply_right_wrap">
				<div class="modal_reply_right_title">
					<p>회원검색</p>
				</div>
				<div class="modal_reply_search">
					<input type="text" class="reply_search_user" placeholder="(이름, 아이디, 이메일로 검색 가능합니다.)">
					<i class="fas fa-search reply_search_icon"></i>
				</div>
				<div class="reply_items">
			<!-- 		<div class="reply_node">
						<div class="node_porfile">
							<div class="circle node_porfile_circle">
								<div class="circle node_in_circle">
									<img src="images/cu1.png" alt="img">
								</div>
							</div>
						</div>
						<div class="node_info">
							<p class="id_or_name">김연아(admin)</p>
							<p class="reply_email">admin@gmail.com</p>
						</div>
						<div class="node_check">
							<div class="circle checkcircle fail_check">
								<i class="fas fa-check"></i>
							</div> -->
							<!-- <div class="circle checkcircle success_check">
								<i class="fas fa-check"></i>
							</div> -->
							
					<!-- 	</div>
					</div> -->
					
						<!-- <div class="circle checkcircle success_check">
								<i class="fas fa-check"></i>
							</div> -->
						<button class="reply_comp_btn">선택완료</button>
				</div>

				<div class="reply_close_div">
					<button class="reply_close_btn"><i class="fas fa-long-arrow-alt-left"></i> 닫기</button>

				</div>
			</div>
		</div>
	</div>

</div>