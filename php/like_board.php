<?php

	include("../dbcon.php");
	session_start();



	$board_num=$_POST['board_num'];
	$id=$_POST['id'];
	

	$sql2="select * from like_poll where click_id='".$id."' and like_cate='board' and cate_key=".$board_num;
	$result2=mysqli_query($con, $sql2);
	$row2=mysqli_fetch_array($result2);
	if($row2){
		

		$sql3="delete from like_poll where click_id='".$id."' and like_cate='board' and cate_key=".$board_num;
		$result3=mysqli_query($con, $sql3);

		$sql4="update board set like_num=like_num-1 where board_num=".$board_num;
		$result4=mysqli_query($con, $sql4);

		echo "like_already";

	}else{
		$sql1="insert into like_poll (click_id, like_cate, cate_key) values ('".$id."', 'board', ".$board_num.")";
		$result1=mysqli_query($con, $sql1);

		$sql="update board set like_num=like_num+1 where board_num=".$board_num;
		$result=mysqli_query($con, $sql);

		if($result){
			echo "success";
		}else{
			echo "error";
		}

	}	


?>