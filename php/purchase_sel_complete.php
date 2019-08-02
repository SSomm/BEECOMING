<?php
	include("../dbcon.php");
	session_start();

	$num_array = $_POST['num_array'];
	$pmnum_array = $_POST['pmnum_array'];
	$purchasenum_array = $_POST['purchasenum_array'];
	$id = $_SESSION['user_id'];

	$flag=0;
	for($i = 0; $i < count($num_array); $i++){
		$sql = "UPDATE purchase_record set purchase_stat = 4 where purchase_num = ".$purchasenum_array[$i];
		$result = mysqli_query($con,$sql);
		if($result){
			$flag+=1;
		}
	}


	if($flag==count($num_array)){
			echo "success";
		}else{
			echo "error";
		}
?>