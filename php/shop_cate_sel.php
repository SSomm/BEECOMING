<?php
	include("../dbcon.php");
	session_start();


	$cate=$_POST['cate'];
	// $cate="clothes";

	if($cate=="all"){

		$sql="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc";
		$result=mysqli_query($con, $sql);

		$sql2="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc limit 0,5 ";
		$result2=mysqli_query($con, $sql2);


	}else{

		$sql="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.category='".$cate."' and shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc";
		$result=mysqli_query($con, $sql);

		$sql2="SELECT * FROM shop_product JOIN product_manage ON shop_product.product_num=product_manage.product_num where shop_product.category='".$cate."' and shop_product.product_open=1 and product_manage.product_flag=1 group by shop_product.product_num order by shop_product.product_sel_num+shop_product.product_view_num desc limit 0,5";
		$result2=mysqli_query($con, $sql2);
	}

	$product_array=array();
	$rank_array=array();

	while($row=mysqli_fetch_array($result)){
		$thumb=explode(",",$row[13]);

		$thumb_img="./category_img/".$row[1]."/".$thumb[0];
		// $str=$row[2];
		// preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
		// if($matches[1]==null){
		// 	$matches[1]=$row[12];
		// }

		// $ck_body=$row[2];
		// $body_text=trim(strip_tags($ck_body[i]));

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
			"user_id"=>$_SESSION['user_id'],
		);
		array_push($product_array,$arrayMi);
		$i++;
	}

	while($row2=mysqli_fetch_array($result2)){

		$thumbs=explode(",",$row2[13]);

		$thumb_imgs="./category_img/".$row2[1]."/".$thumbs[0];
		// $str=$row[2];
		// preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
		// if($matches[1]==null){
		// 	$matches[1]=$row[12];
		// }

		// $ck_body=$row[2];
		// $body_text=trim(strip_tags($ck_body[i]));

		$arrayMi2 = array(
			"product_num"=>$row2[0],
			"category"=>$row2[1],
			"sub_category"=>$row2[2],
			"product_name"=>$row2[3],
			"product_seller_id"=>$row2[4],
			"product_brand"=>$row2[5],
			"product_price"=>$row2[6],
			"sale_percent"=>$row2[7],
			"product_drice"=>$row2[8],
			"product_app_date"=>$row2[9],
			"product_event"=>$row2[10],
			"product_open"=>$row2[11],
			"product_desc"=>$row2[12],
			"product_thumb"=>$thumb_imgs,
			"product_detail_img"=>$row2[14],
			"product_delivery"=>$row2[15],
			"product_refund"=>$row2[16],
			"product_exchange"=>$row2[17],
			"product_question"=>$row2[18],
			"product_sel_num"=>$row2[19],
			"product_review_num"=>$row2[20],
			"product_view_num"=>$row2[21],
			"user_id"=>$_SESSION['user_id'],
		
		);
		array_push($rank_array,$arrayMi2);
		$i++;
	}


$last_array =array("rank"=>$rank_array,"shopping"=>$product_array);

	echo json_encode($last_array);
// var_dump($last_array);



?>