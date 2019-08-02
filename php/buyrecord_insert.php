<?php
	date_default_timezone_set('Asia/Seoul');
	include("../dbcon.php");
	session_start();


	$id=$_SESSION['user_id'];
	$data = $_POST['result'];

	$ccc = count($data);
	// var_dump($data);
	// echo $ccc;

	//동시 여러 values insert(date값 동시 처리 위해서, ","처리 때문에, 참고-https://www.phpzag.com/build-live-chat-system-with-ajax-php-mysql/) 
	$sql = "insert into purchase_record (`user_id`,`stack_point`, `stack_money`,`product_num`,`purchase_date`, `seller_id`, `pm_num`) values";
	for($i=0;$i<count($data);$i++){
		
		if($i == count($data)-1){
			// echo "a";
			$sql .= "('".$id."', ".(int)$data[$i][2].",".(int)$data[$i][1].",".$data[$i][0].",CURRENT_TIMESTAMP,'".$data[$i][5]."', ".$data[$i][3].")";
			// $result=mysqli_query($con, $sql);
			break;
		}else{
			$sql .= "('".$id."', ".(int)$data[$i][2].",".(int)$data[$i][1].",".$data[$i][0].",CURRENT_TIMESTAMP,'".$data[$i][5]."', ".$data[$i][3]."),";
			
		}		
	}
	$result=mysqli_query($con, $sql);	

for($i=0;$i<count($data);$i++){
		
	$sql1="delete from shop_cart where cart_p_num=".$data[$i][4];
	$result1=mysqli_query($con, $sql1);
	
	$sql2="update shop_product set product_sel_num=product_sel_num+1 where product_num=".$data[$i][0];
	$result2=mysqli_query($con, $sql2);		

	}
	


		$sql3="select purchase_date from purchase_record order by purchase_num desc limit 0,1";
		$result3=mysqli_query($con,$sql3);
		$row3=mysqli_fetch_array($result3);


	// $sql="insert into purchase_record (`user_id`,`stack_point`, `stack_money`,`product_num`,`purchase_date`) values('".$id."', ".$result[$i][2].",".$result[$i][1].",".$result[$i][0].",CURRENT_TIMESTAMP)";


		if($result){
			//echo "success";
			if($result1){
				if($result2){	
					echo $row3['purchase_date'];
				}else{
					echo "error_result2";
				}
			}else{
				echo "error_result1";
			}
		}else{	
			echo "error";
		}
	
		

	

?>