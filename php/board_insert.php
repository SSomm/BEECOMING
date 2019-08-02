<?php

		include("../dbcon.php");
		session_start();

$boardtitle=$_POST['boardtitle'];
$bodytext=$_POST['bodytext'];
$boardhash=$_POST['tagval'];
$userid=$_POST['writer'];
$boardcate=$_POST['cate'];
$boardpw=$_POST['pw'];
$date=date("Y-m-d H:i:s");

		$sql="insert into board (`boardtitle`, `bodytext`, `boardhash`, `user_id`, `boardpw`, `boardcate`,`first_written` ) values('$boardtitle', '$bodytext', '$boardhash', '$userid', '$boardpw', '$boardcate', '$date')";
		$result=mysqli_query($con, $sql);

		if($result){
			echo "success";
		}else{
			echo "error";
		}


?>