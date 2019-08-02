<?php
	$con = mysqli_connect("localhost","root","","becoming");
	mysqli_set_charset($con,"utf8");

	$img = $_POST['imgarray'];
	$a = $_POST['a'];
	$p = $_POST['price'];
	$drice =$_POST['drice'];
	$sale = $_POST['sale'];
	$brandarray = $_POST['brandarray'];
	// echo $img[1];

	// print_r($brandarray);


	$count = count($img);
	// // echo $count;
	for($i = 0; $i < $count; $i++){
		$sql = "INSERT INTO shop_product(`product_name`,`category`,`product_price`,`product_thumb`,`product_brand`,`sale_percent`,`product_drice`) values ('$a[$i]','여성향수', '$p[$i]','$img[$i]','$brandarray[$i]','$sale[$i]','$drice[$i]')";
		$result = mysqli_query($con,$sql);
		if($result){
			echo "success";
		}else{
			echo "error";
		}
	}


	// var_dump($img);
	// echo $img;
?>