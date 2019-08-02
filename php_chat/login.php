<?php 
SESSION_START();
include('./header.php');
include("./dbcon.php");
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);	
	if(!empty($user)) {
		$_SESSION['username'] = $user[0]['name'];
		$_SESSION['userid'] = $user[0]['id'];
		$chat->updateUserOnline($user[0]['id'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['id']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location:index.php");
		// var_dump($user);
	} else {
		$loginError = "Invalid username or password!";
	}
}

?>
<title>php_chat_Test</title>
<?php include('./container.php');?>
<script type="text/javascript" src="./js/chat.js"></script>
<div class="container">		
	<h2>실시간 채팅으로 큐레이션 서비스 이용하기</h1>		
	<div class="row">
		<div class="col-sm-4">
			<h4>로그인 하기</h4>		
			<form method="post">
				<div class="form-group">
				<?php if ($loginError ) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="username">User:</label>
					<input type="username" class="form-control" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pwd" required>
				</div>  
				<button type="submit" name="login" class="btn btn-info">Login</button>
			</form>
			<br>
			<p>테스트용 & password</p>
			<p><b>User</b> : adam<br><b>Password</b> : 123</p>
			<p><b>User</b> : rose<br><b>Password</b> : 123</p>
			<p><b>User</b> : smith<br><b>Password</b>: 123</p>
			<p><b>User</b> : merry<br><b>Password</b>: 123</p>
		</div>
		
	</div>
</div>	
<?php include('./footer.php');?>






