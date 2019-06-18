<?php

// 関数ファイルをインポート
require_once 'func.php';
// 設定ファイルのパース
$ini = parse_ini_file('../config/conf.ini');


// POSTのID情報の有無の確認
if(empty($_POST["l_id"])){
    header("Location: ../index.php?err=id_b");
    exit();
}

// POSTのPASSWORD情報の確認
if(empty($_POST["l_ps"])){
    header("Location: ../index.php?err=ps_b");
    exit();
}


// ハッシュで暗号化
$ps2 = sha1($_POST["l_ps"]);

// 関数ファイル内のdb_connect()を実行
$dbh = db_connect();

// POST情報を元に、DB内のログインIDを検索
$statement = $dbh->prepare('select l_id, l_pswd from users where l_id = :login_id');
$statement->bindParam(':login_id', $_POST['l_id'], PDO::PARAM_STR);
$statement->execute();

// DB検索後、ログインIDが検出できなかったらERROR BACK
if($statement == null){
    header("Location: ../index.php?err=id_m");
    exit();
}

?>