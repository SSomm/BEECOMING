<?php
		include("../dbcon.php");
		session_start();

$board_num=$_POST['board_num'];
$id=$_POST['comment_writer'];
$date=date("Y-m-d H:i:s");
$comment_bodytext=$_POST['comment_body'];


$sql="insert into comment (`board_num`, `id`, `comment_bodytext`, `comment_time`) values($board_num, '$id','$comment_bodytext', '$date')";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_array($result);


$sql1="update board set comment_num=comment_num+1 where board_num=".$board_num;
$result1=mysqli_query($con, $sql1);

if($result1){
	echo "success";
}else{
	echo "error";
}


?>