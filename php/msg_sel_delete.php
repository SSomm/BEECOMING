<?php

	include("../dbcon.php");
	session_start();

	$data=json_decode(stripslashes($_POST['data']));
	$msg_array=array();
	$flag=0;
	
	foreach($data as $d){

		// echo $d;
		$sql="delete from message where message_num=".$d;
		$result=mysqli_query($con, $sql);

		if($result){
			$flag++;
		}
	}
	$c=count($data);	
	if($flag==$c-1){
		echo "success";

	}else{
		echo "error";
	}

?>