<?php

	include("../dbcon.php");
	session_start();

	$id=$_POST['id'];
	$pw=$_POST['pw'];


	$sql="select * from member where id='$id' && pw='$pw'";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);
	
	$sql2="select * from member where id='$id' && pw='$pw' && seller=1";
	$result2=mysqli_query($con, $sql2);
	$row2=mysqli_fetch_array($result2);

	if($row){

		if($row2){

			$_SESSION['user_id']=$id;
			$_SESSION['user_pw']=$pw;
			$_SESSION['seller']="1";
			$_SESSION['user_nickname']=$row['nickname'];
			$_SESSION['name']=$row['name'];
			echo "success";

		}else{

		$_SESSION['user_id']=$id;
		$_SESSION['user_pw']=$pw;
		$_SESSION['seller']="0";
		$_SESSION['user_nickname']=$row['nickname'];
		$_SESSION['name']=$row['name'];
		echo "success";

		}
		
	}else{
		echo "error";
	}
	





?>