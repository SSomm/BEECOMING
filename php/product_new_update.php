<?php

	include("../dbcon.php");
	session_start();

	// $product_num=
	$product_name=$_POST['p_name'];
	$product_category=$_POST['p_cate'];
	$product_detail_cate=$_POST['p_detailcate'];
	$product_brand=$_POST['p_brand'];
	$product_price=$_POST['p_price']."원";
	$sale_percent=$_POST['s_percent']."%";
	$product_drice=$_POST['p_drice']."원";
	$product_desc=$_POST['p_desc'];
	$product_thumb=$_POST['thumb'];
	$product_detail_img=$_POST['detail'];
	$product_delivery=$_POST['p_delivery'];
	$product_refund=$_POST['p_refund'];
	$product_exchange=$_POST['p_ex'];
	$id=$_SESSION['user_id'];
	$pm_num=$_POST['pm_num'];


	$product_num = $_POST['num'];

	// $sql="insert into shop_product (category, sub_category, product_name, product_brand, product_price, sale_percent, product_drice, product_desc, product_delivery, product_refund, product_exchange,product_thumb, product_detail_img, product_seller_id) values('".$product_category."','".$product_detail_cate."','".$product_name."', '".$product_brand."','".$product_price."', '".$sale_percent."','".$product_drice."','".$product_desc."', '".$product_delivery."' , '".$product_refund."', '".$product_exchange."','".$product_thumb."','".$product_detail_img."', '".$id."')";

	$sql = "update shop_product set category = '".$product_category."', sub_category = '".$product_detail_cate."', product_name = '".$product_name."', product_brand = '".$product_brand."', product_price = '".$product_price."', sale_percent = '".$sale_percent."', product_drice = '".$product_drice."', product_desc = '".$product_desc."' , product_refund = '".$product_refund."', product_exchange = '".$product_exchange."', product_seller_id = '".$id."' where product_num = ".$product_num;
	$result=mysqli_query($con, $sql);

	$sql1="update product_manage set product_category='".$product_category."', product_name='".$product_name."', product_brand='".$product_brand."' where pm_num=".$pm_num;
	$result1=mysqli_query($con, $sql1);


	
	if($result){
		if($result1){
			echo $product_num;
		}else{
			echo ("Error2 description: " . mysqli_error($con));
		}
		// $sql1="select * from shop_product order by product_num desc limit 1";
		// $result1=mysqli_query($con, $sql1);
		// $row1=mysqli_fetch_array($result1);
		// $num=$row1['product_num'];
		// echo $product_num;
	}else{
		echo("Error1 description: " . mysqli_error($con));
	}

?>