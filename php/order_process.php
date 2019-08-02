<?php
	
	include("../dbcon.php");
	session_start();


	$purchase_num=$_POST['purchase_num'];
	$query_check=0;

	$cnt=count($purchase_num);

	for($i=0;$i<$cnt;$i++){
		$sql="update purchase_record set purchase_stat=1 where purchase_num=".$purchase_num[$i];
		$result=mysqli_query($con, $sql);
		if($result){
			$query_check+=1;
		}
	}

	if($query_check==$cnt){
		echo "success";
	}else{
		echo "error";
	}


?>