<?php
	include("../dbcon.php");
	session_start();	
	$keyward = $_POST['keyward'];
	$div = $_POST['div'];


	if($div == "shop_more"){
		$sql = "SELECT * FROM shop_product where sub_category like '%".$keyward."%' or product_name like '%".$keyward."%' or product_brand like '".$keyward."'";
		$result = mysqli_query($con,$sql);
	$search_array = array();
	while($row = mysqli_fetch_array($result)){
		$array = array(
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
			"product_thumb"=>$row[13],
			"product_detail_img"=>$row[14],
			"product_delivery"=>$row[15],
			"product_refund"=>$row[16],
			"product_exchange"=>$row[17],
			"product_question"=>$row[18],
			"product_sel_num"=>$row[19],
			"product_review_num"=>$row[20],
			"product_view_num"=>$row[21],
		);
		array_push($search_array,$array);
	}	
	
	}else if($div == "cuator_more"){
		$sql = "SELECT * FROM curator where expert_hash like '%".$keyward."%' or user_id like '%".$keyward."%'";
		$result = mysqli_query($con,$sql);
		$search_array = array();
		while($row = mysqli_fetch_array($result)){
			$sql2 = "SELECT profile_img from member where id = '".$row['user_id']."'";
			$result2 = mysqli_query($con,$sql2);
			$row2 = mysqli_fetch_array($result2);


			$array = array(
				"curator_num"=>$row[0],
				"user_id"=>$row[1],
				"page_title"=>$row[2],
				"service_count"=>$row[3],
				"service_pointavg"=>$row[4],
				"service_success"=>$row[5],
				"service_num"=>$row[6],
				"cupage_img"=>$row[7],
				"expert_hash"=>$row[8],
				"count_pub"=>$row[9],
				"success_pub"=>$row[10],
				"point_pub"=>$row[11],
				"profile_img"=>$row2[0]
			);
			array_push($search_array,$array);
		}
			

	}else{
		$sql="select * from board where boardtitle like '%".$keyward."%' or bodytext like'%".$keyward."%'order by board_num desc";
		$result = mysqli_query($con,$sql);
		$search_array = array();
		while($row = mysqli_fetch_array($result)){

			$str = $row['bodytext'];
			preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
			if($matches[1]==""){
				$thum = $row['thumbnail'];
			}else{
				$thum =  $matches[1];
			}

			$date = date_create($row['first_written']);
			$board_hashtags=array();

			$m_sql = "select * from member where id='".$row['user_id']."'";
			$m_result = mysqli_query($con,$m_sql);
			$m_row = mysqli_fetch_array($m_result);


			$array = array(
				"board_num"=>$row[0],
				"boardtitle"=>$row[1],
				"bodytext"=>trim(strip_tags($row[2])),
				"boardhash"=>$row[3],
				"user_id"=>$row[4],
				"boardpw"=>$row[5],
				"boardcate"=>$row[6],
				"first_written"=>date_format($date,"Y. m. d"),
				"like_num"=>$row[8],
				"view_num"=>$row[9],
				"comment_num"=>$row[10],
				"profile_img"=>$row[11],
				"thumbnail"=>$thum,
				"m_profile"=>$m_row['profile_img'],
				"m_nickname"=>$m_row['nickname'],
				"curator"=>$m_row['curator']
			);
			array_push($search_array,$array);
	}
}

	$result_array = array("result"=>$search_array);
	echo json_encode($result_array);



	


?>