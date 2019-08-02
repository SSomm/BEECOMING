<?php

	include("../dbcon.php");

	$id=$_POST['receiver'];

	$sql="select * from member where id='".$id."'";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	$mem=array();

	if($row){
		$arrayMi = array(
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
			"cash_point"=>$row[10],
		);
		array_push($mem,$arrayMi);

			$last_array =array("member"=>$mem);

		echo json_encode($last_array);
	}



?>