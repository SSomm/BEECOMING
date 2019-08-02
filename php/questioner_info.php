<?php
	
	include("../dbcon.php");
	session_start();


	$qnum=$_POST['qnum'];


	$sql="select * from product_qna where product_qna_num=".$qnum;
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);


	$sql1="select * from member where id='".$row['questioner_id']."'";
	$result1=mysqli_query($con, $sql1);
	$row1=mysqli_fetch_array($result1);

	$questioner_info_array=array();

	$array = array(
			"mem_num"=>$row1['mem_num'],
			"id1"=>$row1['id'],
			"nickname"=>$row1['nickname'],
			"email"=>$row1['email'],
			"name1"=>$row1['name'],
			"profile_img"=>$row1['profile_img'],
			"mypage_img"=>$row1['mypage_img'],
			"hobby"=>$row1['hobby'],
			"curator"=>$row1['curator'],
			"seller"=>$row1['seller'],
		);
		array_push($questioner_info_array,$array);

		$result_array = array("questioner"=>$questioner_info_array);

		echo json_encode($result_array);



?>