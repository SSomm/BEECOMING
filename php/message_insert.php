<?php
	include("../dbcon.php");


	$sender=$_POST['sendermod'];
	$receiver=$_POST['receivermod'];
	$message_title=$_POST['messagetitle'];
	$message_body=$_POST['messagebody'];
	$send_date=date("Y-m-d H:i:s");

	$sql1="select * from member where id='".$receiver."'";
	$result1=mysqli_query($con, $sql1);
	$row1=mysqli_fetch_array($result1);

	if($row1){
			
			$sql="insert into message (sender_id, receiver_id, message_title, message_body, send_date) values('".$sender."','".$receiver."','".$message_title."','".$message_body."','".$send_date."')";
			$result=mysqli_query($con, $sql);
				if($result){
					echo "success";
				}else{
					echo "error";
				}
	}else{
		echo "receiver_not_exist";
	}





	
?>