<?php

	include("../dbcon.php");
	$rank_array = array();
	$boardcate=$_POST['boardcate'];
	// $boardcate=$_GET['boardcate'];
	$sql="select * from board where boardcate='".$boardcate."'order by like_num+view_num desc limit 0,10";
	$result=mysqli_query($con, $sql);


	if($boardcate=="전체게시판"){
		$sql1="select * from board order by board_num desc";
	}else{
		$sql1="select * from board where boardcate='".$boardcate."'order by board_num desc";	
	}

	$result1=mysqli_query($con, $sql1);

	$sql2="select * from member";
	$result2=mysqli_query($con, $sql2);
	$i=0;
	while($row = mysqli_fetch_array($result)){
		
		$str=$row[2];
		preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
		if($matches[1]==null){
			$matches[1]=$row[12];
		}

		// $ck_body=$row[2];
		// $body_text=trim(strip_tags($ck_body[i]));

		$arrayMi = array(
			"board_num"=>$row[0],
			"boardtitle"=>$row[1],
			"bodytext"=>$row[2],
			"boardhash"=>$row[3],
			"user_id"=>$row[4],
			"boardpw"=>$row[5],
			"boardcate"=>$row[6],
			"first_written"=>$row[7],
			"like_num"=>$row[8],
			"view_num"=>$row[9],
			"comment_num"=>$row[10],
			"profile_img"=>$row[11],
			"thumbnail"=>$matches[1]
		);
		array_push($rank_array,$arrayMi);
		$i++;
	}

	$list_array =array();
	while($row1 = mysqli_fetch_array($result1)){
		$str1=$row1[2];
		preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str1, $matches1);

		if($matches1[1]==null){
			$matches1[1]=$row1[12];
		}

		$ck_body1=$row1[2];
		$body_text1=trim(strip_tags($ck_body1));

		$date = date_create($ro1w[7]);
		$data_ch= date_format($date,"Y. m. d");
		// var_dump($ck_body1);
		// $boardhash=array();
		
		
		$arrayMi1 = array(
			"board_num"=>$row1[0],
			"boardtitle"=>$row1[1],
			"bodytext"=>$body_text1,
			"boardhash"=>$row1[3],
			"user_id"=>$row1[4],
			"boardpw"=>$row1[5],
			"boardcate"=>$row1[6],
			"first_written"=>$data_ch,
			"like_num"=>$row1[8],
			"view_num"=>$row1[9],
			"comment_num"=>$row1[10],
			"profile_img"=>$row1[11],
			"thumbnail"=>$matches1[1]
		);
		array_push($list_array,$arrayMi1);
	}

	$member_array =array();
	while($row2 = mysqli_fetch_array($result2)){
	
		$arrayMi2 = array(
			"mem_num"=>$row2[0],
			"id"=>$row2[1],
			"pw"=>$row2[2],
			"nickname"=>$row2[3],
			"email"=>$row2[4],
			"name"=>$row2[5],
			"profile_img"=>$row2[6],
			"mypage_img"=>$row2[7],
			"hobby"=>$row2[8],
			"curator"=>$row2[9],
			"cash_point"=>$row2[10]
		);
		array_push($member_array,$arrayMi2);
	}

	$last_array =array("rank"=>$rank_array,"list"=>$list_array, "member"=>$member_array);
	// for($i = 0; $i < 13; $i++){
		// $row = mysqli_fetch_object($result);

		// while($row = mysqli_fetch_object($result)){
		// 	$rank_array[j]=$row;
		// 	$j++;
		// }




		// while($row = mysqli_fetch_array($result)){
		// 	$rank_array["board_num"][$j] = $row['board_num'];
		// 	$rank_array["boardtitle"][$j] = $row['boardtitle'];
		// 	$rank_array["bodytext"][$j] = $row['bodytext'];
		// 	$rank_array["boardhash"][$j] = $row['boardhash'];
		// 	$rank_array["user_id"][$j] = $row['user_id'];
		// 	$rank_array["boardpw"][$j] = $row['boardpw'];
		// 	$rank_array["boardcate"][$j] = $row['boardcate'];
		// 	$rank_array["first_written"][$j] = $row['first_written'];
		// 	$rank_array["like_num"][$j] = $row['like_num'];
		// 	$rank_array["view_num"][$j] = $row['view_num'];
		// 	$rank_array["profile_img"][$j] = $row['profile_img'];
		// 	$rank_array["thumbnail"][$j] = $row['thumbnail'];
		// // echo $row['board_num'];
		// 	$j++;
		// }
	// }
	// var_dump($result_array);
	// $result_array = array("rank"=>$rank_array);

	// var_dump($rank_array);
	// echo json_encode($last_array);
	echo json_encode($last_array);

?>