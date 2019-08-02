<?php
	include("../dbcon.php");
	session_start();


	$purchase_num=$_POST['purchase_num'];

	$sql="update purchase_record set purchase_stat=4 where purchase_num=".$purchase_num;
	$result=mysqli_query($con, $sql);


	if($result){
		echo "success";
	}else{
		echo "error";
	}


?>