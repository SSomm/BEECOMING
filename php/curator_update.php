<?php

	include("../dbcon.php");
	session_start();

	$id=$_SESSION['user_id'];
	$title=$_POST['title'];
	$tags=$_POST['tags'];
	$count_pu=$_POST['count_pu'];
	$success_pu=$_POST['success_pu'];
	$point_pu=$_POST['point_pu'];


	$sql="update curator set page_title='$title', expert_hash='$tags', count_pub=$count_pu, success_pub=$success_pu, point_pub=$point_pu where user_id='".$id."'";
	$result=mysqli_query($con, $sql);

	if($result){
		echo "success";
	}else{
		echo "error";
	}

?>