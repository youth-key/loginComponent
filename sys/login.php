<?php

// 設定ファイルのパース
$ini = parse_ini_file('../config/conf.ini');

// POSTのID情報の有無の確認
if(empty($_POST["l_id"])){
    header("location: ../index.php?err=id_b");
    exit();
}

// POSTのPASSWORD情報の確認
if(empty($_POST["l_ps"])){
    header("location: ../index.php?err=ps_b");
    exit();
}


// ハッシュで暗号化
$ps2 = sha1($_POST["l_ps"]);



?>