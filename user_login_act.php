<?php

session_start();

$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

require_once('function.php');
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM user_db WHERE lid = :lid AND lpw = :lpw");
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw',$lpw, PDO::PARAM_STR); //* Hash化する場合はコメントする
$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}

$val = $stmt->fetch();
if($val['id']!= ""){
    $_SESSION['chk_ssid'] = session_id();
    $_SESSION['kanri_flg'] = $val['admin_flg'];
    $_SESSION['name'] = $val['name'];
    redirect('');
}else{
    
    rediret('');
}

exit();


?>