<?php

	include("../dbcon.php");

	$sender_id=$_POST['sender_id'];


	$sql="select * from message where sender_id='".$sender_id."'";
	$result=mysqli_query($con, $sql);

	$message_array=array();
	$i=0;


	while($row=mysqli_fetch_array($result)){

		$datee = date_create($row[5]);
		$send_datemod=date_format($datee,"Y. m. d");

		$date2=date_create($row[6]);
		$get_datemod=date_format($date2, "Y. m. d");
		$arrayMi = array(
			"message_num"=>$row[0],
			"sender_id"=>$row[1],
			"receiver_id"=>$row[2],
			"message_title"=>$row[3],
			"message_body"=>$row[4],
			"send_date"=>$send_datemod,
			"get_date"=>$get_datemod,
			"confirm_flag"=>$row[7],
		);
		array_push($message_array,$arrayMi);
		$i++;

	}

	$sql1="select * from member where id='".$sender_id."'";
	$result1=mysqli_query($con, $sql1);

	$member_array=array();
	$j=0;
	
	while($row1=mysqli_fetch_array($result1)){

		$arrayMi1 = array(
			"mem_num"=>$row1[0],
			"id"=>$row1[1],
			"pw"=>$row1[2],
			"nickname"=>$row1[3],
			"email"=>$row1[4],
			"name1"=>$row1[5],
			"profile_img"=>$row1[6],
			"mypage_img"=>$row1[7],
			"hobby"=>$row1[8],
			"curator"=>$row1[9],
			"cash_point"=>$row1[10],
		);
		array_push($member_array,$arrayMi1);
		$i++;

	}



	$last_array=array("message"=>$message_array, "mem"=>$member_array);
	echo json_encode($last_array);


?>