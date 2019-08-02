<?php
	include("../dbcon.php");
	session_start();
	$id=$_SESSION['user_id'];
	// $id = "admin";
	$div = $_POST['div'];
	// $div = "all";
	// echo date("m");

	// echo date("m")-1;
	// echo date("Y")."-0".(date("m")-1)."-01";
	if($div == "all"){
		// echo "a";
		$purchase_array = array();
		$sql = "SELECT * FROM purchase_record where user_id = '".$id."' and (purchase_stat = 4 or purchase_stat = 5)";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			// echo $row['user_id'];

			$sql1 = "SELECT * FROM shop_product where product_num = ".$row['product_num'];
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$thexplode = explode(',', $row1['product_thumb']);



			$purchaseMi = array(
				"purchase_num"=>$row['purchase_num'],
				"user_id"=>$row['user_id'],
				"pm_num"=>$row['pm_num'],
				"product_name"=>$row1['product_name'],
				"product_brand"=>$row1['product_brand'],
				"product_price"=>$row1['product_price'],
				"thumb"=>$thexplode[0],
				"category"=>$row1['category']
			);
			array_push($purchase_array,$purchaseMi);
		}
	}else if($div == "now_all"){
		$start = date("Y")."-".date("m")."-01";
		$end = date("Y")."-".date("m")."-31";
		$purchase_array = array();
		$sql = "SELECT * FROM purchase_record where user_id = '".$id."' and (purchase_stat = 4 or purchase_stat = 5) and `purchase_date` >= '".$start."' and `purchase_date` <= '".$end."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			// echo $row['user_id'];

			$sql1 = "SELECT * FROM shop_product where product_num = ".$row['product_num'];
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$thexplode = explode(',', $row1['product_thumb']);
			$purchaseMi = array(
				"purchase_num"=>$row['purchase_num'],
				"user_id"=>$row['user_id'],
				"pm_num"=>$row['pm_num'],
				"product_name"=>$row1['product_name'],
				"product_brand"=>$row1['product_brand'],
				"product_price"=>$row1['product_price'],
				"thumb"=>$thexplode[0],
				"category"=>$row1['category']
			);
			array_push($purchase_array,$purchaseMi);
		}
	}else if($div == "first_all"){
		$start = date("Y")."-0".(date("m")-1)."-01";
		$end = date("Y")."-0".(date("m")-1)."-31";
		$purchase_array = array();
		$sql = "SELECT * FROM purchase_record where user_id = '".$id."' and (purchase_stat = 4 or purchase_stat = 5) and `purchase_date` >= '".$start."' and `purchase_date` <= '".$end."'";
		while($row = mysqli_fetch_array($result)){
			// echo $row['user_id'];

			$sql1 = "SELECT * FROM shop_product where product_num = ".$row['product_num'];
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$thexplode = explode(',', $row1['product_thumb']);
			$purchaseMi = array(
				"purchase_num"=>$row['purchase_num'],
				"user_id"=>$row['user_id'],
				"pm_num"=>$row['pm_num'],
				"product_name"=>$row1['product_name'],
				"product_brand"=>$row1['product_brand'],
				"product_price"=>$row1['product_price'],
				"thumb"=>$thexplode[0],
				"category"=>$row1['category']
			);
			array_push($purchase_array,$purchaseMi);
		}
	}else if($div == "second_all"){
		$start = date("Y")."-0".(date("m")-2)."-01";
		$end = date("Y")."-0".(date("m")-2)."-31";
		$purchase_array = array();
		$sql = "SELECT * FROM purchase_record where user_id = '".$id."' and (purchase_stat = 4 or purchase_stat = 5) and `purchase_date` >= '".$start."' and `purchase_date` <= '".$end."'";
		$result = mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result)){
			// echo $row['user_id'];

			$sql1 = "SELECT * FROM shop_product where product_num = ".$row['product_num'];
			$result1 = mysqli_query($con,$sql1);
			$row1 = mysqli_fetch_array($result1);
			$thexplode = explode(',', $row1['product_thumb']);
			$purchaseMi = array(
				"purchase_num"=>$row['purchase_num'],
				"user_id"=>$row['user_id'],
				"pm_num"=>$row['pm_num'],
				"product_name"=>$row1['product_name'],
				"product_brand"=>$row1['product_brand'],
				"product_price"=>$row1['product_price'],
				"thumb"=>$thexplode[0],
				"category"=>$row1['category']
			);
			array_push($purchase_array,$purchaseMi);
		}
	}
	$last_array =array("purchase"=>$purchase_array);
	echo json_encode($last_array);

?>