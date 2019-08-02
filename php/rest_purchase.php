<?php
	include("../dbcon.php");
	session_start();

	$num_array1 = $_POST['num_array1'];
	$pmnum_array1 = $_POST['pmnum_array1'];
	$purchasenum_array1 = $_POST['purchasenum_array1'];
	$id = $_SESSION['user_id'];

	// echo count($purchasenum_array1);
	$order_list=array();

	for($i=0;$i<count($num_array1);$i++){

		$sql="select * from purchase_record where purchase_num=".$purchasenum_array1[$i];
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_array($result);
		$price=number_format((int)$row['stack_money']);

		$sql1="select * from shop_product where product_num=".$row['product_num'];
		$result1=mysqli_query($con, $sql1);
		$row1=mysqli_fetch_array($result1);

		$thumbnail=explode(",",$row1['product_thumb']);
		$thumb="http://192.168.20.78/becoming0508/category_img/".$row1['category']."/".$thumbnail[0];

		$arrayMi = array(
			"product_thumb"=>$thumb,
			"product_name"=>$row1['product_name'],
			"product_brand"=>$row1['product_brand'],
			"product_price"=>$row1['product_price'],
			"product_money"=>$price,
			"product_num"=>$row1['product_num'],
			"pm_num"=>$row['pm_num'],
			"purchase_num"=>$row['purchase_num']

		);
		array_push($order_list,$arrayMi);
		// $i++;


	}
	
	$last_array =array("order"=>$order_list);

	echo json_encode($last_array);
	// var_dump($last_array);




?>