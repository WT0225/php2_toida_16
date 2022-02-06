<?php

require_once('function.php');
$pdo = db_conn();

$id = $_GET['id'];

$stmt=$pdo->prepare('DELETE FROM workshop_db WHERE id= :id');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();


if($status == false){
    sql_error($stmt);
}else{
    $result=$stmt->fetch();
    redirect('result.php');
}


?>