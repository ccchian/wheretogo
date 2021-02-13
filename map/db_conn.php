<?php

$serverName = "localhost";
$uName = "root";
// $pass = "jack321";
$pass = "password";
$db_name = "gowhere";

try {
    $conn = new PDO(
        "mysql:host=$serverName;dbname=$db_name;charset=utf8",
        $uName,
        $pass
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    #echo "Connected!";               
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
