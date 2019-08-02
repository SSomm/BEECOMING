<?php
// $mainDir = $_SERVER ['DOCUMENT_ROOT'];

$category=$_POST['product_cate'];
// echo "<script>console.log('".$category."')</script>";
$uploadPath="./category_img/".$category."/details/";
// $uploadPath="./category_img/clothes/details/";
$fileName=$_FILES ['myInputName'] ['name']; 
$uploadName = explode('.', $fileName);

    // $fileSize = $_FILES['upload']['size'][$f];
    // $fileType = $_FILES['upload']['type'][$f];
    $uploadname = generateRandomString(20).'.'.$uploadName[1];
    $uploadFile = $uploadPath.$uploadname;
    if(file_exists($uploadFile)){
        header(':', true, 403); // or http_response_code(403); for php>=5.4
        echo 'File exist!'; //Custom error From Server
        return;
    }else{
        

        if (!move_uploaded_file($_FILES ['myInputName'] ['tmp_name'], $uploadFile)) {
             $errors = error_get_last();
             header(':', true, 403); // or http_response_code(403); for php>=5.4
             echo $errors; //Error From Server
             return;
        }else{

        }
    }
echo $uploadname;
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
