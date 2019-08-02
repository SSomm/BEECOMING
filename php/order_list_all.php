<?php

	include("../dbcon.php");
	session_start();

	$purchase_date=$_POST['response'];

	$sql1="select * from purchase_record where purchase_date='".$purchase_date."' and purchase_stat = 0 ";
	$result1=mysqli_query($con, $sql1);

	$list_array = array();

	while($row1=mysqli_fetch_array($result1)){
		$price=number_format((int)$row1['stack_money']);
		$sql="select * from shop_product where product_num=".$row1['product_num'];
		$result=mysqli_query($con, $sql);

		while($row=mysqli_fetch_array($result)){
		$thumb=explode(",",$row[13]);

		$thumb_img="./category_img/".$row[1]."/".$thumb[0];
		$arrayMi = array(
			"product_num"=>$row[0],
			"category"=>$row[1],
			"sub_category"=>$row[2],
			"product_name"=>$row[3],
			"product_seller_id"=>$row[4],
			"product_brand"=>$row[5],
			"product_price"=>$row[6],
			"sale_percent"=>$row[7],
			"product_drice"=>$row[8],
			"product_app_date"=>$row[9],
			"product_event"=>$row[10],
			"product_open"=>$row[11],
			"product_desc"=>$row[12],
			"product_thumb"=>$thumb_img,
			"product_detail_img"=>$row[14],
			"product_delivery"=>$row[15],
			"product_refund"=>$row[16],
			"product_exchange"=>$row[17],
			"product_question"=>$row[18],
			"product_sel_num"=>$row[19],
			"product_review_num"=>$row[20],
			"product_view_num"=>$row[21],
			"product_money"=>$price,
			"pm_num"=>$row1['pm_num'],
			"purchase_num"=>$row1['purchase_num']	
		);
		array_push($list_array,$arrayMi);

}

	}
	

$last_array =array("list"=>$list_array);
// var_dump($last_array);
echo json_encode($last_array);

?>