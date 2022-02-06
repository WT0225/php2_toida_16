<?php

$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$admin_flg = $_POST['admin_flg'];

require_once('function.php');
$pdo = db_conn();

$stmt = $pdo->prepare(
    "INSERT INTO user_db(id, name, lid, lpw, admin_flg)
    VALUES (NULL, :name, :lid, :lpw, :admin_flg)"
);

$stmt->bindvalue(':name', $name, PDO::PARAM_STR);
$stmt->bindvalue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindvalue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindvalue(':admin_flg', $admin_flg, PDO::PARAM_INT);

$status = $stmt->execute();

if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
}else{
    //５．index.phpへリダイレクト
    redirect('user_login.php');
}

?>