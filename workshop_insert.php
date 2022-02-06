<?php

// データ取得
$workshop_name=$_POST['workshop_name'];

$email=$_POST['email'];

$tel=$_POST['tel'];

$mon_open=$_POST['mon_open'];
$mon_close=$_POST['mon_close'];
$tue_open=$_POST['tue_open'];
$tue_close=$_POST['tue_close'];
$wed_open=$_POST['wed_open'];
$wed_close=$_POST['wed_close'];
$thu_open=$_POST['thu_open'];
$thu_close=$_POST['thu_close'];
$fri_open=$_POST['fri_open'];
$fri_close=$_POST['fri_close'];
$sat_open=$_POST['sat_open'];
$sat_close=$_POST['sat_close'];
$sun_open=$_POST['sun_open'];
$sun_close=$_POST['sun_close'];

$services=$_POST['services'];
foreach($services as $value){
    $service .=$value.",";
}

$address=$_POST['address'];


//2. DB接続

require_once('function.php');
$pdo = db_conn(); 
  
  //３．SQL文を用意(データ登録：INSERT)
  $stmt = $pdo->prepare(
    "INSERT INTO workshop_db(id, workshop_name, email, tel, service, 
                mon_open, mon_close, 
                tue_open, tue_close, 
                wed_open, wed_close, 
                thu_open, thu_close, 
                fri_open, fri_close, 
                sat_open, sat_close, 
                sun_open, sun_close, 
                address) 
     VALUES (NULL,:workshop_name,:email,:tel,:service,
                :mon_open,:mon_close,
                :tue_open,:tue_close,
                :wed_open,:wed_close,
                :thu_open,:thu_close,
                :fri_open,:fri_close,
                :sat_open,:sat_close,
                :sun_open,:sun_close,
                :address )"
  );
  
  // 4. バインド変数を用意
  $stmt->bindValue(':workshop_name', $workshop_name, PDO::PARAM_STR);  
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
  $stmt->bindValue(':tel',$tel, PDO::PARAM_STR);
  $stmt->bindValue(':service', $service, PDO::PARAM_STR);
  $stmt->bindValue(':mon_open', $mon_open, PDO::PARAM_STR);
  $stmt->bindValue(':mon_close', $mon_close, PDO::PARAM_STR);
  $stmt->bindValue(':tue_open', $tue_open, PDO::PARAM_STR);
  $stmt->bindValue(':tue_close', $tue_close, PDO::PARAM_STR);
  $stmt->bindValue(':wed_open', $wed_open, PDO::PARAM_STR);
  $stmt->bindValue(':wed_close', $wed_close, PDO::PARAM_STR);
  $stmt->bindValue(':thu_open', $thu_open, PDO::PARAM_STR);
  $stmt->bindValue(':thu_close', $thu_close, PDO::PARAM_STR);
  $stmt->bindValue(':fri_open', $fri_open, PDO::PARAM_STR);
  $stmt->bindValue(':fri_close', $fri_close, PDO::PARAM_STR);
  $stmt->bindValue(':sat_open', $sat_open, PDO::PARAM_STR);
  $stmt->bindValue(':sat_close', $sat_close, PDO::PARAM_STR);
  $stmt->bindValue(':sun_open', $sun_open, PDO::PARAM_STR);
  $stmt->bindValue(':sun_close', $sun_close, PDO::PARAM_STR);
  $stmt->bindValue(':address', $address, PDO::PARAM_STR);
  
  // 5. 実行
  $status = $stmt->execute();

  //6．データ登録処理後
    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        sql_error($stmt);
    }else{
        //５．index.phpへリダイレクト
        redirect('workshop_register.html');
    }



?>