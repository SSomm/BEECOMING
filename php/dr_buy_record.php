<?php

	include("../dbcon.php");
	session_start();

	$id=$_SESSION['user_id'];
	$num=$_POST['product_num'];
	$pmnum=$_POST['pmnum'];
	$point=$_POST['point'];
	$price=$_POST['price_onlynum'];
	$product_option=$_POST['product_option'];
	$p_opt_detail1=$_POST['p_opt_detail1'];
	$p_opt_detail2=$_POST['p_opt_detail2'];
	$product_count=$_POST['product_count'];
	$cart_num=$_POST['cart_num'];
	// echo $product_option;

	$sql5="select * from shop_product where product_num=".$num;
	$result5=mysqli_query($con, $sql5);
	$row5=mysqli_fetch_array($result5);

	if(isset($pmnum)){

		$sql7="insert into purchase_record (`user_id`, `stack_point`, `stack_money`, `purchase_quantity`, `product_num`, `seller_id`, `pm_num`) values('".$_SESSION['user_id']."', ".(int)$point.", ".(int)$price.", ".$product_count.", ".$num.", '".$row5['product_seller_id']."', ".$pmnum.")";
		$result7=mysqli_query($con, $sql7);


		if($result7){
			// echo "success";
			// $sql9="select * from "
			$sql8="delete from shop_cart where cart_p_num=".$cart_num;
			$result8=mysqli_query($con, $sql8);
			if($result8){
				echo "success";
			}else{
				echo "delete_error";
			}
		}else{
			echo "insert_error";
		}
	}else{
	if(isset($product_option)){

		if(isset($p_opt_detail1)){
			if(isset($p_opt_detail2)){
					$sql6="select pm_num from product_manage where product_num=".$num." and product_option='".$product_option."' and p_opt_detail1='".$p_opt_detail1."' and p_opt_detail2='".$p_opt_detail2."'";
			}else{
				$sql6="select pm_num from product_manage where product_num=".$num." and product_option='".$product_option."' and p_opt_detail1='".$p_opt_detail1."'";
			}
		}else{
			$sql6="select pm_num from product_manage where product_num=".$num." and product_option='".$product_option."'";
		}

	}else{
		$sql6="select pm_num from product_manage where product_num=".$num;
	}
	$result6=mysqli_query($con,$sql6);
	$row6=mysqli_fetch_array($result6);



	$sql="insert into purchase_record (user_id, stack_point, stack_money, product_num, seller_id, purchase_quantity, pm_num) values('".$id."', ".$point.",".$price.", ".$num.", '".$row5['product_seller_id']."', ".$product_count.", ".$row6['pm_num'].")";
	$result=mysqli_query($con, $sql);

	if(isset($product_option)){

		if(isset($p_opt_detail1)){

			if(isset($p_opt_detail2)){

				$sql1="update product_manage set product_quantity=product_quantity-".$product_count." where product_num=".$num." and product_option='".$product_option."' and p_opt_detail1='".$p_opt_detail1."'and p_opt_detail2='".$p_opt_detail2."'";
				$result1=mysqli_query($con, $sql1);
				// echo "a";
				// echo :
			}else{
				$sql1="update product_manage set product_quantity=product_quantity-".$product_count." where product_num=".$num." and product_option='".$product_option."' and p_opt_detail1='".$p_opt_detail1."'";
				$result1=mysqli_query($con, $sql1);
				// echo "b";/
				// echo $result1;
			}
					
		}else{
				$sql1="update product_manage set product_quantity=product_quantity-".$product_count." where product_num=".$num." and product_option='".$product_option."'";
				$result1=mysqli_query($con, $sql1);	
				// echo "c";
		}
			

	}
	$sql2="update shop_product set product_sel_num=product_sel_num+".$product_count." where product_num=".$num;
	$result2=mysqli_query($con, $sql2);



	$sql3="select * from product_manage";
	$result3=mysqli_query($con, $sql3);
	

	while($row3=mysqli_fetch_array($result3)){

		if($row3['product_quantity']<=0){

			$sql4="update product_manage set product_flag=0 where pm_num=".$row3['pm_num'];
			$result4=mysqli_query($con,$sql4);	
		}else{
			$result4=1;
		}

	}


	$sql9="select purchase_num from purchase_record order by purchase_num desc limit 0,1 ";
	$result9=mysqli_query($con, $sql9);
	$row9=mysqli_fetch_array($result9);


	if($result){
		if($result2){

			if($result3){
				if($result4){
						echo $row9['purchase_num'];
				}else{
					echo "error";
				}
			}else{
				echo "error1";
			}			
		}else{
			echo "error2";
		}
	}else{
		echo $row6['pm_num'];
		 echo("Error description: " . mysqli_error($con));
		// echo "error1";
	}



}



?>