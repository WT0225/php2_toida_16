<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。
function db_conn(){
    try {
        $db_name = "wt0225_gs_db";    //データベース名           
        $db_id   = "wt0225";      //アカウント名
        $db_pw   = "Squash1996";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "mysql57.wt0225.sakura.ne.jp"; //DBホスト
            $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
            return $pdo;
        } catch (PDOException $e) {
      exit('DBConnectError:'.$e->getMessage());
      }
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

function loginCheck(){
    if( $_SESSION["chk_ssid"] != session_id() ){
      exit('LOGIN ERROR');
    }else{
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
    }
  }

?>

