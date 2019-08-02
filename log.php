<?php
	include("./dbcon.php");
	session_start();
	$id = $_SESSION['user_id'];
	// $id = "admin";

	$addr = $_SERVER['REMOTE_ADDR'];

	$Environment = $_SERVER['HTTP_USER_AGENT'];

	$view = $_SERVER['PHP_SELF'];
	$date = date("Y-m-d h:i:s");

	$sql = "INSERT INTO log_table(`log_date`,`os`,`ip`,`view_page`,`log_userid`) values('".$date."','".$Environment."','".$addr."','".$view."','".$id."')";
	$result = mysqli_query($con,$sql);
	if($result){
		// echo "success";
	}else{
		echo mysqli_error($con);
	}
?>