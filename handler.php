<?php
include 'topic_pdo.php';
include 'session_start.php';
if (isset($_SESSION['uID'])) {
    echo "HI! " . $_SESSION['uID'];
    $a_id = $_GET['id'];

    $sql = 'INSERT INTO host (a_id,u_id) VALUE (' . $a_id . ',' . $_SESSION["uID"] . ')';
    $db_link->exec($sql);
    header("Location: topic_data_page.php");
} else {
    header("Location: login-system/login.php");
}
