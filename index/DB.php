<?php
$servername = "localhost"; //主機
$username = "root";    //登入的使用者名稱
// $password = "jack321"; //密碼
$password = "password"; //密碼

// Create connection, 使用 PDO, 建立PDO instance $pdo 
try {
    $pdo = new PDO(
        "mysql:host=$servername;dbname=gowhere;charset=utf8",
        $username,
        $password
    );
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "PDO Connected successfully"."<br>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
