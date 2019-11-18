<?php
$statics = staticsLog();

function staticsLog(){
	$result = [];
	
	$fp = fopen('log.txt', 'r');
	while( ($buff = fgets($fp)) !== false ){
		$buff = trim($buff);
		
		if( array_key_exists($buff, $result) ){
			$result[$buff]++;
		}
		else{
			$result[$buff] = 1;
		}
	}

	return($result);
}
?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>語尾変換</title>
</head>
<body>

<h1>集計</h1>

<table width="100" border="1">
<tr>
  <td>項目</td>
  <td>数</td>
</tr>
<?php
foreach( $statics as $key => $value ){
	echo '<tr>';
	echo '<td>'.$key.'</td>';
	echo '<td>'.$value.'</td>';
	echo '</tr>';
}
?>
</table>
</body>
</html>
