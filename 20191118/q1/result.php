<?php
//---------------------------
// クエリーを受け取る
//---------------------------
$str = ( isset($_GET['str']) )?  $_GET['str']:'';

//---------------------------
// 変換
//---------------------------
// 語尾
$str2 = changeTail($str);

// HTML -> 文字列
$str2 = changeHTML($str2);

// 改行 -> br
$str2 = changeBR($str2);


function changeTail($str){
	$str = str_replace('です。', 'でごわす。', $str);
	$str = str_replace('ます。', 'でごわす。', $str);

	return($str);
}

function changeHTML($str){
	return( htmlentities($str) );
}

function changeBR($str){
	$str = str_replace("\r", '', $str);
	$str = str_replace("\n", "<br>\n", $str);

	return($str);
}
?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>語尾変換</title>
</head>
<body>

<h1>語尾変換</h1>
<?= $str2 ?>

</body>
</html>
