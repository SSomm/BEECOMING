<?php

	include("../dbcon.php");

$id=$_GET['id'];
$path="../mypage_img/";
 // $data['success'] = false;
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_FILES['service_image']['name'];
    $size = $_FILES['service_image']['size'];
     
     
    if(strlen($name))
    {       
        list($txt, $ext) = explode(".", $name);

        if(in_array($ext,$valid_formats))
        {
                $actual_image_name =generateRandomString(30)."-image.".$ext;
                $tmp = $_FILES['service_image']['tmp_name'];
                if(move_uploaded_file($tmp, $path.$actual_image_name))
                {       

                    $data['url']  = "./becoming0508/mypage_img/".$actual_image_name;  
                    $imgSize = getimagesize($data['url']);
                    $width=$imgSize[0];
                    $height=$imgSize[1];

                    if($width>=$height){

                    	$data['std']='high';
                    	$data['width']=$width;
                    	$data['height']=$height;
                    }else{
                    	$data['std']='low';
                    	$data['width']=$width;
                    	$data['height']=$height;

                    }

                    $sql= "update member set mypage_img = '".$data['url']."' where id='".$id."'";
                    $result=mysqli_query($con, $sql);
                    if($result){
                    	$data['success'] = true;
                    }else{
                    	$data['success'] = false;
                    	$data['error'] = "mysql_error";
                    }
                }
                else
                {
                    $data['success'] = false;
                    $data['error'] = "error";
                }
                     

        }
        else{
        	$data['success'] = false;
            $data['error'] = "Invalid file format..";
        }
    }
    else{
    	$data['success'] = false;
    	$data['error'] = "Please select image..!";
    }

        
}
 
echo json_encode($data);

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>