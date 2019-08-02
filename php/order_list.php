<?php

	include("../dbcon.php");
	session_start();

	$num=$_POST['product_num'];

	$sql="select * from shop_product where product_num=".$num;
	$result=mysqli_query($con, $sql);

	$list_array = array();

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
		);
		array_push($list_array,$arrayMi);

}

$last_array =array("list"=>$list_array);

echo json_encode($last_array);

?>