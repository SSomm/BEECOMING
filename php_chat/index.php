<?php 
session_start();
include("./dbcon.php");
include('./header.php');
?>
<title>php_chat기능</title>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<script src="js/chat.js"></script>
<style>
.modal-dialog {
    width: 400px;
    margin: 30px auto;	
}
</style>
<?php include('./container.php');?>
<div class="container">		
	<!-- <h1>Example: Build Live Chat System with Ajax, PHP & MySQL</h1>	 -->
	<br>		
	<?php if(isset($_SESSION['userid']) && $_SESSION['userid']) { ?> 	
		<div class="chat">	
			<div id="frame">		
				<div id="sidepanel">
					<div id="profile">
					<?php
					include ('./Chat.php');
					$chat = new Chat();
					$loggedUser = $chat->getUserDetails($_SESSION['userid']);
					echo '<div class="wrap">';
					$currentSession = '';
					foreach ($loggedUser as $user) {
						$currentSession = $user['current_session'];
						echo '<img id="profile-img" src="'.$user['profile_img'].'" class="online" alt="" />';
						echo  '<p>'.$user['name'].'</p>';
							echo '<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>';
							echo '<div id="status-options">';
							echo '<ul>';
								echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>온라인</p></li>';
								echo '<li id="status-away"><span class="status-circle"></span> <p>자리비움</p></li>';
								echo '<li id="status-busy"><span class="status-circle"></span> <p>다른용무</p></li>';
								echo '<li id="status-offline"><span class="status-circle"></span> <p>오프라인</p></li>';
							echo '</ul>';
							echo '</div>';
							echo '<div id="expanded">';			
							echo '<a href="logout.php">Logout</a>';
							echo '</div>';
					}
					echo '</div>';
					?>
					</div>
					<div id="search">
						<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
						<input type="text" placeholder="회원 검색 (아이디 혹은 이름으로 검색 가능)" />					
					</div> 
					<div id="contacts">	
					<?php
					echo '<ul>';
					$chatUsers = $chat->chatUsers($_SESSION['userid']);
					foreach ($chatUsers as $user) {
						$status = 'offline';						
						if($user['online']) {
							$status = 'online';
						}
						$activeUser = '';
						if($user['id'] == $currentSession) {
							$activeUser = "active";

						}

						echo '<li id="'.$user['id'].'" class="contact '.$activeUser.'" data-touserid="'.$user['id'].'" data-tousername="'.$user['name'].'">';
						echo '<div class="wrap">';
						echo '<span id="status_'.$user['id'].'" class="contact-status '.$status.'"></span>';
						echo '<img src="'.$user['profile_img'].'" alt="" />';
						echo '<div class="meta">';
						// echo $chat->getUnreadMessageCount($user['id'], $_SESSION['userid']);
						if($chat->getUnreadMessageCount($user['id'], $_SESSION['userid'])){
							echo '<p class="name">'.$user['name'].'<span id="unread_'.$user['id'].'" class="unread" style="color:white;">'.$chat->getUnreadMessageCount($user['id'], $_SESSION['userid']).'</span></p>';
						}else{
							echo '<p class="name">'.$user['name'].'</p>';
						}
						
						echo '<p class="preview"><span id="isTyping_'.$user['id'].'" class="isTyping"></span></p>';
						echo '</div>';
						echo '</div>';
						echo '</li>'; 
					}
					echo '</ul>';
					?>
					</div>
					<div id="bottom-bar">	
						<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Add contact</span></button>
						<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>					
					</div>
				</div>			
				<div class="content" id="content"> 
					<div class="contact-profile" id="userSection">	
					<?php
					$userDetails = $chat->getUserDetails($currentSession);
					foreach ($userDetails as $user) {										
						// echo '<img src="userpics/'.'" alt="" />';
							echo '<p>'.$user['name'].'</p>';
							echo '<div class="social-media">';
								echo '<i class="fa fa-facebook" aria-hidden="true"></i>';
								echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
								 echo '<i class="fa fa-instagram" aria-hidden="true"></i>';
							echo '</div>';
					}	
					?>						
					</div>
					<div class="messages" id="conversation">		
					<?php
					echo $chat->getUserChat($_SESSION['userid'], $currentSession);		
					
					?>
					</div>
					<div class="message-input" id="replySection">				
						<div class="message-input" id="replyContainer">
							<div class="wrap">
								<input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="메시지를 입력하세요." />
								<button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>	
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<br>
		<br>
		<strong><a href="login.php"><h3>Login To Access Chat System</h3></a></strong>		
	<?php } ?>
	<br>
	<br>	
	<div style="margin:50px 0px 0px 0px;">
		<!-- <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/build-live-chat-system-with-ajax-php-mysql/">Back to Tutorial</a>		 -->
	</div>	
</div>	
<?php include('./footer.php');?>