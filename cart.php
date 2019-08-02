	<div class="cart">
		<div class="cart_warp">
			<div class="bal" style="display: none;">
				<div class="balloon">
					<p>상품을 드래그 하여 <br>장바구니에<br>넣으실 수 있습니다.</p>
				</div>

			</div>
			<div class="cart_top">
				<div class="cart_top_title">
					<div class="circle cart_circle_info" style="display:none">
						<i class="fas fa-question"></i>
					</div>
					<p>나의장바구니</p>
					<?php 
						$sqlremote="select count(*) as cnt from shop_cart where user_id='".$_SESSION['user_id']."'";
						$resultremote=mysqli_query($con, $sqlremote);
						$rowremote=mysqli_fetch_array($resultremote);
						
						if($rowremote){					
					?>
					<div class="circle cart_circle_number">
						<p><?php echo $rowremote['cnt']?></p>
					</div>
					<?php
					}
					?>
				</div>
				<div class="cart_up">
					<i class="fas fa-angle-up"></i>
				</div>
				<div class="roglling">
					<ul class="cart_ul">
						<?php
							$sqlz="select * from shop_cart where user_id='".$_SESSION['user_id']."'";
							$resultz=mysqli_query($con, $sqlz);
							$total_money=0;
							while($rowz=mysqli_fetch_array($resultz)){
								$sqly="select * from shop_product where product_num=".$rowz['product_num'];
									// $thumb1=explode(",",$row1['product_thumb']);
								$resulty=mysqli_query($con, $sqly);
								$rowy=mysqli_fetch_array($resulty);
									$thumby=explode(",",$rowy['product_thumb']);
									if($rowy['product_drice']){
										$total_money+=preg_replace("/[^0-9]*/s", $rowy['product_drice']);
									}else{
										$total_money+=preg_replace("/[^0-9]*/s", $rowy['product_price']);
									}
									

						?>
						<li><img src="http://192.168.20.78/becoming0508/category_img/<?php echo $rowy['category']?>/<?php echo $thumby[0]?>" alt="img"></li>
					<?php
						}
					?>
					</ul>
				</div>
				
				<div class="cart_down">
					<i class="fas fa-angle-down"></i>
				</div>
			</div>
			<div class="cart_bottom">
				<p style="margin-left: 60px;">총계 : </p>
				<p class="cart_total"><?php echo $total_money?>원</p>
			</div>
		</div>
	</div>