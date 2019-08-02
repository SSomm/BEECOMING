<?php
	include("../dbcon.php");
	session_start();
	$div = $_POST['div'];
	$keyward = $_POST['keyward'];
	$order_list=Array();
	$question_list=Array();
	$product_list=Array();
	$question_admin_list=Array();


	if($div == "order_list"){
		$sql="select * from purchase_record where seller_id='".$_SESSION['user_id']."'";
		$result=mysqli_query($con, $sql);	
		while($row = mysqli_fetch_array($result)){
			$date=date_create($row['purchase_date']);
			$datem=date_format($date, "Y. m. d.");	

			$sql1="select * from shop_product where product_num=".$row['product_num'];
			$result1=mysqli_query($con, $sql1);
			// while($row1=mysqli_fetch_array($result1)){
			$row1=mysqli_fetch_array($result1);

			$thumbs=explode(",",$row1['product_thumb']);
			$thumb_img="./category_img/".$row1['category']."/".$thumbs[0];

			$sql2="select * from member where id='".$row['user_id']."'";
			$result2=mysqli_query($con, $sql2);
			$row2=mysqli_fetch_array($result2);


			$array = array(
				"thumb_img"=>$thumb_img,
				"product_name"=>$row1['product_name'],
				"purchase_msg"=>$row['purchase_msg'],
				"purchase_quantity"=>$row['purchase_quantity'],
				"stack_money"=>number_format($row['stack_money']),
				"name1"=>$row2['name'],
				"user_id"=>$row['user_id'],
				"date"=>$datem
			);

			array_push($order_list,$array);

		}

		$seller_array = array("order"=>$order_list);
		echo json_encode($seller_array);



	}
?>