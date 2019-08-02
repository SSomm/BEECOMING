<?php

	include("../dbcon.php");
	session_start();


	$com_num=$_POST['com_num'];

	$sql="delete from comment where comment_num=".$com_num;
	$result=mysqli_query($con, $sql);


	if($result){
		echo "success";
	}else{
		echo "error";
	}



?>