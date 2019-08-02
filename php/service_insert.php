<?php
	include("../dbcon.php");
	session_start();

	$service_cu = $_POST['service_cu'];
	$service_get = $_SESSION['user_id'];
	$cu_profile = $_POST['cu_profile'];
	// $cu_gift = $_

	$sql = "INSERT INTO cu_service (service_cu,service_get,cu_profile) values('$service_cu','$service_get','$cu_profile')";
	$result = mysqli_query($con,$sql);
	if($result){
		echo "success";
	}else{
		echo "error";
	}
?>