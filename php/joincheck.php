<?php
	include("../dbcon.php");







	$id=$_POST['id'];
	// $pw=$_POST['pw'];
	// $name=$POST['name'];
	// $nickname=$_POST['nickname'];
	// $email=$_POST['email'];
	// $hobby=$_POST['hobby'];

	// echo $id;
	$sql="select * from member where id='$id'";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($result);

	if($row){
		echo "id_exist";
	}else{
		echo "success";
	}

	// if($r)


?>