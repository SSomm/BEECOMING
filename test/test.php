<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="test.js"></script>
</head>
<body>
	<button class="crawl">크롤링 스타트</button>
	
<?php
header('Content-Type: text/html; charset=UTF-8');
	//Snoopy.class.php를 불러옵니다
require('./Snoopy.class.php');
 
//스누피를 생성해줍시다
$snoopy = new Snoopy;
 
//스누피의 fetch함수로 제 웹페이지를 긁어볼까요? :)
$snoopy->fetch('http://www.10x10.co.kr/shopping/category_list.asp?disp=118107101');
 
//결과는 $snoopy->results에 저장되어 있습니다
//preg_match 정규식을 사용해서 이제 본문인 article 요소만을 추출해보도록 하죠
//preg_match('/<li>(.*)(?=<li>)/is', $snoopy->results, $text);
// ~<ul>(.*?)</ul>~s
preg_match('~<ul class="pdtList">(.*)</ul>~s', $snoopy->results, $text);
    //이제 결과를 보면...?
// echo $text[0];
var_dump($text[0]);
// print_r($text);
//for($i =0; $i < 1; $i++)
//{
//	// echo iconv("EUC-KR","UTF-8",$text[$i]);
//	echo $text[$i];
//}
?>
</body>
</html>
