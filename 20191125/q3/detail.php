<?php
//-------------------------------------------------------
// 引数(クエリー)を取得
//-------------------------------------------------------
$id = isset($_GET['id'])?   $_GET['id']:null;

// validation
if( $id === null || !is_numeric($id) ){
	echo 'Error: Invalid Query parameter $id';
	exit(1);
}

//-------------------------------------------------------
// 接続情報
//-------------------------------------------------------
$dsn  = 'mysql:dbname=rpgdb;host=localhost';   
$user = 'senpai';
$pw   = 'indocurry';

//-------------------------------------------------------
// 実行したいSQL
//-------------------------------------------------------
$sql = 'SELECT * FROM Monster WHERE id=?';

try{
	$dbh = new PDO($dsn, $user, $pw);	// DBへ接続
	$sth = $dbh->prepare($sql);			// 実行の準備
	$sth->execute([$id]); 					// 実行

	// 最初の1行だけ取得
	$data = $sth->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
	echo 'Error: '.$e->getMessage()."¥n";
	exit(1);
}

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

<?php
if( $data === false ){
	echo '<h2>存在しないモンスターです</h2>';
}
else{
?>


<h2><?= $data['name'] ?></h2>

<img src="image/<?= $data['id'] ?>.png">

<h3>ステータス</h3>
<table>
<tr>
  <th>項目</th>
  <th>値</th>
</tr>
<tr>
  <td>HP</td>
  <td><?= $data['HP'] ?></td>
</tr>
<tr>
  <td>AT</td>
  <td><?= $data['AT'] ?></td>
</tr>
<tr>
  <td>DF</td>
  <td><?= $data['DF'] ?></td>
</tr>
</table>

<h3>フレーバーテキスト</h3>
<?= $data['flaver'] ?>

<?php
}	// else
?>
</body>
</html>


