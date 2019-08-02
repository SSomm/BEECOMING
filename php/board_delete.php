<?php

	include("../dbcon.php");

	$board_num=$_POST['board_num'];

	$sql="delete from board where board_num=".$board_num;
	$result=mysqli_query($con, $sql);

	if($result){
		echo "success";
	}else{
		echo "error";
	}


?>