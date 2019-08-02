<?php

	include("../dbcon.php");
	session_start();

	$product_num=$_POST['num'];
	$pm_num=$_POST['pm_num'];




	// $sql="update shop_product set product_open=1 where product_num=".$product_num;
	// $result=mysqli_query($con, $sql);

	$sql1="update product_manage set product_flag=1 where pm_num=".$pm_num;
	$result1=mysqli_query($con, $sql1);


	// if($result){
		if($result1){
			echo "success";
		}else{
			echo "error1";
		}
	// }else{
	// 	echo "error2";
	// }
// ?>