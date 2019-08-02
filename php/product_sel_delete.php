<?php
	include("../dbcon.php");
	session_start();
	$num_array = $_POST['num_array'];
	$pm_array = $_POST['pm_array'];


	for($i = 0; $i < count($num_array); $i++){
		//$sql = "UPDATE shop_product set product_open = 0 where product_num = ".$num_array[$i];
		// $sql = "DELETE FROM shop_product where product_num = ".$num_array[$i];
		// $result = mysqli_query($con,$sql);
		// if($result){
			//$sql1 = "UPDATE product_manage set product_flag = 0 where pm_num = ".$pm_array[$i];
			$sql1 = "DELETE FROM product_manage where pm_num = ".$pm_array[$i];
			$result1 = mysqli_query($con,$sql1);
			if($result1){
				$sql2 = "UPDATE product_qna set QnA_available = 0 where product_num = ".$num_array[$i];
				$result2 = mysqli_query($con,$sql2);
				if($result2){
					$sql3 = "UPDATE product_review set review_available = 0 where product_num = ".$num_array[$i];
					$result3 = mysqli_query($con,$sql3);
					if($result3){
						echo "success";
					}else{
						echo "error review";
					}
				}else{
					echo "error qna";
				}
				// echo "success"
			}else{
				echo "error product_mange";
			}
		// }else{
		// 	echo "Error_correction: ".mysqli_error($con);
		// }
	}	
?>