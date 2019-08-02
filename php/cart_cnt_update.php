<?php
	
	include("../dbcon.php");

	$cart_num=$_POST['cart_pnum'];
	$cart_count=$_POST['count_ch'];

	// echo $cart_num;
	// echo $cart_count;
	$sql="update shop_cart set cart_sum=".$cart_count." where cart_p_num=".$cart_num;
	$result=mysqli_query($con, $sql);


	if($result){
		echo "success";
	}else{
		echo "error";
	}


?>