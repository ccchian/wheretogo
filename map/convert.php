<?php
require_once "db_conn.php";
date_default_timezone_set("Asia/Taipei");
$now = new DateTime();
$stringNow = $now->format('Y-m-d H:i:s');
$date = strtotime($stringNow);
$toDatetime = date('Y-m-d H:i:s', $date);
//echo $toDatetime;

// $sql = "SELECT * FROM activityform";
$sql = "SELECT * FROM activityform WHERE a_date_start >= ?";

$stmt = $conn->prepare($sql);

$stmt->execute([$toDatetime]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($results);

foreach ($results as $x) {
    //print_r($x);
}
$json = json_encode($results);

file_put_contents("myjson.json", $json);
