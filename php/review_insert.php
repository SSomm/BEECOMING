<?php
	include("../dbcon.php");
	session_start();
	$id = $_SESSION['user_id'];
	$num = $_POST['num'];
	$title = $_POST['title'];
	$bodytext = $_POST['bodytext'];
	$open = $_POST['open'];
	$review_title=$_POST['review_title'];
	$purchase_num=$_POST['purchase_num'];
	// echo $id;
	$sql = "INSERT INTO `product_review` (`product_num`, `buyer_id`, `review_title`, `review_body`, `review_open`) VALUES ($num,'".$id."','".$review_title."','".$bodytext."', $open )";
	$result = mysqli_query($con,$sql);

	$sql1="update purchase_record set purchase_stat=5 where purchase_num=".$purchase_num;
	$result1=mysqli_query($con, $sql1);


	if($result){
		if($result1){
			echo "success";
		}else{
			echo "error1";
		}
	}else{
		echo "error";
	}

?>