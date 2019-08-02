<?php

	include("../dbcon.php");
	session_start();



	$comment_num=$_POST['comment_num'];
	$id=$_POST['id'];
	

	$sql2="select * from alert_poll where click_id='".$id."' and alarm_cate='comment' and cate_key=".$comment_num;
	$result2=mysqli_query($con, $sql2);
	$row2=mysqli_fetch_array($result2);
	if($row2){
		$sql3="delete from alert_poll where click_id='".$id."' and alarm_cate='comment' and cate_key=".$comment_num;
		$result3=mysqli_query($con, $sql3);

		$sql4="update comment set comment_siren=comment_siren-1 where comment_num=".$comment_num;
		$result4=mysqli_query($con, $sql4);

		echo "alert_already";

	}else{
		$sql1="insert into alert_poll (click_id, alarm_cate, cate_key) values ('".$id."', 'comment', ".$comment_num.")";
		$result1=mysqli_query($con, $sql1);

		$sql="update comment set comment_siren=comment_siren+1 where comment_num=".$comment_num;
		$result=mysqli_query($con, $sql);

		if($result1){
			echo "success";
		}else{
			echo "error";
		}

	}	


?>