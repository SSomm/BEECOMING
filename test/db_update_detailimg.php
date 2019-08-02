<?php

$con = mysqli_connect("localhost","root","","becoming");
	   mysqli_set_charset($con,"utf8");

	$product_name = $_POST['product_name'];
	$details = $_POST['details'];
	// $detail_imgs = $_POST['details'];
	// echo $img[1];

	// print_r($brandarray);


	// $count = count($product_drice);
	// // echo $count;
	// for($i = 0; $i < $count; $i++){
		$sql = "update shop_product set `product_detail_img`='".$details."' where product_name='".$product_name."'";

		$result = mysqli_query($con,$sql);
		if($result){
			echo "success";
		}else{
			echo "error";
		}


?>