<?php
//-------------------------------------------------------
// 引数(クエリー)を取得
//-------------------------------------------------------
$order = isset($_GET['order'])?   'desc':'asc';

//-------------------------------------------------------
// 接続情報
//-------------------------------------------------------
$dsn  = 'mysql:dbname=rpgdb;host=localhost';   
$user = 'senpai';
$pw   = 'indocurry';

//-------------------------------------------------------
// 実行したいSQL
//-------------------------------------------------------
$sql = sprintf('SELECT * FROM Monster ORDER BY HP %s', $order);
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
  <th> </th>
  <th>id</th>
  <th>名前</th>
  <?php
  if( $order === 'desc' ){
  	echo '<th><a href="?">HP</a></th>';
  }
  else{
  	echo '<th><a href="?order=1">HP</a></th>';
  }
  ?>
  <th>AT</th>
</tr>
<?php
//-------------------------------------------------------
// 実行する
//-------------------------------------------------------
try{
	$dbh = new PDO($dsn, $user, $pw);	// DBへ接続
	$sth = $dbh->prepare($sql);			// 実行の準備
	$sth->execute();  	// 実行

	// 取得したデータを表示する
	while( true ){
		$tmp = $sth->fetch(PDO::FETCH_ASSOC);

		if( $tmp === false ){
			break;
		}
		
		?>
		<tr>
			<td><img src="image/<?= $tmp['id'] ?>.png" width="80"></td>
			<td><?= $tmp['id'] ?></td>
			<td><a href="detail.php?id=<?= $tmp['id'] ?>"><?= $tmp['name'] ?></a></td>
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


