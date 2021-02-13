<?php
$db_host = "localhost";
$db_username = "root";
// $db_password = "jack321";
$db_password = "password";
$db_name = "gowhere";

try{
    $db_link = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_username, $db_password);
}

catch (PDOException $e){
    print "資料庫連結失敗,{$e->getMessage()}</hr>";
    die();
}
