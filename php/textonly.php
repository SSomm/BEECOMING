<?php

	include("../dbcon.php");

	$id=$_POST['id'];
	// $id=admin;


	$sql="select * from board where user_id='".$id."' order by board_num desc";
	$result=mysqli_query($con,$sql);

	$sql1="select * from member where id='".$id."'";
	$result1=mysqli_query($con, $sql1);
	// $row1=mysqli_fetch_array($result1);

	$board_array=array();
	$member_array=array();

	while($row=mysqli_fetch_array($result)){

		$str=$row[2];
		preg_match("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $str, $matches);
		if($matches[1]==null){
			$matches[1]=$row[12];
		}

			// echo $match[1];
		// }

		$date = date_create($row['first_written']);

				$datem=date_format($date,"Y. m. d");

		$ck_body=$row['bodytext'];
				trim(strip_tags($ck_body));

		$ck_body=$row[2];
		$body_text=trim(strip_tags($ck_body[i]));

		$arrayMi = array(
			"board_num"=>$row[0],
			"boardtitle"=>$row[1],
			"bodytext"=>$body_text,
			"boardhash"=>$row[3],
			"user_id"=>$row[4],
			"boardpw"=>$row[5],
			"boardcate"=>$row[6],
			"first_written"=>$datem,
			"like_num"=>$row[8],
			"view_num"=>$row[9],
			"comment_num"=>$row[10],
			"profile_img"=>$row[11],
			"thumbnail"=>$matches[1]
		);
		array_push($board_array,$arrayMi);
		$i++;

	}

	// $member_array =array();
	while($row1 = mysqli_fetch_array($result1)){
	
		$arrayMi1 = array(
			"mem_num"=>$row1[0],
			"id"=>$row1[1],
			"pw"=>$row1[2],
			"nickname"=>$row1[3],
			"email"=>$row1[4],
			"name1"=>$row1[5],
			"profile_img"=>$row1[6],
			"mypage_img"=>$row1[7],
			"hobby"=>$row1[8],
			"curator"=>$row1[9],
			"cash_point"=>$row1[10]
		);
		array_push($member_array,$arrayMi1);
	}

	$last_array =array("board"=>$board_array, "member"=>$member_array);

	echo json_encode($last_array);
	// var_dump($last_array);

?>