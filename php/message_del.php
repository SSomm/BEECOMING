<?php

	include("../dbcon.php");

	$msg_num=$_POST['msg_num'];

	$sql="delete from message where message_num=".$msg_num;
	$result=mysqli_query($con, $sql);

	if($result){
		echo "success";
	}else{
		echo "error";
	}




?>