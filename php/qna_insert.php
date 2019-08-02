<?php

	include("../dbcon.php");
	session_start();


	$qna_product_num=$_POST['qna_product_num'];
	$qna_title=$_POST['qna_title'];
	$qna_body=$_POST['qna_body'];
	$qna_open=$_POST['qna_open'];
	$qna_questioner=$_POST['qna_questioner'];
	$qna_cate=$_POST['qna_cate'];

	$sql1="select * from shop_product where product_num=".$qna_product_num;
	$result1=mysqli_query($con, $sql1);
	$row1=mysqli_fetch_array($result1);

	$sql="insert into product_qna (product_num,question_title,question_body,QnA_open,questioner_id, question_cate, answerer_id) values(".$qna_product_num.", '".$qna_title."', '".$qna_body."', ".$qna_open.", '".$qna_questioner."', '".$qna_cate."', '".$row1['product_seller_id']."')";
	$result=mysqli_query($con, $sql);

	if($result){
		echo "success";
	}else{
		echo "error";
	}
?>