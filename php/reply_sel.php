<?php

	include("../dbcon.php");
	session_start();
	$message_array = array();

	$num=$_POST['num'];
	// $num=11;
	$receiver_id=$_POST['receiver'];

	$sql3="update message set get_date=CURRENT_TIMESTAMP, confirm_flag=1 where message_num=".$num." and receiver_id='".$_SESSION['user_id']."'";
	$result3=mysqli_query($con, $sql3);

	$sql="select * from message where message_num=".$num;
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	$sql1="select * from member where id='".$row['receiver_id']."'";
	$result1=mysqli_query($con, $sql1);
	$row1=mysqli_fetch_array($result1);


	$sql2="select * from member where id='".$row['sender_id']."'";
	$result2=mysqli_query($con, $sql2);
	$row2=mysqli_fetch_array($result2);

	if($row[6]!=null){

		$get_date=date_create($row[6]);
		$get=date_format($get_date,"Y. m. d");
	}else{
		$get="미확인";
	}
	
	// echo $get;
	// echo $get_date;
	// echo date_format($get_date,"Y. m. d");

	$arrayMi = array(
			"message_num"=>$row[0],
			"sender_id"=>$row[1],
			"receiver_id"=>$row[2],
			"message_title"=>$row[3],
			"message_body"=>$row[4],
			"send_date"=>$row[5],
			"get_date"=>$get,
			"confirm_flag"=>$row[7],
			"sender_name"=>$row2['name'],
			"sender_email"=>$row2['email'],
			"sender_img"=>$row2['profile_img'],
			"receiver_img"=>$row1['profile_img'],
			"receiver_name"=>$row1['name'],
		);
		array_push($message_array,$arrayMi);

			$last_array =array("message"=>$message_array);

		echo json_encode($last_array);
		// print_r($arrayMi);

?>