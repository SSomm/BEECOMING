<?php
	$con = mysqli_connect("localhost","root","","becoming");
	mysqli_set_charset($con,"utf8");

	$product_price = $_POST['price'];
	$product_name = $_POST['name'];
	$sale_percent = $_POST['sale_per'];
	$product_drice =$_POST['sale_cash'];
	$delivery = $_POST['deliveryinfo'];
	$detail_imgs = $_POST['details'];
	$drice = $_POST['drice'];
	// echo $img[1];

	// print_r($brandarray);


	// $count = count($product_drice);
	// // echo $count;
	// for($i = 0; $i < $count; $i++){
		$sql = "update shop_product set `product_name`='".$product_name."',`product_price`='".$product_price."',`sale_percent`='".$sale_percent."',`product_drice`='".$product_drice."', `product_delivery`='".$delivery."',`product_detail_img`= '".$detail_imgs."' where product_name='".$product_name."'";
		$result = mysqli_query($con,$sql);
		if($result){
			echo "success";
		}else{
			echo "error";
		}
	// }


	// var_dump($product_price);
	// echo $img;
?>