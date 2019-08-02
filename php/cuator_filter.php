<?php

	include("../dbcon.php");
	session_start();



	$age=$_POST['age'];
	$hobby=$_POST['hobby'];


	$age1=explode("대",$age);
	$age=$age1[0];
	// echo $age;
	// $age="20";

	// echo $age;

	// $sql1="select * from curator where "

	$curator_array=array();
	$member_array = array();
	// $sql = "SELECT * FROM `member` where `curator` = 1 and hobby like '%".$hobby."%'";
	$sql = "SELECT * FROM `member` where `curator` = 1 limit 0,4";
	$result= mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){
		$cuatorMi = array(
			"mem_num"=>$row['mem_num'],
			"id1"=>$row['id'],
			"nickname"=>$row['nickname'],
			"email"=>$row['email'],
			"name1"=>$row['name'],
			"profile_img"=>$row['profile_img'],
			"hobby"=>$row['hobby']
		);
		array_push($curator_array,$cuatorMi);
		}
	
	$sql1="select * from private";
		$result1=mysqli_query($con,$sql1);
		// $row1=mysqli_fetch_array($result1);
	while($row1 = mysqli_fetch_array($result1)){
		$arrayMi = array(
			"num"=>$row1['num'],
			"user_id"=>$row1['user_id'],
			"birthday"=>$row1['birthday']
		);
		array_push($member_array,$arrayMi);
	}
	
	// $curator_array=array("a"=>"a","b"=>"b");
	// var_dump($curator_array);
	$last_array =array("curator"=>$curator_array,"member"=>$member_array);
	echo json_encode($last_array);

?>