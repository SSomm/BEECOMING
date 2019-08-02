<?php

	include("../dbcon.php");

	$id=$_POST['id'];
	$pw=$_POST['pw'];
	$name=$_POST['name'];
	$nickname=$_POST['nickname'];
	$email=$_POST['email'];
	$hobby=$_POST['hobby'];
	$curator=$_POST['curator'];
	$birth=$_POST['birth'];
	$number=$_POST['number'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$comp_address=$_POST['comp_address'];
	$p_cate=$_POST['p_cate'];
	$seller=$_POST['seller'];
	// echo $curator;

	// $sql="insert into member (id,pw,name,nickname,email,hobby,curator) values('$id','$pw','$name','$nickname','$email','$hobby',$curator)";


	if($seller){
		$sql3="INSERT INTO `member` (`id`, `pw`, `email`, `name`, `hobby`, `seller`) VALUES ('".$id."', '".$pw."','".$email."', '".$name."','".$p_cate."', $seller)";
		$result3=mysqli_query($con, $sql3);


		$sql4="insert into private(user_id, phone, birthday, address) values('".$id."', $phone , $number , '".$comp_address."')";
		$result4=mysqli_query($con, $sql4);

		if($result3){
			if($result4){
				echo "success";
			}
		}else{
			echo("Error description4: " . mysqli_error($con));
		}




	}else{
		// echo("Error description: " . mysqli_error($con));
		$sql="INSERT INTO `member` (`id`, `pw`, `nickname`, `email`, `name`, `hobby`, `curator`) VALUES ('".$id."', '".$pw."', '".$nickname."', '".$email."', '".$name."','".$hobby."', ".$curator.")";
		$result=mysqli_query($con, $sql);


		$sql1="insert into private(user_id, birthday, address) values('".$id."',$birth, '".$address."')";
		$result1=mysqli_query($con, $sql1);
		if($curator){
		$sql2="insert into curator(user_id) values('".$id."')";
		$result2=mysqli_query($con, $sql2);	

			}else{
				$result2=true;
			}
	
		if($result){
		// echo "success";
		if($result1){
			if($result2){
				echo "success";
			}else{
				echo("Error description1: " . mysqli_error($con));
			}

		}else{
			echo("Error description2: " . mysqli_error($con));
		}
	}else{
		echo("Error description3: " . mysqli_error($con));
	}

	}
	
	

	




?>