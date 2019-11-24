<?php
//-------------------------------------------------------
// 接続情報
//-------------------------------------------------------
$dsn  = 'mysql:dbname=rpgdb;host=localhost';   
$user = 'senpai';
$pw   = 'indocurry';

//-------------------------------------------------------
// 実行したいSQL
//-------------------------------------------------------
$sql = 'SELECT * FROM Monster';
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>モンスター図鑑</title>
  <style>
  	table {
  		border: 1px solid gray;
  		padding: 5px;
  	}
  	th, td{
  		border: 1px solid gray;
  		padding: 10px;
  	}
  	th{
  		background-color: lightcyan;
  	}
  </style>
</head>
<body>

<h1>モンスター図鑑</h1>

<table>
<tr>
  <th>id</th>
  <th>名前</th>
  <th>HP</th>
  <th>AT</th>
</tr>
<?php
//-------------------------------------------------------
// 実行する
//-------------------------------------------------------
try{
	$dbh = new PDO($dsn, $user, $pw);	// DBへ接続
	$sth = $dbh->prepare($sql);			// 実行の準備
	$sth->execute();  // 実行

	// 取得したデータを表示する
	while( true ){
		$tmp = $sth->fetch(PDO::FETCH_ASSOC);

		if( $tmp === false ){
			break;
		}
		
		?>
		<tr>
			<td><?= $tmp['id'] ?></td>
			<td><?= $tmp['name'] ?></td>
			<td><?= $tmp['HP'] ?></td>
			<td><?= $tmp['AT'] ?></td>
		</tr>
		<?php
	}
}
catch (PDOException $e) {
	echo 'Error: '.$e->getMessage()."¥n";
}
?>
</table>

</body>
</html>


