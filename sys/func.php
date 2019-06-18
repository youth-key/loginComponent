<?php

$ini = parse_ini_file('../config/conf.ini');

// DB接続の関数
function db_connect(){
    $dbh = new PDO('mysql:host='.$ini['db_server'].'; dbname='.$ini['db_name'], $ini['db_user'], $ini['db_pswd']);
    return $dbh;
}

?>