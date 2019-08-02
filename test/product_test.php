<?php


		include("../dbcon.php");
		$sql="select * from shop_product";
		$result=mysqli_query($con, $sql);

			while($row=mysqli_fetch_array($result)){
				?>

					<p><?php echo $row['product_num']?></p>
					<p><?php echo $row['category']?></p>
					<p><?php echo $row['product_name']?></p>
					<p><?php echo $row['product_brand']?></p>
					<p><?php echo $row['product_price']?></p>
					<p><?php echo $row['sale_percent']?></p>
					<p><?php echo $row['product_drice']?></p>
					<p><?php echo $row['product_app_date']?></p>
					<img src="<?php echo $row['product_thumb']?>">

				<?php
			}

?>