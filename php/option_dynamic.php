<?php

	include("../dbcon.php");
	session_start();



	$num=$_POST['num'];
	// $num=322;

	$sql="select DISTINCT pm_num, product_num, product_category, product_name, product_brand, product_option, p_opt_detail1,`p_opt_detail2`,`product_quantity`,`product_flag` from product_manage where product_num=".$num." and product_flag=1";
	$result=mysqli_query($con, $sql);

	$option_array = array();

	while($row=mysqli_fetch_array($result)){

		$arrayMi = array(
			"pm_num"=>$row[0],
			"product_num"=>$row[1],
			"product_category"=>$row[2],
			"product_name"=>$row[3],
			"product_brand"=>$row[4],
			"product_option"=>$row[5],
			"p_opt_detail1"=>$row[6],
			"p_opt_detail2"=>$row[7],
			"product_quantity"=>$row[8],
			"product_flag"=>$row[9]			
		);
		array_push($option_array,$arrayMi);

}

$last_array =array("option"=>$option_array);

echo json_encode($last_array);
// var_dump($last_array);

?>