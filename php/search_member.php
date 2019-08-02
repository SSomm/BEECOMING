<?php

	include("../dbcon.php");

	$find_user=$_POST['find_user'];

	$sql="select * from member where id like'%".$find_user."%' or name like'%".$find_user."%' or email like '%".$find_user."%' limit 0,4";
	$result=mysqli_query($con, $sql);

	$member_array=array();
	while($row = mysqli_fetch_array($result)){
	
		$arrayMi2 = array(
			"mem_num"=>$row[0],
			"id1"=>$row[1],
			"pw"=>$row[2],
			"nickname"=>$row[3],
			"email"=>$row[4],
			"name1"=>$row[5],
			"profile_img"=>$row[6],
			"mypage_img"=>$row[7],
			"hobby"=>$row[8],
			"curator"=>$row[9],
			"cash_point"=>$row[10]
		);
		array_push($member_array,$arrayMi2);
	}

	$last_array =array("member"=>$member_array);
	echo json_encode($last_array);
	// var_dump($last_array);
?>