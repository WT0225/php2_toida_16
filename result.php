<?php

$services=$_POST['services'];
foreach($services as $value){
    $service .= $value.",";
}
$time=$_POST['time'];
$address=$_POST['address'];


//1.  DB接続します
require_once('function.php');
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT) 
$stmt = $pdo->prepare("SELECT * FROM workshop_db WHERE service LIKE '%$service%'");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  sql_error($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result['id'].'">';
    $view .= $result['workshop_name'].':'.$result['service'].':'.$result['address'].' '.$result['email'].' '.$result['tel'];
    $view .= '</a>';
    $view .= '<button><a href="delete.php?id='.$result['id'].'">';
    $view .= ' 削除</button>';
    $view .= '</a>';
    $view .= '</p>';
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div><?= $view ?></div>
</body>
</html>
