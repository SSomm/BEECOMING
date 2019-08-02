<?php

$address=$_GET['detail_address'];
//echo $address;

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="test.js"></script>
</head>
<body>
	<button class="details">상세페이지 크롤링 스타트</button>
	<button class="detail_imgs">상세 이미지 크롤링</button>
<?php
header('Content-Type: text/html; charset=UTF-8');
	//Snoopy.class.php를 불러옵니다
require('./Snoopy.class.php');
 
//스누피를 생성해줍시다
$snoopy = new Snoopy;
 
//스누피의 fetch함수로 제 웹페이지를 긁어볼까요? :)
$snoopy->fetch($address);
    // fetch(크롤링 할 주소)
 
//결과는 $snoopy->results에 저장되어 있습니다
//preg_match 정규식을 사용해서 이제 본문인 article 요소만을 추출해보도록 하죠
//preg_match('/<li>(.*)(?=<li>)/is', $snoopy->results, $text);
// ~<ul>(.*?)</ul>~s
    preg_match('/<div class="tPad10">(.*?)<\/div>/is', $snoopy->results, $contenta);
     preg_match('/<div class="detailInfoV15">(.*?)<\/div>/is', $snoopy->results, $contents2);
     preg_match('/<div class="pdtBasicV15">(.*?)<\/div>/is', $snoopy->results, $content1);
   	preg_match('/<div class="pdtInfoWrapV15">(.*?)<\/div>/is', $snoopy->results, $content);
   	preg_match('/<ul class="list01V15">(.*?)<\/ul>/is', $snoopy->results, $contentb);
   //   preg_match_alls('/(<table[^>]*>(?:.|\n)*(?=<\/table>))/', $snoopy->results, $aMatches);
   	// preg_match("/<p class='pdtName'>(.*?)<\/p>/is",$snoopy->results,$matches1);
   	// var_dump($matches1);
    //이제 결과를 보면...?
// echo $contents[0];s
// echo $content1[0];
// print_r($aMatches[0]);

preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i",  $snoopy->results, $matches);

// print_r($matches[0][6]);

$i=0;
$j=0;
$img_detail=array();
for($i=0;$i<count($matches[1]);$i++){
	// $imgs="";
	$imgs=explode("/",$matches[1][$i]);
	// echo $imgs;
	// var_dump($imgs);
	if($imgs[2]=="webimage.10x10.co.kr"){
		// echo "aa";
		// array_push($img_detail, $matches[$i]);
		// $img_detail[$j] = $content1[0].",".$matches[1][$i];
		// echo "<p class='text'>".$matches[1][$i].","."</p>";
		$j++;
	}

	$imgs=array();

}
echo($contenta[0]);
echo($content[0]);
echo($content1[1]);
// echo($contentb[2]);
echo($contents2[0]);

// print_r($img_detail);
$k=0;
for($k=0;$k<count($img_detail);$k++){
?>
<!-- <p class="imgs"><?php echo$img_detail[$k];?></p> -->
<!-- <p class="imgs"><?=$img_detail[$k]?></p> -->
<?php
}
?>

</body>
</html>
