<?php
require_once "db_conn.php";

$sql = "SELECT * FROM activityform";

$sqlquery = $conn->query($sql);

$results = $sqlquery->fetchAll(PDO::FETCH_ASSOC);

var_dump($results);

foreach ($results as $x) {
    //print_r($x);
}
$json = json_encode($results);

file_put_contents("myjson.json", $json);
