<?php

	
   $subject = $_POST['subject'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $msg = "보낸이: ".$_POST['name']."\n\n".$_POST['phone']."\n\n".$_POST['msg'];
   $to = "somiv0427@naver.com";
   $subject = $subject;
   $contents = $msg;
   $headers = "From: ".$email."\r\n";
   mail($to, $subject, $contents, $headers);



?>