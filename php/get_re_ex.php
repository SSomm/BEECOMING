<?php
	include("../dbcon.php");
	session_start();

	$div = $_POST['div'];

	if($div == "exchange"){
	$list_array = array();
	$sql = "SELECT * FROM purchase_exchange where seller_id = '".$_SESSION['user_id']."'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){
		

		$sql1 = "select * from shop_product where product_num = ".$row['product_num'];
		$result1 = mysqli_query($con,$sql1);
		$row1 = mysqli_fetch_array($result1);

		$sql2 = "select * from purchase_record where purchase_num = ".$row['purchase_num'];
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_array($result2);

		$date=date_create($row2['purchase_date']);
		$datem=date_format($date, "Y. m. d.");

		$sql3 = "select * from member where id = '".$row2['userid']."'";
		$result3 = mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_array($result3);


		$thumbs=explode(",",$row1['product_thumb']);
		$thumb_img="./category_img/".$row1['category']."/".$thumbs[0];
		$$arrayMi = array(
			"thumbs"=>$thumb_img,
			"re_ex_title"=>$row['ex_title'],
			"re_ex_bodytext"=>$row['ex_body'],
			"re_ex_count"=>$row2['purchase_quantity'],
			"re_ex_price"=>$row['product_price'],
			"re_ex_name"=>$row3['name'],
			"re_ex_id"=>$row3['user_id'],
			"re_ex_date"=>$date
		);
		array_push($list_array,$arrayMi);
		}
	}else if($div == "refund"){
		$list_array = array();
	$sql = "SELECT * FROM purchase_refund where seller_id = '".$_SESSION['user_id']."'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){
		

		$sql1 = "select * from shop_product where product_num = ".$row['product_num'];
		$result1 = mysqli_query($con,$sql1);
		$row1 = mysqli_fetch_array($result1);

		$sql2 = "select * from purchase_record where purchase_num = ".$row['purchase_num'];
		$result2 = mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_array($result2);

		$date=date_create($row2['purchase_date']);
		$datem=date_format($date, "Y. m. d.");
		
		$sql3 = "select * from member where id = '".$row2['userid']."'";
		$result3 = mysqli_query($con,$sql3);
		$row3 = mysqli_fetch_array($result3);


		$thumbs=explode(",",$row1['product_thumb']);
		$thumb_img="./category_img/".$row1['category']."/".$thumbs[0];
		$$arrayMi = array(
			"thumbs"=>$thumb_img,
			"re_ex_title"=>$row['ex_title'],
			"re_ex_bodytext"=>$row['ex_body'],
			"re_ex_count"=>$row2['purchase_quantity'],
			"re_ex_price"=>$row['product_price'],
			"re_ex_name"=>$row3['name'],
			"re_ex_id"=>$row3['user_id'],
			"re_ex_date"=>$date
		);
		array_push($list_array,$arrayMi);
		}
	}else{

	}
	$last_array =array("list"=>$list_array);
	echo json_encode($last_array);
?>