<?php
		include("../dbcon.php");
		session_start();

		$res=session_destroy();

		if($res){
			echo "success";
		}else{
			echo "error";
		}


?>