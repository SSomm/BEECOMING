<?php

	include("../dbcon.php");

	// $gender=1;
	// $age='20대';
	// $case='발렌타인데이';
	// $rel='친구';
	// $hobby='음악듣기';
	// echo "aa";

	$gender=$_POST['gender'];
	$age=$_POST['age'];
	$case=$_POST['case1'];
	$rel=$_POST['rel'];
	$hobby=$_POST['hobby'];


	// echo $case;
	$sql="select gift, count(*) as c from curation where gender=$gender && age='$age' && case1='$case' && rel='$rel' && hobby='$hobby' group by gift having c>1 order by `c` desc";
	// $sql = "select gift, count(*)as c from curation where gender=1 && age=\'20대\' && case1=\'발렌타인데이\' && rel=\'친구\' && hobby=\'음악듣기\' group by gift having c>1 ORDER BY `c` desc";
	$result=mysqli_query($con, $sql);
	// $row=mysqli_fetch_array($result);
	// echo json_encode($row);
	print_r($row);

	$array = array();
	while($row=mysqli_fetch_array($result)){
		// echo $row["gift"];
		// echo $row["gift"].",";
		// $array.push($row["gift"]);
		array_push($array,$row["gift"]);
	}
	// echo $array;
	// var_dump($array);
	echo json_encode($array);
	// if($row){
	// 	echo "aa";
	// 	// echo json_encode($row);
	// 	// echo "일치 데이터 있음";
	// 	// echo count($row);
	

?>