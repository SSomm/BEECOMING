<?php
	
	include("../dbcon.php");
	session_start();

	$answerer=$_POST['sendermod'];
	$title=$_POST['messagetitle'];
	$messagebody=$_POST['messagebody'];
	$qnum=$_POST['qnum'];


	$sql="update product_qna set answer_body='".$messagebody."', answer_title='".$title."', answerer_id='".$answerer."', answer_date=current_timestamp, answer_com=1 where product_qna_num=".$qnum;
	$result=mysqli_query($con, $sql);

	if($result){
		echo "success";
	}else{
		echo "error";
	}


?>