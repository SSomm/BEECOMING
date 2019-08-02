<?php

    include("../dbcon.php");
    session_start();

    $id=$_SESSION['user_id'];
    $new_pw=$_POST['new_pw'];
    $nickname=$_POST['nickname'];
    $hobby=$_POST['hobby_new'];
    $curator=$_POST['curator_flag'];
    $address=$_POST['address'];

    // echo $curator;

    // var_dump($hobby);
    $sql="update member set pw='$new_pw',nickname='$nickname',hobby='$hobby',curator=$curator where id='$id'";
    $result=mysqli_query($con, $sql);


    $sql1="update private set address='$address' where user_id='".$id."'";
    $result1=mysqli_query($con, $sql1);


    if($result&&$result1){
        echo "success";
    }else{
        echo "error";   
    }




?>