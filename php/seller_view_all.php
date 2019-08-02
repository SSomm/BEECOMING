<?php
	include("../dbcon.php");
	session_start();
	$div = $_POST['div'];
	// $div = order_list;


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



	}else if($div=="question_list"){
		$sql6="select * from shop_product where product_seller_id='".$_SESSION['user_id']."'";
		$result6=mysqli_query($con, $sql6);
		while($row6=mysqli_fetch_array($result6)){
			$thumbb=explode(",",$row6['product_thumb']);
			$thumba="./category_img/".$row6['category']."/".$thumbb[0];
			
			$sql7="select * from product_qna where product_num=".$row6['product_num'];
			$result7=mysqli_query($con, $sql7);
				
			while($row7=mysqli_fetch_array($result7)){


				$array2 = array(
				"thumb_img"=>$thumba,
				"product_name"=>$row6['product_name'],
				"question_cate"=>$row7['question_cate'],
				"question_body"=>$row7['question_body'],
				"questioner_id"=>$row7['questioner_id'],
				"answer_com"=>$row7['answer_com']
				// "date"=>$datem,
			);

				array_push($question_list,$array2);
		}
	}
		$seller_array = array("question"=>$question_list);
		echo json_encode($seller_array);


	}else if($div=="product_list"){
		$sql15="select count(*) as cnt from product_manage where product_brand='".$_SESSION['name']."' and  product_quantity=0";
		$result15=mysqli_query($con, $sql15);
		$row15=mysqli_fetch_array($result15);
		$i=0;
		$sql9="select * from shop_product where product_seller_id='".$_SESSION['user_id']."' limit 0,4";
		$result9=mysqli_query($con, $sql9);


		while($row9=mysqli_fetch_array($result9)){
				$thb=explode(",",$row9['product_thumb']);
				$tha="./category_img/".$row9['category']."/".$thb[0];

			$sql10="select * from product_manage where product_num=".$row9['product_num'];
			$result10=mysqli_query($con, $sql10);
		

			while($row10=mysqli_fetch_array($result10)){
				if($row9['product_num']==$row10['product_num']){



				$array3 = array(
				"total_cnt"=>$row15['cnt'],
				"product_name"=>$row9['product_name'],
				"product_thumb"=>$tha,
				"question_body"=>$row7['product_name'],
				"product_option"=>$row10['product_option'],
				"p_opt_detail1"=>$row10['p_opt_detail1'],
				"product_price"=> $row9['product_price'],
				"sale_percent"=>$row9['sale_percent'],
				"product_drice"=>$row9['product_drice'],
				"product_quantity"=>$row10['product_quantity'],
				"product_num"=>$row10['product_num'],
				"product_flag"=>$row10['product_flag'],
				"pm_num"=>$row10['pm_num'],
				// $i++;
				// "date"=>$datem,
			);

				array_push($product_list,$array3);
				}
			}
		}

		$seller_array = array("product"=>$product_list);
		echo json_encode($seller_array);

	}else if($div=="question_admin_list"){
		$sql14="select * from message where sender_id='".$_SESSION['user_id']."'";
		$result14=mysqli_query($con, $sql14);
		while($row14=mysqli_fetch_array($result14)){
			$msg_date=date_create($row14['send_date']);
			$msg_datee=date_format($msg_date, "Y. m. d");

				$array4 = array(
				"message_title"=>$row14['message_title'],
				"date"=>$msg_datee,
				// "product_thumb"=>$msg_datee,
				"confirm_flag"=>$row14['confirm_flag'],
			);

				array_push($question_admin_list,$array4);
		}
		$seller_array = array("question_admin"=>$question_admin_list);

		echo json_encode($seller_array);
	}

		

?>