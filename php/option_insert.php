<?php

	include("../dbcon.php");
	session_start();


	$num=$_POST['response'];
	$product_option=$_POST['product_option'];
	$product_detail1=$_POST['product_detail1'];
	$product_detail2=$_POST['product_detail2'];
	$product_quantity=$_POST['product_quantity'];


	$count=count($product_option);

	// echo $num;
	// var_dump($product_option);
	// $i=0;
	// $option_array=array();
	$option_flag=0;

	$sql="select * from shop_product where product_num=".$num;
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	if($product_option){
		for($i = 0; $i < $count; $i++){
			$sql2="insert into product_manage (product_num, product_category, product_name, product_brand, product_option, p_opt_detail1, p_opt_detail2, product_quantity) values(".$row['product_num'].", '".$row['category']."', '".$row['product_name']."','".$row['product_brand']."', '".$product_option[$i]."', '".$product_detail1[$i]."', '".$product_detail2[$i]."', ".(int)$product_quantity[$i].")";
				$result2=mysqli_query($con, $sql2);

		}
		
	}else{
		// for($i = 0; $i < $count; $i++){
			$sql2="insert into product_manage (product_num, product_category, product_name, product_brand,  product_quantity) values(".$row['product_num'].", '".$row['category']."', '".$row['product_name']."','".$row['product_brand']."', ".(int)$product_quantity[0].")";
				$result2=mysqli_query($con, $sql2);
		// }
	}
	
	if($result){

		if($result2){

			echo "success";
		}else{
			echo "error_result2";
		}
		
	}else{
		echo "error_result";
	}





?>