<?php
//---------------------------
// モードを定義
//---------------------------
$modelist = [
  'nya'  => 'にゃー',
  'gowa' => 'でごわす'
];

//---------------------------
// クエリーを受け取る
//---------------------------
$str  = ( isset($_GET['str']) )?  $_GET['str']:'';
$mode = ( isset($_GET['mode']) )?  $_GET['mode']:'nya';

if( ! array_key_exists($mode, $modelist) ){
	$mode = 'nya';
}

//---------------------------
// 変換
//---------------------------
// 語尾
$str2 = changeTail($str, $modelist[$mode]);

// HTML -> 文字列
$str2 = changeHTML($str2);

// 改行 -> br
$str2 = changeBR($str2);


function changeTail($str, $mode){
	$replace = sprintf('%s。', $mode);

	$str = str_replace('です。', $replace, $str);
	$str = str_replace('ます。', $replace, $str);

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
