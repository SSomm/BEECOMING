<?php

		include("../dbcon.php");
		session_start();

$boardnum=$_POST['boardnum'];
$boardtitle=$_POST['boardtitle'];
$bodytext=$_POST['bodytext'];
$boardhash=$_POST['tags'];
$userid=$_POST['id'];
$boardcate=$_POST['boardcate'];
$boardpw=$_POST['pw'];

$date=date("Y-m-d H:i:s");

		$sql="UPDATE `board` SET `boardtitle`='$boardtitle',`bodytext`='$bodytext',`boardhash`='$boardhash', `boardpw`='$boardpw',`boardcate`='$boardcate' WHERE board_num=$boardnum";
		$result=mysqli_query($con, $sql);

		if($result){
			echo "success";
		}else{
			echo "error";
		}


?>