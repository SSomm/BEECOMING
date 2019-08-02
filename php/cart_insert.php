<?php
	
	include("../dbcon.php");
	session_start();


	$product_num=$_POST['cart_p'];
	$user_id=$_POST['cart_u'];
	// echo $user_id
	$product_option=$_POST['product_option'];
	$p_opt_detail1=$_POST['p_opt_detail1'];
	$p_opt_detail2=$_POST['p_opt_detail2'];
	$p_count=$_POST['p_count'];



	$sql1="select * from product_manage where product_num=".$product_num;
	$result1=mysqli_query($con, $sql1);
	$j=0;



	while($row1=mysqli_fetch_array($result1)){
		$j++;
	}

	if($j>1){
		// echo ;
		$double=true;
		$product_array=array();

	if(isset($product_option)){

		if(isset($p_opt_detail1)){
			if(isset($p_opt_detail2)){
					$sql6="select pm_num from product_manage where product_num=".$product_num." and product_option='".$product_option."' and p_opt_detail1='".$p_opt_detail1."' and p_opt_detail2='".$p_opt_detail2."'";
			}else{
				$sql6="select pm_num from product_manage where product_num=".$product_num." and product_option='".$product_option."' and p_opt_detail1='".$p_opt_detail1."'";
			}
		}else{
			$sql6="select pm_num from product_manage where product_num=".$product_num." and product_option='".$product_option."'";
		}

	}else{
		$sql6="select pm_num from product_manage where product_num=".$product_num;
	}
	$result6=mysqli_query($con,$sql6);
	$row6=mysqli_fetch_array($result6);



	

	$sql="insert into shop_cart (`user_id`, `product_num`, `pm_num`, `cart_sum`) values('".$user_id."','".$product_num."', ".$row6['pm_num'].", ".$p_count.")";
	$result=mysqli_query($con, $sql);


	$sql2="select * from shop_cart where user_id='".$user_id."' order by cart_p_num desc";
	$result2=mysqli_query($con, $sql2);

	while($row2=mysqli_fetch_array($result2)){

			$sql3="select * from shop_product where product_num=".$row2[2];
			$result3=mysqli_query($con,$sql3);
			$row3=mysqli_fetch_array($result3);

			$thumb=explode(",",$row3[13]);

			$thumb_img="http://192.168.20.78/becoming0508/category_img/".$row3[1]."/".$thumb[0];


			$sql7="select count(*) from shop_cart where user_id='".$_SESSION['user_id']."'";
			$result7=mysqli_query($con, $sql7);
			$row7=mysqli_fetch_array($result7);
			// echo $thumb_img;
		// $str=$row[2];
		// preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
		// if($matches[1]==null){
		// 	$matches[1]=$row[12];
		// }

		// $ck_body=$row[2];
		// $body_text=trim(strip_tags($ck_body[i]));

		$arrayMi = array(
			"product_num"=>$row3[0],
			"category"=>$row3[1],
			"sub_category"=>$row3[2],
			"product_name"=>$row3[3],
			"product_seller_id"=>$row3[4],
			"product_brand"=>$row3[5],
			"product_price"=>$row3[6],
			"sale_percent"=>$row3[7],
			"product_drice"=>$row3[8],
			"product_app_date"=>$row3[9],
			"product_event"=>$row3[10],
			"product_open"=>$row3[11],
			"product_thumb"=>$thumb_img,
			"product_detail_img"=>$row3[14],
			"product_delivery"=>$row3[15],
			"product_refund"=>$row3[16],
			"product_exchange"=>$row3[17],
			"product_question"=>$row3[18],
			"product_sel_num"=>$row3[19],
			"product_review_num"=>$row3[20],
			"product_view_num"=>$row3[21],
			"user_id"=>$_SESSION['user_id'],
			"count"=>$row7['cnt']
		);
		array_push($product_array,$arrayMi);					// alert(response);

		$i++;
	}


	}else{
		$double=false;


		$sql6="select pm_num from product_manage where product_num=".$product_num;
		$result6=mysqli_query($con,$sql6);
		$row6=mysqli_fetch_array($result6);


	$sql="insert into shop_cart (`user_id`, `product_num`, `pm_num`, `cart_sum`) values('".$user_id."','".$product_num."', ".$row6['pm_num'].", 1)";
	$result=mysqli_query($con, $sql);


	$sql2="select * from shop_cart where user_id='".$user_id."' order by cart_p_num desc";
	$result2=mysqli_query($con, $sql2);



	$product_array=array();

	while($row2=mysqli_fetch_array($result2)){

			$sql3="select * from shop_product where product_num=".$row2[2];
			$result3=mysqli_query($con,$sql3);
			$row3=mysqli_fetch_array($result3);

			$thumb=explode(",",$row3[13]);

			$thumb_img="./category_img/".$row3[1]."/".$thumb[0];
			// echo $thumb_img;
		// $str=$row[2];
		// preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
		// if($matches[1]==null){
		// 	$matches[1]=$row[12];
		// }

			$sql7="select count(*) from shop_cart where user_id='".$_SESSION['user_id']."'";
			$result7=mysqli_query($con, $sql7);
			$row7=mysqli_fetch_array($result7);

		// $ck_body=$row[2];
		// $body_text=trim(strip_tags($ck_body[i]));

		$arrayMi = array(
			"product_num"=>$row3[0],
			"category"=>$row3[1],
			"sub_category"=>$row3[2],
			"product_name"=>$row3[3],
			"product_seller_id"=>$row3[4],
			"product_brand"=>$row3[5],
			"product_price"=>$row3[6],
			"sale_percent"=>$row3[7],
			"product_drice"=>$row3[8],
			"product_app_date"=>$row3[9],
			"product_event"=>$row3[10],
			"product_open"=>$row3[11],
			"product_thumb"=>$thumb_img,
			"product_detail_img"=>$row3[14],
			"product_delivery"=>$row3[15],
			"product_refund"=>$row3[16],
			"product_exchange"=>$row3[17],
			"product_question"=>$row3[18],
			"product_sel_num"=>$row3[19],
			"product_review_num"=>$row3[20],
			"product_view_num"=>$row3[21],
			"user_id"=>$_SESSION['user_id'],
			"count"=>$row7['cnt']
		);
		array_push($product_array,$arrayMi);					// alert(response);

		$i++;
	}
}

	$last_array =array("shopping"=>$product_array,"double"=>$double);

	echo json_encode($last_array);






	// if($result){
	// 	echo "success";
	// }else{
	// 	echo "error";
	// }
	
?>