<?php

	include("../dbcon.php");
	session_start();

	$product_num=$_POST['product_num'];
	$pm_num=$_POST['pm_num'];
	$purchase_num=$_POST['purchase_num'];


	$sql="select * from purchase_record where purchase_num=".$purchase_num;
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	$sql1="select * from shop_product where product_num=".$product_num;
	$result1=mysqli_query($con, $sql1);
	$row1=mysqli_fetch_array($result1);

		$datee=date_create($row['purchase_date']);
		$date=date_format($datee, "Y-m-d");
		$price=number_format((int)$row['stack_money']);

		$thumb=explode(",",$row1[13]);
		$thumb_img="./category_img/".$row1[1]."/".$thumb[0];

		$review_array = array();

		$arrayMi = array(
			"product_num"=>$row1[0],
			"category"=>$row1[1],
			"sub_category"=>$row1[2],
			"product_name"=>$row1[3],
			"product_seller_id"=>$row1[4],
			"product_brand"=>$row1[5],
			"product_price"=>$row1[6],
			"sale_percent"=>$row1[7],
			"product_drice"=>$row1[8],
			"purchase_date"=>$date,
			"product_event"=>$row1[10],
			"product_open"=>$row1[11],
			"product_desc"=>$row1[12],
			"product_thumb"=>$thumb_img,
			"product_detail_img"=>$row1[14],
			"product_delivery"=>$row1[15],
			"product_refund"=>$row1[16],
			"product_exchange"=>$row1[17],
			"product_question"=>$row1[18],
			"product_sel_num"=>$row1[19],
			"product_review_num"=>$row1[20],
			"product_view_num"=>$row1[21],
			"product_money"=>$price,
			"pm_num"=>$row['pm_num'],
			"purchase_num"=>$row['purchase_num']	
		);
		array_push($review_array,$arrayMi);


$last_array =array("review"=>$review_array);
// var_dump($last_array);
echo json_encode($last_array);

?>